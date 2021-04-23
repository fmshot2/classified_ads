
@extends('layouts.accountant')

@section('title')
Advert Payments  | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">
            
           <h1>
           All Advert Payments
            <br><small>View and manage all advert payments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('accountant.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Advert referals</li>
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
						<h3 class="box-title"> Adverts <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-warning">Add Advert Payment</a></h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Name </th>
									<th> Amount Paid </th>
									<th> Email </th>
									<th> Business </th>
									<th> Package </th>
									<th> Transaction ID </th>
									<th> Start Date </th>
									<th> End Date </th>
									<th> Status </th>
									<th> Action </th>									
								</tr>	
							</thead>
							<tbody>
								@forelse($ads as $key => $ad)
								<tr>
									<td><a href="javascript:void(0)"> {{ ++$key }} </a></td>
									<td><span class="text-muted"> </i> {{ $ad->name }}</span> </td>
									<td> ₦{{ number_format($ad->amount) }} </td>
									<td> {{ $ad->email }} </span></td>
									<td> {{ $ad->business }}</td>
									<td> {{ $ad->package }}</td>
									<td> {{ $ad->trans_slip_id }}</td>
									<td> {{ $ad->start_date }}</td>
									<td> {{ $ad->end_date }}</td>
									@if(date('Y-m-d', strtotime($ad->end_date)) == date('Y-m-d'))
									<td> <span class="text text-danger">Due</span></td>
									@else
									<td> <span class="text text-success">Running</span></td>
									@endif
									<td class="center">
						                <a type="button" data-toggle="modal" data-target="#editModal" class="btn btn-default btn-outline btn-sm" href=""><i class="fa fa-pencil"></i></a>

						            </td>
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Update Advert Payment Details</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <form class="form-horizontal form-element" method="POST" action="{{route('accountant.update.ad', $ad->id)}}" enctype="multipart/form-data">
							                {{ csrf_field() }}
							                     <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Name of User </label>
							                        <input type="text" name="name" id="editSubCategoryName" class="form-control" value="{{ $ad->name }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Amount Paid: </label>
							                        <input type="text" name="amount" id="editSubCategoryName" class="form-control" value="{{ $ad->amount }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Email: </label>
							                        <input type="text" name="email" id="editSubCategoryName" class="form-control" value="{{ $ad->email }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Business: </label>
							                        <input type="text" name="business" id="editSubCategoryName" class="form-control" value="{{ $ad->business }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Advert Type: </label>
							                        <input type="text" name="package" id="editSubCategoryName" class="form-control" value="{{ $ad->package }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Transaction Slip ID: </label>
							                        <input type="text" name="trans_slip_id" id="editSubCategoryName" class="form-control" value="{{ $ad->trans_slip_id }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Start Date:  {{ date('Y-m-d', strtotime($ad->start_date)) }} </label>
							                        <input type="date" name="start_date" id="editSubCategoryName" class="form-control">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">End Date: {{ date('Y-m-d', strtotime($ad->end_date)) }}</label>
							                        <input type="date" name="end_date" id="editSubCategoryName" class="form-control">
							                    </div>
							                </div>
							                    <!-- /.box-body -->
							                <div class="box-footer">
							                    <button type="submit" class="btn btn-warning pull-right"> Update </button>
							                </div>
							                    <!-- /.box-footer -->
							            </form>
								      </div>
								    </div>
								  </div>
								</div>
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

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Advert Payment Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form class="form-horizontal form-element" method="POST" action="{{route('accountant.save.ad')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                     <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Name of User </label>
                        <input type="text" name="name" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Amount Paid: </label>
                        <input type="text" name="amount" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Email: </label>
                        <input type="text" name="email" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Business: </label>
                        <input type="text" name="business" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Advert Type: </label>
                        <input type="text" name="package" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Transaction Slip ID: </label>
                        <input type="text" name="trans_slip_id" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Start Date: </label>
                        <input type="date" name="start_date" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">End Date: </label>
                        <input type="date" name="end_date" id="editSubCategoryName" class="form-control">
                    </div>
                </div>
                    <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                </div>
                    <!-- /.box-footer -->
            </form>
	      </div>
	    </div>
	  </div>
	</div>

</div>
</section>
</div>


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


