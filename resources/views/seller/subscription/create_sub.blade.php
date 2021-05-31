@extends('layouts.seller')

@section('title', 'Request for Subscription | ')

@section('content')
@if($subscription_has_ended)                                 
<script type="text/javascript">
    $(window).on('load', function() {
        $('#show_Subscription_end_Modal').modal('show');
    });
</script>
@endif

@if($no_sub_var)                                 
<script type="text/javascript">
    $(window).on('load', function() {
        $('#Show_No_Subscription_Modal').modal('show');
    });
</script>
@endif


       <div>
        <div id="show_Subscription_end_Modal" class="modal fade postServiceModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: inline-block; color: #fff">
                            <i class="fa fa-close"></i>
                        </button>
                        <h4 class="text-center" id="sub_end"><strong>Your Subscription has ended. Please renew your subcription to proceed</strong><span></span>
                        </h4>
                    </div>
                 
                </div>
            </div>
        </div>
         <div id="Show_No_Subscription_Modal" class="modal fade postServiceModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: inline-block; color: #fff">
                            <i class="fa fa-close"></i>
                        </button>
                        <h4 class="text-center" id="sub_end"><strong>YOUR SUBSCRIPTION WAS NOT FOUND. PLEASE SUBSCRIBE TO PROCEED TO YOUR DASHBOARD!</strong><span></span>
                        </h4>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

    <style>
        .box {
            padding: 0;
        }

        .box-header i {
            color: #fff;
            font-size: 50px !important;
            padding: 0 25px;
        }

        .box-header.bg-warning {
            background-color: #FFC107 !important;
        }

        .box-header.bg-primary {
            background-color: #007BFF !important;
        }

        .box-header.bg-success {
            background-color: #28A745 !important;
        }

        .box-body h4 {
            text-transform: uppercase;
            font-size: 24px;
        }

        .box-footer a {
            display: block;
            text-transform: uppercase;
        }

        @media only screen and (max-width: 768px) {
            .box-header i {
                color: #fff;
                font-size: 30px !important;
                padding: 0 10px;
            }
            .page-title{
                font-size: 18px;
            }
            .infoLinkNote{
                display: block;
                margin-top: 5px;
            }
            .page-description{
                font-size: 15px !important
            }
        }

    </style>


    <div class="content-wrapper" style="min-height: 868px;">

        @if(!$current_subscription_end_date)

        @include('layouts.backend_partials.status')
        @endif




          

        <section class="content-header">
            <p id="sub_message" class="page-description text-success" style="display: none;">Your Subscription was added successfully!!</p>
        	<p class="page-description text-danger">Here, You Can Request To Extend Your Subscription.</p>
        	<h3 class="page-title">Get a New Subscription <small class="infoLinkNote">(<a data-toggle="modal"
        		data-target="#theinfoModal">How it works?</a>)</small></h3>
                @if($current_subscription_end_date)
        			<!-- <p id="sub_end">Your Subscription ends:<span><h1>{{  Carbon\Carbon::parse($current_subscription_end_date)->format('d-m-Y')  }}</h1></span></p> -->
                    <p id="sub_end">Your Subscription ends: <strong>{{  Carbon\Carbon::parse($current_subscription_end_date)->toDayDateTimeString()  }}</strong><span></span></p>
                    <!-- <p>Your Subscription ends:<span><h1 id="sub_end2"></h1></span></p> -->
                @else
                <p id="sub_end"></p>
                @endif
        </section>

        <section class="content">
            <div class="row">
                 @if($no_sub_var)                                 
                      <div>
                        <h4 class="text-center text-danger" id="sub_end"><strong>YOUR SUBSCRIPTION WAS NOT FOUND. PLEASE SUBSCRIBE TO PROCEED TO YOUR DASHBOARD!</strong><span></span>
                        </h4>
                @endif

                  @if($subscription_has_ended)                                 
                      <div>
                        <h4 class="text-center text-danger" id="sub_end"><strong>YOUR SUBSCRIPTION HAS ENDED. PLEASE RENEW YOUR SUBSCRIPTION TO PROCEED</strong><span></span>
                        </h4>              
                @else
                     <h3 class="text-center text-warning" id="sub_end"><strong></strong><span></span>
                        </h3>
                @endif
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header text-center" style="background-color: #cc8a19;">
                           <!--  <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> -->
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Annually</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be available on efcontact for a period of 1 year.</li>
                                <!-- <li>Upload as much as (8) images of your services.</li> -->
                                <!-- <li>Appear on the top when inquirers search for services related to yours</li> -->
                                <li>Cost: &#8358;2,400</li>
                            </ol>
                        </div>

                        <input hidden id="sub_types" type="hidden" name="badge_type" value="1">
                        <input hidden id="amount" type="hidden" name="amount" value="1">
                        <input hidden type="hidden" class="form-control" name="email-addres3" id="email-address3"
                            value="{{ Auth::User()->email }}">

                        <div class="box-footer box-profile text-center">
                            <!-- <a onclick="payWithPaystack1()" class="btn">Click here to apply</a> -->
                            <a onclick="requestBadge(4)" class="btn">Click here to subscribe</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header text-center" style="background-color: #cc8a19;">
                            <!-- <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> -->
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Six Months</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be available on efcontact for a period of 6 months.</li>
                              <!--   <li>Upload as much as (6) images of your services.</li>
                                <li>Appear after <b>Super</b> when inquirers search for services related to yours</li> -->
                                <li>Cost: &#8358;1,200</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            <a onclick="requestBadge(3)" class="btn">Click here to subscribe</a>
                        </div>
                    </div>
                </div>

                  <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header text-center" style="background-color: #cc8a19;">
                            <!-- <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> -->
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Three Months</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be available on efcontact for a period of 3 months.</li>
                              <!--   <li>Upload as much as (6) images of your services.</li>
                                <li>Appear after <b>Super</b> when inquirers search for services related to yours</li> -->
                                <li>Cost: &#8358;600</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            <a onclick="requestBadge(2)" class="btn">Click here to subscribe</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header text-center" style="background-color: #cc8a19;">
                            <!-- <i class="fa fa-star"></i> -->
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Monthly</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be available on efcontact for one month.</li>
                              <!--   <li>Upload as much as (4) images of your services.</li>
                                <li>Appear after <b>Moderate</b> when inquirers search for services related to yours</li> -->
                                <li>Cost: &#8358;200</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            <a onclick="requestBadge(1)" class="btn">Click here to subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div>
        <div class="modal fade" id="badgeRequestModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Make Payment</h5>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> --}}
                    </div>
                    <div class="modal-body">
                        {{-- gtpay for badges --}}
                        {{-- <form action="{{ url('gtPAy') }}" method="POST"> --}}
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Subscription Type: </label> <span id="sub_type"></span> Subscription
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Amount: </label> &#8358;<span id="sub_cost"></span>
                                    </div>
                                </div>
                                <input hidden id="badge_type" type="text" name="badge_type" value="">
                                <input hidden id="amount" type="text" name="amount" value="">
                                {{-- <input hidden type="hidden" class="form-control" name="email-addres3" id="email-address3" value="{{Auth::User()->email}}"> --}}


                                <p style="text-align: center; font-size: 17px"
                                    class="animate__animated animate__tada animate__infinite">
                                    You will be redirected to our payments page to continue the payment process.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="payWithPaystack1()" class="btn pd-x-20"
                                    style="background-color: #cc8a19; color: #fff">Click to make payment</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div>
            <div class="modal fade" id="theinfoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                            <h4 class="modal-title">Subscription Info</h5>
                                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                        </div>
                        <div class="modal-body">
                            <p>Subscription is an active plan for every EF Contact service providers, during registration a user can select a plan and the plan becomes active on successful registration and it becomes inactive when the plan expires.</p>
                            <p>You will find all our available plans on this page, feel free to subscribe or renew your subscription.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn pd-x-20" data-dismiss="modal"
                                style="background-color: #cc8a19; color: #fff">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            <script>
                function requestBadge(id) {
                    $.ajax({
                        url: '/requestsubscription/' + id,
                        method: 'GET',
                        success: function(data) {
                            $('#sub_type').text(data.sub_type)
                            $('#sub_type').val(id)
                            $('#sub_cost').text(data.sub_cost/100)
                            $('#sub_cost').val(data.sub_cost/100)
                            // Show modal
                            $('#badgeRequestModal').modal('show')

                        }
                    });
                }

            </script>


            <script>

                base_Url = "{{ url('/') }}";
                var paystack_pk = "{{env('paystack_pk')}}";
                // var paystack_pk = "pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43";
               

                var _token = $("input[name='_token']").val();

                // var email1 = $("#email-address3").val();
                var amount = $("#sub_cost").val();
                var sub_type = $("#sub_type").val();

                function payWithPaystack1() {
//                                                 var amount = $("#sub_cost").val();
// console.log(amount);
// alert(amount);
// return
                    $('#badgeRequestModal').modal('hide');
                    console.log(base_Url);

                    var handler = PaystackPop.setup({
                        key: paystack_pk,
                        email: document.getElementById("email-address3").value,
                        amount: $("#sub_cost").val()*100,
                        ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                        metadata: {
                            custom_fields: [{
                                display_name: "Mobile Number",
                                variable_name: "mobile_number",
                                value: "+2348012345678"
                            }]
                        },
                        callback: function(response) {

                            var email = document.getElementById("email-address3").value;
                            var amount = $("#sub_cost").val();
                            var ref_no =  response.reference;
                            var sub_type = $("#sub_type").val();
                            console.log(email, amount, ref_no, sub_type)

                            $.ajax({
                              method: "POST",
                              url: base_Url + '/provider/service/create_sub',
                              dataType: "json",
                              data: {
                                _token: _token,
                                email: email,
                                amount: amount,
                                ref_no: ref_no,
                                sub_type: sub_type
                              },
                              success: function (data) {
                                console.log(data);
                                toastr.success('You have purchased a new subscription!')
                                // $("#sub_end2").innerHTML = data.new_date;
                                 $("#sub_end2").html(data.new_date);
                                 // $('#sub_message').css("display", "block");
                              },
                              error: function(error) {
                                  console.log(error)
                              }
                            })
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                }



            </script>

        @endsection
