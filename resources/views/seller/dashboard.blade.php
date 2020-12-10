
@extends('layouts.seller')

@section('title')
Seller Dashboard | 
@endsection



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
        <li><a href=" {{ route('seller.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-blue"> <i class="fa fa-briefcase" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Service </span>
              <span class="info-box-number"> {{ $service_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-blue" style="width: 45%"></div>
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
            <span class="info-box-icon push-bottom bg-success"> <i class="fa fa-commenting" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Message </span>
              <span class="info-box-number"> 0 </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
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
            <span class="info-box-icon push-bottom bg-purple"> <i class="fa fa-commenting" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Read Message </span>
              <span class="info-box-number"> o </span>

              <div class="progress">
                <div class="progress-bar progress-bar-primary" style="width: 85%"></div>
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
          <span class="info-box-icon push-bottom bg-danger"> <i class="fa fa-commenting" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> Unread Message </span>
            <span class="info-box-number"> 0 </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
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
        <span class="info-box-icon push-bottom bg-blue"> <i class="fa fa-bell" aria-hidden="true"></i>  </span>

        <div class="info-box-content">
          <span class="info-box-text"> General Notice </span>
          <span class="info-box-number"> 0 </span>

          <div class="progress">
            <div class="progress-bar progress-bar-blue" style="width: 45%"></div>
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
        <span class="info-box-icon push-bottom bg-blue">  <i class="fa fa-ban" aria-hidden="true"></i> </span>

        <div class="info-box-content">
          <span class="info-box-text"> Pending Service </span>
          <span class="info-box-number"> {{ $pending_service_count }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-blue" style="width: 45%"></div>
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
        <span class="info-box-icon push-bottom bg-blue">  <i class="fa fa-check" aria-hidden="true"></i> </span>

        <div class="info-box-content">
          <span class="info-box-text"> Active Service </span>
          <span class="info-box-number"> {{ $active_service_count }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-blue" style="width: 45%"></div>
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
        @include('seller/section/message') 
    </div>
    
    <div class="col-md-6 connectedSortable">
      {{--  @include('admin/section/active_service_table') --}}
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 connectedSortable">
      <!-- Category Table -->
      {{--  @include('admin/section/seller_table') --}}
    </div>
    <div class="col-md-6 connectedSortable">
     {{-- @include('admin/section/buyer_table') --}}
   </div>
 </div>

 <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


@endsection

















































