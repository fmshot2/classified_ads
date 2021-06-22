  
<script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<!-- Bootstrap css cdn -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- End Bootstrap css cdn -->


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





<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>










<script type="text/javascript">
	$(document).ready( function () {
	    $('.data_table_main').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
	});
</script>
  

	
	<!-- This is data table -->
    {{--<script src="{{asset('OurBackend/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>--}}
    
    <!-- start - This is for export functionality only -->

    <!-- end - This is for export functionality only -->
	
	<!-- Cross Admin for Data Table -->
	{{-- <script src="{{asset('OurBackend/js/pages/data-table.js')}}"></script> --}}


