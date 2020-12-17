@extends('layouts.buyer')

@section('title')
All Notification | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

	<section class="content">

@include('buyer/section/all_notification_table') 

</section>

@endsection