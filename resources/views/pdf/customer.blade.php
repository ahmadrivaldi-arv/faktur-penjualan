<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Customer</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 24px;
            color: #111;
        }
        h1 {
            text-align: center;
            margin-bottom: 24px;
            font-size: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f0f0f0;
        }
        .text-muted {
            color: #777;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Data Customer</h1>

    @if ($customers->isEmpty())
        <p class="text-muted">Tidak ada data customer.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">No</th>
                    <th>Nama Customer</th>
                    <th>Perusahaan</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $index => $customer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $customer->nama_customer }}</td>
                        <td>{{ $customer->perusahaan_cust ?: '-' }}</td>
                        <td>{{ $customer->alamat ?: '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
