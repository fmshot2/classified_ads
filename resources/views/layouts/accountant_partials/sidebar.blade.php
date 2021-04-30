
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
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

      <!-- /.search form -->
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="" style="{{ url()->current() == route('accountant.dashboard') ? 'background-color: #f8d053' : '' }}">
          <a href=" {{route ('accountant.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span> Dashboard </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        {{--
        <li class="" style="{{ url()->current() == route('accountant.all.due.payments') ? 'background-color: #f8d053' : '' }}">
          <a href=" {{route ('accountant.all.due.payments') }}">
            <i class="fa fa-credit-card-alt"></i> <span> Due Payments </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
        <li class="treeview" style=" {{ url()->current() == route('accountant.seller.activity') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.agent.activity') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-clock-o"></i>
            <span> Activity </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.seller.activity') }} "><i class="fa fa-circle-o"></i> Service Providers Activity </a></li>
            <li><a href=" {{ route('accountant.agent.activity') }} "><i class="fa fa-circle-o"></i> Agents Activity </a></li>
          </ul>
        </li>
        <li class="treeview" style=" {{ url()->current() == route('accountant.all.due.payments') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.settled.payments') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i>
            <span> Seller Due Payments </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.all.due.payments') }} "><i class="fa fa-circle-o"></i> Pending Payments </a></li>
            {{-- <li><a href=" {{ route('accountant.settled.payments') }} " style="{{ url()->current() == route('accountant.successful.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> Settled Payments </a></li> --}}
          </ul>
        </li>
        <li class="treeview" style=" {{ url()->current() == route('accountant.agent.due.payments') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.agent.settled.payments') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span> Agent Due Payments </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.agent.due.payments') }} "><i class="fa fa-circle-o"></i> Pending Payments </a></li>
            {{-- <li><a href=" {{ route('accountant.agent.settled.payments') }} " style="{{ url()->current() == route('accountant.successful.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> Settled Payments </a></li> --}}
          </ul>
        </li>
        {{-- <li class="treeview" style=" {{ url()->current() == route('accountant.pending.agent.payments') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.paid.agent.payments') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.all.agent.payments') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-credit-card-alt"></i>
            <span> Agent Requests </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.pending.agent.payments') }} "><i class="fa fa-circle-o"></i> Pending Payments </a></li>
            <li><a href=" {{ route('accountant.paid.agent.payments') }} " style="{{ url()->current() == route('accountant.successful.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> Paid </a></li>
            <li><a href=" {{ route('accountant.all.agent.payments') }} " style="{{ url()->current() == route('accountant.all.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> All Payments </a></li>
          </ul>
        </li> --}}

        <li class="treeview" style=" {{ url()->current() == route('accountant.unsuccessful.referrals') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.successful.referrals') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.all.referrals') ? 'background-color: #f8d053' : '' }} ">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span> Payment Requests </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.unsuccessful.referrals') }}" ><i class="fa fa-circle-o"></i> Pending Payments </a></li>
            <li><a href=" {{ route('accountant.successful.referrals') }}" ><i class="fa fa-circle-o"></i> Paid </a></li>
            <li><a href=" {{ route('accountant.all.referrals') }}"><i class="fa fa-circle-o"></i> All Referral Payments</a></li>
          </ul>
        </li>
        <li class="treeview" style=" {{ url()->current() == route('accountant.ad.requests') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.badges') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.subscriptions') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.featured') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('accountant.all.payments') ? 'background-color: #f8d053' : '' }} ">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span> Payments </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.ad.requests') }} " ><i class="fa fa-circle-o"></i> Advert Payments </a></li>
            <li><a href=" {{ route('accountant.badges') }}" ><i class="fa fa-circle-o"></i> Badge Payments </a></li>
            <li><a href=" {{ route('accountant.subscriptions') }}"><i class="fa fa-circle-o"></i> Re - Subscriptions</a></li>
            <li><a href=" {{ route('accountant.featured') }}"><i class="fa fa-circle-o"></i> Featured Service Payments</a></li>
            <li><a href=" {{ route('accountant.registration') }}"><i class="fa fa-circle-o"></i>Subscriptions</a></li>
            <li><a href=" {{ route('accountant.ef.payments') }}"><i class="fa fa-circle-o"></i> All Payments</a></li>
          </ul>
        </li>
        {{-- <li class="treeview" style=" {{ url()->current() == route('accountant.ad.requests') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-sticky-note"></i>
            <span> Advert Payments </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.ad.requests') }} "><i class="fa fa-circle-o"></i> All Advert Payments </a></li>

          </ul>
        </li> --}}
        {{-- <li class="treeview" style=" {{ url()->current() == route('accountant.badges') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-handshake-o"></i>
            <span> Badge Payments </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.badges') }} "><i class="fa fa-circle-o"></i> All Badge Payments </a></li>
          </ul>
        </li> --}}

        {{-- <li style="{{ url()->current() == route('agent.profile') ? 'background-color: #f8d053' : '' }}">
          <a href=" {{ route ('accountant.profile') }} ">
            <i class="fa fa-user"></i> <span> Profile </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
        <li>
          <a href=" {{ route ('home') }}" target="_blank">
            <i class="fa fa-globe"></i> <span> Vist Website </span>
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

