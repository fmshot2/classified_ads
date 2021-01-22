
@extends('layouts.seller')

@section('title')
Seller Dashboard | 
@endsection

@section('content')

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      @include('layouts.backend_partials.status')

    <section class="content-header">
     {{--    <a class="mb-5" href=" {{ route('seller.service.create')}} "><button class="btn btn-success"> Create A New Service</button></a> --}}
     @if(isset($linkcheck->refererlink))
       <h1>
<h6>Refferal Link</h6>
<a>
  <button class="btn btn-danger" onclick="myFunction()">Click here to copy link</button>
</a>
      </h1>
   
     <input type="text" readonly class="text-muted" value="{{url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink}}" id="myInput2">
       <div>
</div>
    @endif
      

    <ol class="breadcrumb mt-5">
        <li><h5><i class="fa fa-dashboard"></i> Accrued Amount: &#8358 {{$accruedAmount ?? 0}}</h5></li>
        <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal"><li class="active">Make Withdrawal</li></a>
      </ol>
    </section>


   
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You Are About To Make Withdrawal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Current Total Amount :  {{$accruedAmount ?? 0}}      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             @if(isset($linkcheck->refererlink))

        <a href="{{route('seller.make_withdrawal_request', $linkcheck->refererlink)}}"><button type="button"  class="btn btn-primary">Make Request</button></a>
            @endif

      </div>
    </div>
  </div>
</div>
 

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-briefcase text-white" aria-hidden="true"></i>  </span>

            <div class="info-box-content">
              <span class="info-box-text"> All Service </span>
              <span class="info-box-number"> {{ $service_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-blue" style="width: {{ $service_count}}%"></div>
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
              <span class="info-box-text"> All Message </span>
              <span class="info-box-number"> {{ $message_count }} </span>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: {{ $message_count}}%"></div>
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
                <div class="progress-bar progress-bar-primary" style="width: {{ $read_message_count }}%"></div>
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
          <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-commenting text-white" aria-hidden="true"></i>  </span>

          <div class="info-box-content">
            <span class="info-box-text"> Unread Message </span>
            <span class="info-box-number"> {{ $unread_message_count }} </span>

            <div class="progress">
              <div class="progress-bar progress-bar-danger" style="width: {{ $unread_message_count }}%"></div>
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
        <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-bell text-white" aria-hidden="true"></i>  </span>

        <div class="info-box-content">
          <span class="info-box-text"> General Notice </span>
          <span class="info-box-number"> {{ $all_notification_count }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-primary" style="width: {{ $all_notification_count }}%"></div>
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
            <div class="progress-bar progress-bar-blue" style="width: {{ $pending_service_count }}%"></div>
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
        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-check text-white" aria-hidden="true"></i> </span>

        <div class="info-box-content">
          <span class="info-box-text"> Active Service </span>
          <span class="info-box-number"> {{ $active_service_count }} </span>

          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: {{ $active_service_count }}%"></div>
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

{{--<div class="pad margin no-print">
            <div class="callout callout-info bg-warning" style="margin-bottom: 0!important;background-color: #fec30bbb;">
              <h4><i class="fa fa-info"></i> Note:</h4>
              Hello! Shehu Furnitures Your Account is now under <strong>Verification Review</strong>, and would take 24 hrs process.
            </div>
          </div>--}}



             @include('seller/section/badge_notification')


  <div class="row">
    <div class="col-md-6 connectedSortable">
      @include('seller/section/unread_message_table') 
    </div>

    <div class="col-md-6 connectedSortable">
      @include('seller/section/unread_notification_table')   
   </div>
 </div>




 <div class="row">

  <div class="col-md-6 connectedSortable">
   @include('seller/section/all_service_table')
 </div>

 <div class="col-md-6 connectedSortable">
   @include('seller/section/active_service_table')
 </div>

</div>

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


@endsection



 <script>
function myFunction() {
  var copyText = document.getElementById("myInput2");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>













































