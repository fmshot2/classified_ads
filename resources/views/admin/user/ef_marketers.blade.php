
@extends('layouts.admin')

@section('title')
All E.F Maketers |
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
						<h3 class="box-title"> All E.F Marketers</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th>Total Sales</th>
                                        <th> reg date</th>
                                        <th> status </th>
                                        <th> Downline </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($efmarketers as $key => $efmarketer)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td> {{ $efmarketer->name }} </td>
                                            <td><span class="text-muted"> </i> {{ $efmarketer->email }} </span> </td>
                                            <!-- @if ($efmarketer->role == 'seller')
                                                <td> Service Provider </td>
                                            @elseif($efmarketer->role == 'buyer')
                                                <td> Service Seeker </td>
                                            @endif -->
                                            <td> {{ $efmarketer->referals->count() }} </span></td>

                                            <td> {{ $efmarketer->created_at->format('d/m/Y') }} </span></td>
                                            <td>
                                                @if($efmarketer->status == 1)
                                                <span><p id="active_text">Activated</p></span>
                                                @elseif($efmarketer->status == 0)
                                                <span id="active_text2">Deactivated</span>
                                                @endif
                                            </td>
                                            <td class="center">
                                                    <a href="{{route('efMarketerDownline', $efmarketer->slug)}}" class="btn btn-warning "><i class="fa fa-eye"></i>View Downlines</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
					</div>

        <div class="form-stretch">
           
            <div class="row">
                <div class="col-md-3">
                    <h3 class="box-title"> Sort By Date </h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal form-element" 
                action="{{ route('admin.sort_ef_marketers_sales') }}" method="POST">
                @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">From</label>
                            <input type="date" name="start_date" class="form-control">
                            @error('start_date')
                            <span class="error">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">To</label>
                            <input type="date" name="end_date" class="form-control">
                            @error('end_date')
                            <span class="error">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="">
                            <button type="submit" class="btn btn-warning"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
					<!-- /.box-body -->
				</div>


				<!-- /.content -->
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


