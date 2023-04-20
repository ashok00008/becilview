@extends('courses.courseadmindash')

@section('dashboard-section')

    <div class="row">

        <div class="col-md-12">
        <div class="me-md-3 me-xl-5">
        </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label for="">Today's Online Registrations</label>
                <h1>{{ $todayOnlineRegistrations }}</h1>
                <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=&date='.date('Y-m-d').'&status=&pagination=10') }}" class="text-white">View</a>
            </div>      
        </div>

      
        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label for="">Total Online Registrations</label>
                <h1>{{ $totalOnlineRegistrations }}</h1>
                <a href="{{ url('course-admin/registration/?export_csv=export_csv&search=&date=&status=&pagination=10') }}" class="text-white">View</a>

            </div>      
        </div>
        
        </div>             
        </div>

    </div>

@endsection