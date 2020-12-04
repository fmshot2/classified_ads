
@extends('layouts.admin')

@section('title')
Pending Service | 
@endsection

@section('content')


<div class="container">

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Active Service Table</h3>

			<div class="box-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
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
						@foreach($pending_service as $key => $pending_service)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $apending_service->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $pending_service->experience }} </span> </td>
						<td> {{ $pending_service->status }} </td>
						<td><span class="label label-danger"> {{ $pending_service->created_at->diffForHumans() }} </span></td>
						<td>CH</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>

</div>

@endsection