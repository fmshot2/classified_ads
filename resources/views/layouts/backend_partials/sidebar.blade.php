
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar" style="height: auto;">
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
 {{--   <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form> --}}
    <!-- /.search form -->
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li style="{{ url()->current() == route('admin.dashboard') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview" style=" {{ url()->current() == route('admin.service.active') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.service.pending') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.service.all') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Service Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.service.all') }} "><i class="fa fa-circle-o"></i> All Service</a></li>
          <li><a href=" {{ route ('admin.category.show') }} "><i class="fa fa-circle-o"></i> Categories </a></li>
          <li><a href=" {{ route ('admin.subcategory.show') }} "><i class="fa fa-circle-o"></i> Sub-categories </a></li>

        </ul>
      </li>

      <li class="" style=" {{ url()->current() == route('admin.users.feedback') ? 'background-color: rgb(202, 131, 9)' : '' }}">
        <a href=" {{route ('admin.users.feedback') }}">
          <i class="fa fa-bell"></i> <span> Feedbacks </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-primary"> {{ $unread_notification_count }}  </small>
          </span>
        </a>
      </li>

      <li class="" style=" {{ url()->current() == route('admin.notification.all') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('admin.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-primary"> {{ $unread_notification_count }}  </small>
          </span>
        </a>
      </li>

      <li style="{{ url()->current() == route('admin.profile') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('admin.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview" style=" {{ url()->current() == route('admin.buyer') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.seller') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Users </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.buyer') }} "><i class="fa fa-circle-o"></i> Service Seekers </a></li>
          <li><a href=" {{ route('admin.seller') }} "><i class="fa fa-circle-o"></i> Service Providers </a></li>
        </ul>
      </li>


      <li class="treeview" style=" {{ url()->current() == route('admin.show_faq') ? 'background-color: #f8d053' : '' }}
      {{ url()->current() == route('admin.privacy.policy') ? 'background-color: #f8d053' : '' }}
      {{ url()->current() == route('admin.sliders') ? 'background-color: #f8d053' : '' }}
       {{ url()->current() == route('admin.termsOfUse') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('events') }}"i class="fa fa-circle-o"></i> Events </a></li>
          <li><a href=" {{ route('admin.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('admin.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('admin.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('admin.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
        </ul>
      </li>



<li class="treeview" style=" {{ url()->current() == route('pending_advert_requests') ? 'background-color: #f8d053' : '' }}
      {{ url()->current() == route('treated_advert_requests') ? 'background-color: #f8d053' : '' }}
      {{ url()->current() == route('active_adverts') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Advert Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('pending_advert_requests') }}"><i class="fa fa-circle-o"></i>Untreated Advert Requests</a></li>
            <li><a href="{{ route('treated_advert_requests') }}"><i class="fa fa-circle-o"></i> Treated Advert Requests </a></li>
          <li><a href="{{ route('active_adverts') }}"><i class="fa fa-circle-o"></i> Active Adverts </a></li>
        </ul>
      </li>









      <li>
        <a href=" {{ route ('system.config') }} ">
          <i class="fa fa-globe"></i> <span> System Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>



        <li>
        <a href=" {{ route ('badge.request') }} ">
          <i class="fa fa-globe"></i> <span> Badge Requests </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href=" {{ route ('home') }} ">
          <i class="fa fa-globe"></i> <span> Homepage </span>
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

 <!-- /.sidebar -->
 <div class="sidebar-footer">
  <!-- item-->
    <a href=" {{route('admin.notification.all') }} " class="link" data-toggle="tooltip" title="" data-original-title="Message"><i class="fa fa-envelope"></i></a>
    <!-- item-->

    <a  href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
     </form>
     <i class="fa fa-power-off"></i></a>
</div>
</section>
</aside>
