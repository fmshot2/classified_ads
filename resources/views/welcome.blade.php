
@extends('layouts.app')

@section('title', 'The largest services database in the Nigeria | ')

@section('content')


@include('layouts.frontend_partials.status')

@include('frontend_section/carousel')

@include('frontend_section/search')


<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>
<input id="radi" type="number" name="radius">

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  var rad2 = document.getElementById("radi").value;
  var rad = slider.value;
  // output.innerHTML = slider.value;

   $.ajax({
            type:'GET',
            url: '/findgeo',
            data: {latitude:position.coords.latitude, longitude:position.coords.longitude, radius:rad },
            success: function(data) {
              console.log(data);
              // alert(data);
                }
            });
}
</script>


<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
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

@include('frontend_section/feature')

@include('frontend_section/recent')

@include('frontend_section/popular')

{{-- @include('frontend_section/brands') --}}

{{--<div class="partners">
    <div class="container">
        <h4>Brands and Partners</h4>
        <div class="slick-slider-area">
            <div class="row slick-carousel slick-initialized slick-slider" data-slick="{&quot;slidesToShow&quot;: 5, &quot;responsive&quot;:[{&quot;breakpoint&quot;: 1024,&quot;settings&quot;:{&quot;slidesToShow&quot;: 3}}, {&quot;breakpoint&quot;: 768,&quot;settings&quot;:{&quot;slidesToShow&quot;: 2}}]}"><div class="slick-list draggable" style="padding: 0px;"><div class="slick-track" style="opacity: 1; width: 3456px; transform: translate3d(-960px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-6" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-1.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-2.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-3.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-4.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-5.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned slick-active" data-slick-index="-1" aria-hidden="false" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-6.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-active" data-slick-index="0" aria-hidden="false" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-1.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-current slick-active slick-center" data-slick-index="1" aria-hidden="false" style="width: 192px;"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-2.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 192px;"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-3.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 192px;"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-4.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 192px;"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-5.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 192px;"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-6.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-1.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-2.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-3.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-4.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-5.png" alt="brand" class="img-fluid"></div></div></div><div class="slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" style="width: 192px;" tabindex="-1"><div><div class="slick-slide-item" style="width: 100%; display: inline-block;"><img src="/storage/clients/brand-6.png" alt="brand" class="img-fluid"></div></div></div></div></div></div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>--}}



<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
 <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
   </script>

<!----------HTML code starts here------->
{{--<div class="container">
<div class="owl-carousel owl-theme owl-loaded owl-drag">

       <div class="owl-stage-outer">

         <div class="owl-stage" style="transform: translate3d(-1527px, 0px, 0px); transition: all 0.25s ease 0s; width: 3334px;">

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>1</h4>
            </div>
         </div>

         <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>2</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>3</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>4</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>5</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>6</h4>
            </div></div>

           <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>7</h4>
            </div></div><div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>8</h4>
            </div></div>

           <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>9</h4>
            </div></div>

           <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>10</h4>
            </div></div><div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>11</h4>
            </div></div>

           <div class="owl-item active" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>12</h4>
            </div></div>

           <div class="owl-item active" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>13</h4>
            </div></div>

           <div class="owl-item active" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>14</h4>
            </div></div>

           <div class="owl-item active" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>15</h4>
            </div></div>

           <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>16</h4>
            </div></div>

           <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>17</h4>
            </div>
            </div>
            <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>18</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>19</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>20</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>21</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>22</h4>
            </div></div>

           <div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;"><div class="item">
              <h4>23</h4>
            </div></div>

           <div class="owl-item cloned" style=""><div class="item">
              <h4>24</h4>
            </div></div></div></div><div class="owl-nav disabled">

  </div>

</div>
</div>--}}


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


<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>





@endsection
