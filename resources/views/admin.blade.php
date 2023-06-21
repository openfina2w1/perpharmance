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
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

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

        

        <script src="{{ asset('admin/js//jquery.min.js') }}"></script>
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
        <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script> -->
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>


        <script>
            $("#btnSave").click(function() {   
                // var nestedChild = document.getElementById('btnSave');
                // nestedChild.remove();  
                html2canvas(document.querySelector("#widget")).then(canvas => {
                    // document.body.appendChild(canvas);
                    Canvas2Image.saveAsJPEG(canvas);
                    document.body.removeChild(canvas);
                    // document.querySelector('#content_head').insertAdjacentHTML(
                    //     'afterend',
                    //     `<div class="save-button" id="save_button">
                    //         <a id="btnSave" style="cursor:pointer"><span>Save Session</span></a>
                    //     </div> `      
                    // )
                });
            });

            function addHtml () {
                document.querySelector('#content_head').insertAdjacentHTML(
                    'afterend',
                    `<div class="save-button" id="save_button">
                        <a id="btnSave" style="cursor:pointer"><span>Save Session</span></a>
                    </div> `      
                )
            }

            // html2canvas(document.querySelector("#widget")).then(canvas => {
            //     document.body.appendChild(canvas)
            //     // document.querySelector("#result_div").append(canvas);
            //     var cvs = document.querySelector("canvas");
            //     var btn = document.querySelector("#btnSave");
            //     btn.href = cvs.toDataURL();
            //     var d = new Date();
            //     var time = d.getTime();
            //     btn.download = time+".jpg";
            // });

            // new MultiSelectTag('product')  
        </script>

    </body>
</html>
