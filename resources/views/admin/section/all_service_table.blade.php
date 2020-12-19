

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Recent Service Table </h3>
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
						<th> Status </th>
						<th> Date </th>
					</tr>

					<tr>
						@foreach($all_service as $key => $all_services)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $all_services->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $all_services->experience }} </span> </td>
						<td> {{ $all_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
						<td> {{ $all_services->status == 1 ? 'Active' : 'Pending' }} </td>
						<td> {{ $all_services->created_at->diffForHumans() }} </span></td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>


