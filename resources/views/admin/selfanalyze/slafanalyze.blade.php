@extends('admin')

@section('content')
    <div class="page-content">
        <div class="page-top-cont">
            <div class="page-title mb-4"><img src="{{ asset('admin/images/company-logo.png') }}" alt="" class="img-fluid pe-2"> <h2>Rogaine</h2></div>
            <!-- <div class="save-button"><a href="#"><span>Save Session</span></a></div> -->
        </div>
        <div class="page-mid-content">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="sky-button"><a href="self-analyze-details"><span>User Session - Start a new session</span></a></div>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="sky-button"><a href="self-analyze-details"><span>User Session-Physician region wise may month Product D</span></a></div>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="sky-button"><a href="self-analyze-details"><span>User Session - Sales channel wise may moth product CV</span></a></div>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="sky-button"><a href="self-analyze-details"><span>User Session - Atena may month products</span></a></div>
                </div>
            </div>
        </div>                
    </div>
@endsection