



	<div class="box">

		<div class="box-header">
			<h3 class="box-title"> Seekers Table <a href="{{route('admin.buyer') }}" class="text-success" style="font-weight: bold; font-size: 14px"> See all Seekers </a></h3>
		</div>

		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding ">
			<div class="table-responsive">
                <table class="table table-hover table-bordered data_table_main">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buyer as $key => $buyers)
                            <tr>
                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                <td> {{ Str::limit($buyers->name, 15) }} </td>
                                <td><span class="text-muted"> </i> {{ $buyers->email }} </span> </td>
                                <td> {{ $buyers->created_at->format('d/m/Y') }} </span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
		<!-- /.box-body -->

@if (url()->current() == route('admin.buyer') )
<div class="box-footer clearfix">
  {{ $buyer->links() }}
</div>
@endif


</div>
