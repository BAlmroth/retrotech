@extends('layouts.app')

@section('content')
<main class="page-card-wrapper">
    <div class="page-card create-container">
        <h1>Add Product</h1>
        
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            
            <div>
                <label for="name">Product name</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div>
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" required>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="condition_id">Condition</label>
                <select name="condition_id" id="condition_id" required>
                    @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="price">Price (kr)</label>
                <input type="number" name="price" id="price" step="0.01" required>
            </div>
            
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            
            <button class="button-main" type="submit">Create Product</button>
        </form>
    </div>
</main>
    @endsection