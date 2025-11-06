<?php

namespace App\Livewire;

use App\Models\Perusahaan;
use Livewire\Component;

/**
 * Komponen untuk menambah data perusahaan.
 *
 * Alur:
 * - render(): menampilkan form create.
 * - updated(): validasi realtime tiap field.
 * - store(): validasi global, simpan ke DB, reset form, beri pesan sukses.
 */
class CreatePerusahaan extends Component
{
    public $nama_perusahaan = '';
    public $alamat = '';
    public $no_telp = '';
    public $fax = '';

    protected $rules = [
        'nama_perusahaan' => 'required|string|min:3|max:255',
        'alamat' => 'nullable|string',
        'no_telp' => 'nullable|string|max:50',
        'fax' => 'nullable|string|max:50',
    ];

    /**
     * Menampilkan form create perusahaan di layout utama.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.create-perusahaan')
            ->layout('layouts.app');
    }

    /**
     * Memvalidasi input, menyimpan perusahaan baru, dan reset form.
     *
     * @return void
     */
    public function store(): void
    {
        $data = $this->validate();

        Perusahaan::create($data);

        $this->resetForm();

        session()->flash('message', 'Data perusahaan berhasil ditambahkan.');
    }

    /**
     * Membersihkan nilai input dan error setelah submit.
     *
     * @return void
     */
    private function resetForm(): void
    {
        $this->reset(['nama_perusahaan', 'alamat', 'no_telp', 'fax']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    /**
     * Validasi field saat pengguna mengubahnya.
     *
     * @param string $propertyName
     * @return void
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
