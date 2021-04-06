@extends('layouts.app')
@section('title', 'The largest service place in Nigeria | ')

@section('content')


<!-- @include('layouts.frontend_partials.status') -->

@include('frontend_section/carousel')

@include('frontend_section/searchAjax')



{{-- Avatar MODULE  --}}
<div id="floatReferrer" onclick="closeReferrerFloatPop()" class="float-referrer animate__animated animate__fadeInLeft">
    <button type="button" class="close-referrer-float" id="closeReferrerFloat"><i class="fa fa-close"></i></button>
    <a href="{{ route('referralprogram') }}" target="_blank">
        <img class="refer-slides refer-slides-hidden animate__animated animate__fadeInLeft" src="{{ asset('image 1.png') }}">
        <img class="refer-slides refer-slides-hidden animate__animated animate__fadeInLeft" src="{{ asset('image 2.png') }}">
        <img class="refer-slides refer-slides-hidden animate__animated animate__fadeInLeft" src="{{ asset('image 3.png') }}">
    </a>
</div>

<style>
    .float-referrer{
        position: fixed;
        top:466px;
        left:0;
        width: 80px;
        z-index: 99999;
    }
    .float-referrer img{
        width: 250px;
    }
    .close-referrer-float{
        display: block;
        background-color: transparent;
        border: 0;
        cursor: pointer;
        color: rgb(238, 56, 56);
        font-size: 17px;
    }
    .bg-grea-3-hft{
        background: #ca830921;
    }

    @media (max-width: 768px){
        .float-referrer{
            display: none;
        }
    }

    /* Referral Image Slider  */
    .refer-slides { width: 100%; }
    .refer-slides-hidden { display : none; }
    /* Referral Image Slider Ends */
</style>

<script>
    var prevScrollpos = window.pageYOffset;
    addEventListener("scroll",() => {
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("floatReferrer").style.top = "0";
        } else {
            document.getElementById("floatReferrer").style.top = "-550px";
        }
        prevScrollpos = currentScrollPos;
    });

    /* Referral Image Slider  */
    addEventListener("load",() => { // "load" is safe but "DOMContentLoaded" starts earlier
        var index = 0;
        const slides = document.querySelectorAll(".refer-slides");
        const classHide = "refer-slides-hidden", count = slides.length;
        nextSlide();
        function nextSlide() {
            slides[(index ++) % count].classList.add(classHide);
            slides[index % count].classList.remove(classHide);
            setTimeout(nextSlide, 5000);
        }
    });
    /* Referral Image Slider Ends */

    function closeReferrerFloatPop() {
        document.getElementById("floatReferrer").remove();
    }



</script>





<script>
var x = document.getElementById("demo2");
var y = document.getElementById("latitude_id");
var z = document.getElementById("longitude_id");



function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
   var res = "Geolocation is not supported by this browser.";
  }
}


function showPosition(position) {

    // console.log('latitude', position.coords.latitude);

    $.ajax({
            type:'GET',
            url: 'findgeo',
            data: {
                latitude:position.coords.latitude, 
                longitude:position.coords.longitude 
            },
            success: function(result){
                    $('#servClosesToYouArea').show();
                        services = result.data;
                        services.forEach(service => {
                            badge = service.user.badgetype
                            if (badge == 1) {
                              badge = '<span class="featured bg-warning" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>';
                            }
                            if (badge == 2) {
                              badge = '<span class="featured bg-success" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>';
                            }
                            if (badge == 3) {
                              badge = '<span class="featured bg-primary" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i> Basic</span>';
                            }
                            if (badge == 0) {
                              badge = '';
                            }
                            // if (service.badge_type == 'trusted') {
                            //   service.badge_type == 'truuuue';
                            // }
                            $('#servicesCloseToYouRow').append(`<a href="/serviceDetail/`+ service.slug + `" class="property-img">
                                <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                    <div class="property-box">
                                        <div class="property-thumbnail">
                                            <div class="listing-badges">`+
                                                badge
                                            +`</div>
                                            <div class="price-ratings-box">
                                                <p class="price" style="text-transform: capitalize">
                                                    `+ service.user.name.substring(0, 10) + "..." + `
                                                </p>
                                            </div>
                                            <img class="d-block w-100 service_images" src="/uploads/services/`+ service.thumbnail + `" alt="properties">

                                        </div>
                                        <div class="detail">
                                            <div>
                                                <a class="title title-dk" href="/serviceDetail/`+ service.slug + `">`+ service.name.substring(0, 22) + "..." + `</a>
                                                <a class="title title-mb" href="/serviceDetail/`+ service.slug + `">`+ service.name.substring(0, 13) + "..." + `</a>
                                            </div>

                                            <ul class="d-flex flex-row justify-content-between info">
                                                <li>
                                                    <i class="fa fa-map-marker text-warning"></i> `+ service.state.substring(0, 5) + `
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>`
)

                        });
                }



            });
}
</script>




<script type="text/javascript">
        $(document).ready(function() {
        document.getElementById("complaint_notification").hidden = true;
        $(".btn-submit3").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var buyer_id = $("#buyer_id_report").val();
        var buyer_name = $("#buyer_name_report").val();
        var service_id = $("#service_id_report").val();
        var service_user_id = $("#service_user_id_report").val();
        var buyer_email = $("#buyer_email_report").val();
        var description = $("#description_report").val();
        function greet(){
                    document.getElementById("complaint_notification").hidden = true;
                    document.getElementById("complaint_notification").innerHTML = "";
                }
         function set(){
              setTimeout(greet, 20000);
         }


        $.ajax({
            type:'POST',
            url: '/buyer/createcomplaint',
            data: {_token:_token, buyer_id:buyer_id, buyer_name:buyer_name, buyer_email:buyer_email, service_id:service_id, service_user_id:service_user_id,  description:description },
            success: function(data) {
                  document.getElementById("complaint_notification").hidden = false;
                    document.getElementById("complaint_notification").innerHTML = "Your complaint was sent successfully";
            //   greet();
            set();

                }
            });
        });

    });
</script>

@include('frontend_section/category')

<div id="servClosesToYouArea" class="blog content-area bg-grea-3 hm-feat-ser-mid-sec">
    <div class="service-detail-container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1>Services Close To You </h1>
        </div>
        <div class="row" id="servicesCloseToYouRow"></div>
    </div>
</div>

@include('frontend_section/feature')

{{-- @include('frontend_section/recent') --}}

@include('frontend_section/popular')

{{-- @include('frontend_section/brands') --}}




<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
 <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
   </script>


<style type="text/css">
	.owl-item {width: 128.906px; margin-right: 10px; background:powderblue; }
</style>

<script type="text/javascript">
	var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
  // items change number for slider display on desktop

    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});
</script>



<script type="text/javascript">
    $(document).ready( function () {
        getLocation();

        $('#servClosesToYouArea').hide();
    });
</script>



@endsection
