@extends('admin')

@section('content')
    <div class="page-content">
        <div class="page-top-cont">
            <div class="page-title mb-4" id="content_head"><h2>Self Analyze - New User Session</h2></div>
            <div class="save-button" id="save_button">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer"><span>Save Session</span></a>
            </div> 
        </div>
        <div class="errormsg response_error" style="display:none"></div>
        <div class="successmsg response_success" style="display:none"></div>
        <div class="page-mid-content"> 
                <!-- self analyze bottom section start-->
                <div class="card my-3 shadow-none">
                    <div class="card-body">
                        <div id="line_top_x" class="chart"></div>
                    </div>
                </div>
                <input type="hidden" id="session_id" name="session_id" value="{{ $session_id }}" />
                <div class="commernt-post">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card shadow-none">
                                <div class="card-header"><h5> Put Your Comment  </h5></div>
                                <div class="card-body">
                                    <textarea name="comment" id="comment" rows="5" class="post-comment mb-2" placeholder="Put your valueable comments..."></textarea>
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="comment_error error_cls"></strong>
                                    </span>
                                    <div>
                                        <button type="button" class="btn btn-primary btn_save_comment">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card shadow-none">
                                <div class="card-header"><h5> All Comments </h5></div>
                                    <div class="card-body" id="comment_data">
                                        <div class="row" style="height: 205px; overflow: auto">
                                            <div class="col-md-12 comment-section">
                                                <div class="comment-store">
                                                    <div class="form-group">
                                                        <!-- <input type="checkbox" id="date"> -->
                                                        <label for="date"><strong>Date </strong></label>
                                                        <p> Comment</p>
                                                    </div>
                                                </div>
                                                
                                                @if(!$comments->isEmpty())
                                                    @foreach($comments as $comment)
                                                        <div class="comment-store">
                                                            <div class="form-group">
                                                                <label for="date1"><strong>{{ date('m-d-Y', strtotime($comment->created_at)) }}</strong></label>
                                                                <p>{{ $comment->comment }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="comment-store">
                                                        <div class="form-group">
                                                            <p>No data found</p>
                                                        </div>
                                                    </div>                                                    
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>

                <!-- self analyze bottom section end-->
            </div>
        </div>
        
    </div>
    <!-- Modal -->
    <div class="modal modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog card">
            <div class="modal-content ">
                <div class="modal-header card-header">
                    <h5 class="modal-title card-title" id="exampleModalLabel">Save Session</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-popup">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <label for="session_name" class="form-label">Session Name <span class="small text-danger">*</span></label>
                            <input type="text" class="form-control" id="session_name" name="session_name" value="{{ isset($self_analyze_user_session->session_name) ? $self_analyze_user_session->session_name : '' }}" placeholder="Session Name">
                            <div class="session_name_error cls_err"></div>
                        </div>
                        <div class="row mb-3">                            
                            <button type="button" class="btn btn-primary w-25" id="btn_save_session">Save</button>
                        </div> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <!-- Modal End-->
@endsection