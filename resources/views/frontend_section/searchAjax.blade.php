<style>
    .searchInput{
        padding-top: 30px !important;
        padding-left: 30px !important;
        padding-bottom: 30px !important;
        border-radius: 50px !important;
        border: 0 !important;
    }
    .search-section.bg-grea {
        background: #ca830946;
    }
    .search-section .navbar-top-post-btn a {
        font-size: 17px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: none;
        padding: 15px 56px;
        background: #CA8309 !important;
        color: #fff !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        animation: pulsePostBtn 1s infinite;
    }
</style>
<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">

    <div class="">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <div class="container">
                        <form action="{{route('search3')}}" method="GET" class="desktop-top-search-form">
                            <div class="row">
                                <div class="col-lg-8 col-md-4 col-sm-6">
                                    {{-- <p style="margin-bottom: 0; font-weight: 600;">Keyword</p> --}}
                                    <div class="form-group">
                                        <input type="text" name="keyword" id="jxservices" class="form-control searchInput" placeholder="What are you looking for? (e.g. Barber, Saloon)">
                                        <div id="service_list" style="position: absolute;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mr-3 navbar-top-post-btn">
                                        <a class="btn btn-success" href="/login"><i class="fa fa-search"></i> <span style="font-size: 15px !important;  color: #fff">Search</span></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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


<script>
    $(document).ready(function(){

        $('#jxservices').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('ajax.search.result') }}",
              method:"GET",
              data:{query:query, _token:_token},
              success:function(data){
                $('#service_list').fadeIn();
                    $('#service_list').html(data);
                }
             });
            }
        });

        $(document).on('click', 'li', function(){
            $('#jxservices').val($(this).text());
            $('#service_list').fadeOut();
        });

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

