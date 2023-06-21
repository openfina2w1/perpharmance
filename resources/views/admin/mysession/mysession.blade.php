@extends('admin')

@section('content')
    <div class="page-content">
        <div class="page-top-cont">
            <div class="page-title mb-4"><!--img src="images/company-logo.png" alt="" class="img-fluid pe-2"--> <h2>My Sessions </h2></div>
            <div class="custom-select-withbluebg">
                <select name="" id="">
                    <option value="">Create a new Session</option>
                    <option value="">Self Analyze</option>
                    <option value="">Smart Analyze</option>
                </select> 
            </div>
            </div>
        </div>
        <div class="page-mid-content">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="card-title">Your Sessions</div>
                        </div>
                        <div class="card-body">
                            @if(!$self_analyze_user_sessions->isEmpty())
                                @foreach($self_analyze_user_sessions as $self_analyze_user_session)
                                    <div class="box-row">
                                        <span class="head">
                                            <a href="self-analyze-details/{{ $self_analyze_user_session->session_id }}" class="btn btn-primary btn_save_comment">{{ date('m-d-Y', strtotime($self_analyze_user_session->created_at)) }}</a>
                                        </span>
                                    </div>
                                @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6">
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
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="card-title">All Users</div>
                            <div class="icon"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="box-row">
                                <div class="profile-section">
                                    <div class="profile-pic pe-3"><img src="images/Profile Photo-1.png" alt=""></div>
                                    <div class="profile-info">
                                        <div class="name">Cary Alexander</div>
                                        <div class="designtion">Business User</div>
                                    </div>
                                </div>
                                <span class="normal text-success">Active</span>
                            </div>
                            <div class="box-row">
                                <div class="profile-section">
                                    <div class="profile-pic pe-3"><img src="images/Profile Photo-2.png" alt=""></div>
                                    <div class="profile-info">
                                        <div class="name">Tyler Alexander</div>
                                        <div class="designtion">Data Analyst</div>
                                    </div>
                                </div>
                                <span class="normal text-success">Active</span>
                            </div>
                            <div class="box-row">
                                <div class="profile-section">
                                    <div class="profile-pic pe-3"><img src="images/Profile Photo-3.png" alt=""></div>
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
            </div>
        </div>        
    </div>
@endsection