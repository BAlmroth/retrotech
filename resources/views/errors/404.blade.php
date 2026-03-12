@extends('layouts.app')

@section('content')
<div class="errorPage">
    <h1>Error: 404</h1>
    <p>Page does not exist</p>
    <a href="{{url()->previous() }}">Go to previous page</a>
</div>
    
@endsection