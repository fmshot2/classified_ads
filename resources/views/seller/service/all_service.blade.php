@extends('layouts.seller')

@section('title')
All Service Table | 
@endsection

@section('content')

<br>
<hr>

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Message </h3>
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
										<a href="#">
											<img src="{{asset('images')}}/{{$all_services->image}}" alt="classic crib" width="60" class="img-responsive img-rounded">
										</a>
									</td>
									<td> {{ $all_services->name }} </td>
									<td> {{ $all_services->state }} </td>
									<td> {{ $all_services->featured == 1 ? 'Yes' : 'No' }} </td>
									<td> {{ $all_services->created_at->diffForHumans() }} </td>


									<td class="center">
										<a href="{{ route('service.view', $all_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
										<a href="{{ route('service.update.view', $all_services->slug) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
										<a href="{{ route('seller.service.destroy', $all_services->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


