@extends('layouts.admin')

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
        <p class="page-description">This Page Is for creating and managing notifications on EFContact platform.</p>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" >
					<div class="d-flex justify-content-start mb-4">
						<a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Send Notification</a>
						<a href="{{ route('admin.notification.markallasread') }}" class="btn btn-success" data-toggle="modal">Mark all as Read</a>
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
                                        <th> User Type </th>
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
                                            <td>{{ $notification->data[0]['user_type'] }}</td>
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #cc8a19; color: #fff; border:1px solid #cc8a19;">
                    <h4 class="modal-title" id="exampleModalLabel">Create Notification</h4>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <form method="POST" action="{{route('admin.notification.general.send')}}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_type">User Type</label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option value="all">All Users</option>
                                        <option value="seller">Providers</option>
                                        <option value="buyer">Service Seeker</option>
                                        <option value="agent">Agent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <select name="priority" id="priority" class="form-control">
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <input type="text" required name="message" class="form-control" id="message" placeholder="Enter Your Message">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


