<style>
    .searchInput{
        padding-top: 30px !important;
        padding-left: 30px !important;
        padding-bottom: 30px !important;
        border-radius: 50px !important;
        border: 0 !important;
    }
    .search-section.bg-grea {
        background: #ca830921;
    }
    .search-section .navbar-top-post-btn button {
        font-size: 17px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: none;
        padding: 15px 40px;
        background: #CA8309 !important;
        color: #fff !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .location {
        font-size: 14px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: none;
        padding: 15px 40px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .jxcategory {
        font-size: 14px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: none;
        padding: 15px 30px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .ajaxSearchList{
        width: fit-content;
        position: absolute;
    }
    .ajaxSearchCategoryList{
        color: #CA8309;
    }
    .col-lg-2{
        padding: 5px
    }
    .col-lg-2 button{
        width: 100%;
        display: block;
        font-size: 13px !important;
        text-align: center !important;
    }
    .categoriesModalList{
        list-style: none;
    }
    .categoriesModalList li{
        list-style: none;
        display: block;
        border-bottom: 1px solid rgba(177, 177, 177, 0.295);
        padding-bottom: 10px;
    }
    .categoriesModalList li:last-child{
        border-bottom: 0;
    }
    .categoriesModalList li .fa{
        font-size: 10px;
        color: rgb(177, 177, 177);
    }
    .categoriesModalList li a{
        display: block;
    }
    .categoriesModalList li a span{
        font-size: 12px;
        color: #11a182;
    }
    .categoriesModalList li:hover a, .categoriesModalList li:hover .fa{
        color: #e7a32d !important;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .searchFilterModalTitle{
        font-size: 17px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px){
        .searchInput{
            padding-top: 20px !important;
            padding-left: 20px !important;
            padding-bottom: 20px !important;
            border-radius: 50px !important;
            border: 0 !important;
        }
        .search-section .navbar-top-post-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center
        }
        .search-section .navbar-top-post-btn button {
            font-size: 15px !important;
            border-radius: 200px;
            padding: 10px 40px !important;
            color: #fff !important;
            display: inline;
            width: fit-content;
        }
        .search-section .location {
            font-size: 12px !important;
            text-transform: uppercase;
            border-radius: 200px;
            border: none;
            padding: 10px 20px;
            background: #ffffff !important;
            color: #e7a32d !important;
            cursor: pointer;
            box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        }
        .search-section .jxcategory {
            font-size: 12px !important;
            text-transform: uppercase;
            border-radius: 200px;
            border: none;
            padding: 10px 20px;
            background: #ffffff !important;
            color: #e7a32d !important;
            cursor: pointer;
            box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        }
    }
</style>
<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">

    <div class="">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="container">
                    {{-- <form action="{{route('search3')}}" method="GET" class="desktop-top-search-form"> --}}
                    <form action="{{route('dap.search')}}" method="GET">
                        <div class="row">
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="jxservices" class="form-control searchInput" placeholder="What are you looking for? (e.g. Barber, Saloon)">
                                    <div id="service_list" class="ajaxSearchList"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <button type="button" data-toggle="modal" data-target="#showCategoriesModal" id="showCategoriesBtn" class="btn btn-success jxcategory"><i class="fa fa-archive"></i> All Categories</button>
                            </div>
                            <input type="hidden" name="state" id="searchStateInput" value="">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <button type="button" data-toggle="modal" data-target="#showStatesModal" id="searchStateBtn" class="btn btn-success location"><i class="fa fa-map-marker"></i> All Nigeria</button>
                            </div>
                            <div class="col-lg-2">
                                <div class="mr-3 navbar-top-post-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> <span style="font-size: 15px !important;  color: #fff">Search</span></button>
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
    @if ($advertisements)
        <div class="animate__animated animate__fadeInLeft">
            @foreach ($advertisements as $advertisement)
                @if ($advertisement->advert_location == 1)
                    <a class="topnav-advert-slides topnav-advert-slides-hidden animate__animated animate__fadeInLeft" href="{{ $advertisement->website_link ? $advertisement->website_link : '#' }}">
                        <img src="{{ asset('uploads/sponsored/'.$advertisement->banner_img) }}" alt="" style="margin: 0 auto; width: 100%; height: 30px">
                    </a>
                @endif
            @endforeach
        </div>
    @else
        <p>No Advert here</p>
    @endif
</header>

<!-- SEARCH CATEGORIES MODAL -->
<div class="sCatModal">
    <div id="showCategoriesModal" class="modal " role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    @if ($categories)
                        <h4 class="searchFilterModalTitle">All Categories - {{ $allgeneralservices->count() ? $allgeneralservices->count().' service' : 'No service yet!'  }}{{ $allgeneralservices->count() > 1 ? 's' : ''  }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="categoriesModalList">
                                    @foreach ($categories as $category)
                                        @if ($loop->index <= 17)
                                            <li>
                                                <a href="{{ route('services', $category->slug) }}"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="categoriesModalList">
                                    @foreach ($categories as $category)
                                        @if ($loop->index > 15)
                                            <li>
                                                <a href="{{ route('services', $category->slug) }}"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH STATES MODAL -->
<div class="sStateModal" id="sStateModal">
    <div id="showStatesModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    @if ($allgeneralstates)
                        <h4 class="searchFilterModalTitle">All States - {{ $allgeneralservices->count() ? $allgeneralservices->count().' service' : 'No service yet!'  }}{{ $allgeneralservices->count() > 1 ? 's' : ''  }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="categoriesModalList">
                                    @foreach ($allgeneralstates as $allgeneralstate)
                                        @if ($loop->index <= 18)
                                            <li data-dismiss="modal" onclick="addStateToForm('{{ $allgeneralstate->name }}')">
                                                <a data-dismiss="modal" onclick="addStateToForm('{{ $allgeneralstate->name }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $allgeneralstate->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="categoriesModalList">
                                    @foreach ($allgeneralstates as $allgeneralstate)
                                        @if ($loop->index > 18)
                                            <li>
                                                <a href="#"><i class="fa fa-chevron-right"></i> {{ $allgeneralstate->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('#jxservices').keyup(function(){
            var query = $(this).val();
            console.log(query)
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('ajax.search.result') }}",
                    method:"GET",
                    data:{service:query},
                    success:function(data){
                        $('#service_list').fadeIn();
                        $('#service_list').html(data);
                    }
                });
            }
            else{
                $('#service_list').hide();
            }
        });

        $(document).on('click', 'li', function(){
            $('#jxservices').val($(this).text());
            $('#service_list').fadeOut();
        });

    });

    function addStateToForm(thestate) {
        document.getElementById('searchStateBtn').innerHTML = '<i class="fa fa-map-marker"></i> ' + thestate
        document.getElementById('searchStateInput').value = thestate
    }

    $(document).mouseup(function(e) {
        var container = $("#service_list");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
        }
    });
