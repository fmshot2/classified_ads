<header class="top-header none-992" style="display: flex; justify-content: center; background: linear-gradient(90deg, rgba(251,219,35,1) 52%, rgba(243,163,27,1) 66%);">
    @if ($advertisements)
    <div class="animate__animated animate__fadeInLeft">
        @foreach ($advertisements as $advertisement)
        @if ($advertisement->advert_location == 1)
        <a class="topnav-advert-slides topnav-advert-slides-hidden animate__animated animate__fadeInLeft" href="{{ $advertisement->website_link ? $advertisement->website_link : '#' }}">
            <img src="{{ asset('uploads/sponsored/'.$advertisement->banner_img) }}" alt="" style="margin: 0 auto">
        </a>
        @endif
        @endforeach
    </div>
    @else
    <p>No Advert here</p>
    @endif
</header>

<style>
    /* Referral Image Slider  */
    .topnav-advert-slides { width: 100%; }
    .topnav-advert-slides-hidden { display : none; }
    /* Referral Image Slider Ends */

    @-webkit-keyframes rotate {
        100% {
            transform: rotate(1turn);
        }
    }

    @keyframes rotate {
        100% {
            transform: rotate(1turn);
        }
    }
    .main-header .navbar-expand-lg .navbar-nav .rainbow .nav-link {
        padding: 25px 15px 0px !important;
        display: block;
    }
    .rainbow {
        position: relative;
        z-index: 0;
        border-radius: 500px;
        overflow: hidden;
        margin-top: 6px;
    }
    .rainbow::before {
        content: "";
        position: absolute;
        z-index: -2;
        left: -50%;
        top: -50%;
        width: 300%;
        height: 300%;
        background-color: #399953;
        background-repeat: no-repeat;
        background-size: 50% 50%, 50% 50%;
        background-position: 0 0, 100% 0, 100% 100%, 0 100%;
        background-image: linear-gradient(#399953, #399953), linear-gradient(#fbb300, #fbb300), linear-gradient(#d53e33, #d53e33), linear-gradient(#377af5, #377af5);
        -webkit-animation: rotate 4s linear infinite;
                animation: rotate 4s linear infinite;
    }
    .rainbow::after {
        content: "";
        position: absolute;
        z-index: -1;
        left: 6px;
        top: 6px;
        width: calc(100% - 12px);
        height: calc(100% - 12px);
        background: white;
        border-radius: 500px;
    }
</style>

<script>
    /* Top Nav Slider  */
    addEventListener("load",() => { // "load" is safe but "DOMContentLoaded" starts earlier
        var index = 0;
        const slides = document.querySelectorAll(".topnav-advert-slides");
        const classHide = "topnav-advert-slides-hidden", count = slides.length;
        nextSlide();
        function nextSlide() {
            slides[(index ++) % count].classList.add(classHide);
            slides[index % count].classList.remove(classHide);
            setTimeout(nextSlide, 5000);
        }
    });
    /* Top Nav Slider Ends */
</script>

<!-- Top header start -->
<header class="top-header none-992" id="top-header-2" style="background-color: rgb(202, 131, 9);">
    <div class="container" id="scroll-top">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="list-inline">
                    <a href="tel: {{ $general_info->hot_line ? $general_info->hot_line : '' }} ">
                        Need Support? <i class="fa fa-phone"></i> {{ substr($general_info->hot_line,0,4).'-'.substr($general_info->hot_line,4,3).'-'.substr($general_info->hot_line,7,5) }}

                        {{-- Need Support? <i class="fa fa-phone"></i> {{ $general_info->hot_line ? $general_info->hot_line : '' }} --}}
                    </a>
                    <a href="https://wa.me/{{ $general_info->hot_line_3 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank">
                        |&emsp;<i class="fa fa-whatsapp animate__animated animate__heartBeat animate__infinite" style="color:#5af8ac; font-size: 16px"></i> WhatsApp
                    </a>
                    <a href="mailto: {{ $general_info->contact_email ? $general_info->contact_email : ''}}">
                        |&emsp;<i class="fa fa-envelope"></i> {{ $general_info->contact_email ? $general_info->contact_email : ''}}
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-4 col-sm-5">
                <ul class="list-inline top-header-links pull-right">
                    <a class="text-warning" href="{{route('aboutus')}}" id=""><i class="fa fa-group"></i> About</a>
                    <a class="text-warning" href="{{route('contact')}}" id=""><i class="fa fa-envelope-open"></i> Contact</a>
                    @if(!Auth::guard('agent')->check())
                    @guest
                    <a class="text-warning" href="/login"><i class="fa fa-sign-in"></i> Login</a>
                    <a class="text-warning" href="/register"><i class="fa fa-user"></i> Register</a>
                    @endguest
                    @endif
                    @auth
                    @if(Auth::user()->role == 'seller')
                    <a class="text-warning" href="{{ route('seller.dashboard') }}"><i class="fa fa-user"></i> My Account</a>
                    @elseif(Auth::user()->role == 'buyer')
                    <a class="text-warning" href="{{ route('buyer.dashboard') }}"><i class="fa fa-user"></i> My Account</a>
                    @elseif(Auth::user()->role == 'admin')
                    <a class="text-warning" href="{{ route('admin.dashboard') }}"><i class="fa fa-user"></i> My Account</a>
                    @elseif(Auth::user()->role == 'cmo')
                    <a class="text-warning" href="{{ route('cmo.dashboard') }}"><i class="fa fa-user"></i> My Account</a>
                    @endif
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="font-weight: 600; padding: 10px;"><i class="fa fa-power-off"></i> Logout</a>
                    @endauth
                    @auth('agent')
                    <a class="text-warning" href="{{ route('agent.dashboard') }}"><i class="fa fa-user"></i> My Account</a>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>


<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logos" href="/">
                <img src="{{ asset('images') }}/{{ $check_general_info == 0 ? $general_info->logo : '' }}" style="height: 45px;" alt="logo">
                {{-- <img src="{{asset('logos/efcontactlogo.png')}}" style="height: 45px;" alt="logo"> --}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="mobile-top-navbar">
                <ul class="mbtn-links">
                    @guest
                    <a href="/login" class="sign-in">Login</a> or
                    <a href="/register" class="sign-in">Register</a>
                    @endauth
                    @auth
                    @if(Auth::user()->role == 'seller')
                    <a href="{{ route('seller.dashboard') }}"> Dashboard</a>
                    @elseif(Auth::user()->role == 'buyer')
                    <a href="{{ route('buyer.dashboard') }}"> My Account</a>
                    @elseif(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}"> My Account</a>
                    @elseif(Auth::user()->role == 'cmo')
                    <a href="{{ route('cmo.dashboard') }}"> My Account</a>
                    @endif
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="font-weight: 600; color: rgb(253, 75, 75); border: 1px solid  rgb(255, 91, 91); padding: 10px;"><i class="fa fa-power-off"></i></a>
                    @endauth

                    @auth
                    @if(Auth::guard('agent')->check())
                    <a href="{{ route('agent.dashboard') }}"> Dashboard</a>
                    @endif
                    {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="font-weight: 600; color: rgb(253, 75, 75); border: 1px solid  rgb(255, 91, 91); padding: 10px;"><i class="fa fa-power-off"></i></a> --}}
                    @endauth
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav header-ml">
                    <li class="nav-item">
                        <a href="{{ route('home') }}"  class="nav-link" >Home</a>
                    </li>
                   <!--  <li class="nav-item">
                        <a href="{{ route('allCategories') }}"  class="nav-link">Categories</a>
                    </li>
                -->

                <li class="nav-item">
                    <a data-toggle="modal" data-target="#showCategoriesModal_4_navBar" id="searchCategoryBtn2" class="nav-link">Categories</a>
                </li>

                <!--  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 showCatFg">
                    <div class="form-group">
                    <button type="button" data-toggle="modal" data-target="#showCategoriesModal" id="searchCategoryBtn" class="btn btn-success jxcategory"><i class="fa fa-archive"></i> All Categories</button>
                    </div>
                </div> -->


                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('faq')}}" id="">FAQs</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="modal" data-target="#launchAgentModal" href="#"  class="nav-link">Become our Agent</a>
                </li>

                @guest
                <li class="nav-item rainbow">
                    <a href="{{ route('register') }}"  class="nav-link">Promo Registration</a>
                </li>
                @endguest


                {{-- <li class="nav-item">
                    <a href="{{ route('allServices') }}"  class="nav-link">Services</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('seller.sellers')}}" id="">Providers</a>
                </li> --}}
            </ul>
            @auth
            @if(Auth::user()->role == 'seller')
                <ul class="navbar-nav ml-auto">
                    <li class="mr-3 navbar-top-post-btn">
                        <a class="btn btn-success" href="{{ route('seller.service.create') }}"><i class="fa fa-plus"></i> <span style="font-size: 15px !important;color:#fff">Post A Service</span></a>
                    </li>
                </ul>
            @endif
            @endauth
            @if(!Auth::guard('agent')->check())
            @guest
            <ul class="navbar-nav ml-auto">
                <li class="mr-3 navbar-top-post-btn">
                    <a class="btn btn-success" href="/login"><i class="fa fa-plus"></i> <span style="font-size: 15px !important;color:#fff">Post A Service</span></a>
                </li>
            </ul>
            @endguest
            @endif
              <!--   @auth('agent')
                    <ul class="navbar-nav ml-auto">
                        <li class="mr-3 navbar-top-post-btn">
                            <a class="btn btn-success" href="/login"><i class="fa fa-plus"></i> <span style="font-size: 15px !important;color:#fff">Login As Seller</span></a>
                        </li>
                    </ul>
                    @endauth -->


                    @auth
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::user()->role == 'seller')
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('seller.dashboard') }}">My Account</a>
                        </li> --}}
                        @endif
                        @if(Auth::user()->role == 'buyer')
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('buyer.dashboard') }}">My Account</a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">My Account</a>
                        </li>
                        @endif
                        @if(Auth::guard('agent')->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('agent.dashboard') }}">My Account</a>
                        </li>
                        @endif
                    </ul>
                    @endauth
                </div>
            </nav>
        </div>
    </header>


    <!-- SEARCH CATEGORIES MODAL -->
    <div class="sCatModal">
        <div id="showCategoriesModal_4_navBar" class="modal fade" role="dialog">
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
                                        @if ($loop->index <= 13)
                                        <li class="popover__wrapper">
                                            <a href="{{ route('services', $category->slug) }}"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                {{-- <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span> --}}
                                            </a>

                                            <div class="popover__content">
                                                <ul>
                                                    @if(isset($category->sub_categories))
                                                        @if ($category->sub_categories->count() > 0)
                                                            @foreach($category->sub_categories as $sub_category)
                                                                <a href="{{ route('services.subcategory', $sub_category->slug) }}"><li style="@if (!$loop->last)border-bottom: 1px solid rgb(105 105 105 / 11%);@endif"><a href="{{ route('services.subcategory', $sub_category->slug) }}">{{ $sub_category->name }}</a></li></a>
                                                            @endforeach
                                                        @else
                                                            <li>No Sub Category!</li>
                                                        @endif
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
                                        @foreach ($categories as $category)
                                        @if ($loop->index > 13 && $loop->index <= 27)
                                        <li class="popover__wrapper">
                                            <a  href="{{ route('services', $category->slug) }}"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                {{-- <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span> --}}
                                            </a>

                                            <div class="popover__content">
                                                <ul>
                                                    @if(isset($category->sub_categories))
                                                        @if ($category->sub_categories->count() > 0)
                                                            @foreach($category->sub_categories as $sub_category)
                                                                <a href="{{ route('services.subcategory', $sub_category->slug) }}"><li style="@if (!$loop->last)border-bottom: 1px solid rgb(105 105 105 / 11%);@endif"><a href="{{ route('services.subcategory', $sub_category->slug) }}">{{ $sub_category->name }}</a></li></a>
                                                            @endforeach
                                                        @else
                                                            <li>No Sub Category!</li>
                                                        @endif
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
                                        @foreach ($categories as $category)
                                        @if ($loop->index > 26)
                                        <li class="popover__wrapper">
                                            <a  href="{{ route('services', $category->slug) }}"><i class="fa fa-chevron-right"></i> {{ $category->name }}
                                                {{-- <span>
                                                    ({{ $category->services->count() ? $category->services->count().' service' : 'No service yet!'  }}{{ $category->services->count() > 1 ? 's' : ''  }})
                                                </span> --}}
                                            </a>

                                            <div class="popover__content">
                                                <ul>
                                                    @if(isset($category->sub_categories))
                                                    @if ($category->sub_categories->count() > 0)
                                                    @foreach($category->sub_categories as $sub_category)
                                                     <a href="{{ route('services.subcategory', $sub_category->slug) }}"><li style="@if (!$loop->last)border-bottom: 1px solid rgb(105 105 105 / 11%);@endif"><a href="{{ route('services.subcategory', $sub_category->slug) }}">{{ $sub_category->name }}</a></li></a>
                                                    @endforeach
                                                    @else
                                                    <li>No Sub Category!</li>
                                                    @endif
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
            function previewFile(input){
                var file = $("input[type=file]").get(0).files[0];
                if(file)
                {
                    var reader = new FileReader();
                    reader.onload = function(){
                        $("#previewImg").attr("src",reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>
