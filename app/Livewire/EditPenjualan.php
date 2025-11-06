<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Faktur;
use App\Models\Perusahaan;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Throwable;

/**
 * Komponen pengeditan faktur penjualan beserta detail itemnya.
 *
 * Alur utama:
 * - mount(): memuat faktur, detail, serta opsi dropdown lalu menghitung total.
 * - updated()/updatedItems(): memvalidasi input secara live dan menjaga konsistensi subtotal/grand total.
 * - addItem()/removeItem(): memodifikasi daftar item yang akan disimpan.
 * - update(): memvalidasi seluruh data, menjalankan transaksi update faktur + detail, lalu redirect.
 */
class EditPenjualan extends Component
{
    public $fakturId;
    public $tgl_faktur;
    public $due_date;
    public $metode_pembayaran = '';
    public $ppn = 0;
    public $dp = 0;
    public $grand_total = 0;
    public $user = '';
    public $id_customer;
    public $id_perusahaan;

    public $customerOptions = [];
    public $perusahaanOptions = [];
    public $produkOptions = [];
    public $items = [];

    protected $rules = [
        'tgl_faktur' => 'required|date',
        'due_date' => 'required|date|after_or_equal:tgl_faktur',
        'metode_pembayaran' => 'required|string|max:100',
        'ppn' => 'nullable|integer|min:0',
        'dp' => 'nullable|integer|min:0',
        'grand_total' => 'nullable|integer|min:0',
        'user' => 'required|string|max:255',
        'id_customer' => 'required|exists:customer,id_customer',
        'id_perusahaan' => 'required|exists:perusahaan,id_perusahaan',
        'items' => 'required|array|min:1',
        'items.*.id_produk' => 'required|exists:produk,id_produk',
        'items.*.qty' => 'required|integer|min:1',
        'items.*.price' => 'required|integer|min:0',
    ];

    public function mount(Faktur $faktur): void
    {
        $this->fakturId = $faktur->no_faktur;
        $this->tgl_faktur = $faktur->tgl_faktur;
        $this->due_date = $faktur->due_date;
        $this->metode_pembayaran = $faktur->metode_pembayaran;
        $this->ppn = $faktur->ppn;
        $this->dp = $faktur->dp;
        $this->grand_total = $faktur->grand_total;
        $this->user = $faktur->user;
        $this->id_customer = $faktur->id_customer;
        $this->id_perusahaan = $faktur->id_perusahaan;

        $this->refreshOptions();

        $this->items = $faktur->details->map(function ($detail) {
            return [
                'id_produk' => $detail->id_produk,
                'qty' => $detail->qty,
                'price' => $detail->price,
            ];
        })->toArray();

        if (empty($this->items)) {
            $this->items = [
                [
                    'id_produk' => '',
                    'qty' => 1,
                    'price' => 0,
                ],
            ];
        }

        $this->syncTotals();
    }

