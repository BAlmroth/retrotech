@extends('layouts.app')
@section('content')
    @include('products._table', ['filterRoute' => route('products.index')])
@endsection