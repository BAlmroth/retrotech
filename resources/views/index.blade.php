@extends('layouts.app')

@section('content')

<main class="page-card-wrapper page-card-wrapper--centered">
    <div class="page-card login-form">
        @include('partials.alerts')
        <form action="/login" method="post" aria-label="Log in">
            @csrf
            <h1>Log in</h1>

            <div>
                <label for="email">Email</label>
                <input name="email" id="email" type="email"
                    autocomplete="email" value="{{ old('email') }}">
                @error('email') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password" type="password"
                    autocomplete="current-password">
            </div>

            <button class="button-main" type="submit">Log in</button>
        </form>
    </div>
</main>

@endsection