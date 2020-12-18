
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image">
        <img src=" {{ '/images/user-icon.png' }} " class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <p> {{ Auth::user()->name }} </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
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


      <li style="{{ url()->current() == route('admin.category.show') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('admin.category.show') }} ">
          <i class="fa fa-tags"></i> <span> Categories </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>


      <li class="treeview" style=" {{ url()->current() == route('admin.service.active') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.service.pending') ? 'background-color: #f8d053' : '' }} {{ url()->current() == route('admin.service.all') ? 'background-color: #f8d053' : '' }}">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Service </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=" {{ route('admin.service.active') }} "><i class="fa fa-circle-o"></i> Active Service</a></li>
          <li><a href=" {{ route('admin.service.pending') }} "><i class="fa fa-circle-o"></i> Pending Service </a></li>
          <li><a href=" {{ route('admin.service.all') }} "><i class="fa fa-circle-o"></i> All Service </a></li>
        </ul>
      </li>


      <li style="{{ url()->current() == route('admin.profile') ? 'background-color: #f8d053' : '' }}">
        <a href=" {{ route ('admin.profile') }} ">
          <i class="fa fa-user"></i> <span> Profile </span>
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
          <li><a href=" {{ route('admin.buyer') }} "><i class="fa fa-circle-o"></i> Buyer </a></li>
          <li><a href=" {{ route('admin.seller') }} "><i class="fa fa-circle-o"></i> Seller </a></li>
        </ul>
      </li>

      <li>
        <a href=" {{ route ('home') }} ">
          <i class="fa fa-globe"></i> <span> Main Website </span>
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
  <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
  <!-- item-->
  <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
  <!-- item-->
  <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
</div>
</section>
</aside>
