<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InuaBiz | Login</title>

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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('welcome')}}">InuaBiz</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{url('register?refferal_id='.$id)}}">Signup</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
<div class="jumbotron container-fluid">
    <div class="card" style="border-radius: 4px;padding: 50px;">
        <div class="card-header">
            <div class="user" style=" border-bottom: 1px solid #000 !important;
    width: 100% !important;display: flex;padding-bottom: 10px;width: 100% !important;">
                @if($businessStory)
                @if( $businessStory && $businessStory->User)
                    @if($businessStory->User->Profile)
                        <img style="width: 50px;height: 50px;border-radius: 50%;" src="{{url('/public/images/'.$businessStory->User->Profile->image)}}" alt=""/>

                    @else
                        <img style="width: 50px;height: 50px;border-radius: 50%;" src="{{asset('/default-image.jpeg')}}" alt=""/>
                    @endif
                @endif
                @if($businessStory->User)
                    <p style="margin-top: 10px;font-size: 15px;font-weight: bold;">{{$businessStory->User->name}}</p>
                @else
                    <p>
                        Empty
                    </p>
                @endif
                @endif
            </div>

        </div>
        <div class="card-body" style="color: #0c0c0c;width: 80%;">
            @if($businessStory)
                <?php echo $businessStory->story; ?>
            @endif
                <a href="{{url('register?refferal_id='.$id)}}" class="btn btn-info" style="margin-top: 10px;">
                    Signup from here
                </a>
                <p style="border-top: 1px solid #000;width: 100%;margin-top: 30px;">
                    Already have an account ?
                </p>
                <a href="{{route('login')}}" class="btn btn-dark">Login</a>
        </div>
    </div>
</div>

</body>

</html>
