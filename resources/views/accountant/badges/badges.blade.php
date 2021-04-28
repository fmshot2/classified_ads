
@extends('layouts.accountant')

@section('title')
Successful Badge Payment  | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">
            
           <h1>
           All Successful Badge Payments
            <br><small>View and manage all successful badge payments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('accountant.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Successful badge payments</li>
          </ol>
        </section>
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Successful Badge Payment</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Name</th>
									<th> Amount Paid </th>
									<th> Reference Number </th>
									<th> Date of Payment </th>


									{{-- <th> Action </th>									 --}}
								</tr>	
							</thead>
							<tbody>
								@forelse($all_badges as $key => $payment)
								<tr>
									<td><a href="javascript:void(0)"> {{ ++$key }} </a></td>
									<td><span class="text-muted"> </i> {{ $payment->paymentable->name }}</span> </td>
									<td> ₦{{ number_format($payment->amount) }} </td>
									<td> {{ $payment->tranx_ref }} </td>
									
									<td> <span class="text text-success">{{ date('d-m-Y', strtotime($payment->created_at)) }}</span> </span></td>
									
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

</div>
</section>
</div>

@endsection


