
@extends('layouts.app')

@section('title')
 {{ env('APP_NAME') }} 
@endsection



@section('content')

@include('layouts.user_partials.carousel')

@include('user/search')

@include('user/recent')

@include('user/advert')

@include('user/popular')



@endsection