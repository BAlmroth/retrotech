@extends('layouts.app')
@section('content')
<main class="page-card-wrapper page-card-wrapper--centered">
    <div class="page-card delete-container">
        <h1>Delete brand</h1>
        <p>Are you sure that you want to delete: <strong>{{ $brand->name }}</strong>?</p>
        @if($brand->products_count > 0)
            <p class="field-error">Warning, can not delete: this brand has {{ $brand->products_count }} product(s) assigned to it.</p>
        @endif

        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="button-danger" type="submit" {{ $brand->products_count > 0 ? 'disabled' : '' }}>Yes, delete</button>
            <a href="{{ route('dashboard')}}">Back to Dashboard</a>
        </form>
    </div>
</main>
@endsection