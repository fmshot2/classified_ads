
@extends('layouts.seller')

@section('title', 'Provider\'s Dashboard | ')



@section('content')

    <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('layouts.backend_partials.status')

        <section class="content-header">
            @if(isset($linkcheck->refererlink))
                <div class="">
                    <h4 style="text-transform:uppercase">My Referral Link</h4>
                    <div class="referralContainer">
                        <div>
                            <button class="btn btn-danger" onclick="myFunction()">Click here to copy link</button>
                        </div>
                        <div>
                            <input type="text" readonly hidden class="text-muted" value="{{url('/register') . '/' . '?' . 'invite' . '=' . $linkcheck->refererlink}}" id="myInput2">
                        </div>
                    </div>
                </div>
            @endif

            <ol class="breadcrumb mt-5">
                {{-- <li><span style="font-size: 15px"><i class="fa fa-money"></i> Referral Bonus: &#8358; <span style="font-weight: 600; font-size: 16px"></span></span></li>
                <button class="btn btn-success btn-sm" style="cursor: pointer; display: block; margin-top: 5px;" data-toggle="modal" data-target="#exampleModal">Make Withdrawal</button> --}}
                <li class="navbar-top-post-btn">
                    <a style="font-size: 15px !important;color:#fff" class="btn btn-success" href="{{ route('seller.service.create') }}"><i class="fa fa-plus"></i> <span >Post A Service</span></a>
                </li>
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
                        <a href="{{ route('seller.service.all') }}">
                            <span class="info-box-icon push-bottom bg-warning">
                                <i class="fa fa-briefcase text-white" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> My Service{{ $service_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $service_count }} </span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $service_count}}%"></div>
                                </div>
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-clock-o text-white" aria-hidden="true"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Pending Service{{ $pending_service_count > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ $pending_service_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $pending_service_count }}%"></div>
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
                            <span class="info-box-text"> Active Service{{ $active_service_count > 1 ? 's' : '' }} </span>
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
                        <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-thumbs-up text-white" aria-hidden="true"></i>  </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Liked Service{{ $all_notification_count > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ $all_notification_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $all_notification_count }}%"></div>
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
                        <a href="{{ route('seller.message.all') }}">
                            <span class="info-box-icon push-bottom bg-warning">
                                <i class="fa fa-commenting text-white" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> My Message{{ $message_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $message_count }} </span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $message_count}}%"></div>
                                </div>
                                <span class="progress-description">
                                    <!-- Extra content can go here -->
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </a>
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
                            <span class="info-box-text"> Unread Message{{ $unread_message_count > 1 ? 's' : '' }} </span>
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
                            <span class="info-box-text"> General Notice{{ $all_notification_count > 1 ? 's' : '' }}</span>
                            <span class="info-box-number"> {{ $all_notification_count }} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{ $all_notification_count }}%"></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">
                            <i class="fa fa-money text-white" aria-hidden="true"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Referral Bonus </span>
                            <span class="info-box-number"> &#8358;{{$accruedAmount ?? 0}} </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style="width: {{$accruedAmount ?? 0}}%"></div>
                            </div>
                            <span class="progress-description">
                                <button class="btn btn-success btn-sm" style="cursor: pointer; display: block; margin-top: 5px;" data-toggle="modal" data-target="#exampleModal">Make Withdrawal</button>
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
                    @include('seller/section/dash_pending_services_table')
                </div>

                <div class="col-md-6 connectedSortable">
                    @include('seller/section/active_service_table')
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 connectedSortable">
                    @include('seller/section/unread_message_table')
                </div>

                <div class="col-md-6 connectedSortable">
                    @include('seller/section/unread_notification_table')
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
        alert("Referral Link Copied: " + copyText.value);
    }
</script>
