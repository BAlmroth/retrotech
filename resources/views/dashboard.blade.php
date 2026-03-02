@extends('layouts.app')

@section('content')

<section class="dash-container">

    <p>Hello, {{ $user->name }}!</p>
    
    <main class="dashboard">
        
        <section class="options">
            <h2>Dashboard</h2>
            <a class="button-main" href="{{ route('products.index') }}">All Products</a>
            <a class="button-main" href="{{ route('products.create') }}">Add Product</a>
            <a class="button-main" href="{{ route('products.index') }}">Edit Products</a>
        </section>
        
        <section class="quick-view">
            
            <h3>Quick View</h3>
            
            {{-- filetring --}}
            <form method="GET" action="{{ route('dashboard') }}">
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
                
                <button class="button-main" type="submit">Add Filter</button>
                <a href="{{ route('dashboard') }}">Clear</a>
            </form>
            
            <div class="quick-products">
                    {{-- quick overview of prodycts --}}
                    @forelse ($products as $product)
                    <div class="product-card">
                        <h3>{{ $product->name }}</h3>
                        <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
                        <p><strong>Condition:</strong> {{ $product->condition->name }}</p>
                        <p><strong>Price:</strong> {{ $product->price }} kr</p>
                        <a class="button-main" href="{{ route('products.show', $product->id) }}?from={{ url()->current() }}">
                            See More
                        </a>
                    </div>
                    @empty
                    <p>No products found.</p>
                    @endforelse
                    
                </div>
            {{ $products->links() }}
        </section>
    </main>
</section>
    @endsection