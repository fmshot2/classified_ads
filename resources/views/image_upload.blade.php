<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 6.2 Dropzone Multiple Image Upload Tutorial</title>
    <meta name="_token" content="{{csrf_token()}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
</head>
<body>
<div class="container">

    <div class="text-center" style="margin: 20px 0px 20px 0px;">
        <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/hHZjfUq.png"></a><br>
        <span class="text-secondary">Laravel 6.2 Dropzone Multiple Image Upload Tutorial</span>
    </div>

    <form method="post" action="{{url('upload/store')}}" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        @csrf
    </form>
</div>

<script type="text/javascript">
    Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function (file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url("delete") }}',
                    data: {filename: name},
                    success: function (data) {
                        console.log("File has been successfully removed!!");
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
</script>

</body>
</html>