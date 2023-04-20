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
                        {{-- <div class="col-sm-3 ml-2 mb-4">
                            <ol class="breadcrumb float-sm-right" style="background-color: #6b8ed6;border-radius: 5px;">
                                <li class="breadcrumb-item"><a style="color:#fff; text-decoration: none;"
                                        href="{{ route('home') }}" aria-expanded="false" aria-controls="ui-basic"><i
                                            class="fa-solid fa-house"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        style="color:#fff; text-decoration: none;"data-bs-toggle="collapse"
                                        href="#ui-basic16" aria-expanded="false" aria-controls="ui-basic16">Batch</a>
                                </li>
                                <li class="breadcrumb-item active"><a style="color:#fff; text-decoration: none;"
                                        href="{{ route('batch') }}"><b>Add Batch</b></a>
                                </li>
                            </ol>   
                        </div> --}}
                        <h3 class="text-center font-weight-bold mt-3">Creation Of Batch</h3><br>

                        <form action="{{ route('create-batch') }}" method="post">
                            @csrf
                            <div class="row">
                                @if (session('alert_status'))
                                    <h6 class="alert alert-success">{{ session('alert_status') }}</h6>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="m-2">Locations</label><br>
                                    <select name="location" id="location" class="form-control centre"
                                        style="background-color:white;">
                                        <option value="">Select Location</option>
                                        @foreach ($courses_locations as $loc)
                                            <option value="{{ $loc['id'] }}">{{ $loc['location_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="m-2">Centre Name</label><br>
                                    <select name="centre_id" id="centre_id" class="form-control centre"
                                        style="background-color:white;">
                                        <option value="">Select Centre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row d-none not-create">
                                <h2 class="text-center mt-5" style="font-weight: 600;color: #ee1201;"></h2>
                            </div>
                            <div class="allow-create">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Nature of training</label><br>
                                        <select name="nature_of_training" id="" class="form-control"
                                            style="background-color:white;">
                                            <option value="fulltime">Full-time</option>
                                            <option value="parttime">Part-time</option>
                                            <option value="weekends">Week-ends</option>
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label for="" class="m-2">Trainer Name</label><br>
                                        <select name="t_name" id="trainer" class="form-control"
                                            style="background-color:white;">

                                        </select>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Class Duration per day<span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;"> (In
                                                hours)</span></label><br>
                                        <input type="text" required class="number_validation form-control"
                                            name="duration_per_day">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Batch Start Date</label><br>
                                        <input type="date" required name="b_start_date" min="{{ date('Y-m-d') }}"
                                            id="b_start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Expected Batch End Date</label><br>
                                        <input type="date" readonly name="ex_b_end_date" class="form-control"
                                            name="" id="expec_date">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="m-2">Maximum permissible batch
                                            size</label><br>
                                        <input type="text" required name="b_size" class="form-control" placeholder="35"
                                            value="35">
                                    </div>
                                </div> <br>
                                <div class="shift-div" id="shift-div">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="m-2">Will OJT be given?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="ojt_given" onchange="getOjt(this);" id=""
                                            class="form-control" style="background-color:white;">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ojt-div" id="ojt-div">

                                </div>
                                <br>

                                <div class="section-div" id="section-div">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="m-2"> Activity cum Lesson planner for </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="lesson_planner" id="" onchange="getClassType(this);"
                                            class="form-control" style="background-color:white;">
                                            <option value="batch">Batch</option>
                                            <option value="section">Each section</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="classtype-div" id="classtype-div">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="" class="m-2">Theory Classroom No.</label><br>
                                            <input type="text" class="number_validation form-control"
                                                name="theory_class[]" min="0" id="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="m-2">IT lab No.</label><br><br>
                                            <input type="text" class="number_validation form-control" name="it_lab[]"
                                                min="0" id="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="m-2">Practical lab No.</label><br><br>
                                            <input type="text" class="number_validation form-control"
                                                name="practical_lab[]" min="0" id="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="m-2">Theory cum Practical Lab No.
                                            </label><br>
                                            <input type="text" class="number_validation form-control"
                                                name="theory_cum_class[]" min="0" id="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="m-2">Theory cum IT Lab No.</label><br>
                                            <input type="text" class="number_validation form-control"
                                                name="it_cum_lab[]" min="0" id="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="m-2">IT cum Practical Lab No.</label><br>
                                            <input type="text" class="number_validation form-control"
                                                name="practical_cum_lab[]" min="0" id="">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="text-light btn btn-lg btn-success btn-icon-text">
                                    <i class="ti-upload btn-icon-prepend"></i>
                                    Submit
                                </button>
                            </div>
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


            $('#category').change(function() {
                if ($(this).val() != "general") {
                    $('#cat_doc_div').css("display", "block");
                } else {
                    $('#cat_doc_div').css("display", "none");
                }
            });

        });


        function getOjt(ojt) {
            if (ojt.value == 'yes') {
                $('#ojt-div').append(
                    '  <div class="row" id="append-ojt"><div class="col-md-6"><label for="" class="m-2">Expected OJT start date</label><br> <input type="date" class="form-control"  min="{{ date('Y-m-d') }}" name="ojt_start_date" id="" > </div> <div class="col-md-6"> <label for="" class="m-2">No. of OJT days:</label><br> <input type="number" class="form-control" name="ojt_days" id="" ></div>   </div></div>  '
                );
            }

            if (ojt.value == 'no') {
                $('#append-ojt').remove();
            }
        }


        function getClassType(classType) {
            if (classType.value == 'section') {
                $('#classtype-div').append(
                    '  <div class="row" id="append-classType"> <div class="col-md-2"> <label for="" class="m-2">Theory Classroom No.</label><br>    <input type="text" class="number_validation form-control" name="theory_class[]"  min="0" id="" > </div> <div class="col-md-2">     <label for="" class="m-2">IT lab No.</label><br><br><input type="text" class="number_validation form-control" name="it_lab[]"  min="0" id="" ></div>   <div class="col-md-2"><label for="" class="m-2">Practical lab No.</label><br><br><input type="text" class="number_validation form-control" name="practical_lab[]"  min="0" id="" ></div> <div class="col-md-2"><label for="" class="m-2">Theory cum Practical Lab No.</label><br><input type="text" class="number_validation form-control" name="theory_cum_class[]"  min="0" id="" ></div>   <div class="col-md-2"><label for="" class="m-2">Theory cum IT Lab No.</label><br><input type="text" class="number_validation form-control" name="it_cum_lab[]"  min="0" id="" ></div><div class="col-md-2"><label for="" class="m-2">IT cum Practical Lab No.</label><br><input type="text" class="number_validation form-control" name="practical_cum_lab[]"  min="0" id="" ></div> </div> '
                );
            }

            if (classType.value == 'batch') {
                $('#append-classType').remove();
            }
        }

        $(document).ready(function() {
            $('#location').on('change', function() {
                var loc_id = this.value;
                $.ajax({
                    url: "{{ url('course-admin/fetch_centres') }}",
                    type: "POST",
                    data: {
                        loc_id: loc_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#centre_id').html();
                        var centres = "";
                        var all_centers = result.courses.forEach(element => {
                            centres += "<option value=" + element.location_id + ">" +
                                element.name + "</option>";
                        });
                        var html_text = `<option value="">Select Centre</option>` + centres;
                        console.log(html_text);
                        $('#centre_id').html(html_text);
                    }
                });
            });

        });
    </script>
@endsection
