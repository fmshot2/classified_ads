@extends('layouts.agent')

@section('title', 'Agent\'s Dashboard | ')

@section('content')
<style>
    .content-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .navbar-top-post-btn a{
        font-size: 15px !important;
        color:#fff
    }
    .refererArea h4{
        text-transform: uppercase;
    }
    .refererArea h4 small{
        font-size: 13px;
    }
    .refererArea h4 small a{
        color: #10CFBD;
        text-transform: initial;
    }
    .refererArea h4 small a:hover{
        color: #95f3ea;
        cursor: pointer;
    }
    .modal-title{
        text-transform: uppercase;
    }
    .form-text{
        display: block
    }
    @media (max-width: 768px){
        .content-header{
            padding: 0 5px 10px 10px;
        }
        .refererArea h4{
            font-size: 14px;
        }
        .refererArea .btn{
            font-size: 11px;
        }
        .navbar-top-post-btn a{
            font-size: 11px !important;
            margin-top: 40px
        }
        span.info-box-icon.push-bottom.bg-warning {
            display: none !important;
        }
        .info-box-content{
            margin-left: 0;
        }
        .info-box-text, .info-box-number{
            font-size: 14px;
        }
        .progress-description .btn{
            font-size: 9px;
        }
    }
</style>

<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">

            @if(isset($agent_code_check->agent_code))
            <div class="refererArea">
                <h5>Here Is Your Agent Dashboard</h5>

                <h4>My Agent Code <small>(<a data-toggle="modal" data-target="#referralInfoModal">How it works?</a>)</small></h4>
                <div class="referralContainer">
                    <div>
                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="{{$agent_code_check->agent_code}}" onclick="copyToClipboard('#refererlinkText') ">
                            Click here to copy your code
                        </button>
                    </div>
                    <div>
                        <p id="refererlinkText" hidden>{{ $agent_code_check->agent_code}}</p>
                    </div>
                </div>
            </div>
            @endif
            {{-- <div>
                <p class="navbar-top-post-btn">
                    <a data-toggle="modal" data-target="#postServiceModal" class="btn btn-success"><i class="fa fa-plus"></i> <span >Post A Service</span></a>
                </p>
            </div> --}}
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
                                <span class="info-box-text"> My Refferal{{ $agent_code_users_count > 1 ? 's' : '' }} </span>
                                <span class="info-box-number"> {{ $agent_code_users_count }} </span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" style="width: {{ $agent_code_users_count}}%"></div>
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
                            <span class="info-box-text"> Amount Earned </span>
                            <span class="info-box-number"> ₦{{ $agent_amount_earned }} </span>
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
                <!-- /.col -->
            </div>




                 </section>
        </div>
    </div>


    <script>
        // $(function () {
        //     $("#postServiceModal").modal('show');
        // })
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");

            toastr.options.progressBar = true
            toastr.options.positionClass = 'toast-top-left'
            toastr.success("Referral Link Copied!")

            $temp.remove();

        }
        </script>

    @endsection
