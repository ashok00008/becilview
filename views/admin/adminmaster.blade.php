<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | DashBoard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link rel="icon" href="favicon.png" type="image/png">
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            </li>
            @else            
           <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
            </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                 </form>
                 </div>
                 </li>
                @endguest
        </ul>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/home" class="brand-link elevation-4">
      <img src="{{asset('assets/admin/default/admin.png')}}"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminPanel</span>
     </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <router-link to="/admin/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </router-link>
           
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-pencil-alt"></i> 
              <p>
                Job Posting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/jobs-list"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Jobs list
                  </>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/jobnotices-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Job Notice
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/result-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Result
                  </p>
                </router-link>
              </li>
              <li class="nav-header">Job Menu</li>
              <li class="nav-item">
                <router-link to="/advertisement-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Advertisement
                   </p>
                </router-link>
              </li>
              <li class="nav-item">
                 <router-link to="/jobtype-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Jobtype
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                 <router-link to="/joblocation-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Job Location
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                 <router-link to="/fee-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Fee Slab
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                 <router-link to="/joborganisation-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Organisation
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                 <router-link to="/recruiter-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Recruiter
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                 <router-link to="/designation-list" class="nav-link">
                  <i class="fas fa-cog"></i>
                  <p>
                    Designation
                  </p>
                </router-link>
              </li>
            </ul>
          </li>
         
          <!--end job posting -->
         
          <!-- start Search menu-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-search"></i>
              <p>
                Search
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/jobs-list"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Application Id
                  </>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/category-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   User Id
                  </p>
                </router-link>
              </li>
            </ul>
          </li>
          <!-- end Search menu-->
          <!-- start Report menu-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-file"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/reports-applicationlist"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Application List
                  </>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/reports-attendancelist" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Attendance List
                  </p>
                </router-link>
              </li>
               <li class="nav-item">
                <router-link to="/contact-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Contact List
                  </p>
                </router-link>
              </li>
            </ul>
          </li>
          <!-- end Report menu-->
         <!-- start user menu-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                Users & Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/adminuser-list"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Users list
                  </>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/authenticate-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Role Authentication
                  </p>
                </router-link>
              </li>
             </ul>
          </li>
          <!-- end user menu-->
          <!-- start setting menu-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-sun"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              

               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    User Setting 
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/bloodgroup-list" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Blood Group</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/category-list" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Category</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/religion-list" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Religion</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/language-list" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Language</p>
                    </router-link>
                  </li>
                </ul>
              </li>
             </ul>
          </li>
          <!-- end setting menu-->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <admin-main></admin-main>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>AdminPanel</b> 
    </div>
    <strong>Copyright &copy; 2019 </strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
