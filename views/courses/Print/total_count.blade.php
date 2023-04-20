@extends('courses.admin_master')
@section('main-content')
    <div class="content-wrapper" style="overflow: hidden; padding: 10px 20px;" id="print-form">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('assets/public/asset/img/home-banner.jpg') }}" class="img-fluid d-none d-print-block" alt="Image" >
                <div class="shadow bg-white p-3" style="background-color:white!important;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:18pt;">
                        <strong><span style="font-family:'Palatino Linotype';">Course Wise
                                Registration</span></strong>
                    </p>
                    <form action="{{ url('/course-admin/total-count-location-wise') }}" method="get">
                        <div class="row my-5 d-flex justify-content-center align-items-end">
                            <div class="col-md-3">
                                <label>From: &nbsp;<span class="d-none d-print-inline-block font-weight-normal">
                                    {{ Request::get('from_date') ? date('d-M-Y', strtotime(Request::get('from_date'))) : date('d-M-Y', strtotime($first_date->created_on)) }}
                                </span></label>
                                
                                <input type="date" name="from_date" value="{{ Request::get('from_date') ?? '' }}"
                                    class="form-control date_input">
                            </div>
                            <div class="col-md-3">
                                <label>To: &nbsp;
                                <span class="d-none d-print-inline-block font-weight-normal">
                                    {{ Request::get('to_date') ? date('d-M-Y', strtotime(Request::get('to_date'))) : date('d-M-Y') }}
                                </span></label>
                                {{-- <h5 class="dates d-none">
                                    {{ Request::get('to_date') ? date('d-M-Y', strtotime(Request::get('to_date'))) : date('d-M-Y') }}
                                </h5> --}}
                                <input type="date" name="to_date" value="{{ Request::get('to_date') ?? '' }}"
                                    class="form-control date_input">
                            </div>
                            <div class="col-md-1 d-print-none">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <div class="col-md-3">
                                <label>Printed On:&nbsp;
                                    <span class="d-none d-print-inline-block font-weight-normal">
                                        {{ date('d-M-Y') }}
                                    </span></label>
                                <h5 class="d-block d-print-none"> {{ date('d-M-Y') }}</h5>
                            </div>
                            <div class="col-md-1 d-print-none">
                                <button class="btn btn-primary" onclick="window.print();">Print</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 d-flex justify-content-center mb-5">

                        <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:90%;" border="1px">
                            <tbody>
                                <tr style="height:18.75pt;font-family:'Palatino Linotype';">
                                    <th>SL No.</th>
                                    <th>Certification Course Name</th>
                                    <th>Jaipur</th>
                                    <th>Bhopal</th>
                                    <th>Dodi</th>
                                    <th>Online</th>
                                    <th>Total</th>
                                </tr>
                                @php
                                    $jaipur = 0;
                                    $bhopal = 0;
                                    $dodi = 0;
                                    $online = 0;
                                @endphp
                                @foreach ($data as $data)
                                    @php
                                        $jaipur += $data->Jaipur;
                                        $bhopal += $data->Bhopal;
                                        $dodi += $data->Dodi;
                                        $online += $data->Online;
                                    @endphp
                                    <tr style="height:18.75pt; text-align:center;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-align:left;">{{ $data->course_name }}</td>
                                        <td><a href="registration?export_csv=export_csv&search=jaipur&course={{ $data->course_id }}">{{ $data->Jaipur ?? 0 }}</a></td>
                                        <td><a href="registration?export_csv=export_csv&search=bhopal&course={{ $data->course_id }}">{{ $data->Bhopal ?? 0 }}</a></td>
                                        <td><a href="registration?export_csv=export_csv&search=dodi&course={{ $data->course_id }}">{{ $data->Dodi ?? 0 }}</a></td>
                                        <td><a href="registration?export_csv=export_csv&search=online&course={{ $data->course_id }}">{{ $data->Online ?? 0 }}</a></td>
                                        <td><a href="registration?export_csv=export_csv&course={{ $data->course_id }}">{{ $data->Jaipur + $data->Bhopal + $data->Dodi + $data->Online }}</a></td>
                                        {{-- <td>{{ $data->Jaipur ?? 0 }}</td>
                                        <td>{{ $data->Bhopal ?? 0 }}</td>
                                        <td>{{ $data->Dodi ?? 0 }}</td>
                                        <td>{{ $data->Jaipur + $data->Bhopal + $data->Dodi }} --}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr style="height:18.75pt; text-align:center;">
                                    <td colspan="2"><strong>Total</strong></td>
                                    <td><a href="registration?export_csv=export_csv&search=jaipur">{{ $jaipur }}</a></td>
                                    <td><a href="registration?export_csv=export_csv&search=bhopal">{{ $bhopal }}</a></td>
                                    <td><a href="registration?export_csv=export_csv&search=dodi">{{ $dodi }}</a></td>
                                    <td><a href="registration?export_csv=export_csv&search=online">{{ $online }}</a></td>
                                    <td><a href="registration">{{ $jaipur + $bhopal + $dodi + $online }}</a></td>
                                    {{-- <td>{{ $jaipur }}</td>
                                    <td>{{ $bhopal }}</td>
                                    <td>{{ $dodi }}</td>
                                    <td>{{ $jaipur + $bhopal + $dodi }}</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('styles')
    <style>
        td,
        th {
            padding: 7px 12px;
        }

        td {
            font-weight: 600;
        }

        th {
            font-size: 1rem;
        }
        td a{
            color: black;
            border-bottom: 2px solid blue;
        }
        @media print {
            footer {
                visibility: hidden;
            }

            .dates {
                display: block !important;
            }

            .date_input {
                display: none;
            }
            td a{
                color: black;
                border-bottom: none;
            }
        }
    </style>
@endsection

@section('scripts')

<script>
    function printDiv() {
        w=window.open();
        w.document.getElementById("print-form").innerHTML;
        w.print();
        w.close();
    }
</script>
@endsection

