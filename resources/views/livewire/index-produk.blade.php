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
                    Edit Data Produk
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" id="nama_produk"
                                    class="form-control @error('nama_produk') is-invalid @enderror"
                                    wire:model.live="nama_produk" placeholder="Masukkan nama produk">
                                @error('nama_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    wire:model.live="price" placeholder="0" min="0">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" id="stock"
                                    class="form-control @error('stock') is-invalid @enderror"
                                    wire:model.live="stock" placeholder="0" min="0">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="jenis" class="form-label">Jenis</label>
                                <input type="text" id="jenis"
                                    class="form-control @error('jenis') is-invalid @enderror"
                                    wire:model.live="jenis" placeholder="Masukkan jenis produk">
                                @error('jenis')
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
                <span class="fw-semibold">Daftar Produk</span>
                <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
            </div>
            <div class="card-body">
                @if ($produks->isEmpty())
                    <p class="text-muted mb-0">Belum ada data produk. Klik tombol "Tambah Produk" untuk menambahkan data
                        baru.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td class="fw-medium">{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->jenis }}</td>
                                        <td>Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                                        <td>{{ $produk->stock }}</td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary"
                                                    wire:click="edit({{ $produk->id_produk }})">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-outline-danger"
                                                    wire:click="delete({{ $produk->id_produk }})"
                                                    onclick="confirm('Hapus data produk ini?') || event.stopImmediatePropagation()">
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
                        {{ $produks->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
