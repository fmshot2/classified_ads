
<div class="box">

	<div class="box-header with-border">
		<h3 class="box-title">  Active Service </h3>
		<code>  {{ url()->current() == route('seller.dashboard') ? 'showing 5 active services ' : '' }} </code>

	</div>
	<!-- /.box-header -->
	<div class="box-body ">
		<table class="table table-bordered">

			<tbody>

				<tr>
					<th> # </th>
					<th> Name </th>
					<th> Experienced </th>
					<th> Featured </th>
					<th> Date </th>
				</tr>

				<tr>
					@foreach($active_service as $key => $active_services)
					<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
					<td> {{ $active_services->name }} </td>
					<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $active_services->experience }} </span> </td>
					<td> {{ $active_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
					<td> {{ $active_services->created_at->diffForHumans() }} </td>
				</tr>

				@endforeach

			</tbody>
		</table>
	</div>
	<!-- /.box-body -->

	@if (url()->current() == !route('seller.dashboard') )
	<div class="box-footer clearfix">

		{{ $active_service->links() }} 

	</div>
	@endif

</div>


