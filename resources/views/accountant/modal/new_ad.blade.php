<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Advert Details</h5>
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
	      {{-- <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div> --}}
	    </div>
	  </div>
	</div>