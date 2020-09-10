<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url("dashboard/") ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">wartel</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Wartel</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">



        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs"><?php echo $this->session->userdata("nama") ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <p>
                <b><?php echo $this->session->userdata("nama") ?></b>
                <small> Admin</small>
              </p>
            </li>
            <!-- menu to landing page -->
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?php echo base_url("dashboard/logout") ?>" class="btn btn-danger btn-flat">Sign out &nbsp;<i class="fa fa-sign-out"></i></a>
              </div>


            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
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
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="">
        <a href="<?php echo base_url("dashboard/") ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="">
        <a href="<?php echo base_url("dashboard/customers") ?>"">
            <i class=" fa fa-phone"></i> <span>Data Call</span>
        </a>
      </li>
      <li class="">
        <a href="<?php echo base_url("dashboard/komik") ?>">
          <i class="fa fa-users"></i> <span>Data Users</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>