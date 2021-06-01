
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
            <div class="row">
                <div class="col-xs-12">

                    <div class="box" >
                        <div class="box-header">
                            <h3 class="box-title"> My Refferals </h3>
                            <h6 class="box-subtitle"> Sorting is from the most recent. </h6>
                        </div>

                        <!-- /.box-header -->
                     <!--    <div class="box-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered data_table_main">
                                    <thead>
                                        <tr>
                                            <th> Level </th>
                                            <th> Referee Name </th>
                                            <th> Date Created </th>
                                            <th> Referer Link </th>
                                            <th> Code </th>
                                            <th> Bonus </th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                         @if ($myreferrals)
                                            @foreach($myreferrals as $key => $myreferral)
                                                <tr>
                                                    <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                                    <td> {{ $myreferral->user->name }} </td>
                                                    <td> {{ $myreferral->user->refererLink }} </td>
                                                    <td> {{ $myreferral->user->agent_code }} </td>
                                                    <td> {{ $myreferral->user->refererAmount }} </td>
                                                    <td> {{ $myreferral->created_at->diffForHumans() }} </td>
                                              

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> -->










    <div id="main_referer_table" class="box-body">
                  <div class="table-responsive">
                    <table class="display table table-bordered data_table_main">
                        <thead>
                            <tr>
                             <th> S/N </th>
                        <th> Referee Name </th>
                       
<!-- <th> Referer Link </th> -->
<!-- <th> Agent Code </th> -->
<!-- <th> Bonus </th> -->
<th> Date Created </th>
                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($myreferrals as $key =>  $myreferral)


                                        <tr role="row" class="odd">
                                           <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                           <td> {{ $myreferral->user->name }} </td>
                                           <!-- <td> {{ $myreferral->user->refererLink }} </td> -->
                                           <!-- <td> {{ $myreferral->user->refererAmount }} </td> -->
                                           <td> {{ $myreferral->created_at->diffForHumans() }} </td>
                                           <!-- <td> {{ $myreferral->status == 1 ? 'read' : 'unread' }} </td> -->

                                          <!--  <td class="center">
                                            <a onclick="getDetails({{$myreferral->user->id}})" class="btn btn-warning "><i class="fa fa-eye"></i>View Downline</a>
                                        </td> -->
                                    </tr>

                                    @endforeach

                                </tbody>


                            </table>
                        </div>
                    </div>







                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
