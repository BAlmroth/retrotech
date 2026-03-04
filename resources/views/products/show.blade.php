@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>Brand: {{ $product->brand->name }}</p>
<p>Condition: {{ $product->condition->name }}</p>
<p>Price: {{ $product->price }} kr</p>
<p>In Stock: {{ $product->in_stock ? 'Yes' : 'No' }}</p>
<p>Description: {{ $product->description }}</p>

<a href="{{ route('products.edit', $product->id) }}">Edit</a>
<a href="{{ route('products.confirmDelete', $product->id) }}">Delete</a>
<a href="{{ url()->previous() }}">Back</a>
@endsection