</script>


<script type="text/javascript">
    var slider = document.getElementById("myRange");
    var mobileslider = document.getElementById("mbilemyRange");
    var output = document.getElementById("demo");
    var mobileoutput = document.getElementById("mobiledemo");
    var theCategoryInput = document.getElementById("theCategory");
    var theSubCategoryInput = document.getElementById("theSubCategory");
    var dropDownLabel = document.getElementById("dLabel");

    if (document.documentElement.clientWidth > 768) {
        document.getElementById("categories").removeAttribute("name");
        document.getElementById("sub_category").removeAttribute("name");
    }

    output.innerHTML = slider.value;
    mobileoutput.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
      mobileoutput.innerHTML = this.value;
    }

    mobileslider.oninput = function() {
      output.innerHTML = this.value;
      mobileoutput.innerHTML = this.value;
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


    $('#mobilecategories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:"GET",
                url: 'api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                      var res = JSON.parse(res);
                        $("#mobilesub_category ").empty();
                        $.each(res,function(key,value){
                        var chosen_value = value;
                            $("#mobilesub_category").append(
                                '<option value="'+key+'">'+chosen_value.name+'</option>'
                            );
                        });
                    }else{
                        $("#mobilesub_category").empty();
                        $("#mobilesub_category").append(
                            '<option>No Sub Category</option>'
                        );
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


    $('#mobilestate').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
            $.ajax({
                type:"GET",
                url: 'api/get-city-list/'+state_name,
                success:function(res){
                    if(res){
                        console.log(res);
                        console.log(state_name);
                        $("#mobilecity").empty();
                        $.each(res,function(key,value){
                            $("#mobilecity").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#mobilecity").empty();
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

