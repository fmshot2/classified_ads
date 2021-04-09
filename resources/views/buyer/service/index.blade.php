@extends('layouts.buyer')

@section('title', 'All Services Table | ')

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
<section class="content-header">
      <h1>Request A Service</h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Services</li>
      </ol>
    </section>
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> All Services </h3>
						<h6 class="box-subtitle"> Sorting is from the most recent. </h6>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> SL </th>
									<th> Image </th>
									<th> Title </th>
									<th> State </th>
									<th> Featured </th>
									<th> Date </th>
									<th> Action </th>
								</tr>
							</thead>

							<tbody>

									@foreach($all_service as $key => $all_services)

									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td>
										<a href="https://www.efcontact.com/admin/properties/classic-crib">
											<img src="{{asset('uploads/services')}}/{{$all_services->thumbnail}}" alt="{{ $all_services->name }}" width="60" class="img-responsive img-rounded">
										</a>
									</td>
									<td> {{ $all_services->name }} </td>
									<td> {{ $all_services->state }} </td>
									<td> {{ $all_services->featured == 1 ? 'Yes' : 'No' }} </td>
									<td> {{ $all_services->created_at->diffForHumans() }} </td>


									<td class="center">
										<a href="{{ route('serviceDetail', $all_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
									</td>

								</tr>

								@endforeach


							</tbody>


						</table>


					</div>
					<!-- /.box-body -->
				</div>


				<!-- /.content -->
			</div>



		</div>

	</div>
</section>

@endsection


