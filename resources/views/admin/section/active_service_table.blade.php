

<div class="container">

	<!-- Content Header (Page header) -->
	<section class="content-header p-3 box">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Service </a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>


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
		<div class="box-body ">
			<table class="table table-hover">

				<tbody>

					<tr>
						<th> # </th>
						<th> Name </th>
						<th> Experienced </th>
						<th> is_featured </th>
						<th> Status </th>
						<th> Date </th>
						<th> Action </th>
					</tr>

					<tr>
						@foreach($active_service as $key => $active_service)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $active_service->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $active_service->experience }} </span> </td>
						<td> {{ $active_service->is_featured == 1 ? 'Yes' : 'No' }} </td>
						<td> {{ $active_service->status == 1 ? 'Active' : 'Pending' }} </td>
						<td> {{ $active_service->created_at->diffForHumans() }} </td>



<td>
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">

								<form method="post" class="delete_form" action="">
									@method('DELETE')
									@csrf
									<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;">Delete</button> </li>
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

</div>
