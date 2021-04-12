
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

      @if(Auth::user()->role == 'superadmin')
      <li style="{{ url()->current() == route('superadmin.dashboard') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('superadmin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview {{ url()->current() == route('superadmin.subcategory.show') ? 'active' : '' }} {{ url()->current() == route('superadmin.category.show') ? 'active' : '' }} {{ url()->current() == route('superadmin.service.all') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Service Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('superadmin.service.all') }} "><i class="fa fa-circle-o"></i> All Service</a></li>
          <li><a href=" {{ route('superadmin.service.all') }} "><i class="fa fa-circle-o"></i> All Seeking Works</a></li>
          <li><a href=" {{ route ('superadmin.category.show') }} "><i class="fa fa-circle-o"></i> Categories </a></li>
          <li><a href=" {{ route ('superadmin.subcategory.show') }} "><i class="fa fa-circle-o"></i> Sub-categories </a></li>

        </ul>
      </li>

      <li class="{{ url()->current() == route('superadmin.users.feedback') ? 'active' : '' }}">
        <a href=" {{route ('superadmin.users.feedback') }}">
          <i class="fa fa-comments-o"></i> <span> User Feedbacks </span>
        </a>
      </li>

      <li class="{{ url()->current() == route('superadmin.notification.all') ? 'active' : '' }}">
        <a href=" {{route ('superadmin.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>

      <li class="{{ url()->current() == route('superadmin.profile') ? 'active' : '' }}">
        <a href=" {{ route ('superadmin.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview {{ url()->current() == route('superadmin.buyer') ? 'active' : '' }} {{ url()->current() == route('superadmin.seller') ? 'active' : '' }}" style=" ">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Users </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('superadmin.buyer') }} "><i class="fa fa-circle-o"></i> Service Seekers </a></li>
          <li><a href=" {{ route('superadmin.seller') }} "><i class="fa fa-circle-o"></i> Service Providers </a></li>
          <li><a href=" {{ route('superadmin.all_accountants') }} "><i class="fa fa-circle-o"></i> Accountants </a></li>
          <li><a href="{{ route('superadmin.add-accountant') }}"><i class="fa fa-circle-o"></i> Add Accountant </a></li>
          <li><a href=" {{ route('superadmin.all.admins') }} "><i class="fa fa-circle-o"></i> Admins </a></li>
          <li><a href="{{ route('superadmin.add.admin') }}"><i class="fa fa-circle-o"></i> Add Admin </a></li>
          <li><a href=" {{ route('superadmin.all.cmos') }} "><i class="fa fa-circle-o"></i> CMOs </a></li>
          <li><a href="{{ route('superadmin.add.cmo') }}"><i class="fa fa-circle-o"></i> Add CMO </a></li>
          <li><a href="{{ route('superadmin.allagents') }}"><i class="fa fa-circle-o"></i> Agents </a></li>
        </ul>
      </li>

      <li class="treeview {{ url()->current() == route('superadmin.all.data') ? 'active' : '' }} {{ url()->current() == route('superadmin.add.data') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Data Entry Officers </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('superadmin.all.data') }} "><i class="fa fa-circle-o"></i> All Data Entry Officers </a></li>
          <li><a href="{{ route('superadmin.add.data') }}"><i class="fa fa-circle-o"></i> Add Data Entry Officer</a></li>
        </ul>
      </li>


      <li class="treeview {{ url()->current() == route('superadmin.show_faq') ? 'active' : '' }}
        {{ url()->current() == route('superadmin.privacy.policy') ? 'active' : '' }}
        {{ url()->current() == route('superadmin.sliders') ? 'active' : '' }}
         {{ url()->current() == route('superadmin.termsOfUse') ? 'active' : '' }}" style=" ">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('superadmin.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
          <li><a href="{{ route('superadmin.events') }}"><i class="fa fa-circle-o"></i> Events </a></li>
          <li><a href="{{ route('superadmin.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('superadmin.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('superadmin.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('superadmin.pagescontents') }}"><i class="fa fa-circle-o"></i> Pages Contents</a></li>
        </ul>
      </li>

      <li class="treeview {{ url()->current() == route('superadmin.cities') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Officials </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('superadmin.cities') }}"><i class="fa fa-circle-o"></i> Tourist Sites </a></li>
          <li><a href=" {{ route('superadmin.government.officials') }}"><i class="fa fa-circle-o"></i> Government Officials </a></li>
        </ul>
      </li>



        <li class="treeview {{ url()->current() == route('pending_advert_requests') ? 'active' : '' }}
            {{ url()->current() == route('treated_advert_requests') ? 'active' : '' }}
            {{ url()->current() == route('active_adverts') ? 'active' : '' }} {{ url()->current() == route('superadmin.all_adverts') ? 'active' : '' }}" style=" ">
            <a href="#">
                <i class="fa fa-file"></i>
                <span> Advert Management </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('superadmin.all_adverts') }}"><i class="fa fa-circle-o"></i>All Adverts</a></li>
            <!--     <li><a href="{{ route('pending_advert_requests') }}"><i class="fa fa-circle-o"></i>Untreated Advert Requests</a></li>
                <li><a href="{{ route('treated_advert_requests') }}"><i class="fa fa-circle-o"></i> Treated Advert Requests </a></li>
                <li><a href="{{ route('active_adverts') }}"><i class="fa fa-circle-o"></i> Active Adverts </a></li> -->
            </ul>
        </li>
        <li class="treeview {{ url()->current() == route('superadmin.send_sms') ? 'active' : '' }} {{ url()->current() == route('superadmin.send_email') ? 'active' : '' }}" style=" ">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Data Entry </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('superadmin.send_sms') }} "><i class="fa fa-circle-o"></i> Send SMS </a></li>
          <li><a href="{{ route('superadmin.send_email') }}"><i class="fa fa-circle-o"></i> Send Email</a></li>
        </ul>
      </li>
        <li class="treeview" style=" {{ url()->current() == route('superadmin.system.config') ? 'background-color: #f8d053' : '' }}">
            <a href=" {{ route ('superadmin.system.config') }} ">
            <i class="fa fa-globe"></i> <span> System Config </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>


        <li>
            <a href=" {{ route ('superadmin.badge.request') }} ">
            <i class="fa fa-globe"></i> <span> Badge Requests </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>



        @elseif(Auth::user()->role == 'admin')
        <li class="{{ url()->current() == route('cmo.dashboard') ? 'active' : '' }}">
        <a href=" {{route ('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview {{ url()->current() == route('admin.service.active') ? 'active' : '' }} {{ url()->current() == route('admin.service.pending') ? 'active' : '' }} {{ url()->current() == route('admin.service.all') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Service Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.service.all') }} "><i class="fa fa-circle-o"></i> All Service</a></li>
          <li><a href=" {{ route('admin.seekingwork.all') }} "><i class="fa fa-circle-o"></i> All Seeking Works</a></li>
          <li><a href=" {{ route ('admin.category.show') }} "><i class="fa fa-circle-o"></i> Categories </a></li>
          <li><a href=" {{ route ('admin.subcategory.show') }} "><i class="fa fa-circle-o"></i> Sub-categories </a></li>

        </ul>
      </li>


      <li class="treeview {{ url()->current() == route('admin.subscription.all') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Subscriptions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.subscription.all') }} "><i class="fa fa-circle-o"></i> All Subscriptions</a></li>

        </ul>
      </li>

      <li class="{{ url()->current() == route('admin.users.feedback') ? 'active' : '' }}">
        <a href=" {{route ('admin.users.feedback') }}">
          <i class="fa fa-comments-o"></i> <span> User Feedbacks </span>
        </a>
      </li>

      <li class="{{ url()->current() == route('admin.notification.all') ? 'active' : '' }}">
        <a href=" {{route ('admin.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>

      <li class="{{ url()->current() == route('admin.profile') ? 'active' : '' }}">
        <a href=" {{ route ('admin.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview {{ url()->current() == route('admin.buyer') ? 'active' : '' }} {{ url()->current() == route('admin.seller') ? 'active' : '' }}">
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
          <li><a href=" {{ route('all_accountants') }} "><i class="fa fa-circle-o"></i> Accountants </a></li>
          <li><a href="{{ route('add-accountant') }}"><i class="fa fa-circle-o"></i> Add Accountant </a></li>
          <li><a href=" {{ route('admin.all.cmos') }} "><i class="fa fa-circle-o"></i> CMOs </a></li>
          <li><a href="{{ route('admin.add.cmo') }}"><i class="fa fa-circle-o"></i> Add CMO </a></li>
          <li><a href="{{ route('admin.allagents') }}"><i class="fa fa-circle-o"></i> Agents </a></li>
        </ul>
      </li>

      <li class="treeview {{ url()->current() == route('admin.all.data') ? 'active' : '' }} {{ url()->current() == route('admin.add.data') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Data Entry Officers </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.all.data') }} "><i class="fa fa-circle-o"></i> All Data Entry Officers </a></li>
          <li><a href="{{ route('admin.add.data') }}"><i class="fa fa-circle-o"></i> Add Data Entry Officer</a></li>
        </ul>
      </li>

      <li class="treeview {{ url()->current() == route('admin.show_faq') ? 'active' : '' }}
        {{ url()->current() == route('admin.privacy.policy') ? 'active' : '' }}
        {{ url()->current() == route('admin.sliders') ? 'active' : '' }}
         {{ url()->current() == route('admin.termsOfUse') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
          <li><a href="{{ route('events') }}"><i class="fa fa-circle-o"></i> Events </a></li>
          <li><a href="{{ route('admin.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('admin.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('admin.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('admin.pagescontents') }}"><i class="fa fa-circle-o"></i> Pages Contents</a></li>
        </ul>
      </li>

      <li class="treeview {{ url()->current() == route('admin.cities') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Officials </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.cities') }}"><i class="fa fa-circle-o"></i> Tourist Sites </a></li>
          <li><a href=" {{ route('admin.government.officials') }}"><i class="fa fa-circle-o"></i> Government Officials </a></li>
        </ul>
      </li>



        <li class="treeview {{ url()->current() == route('pending_advert_requests') ? 'active' : '' }}
            {{ url()->current() == route('treated_advert_requests') ? 'active' : '' }}
            {{ url()->current() == route('active_adverts') ? 'active' : '' }} {{ url()->current() == route('admin.all_adverts') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-file"></i>
                <span> Advert Management </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.all_adverts') }}"><i class="fa fa-circle-o"></i>All Adverts</a></li>
            <!--     <li><a href="{{ route('pending_advert_requests') }}"><i class="fa fa-circle-o"></i>Untreated Advert Requests</a></li>
                <li><a href="{{ route('treated_advert_requests') }}"><i class="fa fa-circle-o"></i> Treated Advert Requests </a></li>
                <li><a href="{{ route('active_adverts') }}"><i class="fa fa-circle-o"></i> Active Adverts </a></li> -->
            </ul>
        </li>
        <li class="treeview {{ url()->current() == route('admin.send_sms') ? 'active' : '' }} {{ url()->current() == route('superadmin.send_email') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i>
            <span> Data Entry </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('admin.send_sms') }} "><i class="fa fa-circle-o"></i> Send SMS </a></li>
            <li><a href="{{ route('admin.send_email') }}"><i class="fa fa-circle-o"></i> Send Email</a></li>
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
        

        @elseif(Auth::user()->role == 'cmo')

        <li class="{{ url()->current() == route('cmo.dashboard') ? 'active' : '' }}">
        <a href=" {{route ('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="{{ url()->current() == route('cmo.notification.all') ? 'active' : '' }}">
        <a href=" {{route ('cmo.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>

      <li class="{{ url()->current() == route('cmo.profile') ? 'active' : '' }}">
        <a href=" {{ route ('cmo.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>



      <li class="treeview {{ url()->current() == route('cmo.show_faq') ? 'active' : '' }}
      {{ url()->current() == route('cmo.privacy.policy') ? 'active' : '' }}
      {{ url()->current() == route('cmo.show_faq') ? 'active' : '' }}
      {{ url()->current() == route('cmo.events') ? 'active' : '' }}
      {{ url()->current() == route('cmo.sliders') ? 'active' : '' }}
      {{ url()->current() == route('cmo.pagescontents') ? 'active' : '' }}
       {{ url()->current() == route('cmo.termsOfUse') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('cmo.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
          <li><a href="{{ route('cmo.events') }}"><i class="fa fa-circle-o"></i> Events </a></li>
          <li><a href="{{ route('cmo.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('cmo.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('cmo.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('cmo.pagescontents') }}"><i class="fa fa-circle-o"></i> Pages Contents</a></li>
        </ul>
      </li>

      <li class="treeview {{ url()->current() == route('cmo.cities') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Officials </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('cmo.cities') }}"><i class="fa fa-circle-o"></i> Tourist Sites </a></li>
          <li><a href=" {{ route('cmo.government.officials') }}"><i class="fa fa-circle-o"></i> Government Officials </a></li>
        </ul>
      </li>


        <li class="{{ url()->current() == route('cmo.system.config') ? 'active' : ''}}">
            <a href=" {{ route ('cmo.system.config') }} ">
            <i class="fa fa-globe"></i> <span> System Config </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        @else
         <li class="{{ url()->current() == route('data.dashboard') ? 'active' : '' }}">
        <a href=" {{route ('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="{{ url()->current() == route('data.notification.all') ? 'active' : '' }}">
        <a href=" {{route ('data.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>
        <li style="treeview {{ url()->current() == route('data.send_email') ? 'active' : '' }} {{ url()->current() == route('data.send_sms') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i>
            <span> Data Entry </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('data.send_sms') }} "><i class="fa fa-circle-o"></i> Send SMS </a></li>
            <li><a href="{{ route('data.send_email') }}"><i class="fa fa-circle-o"></i> Send Email</a></li>
          </ul>
        </li>
        @endif
      <li>
        <a href=" {{ route ('home') }} " target="_blank">
          <i class="fa fa-globe"></i> <span> Visit Site </span>
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
