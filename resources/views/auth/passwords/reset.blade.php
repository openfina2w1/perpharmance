@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12"><a href="#"><img src="{{ asset('images/logo.png') }}" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="login-box">
                        <h2>Reset Password</h2>
                        <h6>New user? <a href="{{ route('register') }}" class="primary-color">Create an account</a></h6>
                        @error('password')
                            <div class="errormsg response_error">{{ $message }}</div>
                        @enderror
                        @error('email')
                            <div class="errormsg response_error">{{ $message }}</div>
                        @enderror
                        <form id="resetPasswordForm" method="post" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"  readonly>
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
                                <button type="button" class="btn primaray-btn reset_password">Save password</button>
                            </div>
                            <div class="option-text"> or</div>
                            <div class="black-button mb-3">
                                <a href="#"><span><i class="fa fa-facebook" aria-hidden="true"></i> Continue with Google</span></a>
                            </div>
                            <div class="blue-button">
                                <a href="#"><span><i class="fa fa-facebook" aria-hidden="true"></i> Continue with Microsoft</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection