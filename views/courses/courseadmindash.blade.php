@extends('courses.admin_master')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- <course-admin-main></course-admin-main> --}}
    <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Dasboard</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">DashBoard</li>
           </ol>
         </div>
       </div>

       <div class="row">
        <div class="col-md-12 grid-margin">
          @if(session('status'))
            <h2 class="alert-success">{{ session('status') }}</h2>
          @endif
          <div class="me-md-3 me-xl-5">
            {{-- <h2>Dasboard</h2>           --}}
            <p class="mb-md-0"></p>
            <hr>
          </div>


          @yield('dashboard-section')
         
        </div>
      </div>

     </div>
     <!-- /.container-fluid -->
   </section>
   </div>
   <!-- /.content-wrapper -->
@endsection

