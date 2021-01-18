        <!-- Top header start -->
        <header class="top-header bg-warning  none-992" id="top-header-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-7">
                        <div class="list-inline">
                            <a href="tel: {{ $check_general_info == 0 ? $general_info->hot_line : '' }} "><i class="fa fa-phone"></i>Need Support? {{ $check_general_info == 0 ? $general_info->hot_line : '' }} | {{ $check_general_info == 0 ? $general_info->hot_line : '' }} </a>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 col-md-4 col-sm-5">
                        <ul class="top-social-media pull-right">

                            <li>
                              <a href="mailto: {{ $check_general_info == 0 ? $general_info->support_email : ''}}"><i class="fa fa-envelope"></i> {{ $check_general_info == 0 ? $general_info->support_email : ''}} </a>                            </li>
                              
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
                        <img src="logos/Logo.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav header-ml">
                            <li class="nav-item">
                                <a href="{{ route('home') }}"  class="nav-link" >
                                    Home
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('allServices') }}"  class="nav-link" >
                                    Explore Services
                                </a>

                            </li>

                            @auth
                            @if(Auth::user()->role == 'seller')
                            <li class="nav-item dropdown">
                                <a href="{{ route('seller.service.create') }}"  class="nav-link">
                                    Post A Service
                                </a>

                            </li>
                            @endif 
                            @endauth
                            <!-- Modal -->
                            <div class="modal fade" id="postAService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="container border border-warning">
                                        <div class="col-md-12 text-center">
                                            <div class="submit-address">
                                                <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <!--<h3 class="heading-2 text-center">Basic Information</h3>-->
                                                    <button type="button" class="btn btn-outline-warning mt-3 mb-4">Basic Information</button>
                                                    <div class="border border-warning">
                                                        <div class="search-contents-sidebar mb-30">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">

                                                                        <input type="hidden" value="{{Auth::id()}}
                                                                        " class="input-text" name="user_id">
                                                                        @if ($errors->has('user_id'))
                                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                            <strong>{{ $errors->first('user_id') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>SERVICE NAME</label>
                                                                        <input type="text" class="input-text" name="name" placeholder="Enter your service">
                                                                        @if ($errors->has('name'))
                                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>YEARS OF EXPERIENCE</label>
                                                                        <input type="text" class="input-text" name="experience" placeholder="Years of Experience?">
                                                                        @if ($errors->has('experience'))
                                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                            <strong>{{ $errors->first('experience') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-md-6" style="margin-bottom: -30px;">
                                                                  <div class="form-group">
                                                                    <label for="exampleFormControlSelect1"> CHOOSE CATEGORY </label>
                                                                    <select class="form-control" id="exampleFormControlSelect1" name="category">

                                                                      @foreach($categories as $categories)
                                                                      <option value="{{ $categories->id }}"> {{ $categories->name }} </option> 
                                                                      @endforeach

                                                                  </select>
                                                                  @if ($errors->has('category'))
                                                                  <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                    <strong>{{ $errors->first('category') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>                         
                                                        <div class="col-lg-6 col-md-6 mt-4" style="margin-bottom: -30px;">
                                                            <div class="form-group">
                                                               <input type="file" class="input-text" onChange="previewFile(this)" name="file" class="form-control" />
                                                               <img id="previewImg" alt="Service Image" style="max-width:130px; 
                                                               margin-top:20px"/>
                                                               @if ($errors->has('file'))
                                                               <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                                <strong>{{ $errors->first('file') }}</strong>
                                                            </span>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <h3 class="heading-2">DETAILED INFORMATION</h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-0">
                                                        <textarea class="input-text" name="description" placeholder="Add More Info about your service"></textarea>
                                                        @if ($errors->has('description'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>                      
                                            <h3 class="heading-2">CONTACT DETAILS</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="input-text" name="streetAddress" placeholder="Enter Your House No And Street Address">
                                                        @if ($errors->has('streetAddress'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong>{{ $errors->first('streetAddress') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="input-text" name="city" placeholder="Enter Your City Name">
                                                        @if ($errors->has('city'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong>{{ $errors->first('city') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="input-text" name="state" placeholder="Enter Your State">
                                                        @if ($errors->has('state'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong>{{ $errors->first('state') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="input-text" name="closestBusstop" placeholder="Enter Your Closest Busstop">
                                                        @if ($errors->has('closestBusstop'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong>{{ $errors->first('closestBusstop') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="input-text" name="phone" placeholder="Enter Your Contact Number">
                                                        @if ($errors->has('phone'))
                                                        <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <input type="submit"class="btn btn-md btn-warning mb-30" value="Submit" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          



            <!-- Modal -->
            <div class="modal fade" id="findAUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Find A User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form class="" action="{{-- route('searchUser') --}}" method="POST" role="search">
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group"> 
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User's Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Location">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="pull-right btn btn-warning mb-2 font-weight-bold bg-warning text-white"> Search  <i class="fa fa-search ml-2" aria-hidden="true"></i>  </button>
                  </div>
              </div>
              <form>
              </div>
          </div>
      </div>          



      <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('seller.sellers')}}" id="">
            Sellers
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('faq')}}" id="">
            How To Use
        </a>

    </li>

    <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('contact')}}" id="">
            Contact Us
        </a>

    </li>

</ul>



{{--
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
                                <a class="dropdown-item" href="{{ route('seller.dashboard') }}"> Dashboard </a>
                                @endif 
                                @endauth

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </div>
                </ul>
            </div>
            @endauth--}}











            @guest

            <ul class="navbar-nav ml-auto">
             <li class="mr-3">
                <a class="text-warning" href="/login" class="sign-in"><i class="fa fa-sign-in"></i> Login</a>
            </li>
            <li>
                <a class="text-warning" href="/register" class="sign-in"><i class="fa fa-user"></i> Register</a>
            </li>
        </ul>
        @endguest



        @auth
        <ul class="navbar-nav ml-auto">

            <div class="dropdown">
              <button class="btn btn-warning dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Str::limit(Auth::user()->name, 8 ) }}
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @auth
                @if(Auth::user()->role == 'seller')
                <a class="dropdown-item" href="{{ route('createService') }}"> Post A Service </a>
                <a class="dropdown-item" href="{{ route('seller.dashboard') }}"> Dashboard </a>
                @endif 
                @endauth


                @auth
                @if(Auth::user()->role == 'buyer')
                
                <a class="dropdown-item" href="{{ route('buyer.dashboard') }}"> Dashboard </a>
                @endif 
                @endauth

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    </div>
</ul>

@endauth



</div>
</nav>
</div>
</header>

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