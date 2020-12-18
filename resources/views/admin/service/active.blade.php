
@extends('layouts.admin')

@section('title')
Active Service | 
@endsection

@section('content')

<br>
<hr>

<div class="wrapper" style="min-height: 868px;">

    <section class="content">


@include('admin/section/active_service_table') 

</section>

</div>

@endsection