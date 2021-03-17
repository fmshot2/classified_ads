
<div class="box">
  
  <!-- /.box-header -->
  <div class="box-body" style="padding: 20px">

    <p class="text text-danger">Payment requests if successful are processed and sent on Friday of each week.</p>
    <br>
      <!-- form start -->
      <form class="form-horizontal form-element" method="POST" action="{{route('buyer.submit.payemnt.request')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
           <div class="col-md-12">
              <div class="form-group">
                  <label for="">Amount: </label>
                  <input type="text" name="amount_requested" id="editSubCategoryName" class="form-control">
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
              <button type="submit" class="btn btn-warning pull-right"> Submit Request </button>
          </div>
          <!-- /.box-footer -->
      </form>

  </div>
</div>




