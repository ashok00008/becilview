@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="padding: 30px">
                    <form method="POST" action="{{ route('reset-password-store') }}">
                        {{ csrf_field() }}
                        @if(Session::has('messages'))
                            <div class="form-group">
                                <p class="alert alert-success"><strong>{{ Session::get('messages') }}</strong></p>
                            </div>
                        @endif

                        @if(Session::has('messages_error'))
                            <div class="form-group">
                                <p class="alert alert-danger"><strong>{{ Session::get('messages_error') }}</strong></p>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="new password">Enter New Password</label>
                            <input type="password" name="password" placeholder="New Password" class="form-control">
                            <input type="hidden" name="urlToken" value="{{ $token }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
