@extends('courses.admin_master')
@section('main-content')
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
    <div class="content-wrapper" style="overflow: hidden; padding: 10px 20px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">

                    <div class="container col-sm-12">
                        
                        <h3 class="text-center font-weight-bold mt-3">Candidate Aptitude Test List</h3><br>

                                          
                            <div class="row">
                                @if (session('alert_status'))
                                    <h6 class="alert alert-success">{{ session('alert_status') }}</h6>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif
                            </div>
                            
                        
                            <div class="container col-sm-12 mx-auto" >
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Registration code</th>
                                            <th>Student Name</th>
                                            <th>Marks</th>
                                            <th>Status</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        ?>
                                        @foreach ($candidate_data as $candidate)
                                            <tr>
                                               <td>{{ $loop->iteration }}</td>
                                                <td>{{ $candidate->CandidateData->mit_code  }}</td>
                                                <td>{{ $candidate->CandidateData->name }}</td>
                                                <td>{{ $candidate->marks }}</td>
                                                 <td><span class="badge p-2 badge-lg badge-{{ ($candidate->aptitude_status=='pass') ? 'success' : 'danger' }}">{{ $candidate->aptitude_status }}</span></td>
                                               <td>
                                                @php $file = str_replace('/', '_', $candidate->CandidateData->mit_code); @endphp
                                                    <a href="../documents/course_documents/aptitude/{{ $file.'/'.$candidate->aptitude_doc }}" target="_blank" class="btn btn-primary">View Attachment</a>
                                                </td>
                                             
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
@endsection
   
