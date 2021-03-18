
@extends('layouts.agent')

@section('title')
Make Request | 
@endsection

@section('content')

  <section class="content">



<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Make Request
      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('agent.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Make Request</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
  <div class="row">
    @include('layouts.buyer_partials.status')
    <div class="col-md-6">
     @include('agent/section/request_form')  
    </div>

    <div class="col-md-6">
      @include('agent/section/account_summary')    
   </div>
 </div>


{{--  <div class="row">
  <div class="col-md-12 connectedSortable">
   @include('seller/section/all_service_table') 
 </div>
</div> --}}
<!-- Row end here -->

 <div class="row">

  <div class="col-md-6 connectedSortable">
  {{-- @include('seller/section/all_service_table') --}}
 </div>

 <div class="col-md-6 connectedSortable">
  {{-- @include('seller/section/active_service_table') --}}
 </div>

</div>

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


</section>

@endsection
