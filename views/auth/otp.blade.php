@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             @if (session('messages'))
                <div class="alert alert-danger alert-dismissible show">
                    <strong>{{session('messages')}}</strong>.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success alert-dismissible show">
                <strong>{{session('success')}}</strong>.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Admin {{ __('Login') }}</div>
               
                <div class="card-body">
                <form method="POST" action="{{route('admin.otp.verify')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Enter OTP') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" value="" required  autofocus maxlength="6">

                               
                            </div>
                        </div>
                        <div id="countdown"> </div>
                        <a href="{{route('admin.otp.resend', ['email' => Crypt::decryptString(request('email'))])}}" id="resend"></a>
                   
                      
                    <input type="hidden" name="email" value="{{ Crypt::decryptString(request('email')) }}">    
                     

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify OTP') }}
                                </button>

                                
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    var timeleft = 30;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Did not Receive OTP ?";
    document.getElementById("resend").innerHTML = "Resend OTP";
  } else {
    document.getElementById("countdown").innerHTML = 'Time : ' + timeleft + " Sec.";
  }
  timeleft -= 1;
}, 1000);


</script>
<style type="text/css">
#countdown{
    float: right;
    color: green;
}

</style>
