<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            background-color: #00bcd4; /* Cyan */
            color: white;
            border-radius: 0.375rem; /* Rounded corners */
        }
        .btn-primary:hover {
            background-color: #0097a7; /* Darker cyan */
        }
        .btn-secondary {
            background-color: #00796b;
            color: white;
            border-radius: 0.375rem;
        }
        .btn-secondary:hover {
            background-color: #004d40;
        }
        .table-header {
            background-color: #e0f7fa;
            color: #00796b;
        }
        .table-row:nth-child(even) {
            background-color: #f0f4f4;
        }
        .table-row:hover {
            background-color: #b2ebf2;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    @if (Auth::user()->peran == 'teller')
        <div class="mb-4">
            <a href="{{ route('transaksi.create') }}" class="btn-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Tambah Transaksi</a>
            <a href="{{ route('dashboard') }}" class="btn-secondary hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali ke Dashboard</a>
        </div>
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-md">
            <thead>
                <tr class="table-header">
                    <th class="py-2 px-4 border-b border-gray-200">No</th>
                    <th class="py-2 px-4 border-b border-gray-200">Tanggal Transaksi</th>
                    <th class="py-2 px-4 border-b border-gray-200">Nasabah</th>
                    <th class="py-2 px-4 border-b border-gray-200">Nominal</th>
                    <th class="py-2 px-4 border-b border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semuaTransaksi as $transaction)
                <tr class="table-row">
                    <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->created_at }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->user->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->tabungan }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a href="{{ route('transaksi.edit', $transaction->id) }}" class="btn-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                        <a href="{{ route('transaksi.delete', $transaction->id) }}" class="btn-secondary hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>