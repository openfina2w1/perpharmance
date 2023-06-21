@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12"><a href="#"><img src="{{ asset('images/logo.png') }}" alt="PerPharmance Insights" title="PerPharmance Insights"/></a></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="login-box">
                        <input type="hidden" id="mailurl" name="mailurl" value="{{ url('sendmail') }}">
                        <input type="hidden" id="token" name="token" value="{{ $token }}">
                        <h2>Thanks for signing up!</h2>
                        <!-- <h3>An administrator is currently reviewing your request.</h3> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout( function() {
            // function sendregmail(){
                console.log($('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    url: $("#mailurl").val(),
                    type: 'POST',
                    data: { "_token": $('meta[name="csrf-token"]').attr('content'), "token": $("#token").val() },
                    dataType: 'json',
                    success: function(response) {
                        console.log("response: ",response);
                    },
                    error: function(xhr, status, error) {
                        console.log("response: ",xhr?.responseJSON?.errors);
                    },
                });
            // }
        }, 2000);
    </script>
@endsection