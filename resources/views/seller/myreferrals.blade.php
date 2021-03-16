
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


@endsection
