@extends('layouts.app')

@section('content')
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Product name" required>

    <select name="brand_id" required>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>

    <select name="condition_id" required>
        @foreach($conditions as $condition)
            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
        @endforeach
    </select>

    <input type="number" name="price" placeholder="Price" step="0.01" required>

    <select name="in_stock" required>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>

    <textarea name="description" placeholder="Description" required></textarea>

    <button class="button-main" type="submit">Create Product</button>
</form>
@endsection