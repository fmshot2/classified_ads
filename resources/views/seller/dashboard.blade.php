
@extends('layouts.seller')

@section('title', 'Seller Dashboard | ')

<style>
    @media only screen and (min-width: 768px){
        .referralContainer{
            display: flex;
            justify-content:flex-start
        }
    }
    @media only screen and (max-width: 768px){
        .referralContainer div > input{
            margin-top: 5px
        }
    }
    .referralContainer div > input{
        margin-bottom: 15px;
        height: 30px;
        width: 100% !important;
        border-radius: 0 !important;
        border: 1px solid rgb(228, 228, 228);
        font-size: 12px !important;
    }
    /* width: 350px; height: 30px; border:1px solid #cccccc */
</style>

@section('content')

    <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('layouts.backend_partials.status')

        <section class="content-header">
            @if(isset($linkcheck->refererlink))
                <div class="">
                    <h4>Refferal Link</h4>
                    <div class="referralContainer">
                        <div style="margin-right: 2px">
                            <button class="btn btn-info btn-sm" onclick="myFunction()">Click here to copy link</button>
                        </div>
                        <div>
                            <input type="text" readonly class="text-muted" value="{{url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink}}" id="myInput2">
                        </div>
                    </div>
                </div>
            @endif

            <ol class="breadcrumb mt-5">
                <li><span style="font-size: 15px"><i class="fa fa-money"></i> Accrued Amount: &#8358 <span style="font-weight: 600; font-size: 16px">{{$accruedAmount ?? 0}}</span></span></li>
                <button class="btn btn-success btn-sm" style="cursor: pointer; display: block; margin-top: 5px;" data-toggle="modal" data-target="#exampleModal">Make Withdrawal</button>
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
                        Current Total Amount :  {{$accruedAmount ?? 0}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if(isset($linkcheck->refererlink))
                            <a class="btn btn-primary" href="{{route('seller.make_withdrawal_request', $linkcheck->refererlink)}}">
                                Make Request
                            </a>
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
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-briefcase text-white" aria-hidden="true"></i>
                        </span>
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
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-commenting text-white" aria-hidden="true"></i>
                        </span>
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
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-commenting text-white" aria-hidden="true"></i>
                        </span>
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
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-commenting text-white" aria-hidden="true"></i>
                        </span>
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
        </section>
    </div>


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
