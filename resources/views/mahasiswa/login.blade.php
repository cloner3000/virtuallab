<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Log In | {{ labSetting('app_name') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ labSetting('app_logo') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('eagle/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('eagle/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('eagle/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('eagle/assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-logo">
                            <img src="{{ labSetting('app_logo') }}" alt="" class="img-responsive align-center" width="100px">
                            <p>{{ labSetting('app_name') }}</p>
                        </div>
                    </div>
                </div>
                <form id="log_in" method="post">
                    @csrf
                    <div class="input-group addon-line">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group addon-line">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-blue">
                            <label for="rememberme">Remember Me</label>
                        </div>
                    </div>

                    <button class="btn btn-block btn-primary waves-effect" type="submit">LOG IN</button>

                    <p class="text-muted text-center p-t-20">
                        <small>Do not have an account?</small>
                    </p>

                    <a class="btn btn-sm btn-default btn-block" href="{{ route('register') }}">Create an account</a>

                </form>
            </div>
        </div>
    </div>

    <!-- CORE PLUGIN JS -->
    <script src="{{ asset('eagle/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('eagle/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('eagle/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('eagle/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!--THIS PAGE LEVEL JS-->
    <script src="{{ asset('eagle/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('eagle/assets/js/pages/examples/login.js') }}"></script>

    <!-- LAYOUT JS -->
    <script src="{{ asset('eagle/assets/js/demo.js') }}"></script>

</body>

</html>
