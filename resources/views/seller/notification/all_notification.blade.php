@extends('layouts.seller')

@section('title')
All Notification | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

	<section class="content">

@include('seller/section/all_notification_table') 

</section>


@endsection