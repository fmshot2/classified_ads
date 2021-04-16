



	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Providers Table <a href="{{route('admin.seller') }}" class="text-success" style="font-weight: bold; font-size: 14px"> See all Providers </a></h3>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
                <table class="display table table-bordered data_table_main">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Services </th>
                            <th> Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seller as $key => $sellers)
                            <tr>
                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                <td> {{ Str::limit($sellers->name,15) }} </td>
                                <td><span class="text-muted"> </i> {{ $sellers->email }} </span> </td>
                                <td> {{ $sellers->services->count() }} </td>
                                <td> {{ $sellers->created_at->diffForHumans() }} </span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
		<!-- /.box-body -->