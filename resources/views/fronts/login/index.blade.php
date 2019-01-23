<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ labSetting('app_name') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ labSetting('app_logo') }}">

    <link rel="stylesheet" href="{{ asset('front/login/css/style.css') }}">
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <h1>Welcome</h1>

            <form id="login-form" class="form" action="{{ route('login.post') }}" method="post">
                {{ csrf_field() }}
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" id="login-button">Login</button>
                <p>Don't have an account yet? <a href="{{ route('register') }}">register here</a>.</p>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{{ asset('front/login/js/index.js') }}"></script>
</body>

</html>
