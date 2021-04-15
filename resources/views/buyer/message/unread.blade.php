
@extends('layouts.buyer')

@section('title')
Unread Message Table | 
@endsection

@section('content')

<div class="container">
<section class="content-header">
      <h1>
        Unread Messages      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Unread Messages</li>
      </ol>
    </section>

<br>
<hr>

	<section class="content">

@include('buyer/section/unread_message_table') 

</section>

</div>

@endsection