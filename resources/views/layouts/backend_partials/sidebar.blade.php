
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image">
        <img src="{{ Auth::user()->image == null ? '/uploads/users/user-icon.png' : '/uploads/users/'.''.Auth::user()->image  }}" class="img-circle" alt="User Image">
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
      <li class="{{ url()->current() == route('superadmin.dashboard') ? 'active' : '' }}">
        <a href=" {{route ('superadmin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview " style="{{ url()->current() == route('superadmin.subcategory.show') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.category.show') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.service.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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
          <li><a href=" {{ route ('superadmin.featured.services') }} "><i class="fa fa-circle-o"></i> Featured Services </a></li>
        </ul>
      </li>

      <li class="" style="{{ url()->current() == route('superadmin.all.earnings') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('superadmin.all.earnings') }}">
          <i class="fa fa-comments-o"></i> <span> All Marketers Earnings </span>
        </a>
      </li>


      <li class="" style="{{ url()->current() == route('superadmin.users.feedback') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('superadmin.users.feedback') }}">
          <i class="fa fa-comments-o"></i> <span> User Feedbacks </span>
        </a>
      </li>

      <li class="" style="{{ url()->current() == route('superadmin.notification.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('superadmin.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>
      <li class="{{ url()->current() == route('superadmin.user.complaints') ? 'active' : '' }}">
        <a href=" {{route ('superadmin.user.complaints') }}">
          <i class="fa fa-bell"></i> <span> User Complaints </span>
          {{-- @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif --}}
        </a>
      </li>
      <li class="" style="{{ url()->current() == route('superadmin.profile') ? 'background-color: #cc8a19' : '' }}">
        <a href=" {{ route ('superadmin.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview " style="{{ url()->current() == route('superadmin.buyer') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.seller') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.add-accountant') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.all.admins') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.all_accountants') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.add.admin') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.all.cmos') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.add.cmo') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.allagents') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.all_ef_marketers') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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
          <li><a href="{{ route('superadmin.all_ef_marketers') }}"><i class="fa fa-circle-o"></i> EF Marketers </a></li>
        </ul>
      </li>

      <li class="treeview" style=" {{ url()->current() == route('superadmin.all.data') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.add.data') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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


      <li class="treeview" style="{{ url()->current() == route('superadmin.sliders') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.show_faq') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.privacy.policy') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.termsOfUse') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.pagescontents') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('superadmin.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
          {{-- <li><a href="{{ route('superadmin.events') }}"><i class="fa fa-circle-o"></i> Events </a></li> --}}
          <li><a href="{{ route('superadmin.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('superadmin.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('superadmin.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('superadmin.pagescontents') }}"><i class="fa fa-circle-o"></i> Pages Contents</a></li>
        </ul>
      </li>

      <li class="treeview " style="{{ url()->current() == route('superadmin.cities') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.government.officials') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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



        <li class="treeview" style="{{ url()->current() == route('superadmin.all_adverts') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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
        <li class="treeview" style="{{ url()->current() == route('superadmin.send_sms') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('superadmin.send_email') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-sitemap"></i>
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
        <li class="treeview" style=" {{ url()->current() == route('superadmin.system.config') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
            <a href="{{ route ('superadmin.system.config') }}">
            <i class="fa fa-globe"></i> <span> System Config </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>


        <li style="{{ url()->current() == route('superadmin.badge.request') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
            <a href=" {{ route ('superadmin.badge.request') }} ">
            <i class="fa fa-globe"></i> <span> Badge Requests </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>



        @elseif(Auth::user()->role == 'admin')
        <li class="{{ url()->current() == route('admin.dashboard') ? 'active' : '' }}">
        <a href=" {{route ('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview" style="{{ url()->current() == route('admin.service.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.seekingwork.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.category.show') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.subcategory.show') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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
          {{-- <li><a href=" {{ route ('admin.subcategory.show') }} "><i class="fa fa-circle-o"></i> Sub-categories </a></li> --}}

        </ul>
      </li>
      <li class="" style="{{ url()->current() == route('admin.featured.services') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{ route ('admin.featured.services') }}">
          <i class="fa fa-credit-card"></i> <span> Featured Services </span>
        </a>
      </li>
      
      <li class="" style="{{ url()->current() == route('admin.all.earnings') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('admin.all.earnings') }}">
          <i class="fa fa-credit-card"></i> <span> All Marketers Earnings </span>
        </a>
      </li>

      <li class="treeview" style="{{ url()->current() == route('admin.subscription.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} 
      {{ url()->current() == route('users_sub_almost_ended') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-money"></i>
          <span> Subscriptions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.subscription.all') }} "><i class="fa fa-circle-o"></i> All Subscriptions</a></li>

          <li><a href=" {{ route('users_sub_almost_ended') }} "><i class="fa fa-circle-o"></i> Subscription Ending</a></li>

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

      <li class="{{ url()->current() == route('admin.user.complaints') ? 'active' : '' }}">
        <a href=" {{route ('admin.user.complaints') }}">
          <i class="fa fa-bell"></i> <span> User Complaints </span>
          {{-- @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif --}}
        </a>
      </li>

      <li class="treeview"
        style="{{ url()->current() == route('admin.buyer') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.seller') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('all_accountants') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('add-accountant') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.all.cmos') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.add.cmo') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.allagents') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.all_ef_marketers') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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
          <li><a href="{{ route('admin.agents_yesterday') }}"><i class="fa fa-circle-o"></i> Yesterday Agent Sales </a></li>          
          <li><a href="{{ route('admin.all_ef_marketers') }}"><i class="fa fa-circle-o"></i> EF Marketers </a></li>
        </ul>
      </li>



      <li class="treeview"
        style="{{ url()->current() == route('admin.agents_yesterday') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.agents_last_week') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.agents_last_month') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Agent Reports </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.agents_yesterday') }} "><i class="fa fa-circle-o"></i> Yesterday </a></li>
          <li><a href=" {{ route('admin.agents_last_week') }} "><i class="fa fa-circle-o"></i> One Week  </a></li>
          <li><a href=" {{ route('admin.agents_last_month') }} "><i class="fa fa-circle-o"></i> One Month </a></li>
        </ul>
      </li>

       <li class="treeview"
        style="{{ url()->current() == route('admin.users_yesterday') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.users_last_week') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.users_last_month') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span> Users Reports </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.users_yesterday') }} "><i class="fa fa-circle-o"></i> Yesterday </a></li>
          <li><a href=" {{ route('admin.users_last_week') }} "><i class="fa fa-circle-o"></i> One Week  </a></li>
          <li><a href=" {{ route('admin.users_last_month') }} "><i class="fa fa-circle-o"></i> One Month </a></li>
        </ul>
      </li>

      <li class="treeview" style="{{ url()->current() == route('admin.all.data') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.add.data') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} ">
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

      <li class="treeview"  style="{{ url()->current() == route('admin.sliders') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.show_faq') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.privacy.policy') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.termsOfUse') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.pagescontents') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
          {{-- <li><a href="{{ route('events') }}"><i class="fa fa-circle-o"></i> Events </a></li> --}}
          <li><a href="{{ route('admin.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('admin.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('admin.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('admin.pagescontents') }}"><i class="fa fa-circle-o"></i> Pages Contents</a></li>
        </ul>
      </li>

      <li class="treeview"
        style="{{ url()->current() == route('admin.cities') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.government.officials') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
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



        <li class="treeview"
             style="{{ url()->current() == route('pending_advert_requests') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('active_adverts') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.all_adverts') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('treated_advert_requests') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
            <a href="#">
                <i class="fa fa-flag"></i>
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
        <li class="treeview"
          style="{{ url()->current() == route('admin.send_sms') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.send_email') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('admin.abandoned.payment') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span> Data Entry </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('admin.send_sms') }} "><i class="fa fa-circle-o"></i> Send SMS </a></li>
            <li><a href="{{ route('admin.send_email') }}"><i class="fa fa-circle-o"></i> Send Email</a></li>
            <li><a href="{{ route('admin.abandoned.payment') }}"><i class="fa fa-circle-o"></i> Abandoned Payment</a></li>
          </ul>
        </li>
        <li class="{{ url()->current() == route('system.config') ? 'active' : '' }}">
            <a href=" {{ route ('system.config') }} ">
            <i class="fa fa-globe"></i> <span> System Config </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>


        <li style="{{ url()->current() == route('badge.request') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
            <a href=" {{ route ('badge.request') }} ">
            <i class="fa fa-star"></i> <span> Badge Requests </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>

        <li class="" style="{{ url()->current() == route('admin.profile') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
          <a href=" {{ route ('admin.profile') }} ">
            <i class="fa fa-user"></i> <span> Profile Config </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


        @elseif(Auth::user()->role == 'cmo')

        <li class="{{ url()->current() == route('cmo.dashboard') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('cmo.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="" style="{{ url()->current() == route('cmo.notification.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('cmo.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>

      <li class="" style="{{ url()->current() == route('cmo.profile') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{ route ('cmo.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile Config </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview" style="{{ url()->current() == route('cmo.sliders') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('cmo.show_faq') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('cmo.privacy.policy') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('cmo.termsOfUse') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('cmo.pagescontents') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href="#">
          <i class="fa fa-file"></i>
          <span> Pages Management </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('cmo.sliders') }}"><i class="fa fa-circle-o"></i> Slider </a></li>
          {{-- <li><a href="{{ route('cmo.events') }}"><i class="fa fa-circle-o"></i> Events </a></li> --}}
          <li><a href="{{ route('cmo.show_faq') }}"><i class="fa fa-circle-o"></i> FAQs </a></li>
          <li><a href="{{ route('cmo.privacy.policy') }}"><i class="fa fa-circle-o"></i> Privacy </a></li>
          <li><a href="{{ route('cmo.termsOfUse') }}"><i class="fa fa-circle-o"></i> Terms Of Use </a></li>
          <li><a href="{{ route('cmo.pagescontents') }}"><i class="fa fa-circle-o"></i> Pages Contents</a></li>
        </ul>
      </li>

      <li class="treeview" style="{{ url()->current() == route('cmo.cities') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}{{ url()->current() == route('cmo.government.officials') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
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


        <li class="" style="{{ url()->current() == route('cmo.system.config') ? 'background-color: #cc8a19; color: #ffffff !important;' : ''}}">
            <a href=" {{ route ('cmo.system.config') }} ">
            <i class="fa fa-globe"></i> <span> System Config </span>
            <span class="pull-right-container">
            </span>
            </a>
        </li>
        @else
         <li class="" style="{{ url()->current() == route('data.dashboard') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('data.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="" style="{{ url()->current() == route('data.notification.all') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
        <a href=" {{route ('data.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notice </span>
          @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-primary"> {{ Auth::user()->unreadNotifications->count() }}  </small>
            </span>
          @endif
        </a>
      </li>
        <li style=" {{ url()->current() == route('data.send_email') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }} {{ url()->current() == route('data.send_sms') ? 'background-color: #cc8a19; color: #ffffff !important;' : '' }}">
          <a href="#">
            <i class="fa fa-sitemap"></i>
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
