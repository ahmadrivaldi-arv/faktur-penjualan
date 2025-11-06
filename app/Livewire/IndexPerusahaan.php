<?php

namespace App\Livewire;

use App\Models\Perusahaan;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPerusahaan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perusahaanId;
    public $nama_perusahaan = '';
    public $alamat = '';
    public $no_telp = '';
    public $fax = '';
    public $isEditing = false;

    protected $rules = [
        'nama_perusahaan' => 'required|string|min:3|max:255',
        'alamat' => 'nullable|string',
        'no_telp' => 'nullable|string|max:50',
        'fax' => 'nullable|string|max:50',
    ];

    public function render()
    {
        $perusahaans = Perusahaan::orderByDesc('created_at')->paginate(10);

        return view('livewire.index-perusahaan', compact('perusahaans'))
            ->layout('layouts.app');
    }

    public function edit(int $id): void
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $this->perusahaanId = $perusahaan->id_perusahaan;
        $this->nama_perusahaan = $perusahaan->nama_perusahaan;
        $this->alamat = $perusahaan->alamat;
        $this->no_telp = $perusahaan->no_telp;
        $this->fax = $perusahaan->fax;
        $this->isEditing = true;

        $this->resetErrorBag();
    }

    public function update(): void
    {
        if (! $this->perusahaanId) {
            return;
        }

        $data = $this->validate();

        $perusahaan = Perusahaan::findOrFail($this->perusahaanId);
        $perusahaan->update($data);

        $this->resetForm();

        session()->flash('message', 'Data perusahaan berhasil diperbarui.');
    }

    public function delete(int $id): void
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        if ($this->perusahaanId === $id) {
            $this->resetForm();
        }

        $this->resetPage();

        session()->flash('message', 'Data perusahaan berhasil dihapus.');
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->reset(['perusahaanId', 'nama_perusahaan', 'alamat', 'no_telp', 'fax', 'isEditing']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
