@extends('layouts.agent')

@section('title', 'Agent\'s Dashboard | ')

@section('content')
    <style>

    </style>

    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h3>Agent Dashboard </h3>
                <p>This page is for Agent.</p>
            </section>

            <section class="content">
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 top-box-card">
                    <div class="info-box">
                        <a href="{{ route('seller.service.all') }}">
                            <span class="info-box-icon push-bottom bg-warning">
                                <i class="fa fa-briefcase text-white" aria-hidden="true"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text"> My Refferal{{ $service_count > 1 ? 's' : '' }} </span>
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

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="info-box">
                        <span class="info-box-icon push-bottom bg-warning">  <i class="fa fa-clock-o text-white" aria-hidden="true"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Pending Service </span>
                            <span class="info-box-number">  </span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" style=""></div>
                            </div>
                            <span class="progress-description">
                                <!-- Extra content can go here -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->                </div>
            </section>
        </div>
    </div>

@endsection
