@extends('layouts.app')

@section('content')
<p>Hello, {{ $user->name }}!</p>

<h2>Dashboard</h2>
<a href="{{ route('products.index') }}">All Products</a>
<a href="{{ route('products.create') }}">Add Product</a>
<a href="{{ route('products.index') }}">Edit Products</a>


<h3>Quick View</h3>

{{-- filetring --}}
<form method="GET" action="{{ route('dashboard') }}">
    <select name="brand_id">
        <option value="">All Brands</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    <select name="condition_id">
        <option value="">All Conditions</option>
        @foreach ($conditions as $condition)
            <option value="{{ $condition->id }}" {{ request('condition_id') == $condition->id ? 'selected' : '' }}>
                {{ $condition->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Add Filter</button>
    <a href="{{ route('dashboard') }}">Clear</a>
</form>

{{-- quick overview of prodycts --}}
@forelse ($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>Brand: {{ $product->brand->name }}</p>
    <p>Condition: {{ $product->condition->name }}</p>
    <p>Price: {{ $product->price }} kr</p>
    <a href="{{ route('products.show', $product->id) }}?from={{ url()->current() }}">See More</a>
@empty
    <p>No products found.</p>
@endforelse

{{ $products->links() }}
@endsection