<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0N9KEJ9ZZ9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0N9KEJ9ZZ9');
</script>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" >
	

	<meta name="csrf-token" content="{{ csrf_token() }}">


	<title> @yield('title') EFContact Seeker </title>

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

    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<link href="{{ asset('cms/css/ibiStyles_cms.css') }}" rel="stylesheet" type="text/css" />

<style type="text/css">
	.dt-buttons .dt-button {
		background: #cc8a19 !important;
		color: white !important;
	}
</style>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '476944133484426');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=476944133484426&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</head>

