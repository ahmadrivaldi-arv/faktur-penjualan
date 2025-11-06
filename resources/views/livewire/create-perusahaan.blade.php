<div class="card shadow-sm">
    <div class="card-header fw-semibold">
        Tambah Data Perusahaan
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
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan"
                       class="form-control @error('nama_perusahaan') is-invalid @enderror"
                       wire:model.live="nama_perusahaan" placeholder="Masukkan nama perusahaan">
                @error('nama_perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                          wire:model.live="alamat" placeholder="Masukkan alamat perusahaan"></textarea>
                @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="text" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                       wire:model.live="no_telp" placeholder="Masukkan nomor telepon">
                @error('no_telp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fax" class="form-label">Fax</label>
                <input type="text" id="fax" class="form-control @error('fax') is-invalid @enderror"
                       wire:model.live="fax" placeholder="Masukkan nomor fax">
                @error('fax')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Simpan Data
                </button>
                <a href="{{ route('perusahaan.index') }}" class="btn btn-outline-secondary">
                    Kembali ke List
                </a>
            </div>
        </form>
    </div>
</div>
