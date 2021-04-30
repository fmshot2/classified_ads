


@include('layouts.backend_partials.status')


<div class="box">

	<div class="box-header">
		<h3 class="box-title"> Pending Service Table</h3>
		<a data-toggle="modal" data-target="#postServiceModal" class="btn btn-success model_img img-responsive pull-right"> Add A Service </a>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Featured </th>
                        <th> Experience </th>
                        <th> Date </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pending_service)
                        @foreach($pending_service as $key => $pending_services)
                        <tr>
                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                            <td> {{ $pending_services->name }} </td>
                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $pending_services->experience }} </span> </td>
                            <td> {{ $pending_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
                            <td><span class="text-muted"> {{ $pending_services->created_at->format('d/m/Y') }} </span></td>
                        </tr>
                        @endforeach
                    @else
                        <p>No Pending Services</p>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>

{{--
<div class="box-footer clearfix">
	{{ $pending_service->links() }}
</div> --}}


@include('seller/modal/create_service')
