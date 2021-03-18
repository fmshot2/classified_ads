
@extends('layouts.agent')

@section('title')
Agent's Payment History | 
@endsection

@section('content')

  <section class="content">



<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payment History      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment History</li>
      </ol>
      
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-cubes text-white" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Earnings</span>
              <span class="info-box-number"> ₦{{ number_format($total_balance) }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-blue" style="width:  %"></div>
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
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-money text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Pending Withdrawal </span>
              <span class="info-box-number"> ₦{{ number_format($total_pending) }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: %"></div>
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
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Withdrawn  </span>
              <span class="info-box-number"> ₦{{ number_format($total_requested) }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: %"></div>
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
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-calculator text-white" aria-hidden="true"></i> </span>

            <div class="info-box-content">
              <span class="info-box-text"> Total Remaining Balance  </span>
              <span class="info-box-number"> ₦{{ number_format($balance) }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: %"></div>
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
    <div class="col-md-12 connectedSortable">
     @include('agent/section/history_table')  
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
<script type="text/javascript">
    function deleteHistory()
    {
        event.preventDefault();
       let id = document.getElementById('history').innerHTML
       if (confirm("Are you sure you want to delete this history?")) {
          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
              url: "/delete-history/"+id,
              method: 'POST',
              success: function(result)
              {
                toastr.success("{{ Session::get('message') }}")
                location.reload()
              }

          }); 

       } else {
          toastr.error("{{ Session::get('message') }}")
          location.reload()
       }
        
    }
    
</script>
@endsection
