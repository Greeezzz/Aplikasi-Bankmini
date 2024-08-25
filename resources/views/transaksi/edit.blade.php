<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            background-color: #00bcd4;
            color: white;
            border-radius: 0.375rem;
        }
        .btn-primary:hover {
            background-color: #0097a7;
        }
        .btn-secondary {
            background-color: #00796b;
            color: white;
            border-radius: 0.375rem;
        }
        .btn-secondary:hover {
            background-color: #004d40;
        }
        .form-section {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    @if (Auth::user()->peran == 'teller')
        <a href="{{ route('transaksi.index') }}" class="btn-secondary hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali ke Dashboard</a>
        <br><br>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Informasi Nasabah</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nama</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $transaksi->user->name }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">KTP</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $transaksi->user->ktp }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $transaksi->user->email }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">No HP</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $transaksi->user->hp }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" class="form-section">
            @csrf
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Simpan Tabungan</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <input type="hidden" name="user_id" value="{{ $transaksi->user_id }}">
                            <dt class="text-sm font-medium text-gray-500">Nominal</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <input type="number" name="tabungan" id="tabungan" class="border border-gray-300 rounded-md py-2 px-4" value="{{ $transaksi->tabungan }}">
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <br>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    @endif
</body>
</html>