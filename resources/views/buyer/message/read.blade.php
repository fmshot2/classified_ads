
@extends('layouts.buyer')

@section('title')
Read Message Table | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

	<section class="content-header">
      <h1>
        Read Messages      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Read Messages</li>
      </ol>
    </section>
	<section class="content">

@include('buyer/section/read_message_table') 

</section>

</div>

@endsection