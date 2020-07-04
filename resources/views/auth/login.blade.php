<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InuaBizz | Login</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/unix.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">

<div class="unix-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-3">
                <div class="login-content">
                    <div class="login-logo">

                    </div>
                    <div class="login-form">
                        <p style="font-size: 30px;font-family: cursive;text-align: center;color: #0ea432;">{{env('APP_NAME')}}</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group @error('email') has-error @enderror
                                 @error('phone') has-error @enderror">
                            <label>Email address</label>
                            <input type="text" name="login" class="form-control" placeholder="Email or phone"
                                   value="{{ old('phone') ?: old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                            @enderror

                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                        {{--                                <label class="pull-right">--}}
                        {{--                                    <a href="#">Forgotten Password?</a>--}}
                        {{--                                </label>--}}

                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>

                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="{{route('register')}}"> Sign Up Here</a></p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>
