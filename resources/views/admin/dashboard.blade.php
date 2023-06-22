@extends('admin')

@section('content')
    <div class="page-content">
        <div class="page-title mb-4"><img src="{{ asset('admin/images/company-logo.png') }}" alt="" class="img-fluid pe-2"> <h2>Johnson &amp; Johnson - Company profile</h2></div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">User information</div>
                        <div class="icon"><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <span class="head">User Name:</span>
                            <span class="normal user_name">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Contact:</span>
                            <span class="normal contact_number">{{{ str_split($user->contact_number)[0].''.str_split($user->contact_number)[1].'-'.str_split($user->contact_number)[2].''.str_split($user->contact_number)[3].''.str_split($user->contact_number)[4].'-'.str_split($user->contact_number)[5].''.str_split($user->contact_number)[6].''.str_split($user->contact_number)[7].'-'.str_split($user->contact_number)[8].''.str_split($user->contact_number)[9].''.str_split($user->contact_number)[10].''.str_split($user->contact_number)[11] }}}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Address:</span>
                            <span class="normal company_address">{{ $user->company_address }}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">State:</span>
                            <span class="normal state">{{ $user->state }}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Zip:</span>
                            <span class="normal zip_code">{{ $user->zip_code }}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Country:</span>
                            <span class="normal country">{{ $user->country }}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Designation:</span>
                            <span class="normal user_role">{{ $user->user_role }}</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Department:</span>
                            <span class="normal department">{{ $user->department }}</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Billing</div>
                        <div class="icon"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <span class="head">Invoice to:</span>
                            <span class="normal">Johnson &amp; Johnson</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Contact:</span>
                            <span class="normal">Brandy Wills</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Address:</span>
                            <span class="normal">15532 Lexington Blvd New York, NY 10010</span>
                        </div>
                        <div class="box-row">
                            <span class="head">Deliver to:</span>
                            <span class="normal">B.Wills@jandj.com</span>
                        </div>
                        <p class="text-end text-primary"><a href="#">View Statements</a></p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Users</div>
                        <div class="icon"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <div class="profile-section">
                                <div class="profile-pic pe-3"><img src="{{ asset('admin/images/Profile Photo-1.png') }}" alt=""></div>
                                <div class="profile-info">
                                    <div class="name">Cary Alexander</div>
                                    <div class="designtion">Business User</div>
                                </div>
                            </div>
                            <span class="normal text-success">Active</span>
                        </div>
                        <div class="box-row">
                            <div class="profile-section">
                                <div class="profile-pic pe-3"><img src="{{ asset('admin/images/Profile Photo-2.png') }}" alt=""></div>
                                <div class="profile-info">
                                    <div class="name">Tyler Alexander</div>
                                    <div class="designtion">Data Analyst</div>
                                </div>
                            </div>
                            <span class="normal text-success">Active</span>
                        </div>
                        <div class="box-row">
                            <div class="profile-section">
                                <div class="profile-pic pe-3"><img src="{{ asset('admin/images/Profile Photo-3.png') }}" alt=""></div>
                                <div class="profile-info">
                                    <div class="name">Brandy Wills</div>
                                    <div class="designtion">Administrator</div>
                                </div>
                            </div>
                            <span class="normal text-success">Active</span>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Products (mkt rank)</div>
                        <div class="icon"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <span class="head text-primary">Rogaine (2)</span>
                            <span class="normal">Jan 13, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">Prednizone (1)</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">Rosuvastatin (18)</span>
                            <span class="normal">Jul 8, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">Lunesta (5)</span>
                            <span class="normal">Jul 8, 2023</span>
                        </div>
                        <p class="text-end text-primary"><a href="#">click product for market share analysis</a></p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Uploads</div>
                        <div class="icon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body pb-5">
                        <div class="panel-wrapper">
                            <a href="#show" class="show btn" id="show">view all</a> 
                            <a href="#hide" class="hide btn" id="hide">view less</a> 
                            <div class="panel">
                                <div class="box-row">
                                    <span class="head text-primary">ALEX-001</span>
                                    <span class="normal">Jan 13, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">ALEX-001</span>
                                    <span class="normal">Jan 13, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                                <div class="box-row">
                                    <span class="head text-primary">WILL-045</span>
                                    <span class="normal">Mar 30, 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Products</div>
                        <div class="icon"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <span class="head text-primary">Rogaine</span>
                            <span class="normal">Jan 13, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">Prednizone</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">Rosuvastatin</span>
                            <span class="normal">Jul 8, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">Lunesta</span>
                            <span class="normal">Jul 8, 2023</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Uploads</div>
                        <div class="icon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <span class="head text-primary">ALEX-001</span>
                            <span class="normal">Jan 13, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">ALEX-001</span>
                            <span class="normal">Jan 13, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">WILL-045</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">WILL-045</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">WILL-045</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">Support tickets</div>
                        <div class="icon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="box-row">
                            <span class="head text-primary">ALEX-001</span>
                            <span class="normal">Jan 13, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">ALEX-001</span>
                            <span class="normal">Jan 13, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">WILL-045</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">WILL-045</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        <div class="box-row">
                            <span class="head text-primary">WILL-045</span>
                            <span class="normal">Mar 30, 2023</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- row end-->        
    </div>
    <!-- Modal -->
    <div class="modal modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog card">
              <div class="modal-content ">
                <div class="modal-header card-header">
                  <h5 class="modal-title card-title" id="exampleModalLabel">Edit Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-popup">
                    <div class="errormsg response_error" style="display:none"></div>
                    <div class="successmsg response_success" style="display:none"></div>
                    <div class="container-fluid">
                        <form id="profile_edit_form" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-3 ps-0"><label for="avatar" class="form-label">Your Photo</label></div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center">
                                        <span class="photo" title="Upload your Avatar!">
                                            <img id="output" src="{{ asset('uploads/profile/'.$user->profile_image) }}" />
                                        </span>
                                        <input type="file" id="profile_image" name="profile_image" class="btn" class="handle_profile_image" onChange="handleImage(event)" />
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="first_name" class="form-label">First Name <span class="small text-danger">*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name" value="{{ $user->first_name }}" placeholder="First Name">
                                <div class="first_name_error cls_err"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle_name" class="form-label">Middle Name (Optional)</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" aria-describedby="middle_name" value="{{ $user->middle_name }}" placeholder="Middle Name">
                                <div class="middle_name_error cls_err"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name" class="form-label">Last Name <span class="small text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name" value="{{ $user->last_name }}" placeholder="Last Name">
                                <div class="last_name_error cls_err"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="contact_number" class="form-label">Contact No <span class="small text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" aria-describedby="contact_number" value="{{ $user->contact_number }}" placeholder="212-555-5555">
                                <div class="contact_number_error cls_err"></div>
                            </div>
                            <div class="row mb-3">
                                <label for="company_address" class="form-label">Address <span class="small text-danger">*</span></label>
                                <textarea class="form-control" id="company_address" name="company_address" cols="30" rows="auto" placeholder="Put your address">{{ $user->company_address }}</textarea>
                                <div class="company_address_error cls_err"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 ps-0">
                                    <label for="state" class="form-label">State</label>
                                    <div class="custom-select">
                                        <select id="state" name="state" class="form-control">
                                            <option value="">Select state</option>
                                            @foreach($state as $state_row)
                                                <option value="{{ $state_row->state_name }}" {{ $user->state == $state_row->state_name ? 'selected' : '' }}>{{ $state_row->state_name }}</option>
                                            @endforeach     
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <label for="zip_code" class="form-label">Zip <span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" aria-describedby="zip" value="{{ $user->zip_code }}" placeholder="0123">
                                    <div class="zip_code_error cls_err"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="zip" class="form-label">Country</label>
                                    <div class="custom-select">
                                        <select class="form-control" id="country" name="country">
                                            <option value="">select country</option>
                                            @foreach($country as $country_row)
                                                <option value="{{ $country_row->country_name }}" {{ $user->country == $country_row->country_name ? 'selected' : '' }}>{{ $country_row->country_name }}</option>
                                            @endforeach     
                                        </select>                                   
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 ps-0">
                                    <label for="designation" class="form-label">Designation:</label>
                                    <div class="custom-select">
                                        <select id="user_role" name="user_role" class="form-control">
                                            <option value=""> Select designation</option>
                                            @foreach($userrole as $userrole_row)
                                                <option value="{{ $userrole_row->code }}" {{ $user->user_role == $userrole_row->code ? 'selected' : '' }}>{{ $userrole_row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department:</label>
                                    <div class="custom-select">
                                        <select id="department" name="department" class="form-control">
                                            <option value=""> Select department</option>
                                            @foreach($department as $department_row)
                                                <option value="{{ $department_row->department_name }}" {{ $user->department == $department_row->department_name ? 'selected' : '' }}>{{ $department_row->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                           <div class="row mb-3">                            
                                <button type="submit" class="btn btn-primary w-25 btn_edit_profile">Submit</button>
                           </div> 
                        </form>
                    </div>
                  </div>
              
              </div>
            </div>
        </div>
    <!-- Modal End-->
@endsection