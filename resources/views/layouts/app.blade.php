<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>

    @auth
    <nav>
        <a href="{{ route('dashboard')}}">Dashboard</a>
        <a href="{{ route('products.index') }}">Products</a>
    <form action="" method="GET">
        {{-- <select onchange="if(this.value) { window.location.href=this.value }">
            {{-- <option value="">Brands</option>
            @foreach($brands as $brand)
                <option value="{{ route('products.byBrand', $brand->id) }}">
                    {{ $brand->name }}
                </option>
            @endforeach 
        </select> --}}
    </form> 

        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    </nav>

    @include('partials.alerts')

    @yield('content')

    @endauth
</body>
</html>