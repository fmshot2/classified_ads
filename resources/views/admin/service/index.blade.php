@extends('layouts.admin')

@section('title', 'All Service Table | ')

@section('content')



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
									<th> Status </th>
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
										<img src="{{asset('uploads/services')}}/{{$all_services->service_image}}" alt="{{ $all_services->name }}" width="60" class="img-responsive img-rounded">
									</a>
								</td>
								<td> {{ $all_services->name }} </td>
								<td> {{ $all_services->state }} </td>

								<td>
									@if($all_services->status == 1)
									<a href="{{ route('admin.service.status', $all_services->id) }} " class="btn btn-warning"> Deactive</a>
									@else
									<a href="{{ route('admin.service.status', $all_services->id) }} " class="btn btn-primary"> Activate </a>
									@endif
								</td>

								<td> {{ $all_services->featured == 1 ? 'Yes' : 'No' }} </td>
								<td> {{ $all_services->created_at->diffForHumans() }} </td>


								<td class="center">
									<a href="{{ route('serviceDetail', $all_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
									<button onclick="deleteService({{ $all_services->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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


<script>
    function deleteService(id) {
        event.preventDefault();
        if (confirm("Are you sure?")) {
            $.ajax({
                url: '/admin/dashboard/service/destroy/' + id,
                method: 'get',
                success: function(result){
                alert('successfull')
                    window.location.assign(window.location.href);
                }
            });

        } else {

            console.log('Delete process cancelled');

        }

    }
</script>
