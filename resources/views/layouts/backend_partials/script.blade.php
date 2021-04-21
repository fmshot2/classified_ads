
<!-- jQuery 3 -->
	<script src="{{asset('OurBackend/assets/vendor_components/jquery/dist/jquery.min.js')}}"></script>



	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('OurBackend/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>



<!-- SlimScroll -->
	<script src="{{asset('OurBackend/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

	<!-- FastClick -->
	<script src="{{asset('OurBackend/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>

	<!-- Cross Admin App -->
	<script src="{{asset('OurBackend/js/template.js')}}"></script>


<!-- Cross Admin for demo purposes -->
	<script src="{{asset('OurBackend/js/demo.js')}}"></script>

	<script type="text/javascript" src="{{asset('dropzone/dist/dropzone.js')}}"></script>



<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>




{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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


</script> --}}



<script type="text/javascript">
	$(document).ready( function () {
	    $('.data_table_main').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
		  language: {
    "paginate": {
      "ss1": "ss"
    }
  }
		});
	});
</script>

<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFiles: 5,
        maxFilesize: 10,
        parallelUploads: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        autoProcessQueue: false,
        init: function() {
            var dpzMultipleFiles = this;
            var submitButton = document.querySelector("#submit-all");
            submitButton.addEventListener("click", function () {
                dpzMultipleFiles.processQueue();
            });

            this.on("queuecomplete", function () {
                location.reload();
            });
        },
        success: function(file, response)
        {
            file.previewElement.id = response.success;
            var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
            file.previewElement.querySelector("img").alt = response.success;
            olddatadzname.innerHTML = response.success;
        },
        error: function(file, response)
        {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        }
    };
</script>
<script>
  $(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-4 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
  $(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }

    });
});
</script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>

    @if(Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        </script>
    @endif
	<!-- This is data table -->
    {{--<script src="{{asset('OurBackend/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>--}}

    <!-- start - This is for export functionality only -->

    <!-- end - This is for export functionality only -->

	<!-- Cross Admin for Data Table -->
	{{-- <script src="{{asset('OurBackend/js/pages/data-table.js')}}"></script> --}}


