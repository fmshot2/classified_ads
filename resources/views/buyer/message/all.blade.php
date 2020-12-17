@extends('layouts.buyer')

@section('title')
All Message Table | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

@include('layouts.buyer_partials.status')

	<section class="content">

@include('buyer/section/all_message_table') 

</section>

</div>

@endsection