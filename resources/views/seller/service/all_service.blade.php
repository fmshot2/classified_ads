@extends('layouts.seller')

@section('title', 'All Service | ')

@section('content')

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>
    <section class="content-header">
        <p style="font-size: 23px">You Can View All Your Services Here.</p>
    </section>
	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> All Your Services </h3>
						<h6 class="box-subtitle"> Sorting is from the most recent. </h6>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> SL </th>
                                        <th> Image </th>
                                        <th> Title </th>
                                        <th> State </th>
                                        <th> Featured </th>
                                        <th> Date </th>
                                        <th>Comments</th>
                                        {{-- <th>Badge Type</th> --}}
                                        <th>Likes</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($all_services as $key => $all_service)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td>
                                                <a href="#">
                                                    <img src="{{asset('uploads/services')}}/{{$all_service->service_image }}"  alt="service image" width="60" class="img-responsive img-rounded">
                                                </a>
                                            </td>
                                            <td> {{ $all_service->name }} </td>
                                            <td> {{ $all_service->state }} </td>
                                            <td> {{ $all_service->featured == 1 ? 'Yes' : 'No' }} </td>
                                            <td> {{ $all_service->created_at->diffForHumans() }} </td>
                                            <td><span><i class="fa fa-comments"> </i> {{ $all_service->comments->count() }}</span> </td>
                                            {{-- <td> {{$all_service->badge_type ? $all_service->badge_type : 'No Badges'}}</td> --}}
                                            <td> {{$all_service->likes->count()}}</td>

                                            <td class="center">
                                                <a href="{{ route('service.view', $all_service->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('service.update.view', $all_service->slug) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                                <a onclick="deleteService({{ $all_service->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>


                        {{-- <p>{{ $all_services->links() }}</p> --}}
					</div>
					<!-- /.box-body -->
				</div>


				<!-- /.content -->
			</div>



		</div>

	</div>
</section>


<script>
    function deleteService(id) {
        event.preventDefault();

        if (confirm("Are you sure?")) {

            $.ajax({
                url: '/service/' + id,
                method: 'get',
                success: function(result){
                    window.location.assign(window.location.href);
                }
            });

        } else {
            console.log('Delete process cancelled');
        }
    }
</script>

@endsection


