
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
                        <a class="dropdown-item" {{--  Auth::user()->role == 'seller' ?  route('seller.dashboard') : route('buyer.dashboard') --}} > Dashboard </a>
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
            <a class="navbar-brand logos" href="/">
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
                            <li><a class="dropdown-item" href="index.html">Index 1</a></li>
                            <li><a class="dropdown-item" href="index-2.html">Index 2</a></li>
                            <li><a class="dropdown-item" href="index-3.html">Index 3</a></li>
                            <li><a class="dropdown-item" href="index-4.html">Index 4</a></li>
                            <li><a class="dropdown-item" href="index-5.html">Index 5</a></li>
                            <li><a class="dropdown-item" href="index-6.html">Index 6</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Properties
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">List Layout</a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Agents
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="agent-list.html">Agent List 1</a></li>
                            <li><a class="dropdown-item" href="agent-list-2.html">Agent List 2</a></li>
                            <li><a class="dropdown-item" href="agent-grid.html">Agent Grid 1</a></li>
                            <li><a class="dropdown-item" href="agent-grid-2.html">Agent Grid 2</a></li>
                            <li><a class="dropdown-item" href="agent-detail.html">Agent Detail</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown megamenu-li">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="navbarDropdownMenuLink4">
                            <div class="megamenu-area">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="about.html">About 1</a>
                                            <a class="dropdown-item" href="about-2.html">About 2</a>
                                            <a class="dropdown-item" href="services.html">Services 1</a>
                                            <a class="dropdown-item" href="services-2.html">Services 2</a>
                                            <a class="dropdown-item" href="properties-list-rightside.html">Properties List</a>
                                            <a class="dropdown-item" href="properties-grid-rightside.html">Properties Grid</a>
                                            <a class="dropdown-item" href="properties-map-full.html">Properties Map</a>
                                            <a class="dropdown-item" href="properties-comparison.html">Properties Comparison</a>
                                            <a class="dropdown-item" href="search-brand.html">Properties Brands</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="pricing-tables.html">Pricing Tables 1</a>
                                            <a class="dropdown-item" href="pricing-tables-2.html">Pricing Tables 2</a>
                                            <a class="dropdown-item" href="pricing-tables-3.html">Pricing Tables 3</a>
                                            <a class="dropdown-item" href="gallery.html">Gallery 1</a>
                                            <a class="dropdown-item" href="gallery-2.html">Gallery 2</a>
                                            <a class="dropdown-item" href="typography.html">Typography 1</a>
                                            <a class="dropdown-item" href="typography-2.html">Typography 2</a>
                                            <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                            <a class="dropdown-item" href="elements.html">Elements</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="contact.html">Contact 1</a>
                                            <a class="dropdown-item" href="contact-2.html">Contact 2</a>
                                            <a class="dropdown-item" href="contact-3.html">Contact 3</a>
                                            <a class="dropdown-item" href="faq.html">Faq 1</a>
                                            <a class="dropdown-item" href="faq-2.html">Faq 2</a>
                                            <a class="dropdown-item" href="icon.html">Icon</a>
                                            <a class="dropdown-item" href="404.html">Error Page</a>
                                            <a class="dropdown-item" href="404-2.html">Error Page 2</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="my-profile.html">My profile</a>
                                            <a class="dropdown-item" href="my-properties.html">My Properties</a>
                                            <a class="dropdown-item" href="favorited-properties.html">Favorited Properties</a>
                                            <a class="dropdown-item" href="submit-property.html">Submit Property</a>
                                            <a class="dropdown-item" href="login.html">Login</a>
                                            <a class="dropdown-item" href="signup.html">Register</a>
                                            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                                            <a class="dropdown-item" href="change-password.html">Change Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Classic</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-classic-sidebar-right.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-classic-sidebar-left.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-classic-fullwidth.html">FullWidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Columns</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-columns-2col.html">2 Columns</a></li>
                                    <li><a class="dropdown-item" href="blog-columns-3col.html">3 Columns</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Blog Details</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="blog-single-sidebar-right.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-single-sidebar-left.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="blog-single-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                @auth
                @if(Auth::user()->role == 'seller')
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="submit-property.html" class="btn btn-outline-warning font-weight-bold text-warning"> Post Property</a>
                    </li>
                </ul>

                @endif 
                @endauth


            </div>
        </nav>
    </div>
</header>

