
@extends('layouts.buyer')

@section('title')
Buyer Dashboard | 
@endsection

@section('content')

  <section class="content">



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
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-commenting text-white" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
              <span class="info-box-text"> Messages </span>
              <span class="info-box-number"> {{ $all_message_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-blue" style="width: {{ $all_message_count }} %"></div>
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
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-commenting text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Unread Message </span>
              <span class="info-box-number"> {{ $unread_message_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: {{ $unread_message_count }} %"></div>
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
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-commenting text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Read Message </span>
              <span class="info-box-number"> {{ $read_message_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-primary" style="width: {{ $read_message_count }} %"></div>
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
          <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-bell text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> General Notice </span>
            <span class="info-box-number"> {{ $all_notification_count }} </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width: {{ $all_notification_count }} %"></div>
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


  </div>


  <div class="row">
    <div class="col-md-6 connectedSortable">
     @include('buyer/section/unread_message_table')  
    </div>

    <div class="col-md-6 connectedSortable">
      @include('buyer/section/unread_notification_table')    
   </div>
 </div>


 <div class="row">
  <div class="col-md-12 connectedSortable">
   @include('seller/section/all_service_table') 
 </div>
</div>
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
