
@extends('layouts.admin')

@section('title')
All E.F Maketers | 
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
						<h2 class="box-title"> Total Downlines =  {{$efmarketers_downlines->count()}}</h2>
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
									<th> Applied for Approval?</th>
									<th> Date </th>
									<!-- <th> Activate/Deactivate</th> -->
								</tr>	
  </thead>

                                <tbody>
									@foreach($efmarketers_downlines as $key => $downline)
<tr>
									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ $downline->name }} </td>
									<td><span class="text-muted"> </i> {{ $downline->email }} </span> </td>
									<td> {{ $downline->role }} </td>
									<td> {{ $downline->created_at->diffForHumans() }} </span></td>
									<td>
										@if($downline->status == 1)
										<span><p id="active_text">Activated</p></span>
										@elseif($downline->status == 0)
										<span id="active_text2">Deactivated</span>
										@endif 
									</td>
				
							</tr>

							@endforeach
							</tbody>
                            </table>


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


