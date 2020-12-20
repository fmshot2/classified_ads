
@extends('layouts.admin')

@section('title')
All Seller | 
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
						<h3 class="box-title"> Seller Table</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Name </th>
									<th> Email </th>
									<th> role </th>
									<th> Date </th>
								</tr>	

									@foreach($seller as $key => $sellers)

									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ $sellers->name }} </td>
									<td><span class="text-muted"> </i> {{ $sellers->email }} </span> </td>
									<td> {{ $sellers->role }} </td>
									<td> {{ $sellers->created_at->diffForHumans() }} </span></td>

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


