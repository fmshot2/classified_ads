
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

        <li class="" style="{{ url()->current() == route('agent.dashboard') ? 'background-color: #f8d053' : '' }}">
          <a href=" {{route ('accountant.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span> Dashboard </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        {{-- <li class="treeview" style=" {{ url()->current() == route('admin.buyer') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.seller') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-credit-card-alt"></i>
            <span> Agent Requests </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.unsuccessful.payments') }} " style="{{ url()->current() == route('accountant.unsuccessful.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> Pending Payments </a></li>
            <li><a href=" {{ route('accountant.successful.payments') }} " style="{{ url()->current() == route('accountant.successful.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> Paid Payments </a></li>
            <li><a href=" {{ route('accountant.all.payments') }} " style="{{ url()->current() == route('accountant.all.payments') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> All Payments </a></li>
          </ul>
        </li> --}}

        <li class="treeview" style=" {{ url()->current() == route('admin.buyer') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.seller') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span> Payment Requests </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.unsuccessful.referrals') }}" ><i class="fa fa-circle-o"></i> Pending Payment </a></li>
            <li><a href=" {{ route('accountant.successful.referrals') }}" ><i class="fa fa-circle-o"></i> Paid </a></li>
            <li><a href=" {{ route('accountant.all.referrals') }}"><i class="fa fa-circle-o"></i> All Referrals </a></li>
          </ul>
        </li>
        <li class="treeview" style=" {{ url()->current() == route('admin.buyer') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.seller') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-sticky-note"></i>
            <span> Advert Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.ad.requests') }} " style="{{ url()->current() == route('accountant.all.referrals') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> All Ad Payments </a></li>
            {{-- <li><a href="" data-toggle="modal" data-target="#payAd"><i class="fa fa-circle-o"></i> Pay </a></li> --}}
          </ul>
        </li>
        <li class="treeview" style=" {{ url()->current() == route('admin.buyer') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.seller') ? 'background-color: #f8d053' : '' }}">
          <a href="#">
            <i class="fa fa-handshake-o"></i>
            <span> Badge Payments </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('accountant.badges') }} " style="{{ url()->current() == route('accountant.successful.referrals') ? 'background-color: #f8d053' : '' }}"><i class="fa fa-circle-o"></i> All Payments </a></li>
          </ul>
        </li>

        <li style="{{ url()->current() == route('agent.profile') ? 'background-color: #f8d053' : '' }}">
          <a href=" {{ route ('accountant.profile') }} ">
            <i class="fa fa-user"></i> <span> Profile </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        {{-- <li>
          <a href=" {{ route ('home') }}" target="_blank">
            <i class="fa fa-globe"></i> <span> Vist Website </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> --}}
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

