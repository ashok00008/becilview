
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BECIL | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <link href="{{asset('assets/public/asset/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    
</head>

<body>
<div id="app">
    <div id="wrapper" >
      <div class="col-sm-12 gh " >
       <div class="col-sm-8 ">
        <img src="image/becil_logo.png"  class="logo1">
       </div>
      <div class="col-sm-4 ">
       <img src="image/naukariyaan.png"  class="logo2">
      </div>
    </div>
     <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->
     {{--Vue Routing--}}
    <home-main></home-main>
  
  <!-- Left side column. contains the logo and sidebar -->

  <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side" style=" position:static;"> <!-- Left Side -->
   <h2 class="hidden-xs hidden-sm"><center>Main Navigation</center></h2>
    <div class="yu">
    <ul class="p0 category_item mob-st" >
     <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
      Vacancies By Location</a></li>
      <li>
      <a href="" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
      Vacancies By Organization</a></li>
      <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Form Download</a></li>
     <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Announcement</a></li>
      <li>
      <a href="#" target="_blank " title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Cancel Or Reschedule</a></li>
    </ul>
      </div> <!--  yu -->
      </div>      
      <!-- End left side --> 
    </div>  
    <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side1" style=" position:static;"> <!-- Left Side -->
        
        <h2 class="hidden-xs hidden-sm"><center>Active Vacancies</center></h2>
        <div class="yu">
        <ul class="p0 category_item mob-st">
    
        
          <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Sr. Software Developer</a></li>
          
        
          <li>
      <a href="" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Security Expert</a></li>
          
        
          <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Network Administrator</a></li>
     <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
   GIS Analyst</a></li>
     <li>
      <a href="#" target="_blank " title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Un-Skilled Manpower as per specification</a></li>
      <li>
      <a href="#" target="_blank " title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Un-Skilled Manpower as per specification</a></li>
     <li>
      <a href="#" target="_blank " title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Un-Skilled Manpower as per specification</a></li>
     <li>
      <a href="#" target="_blank " title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Un-Skilled Manpower as per specification</a></li>
     </ul>
     </div>
  </div>      <!-- End left side --> 
  </div>  
  </div>
  <!-- middle -->

     <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side" style=" position:static;"> <!-- Left Side -->
      <div class="yu">
        <div class="login-box-body">
    <p class="login-box-msg"> <h2 class="vb"><center>LOGIN</center></h2></p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn bg-navy btn-flat margin">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  </div>
  <!-- /.login-box-body --> <!-- End left side --> 

  </div>
    </div>  

    <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side1" style="left: 400px;"> <!-- Left Side -->
        
        <h2 class="hidden-xs hidden-sm"><center>NOTICE</center></h2>
        <div class="yu">
        <ul class="p0 category_item mob-st">
    
        
          <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Sr. Software Developer</a></li>
          
        
          <li>
      <a href="" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
     Security Expert</a></li>
          
        
          <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Network Administrator</a></li>
          
        
          <li>
      <a href="#" target="" title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
   GIS Analyst</a></li>
       <li>
      <a href="#" target="_blank " title="Events" class="hvr-underline-from-left"><i class="fa fa-angle-right"></i>
    Un-Skilled Manpower as per specification</a></li>
          
   </ul>
   </div>
  </div>      <!-- End left side --> 
   
  <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side"> 
    <!-- Left Side -->
   <div class="yu"> 
    
  <div class="register-box-body">
    <p class="login-box-msg"><h2 class="vb"><center>SIGNUP</center></h2></p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="First Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Last  Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn bg-navy btn-flat margin">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->



</div>
</div>

    </div>
</div>

</body>
</html>
