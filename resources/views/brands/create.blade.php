@extends('layouts.app')
@section('content')
<main class="page-card-wrapper">
    <div class="page-card create-container">
        <h1>Add Brand</h1>


        <form action="{{ route('brands.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Brand name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    aria-describedby="name-error"
                    @error('name') aria-invalid="true" @enderror
                >
                @error('name')
                    <span class="field-error" id="name-error" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <button class="button-main" type="submit">Create Brand</button>
        </form>

        <a href="{{ url()->previous() }}">Back</a>
    </div>
</main>
@endsection