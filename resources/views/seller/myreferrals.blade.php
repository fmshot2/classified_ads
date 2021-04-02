
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
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered data_table_main">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Referee Name </th>
                                            <th> Date Created </th>
<!--                                             <th> Action </th>
 -->                                        </tr>
                                    </thead>
                                    <tbody>
                                         @if ($myreferrals)
                                            @foreach($myreferrals as $key => $myreferral)
                                                <tr>
                                                    <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                                    <td> {{ $myreferral->user->name }} </td>
                                                    <td> {{ $myreferral->created_at->diffForHumans() }} </td>
                                                  <!--   <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                </li>
                                                            </ul>
                                                           
                                                        </div>
                                                    </td> -->

                                                </tr>
                                            @endforeach
                                        @endif
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
