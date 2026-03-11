@extends('layouts.app')

@section('content')

<h1>{{ $product->name }}</h1>

<h2>Products</h2>

<ul>
    @foreach ($product as $product)
    <li>{{ $product->name }}</li>
    @endforeach
</ul>
@endsection