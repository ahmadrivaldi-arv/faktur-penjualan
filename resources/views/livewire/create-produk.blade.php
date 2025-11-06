<div class="card shadow-sm">
    <div class="card-header fw-semibold">
        Tambah Data Produk
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
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" id="nama_produk"
                       class="form-control @error('nama_produk') is-invalid @enderror"
                       wire:model.live="nama_produk" placeholder="Masukkan nama produk">
                @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" id="jenis" class="form-control @error('jenis') is-invalid @enderror"
                       wire:model.live="jenis" placeholder="Masukkan jenis produk">
                @error('jenis')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" id="price" min="0"
                           class="form-control @error('price') is-invalid @enderror"
                           wire:model.live="price" placeholder="0">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" id="stock" min="0"
                           class="form-control @error('stock') is-invalid @enderror"
                           wire:model.live="stock" placeholder="0">
                    @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    Simpan Data
                </button>
                <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">
                    Kembali ke List
                </a>
            </div>
        </form>
    </div>
</div>
