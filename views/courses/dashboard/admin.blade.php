@extends('courses.courseadmindash')
@section('google')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                <?php echo $result; ?>
            ]);


            var options = {
                pieSliceText: 'value',
                title: 'Today Data',
                is3D: true,
                titleTextStyle: {
                    fontSize: 18
                },
                chartArea: {
                    width: 400,
                    height: 250
                },
                fontSize: 16
            };

            // ['', 0, null, 'No Data Copy']
            if (data.getNumberOfRows() === 0) {
                // data.addRows([
                //     ['', 0, null, 'No Data Copy']
                // ]);
                $("#piechart1").append("Sorry, No Data Available")
            }

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }


        function drawChart2() {

            var data = google.visualization.arrayToDataTable([

                <?php echo $resultTotal; ?>
            ]);

            var options = {
                pieSliceText: 'value',
                title: 'Total Data',
                is3D: true,
                titleTextStyle: {
                    fontSize: 18
                },
                chartArea: {
                    width: 400,
                    height: 250
                },
                fontSize: 16
            }

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>
@endsection()
@section('dashboard-section')
    <div class="row">
        <div class="col-md-6 mb-4">
            <div id="piechart2" style="  width: 450px; height: 300px;"></div>
        </div>
        <div class="col-md-6 mb-4">
            <div id="piechart1" style=" width: 450px; height: 300px;"></div>
        </div>


        <div class="col-md-12">

        </div>
        <div class="container-fluid">
            <h3 class="font-weight-bold">Total Report (Bulk)</h3>
            <hr>
        </div>
        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=&date=&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Total Registrations</label>
                    <h1>{{ $totalRegistrations }}</h1>
                    View

                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=jaipur&date=&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Total Registrations in Jaipur</label>
                    <h1>{{ $totalJaipurRegistrations }}</h1>
                    View

                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=bhopal&date=&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Total Registrations in Bhopal</label>
                    <h1>{{ $totalBhopalRegistrations }}</h1>
                    View

                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=dodi&date=&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-danger text-white mb-3">
                    <label for="">Total Registrations in Dodi</label>
                    <h1>{{ $totalDodiRegistrations }}</h1>
                    View

                </div>
            </a>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=online&date=&status=&pagination=10') }}"
                        class="text-white">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Total Online Registrations</label>
                            <h1>{{ $totalOnlineRegistrations }}</h1>
                            View

                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=offline&date=&status=&pagination=10') }}"
                        class="text-white">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Total Offline Registrations</label>
                            <h1>{{ $totalOfflineRegistrations }}</h1>
                            View
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('course-admin/total-count-location-wise') }}"
                        class="text-white">
                        <div class="card card-body bg-success text-white mb-3">
                            <label for="">Summary Report For Registration</label>
                            <h1> &nbsp; </h1>
                            View
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="me-md-3 me-xl-5">
                <h3 class="font-weight-bold">Today's Report</h3>
                <hr>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=&date=' . date('Y-m-d') . '&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Today's Total Registrations</label>
                    <h1>{{ $todayRegistrations }}</h1>
                    View
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=jaipur&date=' . date('Y-m-d') . '&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Today's Registrations in Jaipur</label>
                    <h1>{{ $todayJaipurRegistrations }}</h1>
                    View
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=bhopal&date=' . date('Y-m-d') . '&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Today's Registrations in Bhopal</label>
                    <h1>{{ $todayBhopalRegistrations }}</h1>
                    View
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=dodi&date=' . date('Y-m-d') . '&status=&pagination=10') }}"
                class="text-white">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Today's Registrations in Dodi </label>
                    <h1>{{ $todayDodiRegistrations }}</h1>
                    View
                </div>
            </a>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=online&date=' . date('Y-m-d') . '&status=&pagination=10') }}"
                        class="text-white">
                        <div class="card card-body bg-warning text-white mb-3">
                            <label for="">Today's Online Registrations</label>
                            <h1>{{ $todayOnlineRegistrations }}</h1>
                            View

                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=offline&date=' . date('Y-m-d') . '&status=&pagination=10') }}"
                        class="text-white">
                        <div class="card card-body bg-warning text-white mb-3">
                            <label for="">Today's Offline Registrations</label>
                            <h1>{{ $todayOfflineRegistrations }}</h1>
                            View

                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
