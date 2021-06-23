@extends('layouts.buyer')

@section('title', 'Seeker Dashboard | ')

@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard</h1>
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
                            <span class="info-box-text"> Message{{ $all_message_count > 1 ? 's' : '' }} </span>
                            <span class="info-box-number"> {{ $all_message_count }} </span>
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
                                <span class="info-box-text"> Unread Message{{ $unread_message_count > 1 ? 's' : '' }}  </span>
                                <span class="info-box-number"> {{ $unread_message_count }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-bell text-white" aria-hidden="true"></i>  </span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Notification{{ $all_notification_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $all_notification_count }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon push-bottom bg-warning"> <i class="fa fa-bell text-white" aria-hidden="true"></i>  </span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Unread Notification{{ $unread_notification->count() > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $unread_notification->count() }} </span>
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

                <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            </section>
        </div>
    </div>
@endsection
