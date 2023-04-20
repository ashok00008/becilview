@extends('courses.admin_master')
@section('main-content')

    <div class="content-wrapper" style="overflow: hidden; padding: 10px 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">Registrations</h4>
                    <hr>

                    @if (session('alert_status'))
                        <div class="row mt-5">
                            <h6 class="alert alert-success">{{ session('alert_status') }}</h6>
                        </div>
                    @endif

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="GET" id="searchForm">
                                    <input type="hidden" name="export_csv" value="export_csv">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Search</label>
                                            <input type="text" name="search" value="{{ Request::get('search') ?? '' }}"
                                                placeholder="Search" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Search by Courses</label>
                                            <select name="course" class="form-control">
                                                <option value="">Select All Status</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                        {{ Request::get('course') == "$course->id" ? 'selected' : '' }}>
                                                        {{ $course->course_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Filter by Date</label>
                                            <input type="date" name="date" value="{{ Request::get('date') ?? '' }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Search by Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Select All Status</option>
                                                <option value="0"
                                                    {{ Request::get('status') == '0' ? 'selected' : '' }}>
                                                    Registered</option>
                                                <option value="1"
                                                    {{ Request::get('status') == '1' ? 'selected' : '' }}>
                                                    Self Admit</option>
                                                <option value="2"
                                                    {{ Request::get('status') == '2' ? 'selected' : '' }}>
                                                    Admit</option>
                                                <option value="3"
                                                    {{ Request::get('status') == '3' ? 'selected' : '' }}>
                                                    Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br />
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a href="{{ url('course-admin/registration/') }}"
                                                class="btn btn-secondary">Clear</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                <div class="col-md-2 mt-4">
                                    <select name="pagination" id="pagination" class="form-control">
                                        <option value="10" {{ Request::get('pagination') == '10' ? 'selected' : '' }}>
                                            10</option>
                                        <option value="25" {{ Request::get('pagination') == '25' ? 'selected' : '' }}>
                                            25</option>
                                        <option value="50" {{ Request::get('pagination') == '50' ? 'selected' : '' }}>
                                            50</option>
                                        <option value="75" {{ Request::get('pagination') == '75' ? 'selected' : '' }}>
                                            75</option>
                                        <option value="100" {{ Request::get('pagination') == '100' ? 'selected' : '' }}>
                                            100</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-4 d-flex align-items-center">
                                    <label style="font-size:1rem;">Total Records: {{ $registrations->total() }}
                                    </label>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-4">
                                    <form action="{{ url('course-admin/export-registration') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="export_all_csv" value="export_all_csv">
                                        <button type="submit" class="btn btn-sm btn-success float-right"
                                            id="exportAllBtn">Export All Data</button>
                                    </form>
                                    <button type="button" class="btn btn-sm btn-primary" id="exportOneBtn">Export Selected
                                        Data</button>
                                </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-1 mt-4">
                                <button type="button" class="btn btn-sm btn-primary" id="exportOneBtn">Export Selected
                                    Data</button>
                            </div> --}}
                        </div>

                    </div>
                    <div class="table-responsive">
                        <form action="{{ url('course-admin/export-registration') }}" method="POST" id="exportForm">
                            @csrf
                            <input type="hidden" name="export_csv" value="export_csv">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th><input type="checkbox" name="registrationCheck" class="selectall" /></th>
                                    <th>S.No.</th>
                                    <th>Registration ID</th>
                                    <th>Name</th>
                                    <th>Email / Contact</th>
                                    <th>Qualification</th>
                                    <th>Location</th>
                                    <th>Course</th>
                                    <th>Preferred Month</th>
                                    <th>Preferred Shift</th>
                                    <th>Reference</th>
                                    <th>Course Type</th>
                                    <th>Admission Status</th>
                                    <th>Registered On</th>
                                    <th>Admission On</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    @forelse ($registrations as $item)
                                        <tr>
                                            <td><input type="checkbox" name="registrationCheck[]" class="selectone"
                                                    value="{{ $item->id }}" /></td>
                                            <td>{{ Request::get('page') > 1 ? (Request::get('page') - 1) * (Request::get('pagination') ? Request::get('pagination') : 10) + $loop->iteration : $loop->iteration }}
                                            </td>
                                            <td>{{ $item->mit_code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email . ' / ' . $item->contact }}</td>
                                            <td>{{ ucfirst($item->qualification) }}</td>

                                            @if ($item->location)
                                                <td>{{ $item->locationName->location_name }}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif

                                            @if ($item->course_id)
                                                <td>{{ $item->courseName->course_name }}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif

                                            <td>{{ $item->monthName ? $item->monthName->month_name : 'Not Selected' }}</td>
                                            <td>{{ $item->shift ? $item->shift : 'N/A' }}</td>

                                            <td>{{ $item->reference ? $item->reference : 'N/A' }}</td>

                                            <td>{{ $item->type_of_course == 'Online' ? 'Online' : 'Offline' }}</td>
                                            <td>
                                                @if ($item->addmissionStatus)
                                                    @if ($item->addmissionStatus->admission_status == 0)
                                                        <label class="badge btn-primary pt-1">Registered</label>
                                                    @elseif ($item->addmissionStatus->admission_status == 1)
                                                        <label class="badge btn-warning pt-1">Self Admit</label>
                                                    @elseif ($item->addmissionStatus->admission_status == 2)
                                                        <label class="badge btn-success pt-1">Admit</label>
                                                    @elseif ($item->addmissionStatus->admission_status == 3)
                                                        <label class="badge btn-danger pt-1">Cancelled</label>
                                                    @endif
                                                @else
                                                    <label class="badge btn-primary pt-1">Registered</label>
                                                @endif
                                            </td>

                                            {{-- <td>{{ $item->created_on->format('d-m-y') }}</td> --}}
                                            <td>{{ Carbon\Carbon::parse($item->created_on)->format('d-m-Y') }}</td>

                                            <td>{{ $item->getAdmission ? Carbon\Carbon::parse($item->getAdmission->created_at)->format('d-m-Y') : 'N/A' }}
                                            </td>

                                            {{-- <td>{{ Carbon\Carbon::parse($item->getAdmission->created_at)->format('d-m-Y') }}</td> --}}


                                            <td>
                                                @if ($item->addmissionStatus)
                                                    @if ($item->addmissionStatus->admission_status < 2)
                                                        <form></form>
                                                        <form action="{{ url('/course-admin/admission-form') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="reg_id"
                                                                value="{{ $item->id }}">
                                                            <input type="submit" class="btn btn-sm btn-success admsn-btn"
                                                                value="Go To Admission">
                                                        </form>
                                                    @endif
                                                @else
                                                    <form action="{{ url('/course-admin/admission-form') }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="reg_id"
                                                            value="{{ $item->id }}">
                                                        <input type="submit" class="btn btn-sm btn-success admsn-btn"
                                                            value="Go To Admission">
                                                    </form>
                                                @endif

                                                @if ($item->addmissionStatus)
                                                    @if ($item->addmissionStatus->admission_status == '2')
                                                        <button type="button" id="cancelBtn"
                                                            class="btn btn-sm mt-2 btn-danger"
                                                            data-id="{{ $item->id }}" data-toggle="modal"
                                                            data-target="#cancelModal">
                                                            Cancel Admission
                                                        </button>
                                                    @elseif($item->addmissionStatus->admission_status == '3')
                                                        <button type="submit" id="cancelRemarkBtn"
                                                            class="btn btn-sm btn-danger pt-1"
                                                            data-remark="{{ ucfirst($item->addmissionStatus->remarks) }}"
                                                            data-toggle="modal" data-target="#cancelRemarkModal">View
                                                            Remark</button>
                                                    @endif
                                                @endif

                                                <a href="{{ url('/course-admin/admission-form/' . $item->id) }}"
                                                    class="btn btn-sm btn-primary mt-2">View Details</a>
                                                <a href="{{ url('/course-admin/admission-form/mail/' . $item->id) }}"
                                                    class="btn btn-sm btn-warning mt-2">Send Mail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">
                                                No data available!
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </form>
                        <div>
                            {{ $registrations->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Cancel Admission --}}

    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Admission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/course-admin/registration/cancel-admission') }}" method="post">
                        @csrf
                        <input type="hidden" id="reg_id" name="reg_id">
                        <textarea name="remarks" id="" rows="3" placeholder="Remarks" class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-2 float-right">Cancel</button>
                    </form>
                </div>
                {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           --}}
            </div>
        </div>
    </div>
    </div>

    {{-- Cancel Remark --}}

    <div class="modal fade" id="cancelRemarkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancellation Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4 id="remarkHeading">Remark</h4>

                </div>
            </div>
        </div>
    </div>
    </div>



@endsection

@section('scripts')
    <script>
        $("#pagination").change(function() {
            $("#searchForm").submit();
        });

        $("#exportOneBtn").click(function() {
            $("#exportForm").submit();
        });

        $("#cancelBtn").click(function() {
            var id = $("#cancelBtn").data('id');
            $("#reg_id").val(id);
        });

        $("#cancelRemarkBtn").click(function(e) {
            e.preventDefault();
            var remark = $("#cancelRemarkBtn").data('remark');
            $("#remarkHeading").text(remark);
        });

        $('.selectall').click(function() {
            if ($(this).is(':checked')) {
                $('input:checkbox').prop('checked', true);
            } else {
                $('input:checkbox').prop('checked', false);
            }
        });

        $("input[type='checkbox'].selectone").change(function() {
            var a = $("input[type='checkbox'].selectone");
            if (a.length == a.filter(":checked").length) {
                $('.selectall').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
            }
        });

        // $(".admsn-btn").click(function(e) {
        //     e.preventDefault();
        //     $(this).parent().submit();
        // $('.admsn-submit').submit();
        // });
    </script>
@endsection
