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
                        <img src="{{asset('logos/efcontactlogo.png')}}" style="height: 45px;" alt="logo">
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
                                    Explore
                                </a>
                            </li>
                        
      <li class="nav-item">
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
            Contact
        </a>

    </li>

   @auth
                @if(Auth::user()->role == 'seller')
                <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('createService') }}"> Post Service </a>
                  </li>
                @endif 
                @endauth


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


  @if(Auth::user()->role == 'seller')
          <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('seller.dashboard') }}">My Dashboard </a>
                  </li>
                @endif 

                @if(Auth::user()->role == 'buyer')
                <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('buyer.dashboard') }}">My Dashboard </a>
                </li>
                @endif 



                

<li>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>


                <a class="nav-link text-warning" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>




              

    </ul>

@endauth

 



{{-- 



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





  <div class="pull-right">
                 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div> 




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

@endauth --}}



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