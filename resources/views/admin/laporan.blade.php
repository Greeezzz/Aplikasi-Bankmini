<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #E5E7EB;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #F9FAFB;
            color: #374151;
        }
        tbody tr:nth-child(even) {
            background-color: #F3F4F6;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Laporan Admin</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200">No</th>
                <th class="py-2 px-4 border-b border-gray-200">Tanggal Transaksi</th>
                <th class="py-2 px-4 border-b border-gray-200">Nasabah</th>
                <th class="py-2 px-4 border-b border-gray-200 text-right">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semuaTransaksi as $transaction)
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->created_at->format('d-m-Y') }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->user->name }}</td>
                <td class="py-2 px-4 border-b border-gray-200 text-right">{{ number_format($transaction->tabungan, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
