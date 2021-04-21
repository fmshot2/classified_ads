
@extends('layouts.accountant')

@section('title')
All Agents Activity | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">
            
           <h1>
           All Agents Activity
            <br><small>View All Agents Activity</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('accountant.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All Agents Activity</li>
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
						<h3 class="box-title"> All Agents Activity</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th style="display: none;"></th>
									<th> Name </th>
									<th> Total Balance </th>
									<th>Account Name</th>
									<th> Bank </th>
									<th> Account Number </th>										
								</tr>	
							</thead>
							<tbody>
								@forelse($payments as $key => $payment)
								<tr>
									<td>{{ ++$key }}</td>
									<td style="display: none;" id="userID">{{ $payment->id }}</td>
									<td> {{ $payment->name ?? '' }} </td>
									<td> ₦{{ number_format($payment->refererAmount ?? '0') }} </td>
									<td> {{ $payment->accountname ?? 'NA' }} </span></td>
									<td> {{ $payment->bankname ?? 'NA' }} </span></td>
									<td> <span>{{ $payment->accountno ?? 'NA' }}</span> </span></td>
									
									
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


