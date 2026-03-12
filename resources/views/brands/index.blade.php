@extends('layouts.app')
@section('content')
<main class="page-card-wrapper">
    <div class="products-index">

        <div class="index-header">
            <h2>Brands</h2>
            <form method="GET" action="{{ route('brands.create') }}">
                <button class="button-main" type="submit">+ Add Brand</button>
            </form>
        </div>

        <p class="productsCount">Showing ({{ $brands->count() }}) brands</p>

        <table class="products-table">
            <caption class="sr-only">Brand list</caption>
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Products</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                <tr data-href="{{ route('brands.show', $brand->id) }}">
                    <td data-label="#id">{{ $brand->id }}</td>
                    <td data-label="Name">{{ $brand->name }}</td>
                    <td data-label="Products">{{ $brand->products_count }}</td>
                    <td data-label="Actions" class="actions">
                        <a href="{{ route('brands.show', $brand->id) }}" aria-label="View {{ $brand->name }}">
                            View <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('brands.edit', $brand->id) }}" aria-label="Edit {{ $brand->name }}">
                            Edit <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="{{ route('brands.confirmDelete', $brand->id) }}" class="danger" aria-label="Delete {{ $brand->name }}">
                            Delete <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty">No brands found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

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