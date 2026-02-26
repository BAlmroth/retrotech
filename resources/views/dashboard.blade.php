@include('errors')

<p>Hello, {{ $user->name }}!</p>

<h2>Options</h2>
<div class="grid">
    <a href="{{ route('products.index') }}" class="card">Show all products</a>
    <a href="{{ route('products.create') }}" class="card">Add Product</a>
</div>

<h2>Choose Brand</h2>
<div class="grid">
    @foreach ($brands as $brand)
        <a href="{{ route('products.byBrand', $brand->id) }}" class="card">{{ $brand->name }}</a>
    @endforeach
</div>


<a href="/logout"> logout </a>