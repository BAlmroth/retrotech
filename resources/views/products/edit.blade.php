@extends('layouts.app')

@section('content')
<main class="page-card-wrapper">
    <div class="page-card edit-container">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- uppdate name --}}
            <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name') <span class="field-error">{{ $message }}</span> @enderror
        </div>

            {{-- uppdate cat --}}
            <div>
            <label>Brand:</label>
            <select name="brand_id">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id') <span class="field-error">{{ $message }}</span> @enderror
            </div>

        {{-- uppdate cond --}}

        <div>
            <label>Condition:</label>
            <select name="condition_id">
                @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}"
                        {{ $product->condition_id == $condition->id ? 'selected' : '' }}>
                        {{ $condition->name }}
                    </option>
                @endforeach
            </select>
            @error('condition_id') <span class="field-error">{{ $message }}</span> @enderror
        </div>

            {{-- uppdate price --}}
        <div>
            <label>Price:</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
            @error('price') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        {{-- update description --}}
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- update buttom --}}


            <button class="button-main" type="submit">Update</button>
        </form>

        {{-- delete --}}
        <a href="{{ route('products.confirmDelete', $product->id) }}">Delete</a>
        <a href="{{ url()->previous() }}">Back</a>
    </div>
</main>

@endsection