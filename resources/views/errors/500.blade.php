@extends('layouts.app')

@section('content')
<div class="errorPage">
    <h1>Error: 500</h1>
    <p>Something went wrong, please try again or reach out to support:</p>
    <p>support@retrotech.se</p>
    <a href="{{url()->previous() }}">Go to previous page</a>
</div>
    
@endsection