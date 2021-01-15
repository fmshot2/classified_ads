
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
             <a href="#" class="btn btn-primary btn-icon mg-r-5 mg-b-10" data-toggle="modal" data-target="#modaldemo1">Add Event <i class="fa fa-plus"></i></a>
           <div class="box-header">
             <h3 class="box-title">Events</h3>
             <h6 class="box-subtitle">Sorting is from the most recent.</h6>
           </div>
                      <!-- /.box-header -->
           <div class="box-body">
             <div id="example_wrapper" class="dataTables_wrapper no-footer"><div class="dt-buttons"><a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Copy</span></a><a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example" href="#"><span>CSV</span></a><a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Excel</span></a><a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example" href="#"><span>PDF</span></a><a class="dt-button buttons-print" tabindex="0" aria-controls="example" href="#"><span>Print</span></a></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div><table id="example" class="table table-bordered table-hover display nowrap margin-top-10 dataTable no-footer" role="grid" aria-describedby="example_info">
               <thead>
                   <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="SL.: activate to sort column descending" style="width: 36px;">SL.</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 319px;">Image</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 188px;">Title</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Body: activate to sort column ascending" style="width: 94px;">Description</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Time: activate to sort column ascending" style="width: 58px;">Time</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 51px;">Date</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Venue: activate to sort column ascending" style="width: 63px;">Venue</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 63px;">Action</th></tr>
               </thead>
               <tbody>                                             
                                    
                                        
                                              
 @forelse ($all_events as $key => $all_event) 
                                  
                              <tr role="row" class="odd">
                    <td class="sorting_1">{{ $key + 1 }}</td>

                    <td>

                                                    <img src="{{asset('images')}}/{{$all_event->image}}" alt="" class="margin" height="150" width="300">
                            
                    </td>
                    <td>{{$all_event->title}}</td>
                    <td>{{$all_event->description}}</td>
                    <td>{{$all_event->time}}</td>
                    <td>{{$all_event->date}}</td>
                    <td>{{$all_event->location}}</td>

                                        <td>
                    <a href="#" class="btn btn-primary btn-icon mg-r-5 mg-b-10" data-toggle="modal" data-target="#editserviceModal"><i class="fa fa-pencil"></i>ttytyytt</a>
                    <a href="#" class="btn btn-danger btn-icon mg-r-5 mg-b-10" onclick="deleteAdvert(10)"><i class="fa fa-trash"></i></a>
                    
                    </td>



   <div id="editserviceModal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Event</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="events" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="O2vJG4kSXMSOj9h4xtMHN6Wqc7n8PtjfTD2FCkN3">
              <input type="hidden" name="_method" value="PUT">
                      <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" id="titleEdit" value="{{$all_event->title}}" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" name="event_time" value="{{$all_event->time}}" id="eventtimeEdit" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="event_date" value="{{$all_event->date}}" id="eventdateEdit" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Venue</label>
                                <input type="text" name="location" id="venueEdit" value="{{$all_event->location}}" class="form-control">
                            </div>
                        </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Image</label>
                                  <input type="file" name="image" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Description</label>
                                  <textarea cols="30" rows="5" name="description" value="{{$all_event->description}}" id="contentEdit" class="form-control"></textarea>
                              </div>
                          </div>
                      </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20" onclick="TerminateAdvert(10)">Update <i class="fa fa-refresh"></i></button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
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
    <div id="modaldemo1" class="modal fade" style="display: none;">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Event</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="myForm" action="{{route('admin.save_event')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
              <div class="row">
              <div class="col-md-12">
                      <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" class="form-control" required="">
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="time" name="event_time" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="event_date" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Venue</label>
                        <input type="text" name="location" class="form-control">
                    </div>
                </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="file" class="form-control" required="">
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="">Description</label>
                         <textarea type="text" name="description" class="form-control"></textarea>
                      </div>
                  </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20">Save</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
        <!-- BASIC MODAL -->
   
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