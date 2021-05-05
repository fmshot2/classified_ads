
@extends('layouts.admin')

@section('title')
All User Complaints |
@endsection

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
						<h3 class="box-title">All User Complaints</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Service </th>
									<th> Service Provider </th>
                                    <th> Buyer </th>
                                    <th> Buyer Email </th>
                                    <th> Buyer Phone</th>
                                    <th> Description </th>
									<th> Date of Report</th>
								</tr>
							</thead>
							<tbody>
								@forelse($complaints as $key => $complaint)
								<tr>
									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ $complaint->service_id }} </td>
									<td><span class="text-muted"> {{ $complaint->service_user_id }} </span> </td>
                                    <td><span class="text-muted">{{ $complaint->buyer_name }} </span> </td>
									<td><span class="text-muted">{{ $complaint->buyer_email }} </span> </td>
                                    <td><span class="text-muted">{{ $complaint->phone }} </span> </td>
                                    <td><span class="text-muted">{{ $complaint->description }} </span> </td>
									<td> {{ $complaint->created_at->format('d/m/Y') }} </span></td>
								</tr>
                                @empty

								@endforelse
							</tbody>

						</table>


					</div>
					<!-- /.box-body -->
				</div>


				<!-- /.content -->
			</div>

		</div>


	</section>
</div>

@endsection


