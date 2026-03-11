@extends('layouts.app')

@section('content')
<h1>Error: 404</h1>
<p>Page does not exist</p>
<a href="{{url()->previous() }}">Go to previous page</a>
    
@endsection