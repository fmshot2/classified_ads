
@extends('layouts.admin')

@section('title')
Pending Adverts | 
@endsection



@section('content')


<div class="content-wrapper" style="min-height: 868px;">


    <!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Untreated Advert Requests</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 dataTable no-footer">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Category</th>
                    {{--<th>Date</th>--}}
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                             @forelse ($pending_advert_requests as $pending_advert_request)
                             <tr>
                    <th>{{$pending_advert_request->seller_name}}</th>
                    <th>{{$pending_advert_request->email}}</th>
                    <th>{{$pending_advert_request->phone}}</th>
                    <th>{{$pending_advert_request->category}}</th>
@empty
    <th>No records yet</th>
  </tr>
@endforelse   
                                            </tbody>

          </table>



          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->



    </div>
    <!-- BASIC MODAL -->
    <div id="markasreadModal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Advert Request</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="markasread" action="" method="post">
              <input type="hidden" name="_token" value="KqR695Fmu22aXArHnXt4tU6IVXLcnXOlubuS0LxT">
              <input type="hidden" name="_method" value="PUT">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Action</label>
                        <select name="status" id="" required="">
                            <option value="" disabled="" selected="">---Select Option---</option>
                            <option value="1">Treated</option>
                            <option value="0">UnTreated</option>

                        </select>
                    </div>
                </div>
                </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20">Update <i class="fa fa-refresh"></i></button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
    <!-- /.row -->
  </section>
<script>

    function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'faqs/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#titleEdit').val(result.title);
        $('#bodyEdit').val(result.body);
        var url = 'faqs/' + id;
        $('form#faqs').attr('action', url);
        $('#editfaqsModal').modal('show');
    }
    });

    }
    </script>
    <script>
        function deleteContact(id) {

    event.preventDefault();

    if (confirm("Are you sure?")) {

        $.ajax({
            url: 'delete/faqs/' + id,
            method: 'get',
            success: function(result){
                window.location.assign(window.location.href);
            }
        });

    } else {

        console.log('Delete process cancelled');

    }

    }
    </script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


</script>
    <!-- /.content -->
  </div>


@endsection


