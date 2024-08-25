<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-cyan-custom {
            background-color: #00bcd4;
        }
        .hover\:bg-cyan-custom-hover:hover {
            background-color: #0097a7;
        }
        .text-cyan-custom {
            color: #00bcd4;
        }
        .border-cyan-custom {
            border-color: #00bcd4;
        }
        .bg-cyan-light {
            background-color: #e0f7fa;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    @if(Auth::user()->peran == 'admin')
    <div class="w-full max-w-6xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('dashboard') }}" class="bg-cyan-custom hover:bg-cyan-custom-hover text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:scale-105">Kembali</a>
            <a href="{{ route('user.create') }}" class="bg-cyan-custom hover:bg-cyan-custom-hover text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:scale-105">Tambah User / Nasabah</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-cyan-light text-gray-700">
                        <th class="px-6 py-4 border border-cyan-custom text-left font-semibold">KTP</th>
                        <th class="px-6 py-4 border border-cyan-custom text-left font-semibold">Nama</th>
                        <th class="px-6 py-4 border border-cyan-custom text-left font-semibold">Email</th>
                        <th class="px-6 py-4 border border-cyan-custom text-left font-semibold">HP</th>
                        <th class="px-6 py-4 border border-cyan-custom text-left font-semibold">Peran</th>
                        <th class="px-6 py-4 border border-cyan-custom text-left font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-cyan-light transition-colors duration-200 ease-in-out">
                        <td class="border px-6 py-4">{{ $user->ktp }}</td>
                        <td class="border px-6 py-4">{{ $user->name }}</td>
                        <td class="border px-6 py-4">{{ $user->email }}</td>
                        <td class="border px-6 py-4">{{ $user->hp }}</td>
                        <td class="border px-6 py-4">{{ $user->peran }}</td>
                        <td class="border px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                @if($user->peran == 'nasabah')
                                <a href="{{ route('admin.laporan.cetakpilih', ['id' => $user->id]) }}" class="bg-cyan-custom hover:bg-cyan-custom-hover text-white font-semibold py-1 px-3 rounded transition duration-200 ease-in-out transform hover:scale-105">Cetak</a>
                                @endif
                                <a href="{{ route('user.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-1 px-3 rounded transition duration-200 ease-in-out transform hover:scale-105">Edit</a>
                                <a href="{{ route('user.delete', $user->id)}}" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded transition duration-200 ease-in-out transform hover:scale-105">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="p-6">
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg shadow-lg text-center max-w-md mx-auto">
            <h1 class="text-xl font-bold">Akses Ditolak</h1>
            <p class="mt-4">Anda tidak memiliki hak untuk masuk ke halaman ini.</p>
        </div>
    </div>
    @endif
</body>
</html>