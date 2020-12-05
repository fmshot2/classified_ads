
<div class="container">


    <!-- Content Header (Page header) -->
    <section class="content-header p-3 box">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users </a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

	

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Buyer Table</h3>

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
		<div class="box-body table-responsive no-padding ">
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
						@foreach($buyer as $key => $buyers)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $buyers->name }} </td>
						<td><span class="text-muted"> </i> {{ $buyers->email }} </span> </td>
						<td> {{ $buyers->role }} </td>
						<td> {{ $buyers->created_at->diffForHumans() }} </span></td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>

</div>
