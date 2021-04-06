@extends('layouts.seller')

@section('title', 'Apply for Badge | ')

@section('content')

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
        .disablebadgebox{
            opacity: .4;
            cursor: not-allowed;
        }

        @media only screen and (max-width: 768px) {
            .box-header i {
                color: #fff;
                font-size: 30px !important;
                padding: 0 10px;
            }
        }

    </style>

    <div class="content-wrapper" style="min-height: 868px;">
        @include('layouts.backend_partials.status')

        <section class="content-header">
            <h3 class="page-title">Get a Badge <small class="infoLinkNote">(<a data-toggle="modal"
                        data-target="#theinfoModal">How it works?</a>)</small></h3>
            <p class="page-description">Here, You Can Request For A Badge.</p>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary {{ Auth::user()->badgetype == 1 ? 'disablebadgebox' : '' }}" id="superbadgebox" >
                        <div class="box-header bg-warning text-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Super</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be featured on all efcontact pages.</li>
                                <li>Upload as much as (8) images of your services.</li>
                                <li>Appear on the top when inquirers search for services related to yours</li>
                                <li>Cost: &#8358;{{ $badge_data['badge_one_cost'] }}</li>
                            </ol>
                        </div>

                        <input hidden id="badge_type" type="hidden" name="badge_type" value="1">
                        <input hidden id="amount" type="hidden" name="amount" value="1">
                        <input hidden type="hidden" class="form-control" name="email-addres3" id="email-address3"
                            value="{{ Auth::User()->email }}">

                        <div class="box-footer box-profile text-center">
                            @if (Auth::user()->badgetype != 1)
                                <a data-toggle="modal" data-target="#badgeOneRequestModal" id="superbadgebtn" class="btn">Click here to apply</a>
                            @else
                                <a id="superbadgebtn" class="btn">Click here to apply</a>
                            @endif
                        </div>
                        <div class="modal fade" id="badgeOneRequestModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Make Payment</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Badge Type: Super Badge
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Amount: </label> &#8358;{{ $badge_data['badge_one_cost'] }}</span>
                                                </div>
                                            </div>
                                            <p style="text-align: center; font-size: 17px"
                                                class="animate__animated animate__tada animate__infinite">
                                                You will be redirected to our payments page to continue the payment process.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="payWithPaystack1({{ $badge_data['badge_one_cost'] }}, 1)" class="btn pd-x-20"
                                                style="background-color: #cc8a19; color: #fff">Click to make payment</button>
                                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary {{ Auth::user()->badgetype == 2 ? 'disablebadgebox' : '' }}" id="moderatebadgebox">
                        <div class="box-header bg-success text-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Moderate</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be featured on all efcontact pages.</li>
                                <li>Upload as much as (6) images of your services.</li>
                                <li>Appear after <b>Super</b> when inquirers search for services related to yours</li>
                                <li>Cost: &#8358;{{ $badge_data['badge_two_cost'] }}</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            @if (Auth::user()->badgetype != 2)
                                <a data-toggle="modal" data-target="#badgeTwoRequestModal" id="moderatebadgebtn" class="btn">Click here to apply</a>
                            @else
                                <a id="moderatebadgebtn" class="btn">Click here to apply</a>
                            @endif
                        </div>
                        <div class="modal fade" id="badgeTwoRequestModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Make Payment</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Badge Type: Moderate Badge
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Amount: </label> &#8358;{{ $badge_data['badge_two_cost'] }}</span>
                                                </div>
                                            </div>
                                            <p style="text-align: center; font-size: 17px"
                                                class="animate__animated animate__tada animate__infinite">
                                                You will be redirected to our payments page to continue the payment process.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="payWithPaystack1({{ $badge_data['badge_two_cost'] }}, 2)" class="btn pd-x-20"
                                                style="background-color: #cc8a19; color: #fff">Click to make payment</button>
                                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary {{ Auth::user()->badgetype == 3 ? 'disablebadgebox' : '' }}" id="basicbadgebox">
                        <div class="box-header bg-primary text-center">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Basic</h4>
                            <ol class="text-left">
                                <li>Your service(s) will be featured on most of efcontact pages..</li>
                                <li>Upload as much as (4) images of your services.</li>
                                <li>Appear after <b>Moderate</b> when inquirers search for services related to yours</li>
                                <li>Cost: &#8358;{{ $badge_data['badge_three_cost'] }}</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            @if (Auth::user()->badgetype != 3)
                                <a data-toggle="modal" data-target="#badgeThreeRequestModal" id="basicbadgebtn" class="btn">Click here to apply</a>
                            @else
                                <a id="basicbadgebtn" class="btn">Click here to apply</a>
                            @endif
                        </div>
                        <div class="modal fade" id="badgeThreeRequestModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Make Payment</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Badge Type: Basic Badge
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Amount: </label> &#8358;{{ $badge_data['badge_three_cost'] }}</span>
                                                </div>
                                            </div>
                                            <p style="text-align: center; font-size: 17px"
                                                class="animate__animated animate__tada animate__infinite">
                                                You will be redirected to our payments page to continue the payment process.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="payWithPaystack1({{ $badge_data['badge_three_cost'] }}, 3)" class="btn pd-x-20"
                                                style="background-color: #cc8a19; color: #fff">Click to make payment</button>
                                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div>

        <div>
            <div class="modal fade" id="theinfoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                            <h4 class="modal-title">Badge Info</h5>
                                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                        </div>
                        <div class="modal-body">
                            A badge is a verification tag that is given to service providers on E.F Contact. Service
                            providers with E.F badges have the following advantages:
                            <ol>
                                <li>Appear to customers/clients before other service providers</li>
                                <li>Potential customers/clients tend to go for service providers with the badge.</li>
                                <li>Service providers with a badge appear on all search pages and appear first.</li>
                                <li>Service providers with badges are given bonus subsequently.</li>
                            </ol>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn pd-x-20" data-dismiss="modal"
                                style="background-color: #cc8a19; color: #fff">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            <script>
                function requestBadge(id) {
                    $.ajax({
                        url: '/requestbadge/' + id,
                        method: 'GET',
                        success: function(data) {
                            console.log(data.badge_cost)
                            $('#badgeType').text(data.badge_type)
                            $('#badge_type').val(id)
                            $('#badgeCost').text(data.badge_cost)
                            $('#thebadgecost').value = data.badge_cost
                            // Show modal
                            $('#badgeRequestModal').modal('show')
                        }
                    });
                }

            </script>


            <script>

                base_Url = "{{ url('/') }}"

                var _token = $("input[name='_token']").val();

                function payWithPaystack1(badgecost, badgetype) {
                    $('#badgeRequestModal').modal('hide');
                    console.log(badgetype);

                    var badge_amount = badgecost * 100;
                    var badge_type = badgetype;

                    var handler = PaystackPop.setup({
                        key: 'pk_live_8921deda409e1196f265fd3a7dcc4eff81d52cdb',
                        email: document.getElementById("email-address3").value,
                        amount: badge_amount,
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
                            var amount = badge_amount;
                            var ref_no1 =  response.reference;
                            var badgetype = badge_type
                            var badgesuperboxtype = document.getElementById("superbadgebox")
                            var badgemoderateboxtype = document.getElementById("moderatebadgebox")
                            var badgebasicboxtype = document.getElementById("basicbadgebox")
                            var badgesuperboxbtn = document.getElementById("superbadgebtn")
                            var badgemoderateboxbtn = document.getElementById("moderatebadgebtn")
                            var badgebasicboxbtn = document.getElementById("basicbadgebtn")

                            if (response.status == 'success') {
                                $.ajax({
                                    method: "POST",
                                    url: '/provider/badge_paid_for/',
                                    dataType: "json",
                                    data: {
                                        _token: _token,
                                        email: email,
                                        amount: badgecost,
                                        ref_no: response.transaction,
                                        trans_reference: response.trxref,
                                        badge_type: badgetype
                                    },
                                    success: function (data) {
                                        toastr.success('You are now a ' + data[0])
                                        $(".modal").modal("hide");

                                        if (badgetype == 1) {
                                            badgesuperboxtype.style.opacity = '.4';
                                            badgesuperboxbtn.setAttribute('disabled', 'true');
                                            badgesuperboxbtn.removeAttribute('data-target');


                                            badgemoderateboxtype.style.opacity = '1';
                                            badgebasicboxtype.style.opacity = '1';

                                        }
                                        if (badgetype == 2) {
                                            badgemoderateboxtype.style.opacity = '.4';
                                            badgemoderateboxbtn.setAttribute('disabled', 'true');
                                            badgemoderateboxbtn.removeAttribute('data-target');


                                            badgesuperboxbtn.style.opacity = '1';
                                            badgebasicboxtype.style.opacity = '1';
                                        }
                                        if (badgetype == 3) {
                                            badgebasicboxtype.style.opacity = '.4';
                                            badgebasicboxbtn.setAttribute('disabled', 'true');
                                            badgebasicboxbtn.removeAttribute('data-target');


                                            badgesuperboxbtn.style.opacity = '1';
                                            badgemoderateboxtype.style.opacity = '1';
                                        }

                                    },
                                    error: function(error) {
                                        toastr.error('Something went wrong!')
                                        console.log(error)
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href="/contact-us">Why do I have this issue?</a>'
                                })
                            }
                        },
                        onClose: function() {
                            swal({
                                title: "Cancel Payment Process?",
                                text: "Please be sure and then confirm!",
                                type: "info",
                                showCancelButton: !0,
                                confirmButtonText: "Yes"
                            }).then(function (e) {
                                if (e.value === true) {
                                    $(".modal").modal("hide");
                                }
                            })
                        }
                    });
                    handler.openIframe();
                }



            </script>

        @endsection
