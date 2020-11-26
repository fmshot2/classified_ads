
@extends('layouts.app')

@section('title')
 {{ env('APP_NAME') }} 
@endsection



@section('content')

@include('carousel')

@include('search')

@include('recent')

@include('advert')

@include('popular')

@endsection