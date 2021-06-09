
@extends('layouts.accountant')

@section('title')
All EF Contact Payments  | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">
            
           <h1>
           All EF Contact Payments
            <br><small>View and manage all EF contact payments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('accountant.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All EF Contact Payments.</li>
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
						<h3 class="box-title"> All EF Contact Payments.</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th>Name</th>
									<th>Email</th>
									<th> Payment Type </th>
									<th>  Amount </th>
									<th>  Transaction Reference </th>
									<th>  Date of Payment </th>
								</tr>	
							</thead>
							<tbody>
								@forelse($payments as $key => $payment)
								<tr>
									<td><a href="javascript:void(0)"> {{ ++$key }} </a></td>
									<td><span> </i> {{ $payment->paymentable->name ?? ''}}</span> </td>
									<td><span> </i> {{ $payment->paymentable->email ?? '' }}</span> </td>									
									<td><span class="text-muted"> </i> {{ $payment->payment_type }}</span> </td>
									<td> ₦{{ number_format($payment->amount) }} </td>
									<td> {{ $payment->tranx_ref }} </td>
									<td> {{ date('d-m-Y', strtotime($payment->created_at)) }} </td>
									
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


