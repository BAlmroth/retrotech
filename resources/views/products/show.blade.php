@extends('layouts.app')

@section('content')
<main class="page-card-wrapper">
    <div class="page-card">

        <h1>{{ $product->name }}</h1>

        <table class="detail-table">
            <tr>
                <th>Brand</th>
                <td>{{ $product->brand->name }}</td>
            </tr>
            <tr>
                <th>Condition</th>
                <td>{{ $product->condition->name }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }} kr</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
        </table>

        <div class="product-actions">
            <a href="{{ route('products.edit', $product->id) }}" class="button-main">Edit</a>
            <a href="{{ route('products.confirmDelete', $product->id) }}" class="button-danger">Delete</a>
            <a href="{{ url()->previous() }}">Back</a>
        </div>

    </div>
</main>
@endsection