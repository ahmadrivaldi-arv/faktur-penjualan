<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Faktur;
use App\Models\Perusahaan;
use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Throwable;

/**
 * Komponen pembuatan penjualan beserta detail item.
 *
 * Alur:
 * 1. mount() menyiapkan nilai default (tanggal, opsi dropdown, item awal, total).
 * 2. updated()/updatedItems memvalidasi per field dan mensinkronkan subtotal/grand total.
 * 3. addItem/removeItem memodifikasi daftar item yang akan disimpan.
 * 4. store() memvalidasi seluruh input, menjalankan transaksi untuk menyimpan faktur
 *    beserta detailnya, kemudian mereset form dan menampilkan pesan sukses.
 */
class CreatePenjualan extends Component
{
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

    /**
     * Inisialisasi state form dan daftar dropdown ketika komponen dimuat.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->tgl_faktur = now()->toDateString();
        $this->due_date = now()->toDateString();
        $this->refreshOptions();
        $this->items = [
            [
                'id_produk' => '',
                'qty' => 1,
                'price' => 0,
            ],
        ];
        $this->syncTotals();
    }

    /**
     * Menampilkan form create penjualan dalam layout utama.
     *
     * @return View
     *
     * @return void
     */
    public function render(): View
    {
        return view('livewire.create-penjualan')
            ->layout('layouts.app');
    }

    /**
     * Menyimpan faktur baru beserta detail item ke database.
     *
     * Langkah:
     * - Validasi input.
     * - Hitung subtotal dan grand total (dengan PPN dan DP).
     * - Jalankan transaksi untuk membuat faktur dan detail.
     * - Reset state form serta tampilkan pesan sukses.
     *
     * @return void
     * @throws Throwable
     */
    public function store(): void
    {
        $data = $this->convertNumericFields($this->validate());

        $items = $data['items'];
        unset($data['items']);

        $subtotal = $this->subtotal;
        $data['grand_total'] = $this->calculateGrandTotal($subtotal);

        DB::transaction(function () use ($data, $items): void {
            $faktur = Faktur::create($data);

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

        $this->resetForm();

        session()->flash('message', 'Data penjualan berhasil ditambahkan.');
    }

    /**
     * Reset nilai form ke default dan bersihkan pesan error.
     *
     * @return void
     */
    private function resetForm(): void
    {
        $this->reset([
            'tgl_faktur',
            'due_date',
            'metode_pembayaran',
            'ppn',
            'dp',
            'grand_total',
            'user',
            'id_customer',
            'id_perusahaan',
            'items',
        ]);

        $this->tgl_faktur = now()->toDateString();
        $this->due_date = now()->toDateString();
        $this->ppn = 0;
        $this->dp = 0;
        $this->grand_total = 0;
        $this->items = [
            [
                'id_produk' => '',
                'qty' => 1,
                'price' => 0,
            ],
        ];

        $this->refreshOptions();
        $this->syncTotals();

        $this->resetErrorBag();
        $this->resetValidation();
    }

    /**
     * Memuat ulang data reference untuk dropdown.
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
     * Validasi cepat untuk field tertentu, sekaligus hitung ulang total bila perlu.
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
     * Tambahkan baris item kosong ke daftar detail.
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
     * Hapus baris item pada indeks tertentu.
     *
     * @param int $index
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
     * Sinkronisasi perubahan pada array items dan auto-set harga produk jika kosong.
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
     * Hitung subtotal item (qty * price) secara dinamis.
     *
     * @return int
     */
    public function getSubtotalProperty(): int
    {
        return collect($this->items)->sum(function ($item) {
            $qty = (int)($item['qty'] ?? 0);
            $price = (int)($item['price'] ?? 0);

            return $qty * $price;
        });
    }

    /**
     * Perbarui nilai grand total berdasarkan subtotal terkini.
     *
     * @return void
     */
    private function syncTotals(): void
    {
        $this->grand_total = $this->calculateGrandTotal($this->subtotal);
    }

    /**
     * Konversi nilai numerik agar pasti integer sebelum disimpan.
     *
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function convertNumericFields(array $data): array
    {
        $data['ppn'] = isset($data['ppn']) ? (int)$data['ppn'] : 0;
        $data['dp'] = isset($data['dp']) ? (int)$data['dp'] : 0;
        $data['grand_total'] = (int)($data['grand_total'] ?? 0);

        return $data;
    }

    /**
     * Hitung grand total (subtotal + PPN - DP).
     *
     * @return int
     */
    private function calculateGrandTotal(int $subtotal): int
    {
        $ppnPercent = (int)$this->ppn;
        $dpAmount = (int)$this->dp;

        $ppnAmount = (int)$subtotal * ($ppnPercent / 100);
        $total = $subtotal + $ppnAmount - $dpAmount;

        return max($total, 0);
    }
}
