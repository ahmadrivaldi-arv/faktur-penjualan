<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCustomer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $customerId;
    public $nama_customer = '';
    public $perusahaan_cust = '';
    public $alamat = '';
    public $isEditing = false;

    protected $rules = [
        'nama_customer' => 'required|string|min:3|max:255',
        'perusahaan_cust' => 'nullable|string|max:255',
        'alamat' => 'nullable|string',
    ];

    public function render()
    {
        $customers = Customer::orderByDesc('created_at')->paginate(10);

        return view('livewire.index-customer', compact('customers'))
            ->layout('layouts.app');
    }

    public function edit(int $id): void
    {
        $customer = Customer::findOrFail($id);

        $this->customerId = $customer->id_customer;
        $this->nama_customer = $customer->nama_customer;
        $this->perusahaan_cust = $customer->perusahaan_cust;
        $this->alamat = $customer->alamat;
        $this->isEditing = true;

        $this->resetErrorBag();
    }

    public function update(): void
    {
        if (! $this->customerId) {
            return;
        }

        $data = $this->validate();

        $customer = Customer::findOrFail($this->customerId);
        $customer->update($data);

        $this->resetForm();

        session()->flash('message', 'Data customer berhasil diperbarui.');
    }

    public function delete(int $id): void
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        if ($this->customerId === $id) {
            $this->resetForm();
        }

        $this->resetPage();

        session()->flash('message', 'Data customer berhasil dihapus.');
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->reset(['customerId', 'nama_customer', 'perusahaan_cust', 'alamat', 'isEditing']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
}
