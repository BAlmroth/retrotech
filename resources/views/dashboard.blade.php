@extends('layouts.app')

@section('content')
<p>Hello, {{ $user->name }}!</p>

<a href="{{ route('products.create') }}">Add Product</a>
<a href="{{ route('products.index') }}">Edit Products</a>

<h2>Products</h2>
@foreach ($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>Brand: {{ $product->brand->name }}</p>
    <p>Condition: {{ $product->condition->name }}</p>
    <p>Price: {{ $product->price }} kr</p>
@endforeach

{{ $products->links() }}
@endsection