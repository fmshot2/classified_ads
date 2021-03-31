<style>
    .searchInput{
        padding-top: 30px !important;
        padding-left: 30px !important;
        padding-bottom: 30px !important;
        border-radius: 50px !important;
        border: 2px solid #e7a32d9d !important;
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
    .search-section .navbar-top-post-btn button:hover {
        background: #ffffff !important;
        color: #CA8309 !important;
        border: 2px solid #e7a32d9d;
        transition: .7s background, color;
    }
    .search-section .location {
        font-size: 15px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: 2px solid #e7a32d9d;
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
        border: 2px solid #e7a32d9d;
        padding: 15px 30px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .location:hover, .search-section .jxcategory:hover{
        background: #CA8309 !important;
        color: #ffffff !important;
        transition: .7s all;
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
        border-bottom: 1px solid rgba(206, 206, 206, 0.233);
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
        color: #e7a32d;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .searchFilterModalTitle{
        font-size: 17px;
        margin-bottom: 20px;
        font-weight: 600;
        font-family: "Poppins-Regular";
    }

    /* @media (min-width: 768px) */

    .popover__title {
        font-size: 24px;
        line-height: 36px;
        text-decoration: none;
        color: rgb(228, 68, 68);
        text-align: center;
        padding: 15px 0;
    }

    .popover__wrapper {
        position: relative;
        display: inline-block;
    }
    .popover__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: 100px;
        top: 50px;
        transform: translate(0, 10px);
        background-color: #f5f5f5;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: auto;
    }
    .popover__content ul li {
        color: #000 !important;
        padding-left: 30px;
        padding-right: 30px;
        display: block;
    }
    .popover__content ul li:first-child {
        padding-top: 15px;
    }
    .popover__content ul li a{
        color: #000 !important;
        display: block;
    }
    .popover__content ul li:hover a{
        color: #e7a32d !important;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .popover__content:before {
        position: absolute;
        z-index: -1;
        content: "";
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #f5f5f5 transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }
    .popover__wrapper:hover .popover__content {
        z-index: 10;
        opacity: 1;
        visibility: visible;
        transform: translate(0, -20px);
        transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
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
        .stateLGApopup{
            display: none;
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
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <button type="button" data-toggle="modal" data-target="#showStatesModal" id="searchStateBtn" class="btn btn-success location"><i class="fa fa-map-marker"></i> All States</button>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="jxservices" class="form-control searchInput" placeholder="What are you looking for? (e.g Barber) - Search nationwide or select a state.">
                                    <div id="service_list" class="ajaxSearchList"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <button type="button" data-toggle="modal" data-target="#showCategoriesModal" id="searchCategoryBtn" class="btn btn-success jxcategory"><i class="fa fa-archive"></i> All Categories</button>
                            </div>
                            <input type="hidden" name="category" id="searchCategoryInput" value="">
                            <input type="hidden" name="state" id="searchStateInput" value="">
                            <input type="hidden" name="city" id="searchLGAInput" value="">
                            <div class="col-lg-2">
                                <div class="mr-3 navbar-top-post-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
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
    <div id="showCategoriesModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    @if (isset($categories))
                        <h4 class="searchFilterModalTitle">All Categories {{-- -
                            {{ $allgeneralservices->count() ? $allgeneralservices->count().' service' : 'No service yet!'  }}{{ $allgeneralservices->count() > 1 ? 's' : ''  }} --}}</h4>
                        <p style="margin-top: -20px">Search in all categories or select a category here. 👇</p>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    @foreach ($categories as $category)
                                        @if ($loop->index <= 12)
                                            <li>
                                                <a data-dismiss="modal" onclick="addCategoryToForm('{{ $category->name }}', '{{ $category->slug }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    @foreach ($categories as $category)
                                        @if ($loop->index > 12 && $loop->index <= 24)
                                            <li>
                                                <a data-dismiss="modal" onclick="addCategoryToForm('{{ $category->name }}', '{{ $category->slug }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    @foreach ($categories as $category)
                                        @if ($loop->index > 24)
                                            <li>
                                                <a data-dismiss="modal" onclick="addCategoryToForm('{{ $category->name }}', '{{ $category->slug }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $category->name }}
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
                    @if (isset($allgeneralstates))
                        <h4 class="searchFilterModalTitle">All States</h4>
                        <p style="margin-top: -20px">Search nationwide or select a state here. 👇</p>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    @foreach ($allgeneralstates as $allgeneralstate)
                                        @if ($loop->index <= 12)
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addStateToForm('{{ $allgeneralstate->name }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $allgeneralstate->name }}</a>
                                                <div class="popover__content">
                                                    <ul>
                                                        @if(isset($allgeneralstate->local_governments))
                                                            @foreach($allgeneralstate->local_governments as $local_government)
                                                                <li data-dismiss="modal" onclick="addLGAToForm('{{ $local_government->name }}', '{{ $allgeneralstate->name }}')" style="@if (!$loop->last)border-bottom: 1px solid rgb(105 105 105 / 11%);@endif"><a onclick="addLGAToForm('{{ $local_government->name }}', '{{ $allgeneralstate->name }}')" href="#">{{ $local_government->name }}</a></li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    @foreach ($allgeneralstates as $allgeneralstate)
                                        @if ($loop->index > 12 && $loop->index <= 24)
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addStateToForm('{{ $allgeneralstate->name }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $allgeneralstate->name }}</a>
                                                <div class="popover__content">
                                                    <ul>
                                                        @if(isset($allgeneralstate->local_governments))
                                                            @foreach($allgeneralstate->local_governments as $local_government)
                                                                <li data-dismiss="modal" onclick="addLGAToForm('{{ $local_government->name }}')" style="@if (!$loop->last)border-bottom: 1px solid rgb(105 105 105 / 11%);@endif"><a onclick="addLGAToForm('{{ $local_government->name }}')" href="#">{{ $local_government->name }}</a></li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    @foreach ($allgeneralstates as $allgeneralstate)
                                        @if ($loop->index > 24)
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addStateToForm('{{ $allgeneralstate->name }}')" href="#"><i class="fa fa-chevron-right"></i> {{ $allgeneralstate->name }}</a>
                                                <div class="popover__content">
                                                    <ul>
                                                        @if(isset($allgeneralstate->local_governments))
                                                            @foreach($allgeneralstate->local_governments as $local_government)
                                                                <li data-dismiss="modal" onclick="addLGAToForm('{{ $local_government->name }}')" style="@if (!$loop->last)border-bottom: 1px solid rgb(105 105 105 / 11%);@endif"><a onclick="addLGAToForm('{{ $local_government->name }}')" href="#">{{ $local_government->name }}</a></li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
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
            var query = $('#jxservices').val();
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
            $('#jxservices').val($('#jxservices').text());
            $('#service_list').fadeOut();
        });

    });
    // $(document).ready(function(){
    //     $('#jxservices').keyup(function(){
    //         var query = $(this).val();
    //         console.log(query)
    //         if(query != '')
    //         {
    //             var _token = $('input[name="_token"]').val();
    //             $.ajax({
    //                 url:"{{ route('ajax.search.result') }}",
    //                 method:"GET",
    //                 data:{service:query},
    //                 success:function(data){
    //                     $('#service_list').fadeIn();
    //                     $('#service_list').html(data);
    //                 }
    //             });
    //         }
    //         else{
    //             $('#service_list').hide();
    //         }
    //     });

    //     $(document).on('click', 'li', function(){
    //         $('#jxservices').val($(this).text());
    //         $('#service_list').fadeOut();
    //     });

    // });

    function addStateToForm(thestate) {
        document.getElementById('searchStateBtn').innerHTML = thestate
        document.getElementById('searchStateInput').value = thestate
    }
    function addLGAToForm(thelga, thestate) {
        document.getElementById('searchStateBtn').innerHTML = thelga
        document.getElementById('searchLGAInput').value = thelga
        document.getElementById('searchStateInput').value = thestate
    }
    function addCategoryToForm(thecategoryname,thecategoryslug) {
        document.getElementById('searchCategoryBtn').innerHTML = thecategoryname
        document.getElementById('searchCategoryInput').value = thecategoryslug
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
        var categoryID = $('#categories').val();
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
        var state_name = $('#state').val();
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

