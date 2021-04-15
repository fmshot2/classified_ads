

@extends('layouts.admin')

@section('title')
All Admins | 
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
						<h3 class="box-title"> Admins Table</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Name </th>
									<th> Email </th>
									<th> Date </th>
									<th> Status</th>
									<th> Activate/Deactivate</th>									
								</tr>	
</thead>
								<tbody>
								@foreach($admins as $key => $admin)
								<tr>
									<td><a href="javascript:void(0)"> {{ ++$key }} </a></td>
									<td> {{ $admin->name }} </td>
									<td><span class="text-muted"> </i> {{ $admin->email }} </span> </td>
									<td> {{ $admin->created_at->diffForHumans() }} </span></td>
									<td>@if($admin->status == 1)<span id="active_text" class="">Activated</span>@elseif($admin->status == 0)<span id="active_text" class="">Deactivated</span>@endif </td>
					
									<td>
										<button id="" class="activate-submit btn-success" onclick="activateUser({{$admin->id}})" type="button" class="btn btn-success">
											@if($admin->status == 0)<span id="activate">Activate User</span>@elseif($admin->status == 1)<span id="activate">Deactivate</span>
										@endif</button>
									</td>
										
										
									{{-- {{ $general_info->register_section_1_title ? $general_info->register_section_1_title : '' }} --}}

							</tr>

							@endforeach


						</tbody>


					</table>
    {{-- {{ $admins->links() }} --}}


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


