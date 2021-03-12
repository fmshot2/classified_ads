@extends('layouts.agent')

@section('title', 'All Message | ')

@section('content')

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>
    <section class="content-header">
        <p style="font-size: 23px">You Can View All Your Referals Here.</p>
    </section>
    <section class="content">

      <div class="row">
         <div class="col-xs-12">

            <div class="box" >
               <div class="box-header">
                  <h3 class="box-title"> Referals </h3>
                  <h6 class="box-subtitle"> Sorting is from the most recent. </h6>
              </div>

              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table class="display table table-bordered data_table_main">
                        <thead>
                            <tr>
                                <th> SL </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Phone </th>
                                        <!-- <th> Status </th>
                                            <th> Action </th> -->
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($all_my_referals as $key =>  $all_my_referals)


                                        <tr role="row" class="odd">
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>

                                            <td> {{ $all_my_referals->name }} </td>
                                            <td> {{ $all_my_referals->email }} </td>
                                            <td> {{ $all_my_referals->phone }} </td>
                                            <!-- <td> {{ $all_my_referals->status == 1 ? 'read' : 'unread' }} </td> -->

                                        <!-- <td class="center">
                                            <a href=" {{ route('seller.message.view',$all_my_referals->name) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('seller.message.reply',$all_my_referals->name) }} " class="btn btn-warning "><i class="fa fa-reply"></i></a>
                                        </td> -->
                                    </tr>

                                    @endforeach

                                </tbody>


                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>


                <!-- /.content -->
            </div>



        </div>

    </div>
</section>

@endsection
