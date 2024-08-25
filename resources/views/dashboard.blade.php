<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Mini</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7f7;
            color: #007f7f;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px; /* Lebar maksimal card */
        }

        h1 {
            color: #005f5f;
            margin-bottom: 20px;
            text-align: left;
            font-size: 24px;
            font-weight: bold;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Spasi antara tombol */
        }

        .nav-link, .logout-button {
            background-color: #007f7f;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none; /* Menghapus garis bawah pada link */
            display: block;
        }

        .nav-link:hover, .logout-button:hover {
            background-color: #005f5f;
            transform: scale(1.05);
        }

        .logout-button {
            background-color: #ff6666;
        }

        .logout-button:hover {
            background-color: #cc3333;
        }

    </style>
</head>
<body>
    <div class="dashboard">
        @if (Auth::user()->peran == 'admin')
            <h1>Admin Dashboard</h1>
            <div class="button-group">
                <a href="{{ route('user.index') }}" class="nav-link">User / Nasabah</a>
                <a href="{{ route('admin.laporan') }}" class="nav-link">Laporan</a>
            </div>
            <div class="mt-4">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="logout-button w-full">Logout</button>
                </form>
            </div>
        @elseif (Auth::user()->peran == 'nasabah')
            <h1>Nasabah Dashboard</h1>
            <div class="button-group">
                <a href="{{ route('nasabah.index') }}" class="nav-link">Laporan</a>
            </div>
            <div class="mt-4">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="logout-button w-full">Logout</button>
                </form>
            </div>
        @elseif (Auth::user()->peran == 'teller')
            <h1>Teller Dashboard</h1>
            <div class="button-group">
                <a href="{{ route('transaksi.index') }}" class="nav-link">Transaksi</a>
            </div>
            <div class="mt-4">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="logout-button w-full">Logout</button>
                </form>
            </div>
        @endif
    </div>
</body>
</html>