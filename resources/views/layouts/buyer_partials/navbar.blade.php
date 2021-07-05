<style>
    .skin-blue .main-header .navbar .nav > li > a{
        font-size: 16px;
    }
</style>
<header class="main-header ">
  <!-- Logo -->
  <a href="index.html" class="logo">
    <!-- mini logo-->
    <span class="logo-mini"><b>C</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b> Yellow</b>Page</span>
  </a>
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if (Auth::user()->image == null)
                <i class="fa fa-user" style="color: #fff"; font-size: 50px !important;></i>
            @else
                <img src="{{ '/uploads/users/'.Auth::user()->image  }}" class="user-image" alt="User Image">
            @endif
          </a>
          <ul class="dropdown-menu scale-up">
            <!-- User image -->
            <li class="user-header" style="background-color: #f8d053;">
              <img src="{{ Auth::user()->image == null ? '/images/user-icon.png' : '/uploads/users/'.''.Auth::user()->image  }}" class="img-responsive" alt="User Image">

              <p>
                {{ Auth::user()->name }}
                <small style="color: black">Member since {{ Auth::user()->created_at->format('M') }} . {{ Auth::user()->created_at->format('Y') }} </small>
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
                  <a href="{{ route('buyer.profile') }}" class="btn btn-default btn-flat">Profile</a>
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
          <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope"></i>
            @if ($unread_message_count > 0)
                <span class="label label-danger"> {{ $unread_message_count }}  </span>
            @endif
          </a>
          <ul class="dropdown-menu scale-up">
            <li class="header">You have {{ $unread_message_count }} unread messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                @foreach($unread_message as $unread_messages)

                <li><!-- start message -->
                  <a href="{{ route('seller.message.view',$unread_messages->slug) }}">

                    <div class="mail-contnet">
                      <span style="font-weight: bold;"> {{ Str::limit($unread_messages->description, 23)  }} <small class="text-danger"><i class="fa fa-clock-o text-danger"></i> {{ $unread_messages->created_at->diffForHumans() }} </small> </span>
                    </div>
                  </a>
                </li>
                @endforeach

                <!-- end message -->

              </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 112.676px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </li>
            <li class="footer"> <a href="{{route('buyer.message.all') }}" class="text-warning" style="font-weight: bold;"> See all message </a> </li>
          </ul>
        </li>

        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell"></i>
                @if (Auth::user()->unreadNotifications->count() > 0)
                    <span class="label label-primary"> {{ Auth::user()->unreadNotifications->count() }}  </span>
                @endif
              </a>
          <ul class="dropdown-menu scale-up">
            <li class="header">You have {{ Auth::user()->unreadNotifications->count() }} unread notification{{ Auth::user()->unreadNotifications->count() > 1 ? 's' : '' }}</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                @foreach(Auth::user()->unreadNotifications as $unread_notification)
                    <li data-toggle="modal" data-target="#notificationDialog{{ $unread_notification->id }}" onclick="notiDialog('{{ $unread_notification->id }}')"><!-- start message -->
                        <a href="#" style="display: block">
                            <div class="mail-contnet">
                            <span style="font-weight: bold;"> {{ Str::limit($unread_notification->data[0]['message'], 20) }} <small class="text-danger"><i class="fa fa-clock-o text-danger"></i> {{ $unread_notification->created_at->diffForHumans() }} </small> </span>
                            </div>
                        </a>
                        <div id="notificationDialog{{ $unread_notification->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                        <h4 class="modal-title">Your Notification</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ $unread_notification->data[0]['message'] }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" style="background-color: #cc8a19; color: #fff" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
            @endforeach

                <!-- end message -->

              </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 112.676px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </li>
            <li class="footer"> <a href="{{route('seeker.notification.all') }}" class="text-warning" style="font-weight: bold;"> See all  notification </a> </li>
          </ul>
        </li>
      </ul>


    </ul>
  </div>
</nav>

<script>
    function notiDialog(id) {
        $('#notificationDialog'+id).appendTo("body");

        $.ajax({
            method: "POST",
            url: "{{ route('seeker.notification.markasread') }}",
            dataType: "json",
            data: {
                _token: _token,
                notification_id: id,
            },
            success: function (data) {
                toastr.success('Notification marked as read!')
                $('#markAsRead'+id).hide()
            },
            error: function(error) {
                toastr.error('Something went wrong!')
                console.log(error)
            }
        })
    }
</script>
</header>
