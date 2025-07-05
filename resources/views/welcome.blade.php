<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KloroStock</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f5f9f6;
            color: #2f3e46;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            color: #2a9d8f;
            margin-bottom: 10px;
        }

        h2 {
            font-weight: 300;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .buttons a {
            text-decoration: none;
            padding: 12px 24px;
            margin: 0 10px;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .buttons a.login {
            background-color: #2a9d8f;
            color: white;
        }

        .buttons a.login:hover {
            background-color: #21867a;
        }

        .buttons a.register {
            border: 2px solid #2a9d8f;
            color: #2a9d8f;
        }

        .buttons a.register:hover {
            background-color: #e0f4f2;
        }

        img.illustration {
            max-width: 400px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
            }

            img.illustration {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>KloroStock</h1>
        <h2>Selamat Datang di Website Stock Barang Minimarket</h2>

        <!-- Ilustrasi dari undraw.co (bebas pakai) -->
        <img class="illustration" src="https://undraw.co/api/illustrations/stock-image?search=warehouse"
            alt="Ilustrasi stok barang">

        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="login">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="login">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>

</html>
