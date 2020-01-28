@extends('layouts.admin')
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
                    <div class="col-lg-12">
                        <div class="card p-10">
                            <b style="color: #555;">Share your refferal link with others</b><br>
                            <a href="{{route('refferal.link')}}" class="btn btn-info">Refferal Link</a>
                    </div>
                </div>
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
                                            <div class="stat-text">Total</div>
                                            <div class="stat-digit">{{$totalAmount - ($totalWithdraw + $withdrawPending + $totalWithdrawFees + $withdrawPendingFees)}}</div>
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
                                            <div class="stat-text">Today Earn</div>
                                            <div class="stat-digit">{{$todayAmount}}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>





                            <div class="col-lg-6">
                                <div class="card bg-success">
                                    <div class="stat-widget-six">
                                        <div class="stat-icon p-15">
                                            <i class="ti-stats-up"></i>
                                        </div>
                                        <div class="stat-content p-t-12 p-b-12">
                                            <div class="text-left dib">
                                                <div class="stat-heading">Withdraw</div>
                                                <div class="stat-text">{{$totalWithdraw }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card bg-primary">
                                    <div class="stat-widget-six">
                                        <div class="stat-icon p-15">
                                            <i class="ti-stats-up"></i>
                                        </div>
                                        <div class="stat-content p-t-12 p-b-12">
                                            <div class="text-left dib">
                                                <div class="stat-heading">Withdraw Pending</div>
                                                <div class="stat-text">{{$withdrawPending}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /# row -->
                <div class="row">

                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card alert">
                            <div class="card-header">
                                <h4> Total Refferal </h4>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th>Level 1</th>
                                        <th>Level 2</th>
                                        <th>Level 3</th>
                                        <th>Level 4</th>
                                        <th>Level 5</th>
                                        <th>Level 6</th>
                                        <th>Level 7</th>
                                        <th>Level 8</th>
                                        <th>Level 9</th>
                                        <th>Level 10</th>
                                        <th>Level 11</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(auth()->user()->TotalUpline)
                                    <tr>
                                        <td>{{auth()->user()->TotalUpline->level1}}</td>
                                        <td>{{auth()->user()->TotalUpline->level2}}</td>
                                        <td>{{auth()->user()->TotalUpline->level3}}</td>
                                        <td>{{auth()->user()->TotalUpline->level4}}</td>
                                        <td>{{auth()->user()->TotalUpline->level5}}</td>
                                        <td>{{auth()->user()->TotalUpline->level6}}</td>
                                        <td>{{auth()->user()->TotalUpline->level7}}</td>
                                        <td>{{auth()->user()->TotalUpline->level8}}</td>
                                        <td>{{auth()->user()->TotalUpline->level9}}</td>
                                        <td>{{auth()->user()->TotalUpline->level10}}</td>
                                        <td>{{auth()->user()->TotalUpline->level11}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>


                <!-- /# row -->
            </div>
            <!-- /# main content -->
        </div>
        <!-- /# container-fluid -->
    </div>

@endsection
