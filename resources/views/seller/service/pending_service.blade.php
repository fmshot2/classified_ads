
@extends('layouts.seller')

@section('title')
Active Service | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

@include('seller/section/pending_service_table') 

@endsection