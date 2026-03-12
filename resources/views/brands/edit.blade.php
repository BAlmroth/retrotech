@extends('layouts.app')
@section('content')
<main class="page-card-wrapper">
    <div class="page-card edit-container">
        <h1>Edit Brand</h1>

        <form action="{{ route('brands.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Brand name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $brand->name) }}"
                    aria-describedby="name-error"
                    @error('name') aria-invalid="true" @enderror
                >
                @error('name')
                    <span class="field-error" id="name-error" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <button class="button-main" type="submit">Update</button>
        </form>
    <div class="product-actions">
        <a class="button-danger" href="{{ route('brands.confirmDelete', $brand->id) }}">Delete</a>
        <a href="{{ url()->previous() }}">Back</a>
    </div>
    </div>
</main>
@endsection