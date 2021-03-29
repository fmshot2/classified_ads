@extends('layouts.seller')

@section('title', 'All Notifications | ')

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		<div class="w-75">
		    @include('layouts.backend_partials.status')
		</div>
	</div>

    <section class="content-header">
        <h3 class="page-title">General  Notice</h3>
        <p class="page-description">This Page Is for managing your notifications on EFContact platform.</p>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" >
					<div class="d-flex justify-content-start mb-4">
						<a href="{{ route('seller.notification.markallasread') }}" class="btn btn-success" data-toggle="modal">Mark all as Read</a>
					</div>
   					{{-- <div class="box-header">
						<h3 class="box-title"> General  Notice</h3>
					</div> --}}

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Notification </th>
                                        <th> Priority </th>
                                        <th> Date </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->notifications as $key => $notification)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td>{{ Str::limit( $notification->data[0]['message'], 100) }}</td>
                                            <td>
                                                {{ $notification->data[0]['priority'] == 1 ? 'Low' : '' }}
                                                {{ $notification->data[0]['priority'] == 2 ? 'Medium' : '' }}
                                                {{ $notification->data[0]['priority'] == 3 ? 'High' : '' }}
                                            </td>
                                            <td>{{ $notification->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{-- {{ route('seller.notification.view',$all_notifications->slug) }} --}}" class="btn btn-success"> <i class="fa fa-check"></i> </a>
                                                <a href="{{-- {{ route('seller.notification.view',$all_notifications->slug) }} --}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                            </td>

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


