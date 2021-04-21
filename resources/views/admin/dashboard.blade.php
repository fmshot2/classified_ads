@extends('layouts.admin')

@section('title', 'Admin | ')

@section('content')

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-briefcase text-white" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
                <a href="{{ route('admin.service.all') }}">
                    <span class="info-box-text"> All Service{{ $all_service_count > 1 ? 's' : '' }} </span>
                    <span class="info-box-number"> {{ $all_service_count }} </span>
                </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-tags text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Categories </span>
              <span class="info-box-number"> {{ $all_categories_count }} </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

       <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-eye text-white" aria-hidden="true"></i>  </span>

                <div class="info-box-content">
                    <span class="info-box-text"> All User{{ $all_users_count > 1 ? 's' : '' }} </span>
                    <span class="info-box-number"> {{ $all_users_count }} </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-group text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
                <a href="{{ route('admin.seller') }}">
                    <span class="info-box-text"> All Provider{{ $all_sellers_count > 1 ? 's' : '' }} </span>
                    <span class="info-box-number"> {{ $all_sellers_count }} </span>
                </a>
           </div>
           <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-eye text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <a href="{{ route('admin.buyer') }}">
                <span class="info-box-text"> All Seeker{{ $all_buyers_count > 1 ? 's' : '' }} </span>
                <span class="info-box-number"> {{ $all_buyers_count }} </span>
            </a>
         </div>
         <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
     </div>
     <!-- /.col -->

     <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-check text-white" aria-hidden="true"></i>  </span>

        <div class="info-box-content">
          <span class="info-box-text"> Active Service{{ $active_service_count > 1 ? 's' : '' }} </span>
          <span class="info-box-number"> {{ $active_service_count }} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-ban text-white" aria-hidden="true"></i> </span>

        <div class="info-box-content">
          <a href="{{ route('admin.service.all') }}">
            <span class="info-box-text"> Pending Service{{ $pending_service_count > 1 ? 's' : '' }} </span>
            <span class="info-box-number"> {{ $pending_service_count }} </span>
          </a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-comments-o text-white" aria-hidden="true"></i> </span>

        <div class="info-box-content">
          <span class="info-box-text"> User Feedback{{ $feedbacks->count() > 1 ? 's' : '' }} </span>
          <span class="info-box-number"> {{ $feedbacks->count() }} </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

  </div>

  <div class="row">
    <div class="col-md-6 connectedSortable">
      <!-- Category Table -->
      @include('admin/section/all_service_table')
    </div>
    <div class="col-md-6 connectedSortable">
      @include('admin/section/active_service_table')
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 connectedSortable">
      <!-- Category Table -->
      @include('admin/section/seller_table')
    </div>
    <div class="col-md-6 connectedSortable">
      @include('admin/section/buyer_table')
    </div>
  </div>

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


@endsection
