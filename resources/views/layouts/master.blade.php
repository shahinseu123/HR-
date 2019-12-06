<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SuperHRM</title>

  <link rel="stylesheet" href="/css/app.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
       
      </ul>
    

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" v-model="search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/student.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><span class="green font-bold">S</span>-<span class="red">HResource</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/woman.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          {{Auth::user()->name}}
          <p class="red">{{Auth::user()->type}}</p>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt custom"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>
          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog cyan"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/user" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>User's</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/vendor" class="nav-link">
                  <i class="fab fa-intercom pink nav-icon"></i>
                  <p>Vendor's</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/customer" class="nav-link">
                  <i class="fab fa-sellsy yellow nav-icon"></i>
                  <p>Customer's</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/category" class="nav-link">
                  <i class="fas fa-caret-square-up green nav-icon"></i>
                  <p>Category</p>
                </router-link>
              </li>
            </ul>
           @endcan
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-paper-plane teal"></i>
              <p>
                Employee Sheet
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/generalschedule" class="nav-link">
                  <i class="fas fa-user lightgreen nav-icon"></i>
                  <p>General Schedule</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/department" class="nav-link">
              <i class="nav-icon pink fas fa-exclamation-circle"></i>
              <p>
               Department
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/employee" class="nav-link">
              <i class="nav-icon pink fas fa-exclamation-circle"></i>
              <p>
               Employee
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>
           
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon yellow fas fa-dollar-sign"></i>
              <p>
                Expenses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/user" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Selary</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon green fab fa-critical-role"></i>
              <p>
                Payroll Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/user" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>User</p>
                </router-link>
              </li>
            </ul>
          </li>
          <!-- HR  -->
          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon orange fas fa-suitcase-rolling"></i>
              <p>
              Manage Leave
                <i class="right fas fa-angle-left"></i>
              </p>
              <span v-show="leavependingleng > 0" class="right badge badge-danger"><span>@{{leavependingleng}}</span></span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/pending-req-for-super-admin" class="nav-link">
                  <i class="fas fa-recycle teal nav-icon"></i>
                  <p>Pending Request's</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/approved-req-for-super-admin" class="nav-link">
                  <i class="fas fa-thumbs-up green nav-icon"></i>
                  <p>Request's Approved</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/discurded-req-for-super-admin" class="nav-link">
                  <i class="fas fa-times red cyne nav-icon"></i>
                  <p>Request's Discurded</p>
                </router-link>
              </li>
            </ul>
          @endcan
          <!-- admin  -->
          @can('isAuthor')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon orange fas fa-suitcase-rolling"></i>
              <p>
                Manage Request
                <!-- <span class="right badge badge-danger">New</span> -->
                <i class="right fas fa-angle-left"></i>
              </p>
              <span v-show="leavependinglengAdmin > 0" class="right badge badge-danger"><span>@{{leavependinglengAdmin}}</span></span>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/pending-req-for-admin" class="nav-link">
                <i class="fas fa-recycle teal nav-icon"></i>
                  <p>Pending Request's</p>
                    <!-- <span class="right badge badge-danger">New</span> -->
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/approved-req-for-admin" class="nav-link">
                <i class="fas fa-thumbs-up green nav-icon"></i>
                  <p>Request's Approved</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/discurded-req-for-admin" class="nav-link">
                <i class="fas fa-times red cyne nav-icon"></i>
                  <p>Request's Discurded</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endcan
          <li class="nav-item">
            <router-link to="/training" class="nav-link">
              <i class="fas fa-train pink nav-icon fas fa-th"></i>
              <p>
                Training
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/performence" class="nav-link">
              <i class="fas fa-theater-masks purple nav-icon fas fa-th"></i>
              <p>
                Performence
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>
          @can('isAdmin')
          <li class="nav-item">
            <router-link to="/api" class="nav-link">
              <i class="fas fa-user-roll indigo nav-icon fas fa-th"></i>
              <p>
                API
                 <!-- <span class="right badge badge-danger">New</span>  -->
              </p>
            </router-link>
          </li>
          @endcan
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon blue fas fa-cogs"></i>
              <p>
                Self Management
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
              <span v-show="relieverLeavelen > 0" class="right badge badge-danger"><span>@{{relieverLeavelen}}</span></span>
              <span v-show="recommenderLeavelen > 0" class="right badge badge-danger"><span>@{{recommenderLeavelen}}</span></span>
            </router-link>
          </li>
          <li class="nav-item">
          <li class="nav-item">
            <router-link to="/holidays" class="nav-link">
              <i class="nav-icon teal fas fa-calendar-week"></i>
              <p>
                Holidays
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/notice" class="nav-link">
              <i class="nav-icon pink fas fa-exclamation-circle"></i>
              <p>
                Notice Board
                <span class="right badge badge-danger">New</span>
              </p>
            </router-link>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <i class="fas fa-power-off nav-icon red"></i>
              <p>
                  {{ __('Logout') }}
              </p>
           </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
  </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <router-view></router-view>


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
  @auth
    window.user = @json(auth()->user())
  @endauth
</script>

<script src="/js/app.js"></script>
</body>
</html>
