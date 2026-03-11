@extends('layouts.app')
@section('content')
<main class="dashboard">
    <section class="dash-container">
        <section class="greeting">
            <p>Hello, {{ $user->name }}!</p>
            <h2>Dashboard</h2>
        </section>
        @include('products._table', ['filterRoute' => route('dashboard')])
    </section>
</main>
@endsection