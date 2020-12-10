
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image">
        <img src="../images/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <p>MultiPurpose Themes</p>
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

      <li>
        <a href=" {{route ('seller.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span> Dashboard </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-briefcase"></i>
          <span> Service </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/seller/service/add"><i class="fa fa-circle-o"></i> Create service </a></li>
          <li><a href=" {{-- route('admin.service.active') --}} "><i class="fa fa-circle-o"></i> Active Service</a></li>
          <li><a href=" {{-- route('admin.service.pending') --}} "><i class="fa fa-circle-o"></i> Pending Service </a></li>
          <li><a href=" {{-- route('admin.service.all') --}} "><i class="fa fa-circle-o"></i> All Service </a></li>
        </ul>
      </li>


      <li class="treeview">
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span> Message </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            <small class="label pull-right bg-danger"> {{ $unread_message_count }}  </small> 
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/seller/service/add"><i class="fa fa-circle-o"></i> Unread </a></li>
          <li><a href=" {{-- route('admin.service.active') --}} "><i class="fa fa-circle-o"></i>  Read </a></li>
          <li><a href=" {{-- route('admin.service.pending') --}} "><i class="fa fa-circle-o"></i> All Message </a></li>
        </ul>
      </li>



    </ul>

  </section>
  <!-- /.sidebar -->
  <div class="sidebar-footer">
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
  </div>
</aside>
