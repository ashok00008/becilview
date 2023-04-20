  
  @extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><p class="login-box-msg"> <h2 class="hidden-xs hidden-sm"><center>LOGIN</center></h2></p></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="registerid" class="col-sm-4 col-form-label text-md-right">{{ __('Register Id') }}</label>

                            <div class="col-md-6">
                                <input id="registerid" type="text" class="form-control{{ $errors->has('registration_id') ? ' is-invalid' : '' }}" name="registration_id"  autofocus>

                                @if ($errors->has('registration_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('registration_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
  