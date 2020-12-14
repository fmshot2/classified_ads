

@if ( url()->current() == !route('seller.dashboard') )
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

@include('layouts.backend_partials.status')
@endif

<div class="box">

	<div class="box-header">
		<h3 class="box-title"> {{ url()->current() == route('seller.dashboard') ? 'All Service' : 'Service Table' }} </h3>
		<code>  {{ url()->current() == route('seller.dashboard') ? 'showing 5 recent services ' : '' }}</code>

		@if ( url()->current() == !route('seller.dashboard') )
		<div class="box-tools">
			<form class="" method="GET" action="{{-- route('admin.service.search') --}}">
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
					<th> Action </th>
				</tr>

				<tr>
					@foreach($all_service as $key => $all_services)
					<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
					<td> {{ $all_services->name }} </td>
					<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $all_services->experience }} </span> </td>
					<td> {{ $all_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
					<td> {{ $all_services->status == 1 ? 'Active' : 'Pending' }} </td>
					<td> {{ $all_services->created_at->diffForHumans() }} </span></td>

					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">

								<!-- Edit -->
								<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Update  </button> </li>


								<!-- Delete -->
								<form method="post" class="delete_form" action=" {{ route('admin.service.destroy',$all_services->id) }} ">
									@method('DELETE')
									@csrf
									<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Delete </button> </li>
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

@if ( url()->current() == !route('seller.dashboard') )
<div class="box-footer clearfix">
	{{ $all_service->links() }} 
</div>
@endif

