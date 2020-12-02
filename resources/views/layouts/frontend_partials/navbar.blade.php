
<!-- Top header start -->
<header class="top-header bg-warning  none-992" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>Need Support? 1-8X0-666-8X88</a>
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@yellowpage.com</a>
                </div>
            </div>

            @guest
            <div class="col-lg-6 col-md-4 col-sm-5">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="/login" class="sign-in"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                    <li>
                        <a href="/register" class="sign-in"><i class="fa fa-user"></i> Register</a>
                    </li>
                </ul>
            </div>
            @endguest


            @auth
            <div class="col-lg-6 col-md-4 col-sm-5">
                <ul class="top-social-media pull-right">

                    <div class="dropdown">
                      <button class="btn btn-warning dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Str::limit(Auth::user()->name, 8 ) }}
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @auth
                        @if(Auth::user()->role == 'seller')
                        <a class="dropdown-item" href="{{ route('createService') }}"> Post A Service </a>
                        <a class="dropdown-item" href="{{ route('adminDashboard') }}"> Dashboard </a>
                        @endif 
                        @endauth
                        <a class="dropdown-item" href="/logout"> Logout </a>
                    </div>

                </div>
            </ul>
        </div>
        @endauth
    </div>
</div>
</header>





<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logos" href="/home">
                <img src="logos/Logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav header-ml">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Index
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Home</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Finde A Service
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Find A Service</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-list-rightside.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-list-leftsidebar.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-list-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Grid Layout</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-grid-rightside.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-grid-leftside.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-grid-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Map View</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-map-rightside-list.html">Map List 1</a></li>
                                    <li><a class="dropdown-item" href="properties-map-leftside-list.html">Map List 2</a></li>
                                    <li><a class="dropdown-item" href="properties-map-rightside-grid.html">Map Grid 1</a></li>
                                    <li><a class="dropdown-item" href="properties-map-leftside-grid.html">Map Grid 2</a></li>
                                    <li><a class="dropdown-item" href="properties-map-full.html">Map FullWidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property Detail</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-details.html">Property Detail 1</a></li>
                                    <li><a class="dropdown-item" href="properties-details-2.html">Property Detail 2</a></li>
                                    <li><a class="dropdown-item" href="properties-details-3.html">Property Detail 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownMenuLink2" href="{{ route('createService') }}">
                            Post A Service
                        </a>
                       
                    </li>
                    <li class="nav-item dropdown megamenu-li">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Find A User</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="navbarDropdownMenuLink4">
                            <div class="megamenu-area">
                                
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Report
                        </a>
                     
                    </li>
                </ul>

                @auth
                @if(Auth::user()->role == 'seller')
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('createService')}}" class="btn btn-outline-warning font-weight-bold text-warning"> Post A Service</a>
                    </li>
                </ul>

                @endif 
                @endauth


            </div>
        </nav>
    </div>
</header>

