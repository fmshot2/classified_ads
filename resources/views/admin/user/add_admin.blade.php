

@extends('layouts.admin')

@section('title')
Add Admin | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	{{-- <div class="container">
		@include('layouts.backend_partials.status')
	</div> --}}

	<section class="content">

		<div class="row">
			<div class="col-xs-12">

<div class="box">
              <div class="box-header">
                <h3 class="box-title">Add Admin</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <div class="card">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-md-6 col-sm-12">


                                    <form class="form-horizontal form-element" method="POST" action="{{route('superadmin.submit.admin')}} " enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Name</label>
                                                <input type="text" name="name" id="site_name" class="form-control" autofocus="" placeholder="Name of Admin" value="{{ old('name') }}">
                                            </div>
                                            @if ($errors->has('name'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
				                            </span>
				                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Email</label>
                                                <input type="text" name="email" id="site_name" class="form-control" autofocus="" placeholder="Email Address of Admin" value="{{ old('email') }}">
                                                
                                            </div>
                                            @if ($errors->has('email'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
				                            </span>
				                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Password</label>
                                                <input type="password" name="password" id="passwordField" class="form-control" placeholder="Enter Password (min:6)">
                                            </div>
                                            @if ($errors->has('password'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
				                            </span>
				                            @endif
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" style="float: left; margin-top: -15px; margin-bottom: 20px; margin-left: 20px; font-size: 14px">
                                                	</label>
					                                <input type="checkbox" onclick="showPassword()" style="float: left;">Show Password
					                            
                                            </div>
                                        </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-warning btn-sm"> Add Admin </button>
                                    </div>

                                </form>



                            </div>

                            
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>


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

<script>
    function showPassword() {
        var passField = document.getElementById("passwordField");
        if (passField.type === "password") {
            passField.type = "text";
        } else {
            passField.type = "password";
        }
    }
</script>

@endsection


