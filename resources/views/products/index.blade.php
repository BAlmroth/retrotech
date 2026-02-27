@extends('layouts.app')

@section('content')
<h1>Products</h1>

@foreach ($products as $product)
<h3>{{ $product->name }}</h3>
<p>Brand: {{ $product->brand->name }}</p>   
<p>Condition: {{ $product->condition->name }}</p>
<p>Price: {{ $product->price }} kr</p>
<a href="{{ route('products.edit', $product->id) }}">Edit</a>
<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Product</button>
</form>
@endforeach

{{ $products->links() }}
@endsection