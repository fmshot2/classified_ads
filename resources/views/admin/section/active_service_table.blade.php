








	<div class="box">

		<div class="box-header with-border">
			<h3 class="box-title"> Active Service Table</h3>

			@if (url()->current() == route('admin.service.active') )
			<div class="box-tools">
				<form class="" method="GET" action="{{ route('admin.service.search') }}">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

						<div class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
			@endif

		</div>
		<!-- /.box-header -->
		<div class="box-body ">
			<table class="table table-bordered">

				<tbody>

					<tr>
						<th> # </th>
						<th> Name </th>
						<th> Experienced </th>
						<th> is_featured </th>
						<th> Status </th>
						<th> Date </th>
						@if (url()->current() == route('admin.service.active') )
						<th> Action </th>
						@endif
					</tr>

					<tr>
						@foreach($active_service as $key => $active_services)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $active_services->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $active_services->experience }} </span> </td>
						<td> {{ $active_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
						<td> {{ $active_services->status == 1 ? 'Active' : 'Pending' }} </td>
						<td> {{ $active_services->created_at->diffForHumans() }} </td>


						@if (url()->current() == route('admin.service.active') )
						<td>

							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">



									<!-- Edit -->
									<form method="post" class="update_form" action=" {{ route('admin.service.status',$active_services->id) }} ">
										@method('PATCH')
										@csrf
										<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Deactivate </button> </li>
									</form>


									<!-- Delete -->
									<form method="post" class="delete_form" action=" {{ route('admin.service.destroy',$active_services->id) }} ">
										@method('DELETE')
										@csrf
										<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Delete </button> </li>
									</form>

								</ul>

							</ul>
						</div>
					</td>
					@endif

				</tr>

				@endforeach

			</tbody>
		</table>
	</div>
	<!-- /.box-body -->

	@if (url()->current() == route('admin.service.active') )
	<div class="box-footer clearfix">

		{{ $active_service->links() }} 

	</div>
	@endif

