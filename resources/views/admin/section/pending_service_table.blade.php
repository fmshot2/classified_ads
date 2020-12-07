
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
			<h3 class="box-title"> Pending Service Table</h3>

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
						<th> Address </th>
						<th> Status </th>
						<th> Date </th>
					</tr>

					<tr>
						@foreach($pending_service as $key => $pending_service)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $pending_service->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $pending_service->experience }} </span> </td>
						<td> {{ $pending_service->is_featured == 1 ? 'Yes' : 'No' }} </td>
						<td><span class="text-muted"> {{ $pending_service->streetAddress }} </span> </td>
						<td><span class="text-muted"> {{ $pending_service->status == 1 ? 'Approved' : 'Pending' }} </span> </td>
						<td><span class="text-muted"> {{ $pending_service->created_at->diffForHumans() }} </span></td>
						<td>CH</td>
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



</div>
