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
    <router-link to="/admin/home" class="brand-link elevation-4">
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
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li></li>
          <li class="nav-item has-treeview mt-3">
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
         <!-- start Payment menu-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-rupee-sign"></i>
              <p>
                Payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/payment-verification"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Payment Verification
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/processing-payment-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Processing Payment List
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/approve-payment-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Approved Payment List
                  </p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/reject-payment-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Rejected Payment List
                  </p>
                </router-link>
              </li>
             </ul>
          </li>
          <!-- end Payment menu-->
          <!-- start Search menu-->
          <!--<li class="nav-item has-treeview">
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
          </li>-->
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
                <router-link to="/reports-contactlist" class="nav-link">
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
                Users 
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
              <!-- <li class="nav-item">
                <router-link to="/authenticate-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Role Authentication
                  </p>
                </router-link>
              </li> -->
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
              <li class="nav-item">
                <router-link to="/sms-list"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  SMS
                  </>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/payment-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Payment Gateway
                  </p>
                </router-link>
              </li>

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
           <!-- start Helpdesk menu-->
          <li class="nav-item">
            <a href="" class="nav-link">
             <i class="far fa-envelope"></i>
              <p>
               Helpdesk
              </p>
          </a>
         </li>
          <!-- end Helpdesk menu-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <div>
        <!-- Main content -->
         <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DashBoard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        <!-- /.content -->
    </div>


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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>



</body>
</html>
