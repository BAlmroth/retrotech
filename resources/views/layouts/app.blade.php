<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroTech</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    
    @auth
    <header>
        <nav aria-label="Main navigation">
            <a class="logo" href="{{ route('dashboard')}}">Retrotech</a>

            <div class="nav-right">
                <a href="{{ route('dashboard')}}">Dashboard</a>
                <a href="{{ route('products.index') }}">Products</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </nav>  
    </header>
    @endauth

    @include('partials.alerts')

    @yield('content')

    <footer class="site-footer">
            <p class="footer-copy">© 2025 RetroTech</p>
    </footer>
</body>
</html>