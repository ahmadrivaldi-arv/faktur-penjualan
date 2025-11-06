<div class="row g-4">
    <div class="col-12">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    @if ($isEditing)
        <div class="col-12">
            <div class="card shadow-sm border-primary">
                <div class="card-header fw-semibold">
                    Edit Data Customer
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_customer" class="form-label">Nama Customer</label>
                                <input type="text" id="nama_customer"
                                    class="form-control @error('nama_customer') is-invalid @enderror"
                                    wire:model.live="nama_customer" placeholder="Masukkan nama customer">
                                @error('nama_customer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="perusahaan_cust" class="form-label">Perusahaan</label>
                                <input type="text" id="perusahaan_cust"
                                    class="form-control @error('perusahaan_cust') is-invalid @enderror"
                                    wire:model.live="perusahaan_cust" placeholder="Masukkan nama perusahaan">
                                @error('perusahaan_cust')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                                    wire:model.live="alamat" placeholder="Masukkan alamat customer"></textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                            <button type="button" class="btn btn-outline-secondary" wire:click="cancelEdit">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Daftar Customer</span>
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('customer.print') }}" target="_blank" class="btn btn-outline-secondary">
                        Preview PDF
                    </a>
                    <a href="{{ route('customer.print', ['download' => 1]) }}" class="btn btn-outline-secondary">
                        Download PDF
                    </a>
                    <a href="{{ route('customer.create') }}" class="btn btn-primary">
                        Tambah Customer
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if ($customers->isEmpty())
                    <p class="text-muted mb-0">Belum ada data customer. Klik tombol "Tambah Customer" untuk menambahkan
                        data baru.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Customer</th>
                                    <th>Perusahaan</th>
                                    <th>Alamat</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="fw-medium">{{ $customer->nama_customer }}</td>
                                        <td>{{ $customer->perusahaan_cust ?: '—' }}</td>
                                        <td>{{ $customer->alamat ?: '—' }}</td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary"
                                                    wire:click="edit({{ $customer->id_customer }})">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-outline-danger"
                                                    wire:click="delete({{ $customer->id_customer }})"
                                                    onclick="confirm('Hapus data customer ini?') || event.stopImmediatePropagation()">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $customers->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