    /**
     * Menampilkan form edit penjualan dengan layout utama.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.edit-penjualan')
            ->layout('layouts.app');
    }

    /**
     * Memperbarui faktur beserta detail dalam satu transaksi.
     *
     * @throws Throwable
     * @return void
     */
    public function update(): void
    {
        $data = $this->convertNumericFields($this->validate());

        $items = $data['items'];
        unset($data['items']);

        $subtotal = $this->subtotal;
        $data['grand_total'] = $this->calculateGrandTotal($subtotal);

        DB::transaction(function () use ($data, $items): void {
            $faktur = Faktur::with('details')->findOrFail($this->fakturId);

            foreach ($faktur->details as $detail) {
                $produk = Produk::lockForUpdate()->find($detail->id_produk);

                if ($produk) {
                    $produk->increment('stock', $detail->qty);
                }
            }

            $faktur->update($data);
            $faktur->details()->delete();

            foreach ($items as $index => $item) {
                $produk = Produk::lockForUpdate()->findOrFail($item['id_produk']);

                if ($produk->stock < $item['qty']) {
                    throw ValidationException::withMessages([
                        "items.{$index}.qty" => 'Stok produk tidak mencukupi.',
                    ]);
                }

                $produk->decrement('stock', $item['qty']);

                $faktur->details()->create([
                    'id_produk' => $item['id_produk'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                ]);
            }
        });

        session()->flash('message', 'Data penjualan berhasil diperbarui.');

        $this->redirectRoute('penjualan.index');
    }

    /**
     * Menambahkan baris item baru pada form edit.
     *
     * @return void
     */
    public function addItem(): void
    {
        $this->items[] = [
            'id_produk' => '',
            'qty' => 1,
            'price' => 0,
        ];
    }

    /**
     * Menghapus baris item berdasarkan indeks.
     *
     * @return void
     */
    public function removeItem(int $index): void
    {
        if (count($this->items) <= 1) {
            return;
        }

        unset($this->items[$index]);
        $this->items = array_values($this->items);

        $this->syncTotals();
    }

    /**
     * Validasi cepat saat field berubah dan hitung ulang total bila relevan.
     *
     * @param string $propertyName
     * @return void
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);

        if (str_starts_with($propertyName, 'items.') || in_array($propertyName, ['ppn', 'dp'], true)) {
            $this->syncTotals();
        }
    }

    /**
     * Menangani perubahan pada array items (termasuk auto set harga).
     *
     * @param mixed $value
     * @param string $key
     * @return void
     */
    public function updatedItems($value, $key): void
    {
        if (str_ends_with($key, '.id_produk') && $value !== null && $value !== '') {
            $segments = explode('.', $key);
            $rowIndex = $segments[0] ?? null;

            if ($rowIndex !== null && isset($this->items[$rowIndex])) {
                $produk = Produk::find((int) $value);

                if ($produk) {
                    $items = $this->items;
                    $items[$rowIndex]['price'] = (int) $produk->price;
                    $this->items = $items;
                }
            }
        }

        $this->syncTotals();
    }

    /**
     * Hitung subtotal dari seluruh item.
     *
     * @return int
     */
    public function getSubtotalProperty(): int
    {
        return collect($this->items)->sum(function ($item) {
            $qty = (int) ($item['qty'] ?? 0);
            $price = (int) ($item['price'] ?? 0);

            return $qty * $price;
        });
    }

    /**
     * Muat ulang pilihan dropdown untuk customer, perusahaan, dan produk.
     *
     * @return void
     */
    private function refreshOptions(): void
    {
        $this->customerOptions = Customer::orderBy('nama_customer')->get();
        $this->perusahaanOptions = Perusahaan::orderBy('nama_perusahaan')->get();
        $this->produkOptions = Produk::orderBy('nama_produk')->get();
    }

    /**
     * Sinkronkan grand total berdasarkan subtotal terkini.
     *
     * @return void
     */
    private function syncTotals(): void
    {
        $this->grand_total = $this->calculateGrandTotal($this->subtotal);
    }

    /**
     * Konversi nilai numerik agar menjadi integer sebelum disimpan.
     *
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function convertNumericFields(array $data): array
    {
        $data['ppn'] = isset($data['ppn']) ? (int) $data['ppn'] : 0;
        $data['dp'] = isset($data['dp']) ? (int) $data['dp'] : 0;
        $data['grand_total'] = (int) ($data['grand_total'] ?? 0);

        return $data;
    }

    /**
     * Hitung grand total menggunakan subtotal, PPN (%), dan DP.
     *
     * @return int
     */
    private function calculateGrandTotal(int $subtotal): int
    {
        $ppnPercent = (int) $this->ppn;
        $dpAmount = (int) $this->dp;

        $ppnAmount = (int) $subtotal * ($ppnPercent / 100);
        $total = $subtotal + $ppnAmount - $dpAmount;

        return max($total, 0);
    }
}
