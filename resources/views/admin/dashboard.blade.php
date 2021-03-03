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
              <span class="info-box-text"> All Service </span>
              <span class="info-box-number"> {{ $all_service_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-danger" style="width: {{ $all_service_count }} %"></div>
              </div>
              <span class="progress-description">
                <!-- Extra content can go here -->
              </span>
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

              <div class="progress">
                <div class="progress-bar progress-bar-danger" style="width: {{ $all_categories_count }}%"></div>
              </div>
              <span class="progress-description">
                <!-- Extra content can go here -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-sellsy text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Sellers </span>
              <span class="info-box-number"> {{ $all_sellers_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-danger" style="width: {{ $all_sellers_count }}%"></div>
              </div>
              <span class="progress-description">
               <!-- 85% Increase in 28 Days -->
             </span>
           </div>
           <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-money text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> All Buyer </span>
            <span class="info-box-number"> {{ $all_buyers_count }} </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width: {{ $all_buyers_count }}%"></div>
            </div>
            <span class="progress-description">
             <!-- 50% Increase in 28 Days -->
           </span>
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
          <span class="info-box-text"> Active Service </span>
          <span class="info-box-number"> {{ $active_service_count }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-danger" style="width: {{ $active_service_count }}%"></div>
          </div>
          <span class="progress-description">
            <!-- Extra content can go here -->
          </span>
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
          <span class="info-box-text"> Pending Service </span>
          <span class="info-box-number"> {{ $pending_service_count }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-danger" style="width:  {{ $pending_service_count }}%"></div>
          </div>
          <span class="progress-description">
            <!-- Extra content can go here -->
          </span>
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
          <span class="info-box-text"> User Feedbacks </span>
          <span class="info-box-number"> {{ $feedbacks->count() }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-danger" style="width:  {{ $feedbacks->count() }}%"></div>
          </div>
          <span class="progress-description">
            <!-- Extra content can go here -->
          </span>
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
