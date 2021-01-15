
@extends('layouts.admin')

@section('title')
FAQs | 
@endsection



@section('content')


<div class="content-wrapper" style="min-height: 868px;">


    <!-- Main content -->
    

<section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Slider Images
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
        <div class="row">
  @if(isset($sliders))

    @foreach($sliders as $key => $slider)            
            <div class="col-md-6">
                <p>
                    <strong>Slider {{ $key + 1 }} Image: </strong>
                                            <img src="{{asset('images')}}/{{$slider->image}}" alt="" style="margin-left: 20px; width: 30%">
                                           
                        <a onclick="deleteContact({{$slider->id}})">
                        <i class="icon ion-ios-trash-outline tx-40"></i>
                        </a>
                                        </p><form id="myForm" action="{{route('admin.save_slider' )}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$slider->id}}">

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="title" value="{{$slider->title}}" class="form-control" placeholder="Header Title" style="padding: .4rem .8rem;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" value="{{$slider->details}}" name="details" class="form-control" placeholder="Sub header"  style="padding: .4rem .8rem;">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                <p></p>
            </div>
          @endforeach
          @endif
        </div>
    </div>
</div>
<!-- /.box -->

</div>
<!-- /.col-->
</div>
<!-- ./row -->
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
            url: 'delete/sliders/' + id,
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


