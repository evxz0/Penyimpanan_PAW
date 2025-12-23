<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Inventaris Owabong') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f6fcff;
        }

        .login-wrapper {
            min-height: 100vh;
        }

        .login-left {
            background: linear-gradient(180deg, #eaf7fb 0%, #f6fcff 100%);
        }

        .login-illustration {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .login-card {
            width: 420px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }

        .login-input {
            height: 52px;
            border-radius: 12px;
            font-size: 14px;
        }

        .login-input:focus {
            border-color: #00b7e4;
            box-shadow: 0 0 0 3px rgba(0,183,228,.25);
        }

        .login-btn {
            height: 52px;
            border-radius: 12px;
            font-weight: 600;
            background: #00b7e4;
            border: none;
        }

        .login-btn:hover {
            background: #009ec5;
        }

        .btn-outline-login {
            border-radius: 12px;
            height: 48px;
            font-weight: 600;
            color: #00b7e4;
            border-color: #00b7e4;
        }

        .btn-outline-login:hover {
            background: #00b7e4;
            color: #fff;
        }
    </style>
</head>

<body>
<div id="app">

@auth
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-semibold text-info" href="{{ url('/') }}">
            <i class="bi bi-box-seam"></i> Sistem Inventaris Owabong
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 p-0">
            @include('partials.sidebar')
        </div>

        <div class="col-md-9 col-lg-10 bg-light min-vh-100 p-4">
            @yield('content')
        </div>
    </div>
</main>
@else
    @yield('content')
@endauth

</div>
</body>
</html>
