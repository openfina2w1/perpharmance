@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12"><a href="#"><img src="{{ asset('images/logo.png') }}" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="login-box">
                        <h2>Reset Password</h2>
                        <h6>Existing user? <a href="{{ route('login') }}" class="primary-color">Login</a></h6>
                        @if (session('status'))
                            <div class="successmsg">{{ session('status') }}</div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}" id="send_password_reset_link_form">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required >
                                <span class="invalid-feedback" role="alert">
                                    <strong class="email_error error_cls"></strong>
                                </span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-button mt-5">
                                <button type="button" class="btn primaray-btn send_password_reset_link">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection