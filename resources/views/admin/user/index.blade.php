@extends('admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="alert alert-success response_success" style="display: none;"></div>
            <div class="alert alert-danger response_error" style="display: none;"></div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-boarded table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tboby>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_role }}</td>
                                    <td>
                                        <a data-id="{{ $user->id }}" class="btn btn-success text-white verify_btn verify_btn{{ $user->id }}">Verify</a>
                                        <a href="#" data-id="{{ $user->id }}" class="btn btn-danger text-white verify_reject_btn verify_reject_btn{{ $user->id }}">Reject</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tboby>
                    </table>  
                    <div>
                        {{ $users->links() }}
                    </div>                    
                </div>
            </div>
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                            <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="user_id" />
                            <div class="form-group">
                                <textarea class="form-control" id="reject_cause" placeholder="Enter reject cause..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn_user_reject">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection