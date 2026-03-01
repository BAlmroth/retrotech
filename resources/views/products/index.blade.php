@extends('layouts.app')

@section('content')
<h1>Products Page</h1>

<form method="GET" action="{{ route('products.index') }}">
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
    <a href="{{ route('products.index') }}">Clear</a>
</form>

@forelse ($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>Brand: {{ $product->brand->name }}</p>
    <p>Condition: {{ $product->condition->name }}</p>
    <p>Price: {{ $product->price }} kr</p>
    <p>Description: {{ $product->description }}</p>
    <a href="{{ route('products.show', $product->id) }}?from={{ url()->current() }}">See More</a>
    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
    <a href="{{ route('products.confirmDelete', $product->id) }}">Delete</a>
@empty
    <p>No products found.</p>
@endforelse

{{ $products->links() }}
@endsection