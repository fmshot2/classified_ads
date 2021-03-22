
@extends('layouts.admin')
@section('title', 'City | ')

@section('content')
    <div class="content-wrapper" style="min-height: 868px;">
        <div class="container">
            @include('layouts.backend_partials.status')
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update <span class="text text-warning">{{ $city->name }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                            <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('admin.update.city', $city->slug)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                     <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name of City: </label>
                                        <input type="text" name="name" id="editSubCategoryName" class="form-control" value="{{ $city->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">State: </label>
                                        <select class="form-control" required id="state" name="state" required>
                                            <option value="">-- Select State --</option>
                                            @if(isset($states))
                                                @foreach($states as $state)
                                                    <option value="{{ trim($state->name) }}" {{ trim($state->name) === $city->states ? 'selected' : '' }}> {{ trim($state->name) }}  </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Region: </label>
                                        <input type="text" name="region" id="editSubCategoryName" class="form-control" value="{{ $city->region }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Body: </label>
                                        <input type="text" name="body" id="editSubCategoryName" class="form-control" value="{{ $city->body }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description: </label>
                                        <textarea name="description" id="basic-example" class="form-control">{{ $city->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">Thumbnail:</label>
                                    <input type="file" id="file" name="thumb" class="form-control">
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right"> Update </button>
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
                    @include('admin/section/city_dropzone')
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
