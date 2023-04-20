@extends('courses.admin_master')
@section('main-content')
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
    {{-- <div class="main-panel "> --}}
        <div class="content-wrapper" style="overflow: hidden; padding: 10px 20px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">

                        <div class="container col-sm-12">
                            {{-- <div class="col-sm-4 ml-2 mb-4">
                                <ol class="breadcrumb float-sm-right" style="background-color: #6b8ed6;border-radius: 5px;">
                                    <li class="breadcrumb-item"><a style="color:#fff; text-decoration: none;"
                                            href="{{ route('home') }}" aria-expanded="false" aria-controls="ui-basic"><i
                                                class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item"><a
                                            style="color:#fff; text-decoration: none;"data-bs-toggle="collapse"
                                            href="#ui-basic3" aria-expanded="false"
                                            aria-controls="ui-basic3">Registration</a></li>
                                    <li class="breadcrumb-item active" ><a  style="color:#fff; text-decoration: none;" href="{{ route('admission_list')}}" ><b>Admission List</b></a>
                                    </li>
                                </ol>
                            </div> --}}
                            <h3 class="text-center font-weight-bold mt-3">Candidate Application Form</h3><br>
                            <form action="{{ url('/course-admin/admission-form-submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-5">
                                    @if (session('alert_status'))
                                        <h6 class="alert alert-success">{{ session('alert_status') }}</h6>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                                    @endif
                                </div>
                                <div class="row w-25 image-box">
                                    <div class="logoContainer">
                                        <img src="{{ asset('assets/public/asset/img/no-profile-image.png') }}">
                                    </div>
                                    <div class="fileContainer sprite">
                                        <input type="file" id="user-image" value="Choose File" accept="image/*"
                                            name="user-image">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-md-6">
                        <label for="" class="m-2">Name of Project</label><br>
                        <select name="project" id="" class="form-control" style="background-color:white;">
                       
                        </select>
                    </div>   -->
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Centre Name <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                                @if($data->centre)
                                                    <input name="centre_id" type="hidden" value="{{ $data->centre->id }}"> 
                                                @endif
                                        <select name="centre_id" id="" class="form-control"
                                        {{ $data->centre ? 'disabled' : '' }} required>
                                            <option value="">Select Centre</option>
                                            @if($data->centre)
                                                @foreach ($centres as $centre)
                                                    <option value="{{ $centre->id }}" {{ $data->centre->id==$centre->id ? 'selected' : '' }}>{{ $centre->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($centres as $centre)
                                                    <option value="{{ $centre->id }}">{{ $centre->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="" class="m-2">Trade <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input name="trade" id="course_id" required type="text" placeholder="Enter Trade"
                                            class="form-control" value="{{ $data->getCourseDetails->course_name }}" readonly style="cursor: not-allowed;"> 
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <label for="" class="m-2">Training Duration<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">** (In
                                                months)</span></label><br>
                                        <input type="text" required name="duration"
                                            class="number_validation form-control" placeholder="Enter Training Duration">
                                    </div> --}}
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Registration ID<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input name="reg_id" type="hidden" value="{{ $data->id }}"> 
                                        <select name="" id="reg_id" class="form-control"
                                            style="cursor: not-allowed;" required disabled>
                                            <option value="">Select Registration ID</option>
                                            @foreach ($reg_can as $reg_can)
                                                <option value="{{ $reg_can->id }}" {{ $data->id==$reg_can->id ? 'selected' : '' }}>{{ $reg_can->mit_code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br> <br>
                                <h5>Candidate Profile</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Name of Candidates <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" required class="form-control" name="name" id="name_of_can"
                                            placeholder="Enter Candidate Name" value="{{ $data->name }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Contact <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" class="number_validation form-control" name="contact"
                                            id="contact" required placeholder="Enter Contact " maxlength="10" value="{{ $data->contact }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Email <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email" value="{{ $data->email }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Aadhar No. <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" required class="form-control" name="identity_no"
                                            id="identity_no" placeholder="Enter Aadhar No." value="{{ $data->id_proof_no }}">
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
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Date of Birth  <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="date" required class="form-control" name="dob"
                                            max="{{ date('Y-m-d') }}" id="dob">
                                    </div>
                                </div><br>

                                <div class="row">
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">State <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
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
                                            <option value="">Select Category</option>
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
                                        <label for="" class="m-2">Highest Education Qualification <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <select name="qualification" id="qualification" class="form-control"
                                            style="background-color:white;" required >
                                            <option value="">Select Qualification</option>
                                            <option value="10th/12th" {{ $data->qualification=="10th/12th" ? 'selected' : '' }}>10th/12th</option>
                                            <option value="Under Graduation" {{ $data->qualification=="Under Graduation" ? 'selected' : '' }}>Under Graduation</option>
                                            <option value="Graduation" {{ $data->qualification=="Graduation" ? 'selected' : '' }}>Graduation</option>
                                            <option value="Post Graduation" {{ $data->qualification=="Post Graduation" ? 'selected' : '' }}>Post Graduation</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Unversity/Board <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" name="can_board" class="form-control"
                                            placeholder="Enter Board/University" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Passing Year <span
                                            style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input type="text" name="can_yop"
                                            class="number_validation form-control"style="padding: 8px;"
                                            placeholder="Enter year of passing" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Percentage/Grade <span
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
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Covid Vaccination Type</label><br>
                                        <select name="covid_dose" id="covid_dose" class="form-control"
                                            style="background-color:white;">
                                            <option value="Not Selected">Select Dose</option>
                                            <option value="1st Dose">1st Dose</option>
                                            <option value="2nd Dose">2nd Dose</option>
                                            <option value="Booster Dose">Booster Dose</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Vaccination Document <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">** (Document size
                                                should be less than 1MB)</span></label><br>
                                        <input type="file" name="covid_doc" accept="application/pdf"
                                            class="form-control " style="background-color:white;">
                                    </div>
                                </div><br>

                                
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="padding-right: 200px;">Document Type</th>
                                                    <th style="padding-right: 215px;">Document  <span
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
                                                @if($data->type_of_doc != 'Aadhar Card')
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
                                                <input type="hidden" name="aadhar_id" value="{{ $data->id_proof_doc }}">
                                                @endif
                                            </tbody>
                                        </table>




                                    </div>
                                </div>
                                <br>
                                <hr>
                                

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h4 for="" class="mt-2">Attach Parent Consent Form <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">(Document size
                                                should be less than 1MB)</span></h4><br>
                                        <div class="row">
                                            {{-- <div class="col-md-4">
                                                <span class="btn btn-sm btn-info" onclick="frames['frame'].print()">Download
                                                    Parent Consent Form</span>
                                            </div> --}}
                                            <div class="col-md-8">
                                                <input type="file" name="parent_consent_doc"
                                                    accept="image/jpeg,image/gif,image/png,application/pdf"
                                                    class="form-control " style="background-color:white;">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row my-3">
                                    <input type="checkbox" class="ml-2" style="width: 20px;" name="self_declaration" id="self_declaration" required><label for="self_declaration" class="ml-2 align-items-middle" style="margin-top: 6px;"> I hereby declare that all the above information is correct to best of my knowledge</label>
                                </div>
                                <button type="submit" class="text-light btn btn-lg btn-success btn-icon-text">
                                    <i class="ti-upload btn-icon-prepend"></i>
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <iframe src="" id="parent_iframe" style="display:none;" name="frame"></iframe>
            </div>
        </div>
    {{-- </div> --}}

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {

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
            @endsection

            
@section('styles')
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
@endsection

