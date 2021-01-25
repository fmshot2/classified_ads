
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
									<th> Activate/Deactivate</th>
								</tr>	

									@foreach($seller as $key => $sellers)

									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ $sellers->name }} </td>
									<td><span class="text-muted"> </i> {{ $sellers->email }} </span> </td>
									<td> {{ $sellers->role }} </td>
									<td> {{ $sellers->created_at->diffForHumans() }} </span></td>
									<td>
										@if($sellers->status == 1)
										<span><p id="active_text">Activated</p></span>
										@elseif($sellers->status == 0)
										<span id="active_text2">Deactivated</span>
										@endif 
									</td>
					
									<td>
										<button id="" class="activate-submit btn-success" onclick="activateUser({{$sellers->id}})" type="button" class="btn btn-success">
											@if($sellers->status == 0)<span id="activate1">Activate User</span>@elseif($sellers->status == 1)<span id="activate2">Deactivate</span>
										@endif</button> 
									</td>

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
            	// alert(results);
            	console.log(results);
            	if (results.success == true)  {
swal("Done!", results.message, "success");
document.getElementById("activate1").innerHTML = results.message;
document.getElementById("activate2").innerHTML = results.status_message;
if (results.message === 'Activate') {
	document.getElementById("active_text").style.color='#dc3545';

} else {
		document.getElementById("active_text2").style.color='blue';

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


