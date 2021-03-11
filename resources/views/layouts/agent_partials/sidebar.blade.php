
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
            <i class="fa fa-briefcase"></i> <span> All My Referalls </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-danger">   </small>
            </span>
          </a>
        </li>



        <li class="" style=" {{ url()->current() == route('seller.notification.all') ? 'background-color: #f8d053' : '' }}">
          <a href=" {{route ('seller.notification.all') }}">
            <i class="fa fa-bell"></i> <span> General Notice </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-primary">   </small>
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
            <i class="fa fa-globe"></i> <span> Vist Website </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href=" {{ route ('contact') }}" target="_blank">
            <i class="fa fa-question"></i> <span> Help</span>
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

