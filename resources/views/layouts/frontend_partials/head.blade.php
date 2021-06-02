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

{{--
<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core-legacy.js"
        type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-service-legacy.js"
        type="text/javascript" charset="utf-8"></script> --}}

@livewireStyles




<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
 <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
 <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
 <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

 <script src="{{ asset('js/app.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="{{ asset('js/slick.min.js') }}"></script>





 <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('js/rangeslider.js') }}"></script>
<script src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/leaflet-providers.js') }}"></script>
<script src="{{ asset('js/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.filterizr.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.js') }}"></script>
<script src="{{ asset('js/maps.js') }}"></script>
<script src="{{ asset('glide/glide.min.js') }}"></script>
<script src="{{ asset('lightbox/lightbox-plus-jquery.min.js') }}"></script>
{{-- <script src="{{ asset('js/efScript.js') }}"></script> --}}
<script src="{{ asset('toastr/toastr.min.js') }}"></script>






<script>

    $(document).ready(function(){
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#liveChatModalFrame").attr('src');

        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#myModal").on('hide.bs.modal', function(){
            $("#liveChatModalFrame").attr('src', url);
        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#myModal").on('show.bs.modal', function(){
            $("#liveChatModalFrame").attr('src', url);
        });

        $("#moreLinkBtn").on('click', function(){
            $('#moreLinkModal').modal('toggle');
        });

        var glide = new Glide('.glide', {
            type: 'carousel',
            perView: 3,
            gap: 5,
            focusAt: 'center',
            autoplay: 2000,
            hoverpause: true,
            animationDuration: 3000,
            breakpoints: {
                800: {
                perView: 4
                },
                480: {
                perView: 3
                }
            }
        })

        glide.mount()

    });
</script>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    if (document.documentElement.clientWidth > 900) {
	    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5ff49fb2c31c9117cb6bba8f/1er9ovkca';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    }

</script>
<!--End of Tawk.to Script-->

    <script src="{{ asset('js/ibiScripts.js') }}"></script>

    <script>

    </script>


 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
      <script src="js/bootstrap-dropdownhover.min.js"></script>
      {{-- <canvas width="1280" height="960" style="position: absolute; top: 0px; left: 0px; width: 640px; height: 480px; background-color: rgb(245, 248, 250);"></canvas> --}}

      <style type="text/css">
          #mapContainer {
            width: 100% !important;
          }
      </style>

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
