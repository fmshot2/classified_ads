
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
						<table class="display table table-bordered data_table_main2">
							<thead>
								<tr>
									<th> # </th>
									<th> Name </th>
									<th> Email </th>
									<th> role </th>
									<th> Applied for Approval?</th>
									<th> Date </th>
								</tr>	

									@foreach($seller as $key => $sellers)

									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ $sellers->name }} </td>
									<td><span class="text-muted"> </i> {{ $sellers->email }} </span> </td>
									<td> {{ $sellers->role }} </td>
									@if(!isset($approval_status))
									<td>Yes  &nbsp; &nbsp;<span><a href="{{route('admin.approve_withdrawal_request', $sellers->id)}}"><button class="btn btn-sm btn-danger">Approve</button></a>  </span></td>
									@endif
									@if(isset($approval_status))
									<td>Yes  &nbsp; &nbsp;<span><a href="{{route('admin.approve_withdrawal_request', $sellers->id)}}"><button class="btn btn-sm btn-danger">Approve</button></a>  </span></td>
									@endif
								
									{{-- @endif	 --}}
									{{-- @if($sellers->requestMade)
									<td>Yes  &nbsp; &nbsp;<span><a href="{{route('admin.approve_withdrawal_request', $sellers->id)}}"><button class="btn btn-sm btn-danger">Approve</button></a>  </span></td>
									{{-- @endif	 --}}
									{{-- @if(!$sellers->requestMade)
									<td>Not Applied yet</td>
									@endif --}}
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


