<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">
  <div class="">
    <div class="search-section-area">
      <div class="search-area-inner">
        <div class="search-contents">


         <form>

         </form>
         <form action="{{route('search3')}}" method="GET">
          <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-2 col-md-4 col-sm-6">
              <p> <span id="">Keyword</span></p>
              <div class="form-group">
                <input type="text" name="name" class="form-control">
              </div>
            </div>


            <div class="col-lg-2 col-md-6 col-sm-6 col-6 text-center">
                <p>Choose Distance(in km): <span id="demo"></span></p>
              <div class="slidecontainer">
                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
              </div>


            </div>                        

            <div class="col-lg-2 col-md-4 col-sm-6 text-center">
              <div class="form-group">
                  <p class=""> <span id="">Choose Category</span></p>
                <select class="form-control" required id="categories" name="category">
                  <option value="">- . -</option>
                  @if(isset($categories))
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}"> {{ $category->name }}  </option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 text-center">
              <div class="form-group">
                  <p> <span id=""> Choose Sub-Category</span></p>
                <select class="form-control" id="sub_category" name="sub_categories">
                  <option value="">- . -</option>
                </select>
              </div>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6 text-center">
              <div class="form-group">
                <p> <span id="">Choose State</span></p>
                <select class="form-control" id="state" name="state">
                  <option value="">-.-</option>
                  @if(isset($states))
                  @foreach($states as $state)

                  <option value="{{$state->name}}"> {{ $state->name }}  </option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>

           {{--  <div class="col-lg-2 col-md-4 col-sm-6" style="">
              <div class="form-group">
                <select class="form-control" id="city" name="city">
                  <option value="">- Select City -</option>
                </select>
              </div>
            </div> --}}

            <div class="col-lg-1 col-md-4 col-sm-6 text-center">
              <div class="form-group">
                <p> <span id=""></span>.</p>
                <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning">Search 
                  {{-- <i class="fa fa-search ml-2" aria-hidden="true"></i> --}}
                </button>
              </div>
            </div>

           {{--  <div class="col-lg-2 col-md-4 col-sm-6">
              <div class="form-group">
                <input type="hidden" name="name2" class="form-control" placeholder="">
              </div>
            </div> --}}

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<header class="top-header top-header-ads-mobile" style="display: flex; justify-content: center; background: linear-gradient(90deg, rgba(251,219,35,1) 52%, rgba(243,163,27,1) 66%); width: 100%; margin: 0">
  <a href="https://efskyview.com/">
    <img src="{{ asset('images/skyviewstickyads.gif') }}" alt="" style="width: 100%; height: 35px">
  </a>
</header>



<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>


<script type="text/javascript">
  $('#categories').on('change',function(){
    var categoryID = $(this).val();
    if(categoryID){
     $.ajax({
      type:"GET",
                //url:"{{url('qqq')}}"+stateID,
                url: 'api/get-category-list/'+categoryID,
                success:function(res){
                  if(res){
                    console.log(res);
                    console.log(categoryID);
                    $("#sub_category ").empty();
                    $.each(res,function(key,value){
                      $("#sub_category").append('<option value="'+key+'">'+value+'</option>');
                    });
                  }else{
                    $("#sub_category").empty();
                  }
                }
              });
   }else{
     $("#sub_category").empty();
   }
 });
</script>

<script type="text/javascript">

  $('#state').on('change',function(){
    var state_name = $(this).val();
    if(state_name){
     $.ajax({
      type:"GET",
            //url:"{{url('qqq')}}"+stateID,
            url: 'api/get-city-list/'+state_name,
            success:function(res){
             if(res){
              console.log(res);
              console.log(state_name);
              $("#city").empty();
              $.each(res,function(key,value){
                $("#city").append('<option value="'+key+'">'+value+'</option>');
              });

            }else{
              $("#city").empty();
            }
          }
        });
   }else{
    $("#city").empty();
  }

});

</script>


{{-- for the range slider to input distanc in the search bar --}}


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
    background: #f0ad4e;
    cursor: pointer;
  }

  .slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #f0ad4e;
    cursor: pointer;
  }
</style>


{{-- <script>

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  var rad2 = document.getElementById("myRange").value;
  //   var keyword = document.getElementById("keyword").value;
  // var categories = document.getElementById("categories").value;
  // var sub_category = document.getElementById("sub_category").value;
  // var myRange = document.getElementById("myRange").value;
  // var state = document.getElementById("state").value;
  // var city = document.getElementById("city").value;

  // var rad = slider.value;
  // output.innerHTML = slider.value;

   $.ajax({
            type:'GET',
            url: '/findgeo',
            data: {latitude:position.coords.latitude, longitude:position.coords.longitude, radius:rad2, keyword:keyword,
             categories:categories, sub_category:sub_category, myRange:myRange, state:state, city:city },
             // data: {latitude:position.coords.latitude, longitude:position.coords.longitude, radius:rad, keyword:keyword,
             // categories:categories, sub_category:sub_category, myRange:myRange, state:state, city:city },
            success: function(data) {
              console.log(data);
              // alert(data);
                }
            });
}
</script> --}}
