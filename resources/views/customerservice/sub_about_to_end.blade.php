
@extends('layouts.admin')

@section('title', 'Subscription About To End Users Table | ')

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
						<h3 class="box-title"> Subscription About To End Table </h3>
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
                                        <th> Phone </th>
                                        <th> role </th>
                                        <th> Registration Date</th>
                                        <th> Sub End Date</th>
                                        <th> Last Plan type</th>
                                        <th> Services </th>
                                        <th> Call Status </th>
                                        <th> Call Duration </th>
                                        <th> Alternative Communication </th>
                                        <th> Client's Comment </th>
                                        <th> Customer Service Comments </th>
                                        <th> Customer Service Personel Name</th>
                                        <th> Add Report </th>
                                    </tr>
                                </thead>

                                    </tbody>
                                        @foreach($all_subscriptions as $key => $all_subscription)

                                    </tr>
                                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                        <td> {{ $all_subscription->name }} </td>
                                        <td><span id="11" class="text-muted"></i> {{ $all_subscription->email }} </span> </td>
                                        <td><span class="text-muted"> </i> {{ $all_subscription->phone ?? 'no phone'}} </span> </td>
                                        <td> {{ $all_subscription->role }} </td>
                                        <td> {{ $all_subscription->created_at->format('d/m/Y') }}</td>
                                        <td> {{ Carbon\Carbon::parse($all_subscription->subscriptions
                                        ->first()->subscription_end_date)->format('d/m/y') }} </td>
                                        <td>  {{ $all_subscription->subscriptions
                                        ->first()->sub_type }}</td>

                                        <td>
                                        @if($all_subscription->services->count())

                                        <p id="active_text">{{$all_subscription->services->count()}} &nbsp; services</p>
                                        <button type="button" class="btn btn-primary" 
                                        data-toggle="modal" data-target="#allServicess{{ $all_subscription->id }}">
                                        See Services
                                        </button>
                                        @elseif($all_subscription->services->count() == 0)
                                            <span id="active_text2">No Services Yet!</span>
                                            @endif                                         
                                            
                                         <!-- Modal -->
                                         <div class="modal fade" id="allServicess{{ $all_subscription->id }}" tabindex="-1" role="dialog" 
                                        aria-labelledby="allServicess{{ $all_subscription->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="allUsers{{ $all_subscription->id }}Label">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Service Name</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Approved?</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if($all_subscription->services->count())
                                                <p id="active_text">{{$all_subscription->services->count()}} &nbsp; services</p>
                                                @foreach($all_subscription->services as $key => $services)

                                                    <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{$services->name}}</td>
                                                    <td>{{$services->created_at}}</td>
                                                    <td>{{$services->is_approved ? 'Approved' : 'Not Yet Approved'}}</td>
                                                    </tr>
                                                    @endforeach

                                                    @endif

                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </td>
                                                                                
                                        <td> {{$all_subscription->customerservice->call_status ?? ''}} </td>
                                        <td><span class="text-muted"></i> {{$all_subscription->customerservice->call_duration ?? ''}} </span> </td>
                                        <td><span class="text-muted"> </i> {{$all_subscription->customerservice->alternative ?? ''}} </span> </td>
                                        <td> {{$all_subscription->customerservice->client_comment ?? ''}} </td>
                                        <td>{{$all_subscription->customerservice->customer_service_comment ?? ''}} </span></td>
                                        <td>{{$all_subscription->customerservice->customer_service_personel_name ?? ''}} </td>                                        
                                        <td>
                                        <button type="button" class="btn btn-primary" 
                                        data-toggle="modal" data-target="#allUsers{{ $all_subscription->id }}">
                                        Write Report
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="allUsers{{ $all_subscription->id }}" tabindex="-1" role="dialog" 
                                        aria-labelledby="allUsers{{ $all_subscription->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="allUsers{{ $all_subscription->id }}Label">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('save_report') }}" method="POST" class="message-form">
                                                @csrf
                                            <input type="hidden" class="form-control" id="user_id" name="user_id" 
                                            value="{{$all_subscription->id}}">
                                        <div class="form-group">
                                            <label for="call_status">Call Status</label>
                                            <input type="text" class="form-control" id="call_status" name="call_status" 
                                            value="{{$all_subscription->customerservice->call_status ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="call_duration">Call Duration</label>
                                            <input type="text" class="form-control" id="call_duration" name="call_duration" value="{{$all_subscription->customerservice->call_duration ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="alternative">Alternative Communication</label>
                                            <input type="text" class="form-control" id="alternative" name="alternative" 
                                            value="{{$all_subscription->customerservice->alternative ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_comment">Client's Comment</label>
                                            <textarea class="form-control" id="client_comment" name="client_comment" rows="3">{{$all_subscription->customerservice->client_comment ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_service_comment">Customer Service Comments</label>
                                            <textarea class="form-control" id="customer_service_comment" name="customer_service_comment" rows="3" 
                                            >{{$all_subscription->customerservice->customer_service_comment ?? ''}}</textarea>
                                        </div>
                                        
                                        <!-- <div class="form-group">
                                            <label for="alternative">Handled By</label>
                                            <input type="text" class="form-control" id="customer_service_personel_name"
                                             name="customer_service_personel_name"  value="{{$all_subscription->customerservice->customer_service_personel_name ?? ''}}">
                                        </div> -->
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                            </div>
                                           
                                            </div>
                                        </div>
                                        </div>
                                        </td>
                                </tr>
                                @endforeach


                            </tbody>


                        </table>
                        </div>


				</div>
<!-- 
                <div class="form-stretch">
           
           <div class="row">
               <div class="col-md-3">
                   <h3 class="box-title"> Sort By Date </h3>
               </div>
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
       </div> -->
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


