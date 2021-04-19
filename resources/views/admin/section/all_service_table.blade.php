

	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Recent Service Table </h3>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-hover data_table_main">
					<thead>
						<tr>
							<th> # </th>
							<th> Image </th>
							<th> Name </th>
							<th> is_featured </th>
							<th> Status </th>
							<th> Date </th>
							<th> Action </th>
						</tr>
					</thead>
					<tbody>
                        @foreach($all_service as $key => $all_services)
                            <tr>
                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                <td>
                                    <a href="#">
                                        <img src="{{asset('uploads/services')}}/{{$all_services->thumbnail }}"  alt="service image" width="60" class="img-responsive img-rounded">
                                    </a>
                                </td>
                                <td> {{ Str::limit($all_services->name, 15) }} </td>
                                <td> {{ $all_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
                                <td> {{ $all_services->status == 1 ? 'Active' : 'Pending' }} </td>
                                <td> {{ $all_services->created_at->format('d/m/Y') }} </span></td>
                                <td><a href="{{ route('admin.view', $all_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>


