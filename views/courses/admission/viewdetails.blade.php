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
                            <h3 class="text-center font-weight-bold mt-3">View Candidate Application Form Details</h3><br>
                            <?php
                            $user_image = $category_doc = $covid_doc = $aadhar_doc = $parent_consent = '';
                            foreach ($data->document as $doc){
                                if($doc->doc_type=='user-image'){
                                    $user_image = $doc->doc_file;
                                }
                                else if($doc->doc_type=='category-doc'){
                                    $category_doc = $doc->doc_file;
                                }
                                else if($doc->doc_type=='covid-doc'){
                                    $covid_doc = $doc->doc_file;
                                }
                                else if($doc->doc_type=='aadhar-doc'){
                                    $aadhar_doc = $doc->doc_file;
                                }
                                else if($doc->doc_type=='parent-consent'){
                                    $parent_consent = $doc->doc_file;
                                }
                            }
                            ?>
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
                                        @if ($user_image)
                                        <img src="{{ asset('/documents/course_documents/user-image/'.$user_image) }}">
                                        <a href="{{ asset('/documents/course_documents/user-image/'.$user_image) }}" target="_blank" class="btn btn-primary">Download File</a>
                                        @else
                                            <img src="{{ asset('assets/public/asset/img/no-profile-image.png') }}">
                                        @endif
                                        
                                    </div>
                                    <div class="fileContainer sprite">
                                        {{-- <input type="file" id="user-image" value="Choose File" accept="image/*"
                                            name="user-image"> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-md-6">
                        <label for="" class="m-2">Name of Project</label><br>
                        <select name="project" id="" class="form-control" style="background-color:white;">
                       
                        </select>
                    </div>   -->
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Centre Name</label><br>
                                        <select name="centre_id" id="" class="form-control"
                                             disabled>
                                            <option value="">Select Centre</option>
                                            @foreach ($centres as $centre)
                                                <option value="{{ $centre->id }}" {{ $data->centre->id==$centre->id ? 'selected' : '' }}>{{ $centre->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="" class="m-2">Trade</label><br>
                                        <input name="trade" id="course_id"  type="text" placeholder="Enter Trade"
                                            class="form-control" value="{{ $data->getCourseDetails->course_name }}" readonly style="cursor: not-allowed;"> 
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <label for="" class="m-2">Training Duration<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">** (In
                                                months)</span></label><br>
                                        <input type="text"  name="duration"
                                            class="number_validation form-control" placeholder="Enter Training Duration">
                                    </div> --}}
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Registration ID<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span></label><br>
                                        <input name="reg_id" type="hidden" value="{{ $data->id }}"> 
                                        <select name="" id="reg_id" class="form-control"
                                            style="cursor: not-allowed;" disabled>
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
                                        <label for="" class="m-2">Name of Candidates</label><br>
                                        <input type="text"  class="form-control" name="name" id="name_of_can"
                                            placeholder="Enter Candidate Name" value="{{ $data->name }}" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Contact</label><br>
                                        <input type="text" class="number_validation form-control" name="contact"
                                            id="contact"  placeholder="Enter Contact" value="{{ $data->contact }}" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Email</label><br>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email" value="{{ $data->email }}" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Aadhar No.</label><br>
                                        <input type="text"  class="form-control" name="identity_no"
                                            id="identity_no" placeholder="Enter Aadhar No." disabled value="{{ $data->id_proof_no }}">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Father's Name</label><br>
                                        <input type="text"  class="form-control" name="father_name"
                                            id="" placeholder="Enter Father's Name" disabled value="{{ $data->getAdmission ? $data->getAdmission->father_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Mother's Name</label><br>
                                        <input type="text"  class="form-control" name="mother_name"
                                            id="" placeholder="Enter Mother's Name" disabled value="{{ $data->getAdmission ? $data->getAdmission->mother_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Gender</label><br>
                                        <select name="gender" id="can_gender" class="form-control"
                                            disabled>
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ $data->getAdmission ? ($data->getAdmission->gender=="male" ? 'selected' : '') : '' }}>Male</option>
                                            <option value="female" {{ $data->getAdmission ? ($data->getAdmission->gender=="female" ? 'selected' : '') : '' }}>Female</option>
                                            <option value="other" {{ $data->getAdmission ? ($data->getAdmission->gender=="other" ? 'selected' : '') : ''}}>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Date of Birth</label><br>
                                        <input type="date"  class="form-control" name="dob"
                                            max="{{ date('Y-m-d') }}" value="{{ $data->getAdmission ? $data->getAdmission->dob : '' }}" disabled id="dob">
                                    </div>
                                </div><br>

                                <div class="row">
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">State</label><br>
                                        <select name="state_id_add" id="state_id_add" class="form-control"
                                            disabled>
                                            <option value="">Select State</option>
                                            @foreach ($state as $sta)
                                                <option value="{{ $sta->id }}" {{ $data->getAdmission ? ($data->getAdmission->state==$sta->id ? 'selected' : '') : '' }}>{{ $sta->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">District</label><br>
                                        <input type="text" class="form-control"
                                            placeholder="District" disabled value="{{ $district ? $district->district_name : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Pincode</label><br>
                                        <input type="text" name="pincode_add" class="form-control"
                                            placeholder="Enter Pincode" disabled value="{{ $data->getAdmission ? $data->getAdmission->pincde : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Chronic Disease</label><br>
                                        <select name="chronic_disease" id="" class="form-control" disabled>
                                            <option value="Yes" {{ $data->getAdmission ? ($data->getAdmission->chronic_disease=="Yes" ? 'selected' : '') : '' }}>Yes</option>
                                            <option value="No" {{ $data->getAdmission ? ($data->getAdmission->chronic_disease=="No" ? 'selected' : '') : '' }}>No</option>
                                        </select>   
                                    </div>      
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Category</label><br>
                                        <select name="category" id="category" class="form-control"
                                             disabled>
                                            <option value="">Select Category</option>
                                            <option value="general" {{ $data->getAdmission ? ($data->getAdmission->category=="general" ? 'selected' : '') : '' }}>General</option>
                                            <option value="sc" {{ $data->getAdmission ? ($data->getAdmission->category=="sc" ? 'selected' : '') : '' }}>SC</option>
                                            <option value="st" {{ $data->getAdmission ? ($data->getAdmission->category=="st" ? 'selected' : '') : '' }}>ST</option>
                                            <option value="obc" {{ $data->getAdmission ? ($data->getAdmission->category=="obc" ? 'selected' : '') : '' }}>OBC</option>
                                            <option value="minority" {{ $data->getAdmission ? ($data->getAdmission->category=="minority" ? 'selected' : '') : '' }}>Minority</option>
                                            <option value="others" {{ $data->getAdmission ? ($data->getAdmission->category=="others" ? 'selected' : '') : '' }}>Others</option>
                                        </select>
                                    </div>
                                    @if ($category_doc)
                                    <div class="col-md-3" id="cat_doc_div">
                                        <label for="" class="m-2">Category Document</label><br>
                                                @if ($category_doc)
                                                    <a href="{{ asset('/documents/course_documents/category-doc/'.$category_doc) }}" target="_blank" class="btn btn-primary">Download File</a>{{ $category_doc }}
                                                @else
                                                    Attachment Not Available
                                                @endif
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="" class="m-2">Address</label>
                                        <textarea name="address" id="" cols="30" rows="5" class="form-control" disabled placeholder="Enter complete address">{{ $data->getAdmission ? $data->getAdmission->address : '' }}</textarea>
                                    </div>
                                </div><br>

                                <h5>General Information</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Facebook User Id</label><br>
                                        <input type="text" name="facebook_user" class="form-control"
                                            placeholder="Facebook User id" disabled value="{{ $data->getAdmission ? $data->getAdmission->fb_user_id : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">LinkedIn User Id</label><br>
                                        <input type="text" name="linkedin_user" class="form-control"
                                            placeholder="LinkedIn User id" disabled value="{{ $data->getAdmission ? $data->getAdmission->linkedin_user_id : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Marital Status</label><br>
                                        <select name="marital_status" id="" class="form-control"
                                            disabled>
                                            <option value="Unmarried" {{ $data->getAdmission ? ($data->getAdmission->marital_status=="Unmarried" ? 'selected' : '') : '' }}>Unmarried</option>
                                            <option value="Married" {{ $data->getAdmission ? ($data->getAdmission->marital_status=="Married" ? 'selected' : '') : '' }}>Married</option>
                                            <option value="Widowed" {{ $data->getAdmission ? ($data->getAdmission->marital_status=="Widowed" ? 'selected' : '') : '' }}>Widowed</option>
                                            <option value="Separated" {{ $data->getAdmission ? ($data->getAdmission->marital_status=="Separated" ? 'selected' : '') : '' }}>Separated</option>
                                            <option value="Divorced" {{ $data->getAdmission ? ($data->getAdmission->marital_status=="Divorced" ? 'selected' : '') : '' }}>Divorced</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Current Status</label><br>
                                        <select name="current_status" id="" class="form-control"
                                            disabled>
                                            <option value="Student" {{ $data->getAdmission ? ($data->getAdmission->current_status=="Student" ? 'selected' : '') : '' }}>Student</option>
                                            <option value="Working" {{ $data->getAdmission ? ($data->getAdmission->current_status=="Working" ? 'selected' : '') : '' }}>Working</option>
                                        </select>
                                    </div>
                                </div><br><br>


                                <h5>Education Qualification</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2">Education Qualification</label><br>
                                        <select name="qualification" id="qualification" class="form-control"
                                            disabled >
                                            <option value="">Select Qualification</option>
                                            <option value="10th/12th" {{ $data->qualification=="10th/12th" ? 'selected' : '' }}>10th/12th</option>
                                            <option value="Under Graduation" {{ $data->qualification=="Under Graduation" ? 'selected' : '' }}>Under Graduation</option>
                                            <option value="Graduation" {{ $data->qualification=="Graduation" ? 'selected' : '' }}>Graduation</option>
                                            <option value="Post Graduation" {{ $data->qualification=="Post Graduation" ? 'selected' : '' }}>Post Graduation</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Unversity/Board</label><br>
                                        <input type="text" name="can_board" class="form-control"
                                            placeholder="Enter Board/University" disabled value="{{ $data->education ? $data->education->board : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Passing Year</label><br>
                                        <input type="text" name="can_yop"
                                            class="number_validation form-control"style="padding: 8px;"
                                            placeholder="Enter year of passing" disabled value="{{ $data->education ? $data->education->year_of_passing : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Percentage/Grade</label><br>
                                        <input type="text" name="can_per" style="padding: 8px;" class="form-control"
                                            placeholder="Enter percentage" disabled value="{{ $data->education ? $data->education->percentage : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Technical Qualification</label><br>
                                        <input type="text" name="tech_qualification" style="padding: 8px;"
                                            class="form-control" placeholder="Enter percentage" disabled value="{{ $data->education ? $data->education->tech_qualification : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Previously Undergone Skill Training</label><br>
                                        <input type="text" name="prev_skill_tra" style="padding: 8px;"
                                            class="form-control" placeholder="Enter percentage" disabled value="{{ $data->education ? $data->education->prev_skill_training : '' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="m-2">Work Experience</label><br>
                                        <select name="can_work_exp" id="" class="form-control"
                                            disabled>
                                            <option value="Yes" {{ $data->getAdmission ? ($data->getAdmission->current_status=="Yes" ? 'selected' : '') : '' }}>Yes</option>
                                            <option value="No" {{ $data->getAdmission ? ($data->getAdmission->current_status=="No" ? 'selected' : '') : '' }}>No</option>
                                        </select>
                                    </div>
                                </div><br><br>

                                <h5>Attachmnet Fields</h5>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Covid Vaccination Type</label><br>
                                        <select name="covid_dose" id="covid_dose" class="form-control" 
                                            disabled>
                                            <option value="">Select Dose</option>
                                            <option value="1st Dose" {{ $data->getAdmission ? ($data->getAdmission->covid_type=="1st Dose" ? 'selected' : '') : '' }}>1st Dose</option>
                                            <option value="2nd Dose" {{ $data->getAdmission ? ($data->getAdmission->covid_type=="2nd Dose" ? 'selected' : '') : '' }}>2nd Dose</option>
                                            <option value="Booster Dose" {{ $data->getAdmission ? ($data->getAdmission->covid_type=="Booster Dose" ? 'selected' : '') : '' }}>Booster Dose</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Vaccination Document</label><br>
                                        @if ($covid_doc)
                                            <a href="{{ asset('/documents/course_documents/covid-doc/'.$covid_doc) }}" target="_blank" class="btn btn-primary">Download File</a>{{ $covid_doc }}
                                        @else
                                            Attachment Not Available
                                        @endif
                                        
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="padding-right: 200px;">Document Type</th>
                                                    <th style="padding-right: 215px;">Document </th>
                                                </tr>
                                            </thead>
                                            <tbody id="doc-div">
                                                <tr>
                                                    <td>
                                                        Aadhar Card
                                                    </td>
                                                    <td>
                                                        @if ($aadhar_doc)
                                                            <a href="{{ asset('/documents/course_documents/id_proof/'.$aadhar_doc) }}" target="_blank" class="btn btn-primary">Download File</a>{{ $aadhar_doc }}
                                                        @else
                                                            Attachment Not Available
                                                        @endif
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>




                                    </div>
                                </div>
                                <br>
                                <hr>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h4 for="" class="mt-2">Attach Parent Consent Form </h4><br>
                                        <div class="row">
                                            {{-- <div class="col-md-4">
                                                <span class="btn btn-sm btn-info" onclick="frames['frame'].print()">Download
                                                    Parent Consent Form</span>
                                            </div> --}}
                                            <div class="col-md-8">
                                                @if ($parent_consent)
                                                    <a href="{{ asset('/documents/course_documents/parent-consent/'.$parent_consent) }}" target="_blank" class="btn btn-primary">Download File</a>{{ $parent_consent }}
                                                @else
                                                    Attachment Not Available
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                                {{-- <button type="submit" class="text-light btn btn-lg btn-success btn-icon-text">
                                    <i class="ti-upload btn-icon-prepend"></i>
                                    Submit
                                </button> --}}
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
                        }
                        else{
                            $('#cat_doc_div').css("display","none");
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

