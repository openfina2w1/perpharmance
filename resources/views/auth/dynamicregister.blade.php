<style>
    .number_class{
        float: left;
        /* margin-top: 6px; */
        position: absolute;
        z-index: 99;
        /* left: 13px; */
        background: #adb5bd;
        width: 35px;
        height: 38px;
        text-align: center;
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <!-- <div class="col-lg-12 col-md-12 col-sm-12"><a href="#"><img src="images/logo.png" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div> -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login-box">
                        <h2 class="mb-3">Registration</h2>
                        <div class="errormsg response_error" style="display:none"></div>
                        <div class="successmsg response_success" style="display:none"></div>
                        <form action="">
                            <input type="hidden" id="token" name="token" value="{{ $token }}">
                            <input type="hidden" id="url" name="url" value="{{ url('adduser') }}">
                            <input type="hidden" id="surl" name="surl" value="{{ url('submituser') }}">
                            <input type="hidden" id="susurl" name="susurl" value="{{ url('success') }}">
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
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="Email" placeholder="Email" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="email_error error_cls"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <div class="ph-no-wrap">
                                            <div class="ph-no first-child">
                                                <div class="number_class d-flex align-items-center justify-content-center text-white fw-bold">+1</div>
                                                <input type="text" class="form-control @error('contact_number_1') is-invalid @enderror" onkeypress="validate(event)" id="contact_number_1" name="contact_number_1" value="{{ old('contact_number_1') }}" maxlength="3" required autocomplete="contact_number_1" placeholder="000" style="padding-left:45px">
                                            </div>  
                                            <div class="ph-no">
                                                <input type="text" class="form-control @error('contact_number_2') is-invalid @enderror" onkeypress="validate(event)" id="contact_number_2" name="contact_number_2" value="{{ old('contact_number_2') }}" maxlength="3" required autocomplete="contact_number_2" placeholder="000" >
                                            </div>  
                                            <div class="ph-no">
                                                <input type="text" class="form-control @error('contact_number_3') is-invalid @enderror" onkeypress="validate(event)" id="contact_number_3" name="contact_number_3" value="{{ old('contact_number_3') }}" maxlength="4" required autocomplete="contact_number" placeholder="0000" >
                                            </div>
                                        </div>  
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="contact_number_error error_cls"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
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
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" placeholder="Company Name" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="company_name_error error_cls"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <textarea id="company_address" class="form-control @error('company_address') is-invalid @enderror" placeholder="Company Address" name="company_address" value="{{ old('company_address') }}" required autocomplete="company_address" autofocus>{{ old('company_address') }}</textarea>
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="company_address_error error_cls"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" placeholder="Zip Code" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="zip_code_error error_cls"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Company Address" name="autocomplete" id="autocomplete" />
                                        <input type="text" class="form-control" placeholder="Company Address" name="latitude" id="latitude" />
                                        <input type="text" class="form-control" placeholder="Company Address" name="longitude" id="longitude" />
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-button mb-4">
                                <button type="button" class="btn primaray-btn add_user_btn">Add User</button>
                            </div>
                        </form>
                        <div class="col-lg-12 col-md-12 col-sm-12 show_data">
                            <div class="row">
                                <div class="col-md-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-boarded table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact Number</th>
                                                        <th>Role</th>
                                                        <th>Company Name</th>
                                                        <th>Company Address</th>
                                                        <th>Zip Code</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tboby>
                                                    @if(!$temp_users->isEmpty())
                                                        @foreach($temp_users as $user)
                                                            <tr>
                                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{{ str_split($user->contact_number)[0].''.str_split($user->contact_number)[1].'-'.str_split($user->contact_number)[2].''.str_split($user->contact_number)[3].''.str_split($user->contact_number)[4].'-'.str_split($user->contact_number)[5].''.str_split($user->contact_number)[6].''.str_split($user->contact_number)[7].'-'.str_split($user->contact_number)[8].''.str_split($user->contact_number)[9].''.str_split($user->contact_number)[10].''.str_split($user->contact_number)[11] }}}</td>
                                                                <td>{{ $user->user_role }}</td>
                                                                <td>{{ $user->company_name }}</td>
                                                                <td>{{ $user->company_address }}</td>
                                                                <td>{{ $user->zip_code }}</td>
                                                                <td>
                                                                    <a class="btn btn-danger text-white temp_user_delete tempdel{{ $user->id }}" data-id="{{ $user->id }}" data-url="{{ url('delete-temp-user') }}" data-token="{{ $token }}">Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="8"><h6>No data found !</h6></td>
                                                        </tr>
                                                    @endif
                                                </tboby>
                                            </table>  

                                            <div class="form-button mb-4 d-flex justify-content-end position-relative"> 
                                                <div class="d-flex align-items-center justify-content-center me-3">
                                                    <input type="checkbox" class="form-check-input me-2 mt-0 @error('trams_of_conditions_status') is-invalid @enderror" id="trams_of_conditions_status" name="trams_of_conditions_status">
                                                    <label class="form-check-label" for="trams_of_conditions_status">Disclaimer & Terms and conditions</label>
                                                </div> 
                                                <div class="form-button required-field">
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong class="trams_of_conditions_status_error error_cls"></strong>
                                                    </div>  
                                                </div>                                             
                                                @if(!$temp_users->isEmpty())
                                                    <button type="button" class="btn primaray-btn submit_user_btn">Submit</button>
                                                @else
                                                    <button class="btn primaray-btn opacity-25 pe-none">Submit</button>
                                                @endif  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection