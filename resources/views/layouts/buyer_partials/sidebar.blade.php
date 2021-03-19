
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

    <br>
    <hr>

    <!-- /.search form -->
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
{{--
      <li class="" style="{{ url()->current() == route('buyer.dashboard') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('seller.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      --}}


      <li class="" style="{{ url()->current() == route('buyer.dashboard') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('buyer.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>



      <li class="" style="{{ url()->current() == route('buyer.message.all') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('buyer.message.all') }}">
          <i class="fa fa-briefcase"></i> <span> My Messages </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-danger"> {{ $unread_message_count }}  </small>
          </span>
        </a>
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
          <li><a href=" {{ route('buyer.message.unread') }} "><i class="fa fa-circle-o"></i> Unread </a></li>
          <li><a href=" {{ route('buyer.message.read') }} "><i class="fa fa-circle-o"></i>  Read </a></li>
          <li><a href=" {{ route('buyer.message.all') }} "><i class="fa fa-circle-o"></i> All Message </a></li>
        </ul>
      </li>
      --}}

      <li class="" style=" {{ url()->current() == route('buyer.service.all') ? 'background-color: #f8d053' : '' }} ">
        <a href=" {{ route('buyer.service.all') }} ">
          <i class="fa fa-search"></i> <span> Request A Service </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      {{-- <li class="">
        <a href="/sellers">
          <i class="fa fa-users"></i> <span> View Sellers </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li> --}}


      <li class="" style=" {{ url()->current() == route('buyer.notification.all') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{route ('buyer.notification.all') }}">
          <i class="fa fa-bell"></i> <span> General Notices </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-primary"> {{ $unread_notification_count }}  </small>
          </span>
        </a>
      </li>
      {{-- <li class="treeview" style=" {{ url()->current() == route('admin.service.active') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.service.pending') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.service.all') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Payments </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('buyer.make.request') }} "><i class="fa fa-circle-o"></i> Make Withdrawal</a></li>
          <li><a href=" {{ route ('buyer.payment.history') }} "><i class="fa fa-circle-o"></i> Payment History </a></li>

        </ul>
      </li> --}}

      <li style="{{ url()->current() == route('buyer.profile') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('buyer.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

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


 </section>
 <!-- /.sidebar -->
 <div class="sidebar-footer">
    <!-- item-->{{--
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
    <!-- item--> --}}



    <a href=" {{route('buyer.message.all') }} " class="link" data-toggle="tooltip" title="" data-original-title="Message"><i class="fa fa-envelope"></i></a>
    <!-- item-->

    <a  href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
     </form>
     <i class="fa fa-power-off"></i></a>

   </div>
 </aside>

