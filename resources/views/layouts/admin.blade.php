<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Admin Panel
    </title>
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
    <link href="{{asset('assets/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/css/lib/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/css/lib/weather-icons.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/unix.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('assets/main.css') }}" rel="stylesheet">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet"></link>
</head>

<body>
@include('partials.sidebar')


<div class="header">
    <div class="pull-left">
        <div class="logo"><a href="{{route('dashboard')}}"><span>{{env('APP_NAME')}}</span></a></div>
        <div class="hamburger sidebar-toggle">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    <div class="pull-right p-r-15">
        <ul>


            <li class="header-icon dib">
                <img class="avatar-img" src="{{asset('/default-image.jpeg')}}" alt="" />
                <span class="user-avatar">@auth {{\Illuminate\Support\Facades\Auth::user()->name }}@endauth <i class="ti-angle-down f-s-10"></i></span>
                <div class="drop-down dropdown-profile">

                    <div class="dropdown-content-body">
                        <ul>
                            <li><a href="{{route('profile')}}"><i class="ti-user"></i> <span>Profile</span></a></li>

                            <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="ti-power-off"></i> <span>Logout</span></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="content-wrap">
    @yield('content')

</div>




<div id="search">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@php
    use Illuminate\Support\Facades\Session;
@endphp
<script>
    @if(Session::has('success'))
    Swal.fire({
        title: 'Saved',
        text: '{{Session::get("message")}}',
        icon: 'success',
        confirmButtonText: 'Close',
        onClose:function () {
            window.location.reload()
        }
    })
    @elseif(Session::has('fail'))
    Swal.fire({
        title: 'Saved',
        text: '{{Session::get("message")}}',
        icon: 'error',
        confirmButtonText: 'Close',
        onClose:function () {
            window.location.reload()
        }
    })
    @endif
</script>
<!-- jquery vendor -->
<script src="{{asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>

<script>
    var APP_URL = '{{env('APP_URL') }}'
</script>
<script src="{{asset('assets/js/main.js') }}"></script>

<script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
<!-- nano scroller -->
<script src="{{asset('assets/js/lib/menubar/sidebar.js') }}"></script>
<script src="{{asset('assets/js/lib/preloader/pace.min.js') }}"></script>
<!-- sidebar -->
<script src="{{asset('assets/js/lib/bootstrap.min.js') }}"></script>
{{--<!-- bootstrap -->--}}
{{--<script src="{{asset('assets/js/lib/mmc-common.js') }}"></script>--}}
{{--<script src="{{asset('assets/js/lib/mmc-chat.js') }}"></script>--}}
<!--  Chart js -->
<script src="{{asset('assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
{{--<script src="{{asset('assets/js/lib/chart-js/chartjs-init.js') }}"></script>--}}
{{--<!-- // Chart js -->--}}

<!--  Datamap -->
<script src="{{asset('assets/js/lib/datamap/d3.min.js') }}"></script>
<script src="{{asset('assets/js/lib/datamap/topojson.js') }}"></script>
<script src="{{asset('assets/js/lib/datamap/datamaps.world.min.js') }}"></script>
{{--<script src="{{asset('assets/js/lib/datamap/datamap-init.js') }}"></script>--}}
{{--<!-- // Datamap -->--}}
<script src="{{asset('assets/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{asset('assets/js/lib/weather/weather-init.js') }}"></script>
<script src="{{asset('assets/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{asset('assets/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.dataTables.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.flash.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/js/lib/data-table/datatables-init.js') }}"></script>
<script src="{{asset('assets/js/scripts.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

@yield('scripts')
<script>
    $('#event-modal').modal('show')
</script>
<!-- scripit init-->
</body>

</html>
