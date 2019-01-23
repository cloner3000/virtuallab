<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ labSetting('app_name') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ labSetting('app_logo') }}" type="image/x-icon">

    <!--REQUIRED PLUGIN CSS-->
    <link href="{{ asset('eagle/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eagle/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('eagle/plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <link href="{{ asset('eagle/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('eagle/plugins/spinkit/spinkit.css') }}" rel="stylesheet">

    <!--REQUIRED THEME CSS -->
    <link href="{{ asset('eagle/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('eagle/assets/css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('eagle/assets/css/themes/main_theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('eagle/assets/css/app.css') }}" rel="stylesheet">

    <!--THIS PAGE LEVEL CSS-->
    <style media="screen">
      @media only screen and (max-width: 767px) {
        .layout-fixed .wrapper>section {
          margin-top: 70px;
        }
      }
    </style>

    @stack('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="theme-green light layout-fixed">
<div class="wrapper">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="sk-wave">
                <div class="sk-rect sk-rect1 bg-green"></div>
                <div class="sk-rect sk-rect2 bg-green"></div>
                <div class="sk-rect sk-rect3 bg-green"></div>
                <div class="sk-rect sk-rect4 bg-green"></div>
                <div class="sk-rect sk-rect5 bg-green"></div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- top navbar-->
    @include('mahasiswa.navbar')
    <!-- sidebar-->
    @include('mahasiswa.sidebar')
    <!-- Main section-->
    @yield('contents')
    <!-- FOOTER-->
    <footer>
        <span>{{ labSetting('app_copyright') }}</span>
    </footer>
</div>
    <!-- CORE PLUGIN JS -->
    <script src="{{ asset('eagle/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('eagle/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('eagle/plugins/modernizr/modernizr.custom.js') }}"></script>
    <script src="{{ asset('eagle/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset('eagle/plugins/jQuery-Storage-API/jquery.storageapi.js') }}"></script>
    <script src="{{ asset('eagle/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('eagle/plugins/node-waves/waves.js') }}"></script>

    <!--THIS PAGE LEVEL JS-->
    @stack('scripts')

    <!-- LAYOUT JS -->
    <script src="{{ asset('eagle/assets/js/demo.js') }}"></script>
    <script src="{{ asset('eagle/assets/js/layout.js') }}"></script>

</body>

</html>
