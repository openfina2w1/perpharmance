@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12"><a href="#"><img src="{{ asset('images/logo.png') }}" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="login-box">
                        <h2>Sign in</h2>
                        <h6>New user? <a href="{{ route('register') }}" class="primary-color">Create an account</a></h6>
                        @error('email')
                            <div class="errormsg response_error">{{ $message }}</div>
                        @enderror
                        @error('password')
                            <div class="errormsg response_error">Incorrect username or password</div>
                        @enderror
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required >
                            </div>
                            <div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-button mt-5">
                                <button id="submit" type="submit" class="btn primaray-btn">Log In</button>
                            </div>
                            @if (Route::has('password.request'))
                                <!-- <h6 class="mt-2"><a href="{{ route('password.request') }}" class="primary-color" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password</a></h6> -->
                                <h6 class="mt-2"><a href="" class="primary-color" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password</a></h6>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Popup Start-->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-box">
                        <h2 class="mb-3">Forgot Password</h2>
                        @if (session('status'))
                            <div class="successmsg">{{ session('status') }}</div>
                        @endif
                        <div class="errormsg response_error" style="display:none"></div>
                        <div class="successmsg response_success" style="display:none"></div>
                        <form method="POST" action="{{ route('password.email') }}" id="send_password_reset_link_form">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email_reset" name="email" placeholder="Email" required >
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
                        <!-- <form action="">
                            <div class="mb-3">
                                <input type="password" class="form-control" id="" placeholder="Old Password" required>
                                </div>
                                <div class="mb-3">
                                <input type="password" class="form-control" id="" placeholder="New Password" required>
                                </div>
                                <div class="mb-3">
                                <input type="password" class="form-control" id="" placeholder="Confirm password" required>
                                </div>
                                <div class="form-button mt-5">
                                <button id="submit" type="submit" class="btn primaray-btn">Save password</button>
                            </div>
                        </form> -->
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
                </div>
            </div>
        </div>
        <!-- Modal Popup Start-->
    </div>
@endsection