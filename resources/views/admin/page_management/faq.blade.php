
@extends('layouts.admin')

@section('title')
FAQs | 
@endsection



@section('content')


<div class="content-wrapper" style="min-height: 868px;">


    <!-- Main content -->
    

 <section class="content">

    <!-- START ALERTS AND CALLOUTS -->

    <button type="submit" class="btn btn-primary mg-r-5" data-toggle="modal" data-target="#modaldemo1"><i class="menu-item-icon icon ion-ios-plus-outline tx-20"></i> Add FAQ</button>

    <div class="row">
              @if(isset($faqs))

    @foreach($faqs as $key => $faq)
              <div class="col-md-6">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $key + 1 }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="alert alert alert-dismissible">
                <strong>Title:</strong>{{$faq->title}}<br>
                <br>
                <span class="tx-12 mb-5"><strong>Content</strong>{{ Str::limit($faq->details, 90) }}
                  {{--<button class="mb-5 btn btn-outline-success btn-sm" data-toggle="modal" data-target="#readAllModal{{$faq->id}}"><small>more</small></button>--}}
                </span>
              <div class="col-lg-12 mt-5">
                   <button type="submit" class="btn btn-success pd-x-20" data-toggle="modal" data-target="#readAllModal{{$faq->id}}">Read</button>
                  <button type="submit" class="btn btn-primary pd-x-20" data-toggle="modal" data-target="#editnewsModal{{$faq->id}}">Edit</button>
                  <button type="button" onclick="deleteContact({{$faq->id}})" class="btn btn-danger pd-x-20" data-dismiss="modal">Delete</button>
                  </div>
            </div>
          </div>
        </div>
      </div>


       <div id="editnewsModal{{$faq->id}}" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit FAQ</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="faqs" action="{{route('admin.save_faq' )}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$faq->id}}">
                      <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" value="{{$faq->title}}" id="titleEdit" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Description</label>
                                  <textarea cols="30" rows="5" name="details" id="bodyEdit" class="form-control">{{$faq->details}}</textarea>                                  
                                <strong class="text-danger">{{ $errors->first('details') }}</strong>
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
        </div>

      </div>





        <div id="readAllModal{{$faq->id}}" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">FAQ Details</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="faqs" action="{{route('admin.save_faq')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$faq->id}}">
                      <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" value="{{$faq->title}}" id="titleEdit" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Description</label>
                                  <textarea cols="30" rows="5" name="details" id="bodyEdit" class="form-control">{{$faq->details}}</textarea>
                              </div>
                          </div>
                      </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div>

      </div>
      @endforeach
      @endif

     
     
      <!-- /.col -->
            <!-- BASIC MODAL -->
    <div id="modaldemo1" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add FAQ</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="pharmCreate" action="{{route('admin.save_faq')}}" method="POST" enctype="multipart/form-data">
                                         {{ csrf_field() }}

                      <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" class="form-control" required="">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                <textarea id="basic-example" name="details">

                                 </textarea>

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

      </div>
   


    </div>


    <!-- END PROGRESS BARS -->

    <!-- END TYPOGRAPHY -->

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
              alert('successfull')
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


