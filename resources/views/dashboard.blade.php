@extends('layouts.app')
@section('content')
<div class="admin-layout">

    <aside class="sidebar" aria-label="Statistics">
        <p class="sidebar-title">Stats</p>

        <div class="stat-card">
            <span>Products</span>
            <strong>{{ $totalProducts }}</strong>
        </div>
        <div class="stat-card">
            <span>Brands</span>
            <strong>{{ $totalBrands }}</strong>
        </div>
        <div class="stat-card stat-card--latest">
            <span>Latest Added</span>
            <strong>
                <a href="{{ route('products.show', $latestProduct->id) }}"
                   aria-label="View latest product: {{ $latestProduct->name ?? '—' }}">
                   <i class="fa-solid fa-eye"></i>
                    {{ $latestProduct->name ?? '—' }}
                </a>
            </strong>
            <small>{{ $latestProduct?->created_at->format('d M Y') ?? '' }}</small>
        </div>
        <div class="stat-card stat-card--latest">
            <span>Oldest</span>
            <strong>
                <a href="{{ route('products.show', $oldestProduct->id) }}"
                   aria-label="View oldest product: {{ $oldestProduct->name ?? '—' }}">
                    <i class="fa-solid fa-eye"></i>
                    {{ $oldestProduct->name ?? '—' }}
                </a>
            </strong>
            <small>{{ $oldestProduct?->created_at->format('d M Y') ?? '' }}</small> 
        </div>
    </aside>

    <div class="admin-main">
        <section class="greeting">
            <p>Hello, {{ $user->name }}!</p>
            <h2>Dashboard</h2>
        </section>
        @include('products._table', ['filterRoute' => route('dashboard')])
    </div>

</div>
@endsection