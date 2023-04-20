@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible show">
                    <strong>{{session('error')}}</strong>.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show">
                    <strong>{{session('success')}}</strong>.
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
                <div class="card-header">Admin {{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.send') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Valid Email here" required autocomplete="email" autofocus>

                               
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
