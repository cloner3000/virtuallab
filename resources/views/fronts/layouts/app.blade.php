<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/css/imagehover.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mahasiswa/css/w3.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    @stack('style')

</head>

<body>
    <!--Navigation bar-->
    <div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('petunjuk') }}">Petunjuk</a></li>
                        <li><a href="{{ route('profil') }}">Profil</a></li>
                        <li><a href="#" onclick="$('#logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!--/ Navigation bar-->
        @include('fronts.layouts.sidebar')

        <div class="badan" style="margin-left: 15%; margin-top: 60px;">
            @yield('content')

            <!--Footer-->
            <footer id="footer" class="footer" style="margin-top: 20px;">
                <div class="container-fluid text-center">
                    ©2018 {{ config('app.name') }}
                </div>
            </footer>
            <!--/ Footer-->
        </div>
        <!--Banner-->
    </div>
    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
    <script src="{{ asset('mahasiswa/js/jquery.min.js') }}"></script>
    <script src="{{ asset('mahasiswa/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('mahasiswa/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('mahasiswa/js/custom.js') }}"></script>
    <script src="{{ asset('mahasiswa/contactform/contactform.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    @stack('script')

</body>
<script type="text/javascript">

</script>

</html>
