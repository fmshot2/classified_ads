
@extends('layouts.admin')

@section('title')
Active Service | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

@include('admin/section/active_service_table') 

</div>

@endsection