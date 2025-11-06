<div class="card shadow-sm">
    <div class="card-header fw-semibold">
        Tambah Data Customer
    </div>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="store">
            <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Customer</label>
                <input type="text" id="nama_customer"
                       class="form-control @error('nama_customer') is-invalid @enderror"
                       wire:model.live="nama_customer" placeholder="Masukkan nama customer">
                @error('nama_customer')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="perusahaan_cust" class="form-label">Perusahaan</label>
                <input type="text" id="perusahaan_cust"
                       class="form-control @error('perusahaan_cust') is-invalid @enderror"
                       wire:model.live="perusahaan_cust" placeholder="Masukkan nama perusahaan">
                @error('perusahaan_cust')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                          wire:model.live="alamat" placeholder="Masukkan alamat customer"></textarea>
                @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Simpan Data
                </button>
                <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary">
                    Kembali ke List
                </a>
            </div>
        </form>
    </div>
</div>
