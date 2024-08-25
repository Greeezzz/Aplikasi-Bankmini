<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Nasabah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            background-color: #06b6d4;
            color: white;
            border-radius: 0.375rem; 
        }
        .btn-primary:hover {
            background-color: #0891b2;
        }
        .btn-secondary {
            background-color: #0e7490;
            color: white;
            border-radius: 0.375rem;
        }
        .btn-secondary:hover {
            background-color: #155e75;
        }
        .table-container {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #bae6fd;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #e0f2fe;
        }
        tbody tr:nth-child(even) {
            background-color: #f0f9ff;
        }
        tbody tr:hover {
            background-color: #e0f2fe;
        }
    </style>
</head>
<body class="bg-cyan-50 p-6">
    @if(Auth::user()->peran == 'nasabah')
        <div class="flex space-x-4 mb-6">
            <a href="{{ route('dashboard') }}" class="btn-secondary text-white font-bold py-2 px-4 rounded">Kembali</a>
            <a href="{{ route('nasabah.cetak') }}" target="_blank" class="btn-primary text-white font-bold py-2 px-4 rounded">Cetak Laporan Nasabah</a>
        </div>
        
        <h1 class="text-2xl font-bold mb-4 text-cyan-800">Detail Nasabah</h1>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-lg table-container">
            <table>
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">KTP</th>
                        <th class="py-2 px-4 border-b text-right">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4">{{ Auth::user()->name }}</td>
                        <td class="py-2 px-4">{{ Auth::user()->email }}</td>
                        <td class="py-2 px-4">{{ Auth::user()->ktp }}</td>
                        <td class="py-2 px-4 text-right">{{ number_format($semuaTransaksi->sum('tabungan'), 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="text-xl font-semibold mt-8 mb-4 text-cyan-800">Riwayat Transaksi</h2>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-lg table-container">
            <table>
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nomor</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b text-right">Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($semuaTransaksi as $transaction)
                    <tr>
                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4">{{ $transaction->created_at->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 text-right">{{ number_format($transaction->tabungan, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h1 class="text-xl font-bold text-red-600">Anda tidak memiliki hak untuk masuk ke halaman ini</h1>
    @endif
</body>
</html>
