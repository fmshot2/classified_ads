<style>
    .tour-label{
        animation: pulsePostBtn 1s infinite;
    }
    .skin-blue .main-header .navbar .nav > li > a{
        font-size: 16px;
    }
    @-webkit-keyframes pulsePostBtn {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(241, 95, 95, 0.9);
        }
        70% {
            -webkit-box-shadow: 0 0 0 10px rgba(43, 207, 112, 0);
        }
        100% {
            -webkit-box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
        }
    }
    @keyframes pulsePostBtn {
        0% {
            -moz-box-shadow: 0 0 0 0 rgba(241, 95, 95, 0.9);
            box-shadow: 0 0 0 0 rgba(241, 95, 95, 0.9);
        }
        70% {
            -moz-box-shadow: 0 0 0 10px rgba(39, 230, 118, 0);
            box-shadow: 0 0 0 10px rgba(43, 202, 109, 0);
        }
        100% {
            -moz-box-shadow: 0 0 0 0 rgba(43, 207, 112, 0);
            box-shadow: 0 0 0 0 rgba(43, 207, 112, 0);
        }
    }
</style>
<header class="main-header ">
<!-- Logo -->
<a href="index.html" class="logo">
  <!-- mini logo-->
  <span class="logo-mini"><b>EFC</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><img src="images/{{$check_general_info == 0 ? $general_info->logo : '' }}" alt="" style=""></span>
</a>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top" style="background-color: #f8d053">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li>
            <a id="showTour" data-toggle="modal" data-target="#tourGuideModal" href="#">
                <i class="fa fa-camera"></i>
                <span class="label label-danger tour-label">!</span>
            </a>
        </li>
      <!-- User Account -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if (Auth::guard('agent')->user()->image == null)
                <i class="fa fa-user" style="color: #fff"; font-size: 50px !important;></i>
            @else
                <img src="{{ '/images/'.Auth::guard('agent')->user()->image  }}" class="user-image" alt="User Image">
            @endif
        </a>
        <ul class="dropdown-menu scale-up">
          <!-- User image -->
          <li class="user-header" style="background-color: #f8d053;">
            <img src="{{ Auth::guard('agent')->user()->image == null ? '/images/user-icon.png' : '/images/'.''.Auth::guard('agent')->user()->image  }}" class="img-responsive" alt="User Image">

            <p>
              {{ Auth::guard('agent')->user()->name }}
              <small style="color: black">Member since {{ Auth::guard('agent')->user()->created_at->format('M') }} . {{ Auth::guard('agent')->user()->created_at->format('Y') }} </small>
            </p>
          </li>
          <!-- Menu Body -->
          {{--
          <li class="user-body">
            <div class="row">
              <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          --}}
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{ route('agent.profile') }}" class="btn btn-default btn-flat">Profile</a>
            </div>

            <div class="pull-right">
              <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </li>


    <li class="dropdown messages-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="label label-primary">   </span>
      </a>
      <ul class="dropdown-menu scale-up">
        <li class="header">Notifications from EfContact</li>
        <li>
          <!-- inner menu: contains the actual data -->
          <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
            {{-- @foreach($unread_notification as $unread_notifications)

            <li><!-- start message -->
              <a href="{{ route('seller.notification.view',$unread_notifications->slug) }}">

                <div class="mail-contnet">
                  <span style="font-weight: bold;"> {{ Str::limit($unread_notifications->description, 23)  }} <small class="text-danger"><i class="fa fa-clock-o text-danger"></i> {{ $unread_notifications->created_at->diffForHumans() }} </small> </span>
              </div>
            </a>
          </li>
          @endforeach --}}

          <!-- end message -->

        </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 112.676px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
      </li>
      <li class="footer"> <a href="{{route('agent.notification.all') }}" class="text-warning" style="font-weight: bold;"> See all  notifications </a> </li>
    </ul>
  </li>
</ul>






</ul>
</div>
</nav>
</header>
<style>
.modal-body .youtube{
    height: 315px;
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
}
.modal-body iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
<div id="tourGuideModal" class="modal fade" role="dialog">
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body" style="margin:0; padding:0">
            {{-- <video id="vid-player" src="{{ asset('videos/Youtube-Subscribe.mp4') }}" autoplay controls style="width: 100%; margin:0; padding:0"></video> --}}
            <div class="youtube">
                <iframe id="yt-player" frameborder="0" style="width: 100%; height: 100%; margin:0; padding:0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="modal-footer" style="margin: -10px 0 0 0; background-color: #000000">
            <button id="closeytplayer" type="button" class="btn btn-default" data-dismiss="modal" style="background-color: rgb(0, 0, 0); border:2px solid #fff;color:#fff; border-radius: 25px; margin-top: 10px">Close</button>
        </div>
    </div>
</div>
</div>


<script>
    $('#showTour').on('click', () => {
        $('#yt-player').attr('src', 'https://www.youtube.com/embed/058hRtaCWC0?showinfo=0&controls=0&rel=0&autoplay=1');
    });
    $('#closeytplayer').on('click', () => {
        $('#yt-player').attr('src', '');
        $('#vid-player').attr('src', '');
    });
</script>
