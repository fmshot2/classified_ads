@extends('layouts.admin')

@section('title')
All Notification | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		<div class="w-75">
		@include('layouts.backend_partials.status')
		</div>
	</div>

	<section class="content">

	
		<div class="row">

			<div class="col-xs-12">



				<div class="box" >
					<div class="d-flex justify-content-start mb-4">
						<a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Send In-App Notification</a>
						</div>

   					<div class="box-header">
						<h3 class="box-title"> General  Notice</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Notification </th>
									<th> Date </th>
									<th> Action </th>
								</tr>

								@foreach($all_notification as $key => $all_notifications)

									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ Str::limit( $all_notifications->description, 100) }} </td>
									<td> {{ $all_notifications->created_at->diffForHumans() }} </td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<!-- View -->
												<li>  <a href=" {{ route('seller.notification.view',$all_notifications->slug) }}" class="btn btn-block" style="margin-left: 8px;"> View </a> </li>
											</ul>

										</ul>
									</div>
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


  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{route('admin.notification.send')}}">
                            {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Subject</label>
    <input type="text" required class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Message Subject">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <input type="text" required name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Message">
  </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>

    </div>
  </div>
</div>

@endsection


