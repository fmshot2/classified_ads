
@extends('layouts.accountant')

@section('title')
All Referrals | 
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
						<h3 class="box-title"> All Referrals</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th style="display: none;"></th>
									<th> Name </th>
									<th> Amount Requested </th>
									<th> Total Remaining Balance </th>
									<th> Bank </th>
									<th> Account Number </th>
									<th> Payment Status </th>
									<th>Due Date</th>	
									<th> Action </th>										
								</tr>	
							</thead>
							<tbody>
								@forelse($all_payments as $key => $all_payment)
								<tr>
									<td>{{ ++$key }}</td>
									<td style="display: none;" id="userID">{{ $all_payment->id }}</td>
									<td> {{ $all_payment->user->name }} </td>
									<td>₦<span class="text-muted">{{ $all_payment->amount_requested }} </span> </td>
									<td> ₦{{ $all_payment->user->refererAmount }} </td>
									<td> {{ $all_payment->user->bank_name }} </span></td>
									<td> <span class="text text-success">{{ $all_payment->user->account_number }}</span> </span></td>
									@if($all_payment->is_paid == 0)

										<td> <span class="text text-danger">Pending</span></td>
									@else
										<td> <span class="text text-success">Paid</span></td>
									@endif
									@php
										$today = new \Carbon\Carbon;
										if($today->dayOfWeek == \Carbon\Carbon::FRIDAY){
											echo "<td> <span class='text text-warning'>Due</span></td>";
										} else {
											echo "<td> <span class='text text-danger'>Not Due</span></td>";
										}
										
									@endphp
									@if($all_payment->is_paid == 0)
									<td><button class="btn btn-warning" onclick="makepayment()">Pay</button> </td>
									@else
									<td><button class="btn btn-success">Paid</button> </td>
									@endif
								</tr>

								@empty

								@endforelse


							</tbody>


					</table>
    {{-- {{ $buyers->links() }} --}}


				</div>
				<!-- /.box-body -->
			</div>


			<!-- /.content -->
		</div>	



	</div>

</div>
</section>
</div>


@endsection


