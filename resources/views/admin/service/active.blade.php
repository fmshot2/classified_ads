
@extends('layouts.admin')

@section('title')
Active Service | 
@endsection

@section('content')



<div class="wrapper" style="min-height: 868px;">


@include('layouts.backend_partials.status')
@include('admin/section/active_service_table') 



@endsection