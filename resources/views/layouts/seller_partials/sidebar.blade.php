
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image">
        <img src="{{ Auth::user()->image == null ? '/images/user-icon.png' : '/images/'.''.Auth::user()->image  }}" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <p> {{ Auth::user()->name }} </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="" style="{{ url()->current() == route('seller.dashboard') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('seller.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>



      <li class="" style="{{ url()->current() == route('seller.message.all') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('seller.message.all') }}">
          <i class="fa fa-briefcase"></i> <span> My Messages </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-danger"> {{ $unread_message_count }}  </small>
          </span>
        </a>
      </li>

{{--

      <li class="treeview " style="{{ url()->current() == route('seller.service.create') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('seller.service.active') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('seller.service.pending') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('seller.service.all') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Service </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('seller.service.create') }} "><i class="fa fa-circle-o"></i> Create service </a></li>
          <li><a href=" {{ route('seller.service.active') }} "><i class="fa fa-circle-o"></i> Active Service</a></li>
          <li><a href=" {{ route('seller.service.pending') }} "><i class="fa fa-circle-o"></i> Pending Service </a></li>
          <li><a href=" {{ route('seller.service.all') }} "><i class="fa fa-circle-o"></i> All Service </a></li>
        </ul>
      </li>
      --}}

      <li class="treeview" style=" {{ url()->current() == route('seller.service.create') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('seller.service.all') ? 'background-color: #f8d053' : '' }} ">
        <a href="#">
          <i class="fa fa-home"></i>
          <span> My Services </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('seller.service.create') }} "><i class="fa fa-circle-o"></i> Create New Service</a></li>
          <li><a href=" {{ route('seller.service.all') }} "><i class="fa fa-circle-o"></i> My Services </a></li>
        </ul>
      </li>





{{--
      <li class="treeview" class="" style="{{ url()->current() == route('seller.message.unread') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('seller.message.read') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('seller.message.all') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-envelope"></i> <span> Message </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            <small class="label pull-right bg-danger"> {{ $unread_message_count }}  </small>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('seller.message.unread') }} "><i class="fa fa-circle-o"></i> Unread </a></li>
          <li><a href=" {{ route('seller.message.read') }} "><i class="fa fa-circle-o"></i>  Read </a></li>
          <li><a href=" {{ route('seller.message.all') }} "><i class="fa fa-circle-o"></i> All Message </a></li>
        </ul>
      </li>
      --}}

{{-- <li style="{{ url()->current() == route('seller.post_advert') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('seller.service.adverts') }} ">
          <i class="fa fa-plus"></i> <span> Post Advert </span>
          <span class="pull-right-container">
          </span>
        </a> --}}
      </li>


        <li style="{{ url()->current() == route('seller.service.badges') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('seller.service.badges') }} ">
          <i class="fa fa-certificate"></i> <span> Request for Badge </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="" style=" {{ url()->current() == route('seller.notification.all') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('seller.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-primary"> {{ $unread_notification_count }}  </small>
          </span>
        </a>
      </li>




      <li style="{{ url()->current() == route('seller.profile') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('seller.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href=" {{ route ('home') }}" target="_blank">
          <i class="fa fa-globe"></i> <span> Vist Site </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
         </form>
         <i class="fa fa-sign-out"></i> <span> Logout </span>
         <span class="pull-right-container">
         </span>
       </a>
     </li>


   </ul>


 </section>
 <!-- /.sidebar -->
 <div class="sidebar-footer">
    <a href=" {{route('seller.message.all') }} " class="link" data-toggle="tooltip" title="" data-original-title="Message"><i class="fa fa-envelope"></i></a>
    <!-- item-->

    <a  href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
     </form>
     <i class="fa fa-power-off"></i></a>
</div>
</aside>

