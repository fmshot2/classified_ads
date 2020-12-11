


@extends('layouts.seller')

@section('title')
All Message Table | 
@endsection

@section('content')

<div class="container">

@include('layouts.seller_partials.status')
@include('seller/section/all_message_table') 

</div>

@endsection