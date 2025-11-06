<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Faktur #{{ $faktur->no_faktur }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #1a1a1a;
            margin: 24px;
        }
        .header {
            display: table;
            width: 100%;
            margin-bottom: 16px;
        }
        .header .left {
            display: table-cell;
            vertical-align: top;
        }
        .logo-box {
            width: 60px;
            height: 60px;
            border: 2px solid #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #0d6efd;
            margin-right: 12px;
        }
        .company-info {
            font-size: 12px;
            line-height: 1.4;
        }
        .header .right {
            display: table-cell;
            text-align: right;
            vertical-align: top;
        }
        .header-title {
            font-size: 26px;
            letter-spacing: 4px;
            font-weight: 700;
            color: #0d6efd;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 16px 0;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 16px;
        }
        .info-grid .col {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding-right: 12px;
        }
        .info-heading {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 11px;
            margin-bottom: 6px;
            color: #0d6efd;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 4px 0;
            vertical-align: top;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        .items-table th,
        .items-table td {
            border: 1px solid #bfbfbf;
            padding: 8px;
        }
        .items-table th {
            background: #f3f4f6;
            text-transform: uppercase;
            font-size: 11px;
        }
        .items-table td {
            font-size: 12px;
        }
        .totals {
            margin-top: 12px;
            width: 40%;
            margin-left: auto;
        }
        .totals table {
            width: 100%;
            border-collapse: collapse;
        }
        .totals td {
            padding: 6px 4px;
        }
        .totals tr td:last-child {
            text-align: right;
        }
        .totals tr.total-row td {
            font-weight: 700;
            border-top: 1px solid #999;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="left">
            <div style="display: flex; align-items: center;">
                <div class="company-info">
                    <strong>
                        PT. ABC Solusi Digital
                    </strong><br>
                    Jl. Melati No. 45, Kel. Sukamaju, Kec. Cimanggis, Kota Depok, Jawa Barat 16452<br>
                    Telp: 08123
                </div>
            </div>
        </div>
        <div class="right">
            <div class="header-title">FAKTUR</div>
        </div>
    </div>

    <hr>

    <div class="info-grid">
        <div class="col">
            <div class="info-heading">Informasi Customer</div>
            <table class="info-table">
                <tr>
                    <td>Nama</td>
                    <td>: {{ $faktur->customer->nama_customer ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ $faktur->customer->perusahaan_cust ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $faktur->customer->alamat ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="col">
            <div class="info-heading">Informasi Faktur</div>
            <table class="info-table">
                <tr>
                    <td>Nomor Faktur</td>
                    <td>: #{{ $faktur->no_faktur }}</td>
                </tr>
                <tr>
                    <td>Sales/User</td>
                    <td>: {{ $faktur->user }}</td>
                </tr>

                <tr>
                    <td>Tanggal Faktur</td>
                    <td>: {{ \Carbon\Carbon::parse($faktur->tgl_faktur)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Jatuh Tempo</td>
                    <td>: {{ \Carbon\Carbon::parse($faktur->due_date)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td>Metode Bayar</td>
                    <td>: {{ $faktur->metode_pembayaran }}</td>
                </tr>
            </table>
        </div>
    </div>

    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 6%;">No</th>
                <th>Produk</th>
                <th style="width: 12%;">Qty</th>
                <th style="width: 18%;">Harga</th>
                <th style="width: 18%;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faktur->details as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->produk->nama_produk ?? '-' }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($detail->qty * $detail->price, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; font-style: italic;">Tidak ada item.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>PPN ({{ $ppnPercent }}%)</td>
                <td>Rp {{ number_format($ppnAmount, 0, ',', '.') }}</td>
            </tr>
            @if ($dpAmount > 0)
                <tr>
                    <td>DP</td>
                    <td>- Rp {{ number_format($dpAmount, 0, ',', '.') }}</td>
                </tr>
            @endif
            <tr class="total-row">
                <td>Grand Total</td>
                <td>Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
