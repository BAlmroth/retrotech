@extends('layouts.app')

@section('content')

<main class="page-card-wrapper page-card-wrapper--centered">
    <div class="page-card delete-container">
        <h1>Delete product</h1>
        <p>Are you sure that you want to delete: <strong>{{ $product->name }}</strong>?</p>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="button-main" type="submit">Yes, delete</button>
            <button type="button" onclick="window.location='{{ route('products.index') }}'">Cancel</button>
        </form>
    </div>
</main>
@endsection