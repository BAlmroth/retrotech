@extends('layouts.app')

@section('content')
<main class="page-card-wrapper">
    <div class="page-card create-container">
        <h1>Add Product</h1>
        
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            
            <div>
                <label for="name">Product name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id">
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
                @error('brand_id') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="condition_id">Condition</label>
                <select name="condition_id" id="condition_id">
                    @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}" {{ old('condition_id') == $condition->id ? 'selected' : '' }}>{{ $condition->name }}</option>
                    @endforeach
                </select>
                @error('condition_id') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="price">Price (kr)</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}">
                @error('price') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>
            
            <button class="button-main" type="submit">Create Product</button>
        </form>
        <a href="{{ url()->previous() }}">Back</a>
    </div>
</main>
@endsection