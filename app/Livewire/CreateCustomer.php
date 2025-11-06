<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;

/**
 * Komponen pembuatan data customer.
 *
 * Mekanisme:
 * - render() menampilkan form dan layout.
 * - updated() memvalidasi input yang berubah.
 * - store() memvalidasi keseluruhan, simpan ke DB, reset form, dan tampilkan notifikasi.
 */
class CreateCustomer extends Component
{
    public $nama_customer = '';
    public $perusahaan_cust = '';
    public $alamat = '';

    protected $rules = [
        'nama_customer' => 'required|string|min:3|max:255',
        'perusahaan_cust' => 'nullable|string|max:255',
        'alamat' => 'nullable|string',
    ];

    /**
     * Menampilkan form create customer di layout utama.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.create-customer')
            ->layout('layouts.app');
    }

    /**
     * Memvalidasi input, menyimpan customer baru, dan mereset form.
     *
     * @return void
     */
    public function store(): void
    {
        $data = $this->validate();

        Customer::create($data);

        $this->resetForm();

        session()->flash('message', 'Data customer berhasil ditambahkan.');
    }

    /**
     * Reset state form dan bersihkan error.
     *
     * @return void
     */
    private function resetForm(): void
    {
        $this->reset(['nama_customer', 'perusahaan_cust', 'alamat']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    /**
     * Validasi field yang sedang diubah.
     *
     * @param string $propertyName
     * @return void
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
