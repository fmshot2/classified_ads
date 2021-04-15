
@extends('layouts.seller')

@section('title', 'My Favourite Services | ')

@section('content')

    <style>

    </style>

    <div class="content-wrapper" style="min-height: 868px;">
        @include('layouts.backend_partials.status')

        <section class="content-header">
            <h3 class="page-title">My Favourite Services </h3>
            <p class="page-description">You can see all the services you've liked.</p>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box" >
                        <div class="box-header">
                            <h3 class="box-title"> Favourite Services </h3>
                            <h6 class="box-subtitle"> Sorting is from the most recent. </h6>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered data_table_main">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Service Provider </th>
                                            <th> Service Name </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($allfavourites)
                                            @foreach($allfavourites as $key => $allfavourite)
                                                <tr>
                                                    <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                                    <td> {{ Str::limit( $allfavourite->user->name, 30) }} </td>
                                                    <td> {{ $allfavourite->name }} </td>
                                                    <td>
                                                        <a class="btn btn-info" href="{{ route('serviceDetail', $allfavourite->slug) }}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-danger" onclick="disLikeService({{ $allfavourite->id }})" href="#"><i class="fa fa-trash"></i></a>
                                                    </td>

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

    <script>
        function disLikeService(id) {
            $.ajax({
                url: '/admin2/like/' + id,
                method: 'GET',
                success: function(like){
                    window.location.assign(window.location.href);
                    toastr.error('Favourite Removed!')
                }
            });

        }
    </script>

@endsection
