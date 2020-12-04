
@extends('layouts.admin')

@section('title')
Service List | 
@endsection

@section('content')


<div class="container">

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Service Table</h3>

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
						<th> Category </th>
						<th> Experienced </th>
						<th> is_featured </th>
						<th> Status </th>
						<th> Date </th>
					</tr>

					<tr>
						<td><a href="javascript:void(0)">Order #123456</a></td>
						<td>Lorem Ipsum</td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
						<td>$158.00</td>
						<td><span class="label label-danger">Pending</span></td>
						<td>CH</td>
					</tr>

				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>

</div>

@endsection