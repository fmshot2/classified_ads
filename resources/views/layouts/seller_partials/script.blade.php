    <!-- Bootstrap css cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- End Bootstrap css cdn -->


    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">


    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    if (document.documentElement.clientWidth > 900) {
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1 = document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5ff49fb2c31c9117cb6bba8f/1er9ovkca';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    }
</script>
<!--End of Tawk.to Script-->

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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>



<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="{{ asset('select2js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#sub_categories").select2({
            placeholder: "Select a sub category (optional)",
            allowClear: true
        });
    });
</script>


<script type="text/javascript">
	$(document).ready( function () {
	    $('.data_table_main').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
	});

    var user_badge_type = document.getElementById('badge_type').value

    // Dropzone.options.dropzone = {
	//     maxFiles: user_badge_type,
    //     maxFilesize: 10,
    //     parallelUploads: 10,
    //     acceptedFiles: ".jpeg,.jpg,.png,.gif",
    //     addRemoveLinks: true,
    //     autoProcessQueue: false,
    //     init: function() {
    //         var dpzMultipleFiles = this;
    //         var submitButton = document.querySelector("#submit-all");
    //         submitButton.addEventListener("click", function () {
    //             dpzMultipleFiles.processQueue();
    //         });

    //         this.on("queuecomplete", function () {
    //             location.reload();
    //         });
    //         this.on("maxfilesexceeded", function(file){
    //             toastr.error("You can't upload more files.");
    //         });
    //     },
    //     success: function(file, response)
    //     {
    //         file.previewElement.id = response.success;
    //         var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
    //         file.previewElement.querySelector("img").alt = response.success;
    //         olddatadzname.innerHTML = response.success;
    //     },
    //     error: function(file, response)
    //     {
    //         if($.type(response) === "string")
    //             var message = response; //dropzone sends it's own error messages in string
    //         else
    //             var message = response.message;
    //         file.previewElement.classList.add("dz-error");
    //         _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
    //         _results = [];
    //         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
    //             node = _ref[_i];
    //             _results.push(node.textContent = message);
    //         }
    //         return _results;
    //     }
    // };

</script>

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

{{--      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
 --}}



	<!-- This is data table -->
    {{--<script src="{{asset('OurBackend/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>--}}

    <!-- start - This is for export functionality only -->

    <!-- end - This is for export functionality only -->

	<!-- Cross Admin for Data Table -->
	{{-- <script src="{{asset('OurBackend/js/pages/data-table.js')}}"></script> --}}


