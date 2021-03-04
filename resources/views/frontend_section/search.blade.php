<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">

    <div class="">
      <div class="search-section-area">
        <div class="search-area-inner">
          <div class="search-contents">
            <form action="{{route('search3')}}" method="GET" class="desktop-top-search-form">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-1 m-none"></div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <p style="margin-bottom: 0; font-weight: 600;">Keyword</p>
                        <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="e.g. Barber, Saloon">
                        </div>
                    </div>

                     <div class="col-lg-2 col-md-4 col-sm-6 text-center">
                        <p style="font-weight: 600; margin-bottom: 0;">Choose Distance(in km): <span id="demo"></span></p>
                        <div class="slidecontainer" style="margin-bottom: 15px;">
                            {{-- <input type="range" min="1" max="100" value="50" class="slider form-control" id="myRange2"> --}}
                            <input type="range" min="1" max="1000" name="ranges"  value="250" class="slider" id="myRange">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <p style="margin-bottom: 0; margin-top: -12px; font-weight: 600;">Choose Category</p>
                        <div class="dropdown category-ddn-menu input-category-desktop">
                            <a id="dLabel" role="button" data-toggle="dropdown" class="btn form-control" data-target="#" href="#">- Select a category -<span class="fa fa-angle-down" style="margin-left: 50px"></span></a>

                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                @if(isset($search_form_categories))
                                    @foreach($search_form_categories as $category)
                                        <li class="dropdown-submenu" style="@if (!$loop->last)border-bottom: 1px solid rgba(0,0,0,.15);@endif">
                                            <a onclick="theCatId({{ $category->id }}, ' {{ $category->name }} ')" tabindex="-1" href="#">{{ $category->name }}</a>
                                            <ul class="dropdown-menu" style="margin-left: 2px;">
                                                @if(isset($category->sub_categories))
                                                    @foreach($category->sub_categories as $sub_category)
                                                        <li style="@if (!$loop->last)border-bottom: 1px solid rgba(0,0,0,.15);@endif"><a onclick="theSubCatId({{ $sub_category->id }}, ' {{ $sub_category->name }} ')" tabindex="-1" href="#">{{ $sub_category->name }}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif

                                <input type="hidden" name="category" id="theCategory">
                                <input type="hidden" name="sub_categories" id="theSubCategory">
                            </ul>
                        </div>

                        <div class="form-group input-category-mobile">
                            <select class="form-control" id="categories" name="category">
                                <option value="">- Select an Option -</option>
                                @if(isset($search_form_categories))
                                    @foreach($search_form_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 input-sub-category-mobile">
                        <div class="form-group">
                            <p style="margin-bottom: 0; font-weight: 600;">Sub Category</p>
                            <select class="form-control" id="sub_category" name="sub_categories">
                                <option value="">- Select an Option -</option>
                            </select>
                        </div>
                    </div>




                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                          <p style="margin-bottom: 0; font-weight: 600;">Choose Location</p>
                          <select class="form-control" id="state" name="state">
                            <option value="">- Select an Option -</option>
                            @if(isset($states))
                                @foreach($states as $state)
                                    <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 text-center">
                        <div class="form-group">
                            <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning" style="margin-top: 25px">Search
                                <i class="fa fa-search ml-2" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-1 m-none"></div>
                    {{-- <div class="form-group">
                    <p id="demo2"></p>
                    </div> --}}
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                        <input id="latitude_id" type="hidden" name="latitude" class="form-control">
                        </div>
                    </div>

                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                        <input id="longitude_id" type="hidden" name="longitude" class="form-control">
                        </div>
                    </div>

                </div>
            </form>

            <form action="{{route('search3')}}" method="GET" class="mobile-top-search-form">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-4 col-sm-6">
                        <p style="margin-bottom: 0; font-weight: 600;">Keyword</p>
                        <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="e.g. Barber, Saloon">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-4 col-sm-6">
                        <div class="form-group">
                          <p style="margin-bottom: 0; font-weight: 600;">Choose Location</p>
                          <select class="form-control" id="state" name="state">
                            <option value="">- Select an Option -</option>
                            @if(isset($states))
                                @foreach($states as $state)
                                    <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: -20px">
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning" style="margin-top: 25px">Search
                                <i class="fa fa-search ml-2" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<header class="top-header top-header-ads-mobile" style="display: flex; justify-content: center; background: linear-gradient(90deg, rgba(251,219,35,1) 52%, rgba(243,163,27,1) 66%); width: 100%; margin: 20px 0 0 0">
    <a href="https://efskyview.com/">
      <img src="{{ asset('images/skyviewstickyads.gif') }}" alt="" style="width: 100%; height: 35px">
    </a>
</header>



<script type="text/javascript">
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    var theCategoryInput = document.getElementById("theCategory");
    var theSubCategoryInput = document.getElementById("theSubCategory");
    var dropDownLabel = document.getElementById("dLabel");

    if (document.documentElement.clientWidth > 768) {
        document.getElementById("categories").removeAttribute("name");
        document.getElementById("sub_category").removeAttribute("name");
    }

    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }

    function theCatId(catId, catName) {
        theCategoryInput.value = catId
        dropDownLabel.text = catName
    }

    function theSubCatId(subCatId, subCatName) {
        theSubCategoryInput.value = subCatId
        dropDownLabel.text = subCatName
    }


    $('#categories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:"GET",
                url: 'api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                      var res = JSON.parse(res);
                        // $("#sub_category ").empty();
                        $.each(res,function(key,value){
                        var chosen_value = value;
                            $("#sub_category").append(
                                '<option value="'+key+'">'+chosen_value.name+'</option>'
                            );
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


    $('#state').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
            $.ajax({
                type:"GET",
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

  <script type="text/javascript">
  $(document).ready( function () {
    // alert('ddsdsd');
  getLocation();
});
</script>

