@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12"><a href="#"><img src="images/logo.png" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="login-box">
                        <h2>Sign up</h2>
                        <h6>Existing user? <a href="{{ route('login') }}" class="primary-color">Login</a></h6>
                        <div class="errormsg response_error" style="display:none"></div>
                        <div class="successmsg response_success" style="display:none"></div>
                        <form action="">
                            <div class="step_one">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="first_name_error error_cls"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="last_name_error error_cls"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="Email" placeholder="Company Email" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="email_error error_cls"></strong>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <select class="@error('user_role') is-invalid @enderror" id="user_role" name="user_role" value="{{ old('user_role') }}" autofocus>
                                        <option value="">Select role</option>
                                        @foreach($userrole as $userrole_row)
                                            <option value="{{ $userrole_row->code }}">{{ $userrole_row->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="user_role_error error_cls"></strong>
                                    </span>
                                </div>
                                <div class="form-button mb-4">
                                    <button id="submit" type="button" class="btn primaray-btn get_next_step">Next</button>
                                </div>
                            </div>
                            <div class="step_two" style="display:none">
                                <div class="mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" autocomplete="new-password">
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="password_error error_cls"></strong>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Re-enter password">
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="password_confirmation_error error_cls"></strong>
                                    </span>
                                </div>
                                <div class="form-check d-flex align-center">
                                    <input type="checkbox" class="form-check-input me-2 @error('trams_of_conditions_status') is-invalid @enderror" id="trams_of_conditions_status" name="trams_of_conditions_status">
                                    <label class="form-check-label" for="trams_of_conditions_status">I have read and agree to the terms and conditions</label>
                                    
                                </div>
                                <div class="invalid-feedback" role="alert">
                                    <strong class="trams_of_conditions_status_error error_cls"></strong>
                                </div>
                                <div class="form-button mt-2 mb-3">
                                    <button type="button" class="btn primaray-btn register_btn">Register</button>
                                </div>
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