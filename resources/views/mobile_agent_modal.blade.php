@extends('layouts.app')
@section('title', 'Become Our Agent | ')

@section('extra-styles')
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        .footer-cta, .footer{
            display: none;
        }

        @media screen and (max-width: 768px){
            .modal-dialog #three-tab{
                display: block;
                margin-top: 10px;
            }
            .moreLinkModal .modal-body li a{
                text-decoration: none;
                color: #000
            }
            .moreLinkModal .modal-body li a:hover{
                color: #cc8a19
            }
            .mobile-top-navbar .mbtn-links{
                margin-top: 25px;
                margin-bottom: 0;
            }
            .mobile-top-navbar .mbtn-links a{
                text-decoration: none;
            }
            .main-header .logos {
                padding: 14px 5px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Modal -->
    <div id="launchMobileAgentModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                    <h5 class="modal-title text-white" style="text-transform: uppercase">Agent Info</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #fff">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="tabbing tabbing-box agent-registration-modal">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#aboutAgent" role="tab" aria-controls="two" aria-selected="false">Agent Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false" style="margin-left: 3px">Request Form</a>
                            </li>
                                <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#agentBenefit" role="tab" aria-controls="three" aria-selected="false" style="margin-left: 3px">Agent Benefits</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade active show" id="aboutAgent" role="tabpanel" aria-labelledby="one-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul>
                                                    <li>We are happy to work with you and offer to you one of the best marketing careers in the country, where you have an opportunity to make millions of Naira yearly.</li>
                                                    <li><strong>Note:</strong> The registration to be an agent on EFContact will attract a fee of <strong>&#8358;500.</strong></li>
                                                    <li>To become our agent, you will be required to fill out the form below and be accepted by the company. When we receive your online request, a reference code and another form would be sent to you to finalize your application.</li>
                                                    <li>EFContact provides an opportunity for a part-time agent to make on average &#8358;50,000.00 monthly and a full time agent to make on average &#8358;100,000.00  or monthly. On top of your basic commission, there are other incentives which may generate millions of Naira to you yearly.</li>
                                                    <li>When you are approved, you will receive your agent code and a dashboard. The dashboard is where all your activities and daily income are displayed.  We pay commissions weekly not monthly.  You will also be able to refer people to
                                                        market the EFcontact and make extra money on top of your own sales. If you are interested please click <a  id="two-tab" data-toggle="tab" href="#agentRegister" role="tab" aria-controls="one" aria-selected="false" href="#" style="color: #cc8a19; font-weight: 700">HERE</a> :</li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="agentRegister" role="tabpanel" aria-labelledby="two-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('agent.register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Your Full Name</label><small class="text-danger">*</small>
                                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name" required>
                                                        @if ($errors->has('name'))
                                                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email Address</label><small class="text-danger">*</small> <small class="text-success">(A Link Will Be Sent To Your Email Address To Complete Your Registration)</small>
                                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                                        placeholder="Enter A Valid Email Address" required>
                                                        @if ($errors->has('email'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number</label>
                                                        <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                                        placeholder="Enter Your Phone Number" required>
                                                        @if ($errors->has('phone'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-lg btn-warning text-white">Submit</button>
                                                            <!-- <small class="">Or,
                                                                <a type="submit" class="text-success">CLICK HERE</a> To Resend Link</small> -->
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 20px;">
                                                        <div class="col-md-12">
                                                            <small class="text-danger">Please, If You Are Not Contacted In Ten Days after Your Request
                                                                , Kindly Contact Us Again At, <a href="mailto:agent@efcontact.com">agent@efcontact.com</a>
                                                                or call <a href="tel:{{ $general_info->hot_line ? $general_info->hot_line : '' }}">{{ substr($general_info->hot_line,0,4).'-'.substr($general_info->hot_line,4,3).'-'.substr($general_info->hot_line,7,5) }}</a>
                                                                When you send this contact, kindly indicate the day of your first request or the reference code sent to you
                                                                . Be aware that the position
                                                                is limited per state so rush your application
                                                                    soonest before the positions are filled.
                                                                </small>
                                                        </div>
                                                        <div style="margin-top: 20px;">
                                                            <ul style="list-style: none">


                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="agentBenefit" role="tabpanel" aria-labelledby="three-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    {!! $pages_contents->benefit_of_efcontact ? $pages_contents->benefit_of_efcontact : '' !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-md" data-dismiss="modal" style="background-color: #cc8a19; color: #fff">Close</button>
                </div>
        </div>

        </div>
    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#launchMobileAgentModal').modal('show');
        });
    </script>
@endsection
