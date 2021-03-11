
@extends('layouts.seller')

@section('title', 'My Referrals | ')

@section('content')

    <style>

    </style>

    <div class="content-wrapper" style="min-height: 868px;">
        @include('layouts.backend_partials.status')

        <section class="content-header">
            <h3 class="page-title">My Referrals </h3>
            <p class="page-description">You can see all the people you have referred.</p>
        </section>

        <section class="content">
            <div class="table-responsive">
                <table class="display table table-bordered data_table_main">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Full Name </th>
                            <th> Date </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($all_notification)
                            @foreach($all_notification as $key => $all_notifications)
                                <tr>
                                    <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                    <td> {{ Str::limit( $all_notifications->description, 100) }} </td>
                                    <td> {{ $all_notifications->created_at->diffForHumans() }} </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <!-- View -->
                                                <li>
                                                    <a href=" {{ route('seller.notification.view',$all_notifications->slug) }}" class="btn btn-block" style="margin-left: 8px;"> View </a>
                                                </li>
                                            </ul>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @endif --}}
                    </tbody>
                </table>
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
                    <form action="{{ url('gtPAy') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Badge Type: </label> <span id="badgeType"></span> Badge
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Amount: </label> &#8358;<span id="badgeCost"></span>
                                </div>
                            </div>
                            <input hidden id="badge_type" type="text" name="badge_type" value="">
                            <input hidden id="amount" type="text" name="amount" value="">

                            <p style="text-align: center; font-size: 17px" class="animate__animated animate__tada animate__infinite">
                                You will be redirected to GTBank to continue the payment process.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning pd-x-20">Click to make payment</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
