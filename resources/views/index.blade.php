@extends('layouts.app')

@section('content')

<main class="login-main">
    <form action="/login" method="post" aria-label="Logga in">
        @csrf
        <h1>Log in</h1>

        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" 
                   autocomplete="email" required />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" 
                   autocomplete="current-password" required />
        </div>

        <button class="button-main" type="submit">Log in</button>
    </form>
</main>

@endsection

