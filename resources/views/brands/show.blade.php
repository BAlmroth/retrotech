@extends('layouts.app')
@section('content')
<main class="page-card-wrapper">
    <div class="page-card">

        <h1>{{ $brand->name }}</h1>
        <p>{{ $products->total() }} products</p>

        <table class="products-table">
            <caption class="sr-only">Products under {{ $brand->name }}</caption>
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr data-href="{{ route('products.show', $product->id) }}">
                    <td data-label="#id">{{ $product->id }}</td>
                    <td data-label="Name">{{ $product->name }}</td>
                    <td data-label="Condition">{{ $product->condition->name }}</td>
                    <td data-label="Price">{{ $product->price }} kr</td>
                    <td data-label="Actions" class="actions">
                        <a href="{{ route('products.show', $product->id) }}" aria-label="View {{ $product->name }}">
                            View <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" aria-label="Edit {{ $product->name }}">
                            Edit <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="{{ route('products.confirmDelete', $product->id) }}" class="danger" aria-label="Delete {{ $product->name }}">
                            Delete <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->links() }}

        <div class="product-actions">
            <a href="{{ route('brands.edit', $brand->id) }}" class="button-main">Edit Brand</a>
            <a href="{{ route('brands.confirmDelete', $brand->id) }}" class="button-danger">Delete Brand</a>
            <a href="{{ route('brands.index') }}" aria-label="Back to brands">Back</a>
        </div>

    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('tr[data-href]').forEach(row => {
            row.addEventListener('click', (e) => {
                if (!e.target.closest('a')) {
                    window.location = row.dataset.href;
                }
            });
        });
    });
</script>
@endsection