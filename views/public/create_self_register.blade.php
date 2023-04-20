<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Online registration with Naukriyan.com, it is best job portal in India. Naukriyan helps you find jobs and apply for jobs easily. Create your profile now. Best Skill Development Course, Best Drone Pilot Course"/>
  <meta name="keywords" content="Online Registration, Best Skill Development Course, Best Drone Pilot Course, Best Job Portal in India, Best Job in India, Best Job Consultancy, Career, Job Search, Apply Jobs">
  <title>Online Registration on Naukriyan.com| Best Job Portal in India | Best Skill Development Course | Best Drone Pilot Course</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .breadcrumb-item +  .breadcrumb-item::before {
       color: #fff;
   }
   td{
     color:black;
     font-weight: 500;
   }
   #loading {
     position: fixed;
     display: flex;
     justify-content: center;
     align-items: center;
     width: 100%;
     height: 100%;
     top: 0;
     left: 0;
     opacity: 0.7;
     background-color: #fff;
     z-index: 99;
   }
 
   #loading-image {
     z-index: 100;
   }

   .btn{
     color: white!important;
     padding: 8px 16px!important;
   }
   thead > tr > th::before, thead > tr > th::after{
     content: none!important;
   }
   thead{
     background-color: #1E283D !important;
     color: #ffffff !important;
   }
   .dataTables_wrapper .dataTables_length select{
     background-color: #fff;
   }
   .dataTables_wrapper .dataTables_filter input{
     background-color: #fff;
   }
 </style>
</head>
<body>


      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
        <div class="container mx-auto">
          <div class="row ">
            <div class="col-sm-10 mx-auto">
            <div class="home-tab">
                  
                <div class="container col-sm-12">

                    <div class="logo mx-auto">
                        <div class="container text-center d-flex justify-content-between mt-3">
                            <div class="col-5 col-md-3">
                                <img src="{{asset('assets/public/asset/img/becil_logo.png')}}" class="img-fluid mt-5" style="max-height: 110px;" alt="logo">
                            </div>
                            <div class="col-5 col-md-3 mt-3">
                                <img src="http://naukriyan.com/public/default_images/prakhar_logo.png" class="img-fluid mt-1" style="max-height: 80px;" alt="logo">
                            </div>
                        </div>
                    </div>
              
                    <h3 class="text-center mt-5" >Online Candidate Registration</h3><br>
                    <form action="{{ route('post_candidate_self_registration') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mx-3 ">  
                          @if (session('alert_success'))
                              <h6 class="alert alert-success">Thank you!</br></br>{{ session('alert_success') }}</h6>
                          @endif 
                          @if ($errors->any())
                            <div class="alert alert-danger mt-2 mx-1">{{ $errors->first() }}</div>
                          @endif     
                        </div>                  
                        <div class="row">   
                        <span style="font-size: 14px;font-weight: 600;color: #ee1201;">* Mandatory(required) Fields</span>
                            <div class="col-md-4">
                                <label for="" class="m-2 fw-bold">Name <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                <input name ="name" type="text" class="form-control" placeholder="Enter Name" required >
                            </div>
                            <div class="col-md-4">
                              <label for="" class="m-2 fw-bold">Email <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                              <input type="email" class="form-control" name="email" id="" placeholder="Enter Email" required>
                            </div>  
                            <div class="col-md-4">
                              <label for="" class="m-2 fw-bold">Contact</label><br>
                              <input type="text" class="form-control number_validation" maxlength="10" name="contact" id="" placeholder="Enter Contact" >
                            </div> 
                              
                        </div>       
                        <div class="row">  
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">Gender <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                            <select id="" name="gender" class="form-control" style="background-color:white;" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>  
                          </div>  
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">Category <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></span></label><br>
                              <select name="category" id="category" class="form-control" style="background-color:white;" required>
                                  <option value="">Select Category</option>
                                  <option value="Drone Pilot">Drone Pilot</option>
                                  <option value="Skill Development">Skill Development</option>
                              </select>    
                          </div> 
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">Qualification <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></span></label><br>
                              <select name="qualification" id="qualification" class="form-control" style="background-color:white;" required>
                                  <option value="">Select Qualification</option>
                                    @foreach ($qualifications as $qual)
                                      <option value="{{ $qual->qualification }}">{{ $qual->qualification }}</option>
                                    @endforeach 
                              </select>    
                          </div>   
                        </div>
                        <div class="row">  
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">Resume</label><br>
                            <input type="file" class="form-control" name="resume_file" accept=".doc, .docx, .pdf" placeholder="Enter Contact" >
                          </div>
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">State <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                            <select name="state" id="state_id" class="form-control"
                                style="background-color:white;" required>
                                <option value="">Select State Name</option>
                                @foreach ($state as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach 
                            </select> 
                          </div> 
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">District <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                            <select name="district" id="district_id" class="form-control"
                                style="background-color:white;" required>
                                <option value="">Select District Name</option> 
                            </select>   
                          </div>     
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">City/Village</label><br>
                            <input type="text" class="form-control" name="city" id="" placeholder="Enter City" >
                          </div>   
                          <div class="col-md-4">
                            <label for="" class="m-2 fw-bold">Pincode</label><br>
                            <input type="text" class="form-control number_validation" maxlength="6" name="pincode" id="" placeholder="Enter Pincode" >
                          </div> 
                          <div class="col-md-8">
                            <label for="" class="m-2 fw-bold">Address</label><br>
                            <textarea name="address" class="form-control" placeholder="Enter complete address here"></textarea>
                          </div>

                        </div><br>
                        
                    
                        <div class="row">
                            <span class="fw-bold"><input type="checkbox" id="checkbox" name="checkbox" required > <span style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span> I here by declare that the information provided is true and correct.</span><br>                
                        </div><br>
                            <br>
                        <button type="submit" id="submit" disabled class="text-light btn btn-success btn-icon-text" id="reg_submit">
                                    <i class="fa fa-arrow-circle-right fa-lg"></i>
                                    &nbsp;Submit
                            </button>
                    </form>
                </div> 
            </div>


         
        
      
        <footer class="footer d-print-none mt-5">
          <div class=" d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © {{ date('Y') }} <a href="">{{ env('APP_NAME') }}</a> All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
</div>
</div>
      <div id="loading">
        <img id="loading-image" src="{{ asset('images/processing.gif') }}" alt="Loading..."/>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">

             
            $(document).ready(function () {

                   

                    $('.number_validation').on('keyup', function () {
                        if (/\D/g.test(this.value))
                        this.value = this.value.replace(/\D/g,'')
                    });    
                    
                    $('#checkbox').on('click', function () {
                        if($('#checkbox').prop("checked")){
                            $('#submit').prop('disabled', false);
                        } else{
                            $('#submit').prop('disabled', true);
                        }
                    });  

                    $('#state_id').on('change', function () {
                        var idState = this.value;
                        $("#district_id").html('');
                        $.ajax({
                            url: "{{url('fetch_district')}}",
                            type: "POST",
                            data: {
                                state_id: idState,
                                _token: '{{csrf_token()}}'
                            },
                            dataType: 'json',
                            success: function (result) {
                                $('#district_id').html('<option value="">Select District</option>');
                                $.each(result, function (key, value) {
                                    $("#district_id").append('<option value="' + value
                                        .id + '">' + value.district_name + '</option>');
                                });
                            }
                        });
                    });
               
            });
        </script>

      <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("form").on("submit", function(){
    $("#loading").show();
  });
  $(window).on('load', function() {
    $('#loading').hide();
  })
  </script>

