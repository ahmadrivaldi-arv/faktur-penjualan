<?php

namespace App\Livewire;

use App\Models\Faktur;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPenjualan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $fakturs = Faktur::with(['customer', 'perusahaan', 'details'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.index-penjualan', compact('fakturs'))
            ->layout('layouts.app');
    }

    public function delete(int $id): void
    {
        $faktur = Faktur::findOrFail($id);
        $faktur->details()->delete();
        $faktur->delete();

        $this->resetPage();

        session()->flash('message', 'Data penjualan berhasil dihapus.');
    }
}
