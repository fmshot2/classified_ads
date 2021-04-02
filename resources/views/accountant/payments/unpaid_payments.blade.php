
@extends('layouts.accountant')

@section('title')
Agent's Pending Payments | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">
            
           <h1>
           Agent's Pending Payments
            <br><small>View and attend to pending payment requests</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <section class="content">
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Unpaid/Failed Transactions</h3>
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
									<th>Bank</th>
									<th>Account Number</th>
									<th> Payment Status </th>
									<th>Date of Request</th>
									{{-- <th>Due Date</th>	 --}}
									<th> Action </th>									
								</tr>	
							</thead>
							<tbody>
								@forelse($pending_payments as $key => $unpaid_payment)
								<tr>
									<td>{{ ++$key }}</td>
									<td style="display: none;" id="userID">{{ $unpaid_payment->id }}</td>
									@if($unpaid_payment->getOwner())
										<td> {{ $unpaid_payment->getOwner()->name }} </td>
									@endif
									<td>₦<span class="text-muted">{{ number_format($unpaid_payment->amount_requested) }} </span> </td>
									@if($unpaid_payment->getOwner())
										<td> ₦{{ number_format($unpaid_payment->getOwner()->refererAmount) }} </td>
										<td> {{ number_format($unpaid_payment->getOwner()->bankname) }} </td>
										<td> {{ number_format($unpaid_payment->getOwner()->accountname) }} </td>
										<td> {{ number_format($unpaid_payment->getOwner()->accountno) }} </td>
									@endif
									@if($unpaid_payment->is_paid == 0)

										<td> <span class="text text-danger">Pending</span></td>
									@else
										<td> <span class="text text-danger">Paid</span></td>
									@endif
									<td>{{ date('d-m-Y', strtotime($unpaid_payment->created_at)) }}</td>
									{{-- @php
										$today = new \Carbon\Carbon;
										if($today->dayOfWeek == \Carbon\Carbon::FRIDAY){
											echo "<td> <span class='text text-warning'>Due</span></td>";
										} else {
											echo "<td> <span class='text text-danger'>Not Due</span></td>";
										}
										
									@endphp --}}
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
<script>
        function activateUser22(id) {

    event.preventDefault();
    if (confirm("Are you sure you want to change this user's status?")) {

        $.ajax({
            url: '/activate_user/' + id,
            method: 'get',
            success: function(result){
              alert('successfull');
                window.location.assign(window.location.href);
            }
        });
// '/admin/delete/faqs/{id}'

    } else {
              alert('failed');

        console.log('Delete process cancelled');

    }

    }
    </script>



    <script type="text/javascript">
function activateUser(id) {
swal({
title: "Change this user's status?",
text: "Please be sure and then confirm!",
type: "warning",
showCancelButton: !0,
confirmButtonText: "Yes, change it!",
cancelButtonText: "No, dont bother!",
cancelButtonColor: '#dc3545',
reverseButtons: !0
}).then(function (e) {
if (e.value === true) {

$.ajax({
            url: '/activate_user/' + id,
            method: 'get',
            success: function(results){
            	alert(results);
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


