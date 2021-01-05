<!doctype html>
<html class="no-js" lang="en" id="entire_html">

<head>
    <meta charset="gb18030">


    <title>
        @section('title')
        | IPTV
        @show
    </title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/components.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/custom.css') }}" />

    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{ url('public/vendors/toastr/css/toastr.min.css') }}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/pages/toastr.css') }}" />

    <link type="text/css" rel="stylesheet" href="{{ url('public/vendors/sweetalert/css/sweetalert2.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/pages/sweet_alert.css') }}" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--End of Global styles-->

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ url('public/favicon.png') }}" type="image/png">

    <!--====== jquery js ======-->
    <style>
        .invalid-feedback1 {
            color: red;
            font-size: 16px;
            background-color: #ffcaca;
            background-size: 24px 24px;
            background-repeat: no-repeat;
            background-position: 2px;
            padding: 5px;
            border-radius: 5px 5px 5px;
            border: 1px solid red;
            padding-left: 25px;
            position: relative;
            display: block;
            margin: 8px;
        }

        .invalid-feedback2 {
            color: #2f35ff;
            font-size: 16px;
            background-color: #47e430;
            background-size: 24px 24px;
            background-repeat: no-repeat;
            background-position: 2px;
            padding: 5px;
            border-radius: 5px 5px 5px;
            border: 1px solid #47e430;
            padding-left: 25px;
            position: relative;
            display: block;
            margin: 8px;
        }
    </style>

    @yield('header_styles')
</head>

<body class="fixedNav_position fixedMenu_left">
    <div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
        <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: absolute;
z-index: 999999">
            <img src="{{ url('public/img/loader.gif') }}" style="width: 40px;" alt="Cargando...">
        </div>
    </div>
    <div id="wrap">
        <div id="top" class="fixed">
            <!-- .navbar -->
            <nav class="navbar navbar-static-top">
                <div class="container-fluid m-0">
                    <a class="navbar-brand" href="">
                        <h4><img src="{{ url('public/favicon.png') }}" class="admin_img" alt="logo">Control Panel</h4>
                    </a>
                    <div class="menu mr-sm-auto">
                        <span class="toggle-left" id="menu-toggle">
                            <i class="fa fa-bars"></i>
                        </span>
                    </div>
                    <div class="topnav dropdown-menu-right">
                        <div class="btn-group">
                            <div class="user-settings no-bg">
                                <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                    <img src="{{ Auth::user()->avatar ? url('public/img/avatar/'. Auth::user()->avatar) : url('public/img/admin.jpg') }}" class="admin_img2 img-thumbnail rounded-circle avatar-img" alt="avatar"> <strong>{{ Auth::user()->name }}</strong>
                                    <span class="fa fa-sort-down white_bg"></span>
                                </button>
                                <div class="dropdown-menu admire_admin">
                                    @if(Auth::user()->role == 0)
                                    <a class="dropdown-item title" href="#">
                                        Admin</a>
                                    @elseif(Auth::user()->role == 1)
                                    <a class="dropdown-item title" href="#">
                                        Cliente</a>
                                    @else
                                    <a class="dropdown-item title" href="#">
                                        Empleado</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>
                                        Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- /.container-fluid -->
        </div>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
    <!-- /#top -->
    <div class="wrapper fixedNav_top">
        <div id="left" class="fixed">
            <div class="menu_scroll">
                <div class="left_media">
                    <div class="media user-media">
                        <div class="user-media-toggleHover">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="user-wrapper">
                            <a class="user-link" href="">
                                <img class="media-object img-thumb  nail user-img rounded-circle admin_img3" alt="User Picture" src="{{ url('public/img/admin.jpg') }}">
                                <p class="user-info menu_hide"> {{ Auth::user()->name }}</p>
                            </a>
                        </div>
                    </div>
                    <hr />
                </div>
                <ul id="menu">
                    <li @if(request()->segment(1) == 'room') class="active"
                        @endif>
                        <a href="{{ Route('room') }}">
                            <i class="fa fa-home"></i>
                            &nbsp; Rooms
                        </a>
                    </li>
                    <li @if(request()->segment(1) == 'device') class="active"
                        @endif>
                        <a href="{{ Route('device') }}">
                            <i class="fa fa-mobile-alt"></i>
                            &nbsp; Devices
                        </a>
                    </li>
                    <li @if(request()->segment(1) == 'category') class="active"
                        @endif>
                        <a href="{{ Route('category') }}">
                            <i class="fa fa-tag"></i>
                            &nbsp; Categories
                        </a>
                    </li>
                    <li @if(request()->segment(1) == 'channel') class="active"
                        @endif>
                        <a href="{{ Route('channel') }}">
                            <i class="fa fa-satellite-dish"></i>
                            &nbsp; Channels
                        </a>
                    </li>
                </ul>
                <!-- /#menu -->
            </div>
        </div>
        <!-- /#left -->
        <div id="content" class="bg-container">
            <!-- Content -->
            @yield('content')
            <!-- Content end -->
        </div>

        <!-- /#content -->
    </div>
    <script type="text/javascript" src="{{ url('public/js/components.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/swal_natalya.js') }}"></script>

    <script type="text/javascript" src="{{ url('public/js/pages/sweet_alerts.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/vendors/sweetalert/js/sweetalert2.min.js') }}"></script>

    </div>
    <!-- /#wrap -->

    <!-- global scripts-->
    <!--End of Global scripts-->

    <!--Plugin scripts-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>-->
    <script type="text/javascript" src="{{ url('public/vendors/Buttons/js/scrollto.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/vendors/Buttons/js/buttons.js') }}"></script>
    @yield('footer_scripts')

</body>

</html>
