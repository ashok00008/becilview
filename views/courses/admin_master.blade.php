<!DOCTYPE html>
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | DashBoard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.png" type="image/png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   @yield('styles')
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

            @guest('course-admin')
            <li class="nav-item">
            <a class="nav-link" href="{{ route('course-admin.login') }}">{{ __('Login') }}</a>
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
                 <a class="dropdown-item" href="{{ route('course-admin.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('course-admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                 </form>
                  <a class="dropdown-item" href="">
                    <router-link :to="`/change/password`">
                    Change Password
                    </router-link>
               </a>
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
    <router-link to="/admin/home" class="brand-link elevation-4">
      <img src="{{asset('assets/admin/default/admin.png')}}"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{Auth::user('course-admin')->name}}</span>
     </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li></li>
          <li class="nav-item has-treeview mt-3">
            <a href="/course-admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
           
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-pencil-alt"></i> 
              <p>
                Course Candidates
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{ url('course-admin/registration') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    List
                   </p>
                </a>
              </li>
              
            </ul>
          </li>
          
         
          <li class="nav-item has-treeview">
            <a href="{{ url('course-admin/total-count-location-wise') }}" class="nav-link">
              <i class="fas fa-pencil-alt"></i> 
                &nbsp; Summary Report For <br>&nbsp; &emsp; Registration
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('course-admin/index') }}" class="nav-link">
              <i class="fas fa-pencil-alt"></i> 
                 <br>&nbsp; &emsp; update
            </a>
          </li>

          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-pencil-alt"></i> 
              <p>
                Admission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{ url('course-admin/admission-form') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Admission Form
                   </p>
                </a>
              </li>
              
            </ul>
          </li> --}}
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('main-content')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>AdminPanel</b> 
    </div>
    <strong>Copyright &copy; 2020 </strong> All rights
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

<script src="{{ asset('js/datatable/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/datatable/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('js/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/datatable/buttons.print.min.js') }}"></script>

@yield('scripts')

</body>
</html>
