@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12"><a href="#"><img src="{{ asset('images/logo.png') }}" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="login-box">
                        <h2>Reset Password</h2>
                        <h6><a href="{{ route('login') }}" class="primary-color">Login</a></h6>
                        @error('password')
                            <div class="errormsg response_error">{{ $message }}</div>
                        @enderror
                        @error('email')
                            <div class="errormsg response_error">{{ $message }}</div>
                        @enderror
                        <div class="errormsg response_error" style="display:none"></div>
                        <div class="successmsg response_success" style="display:none"></div>
                        
                        <form id="resetPasswordForm" method="post">
                            @csrf
                            <input id="email" type="hidden" class="form-control" name="email" value="{{ $email }}" required readonly>
                            <input id="url" type="hidden" class="form-control" name="url" value="{{ url('updatepassword') }}" required readonly>
                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" autofocus required>
                                <span class="invalid-feedback" role="alert">
                                    <strong class="password_error error_cls"></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong class="password_confirmation_error error_cls"></strong>
                                </span>
                            </div>
                            <div class="form-button mt-5">
                                <button type="button" class="btn primaray-btn update_password">Save password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection