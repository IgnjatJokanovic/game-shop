<header class="main-header">
    <!-- Logo -->
  <a href="{{asset("/")}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Back</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Back to website</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

     
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="{{asset("/dashboard")}}">
                <i class="fa fa-dashboard"></i> <span>User statistics</span>
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Games</span>
            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{asset('/game/insert')}}"><i class="fa fa-circle-o"></i>Insert</a></li>
          <li><a href="{{url('/game/combo')}}"><i class="fa fa-circle-o"></i>Update/Delete</a></li>
            <li><a href="{{url('/game/activity')}}"><i class="fa fa-circle-o"></i>Activity</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <span>Categories</span>
              <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{asset('/category/insert')}}"><i class="fa fa-circle-o"></i>Insert</a></li>
              <li><a href="{{asset('/category/combo')}}"><i class="fa fa-circle-o"></i>Update/Delete</a></li>
              <li><a href="{{asset('/category/activity')}}"><i class="fa fa-circle-o"></i>Activity</a></li>
            </ul>
          </li>
        <li class="treeview">
                <a href="#">
                  <span>Pages</span>
                  <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{url('/pages/combo')}}"><i class="fa fa-circle-o"></i>Update</a></li>
                <li><a href="{{url('/page/activity')}}"><i class="fa fa-circle-o"></i>Activity</a></li>
                </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>