
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




{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>





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


	
	<!-- This is data table -->
    {{--<script src="{{asset('OurBackend/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>--}}
    
    <!-- start - This is for export functionality only -->

    <!-- end - This is for export functionality only -->
	
	<!-- Cross Admin for Data Table -->
	{{-- <script src="{{asset('OurBackend/js/pages/data-table.js')}}"></script> --}}


