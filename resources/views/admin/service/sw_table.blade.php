@extends('layouts.admin')

@section('title', 'All Job Applicants Table | ')

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
						<h3 class="box-title"> All Job Applicants </h3>
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
                                        <tr id="curApplicantListDelete{{ $all_services->id }}">
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td>
                                                <a href="#">
                                                    <img src="{{asset('uploads/seekingworks')}}/{{$all_services->thumbnail}}" alt="{{ $all_services->job_title }}" width="60" class="img-responsive img-rounded">
                                                </a>
                                            </td>
                                            <td> {{ $all_services->job_title }} </td>
                                            <td> {{ $all_services->user_state }} </td>
                                            <td>
                                                @if($all_services->status == 1)
                                                <a href="{{ route('admin.seekingwork.status', $all_services->id) }} " class="btn btn-warning"> Deactive</a>
                                                @else
                                                <a href="{{ route('admin.seekingwork.status', $all_services->id) }} " class="btn btn-primary"> Activate </a>
                                                @endif
                                            </td>
                                            <td> {{ $all_services->featured == 1 ? 'Yes' : 'No' }} </td>
                                            <td> {{ $all_services->created_at->format('d/m/Y') }} </td>
                                            <td class="center">
                                                <a href="{{ route('job.applicant.detail', $all_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
                                                <button onclick="deleteSeekingWork({{ $all_services->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    function deleteSeekingWork(id) {
        event.preventDefault();
        var curApplicantListDelete = document.getElementById('curApplicantListDelete'+id)
        swal({
            title: "Are you sure you want to delete this applicant?",
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
                    url: '/admin/dashboard/seekingwork/destroy/' + id,
                    method: 'get',
                    success: function(result){
                        swal("Done!", "Applicant Deleted!", "success");
                        curApplicantListDelete.remove()
                    }
                });
            }
            else {
                e.dismiss;
            }
        })


    }
</script>
