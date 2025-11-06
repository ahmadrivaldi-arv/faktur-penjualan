<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;

/**
 * Komponen untuk menangani proses pembuatan data produk.
 *
 * Alur algoritma:
 * - Form ditampilkan lewat render() dan setiap input dipantau oleh updated().
 * - updated() memvalidasi field yang berubah sehingga pengguna langsung mendapat feedback.
 * - Saat tombol simpan ditekan, store() memvalidasi semua field, menyimpan ke database,
 *   lalu resetForm() mengembalikan state form agar siap untuk entri berikutnya.
 * - Pesan sukses diberikan lewat session flash agar pengguna tahu operasi berhasil.
 */
class CreateProduk extends Component
{
    public $nama_produk = '';
    public $price = 0;
    public $jenis = '';
    public $stock = 0;

    /**
     * Aturan validasi untuk setiap field input.
     *
     * @var array<string, string>
     */
    protected $rules = [
        'nama_produk' => 'required|string|min:2|max:255',
        'price' => 'required|integer|min:0',
        'jenis' => 'required|string|max:100',
        'stock' => 'required|integer|min:0',
    ];

    /**
     * Menampilkan tampilan form pembuatan produk.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.create-produk');
    }

    /**
     * Memvalidasi input, menyimpan produk baru, dan reset form.
     *
     * @return void
     */
    public function store(): void
    {
        $data = $this->validate();

        Produk::create($data);

        $this->resetForm();

        session()->flash('message', 'Data produk berhasil ditambahkan.');
    }

    /**
     * Mengembalikan nilai form ke default dan membersihkan error.
     *
     * @return void
     */
    private function resetForm(): void
    {
        $this->reset(['nama_produk', 'price', 'jenis', 'stock']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    /**
     * Validasi cepat untuk field yang sedang diubah.
     *
     * @param string $propertyName
     * @return void
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
