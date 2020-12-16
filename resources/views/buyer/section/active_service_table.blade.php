
<!-- Content Header (Page header) -->
@if (url()->current() == !route('seller.dashboard') )
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
@endif

@include('layouts.backend_partials.status')

<div class="box">

	<div class="box-header with-border">
		<h3 class="box-title">  Active Service </h3>
		<code>  {{ url()->current() == route('seller.dashboard') ? 'showing 5 active services ' : '' }} </code>

		@if (url()->current() == route('seller.service.active'))
		<button alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-warning model_img img-responsive pull-right"> Add Aervice </button>
		@endif

		@if (url()->current() == !route('seller.dashboard') )
		<div class="box-tools">
			<form class="" method="GET" action="{{ route('admin.service.search') }}">
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
	<div class="box-body ">
		<table class="table table-bordered">

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
					@foreach($active_service as $key => $active_services)
					<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
					<td> {{ $active_services->name }} </td>
					<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $active_services->experience }} </span> </td>
					<td> {{ $active_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
					<td> {{ $active_services->status == 1 ? 'Active' : 'Pending' }} </td>
					<td> {{ $active_services->created_at->diffForHumans() }} </td>

					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">



								<!-- Edit -->
								<li>  <a href="{{ route('service.update.view',$active_services->slug) }}" class="btn btn-block"  style="margin-left: 8px;"> Update </a> </li>

								<!-- View -->
								<li>  <a href="{{-- route('service.view',$active_services->slug) --}}" class="btn btn-block"  style="margin-left: 8px;"> View </a> </li>

								<!-- Delete -->
								@if (url()->current() == route('seller.service.all') )
								<form method="post" class="delete_form" action=" {{ route('seller.service.destroy',$active_services->id) }}">
									@method('DELETE')
									@csrf
									<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Delete </button> </li>
								</form>
								@endif

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

@if (url()->current() == !route('seller.dashboard') )
<div class="box-footer clearfix">

	{{ $active_service->links() }} 

</div>
@endif

</div>

@include('seller/modal/create_service') 


