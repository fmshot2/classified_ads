
@extends('layouts.seller')

@section('title')
All Service | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

@include('layouts.backend_partials.status')

@include('seller/section/all_service_table') 

@endsection