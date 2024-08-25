<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-cyan-custom {
            background-color: #00bcd4;
        }
        .bg-cyan-custom-dark:hover {
            background-color: #0097a7;
        }
        .border-cyan-custom {
            border-color: #00bcd4;
        }
        .ring-cyan-custom {
            box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.3);
        }
        .ring-cyan-custom:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(0, 188, 212, 0.5);
            transform: scale(1.02);
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    @if(Auth::user()->peran == 'admin')
    <a href="{{ route('user.index') }}" class="bg-cyan-custom hover:bg-cyan-custom-dark text-white font-bold py-2 px-4 rounded mb-6 inline-block transition duration-300 ease-in-out transform hover:scale-105">Kembali</a>
    
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit User / Nasabah</h2>
        <form action="{{ route('user.update', $edit->id) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="ktp" class="block text-gray-700 text-sm font-bold mb-2">KTP</label>
                <input type="text" name="ktp" id="ktp" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ring-cyan-custom focus:border-cyan-custom transition duration-300 @error('ktp') border-red-500 @enderror" value="{{ $edit->ktp }}">
            </div>
            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ring-cyan-custom focus:border-cyan-custom transition duration-300 @error('name') border-red-500 @enderror" value="{{ $edit->name }}">
            </div>
            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ring-cyan-custom focus:border-cyan-custom transition duration-300 @error('email') border-red-500 @enderror" value="{{ $edit->email }}">
            </div>
            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ring-cyan-custom focus:border-cyan-custom transition duration-300 @error('password') border-red-500 @enderror">
            </div>
            <div>
                <label for="hp" class="block text-gray-700 text-sm font-bold mb-2">HP</label>
                <input type="text" name="hp" id="hp" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ring-cyan-custom focus:border-cyan-custom transition duration-300 @error('hp') border-red-500 @enderror" value="{{ $edit->hp }}">
            </div>
            <div>
                <label for="peran" class="block text-gray-700 text-sm font-bold mb-2">Peran</label>
                <select name="peran" id="peran" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ring-cyan-custom focus:border-cyan-custom transition duration-300 @error('peran') border-red-500 @enderror">
                    <option @if($edit->peran == 'admin') selected @endif value="admin">Admin</option>
                    <option @if($edit->peran == 'teller') selected @endif value="teller">Teller</option>
                    <option @if($edit->peran == 'nasabah') selected @endif value="nasabah">Nasabah</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-cyan-custom hover:bg-cyan-custom-dark text-white font-bold py-2 px-4 rounded-lg transition duration-300 transform hover:scale-105 ring-cyan-custom">Submit</button>
        </form>
    </div>
    @else
    <div class="p-6 text-center">
        <h1 class="text-red-600 font-bold text-xl">Anda Tidak Berhak Mengakses Halaman ini</h1>
        <p class="mt-2">Akses ini dibatasi untuk admin saja.</p>
    </div>
    @endif
</body>
</html>