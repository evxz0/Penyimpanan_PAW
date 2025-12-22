<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid px-4">
                <a class="navbar-brand fw-bold text-info" href="{{ url('/') }}">
                    <i class="bi bi-box-seam"></i> Sistem Inventaris Owabong
                </a>
                
                @auth
                <button class="btn btn-link text-decoration-none text-dark d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-4"></i>
                </button>
                @endauth

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @auth
                <div class="container-fluid">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-md-3 col-lg-2 d-md-block sidebar collapse min-vh-100 p-0" id="sidebarMenu">
                             @include('partials.sidebar')
                        </div>
                        
                        <!-- Main Content -->
                        <div class="col-md-9 ms-sm-auto col-lg-10 bg-light min-vh-100 d-flex flex-column p-0">
                             <div class="flex-grow-1 px-4 py-4">
                                 @yield('content')
                             </div>
                             @include('partials.footer')
                        </div>
                    </div>
                </div>
            @else
                <div class="d-flex flex-column min-vh-100">
                    <div class="flex-grow-1 py-4">
                        @yield('content')
                    </div>
                    @include('partials.footer')
                </div>
            @endauth
        </main>
    </div>
    
    <style>
        .sidebar-content .nav-link {
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar-content .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
    </style>
</body>
</html>
