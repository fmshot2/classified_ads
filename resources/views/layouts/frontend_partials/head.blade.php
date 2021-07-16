<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0N9KEJ9ZZ9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0N9KEJ9ZZ9');
</script>

 <title> @yield('title') EFContact </title>


 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <meta charset="utf-8">
 <meta name="theme-color" content="#CA8309" />
 <!-- Favicon icon -->
 <link rel="shortcut icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon" />

 <!-- External CSS libraries -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-submenu.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
 <link rel="stylesheet" href="{{asset('css/leaflet.css')}}" type="text/css">
 <link rel="stylesheet" href="{{asset('css/map.css')}}" type="text/css">
 <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons/style.css')}}">
 <link rel="stylesheet" type="text/css"  href="{{asset('css/jquery.mCustomScrollbar.css')}}">
 <link rel="stylesheet" type="text/css"  href="{{asset('css/dropzone.css')}}">
 <link rel="stylesheet" type="text/css"  href="{{asset('css/slick.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

 <!-- Required Core Stylesheet -->
<link rel="stylesheet" href="{{asset('glide/css/glide.core.min.css')}}">

<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{asset('glide/css/glide.theme.min.css')}}">
<link rel="stylesheet" href="{{asset('lightbox/lightbox.min.css')}}">

 <!-- Custom stylesheet -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('css/skins/default.css')}}">

 <!-- Google fonts -->
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&amp;display=swap">

 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/ie10-viewport-bug-workaround.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link href="{{ asset('css/ibiStyles.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/fmstyles.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/bootstrap-dropdownhover.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">

@yield('extra-styles')

@livewireStyles




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
