<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<meta name="csrf-token" content="{{ csrf_token() }}">


	<title> @yield('title') EFContact Admin </title>

	<!-- bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">

	<!-- font awesome -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_components/font-awesome/css/font-awesome.css')}}">

	<!-- ionicons -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_components/Ionicons/css/ionicons.css')}}">

	<!-- theme style -->
	<link rel="stylesheet" href="{{asset('OurBackend/css/master_style.css')}}">

	<!-- Cross Admin skins -->
	<link rel="stylesheet" href="{{asset('OurBackend/css/skins/_all-skins.css')}}">

	<!-- morris chart -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_components/morris.js/morris.css')}}">

	<!-- date picker -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">

	<!-- daterange picker -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">

	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{asset('OurBackend/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">

	<link rel="stylesheet" href="{{asset('dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    {{-- <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}"/> --}}


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/ibiStyles.css') }}" rel="stylesheet" type="text/css" />

<style type="text/css">
    .dropzone {
        border:2px dashed #999999;
        border-radius: 10px;
    }
    .dropzone .dz-default.dz-message {
        height: 171px;
        background-size: 132px 132px;
        margin-top: -101.5px;
        background-position-x:center;

    }
    .dropzone .dz-default.dz-message span {
        display: block;
        margin-top: 145px;
        font-size: 20px;
        text-align: center;
    }
    .dt-buttons .dt-button {
        background: #cc8a19 !important;
        color: white !important;
    }

</style>

<script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
{{-- <script src="{{ asset('summernote/summernote.js') }}"></script> --}}


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

</head>

