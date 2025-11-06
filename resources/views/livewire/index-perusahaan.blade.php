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
                    Edit Data Perusahaan
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" id="nama_perusahaan"
                                    class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                    wire:model.live="nama_perusahaan" placeholder="Masukkan nama perusahaan">
                                @error('nama_perusahaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="no_telp" class="form-label">Nomor Telepon</label>
                                <input type="text" id="no_telp"
                                    class="form-control @error('no_telp') is-invalid @enderror"
                                    wire:model.live="no_telp" placeholder="Masukkan nomor telepon">
                                @error('no_telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fax" class="form-label">Fax</label>
                                <input type="text" id="fax" class="form-control @error('fax') is-invalid @enderror"
                                    wire:model.live="fax" placeholder="Masukkan nomor fax">
                                @error('fax')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                                    wire:model.live="alamat" placeholder="Masukkan alamat perusahaan"></textarea>
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
                <span class="fw-semibold">Daftar Perusahaan</span>
                <a href="{{ route('perusahaan.create') }}" class="btn btn-sm btn-primary">Tambah Perusahaan</a>
            </div>
            <div class="card-body">
                @if ($perusahaans->isEmpty())
                    <p class="text-muted mb-0">Belum ada data perusahaan. Klik tombol "Tambah Perusahaan" untuk
                        menambahkan data baru.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Fax</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perusahaans as $perusahaan)
                                    <tr>
                                        <td class="fw-medium">{{ $perusahaan->nama_perusahaan }}</td>
                                        <td>{{ $perusahaan->alamat ?: '—' }}</td>
                                        <td>{{ $perusahaan->no_telp ?: '—' }}</td>
                                        <td>{{ $perusahaan->fax ?: '—' }}</td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary"
                                                    wire:click="edit({{ $perusahaan->id_perusahaan }})">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-outline-danger"
                                                    wire:click="delete({{ $perusahaan->id_perusahaan }})"
                                                    onclick="confirm('Hapus data perusahaan ini?') || event.stopImmediatePropagation()">
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
                        {{ $perusahaans->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
