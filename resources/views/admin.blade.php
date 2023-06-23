<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-- Welcome To Teligence Dashboard --</title>
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/sweetalert2.min.css') }}">
    <!-- multiselect -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <!-- multiselect -->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <!-- Date Piceker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
    <!-- Date Piceker-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

</head>
    <body id="widget">
        @include('include.sidebar')
        <div id="main-content">
            @include('include.navbar')
            <div id="page-container">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>


        <script src="{{ asset('admin/js//jquery.min.js') }}"></s>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>
        <!-- Custom js for this page-->
        <!-- <script src="{{ asset('admin/js/data-table.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script> -->
        <script src="{{ asset('admin/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <!-- End custom js for this page-->        
        <!-- Date Piceker-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Date Piceker-->
        <!-- multiselect -->
        <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
        <!-- multiselect -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    </body>
</html>
