

	

	<div class="box">

		<div class="box-header with-border">
			<h3 class="box-title"> Seller Table</h3>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-hover">

				<tbody>

					<tr>
						<th> # </th>
						<th> Name </th>
						<th> Email </th>
						<th> role </th>
						<th> Date </th>
					</tr>

					<tr>
						@foreach($seller as $key => $sellers)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $sellers->name }} </td>
						<td><span class="text-muted"> </i> {{ $sellers->email }} </span> </td>
						<td> {{ $sellers->role }} </td>
						<td> {{ $sellers->created_at->diffForHumans() }} </span></td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.box-body -->

@if (url()->current() == route('admin.seller') )
<div class="box-footer clearfix">
  {{ $seller->links() }} 
</div>
@endif


</div>
