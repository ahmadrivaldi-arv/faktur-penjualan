<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduk extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $produkId;
    public $nama_produk = '';
    public $price = 0;
    public $jenis = '';
    public $stock = 0;
    public $isEditing = false;

    protected $rules = [
        'nama_produk' => 'required|string|min:2|max:255',
        'price' => 'required|integer|min:0',
        'jenis' => 'required|string|max:100',
        'stock' => 'required|integer|min:0',
    ];

    public function render()
    {
        $produks = Produk::orderBy('nama_produk')->paginate(10);

        return view('livewire.index-produk', compact('produks'))
            ->layout('layouts.app');
    }

    public function edit(int $id): void
    {
        $produk = Produk::findOrFail($id);

        $this->produkId = $produk->id_produk;
        $this->nama_produk = $produk->nama_produk;
        $this->price = $produk->price;
        $this->jenis = $produk->jenis;
        $this->stock = $produk->stock;
        $this->isEditing = true;

        $this->resetErrorBag();
    }

    public function update(): void
    {
        if (! $this->produkId) {
            return;
        }

        $data = $this->validate();

        $produk = Produk::findOrFail($this->produkId);
        $produk->update($data);

        $this->resetForm();

        session()->flash('message', 'Data produk berhasil diperbarui.');
    }

    public function delete(int $id): void
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        if ($this->produkId === $id) {
            $this->resetForm();
        }

        $this->resetPage();

        session()->flash('message', 'Data produk berhasil dihapus.');
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->reset([
            'produkId',
            'nama_produk',
            'price',
            'jenis',
            'stock',
            'isEditing',
        ]);

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
