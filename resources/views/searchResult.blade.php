
@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')

<div class="main">
        
<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Search Result</h1>
            <ul>
                <li><a href="https://efcontact.com">Home</a></li>
                <li><span>/</span>Search Result</li>
            </ul>
        </div>
    </div>
</div>
<!-- Properties section body start -->
<div class="properties-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-left">
                    <!-- Advanced search start -->
                    <div class="sidebar widget advanced-search">
                        <h3 class="sidebar-title text-center"> Advanced Search</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <form action="https://efcontact.com/search" method="GET">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Keyword" autocomplete="on">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="category" tabindex="-98">
                                            <option value="" disabled="" selected="">Category</option>
                                                                                        <option value="Agriculture and food">Agriculture and food</option>
                                                                                        <option value="Animals and pets">Animals and pets</option>
                                                                                        <option value="Babies and kids">Babies and kids</option>
                                                                                        <option value="Business">Business</option>
                                                                                        <option value="Commercial equipment and tools">Commercial equipment and tools</option>
                                                                                        <option value="Electronics">Electronics</option>
                                                                                        <option value="Electronics">Electronics</option>
                                                                                        <option value="Fashion">Fashion</option>
                                                                                        <option value="Handy work">Handy work</option>
                                                                                        <option value="Health and beauty">Health and beauty</option>
                                                                                        <option value="Jobs">Jobs</option>
                                                                                        <option value="Medical">Medical</option>
                                                                                        <option value="Property">Property</option>
                                                                                        <option value="Repair and construction">Repair and construction</option>
                                                                                        <option value="Seeking work-cv">Seeking work-cv</option>
                                                                                        <option value="Services">Services</option>
                                                                                        <option value="Sport, art and outdoors">Sport, art and outdoors</option>
                                                                                        <option value="Vehicles">Vehicles</option>
                                                                                    </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" title="Category"><div class="filter-option"><div class="filter-option-inner">Category</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="sub_category" tabindex="-98">
                                            <option value="" disabled="" selected="">SubCategory</option>
                                                                                        <option value="Anti Poison">Anti Poison</option>
                                                                                        <option value="Asthmatic Drugs">Asthmatic Drugs</option>
                                                                                        <option value="Baker">Baker</option>
                                                                                        <option value="Barber">Barber</option>
                                                                                        <option value="Caterer ">Caterer </option>
                                                                                        <option value="Cobbler ">Cobbler </option>
                                                                                        <option value="Cough Syrup">Cough Syrup</option>
                                                                                        <option value="Cream &amp; Ointments">Cream &amp; Ointments</option>
                                                                                        <option value="Deworming Drugs">Deworming Drugs</option>
                                                                                        <option value="Hair dresser">Hair dresser</option>
                                                                                        <option value="Mechanic">Mechanic</option>
                                                                                        <option value="Multi-Vitamins">Multi-Vitamins</option>
                                                                                        <option value="Plumber">Plumber</option>
                                                                                        <option value="Sex Enhancement">Sex Enhancement</option>
                                                                                        <option value="Surgicals">Surgicals</option>
                                                                                        <option value="Tailor">Tailor</option>
                                                                                    </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" title="SubCategory"><div class="filter-option"><div class="filter-option-inner">SubCategory</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="number" name="minprice" id="minprice" class="form-control" placeholder="Min Price" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="number" name="maxprice" id="maxprice" class="form-control" placeholder="Max Price" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" name="featured">
                                    <span class="lever"></span>
                                    Featured
                                </label>
                            </div>
                            </div>

                            <div class="form-group mb-0">
                                <button class="search-button">Search <i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="widget helping-center">
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                                                <div class="media">
                            <div class="media-left">
                                                                <img src="/storage/advert/fresh-toothpaste-advertisement-realistic-style_52683-16161.jpg" alt="advert" class="img-fluid">
                                                            </div>
                        </div>
                                           </div>
                    <!-- Helping Center start -->
                    <div class="widget helping-center">
                        <h3 class="sidebar-title">Helping Centres</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="contact-link">
                            <li>
                                <i class="flaticon-technology-1"></i>
                                <a href="tel:0700-6258244">
                                    0700-6258244
                                </a>
                            </li>
                            <li>
                                <i class="flaticon-technology-1"></i>
                                <a href="tel:0807-9000286">
                                    0807-9000286
                                </a>
                            </li>
                            <li>
                                <i class="flaticon-technology-1"></i>
                                <a href="tel:080567654345">
                                    080567654345
                                </a>
                            </li>
                            <li>
                                <i class="flaticon-envelope"></i>
                                <a href="mailto:info@efcontact.com">
                                    info@efcontact.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <!-- Property box 2 start -->
                                <div class="col-md-12">
                                    <div class="row">

     @if(isset($userSer))
    @foreach($userSer as $userSer1)

    <div class="col-sm-3 card service-box">
                        <img class="card-img-top" src="{{asset('images')}}/{{$userSer1->image}}" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4><a href="#" style="font-size: 15px;">{{$userSer1->user->name}}, &nbsp; {{$userSer1->name}}</a></h4>
                            </div>
                             <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        
                                    </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$userSer1->city}}</span>
                                </div>
                         
                            <!--<a href="#" class="read-more">More...</a>-->
                        </div>
                    </div>
                    @endforeach
</div>
@else



                    <div class="info">
                        <h4>Ooops, The Item Could Not Be Found!</h4>
                        <p>The item you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                        <div class="hr"></div>
                        <p>Please try searching again with a diffenrent keyword this time.</p>
                    </div>
                </div>
                         @endif
                                           <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>





@endsection













