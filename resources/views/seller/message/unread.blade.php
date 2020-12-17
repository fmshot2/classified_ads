
@extends('layouts.seller')

@section('title')
Unread Message Table | 
@endsection

@section('content')

<div class="container">


<br>
<hr>
	<section class="content">


@include('seller/section/unread_message_table') 

</section>


</div>

@endsection