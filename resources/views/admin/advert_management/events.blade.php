
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
            <a href="#" class="btn btn-primary btn-icon mg-r-5 mg-b-10" data-toggle="modal" data-target="#createadvertModal">Create Advert <i class="fa fa-plus"></i></a>
          <div class="box-header">
            <h3 class="box-title">Active Adverts</h3>
            <h6 class="box-subtitle">Sorting is from the most recent.</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="example_wrapper" class="dataTables_wrapper no-footer"><div class="dt-buttons"><a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Copy</span></a><a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example" href="#"><span>CSV</span></a><a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Excel</span></a><a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example" href="#"><span>PDF</span></a><a class="dt-button buttons-print" tabindex="0" aria-controls="example" href="#"><span>Print</span></a></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div><table id="example" class="table table-bordered table-hover display nowrap margin-top-10 dataTable no-footer" role="grid" aria-describedby="example_info">
              <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="SL.: activate to sort column descending" style="width: 38px;">SL.</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Banner: activate to sort column ascending" style="width: 334px;">Banner</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date Start: activate to sort column ascending" style="width: 161px;">Date Start</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date End: activate to sort column ascending" style="width: 161px;">Date End</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 156px;">Category</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th></tr>
              </thead>
              <tbody>
                                                
                                  
                                  
                                  
                                  
 @forelse ($active_adverts as $key => $active_advert) 
                                  
                              <tr role="row" class="odd">
                    <td class="sorting_1">1</td>
                    <td>

                                                    <img src="{{asset('images')}}/{{$active_advert->image}}" alt="" class="margin" height="150" width="300">
                            
                    </td>
                    <td></td>
                    <td></td>
                                        <td>{{$active_advert->category}}</td>
                                        <td>
                    <a href="#" class="btn btn-primary btn-icon mg-r-5 mg-b-10" data-toggle="modal" data-target="#advertactionModal" onclick="TerminateAdvert(10)"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-danger btn-icon mg-r-5 mg-b-10" onclick="deleteAdvert(10)"><i class="fa fa-trash"></i></a>
                    
                    </td>
                    @empty
    <td>No records yet</td>
  </tr>
@endforelse 
                    </tbody>

          </table><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 7 of 7 entries</div><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a><span><a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="example" data-dt-idx="2" tabindex="0" id="example_next">Next</a></div></div>



          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->



    </div>
    <!-- BASIC MODAL -->
    <div id="createadvertModal" class="modal fade" style="display: none;">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Advert</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form action="https://efcontact.com/admin/add-dvertisement" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="aoDmdSClAKwiZpfvjb69aFMsGAWSS8E3W0gTrnCX">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Banner</label>
                            <input type="file" name="image" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" name="date_start" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" name="date_end" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">WebLink</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="status" required="">
                            <option value="" disabled="" selected="">---Assign Badge---</option>
                            <option value="1">Home page banner</option>
                            <option value="2">Propery page banner</option>
                            <option value="3">Search result banner</option>
                            <option value="4">Email newsletter</option>
                            <option value="6">Event Page Banner</option>

                        </select>
                    </div>
                </div>
                </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20">Submit <i class="fa fa-save"></i></button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
    <!-- BASIC MODAL -->
    <div id="advertactionModal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Advert</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="terminateadvert" action="" method="post">
              <input type="hidden" name="_token" value="aoDmdSClAKwiZpfvjb69aFMsGAWSS8E3W0gTrnCX">
              <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" name="date_start" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" name="date_end" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">WebLink</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Action</label>
                        <select name="ad_type" id="" required="">
                            <option value="" disabled="" selected="">---Select Option---</option>
                            <option value="inactive">Terminate Advert</option>

                        </select>
                    </div>
                </div>
                </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20">Submit <i class="fa fa-save"></i></button>
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