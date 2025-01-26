<!DOCTYPE html>
<html lang="en">

    <head>
        <title>LAB SCHOOL
        </title>
        <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script
        src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="description"
            content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project."/>
        <meta
            name="keywords"
            content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive"/>
        <meta name="author" content="codedthemes">
        <!-- Favicon icon -->
              <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link
            rel="icon"
            href="{{ asset('gradient/images/favicon.ico') }}"
            type="image/x-icon">
        <!-- Google font-->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:400,600"
            rel="stylesheet">
        <!-- Required Fremwork -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('gradient/css/bootstrap/css/bootstrap.min.css') }}">
        <!-- themify-icons line icon -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('gradient/icon/themify-icons/themify-icons.css') }}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('gradient/icon/font-awesome/css/font-awesome.min.css') }}">
        <!-- ico font -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('gradient/icon/icofont/css/icofont.css') }}">
        <!-- Style.css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('gradient/css/style.css') }}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('gradient/css/jquery.mCustomScrollbar.css') }}">
    </head>

    <body>

        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">

                @include('layout.navbar')
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        @include('layout.sidebar')
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">

                                        <div class="page-body">
                                          @yield('content')
                                        </div>
                                    </div>

                                    <div id="styleSelector"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <script
            type="text/javascript"
            src="{{ asset('gradient/js/jquery/jquery.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('gradient/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('gradient/js/popper.js/popper.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('gradient/js/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- jquery slimscroll js -->
        <script
            type="text/javascript"
            src="{{ asset('gradient/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <!-- modernizr js -->
        <script
            type="text/javascript"
            src="{{ asset('gradient/js/modernizr/modernizr.js') }}"></script>
        <!-- am chart -->
        <script src="{{ asset('gradient/pages/widget/amchart/amcharts.min.js') }}"></script>
        <script src="{{ asset('gradient/pages/widget/amchart/serial.min.js') }}"></script>
        <!-- Chart js -->
        <script
            type="text/javascript"
            src="{{ asset('gradient/js/chart.js/Chart.js') }}"></script>
        <!-- Todo js -->
        <script
            type="text/javascript "
            src="{{ asset('gradient/pages/todo/todo.js') }} "></script>
        <!-- Custom js -->
        <script
            type="text/javascript"
            src="{{ asset('gradient/pages/dashboard/custom-dashboard.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('gradient/js/script.js') }}"></script>
        <script
            type="text/javascript "
            src="{{ asset('gradient/js/SmoothScroll.js') }}"></script>
        <script src="{{ asset('gradient/js/pcoded.min.js') }}"></script>
        <script src="{{ asset('gradient/js/vartical-demo.js') }}"></script>
        <script src="{{ asset('gradient/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    </body>

</html>
