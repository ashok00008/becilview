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
                        
                        <h3 class="text-center font-weight-bold mt-3">Creation Of Batch</h3><br>

                        <form action="{{route('index')}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-6 ">
                                        <label><b>Aptitude Status :</b></label>
                                        <button type="submit" disabled name="aptitude_status" style="background-color:rgb(31, 167, 4); color:#fff;" class="btn check-btn" value="pass">Pass</button>  
                                        <button type="submit" disabled name="aptitude_status" class="btn btn-danger check-btn"  value="fail">Fail</button> 
                                    </div> 
                                
                            </div>
                            <div class="row d-none not-create">
                                <h2 class="text-center mt-5" style="font-weight: 600;color: #ee1201;"></h2>
                            </div>
                            <div class="allow-create">
                                <div class="row">
                                <table class="table display table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>S.No.</th>
                                            <th>Registration Code</th>
                                            <th>Candidate Name</th>
                                            <th>Marks</th>
                                            <th>File Upload</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidate_data as $candidate)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkbox[]" class="checkbox" value="{{ $candidate->id }}">
                                                    <input type="hidden" name="admsn_id" value="{{ $candidate->id }}">
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $candidate->mit_code }}</td>
                                                <td>{{ $candidate->name }}</td>
                                                <td><input type="text" name="marks" id="" placeholder="Marks"></td>
                                                <td><input type="file" accept="image/jpeg,image/gif,image/png,application/pdf" name="apt_doc" id=""></td>
                                               
                                            </tr> </form>
                                        @endforeach
                                    </tbody>
                                </table>
                                    
                                    
                                </div>
                               
                               
                                
                               
                        </form>
                    </div>

                </div>
            </div>
            <iframe src="" id="parent_iframe" style="display:none;" name="frame"></iframe>
        </div>
    </div>
    {{-- </div> --}}
    @endsection
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script type="text/javascript">

$(document).ready(function () {
            $('.number_validation').on('keyup', function () {
                if (/\D/g.test(this.value))
                this.value = this.value.replace(/\D/g,'')
            });

            $('#checkAll').click(function () {  
                if($('.checkbox').prop('checked') && $('#checkAll').prop('checked',false)){
                    $('.checkbox').prop('checked',false);
                    $('input[type=text], input[type=file]').removeAttr('required');
                    $('input[name="marks_check[]"]').attr('name', 'marks');
                    $('input[name="apt_doc_check[]"]').attr('name', 'apt_doc');
                    $('input[type="hidden"]').slice(2).attr('name', 'admsn_id');
                } else{
                    $('.checkbox').prop('checked',true);
                    $('input[type=text], input[type=file]').attr('required', 'required');
                    $('input[name="marks"]').attr('name', 'marks_check[]');
                    $('input[name="apt_doc"]').attr('name', 'apt_doc_check[]');
                    $('input[type="hidden"]').slice(2).attr('name', 'admsn_id_check[]');
                }
            });

            $('.checkbox').click(function () {  
                var checked = $(this).parent().parent();
                if( $('.checkbox').is(":checked")){
                    $(this).next().attr('name', 'admsn_id_check[]');
                    checked.children().eq(4).children().eq(0).attr('name', 'marks_check[]');
                    checked.children().eq(5).children().eq(0).attr('name', 'apt_doc_check[]');
                    checked.children().eq(4).children().eq(0).attr('required', 'required');
                    checked.children().eq(5).children().eq(0).attr('required', 'required');
                    $('#checkAll').prop('checked',false);
                } else{
                    $(this).next().attr('name', 'admsn_id');
                    checked.children().eq(4).children().eq(0).attr('name', 'marks');
                    checked.children().eq(5).children().eq(0).attr('name', 'apt_doc');
                    checked.children().eq(4).children().eq(0).removeAttr('required');
                    checked.children().eq(5).children().eq(0).removeAttr('required');
                    $('#checkAll').prop('checked',true);
                }
            });

            
            $('.checkbox, #checkAll').change(function () { 
               if( $('input[type=checkbox]').is(":checked")){
                    $('.check-btn').prop('disabled', false);
                } else{
                    $('.check-btn').prop('disabled', true);
                }
            });

});     
</script>

