<div class="row g-4">
    <div class="col-12">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Daftar Penjualan</span>
                <a href="{{ route('penjualan.create') }}" class="btn btn-sm btn-primary">
                    Tambah Penjualan
                </a>
            </div>
            <div class="card-body">
                @if ($fakturs->isEmpty())
                    <p class="text-muted mb-0">Belum ada data penjualan. Klik tombol "Tambah Penjualan" untuk menambahkan
                        data baru.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>No Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th>Perusahaan</th>
                                    <th>Jumlah Item</th>
                                    <th>Grand Total</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fakturs as $faktur)
                                    <tr>
                                        <td class="fw-medium">#{{ $faktur->no_faktur }}</td>
                                        <td>{{ \Carbon\Carbon::parse($faktur->tgl_faktur)->format('d/m/Y') }}</td>
                                        <td>{{ optional($faktur->customer)->nama_customer ?: '—' }}</td>
                                        <td>{{ optional($faktur->perusahaan)->nama_perusahaan ?: '—' }}</td>
                                        <td>{{ $faktur->details->sum('qty') }}</td>
                                        <td>Rp {{ number_format($faktur->grand_total, 0, ',', '.') }}</td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('penjualan.print', $faktur->no_faktur) }}"
                                                    target="_blank" class="btn btn-outline-secondary">
                                                    Cetak
                                                </a>
                                                <a href="{{ route('penjualan.edit', $faktur->no_faktur) }}"
                                                    class="btn btn-outline-primary">
                                                    Edit
                                                </a>
                                                <button type="button" class="btn btn-outline-danger"
                                                    wire:click="delete({{ $faktur->no_faktur }})"
                                                    onclick="confirm('Hapus data penjualan ini?') || event.stopImmediatePropagation()">
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
                        {{ $fakturs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
