
@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')

@include('section/carousel')

@include('section/search')

@include('section/feature')

@include('section/popular')

@include('section/recent')

@include('section/advert')


@endsection