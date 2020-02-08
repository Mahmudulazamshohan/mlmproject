@extends('layouts.superadmin')
@section('content')
    <style>
        [contenteditable]:hover,
        [contenteditable]:focus {
            background: #fff;
        }
    </style>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 7px;">
                            <div class="card">
                                <div class="card-header"
                                     style="background: #1DE9B6 !important;border: none;border-radius: 0;">
                                    <h4 style="color: #fff !important;">Members Bonus </h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card ">
                                            <form action="{{route('admin.member-bonus')}}" method="GET">
                                                <div class="row" style="margin-bottom: 10px">
                                                    <div class="col-md-6">
                                                        <input type="text" name="search" class="form-control input-md">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-info">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Referral ID</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->name}}</td>
                                                        <td>
                                                            {{$user->email}}
                                                        </td> <td>
                                                            {{$user->referral_code}}
                                                        </td>
                                                        <td>

                                                            <a href="{{route('admin.details.member-bonus',$user->id)}}" class="btn btn-default">
                                                                View
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$users->links()}}

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/js/nicEdit-latest.js')}}"></script>

    <script type="text/javascript">
        new nicEditor().panelInstance('text-editor');
    </script>
@endsection
