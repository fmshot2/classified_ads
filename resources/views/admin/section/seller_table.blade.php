
<div class="container">


    <!-- Content Header (Page header) -->
	@if (url()->current() == route('admin.seller') )
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
    @endif

	

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Seller Table</h3>

@if (url()->current() == route('admin.seller') )
			<div class="box-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
			@endif
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
	</div>

</div>
