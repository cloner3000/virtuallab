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

            <form id="login-form" class="form" action="{{ route('register.post') }}" method="post">
                {{ csrf_field() }}
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $msg)
                        <p class="error-messages">{{ $msg }}</p>
                    @endforeach
                @endif
                <input type="text" name="name" placeholder="Name">

                @if($errors->has('email'))
                    @foreach($errors->get('email') as $msg)
                        <p class="error-messages">{{ $msg }}</p>
                    @endforeach
                @endif
                <input type="email" name="email" placeholder="Email">

                @if($errors->has('password'))
                    @foreach($errors->get('password') as $msg)
                        <p class="error-messages">{{ $msg }}</p>
                    @endforeach
                @endif
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                <button type="submit" id="login-button">Register</button>
                <p>Already have an account? <a href="{{ route('login') }}">login here</a>.</p>
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
