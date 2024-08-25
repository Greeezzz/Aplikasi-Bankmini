<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin-right: 16px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .card {
            background-color: #e0f7f7;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            background-color: #b2eaea;
        }

        .title {
            color: #007f7f;
        }

        .button {
            background-color: #007f7f;
        }

        .button:hover {
            background-color: #006666;
        }

        .text {
            color: #005f5f;
        }
    </style>
</head>
<body class="bg-cyan-600">
    <div class="flex justify-center items-center h-screen">
        <div class="card bg-white rounded-lg p-8 shadow-lg">
            <h1 class="title text-4xl font-bold mb-8">Welcome</h1>
            <a href="{{ route('login') }}" class="button hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full mb-8 inline-block">Login</a>
            <div class="flex items-center">
                <div class="avatar">
                    <img src="https://i.pinimg.com/736x/7d/ba/74/7dba745d31ae7e4af7865d9586e3d672.jpg" alt="Chelo">
                </div>
                <div>
                    <h2 class="title text-2xl font-bold">Creator 1</h2>
                    <p class="text text-gray-600">Name: Chelo Arung Samudro</p>
                    <p class="text text-gray-600">WhatsApp: 083875095310</p>
                    <p class="text text-gray-600">Class: XI A</p>
                    <p class="text text-gray-600">TikTok: @reezzznt</p>
                </div>
            </div>
            <div class="flex items-center mt-8">
                <div class="avatar">
                    <img src="https://i.pinimg.com/736x/15/11/b2/1511b2c6b680a945c1e9f48e73928e86.jpg" alt="Dewi">
                </div>
                <div>
                    <h2 class="title text-2xl font-bold">Creator 2</h2>
                    <p class="text text-gray-600">Name: Tri Buana Tunggal Dewi</p>
                    <p class="text text-gray-600">WhatsApp: 9876543210</p>
                    <p class="text text-gray-600">Class: XI A</p>
                    <p class="text text-gray-600">TikTok: @yukimorigl</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
