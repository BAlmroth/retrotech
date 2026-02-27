@extends('layouts.app')

@section('content')
<h1>Delete product</h1>
<p>Are you sure that you want to delete: <strong>{{ $product->name }}</strong>?</p>

<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Yes, delete</button>
    <a href="{{ route('products.index') }}">Exit</a>
</form>
@endsection