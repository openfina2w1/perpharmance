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
                <div class="col-lg-6 col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="card-title">All Sessions</div>
                        </div>
                        <div class="card-body">                            
                            <table class="table table-boarded table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Session</th>
                                    </tr>
                                </thead>
                                <tboby>
                                    @if(!$self_analyze_user_sessions->isEmpty())
                                        @foreach($self_analyze_user_sessions as $self_analyze_user_session)
                                        <tr>
                                            <td>{{ $self_analyze_user_session->session_name }}</td>
                                            <td>
                                                <a href="self-analyze-details/{{ $self_analyze_user_session->session_id }}" class="btn btn-primary">View Session</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tboby>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>        
    </div>
@endsection