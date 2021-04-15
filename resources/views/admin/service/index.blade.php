@extends('layouts.admin')

@section('title', 'All Services Table | ')

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
						<h3 class="box-title"> All Services </h3>
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
                                        <th> Status </th>
                                        <th> Featured </th>
                                        <th> Date </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($all_service as $key => $all_services)
                                        <tr id="curServiceDelete{{ $all_services->id }}">
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
                                                <a href="{{ route('serviceDetail', $all_services->slug) }} " class="btn btn-warning " target="_blank"><i class="fa fa-eye"></i></a>
                                                <button onclick="deleteService({{ $all_services->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
        var curServiceListDelete = document.getElementById('curServiceDelete'+id)
        swal({
            title: "Are you sure you want to delete this service?",
            text: "Please be sure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, dont bother!",
            cancelButtonColor: '#4CAF50',
            confirmButtonColor: '#dc3545',
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    url: '/admin/dashboard/service/destroy/' + id,
                    method: 'get',
                    success: function(result){
                        swal("Done!", "Service Deleted!", "success");
                        curServiceListDelete.remove()
                    }
                });
            }
            else {
                e.dismiss;
            }
        })

    }
</script>
