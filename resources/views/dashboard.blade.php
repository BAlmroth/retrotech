@extends('layouts.app')
@section('content')
<section class="dash-container">
    <main class="dashboard">
        <section class="greeting">
            <p>Hello, {{ $user->name }}!</p>
            <h2>Dashboard</h2>
        </section>
        @include('products._table', ['filterRoute' => route('dashboard')])
    </main>
</section>
@endsection