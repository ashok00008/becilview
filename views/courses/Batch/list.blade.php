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

                    <div class="container col-sm-12 mx-auto">
                        <h3 class="text-center fw-bold">Batch List</h3><hr><br>
                        @if (session('alert_success'))
                            <h6 class="alert alert-success mx-4 fw-bold fs-6">{{ session('alert_success') }}</h6>
                        @endif
                        @if (session('alert_danger'))
                            <h6 class="alert alert-danger mx-4 fw-bold fs-6">{{ session('alert_danger') }}</h6>
                        @endif
                        <div class="container col-sm-12 mx-auto">
                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Centre Code</th>
                                        <th>Batch Code</th>
                                        <th>Nature Of Training</th>
                                        <th>Batch Status</th>
                                        <th>Added By</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($batch_data as $batch_data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $batch_data->getCentreName->name }}</td>
                                            <td>{{ $batch_data->batch_code }}</td>
                                            <td>{{ ucwords($batch_data->nature_of_training) }}</td>
                                            <td>{{ ucwords($batch_data->batch_summary_status) }}</td>
                                            <td>{{ $batch_data->added_by }}</td>
                                            {{-- <td>
                                                <a href="{{ url('can_list_in_batch?id=' . $batch_data->id) }}"
                                                    class="text-light btn btn-primary"
                                                    target="_blank">{{ $batch_data->alloted_candidate_count_count }}
                                                    Candidates</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
