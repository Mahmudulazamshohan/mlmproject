@extends('layouts.superadmin')
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome Here</span></h1>

                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <div class="main-content">
                <div class="row">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-primary">
                                                <i class="ti-wallet"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-text">Total Users</div>
                                                <div class="stat-digit">{{$users->count()}}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-success">
                                                <i class="ti-bag"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-text">Today</div>
                                                <div class="stat-digit">{{$today}}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-info-dark">
                                                <i class="ti-money"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-text">Withdraw Request</div>
                                                <div class="stat-digit">{{$withdraws->where('status',0)->count()}}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-info-dark">
                                                <i class="ti-money"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-text">Withdrawn</div>
                                                <div class="stat-digit">{{$withdraws->where('status',1)->count()}}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>



                    <!-- /# row -->
                </div>
                <!-- /# main content -->
            </div>
            <!-- /# container-fluid -->
        </div>

@endsection
