
@extends('layouts.accountant')

@section('title')
All unpaid Referrals | 
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
						<h3 class="box-title"> All unpaid Referrals</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th style="display: none;"></th>
									<th> Name </th>
									<th>User Type</th>
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
								@forelse($all_payments as $key => $unpaid_payment)
								<tr>
									<td>{{ ++$key }}</td>
									<td style="display: none;" id="userID">{{ $unpaid_payment->id }}</td>
									<td> {{ $unpaid_payment->user->name }} </td>
									<td>{{ $unpaid_payment->user_type }}</td>
									<td>₦<span class="text-muted">{{ $unpaid_payment->amount_requested }} </span> </td>
									<td> ₦{{ $unpaid_payment->user->refererAmount }} </td>
									<td> {{ $unpaid_payment->user->bank_name }} </span></td>
									<td> <span class="text text-success">{{ $unpaid_payment->user->account_number }}</span> </span></td>
									@if($unpaid_payment->is_paid == 0)

										<td> <span class="text text-danger">Pending</span></td>
									@else
										<td> <span class="text text-danger">Paid</span></td>
									@endif
									@php
										$today = new \Carbon\Carbon;
										if($today->dayOfWeek == \Carbon\Carbon::FRIDAY){
											echo "<td> <span class='text text-warning'>Due</span></td>";
										} else {
											echo "<td> <span class='text text-danger'>Not Due</span></td>";
										}
										
									@endphp
									{{-- <td> <span class="text text-danger">Paid</span></td> --}}
									<td><button class="btn btn-success" onclick="makepayment()">Pay</button> </td>
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



{{-- 
<script type="text/javascript">
	$(document).ready( function () {
	    $('#data_table1').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
		  "language": {
    "paginate": {
      "previous": "Previous page"
    }
  }
		});
	});
</script> --}}
<script type="text/javascript">
    function makepayment()
    {
        event.preventDefault();
       let user_id = document.getElementById('userID').innerHTML
       if (confirm("Are you sure you want to pay this user?")) {
	       	$.ajax({
	       		headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	},
	            url: "/accountant/make-payment/"+user_id,
	            method: 'POST',
	            success: function(result)
	            {
	            	toastr.success("{{ Session::get('message') }}")
	            	location.reload()
	            }

	        }); 

       } else {
        	toastr.error("{{ Session::get('message') }}")
       		location.reload()
       }
        
    }
    
</script>

<script type="text/javascript">
function makepayment1(id) {
	swal({
	title: "Are you sure you want to pay this user?",
	text: "Please be sure and then confirm!",
	type: "warning",
	showCancelButton: !0,
	confirmButtonText: "Yes, pay!",
	cancelButtonText: "No, dont bother!",
	cancelButtonColor: '#dc3545',
	reverseButtons: !0
	}).then(function (e) {
		if (e.value === true) {

		$.ajax({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	},
            url: "/accountant/make-payment/"+user_id,
            method: 'post',
            success: function(results){
            	// alert(results);
            	console.log(results);
            	if (results.success === true)  {
					swal("Done!", results.message, "success");
					document.getElementById("activate").innerHTML = results.message;
					document.getElementById("active_text").innerHTML = results.status_message;
					if (results.message === 'Activate') {
					document.getElementById("active_text").style.color='#dc3545';

					} else {
					document.getElementById("active_text").style.color='blue';

				}

					window.location.assign(window.location.href);
				} else {
					swal("Error!", results.message, "error");
				}

	        }
        });

		} else {
			e.dismiss;
		}
	}, function (dismiss) {
		return false;
	})
}
</script>

@endsection


