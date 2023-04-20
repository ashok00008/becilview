<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <link href="{{ public_path('assets/public/asset/css/bootstrap-responsive.css') }}" rel="stylesheet" /> --}}

    {{-- <link href="{{ public_path('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <style>
            
        img.logo1 {
            padding: 15px;
            width: 220px;
        }
    
        img.logo2 {
            width: 220px;
            margin-top: 0px;
            padding: 15px;
            float: right;
        }

        .page-break {
            page-break-after: always;
        }

        /* table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        } */
        </style>


</head>

<body>
    <div id="app">
        <div id="wrapper">
            <!-- start header -->
            <div class="hidden-top">
                <div class="hidden-top-inner container">
                    <div class="row">
                        <img src="{{ public_path('assets/public/asset/img/becil_logo.png') }}" class="logo1">
                        <img src="{{ public_path('assets/public/asset/img/naukariyaan.png') }}" class="logo2">
                        {{-- <div class="col-sm-7 col-6">
                        <img src="{{public_path('assets/public/asset/img/becil_logo.png')}}" class="logo1">
                    </div>
                    <div class="col-sm-5 col-6">
                        <img src="{{public_path('assets/public/asset/img/naukariyaan.png')}}" class="logo2">
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <?php
        $user_image = $category_doc = $covid_doc = $aadhar_doc = $parent_consent = '';
        // print_r($detail->document);
        // print_r($detail['document'][0]['doc_file']);
        // exit;
        foreach ($detail->document as $doc) {
            if ($doc->doc_type == 'user-image') {
                $user_image = $doc->doc_file;
            } elseif ($doc->doc_type == 'category-doc') {
                $category_doc = $doc->doc_file;
            } elseif ($doc->doc_type == 'covid-doc') {
                $covid_doc = $doc->doc_file;
            } elseif ($doc->doc_type == 'aadhar-doc') {
                $aadhar_doc = $doc->doc_file;
            } elseif ($doc->doc_type == 'parent-consent') {
                $parent_consent = $doc->doc_file;
            } elseif ($doc->doc_type == 'signature-doc') {
                $signature_doc = $doc->doc_file;
            }
        }
        ?>
        <div class="container" style="padding:0; margin-top:20px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-tab">

                        <div class="container12 shadow">

                            <div class="row ">
                                
                                <div class="col-md-12">
                                    <span class="float-right" style="float:right;">
                                        <label>Date:- {{ Carbon\Carbon::parse($detail->getAdmission->created_at)->format('d-m-Y') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                </div>
                                <div class="col-md-9">
                                    <div class="row px-5">
                                        <h3>Course Details</h3>
                                        <hr>
                                        <table class="table table-bordered table-striped" cellspacing="8px">
                                            <tr>
                                                <td>Centre Name</td>
                                                <td>{{ $detail->centre->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td>{{ $detail->locationName->location_name }}</td>
                                            </tr>
                                            {{-- <tr>
                                            <td>Preferred Shift</td>
                                            <td>{{ ucfirst($detail->shift)  }} </td>
                                        </tr> <tr>
                                            <td>Preferred Month</td>
                                            <td>{{ $detail->monthName->month_name  }} </td>
                                        </tr> --}}
                                            <tr>
                                                <td>Course </td>
                                                <td>{{ $detail->courseName->course_name }}</td>
                                            </tr>
                                        </table>
                                    </div>



                                </div>
                                <div class="col-md-3" style="margin-top:50px;">
                                    <img src="{{ public_path('documents/course_documents/user-image/' . $user_image) }}"
                                        class="mt-2 img-fluid" style="width:200px; height:200px; margin-left:30px;" alt="">
                                    <img src="{{ public_path('documents/course_documents/signature-doc/' . $signature_doc) }}"
                                    class="mt-2 img-fluid" style="width:200px; height:200px; margin-left:30px;" alt="">
                                </div>
                                <div class="col-md-12" style="margin-top:0px;">
                                    <div class="row px-5">
                                        <h3>Personal Details</h3>
                                        <hr>
                                        <table class="table table-bordered table-striped" cellspacing="8px">
                                            <tr>
                                                <td>Registration ID</td>
                                                <td>{{ $detail->mit_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ $detail->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>{{ ucfirst($detail->getAdmission->gender) }} </td>
                                            </tr>
                                            <tr>
                                                <td>Date of birth</td>
                                                <td>{{ Carbon\Carbon::parse($detail->getAdmission->dob)->format('d-m-Y') }}</td>
                                            </tr>

                                            <tr>
                                                <td>AADHAR No.</td>
                                                <td>{{ $detail->getAdmission->aadhar_no }}</td>
                                            </tr>
                                            <tr>
                                                <td>Father's name</td>
                                                <td>{{ $detail->getAdmission->father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mother's name</td>
                                                <td>{{ $detail->getAdmission->mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $detail->email }} </td>
                                            </tr>
                                            <tr>
                                                <td>Contact </td>
                                                <td>{{ $detail->contact }}</td>
                                            </tr>
                                            <tr>
                                                <td>Category </td>
                                                <td>{{ $detail->getAdmission->category }}</td>
                                            </tr>
                                            <tr>
                                                <td>Highest Education </td>
                                                <td>{{ $detail->qualification }}</td>
                                            </tr>
                                            @if ($detail->getAdmission->marital_status)
                                                <tr>
                                                    <td>Maritial Status </td>
                                                    <td>{{ $detail->getAdmission->marital_status }}</td>
                                                </tr>
                                            @endif

                                            @if ($detail->getAdmission->current_status)
                                                <tr>
                                                    <td>Current Status</td>
                                                    <td>{{ $detail->getAdmission->current_status }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>Chronic Disease</td>
                                                <td>{{ $detail->getAdmission->chronic_disease }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="page-break"></div>
                                <div class="col-md-12">
                                    <div class="row px-5">
                                        <h3>Address Details</h3>
                                        <hr>
                                        <table class="table table-bordered table-striped" cellspacing="10px">
                                            <tr>
                                                <td>State </td>
                                                <td>{{ $detail->getAdmission->stateName->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>District </td>
                                                <td>{{ $detail->getAdmission->districtName->district_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pincode </td>
                                                <td>{{ $detail->getAdmission->pincde }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address </td>
                                                <td>{{ $detail->getAdmission->address }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                @if ($detail->getAdmission->linkedin_user_id || $detail->getAdmission->fb_user_id)
                                    <div class="col-md-12">
                                        <div class="row px-5">
                                            <h3>Social Details</h3>
                                            <hr>
                                            <table class="table table-bordered table-striped" cellspacing="10px">
                                                <tr>
                                                    @if ($detail->getAdmission->linkedin_user_id)
                                                        <td>Linkedin </td>
                                                    @endif
                                                    @if ($detail->getAdmission->fb_user_id)
                                                        <td>Facebook </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if ($detail->getAdmission->linkedin_user_id)
                                                        <td>{{ $detail->getAdmission->linkedin_user_id }}</td>
                                                    @endif
                                                    @if ($detail->getAdmission->fb_user_id)
                                                        <td>{{ $detail->getAdmission->fb_user_id }}</td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-9">
                                    {{-- <img src="{{ asset('documents/course_documents/user-image/'.$detail->document)}}" alt="" width="50px;"> --}}
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <span class="float-right" style="float:right;">
                                        <label>Parent Signature .....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>

</html>
