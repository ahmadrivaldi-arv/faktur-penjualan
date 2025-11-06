@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="mb-4">
            <h2 class="fw-semibold mb-1">Dashboard</h2>
            <p class="text-muted">Ringkasan statistik data.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <span class="badge bg-primary rounded-circle p-3">
                                <i class="bi bi-people fs-5"></i>
                            </span>
                        </div>
                        <div>
                            <div class="text-muted text-uppercase small">Total Customer</div>
                            <div class="h4 mb-0">{{ $totalCustomer }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <span class="badge bg-success rounded-circle p-3">
                                <i class="bi bi-box-seam fs-5"></i>
                            </span>
                        </div>
                        <div>
                            <div class="text-muted text-uppercase small">Total Produk</div>
                            <div class="h4 mb-0">{{ $totalProduk }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <span class="badge bg-warning rounded-circle p-3 text-dark">
                                <i class="bi bi-receipt fs-5"></i>
                            </span>
                        </div>
                        <div>
                            <div class="text-muted text-uppercase small">Total Penjualan</div>
                            <div class="h4 mb-0">{{ $totalPenjualan }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <span class="badge bg-info rounded-circle p-3 text-dark">
                                <i class="bi bi-cash-stack fs-5"></i>
                            </span>
                        </div>
                        <div>
                            <div class="text-muted text-uppercase small">Nilai Penjualan</div>
                            <div class="h4 mb-0">Rp {{ number_format($nilaiTotalPenjualan, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-semibold">Penjualan Terbaru</h5>
            </div>
            <div class="card-body">
                @if ($recentPenjualan->isEmpty())
                    <p class="text-muted mb-0">Belum ada transaksi penjualan.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>No Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th>Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentPenjualan as $faktur)
                                    <tr>
                                        <td>#{{ $faktur->no_faktur }}</td>
                                        <td>{{ \Carbon\Carbon::parse($faktur->tgl_faktur)->format('d/m/Y') }}</td>
                                        <td>{{ optional($faktur->customer)->nama_customer ?? '-' }}</td>
                                        <td>Rp {{ number_format($faktur->grand_total, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-semibold">Produk Terlaris</h5>
            </div>
            <div class="card-body">
                @if ($produkTerlaris->isEmpty())
                    <p class="text-muted mb-0">Belum ada data penjualan produk.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Jenis</th>
                                    <th>Stok</th>
                                    <th>Total Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkTerlaris as $produk)
                                    <tr>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->jenis }}</td>
                                        <td>{{ $produk->stock }}</td>
                                        <td>{{ $produk->total_qty ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
