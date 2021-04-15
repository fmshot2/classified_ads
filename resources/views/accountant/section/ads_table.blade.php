


{{-- @include('layouts.backend_partials.status') --}}


<div class="box">

	<div class="box-header">
		<h3 class="box-title"> Advert Payments Table</h3>
		<a data-toggle="modal" data-target="#exampleModal" class="btn btn-warning model_img img-responsive pull-right"> Add Advert Payment </a>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class="table table-hover">

			<tbody>

				<tr>
					<th> # </th>
					<th style="display: none;"></th>
					<th> Transaction ID </th>
					<th> Name </th>
					<th> Amount Paid </th>
					<th> Business </th>
					<th> Advert Type </th>
					<th>Status</th>
					<th> Action </th>
				</tr>

				
					@forelse($ads as $key=>$all_payment)
					<tr>
						<td>{{ ++$key }}</td>
						<td style="display: none;" id="userID">{{ $all_payment->id }}</td>
						<td> {{ $all_payment->trans_slip_id }} </td>
						<td> {{ $all_payment->name }} </td>
						<td>₦<span class="text-muted">{{ number_format($all_payment->amount) }} </span> </td>
						<td> {{ $all_payment->business }} </td>
						<td> {{ $all_payment->package }} </td>
						@if(date('Y-m-d', strtotime($all_payment->end_date)) == date('Y-m-d'))
						<td> <span class="text text-danger">Due</span></td>
						@else
						<td> <span class="text text-success">Running</span></td>
						@endif
						<td class="center">
			                <a type="button" data-toggle="modal" data-target="#editModal" class="btn btn-default btn-outline btn-sm" href=""><i class="fa fa-pencil"></i></a>

			            </td>
						{{-- @if($all_payment->is_paid == 0)
						<td><button class="btn btn-warning" onclick="makepayment()">Pay</button> </td>
						@else
						<td><button class="btn btn-success">Paid</button> </td>
						@endif --}}
						<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Edit Advert Details</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <form class="form-horizontal form-element" method="POST" action="{{route('accountant.update.ad', $all_payment->id)}}" enctype="multipart/form-data">
							                {{ csrf_field() }}
							                     <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Name of User </label>
							                        <input type="text" name="name" id="editSubCategoryName" class="form-control" value="{{ $all_payment->name }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Amount Paid: </label>
							                        <input type="text" name="amount" id="editSubCategoryName" class="form-control" value="{{ $all_payment->amount }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Email: </label>
							                        <input type="text" name="email" id="editSubCategoryName" class="form-control" value="{{ $all_payment->email }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Business: </label>
							                        <input type="text" name="business" id="editSubCategoryName" class="form-control" value="{{ $all_payment->business }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Advert Type: </label>
							                        <input type="text" name="package" id="editSubCategoryName" class="form-control" value="{{ $all_payment->package }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Transaction Slip ID: </label>
							                        <input type="text" name="trans_slip_id" id="editSubCategoryName" class="form-control" value="{{ $all_payment->trans_slip_id }}">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">Start Date:  {{ date('Y-m-d', strtotime($all_payment->start_date)) }} </label>
							                        <input type="date" name="start_date" id="editSubCategoryName" class="form-control">
							                    </div>
							                </div>
							                <div class="col-md-12">
							                    <div class="form-group">
							                        <label for="">End Date: {{ date('Y-m-d', strtotime($all_payment->end_date)) }}</label>
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
								      {{-- <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Save changes</button>
								      </div> --}}
								    </div>
								  </div>
								</div>
							@empty
							</tr>
							@endforelse

			</tbody>
		</table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
	{{ $ads->links() }}
</div>
</div>




@include('accountant/modal/new_ad')
