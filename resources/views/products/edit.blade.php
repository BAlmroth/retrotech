@extends('layouts.app')

@section('content')
<main class="page-card-wrapper">
    <div class="page-card edit-container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- update name --}}
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"
            value="{{ old('name', $product->name) }}"
            aria-describedby="name-error">
        @error('name')
            <span class="field-error" id="name-error" role="alert">{{ $message }}</span>
        @enderror
    </div>

    {{-- update brand --}}
    <div>
        <label for="brand_id">Brand:</label>
        <select name="brand_id" id="brand_id"
            aria-describedby="brand-error">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}"
                    {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>
        @error('brand_id')
            <span class="field-error" id="brand-error" role="alert">{{ $message }}</span>
        @enderror
    </div>

    {{-- update condition --}}
    <div>
        <label for="condition_id">Condition:</label>
        <select name="condition_id" id="condition_id"
            aria-describedby="condition-error">
            @foreach($conditions as $condition)
                <option value="{{ $condition->id }}"
                    {{ $product->condition_id == $condition->id ? 'selected' : '' }}>
                    {{ $condition->name }}
                </option>
            @endforeach
        </select>
        @error('condition_id')
            <span class="field-error" id="condition-error" role="alert">{{ $message }}</span>
        @enderror
    </div>

    {{-- update price --}}
    <div>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price"
            value="{{ old('price', $product->price) }}"
            aria-describedby="price-error">
        @error('price')
            <span class="field-error" id="price-error" role="alert">{{ $message }}</span>
        @enderror
    </div>

    {{-- update description --}}
    <textarea name="description" id="description" 
        aria-describedby="description-error">{{ old('description', $product->description) }}</textarea>
        @error('description')
        <span class="field-error" id="description-error" role="alert">{{ $message }}</span>
        @enderror

    <button class="button-main" type="submit">Update</button>
</form>

<a href="{{ route('products.confirmDelete', $product->id) }}">Delete</a>
<a href="{{ url()->previous() }}">Back</a>
</div>
</main>
@endsection