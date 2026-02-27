@if ($errors->any())
    <div class="alert alert-error" role="alert" aria-live="assertive">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="status" aria-live="polite">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error" role="alert">
        {{ session('error') }}
    </div>
@endif