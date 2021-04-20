
	<div class="box">

		<div class="box-header with-border">
			<h3 class="box-title"> Active Service Table</h3>

			@if (url()->current() == route('admin.service.active') )
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
                        @foreach($active_service as $key => $active_services)
                            <tr>
                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                <td>
                                    <a href="#">
                                        <img src="{{asset('uploads/services')}}/{{$active_services->thumbnail }}"  alt="service image" width="50" class="img-responsive img-rounded">
                                    </a>
                                </td>
                                <td> {{ Str::limit($active_services->name, 15) }} </td>
                                <td> {{ $active_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
                                <td> {{ $active_services->status == 1 ? 'Active' : 'Pending' }} </td>
                                <td> {{ $active_services->created_at->format('d/m/Y') }} </td>
                                <td><a href="{{ route('admin.view', $active_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
	    </div>
	    <!-- /.box-body -->
</div>

