
@extends('layouts.buyer')

@section('title')
Unread Message Table | 
@endsection

@section('content')

<div class="container">


<br>
<hr>

	<section class="content">

@include('buyer/section/unread_message_table') 

</section>

</div>

@endsection