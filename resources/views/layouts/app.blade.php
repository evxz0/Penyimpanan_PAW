<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Inventaris Owabong</title>


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body style="background:#EAF7FF; font-family: 'Poppins', sans-serif;">
<div id="app">

@auth
    <div class="d-flex">
        

        <aside class="sidebar shadow-sm" style="width:250px; background:#B4E1F3; min-height:100vh;">
            @include('partials.sidebar')
        </aside>


        <main class="flex-grow-1 p-4" style="background:#F6FCFF; min-height:100vh;">
            @yield('content')
        </main>
    </div>

@else
    @yield('content')
@endauth

</div>
</body>
</html>
