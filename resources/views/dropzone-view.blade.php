
@extends('layouts.seller')

@section('title')
Create Service | 
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 1263.84px;">
<form >

</form>

 <div class="container">
   <div class="form-group">
                   <h3 class="jumbotron">Laravel Multiple Imagesww Upload Using Dropzone</h3>
    <form method="post" action="{{route('service.save')}}" required name="file" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone"></form>
                  </div>
</div>



    <!-- /.content -->
  </div>



  <script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>

@endsection


