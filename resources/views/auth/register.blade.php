<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}} | Register</title>

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
<form method="POST" action="{{ route('register') }}">
    @csrf
<div class="unix-login">
    <div class="container" id="register">

        <div class="row">
            <div class="col-lg-5 col-lg-offset-3">
                <div class="login-content">
                    @if(!$refferal_id)
                        <h4 style="color: #fff;background: red;padding: 10px;border-radius: 4px;">
                            <span>Invalid referral link</span>
                            <span>
                            <p>Please add valid Referral id</p>
                        </span>
                        </h4>
                    @endif
                    <div class="login-logo">

                    </div>
                    <div class="login-form">
                        <p style="font-size: 30px;font-family: cursive;text-align: center;color: #0ea432;">{{env('APP_NAME')}}</p>


                            <div class="form-group @error('name') has-error @enderror">
                                <label>Name</label>
                                <input type="name" name="name" class="form-control" placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group @error('email') has-error @enderror">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group @error('password') has-error @enderror">
                                <label>Password</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group @error('password_confirmation') has-error @enderror">
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group @error('phone') has-error @enderror">
                                <label>Phone Number</label>
                                <input id="phone" type="text" class="form-control"
                                       name="phone" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group @error('country') has-error @enderror">
                                <label>County</label>
                                <select id="country" class="form-control"
                                        name="country">
                                    <option value="Mombasa">
                                        Mombasa
                                    </option>
                                    <option value="Kwale"> Kwale</option>
                                    <option value="Kilifi"> Kilifi</option>
                                    <option value="Tana River"> Tana River</option>
                                    <option value="Lamu"> Lamu</option>
                                    <option value="Taita Taveta"> Taita Taveta</option>
                                    <option value="Garissa"> Garissa</option>
                                    <option value="Wajir"> Wajir</option>
                                    <option value="Mandera"> Mandera</option>
                                    <option value="Marsabit"> Marsabit</option>
                                    <option value="Isiolo"> Isiolo</option>
                                    <option value="Meru"> Meru</option>
                                    <option value="Tharaka Nithi"> Tharaka Nithi</option>
                                    <option value="Embu"> Embu</option>
                                    <option value="Kitui"> Kitui</option>
                                    <option value="Machakos"> Machakos</option>
                                    <option value="Makueni"> Makueni</option>
                                    <option value="Nyandarua"> Nyandarua</option>
                                    <option value="Nyeri"> Nyeri</option>
                                    <option value="Kirinyaga"> Kirinyaga</option>
                                    <option value="Murang’a"> Murang’a</option>
                                    <option value="Kiambu"> Kiambu</option>
                                    <option value="Turkana"> Turkana</option>
                                    <option value="West Pokot"> West Pokot</option>
                                    <option value="Samburu"> Samburu</option>
                                    <option value="Uasin Gishu"> Uasin Gishu</option>
                                    <option value="Trans-Nzoia"> Trans-Nzoia</option>
                                    <option value="Elgeyo-Marakwet"> Elgeyo-Marakwet</option>
                                    <option value="Nandi"> Nandi</option>
                                    <option value="Baringo"> Baringo</option>
                                    <option value="Laikipia"> Laikipia</option>
                                    <option value="Nakuru"> Nakuru</option>
                                    <option value="Narok"> Narok</option>
                                    <option value="Kajiado"> Kajiado</option>
                                    <option value="Kericho"> Kericho</option>
                                    <option value="Bomet"> Bomet</option>
                                    <option value="Kakamega"> Kakamega</option>
                                    <option value="Vihiga"> Vihiga</option>
                                    <option value="Bungoma"> Bungoma</option>
                                    <option value="Busia"> Busia</option>
                                    <option value="Siaya"> Siaya</option>
                                    <option value="Kisumu"> Kisumu</option>
                                    <option value="Homa Bay"> Homa Bay</option>
                                    <option value="Migori"> Migori</option>
                                    <option value="Kisii"> Kisii</option>
                                    <option value="Nyamira"> Nyamira</option>
                                    <option value="Nairobi"> Nairobi</option>
                                </select>
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($refferal_id)
                                <div class="form-group">
                                    <label>Referral ID</label>
                                    <input type="hidden" class="form-control" name="referral_code"
                                           value="{{$refferal_id}}">
                                    <input type="text" class="form-control" value="{{$refferal_id}}" disabled>

                                </div>
                            @endif

                            <button type="button" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                    @if(!$refferal_id) disabled @endif id="next-btn">  {{ __('Next') }}</button>

                            <div class="register-link m-t-15 text-center">
                                <p>Aready have an account ? <a href="{{route('login')}}"> Login here</a></p>
                            </div>

                        <div class="boxes"
                             style="background: #eee;padding: 10px ; text-align: center;border-radius: 4px;border: 1px solid #d8d8d8;">
                            <h4 style="line-height: 1em;margin: 10px 0px;padding: 0;">Contact with us:</h4>
                            <p style="word-break: 2px !important;">
                                Email : support@inuabizz.com
                            </p>
                            <p>Phone : +254751730030</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div >
    <div class="container" id="payment">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-3">
                <div class="login-content">
                    <div class="login-form">
                        <p style="text-transform: uppercase;font-size:18px;font-weight: bold;color: #3A78AD; text-align: center;">Payment Process Via Lipa Na Mpesa</p>
                        <p class="text-left">
                            On The M-Pesa Menu
                        </p>
                        <p class="text-left">
                           Go to "Lipa Na M-Pesa and select Buy Goods
                        </p>
                        <p>
                            Enter the Till Number <b>502698</b>
                        </p>
                        <p>
                            Enter the Amount <b>Ksh 3500</b>
                        </p>
                        <p>
                            Enter your M-PESA PIN
                        </p>
                          <p>
                            Confirm that all details are correct and press OK
                        </p>
                        <p>
                           You will receive a confirmation SMS from M-PESA immediately
                        </p>
                        <p>
                           You account will activated upon confirmation of the payment
                        </p>

                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                 >  {{ __('Register') }}</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>
</body>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script>
    $('#payment').hide()
    $('#next-btn').click(function () {
        $('#register').hide()
        $('#payment').show()
    })
</script>
</html>
