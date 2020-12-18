
<div class="box">

	<div class="box-header">
		<h3 class="box-title"> Pending Service Table</h3>
		<button alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-warning model_img img-responsive pull-right"> Add Aervice </button>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class="table table-hover">

			<tbody>

				<tr>
					<th> # </th>
					<th> Name </th>
					<th> Experienced </th>
					<th> is_featured </th>
					<th> Address </th>
					<th> Status </th>
					<th> Date </th>
					<th> Action </th>
				</tr>

				<tr>
					@foreach($pending_service as $key => $pending_services)
					<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
					<td> {{ $pending_services->name }} </td>
					<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $pending_services->experience }} </span> </td>
					<td> {{ $pending_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
					<td><span class="text-muted"> {{ $pending_services->streetAddress }} </span> </td>
					<td><span class="text-muted"> {{ $pending_services->status == 1 ? 'Approved' : 'Pending' }} </span> </td>
					<td><span class="text-muted"> {{ $pending_services->created_at->diffForHumans() }} </span></td>

					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">



								<!-- Edit -->
								<li>  <a href="{{ route('service.update.view',$pending_services->slug) }}" class="btn btn-block"  style="margin-left: 8px;"> Update </a> </li>

									<!-- View -->
									<li>  <a href="{{-- route('service.view',$active_services->slug) --}}" class="btn btn-block"  style="margin-left: 8px;"> View </a> </li>

										<!-- Delete -->
										<form method="post" class="delete_form" action=" {{ route('seller.service.destroy',$all_services->id) }}">
											@method('DELETE')
											@csrf
											<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Delete </button> </li>
										</form>

									</ul>

								</ul>
							</div>
						</td>

			</tr>
			@endforeach

		</tbody>
	</table>
</div>
<!-- /.box-body -->
</div>


<div class="box-footer clearfix">
	{{ $pending_service->links() }} 
</div>


@include('seller/modal/create_service') 
