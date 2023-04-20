<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link rel="icon" href="favicon.png" type="image/png">
    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Open+Sans:300,400,700', 'Bree Serif:300,400,500,700,900']
            }
        });
    </script>

    <!-- css -->

    <link href="{{asset('assets/public/asset/css/bootstrap-responsive.css')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .image-box {
            position: absolute;
            top: -24px;
            right: 10px;
        }
    
        .logoContainer {
            width: 140px;
            height: 151px;
            margin: 15px auto 8px auto;
            padding: 5px 1px 1px 1px;
            text-align: center;
            line-height: 120px;
            border: 2px solid black;
            border-radius: 5px;
        }
    
        .logoContainer img {
            max-width: 100%;
            max-height: 100%;
        }
    
        .fileContainer {
            width: 290px;
            height: 31px;
            overflow: hidden;
            /* position:relative; */
            font-size: 16px;
            line-height: 31px;
            color: #434343;
            /* padding: 0px 41px 0 53px; */
            margin: 0 auto 5px auto;
            cursor: pointer !important;
        }
    </style>

</head>

<body>
<div id="app">
    <div id="wrapper">
        <!-- start header -->
        <div class="hidden-top">
            <div class="hidden-top-inner container">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <img src="{{asset('assets/public/asset/img/becil_logo.png')}}" class="logo1">
                    </div>
                    <div class="col-sm-5 col-6">
                        <img src="{{asset('assets/public/asset/img/naukariyaan.png')}}" class="logo2">
                    </div>
                </div>
            </div>
        </div>
    </div>

  
        <div class="container"  style="padding: 0px 10px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">

                        <div class="container col-sm-12">
                            
                        @if(session('invalid'))
                    
                        <h2 class="text-center font-weight-bold my-3">{{ session('invalid') }}</h2>
                                    

                    @elseif(session('already'))

                        <h2 class="text-center font-weight-bold my-3">{{ session('already') }}</h2>


                    @else
                            <h3 class="text-center font-weight-bold my-3">Candidate Application Form</h3>
                            <div class="underline mx-auto"></div>
                            <form action="{{ url('/admission') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-5">

                                    @if (session('alert_status'))
                                        <h6 class="alert alert-success">{{ session('alert_status') }}</h6>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                                    @endif

                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">  
                                        <label for="" class="m-2">Registration ID <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="reg_id" id=""  class="form-control" required>                                       
                                            <option selected value="{{ $registerDetail->id }}">{{ $registerDetail->mit_code }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Centre Name <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="centre_id" id="" class="form-control" required>
                                            <option value="">Select Centre</option>
                                            @if($registerDetail->centre)
                                                @foreach ($centres as $centre)
                                                    <option value="{{ $centre->id }}" {{ $registerDetail->centre->id==$centre->id ? 'selected' : '' }}>{{ $centre->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="2">Online Centre</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="" class="m-2">Trade <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input name="trade" id="course_id" readonly value="{{ $registerDetail->courseName->course_name }}" placeholder="Enter Trade"
                                            class="form-control">
                                    </div>
                                    <div class="row w-25 image-box">
                                        <div class="logoContainer">
                                            <img src="{{ asset('assets/public/asset/img/no-profile-image.png') }}" alt="Profile Image">
                                        </div>
                                        <div class="fileContainer sprite">
                                            <input type="file" id="user-image" value="Choose File" accept="image/*"
                                                name="user-image" required>
                                        </div>
                                    </div>
                                </div><br> <br>
                                <h5>Candidate Profile</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Name of Candidates <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" readonly value="{{ $registerDetail->name }}" class="form-control" name="name" id="name_of_can"
                                            placeholder="Enter Candidate Name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Contact <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" class="number_validation form-control" name="contact"
                                            id="contact" readonly value="{{ $registerDetail->contact }}" placeholder="Enter Contact ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Email <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="email" class="form-control" name="email" id="email" readonly value="{{ $registerDetail->email }}"
                                            placeholder="Enter Email" required>
                                    </div>
                                    
                                        <div class="col-md-3">
                                            <label for="" class="m-2">Aadhar No. <span
                                                    style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                            <input type="text"  required class="form-control number_validation" name="identity_no"
                                                id="identity_no" maxlength="12" minlength="12" placeholder="Enter Aadhar No.">
                                        </div>
                                    
                                   
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Father's Name <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" required class="form-control" name="father_name"
                                            id="" placeholder="Enter Father's Name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Mother's Name <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" required class="form-control" name="mother_name"
                                            id="" placeholder="Enter Mother's Name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Gender <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="gender" id="can_gender" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="Not Selected">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Date of Birth <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="date" required class="form-control"  name="dob" 
                                            max="<?= date('Y-m-d',strtotime("-16 years")) ?>"  min="<?= date('Y-m-d',strtotime("-60 years")) ?>" id="dob">
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">State <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        {{-- <select name="state_id_add" id="state_id_add" class="selectpicker" data-live-search="true" --}}
                                        <select name="state_id_add" id="state_id_add" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="">Select State</option>
                                            @foreach ($state as $sta)
                                                <option value="{{ $sta->id }}">{{ $sta->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">District <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="district_id_add" id="district_id_add" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Pincode <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" name="pincode_add" class="form-control"
                                            placeholder="Enter Pincode" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Chronic Disease <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="chronic_disease" id="" class="form-control" style="background-color:white;" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>   
                                    </div>      
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Category <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="category" id="category" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="Not Selected">Select Category</option>
                                            <option value="general">General</option>
                                            <option value="sc">SC</option>
                                            <option value="st">ST</option>
                                            <option value="obc">OBC</option>
                                            <option value="minority">Minority</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="display: none;" id="cat_doc_div">
                                        <label for="" class="m-2">Category Document <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">** (Document size
                                                should be less than 1MB)</span></label><br>
                                        <input type="file" name="category_doc" accept="application/pdf"
                                            class="form-control " style="background-color:white;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="m-2">Address <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label>
                                        <textarea name="address" id="" cols="30" rows="5" class="form-control" placeholder="Enter complete address" required></textarea>
                                    </div>
                                </div><br> 

                                <h5>General Information</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Facebook User Id</label><br>
                                        <input type="text" name="facebook_user" class="form-control"
                                            placeholder="Facebook User id">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">LinkedIn User Id</label><br>
                                        <input type="text" name="linkedin_user" class="form-control"
                                            placeholder="LinkedIn User id">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Marital Status</label><br>
                                        <select name="marital_status" id="" class="form-control"
                                            style="background-color:white;">
                                            <option value="Unmarried">Unmarried</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Current Status</label><br>
                                        <select name="current_status" id="" class="form-control"
                                            style="background-color:white;">
                                            <option value="Student">Student</option>
                                            <option value="Working">Working</option>
                                        </select>
                                    </div>
                                </div><br><br>


                                <h5>Education Qualification</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Education Qualification <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="qualification" id="qualification" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="">Select Qualification</option>
                                            <option value="10th/12th" {{ $registerDetail->qualification == '10th/12th' ? 'selected': '' }}>10th/12th</option>
                                            <option value="Under Graduation" {{ $registerDetail->qualification == 'Under Graduation' ? 'selected': '' }}>Under Graduation</option>
                                            <option value="Graduation"{{ $registerDetail->qualification == 'Graduation' ? 'selected': '' }}>Graduation</option>
                                            <option value="Post Graduation" {{ $registerDetail->qualification == 'Post Graduation' ? 'selected': '' }}>Post Graduation</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Unversity/Board<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" name="can_board" class="form-control"
                                            placeholder="Enter Board/University" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Passing Year<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" name="can_yop"
                                            class="number_validation form-control"style="padding: 8px;"
                                            placeholder="Enter year of passing" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Percentage/Grade<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" name="can_per" style="padding: 8px;" class="form-control"
                                            placeholder="Enter percentage" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Technical Qualification</label><br>
                                        <input type="text" name="tech_qualification" style="padding: 8px;"
                                            class="form-control" placeholder="Enter Technical Qualification">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Previously Undergone Skill Training</label><br>
                                        <select name="prev_skill_tra" id="" class="form-control"
                                            style="background-color:white;">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Work Experience</label><br>
                                        <select name="can_work_exp" id="" class="form-control"
                                            style="background-color:white;">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div><br><br>

                                <h5>Attachmnet Fields <span
                                        style="font-size: 14px;font-weight: 600;color: #ee1201;">**(All Documents size
                                        should be less than 1MB)</span></h5>
                                <hr>
                                
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="padding-right: 200px;width:40%;">Covid Vaccination Type</th>
                                                    <th style="padding-right: 215px;width:60%;">Covid Test Document  <span
                                                        style="font-size: 14px;font-weight: 600;color: #ee1201;">** (Document size
                                                        should be less than 1MB)</span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="doc-div">
                                                <tr>
                                                    <td>
                                                        <select name="covid_dose" id="covid_dose" class="form-control"
                                                        style="background-color:white;">
                                                        <option value="Not Selected">Select Dose</option>
                                                        <option value="1st Dose">1st Dose</option>
                                                        <option value="2nd Dose">2nd Dose</option>
                                                        <option value="Booster Dose">Booster Dose</option>
                                                    </select>
                                                    </td>
                                                    <td>
                                                        <input type="file" name="covid_doc" accept="application/pdf"
                                                        class="form-control " style="background-color:white;">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="padding-right: 200px;width:40%;">Document Type</th>
                                                    <th style="padding-right: 215px;width:60%;">Document  <span
                                                        style="font-size: 14px;font-weight: 600;color: #ee1201;">** (Document size
                                                        should be less than 1MB)</span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="doc-div">
                                                <tr>
                                                    <td>
                                                        Education Document
                                                    </td>
                                                    <td>
                                                        <input type="file" name="education_doc" accept="application/pdf"
                                                            required class="form-control "
                                                            style="background-color:white;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Signature Document
                                                    </td>
                                                    <td>
                                                        <input type="file" name="signature_doc" accept="image/*"
                                                            required class="form-control "
                                                            style="background-color:white;">
                                                    </td>
                                                </tr>
                                                @if($registerDetail->type_of_doc != 'Aadhar Card')
                                                <tr>
                                                    <td>
                                                        Aadhar Card
                                                    </td>
                                                    <td>
                                                        <input type="file" name="aadhar_doc" accept="application/pdf"
                                                            required class="form-control "
                                                            style="background-color:white;">
                                                    </td>
                                                </tr>
                                                @else
                                                <input type="hidden" name="aadhar_id" value="{{ $registerDetail->id_proof_doc }}">
                                                @endif
                                            </tbody>
                                        </table>




                                    </div>
                                </div>
                               
                                <br>
                                <hr>

                             

                                <button type="submit" class="text-light btn btn-lg btn-success btn-icon-text">
                                    <i class="ti-upload btn-icon-prepend"></i>
                                    Submit
                                </button>
                            </form>
                    @endif
                        </div>
                    </div>
                </div>
                <iframe src="" id="parent_iframe" style="display:none;" name="frame"></iframe>
            </div>
        </div>
    </div>

               
</div>
</div>
</body>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.selectpicker').selectpicker();
        $('#state_id_add').parent().css('width','100%');
        //file input preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.logoContainer img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#user-image").change(function() {
            readURL(this);
        });


        $('.number_validation').on('keyup', function() {
            if (/\D/g.test(this.value))
                this.value = this.value.replace(/\D/g, '')
        });

        
        $('#category').change(function(){
        if($(this).val()!="general"){
            $('#cat_doc_div').css("display","block");
            $('#cat_doc_div input').prop("required",true);
            
        }
        else{
            $('#cat_doc_div').css("display","none");
            $('#cat_doc_div input').prop("required",false);

        }
        });
    });

    $(document).ready(function() {
        $('#reg_id').on('change', function() {
            var reg_id = this.value;
            $.ajax({
                url: "{{ url('course-admin/fetch_regdata') }}",
                type: "POST",
                data: {
                    reg_id: reg_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#name_of_can").val(result.name);
                    var can_dob = new Date(result.date_of_birth);
                    // var dob_format = can_dob.toISOString().split( "T" );
                    // $("#dob").val(dob_format[0]);
                    // $("#dob").val(moment(can_dob).format("YYYY-MM-DD"));
                    // $("#age").val(result.age);
                    $("#contact").val(result.contact);
                    $("#email").val(result.email);
                    $("#qualification").val(result.qualification);
                    $("#course_id").val(result.get_course_details.course_name);
                    if(result.type_of_doc=='Aadhar Card'){
                        $("#identity_no").val(result.id_proof_no);
                    }
                    // $('#parent_iframe').attr('src', 'parent_consent_form_print?id=' +
                    //     reg_id);
                }
            });
        });

        function getDistrict(idState, distid) {
            $.ajax({
                url: "{{ url('course-admin/fetch_district') }}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $(distid).html('<option value="">Select District</option>');
                    $.each(result, function(key, value) {
                        $(distid).append('<option value="' + value
                            .id + '">' + value.district_name + '</option>');
                    });
                }
            });
        }

        $('#state_id').on('change', function() {
            var idState = this.value;
            $("#district_id").html('');
            var result = getDistrict(idState, '#district_id');
        });

        $('#state_id_add').on('change', function() {
            var idState = this.value;
            $("#district_id_add").html('');
            var result = getDistrict(idState, '#district_id_add');
        });


    });
</script>




<script>


    $(function () {

        $("input").focus(function () {
            $(this).prev("label").hide(); //hide label of clicked item
        }).blur(function () {
            $(this).prev("label").show();
        });

    });

    $(function () {
        setTimeout(function () {
            $("#hideDiv").slideUp(1500);
        }, 5000)

    })
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            } else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });


</script>
</body>
</html>



