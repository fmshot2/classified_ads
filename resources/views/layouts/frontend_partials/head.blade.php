
<head>

 <title> @yield('title') EFContacts </title>


 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta charset="utf-8">

 <!-- External CSS libraries -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-submenu.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
 <link rel="stylesheet" href="css/leaflet.css')}}" type="text/css">
 <link rel="stylesheet" href="css/map.css')}}" type="text/css">
 <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons/style.css')}}">
 <link rel="stylesheet" type="text/css"  href="{{asset('css/jquery.mCustomScrollbar.css')}}">
 <link rel="stylesheet" type="text/css"  href="{{asset('css/dropzone.css')}}">
 <link rel="stylesheet" type="text/css"  href="{{asset('css/slick.css')}}">
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

 <!-- Custom stylesheet -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('css/skins/default.css')}}">

 <!-- Favicon icon -->
 <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" >

 <!-- Google fonts -->
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&amp;display=swap">

 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <link rel="stylesheet" type="text/css" href="{{asset('css/ie10-viewport-bug-workaround.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="{{ asset('css/ibiStyles.css') }}" rel="stylesheet" type="text/css" />


 <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
 <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
 <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

 <script src="{{ asset('js/app.js') }}" defer></script>
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


 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
