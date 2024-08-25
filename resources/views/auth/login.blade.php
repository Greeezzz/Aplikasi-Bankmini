<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0891b2; /* Hex untuk bg-cyan-600 */
        }
        .card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .card h2 {
            color: #0e7490;
            font-size: 1.875rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }
        .card label {
            color: #0e7490;
            font-weight: 600;
        }
        .card input {
            border-color: #0891b2;
            border-radius: 0.5rem;
            margin-top: 0.25rem;
            width: 100%;
            padding: 0.5rem;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .card input:focus {
            border-color: #0e7490;
            box-shadow: 0 0 0 4px rgba(8, 145, 178, 0.3);
        }
        .card a {
            color: #64748b;
            text-decoration: underline;
            transition: color 0.3s ease;
        }
        .card a:hover {
            color: #0e7490;
        }
        .card button {
            background-color: #0891b2;
            color: #ffffff;
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-left: 0.75rem;
            transition: background-color 0.3s ease;
        }
        .card button:hover {
            background-color: #0e7490;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="card w-full max-w-md">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:ring-cyan-500">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="submit">
                    Log in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
