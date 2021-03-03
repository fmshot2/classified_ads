
@extends('layouts.seller')

@section('title', 'Request for Badge | ')

@section('content')

    <style>
        .box{
            padding: 0;
        }
        .box-header i{
            color: #fff;
            font-size: 50px !important;
            padding: 0 25px;
        }
        .box-header.bg-warning{
            background-color: #FFC107 !important;
        }
        .box-header.bg-primary{
            background-color: #007BFF !important;
        }
        .box-header.bg-success{
            background-color: #28A745 !important;
        }
        .box-body h4{
            text-transform: uppercase;
            font-size: 24px;
        }
        .box-footer a{
            display: block;
            text-transform: uppercase;
        }

        @media only screen and (max-width: 768px) {
            .box-header i{
                color: #fff;
                font-size: 30px !important;
                padding: 0 10px;
            }
        }
    </style>

    <div class="content-wrapper" style="min-height: 868px;">
        @include('layouts.backend_partials.status')

        <section class="content-header">
            <h3>Get a Badge</h3>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header bg-warning text-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Super</h4>
                            <ol class="text-left">
                                <li>You service(s) get featured and show first on efcontact pages.</li>
                                <li>Upload as much as right (8) images of your services.</li>
                                <li>Appear on the top when inquirers search for services related to yours</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            <a onclick="requestBadge(1)" class="btn">Make Request</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header bg-primary text-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Moderate</h4>
                            <ol class="text-left">
                                <li>You service(s) get featured and show second on efcontact pages.</li>
                                <li>Upload as much as right (6) images of your services.</li>
                                <li>Appear after <b>Super</b> when inquirers search for services related to yours</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            <a onclick="requestBadge(2)" class="btn">Make Request</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header bg-success text-center">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="box-body box-profile text-center">
                            <h4>Basic</h4>
                            <ol class="text-left">
                                <li>You service(s) get featured and show third to moderate on efcontact pages.</li>
                                <li>Upload as much as right (4) images of your services.</li>
                                <li>Appear after <b>Moderate</b> when inquirers search for services related to yours</li>
                            </ol>
                        </div>
                        <div class="box-footer box-profile text-center">
                            <a onclick="requestBadge(3)" class="btn">Make Request</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="badgeRequestModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Request for Badge</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('gtPAy') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Badge Type: </label> <span id="badgeType"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Amount: </label> &#8358;<span id="badgeCost"></span>
                            </div>
                        </div>
                        <input id="badge_type" type="text" name="badge_type" value="">
                        <input id="amount" type="text" name="amount" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger pd-x-20">Make Payment</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function requestBadge(id) {
            $.ajax({
                url: '/requestbadge/' + id,
                method: 'GET',
                success: function(data){
                    console.log(data)
                    $('#badgeType').text(data.badge_type)
                    $('#badge_type').val(id)
                    $('#badgeCost').text(data.badge_cost)
                    $('#amount').val(data.badge_cost)

                    // Show modal
                    $('#badgeRequestModal').modal('show')
                }
            });
        }
    </script>

@endsection
