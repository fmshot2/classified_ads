
@extends('layouts.admin')

@section('title', 'All Agents | ')

@section('content')

<style>
    .deactivateClass{
        background-color: rgb(194, 77, 77); color: #fff
    }
    .activateClass{
        background-color: #00B08C; color: #fff
    }
</style>

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Agents Table</h3>
                        <p>List of all the agents on this platform</p>
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
                                        <th> Applied for Approval?</th>
                                        <th> Status </th>
                                        <th> Amount Earned </th>
                                        <th> Total Downline </th>
                                        <th> Activate/Deactivate</th>
                                        <th> Downlines</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agents as $key => $agent)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td> {{ $agent->name }} </td>
                                            <td><span class="text-muted"> </i> {{ $agent->email }} </span> </td>
                                            <td> {{ $agent->created_at->format('d/m/Y') }} </span></td>
                                            <td>
                                                @if($agent->status == 1)
                                                    <span><p id="active_text">Activated</p></span>
                                                @elseif($agent->status == 0)
                                                    <span id="active_text2">Deactivated</span>
                                                @endif
                                            </td>
                                            <td>{{ $agent->refererAmount ? $agent->refererAmount : 0 }} </td>
                                            <td>{{ $agent->referals->count() ? $agent->referals->count() : 0 }} </td>
                                            <td>
                                                <button id="actionBtn" class="activate-submit btn {{ $agent->status == 1 ? 'deactivateClass' : 'activateClass' }}" onclick="activateAgent({{$agent->id}})">
                                                    @if($agent->status == 0)<span id="activate1">Activate User</span>@elseif($agent->status == 1)<span id="activate2">Deactivate</span>
                                                    @endif
                                                </button>

                                            </td>
                                            <td class="center">
                                            <a href="{{route('agent_downline', $agent->id)}}" class="btn btn-warning "><i class="fa fa-eye"></i>View Downlines</a>
                                            </td>
                                          <!--   <td class="center">
                                            <a href="{{route('agents_downline_24hrs', $agent->id)}}" class="btn btn-warning "><i class="fa fa-eye"></i>Yesterday's Reg</a>
                                            </td> -->
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                                document.getElementById("activateBtn").innerHTML = results.status_message;
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
        function activateAgent(id) {
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
                        url: '/activate_agent/' + id,
                        method: 'get',
                        success: function(results){
                            if (results.success == true)  {
                                swal("Done!", results.message, "success");
                                document.getElementById("activate1").innerHTML = results.message;
                                document.getElementById("activate2").innerHTML = results.status_message;

                                if (results.message === 'Activate') {
                                    document.getElementById("active_text").style.color='#dc3545';
                                    $("#actionBtn").removeClass('deactivateClass');
                                    $("#actionBtn").addClass('activateClass');

                                } else {
                                    document.getElementById("active_text2").style.color='blue';
                                    $("#actionBtn").addClass('deactivateClass');
                                    $("#actionBtn").removeClass('activateClass');
                                    alert('Nope')

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


