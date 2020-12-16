
@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')


@include('layouts.frontend_partials.status')

@include('frontend_section/carousel')

@include('frontend_section/search')

@include('frontend_section/feature')

@include('frontend_section/recent')

@include('frontend_section/brands')


@include('frontend_section/popular')






@endsection