
@extends('layouts.admin')
@section('title', 'Cities | ')

@section('content')
    <div class="content-wrapper" style="min-height: 868px;">
        <div class="container">
            @include('layouts.backend_partials.status')
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Tourist</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                            <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('admin.save_city')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                     <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name of site: </label>
                                        <input type="text" name="name" id="editSubCategoryName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">State: </label>
                                        <select class="form-control" required id="state" name="state" required>
                                            <option value="">-- Select State --</option>
                                            @if(isset($states))
                                                @foreach($states as $state)
                                                    <option id="state" value="{{$state->name}}"> {{ $state->name }}  </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Region: </label>
                                        <input type="text" name="region" id="editSubCategoryName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description: </label>
                                        <textarea name="description" id="basic-example" class="form-control"></textarea>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="file">Thumbnail:</label>
                                        <input type="file" id="file" name="thumb" class="form-control" required>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                                    </div>
                                    <!-- /.box-footer -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('admin/section/cities_table')
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    function editCategory(id) {

        event.preventDefault();

        $.ajax({
            url: '/admin/dashboard/single/category/' + id,
            method: 'GET',
            success: function(result){
                console.log(result);
                $('#editCategoryName').val(result.name);
                var url = '/admin/dashboard/single/category/' + id;
                $('form#editCategoryForm').attr('action', url);
                $('#editCategoryModal').modal('show');
            }
        });

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
