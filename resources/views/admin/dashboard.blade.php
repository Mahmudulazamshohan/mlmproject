@extends('layouts.admin')
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome to {{env('APP_NAME')}}</span></h1>

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
                            <b style="color: #555;">Share your referral link with others</b><br>
                            <a href="{{route('refferal.link')}}" class="btn btn-info">Referral Link</a>
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
                                                <div
                                                    class="stat-digit">{{$totalAmount - ($totalWithdraw + $withdrawPending + $totalWithdrawFees + $withdrawPendingFees)}}</div>
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
                                                <div class="stat-text">Today Member</div>
                                                <div class="stat-digit">{{$today}}</div>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4> Referral List </h4>
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-levels text-left">
                                        <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Referral ID</th>
                                            <th>Join At</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($uplines as $upline)
                                            @if($upline->User)
                                                <tr>
                                                    <td style="background: white !important;">{{$upline->user_id}}</td>
                                                    <td>{{$upline->User->name}}</td>
                                                    <td>{{$upline->User->email}}</td>
                                                    <td>{{$upline->User->referral_code}}</td>
                                                    <td style="text-align: left !important;">{{$upline->User->created_at->diffForHumans()}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$uplines->links()}}



                                    {{--                                    <ul class="timeline">--}}
                                    {{--                                        @for($i=1;$i<=11;$i++)--}}
                                    {{--                                        <!-- Item 1 -->--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <div class="direction-r">--}}
                                    {{--                                                <div class="flag-wrapper">--}}
                                    {{--                                                    <span class="flag">--}}
                                    {{--                                                        Level {{$i}}--}}
                                    {{--                                                    </span>--}}
                                    {{--                                                    @if(auth()->user()->Upline)--}}
                                    {{--                                                    <span class="time-wrapper">--}}
                                    {{--                                                        @if(auth()->user()->Upline->{'level'.$i})--}}
                                    {{--                                                        <span class="time">--}}
                                    {{--                                                            @php--}}
                                    {{--                                                             $user_id = auth()->user()->Upline->{'level'.$i};--}}
                                    {{--                                                             $user = \App\User::find($user_id);--}}
                                    {{--                                                            @endphp--}}
                                    {{--                                                            @if($user)--}}
                                    {{--                                                            Name: {{$user->name }}<br>--}}
                                    {{--                                                            Email:{{$user->email }}--}}
                                    {{--                                                            @endif--}}
                                    {{--                                                        </span>--}}
                                    {{--                                                        @else--}}
                                    {{--                                                            <span class="time">EMPTY</span>--}}
                                    {{--                                                        @endif--}}
                                    {{--                                                    </span>--}}
                                    {{--                                                    @else--}}
                                    {{--                                                        <span class="time-wrapper">--}}
                                    {{--                                                        <span class="time">EMPTY</span>--}}
                                    {{--                                                    </span>--}}
                                    {{--                                                    @endif--}}
                                    {{--                                                </div>--}}

                                    {{--                                            </div>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        @endfor--}}



                                    {{--                                    </ul>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 7px;">
                            <div class="card">
                                <div class="card-header"
                                     style="background: #1DE9B6 !important;border: none;border-radius: 0;">
                                    <h4 style="color: #fff !important;">Loan Indicator</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <table class="table table-bordered" style="font-size: 14px;">
                                    <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Direct Refferal(Retrainer)</th>
                                        <th>Loan Accessible(Ksh)</th>
                                        <th>Grace Period(Days)</th>
                                        <th>Loan Period(Days)</th>
                                        <th>% Direct Purchases</th>
                                        <th>Bonuses(Ksh)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $loanPeriod =[30,30,90,90,180,180,270,270,36,360,null];
                                        $directPurchases =[65,50,50,50,35,35,25,25,20,15,10];
                                       $gracePeriod = [7,7,7,10,10,10,15,15,20,20,0];
                                        $ranger = [20,40,60,80,100,120,140,160,180,200,10000000000000000];

                                    @endphp
                                    @for($i=1;$i<=11;$i++)
                                        @if(auth()->user()->TotalUpline->{'level'.$i} !=0 && auth()->user()->TotalUpline->{'level'.$i} <= $ranger[$i-1])
                                        <tr>
                                            <td>{{$i}}</td>
                                            @if(auth()->user()->TotalUpline)
                                                <td>{{auth()->user()->TotalUpline->{'level'.$i} }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if(auth()->user()->LevelIncome)
                                                <td>{{auth()->user()->LevelIncome->{'level'.$i} }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$gracePeriod[$i-1]}}</td>

                                            <td>{{$loanPeriod[$i-1]}}</td>
                                            <td>{{$directPurchases[$i-1]}}</td>
                                            @if($i == 2 || $i == 6 || $i == 10)
                                                @if($i == 2)
                                                    <td>2000</td>
                                                @endif
                                                @if($i == 6)
                                                    <td>6000</td>
                                                @endif
                                                @if($i == 10)
                                                    <td>1200</td>
                                                @endif
                                            @else
                                                <td>-</td>
                                            @endif
                                        </tr>
                                        @endif
                                    @endfor

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <div class="row">

                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4> Level and Earnings table </h4>
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-levels">
                                        <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Direct Level</th>
                                            <th>Loan Accessible</th>
                                            <th>Achieve Date</th>
                                            <th>Release Date</th>
                                            <th>Payable by date</th>
                                            <th>Bonuses
                                                (Ksh)
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(auth()->user()->TotalUpline)
                                            @php
                                                $withdraw = \App\Withdraw::with('LoanApprove')->where('user_id',auth()->user()->id)->first();
                                                $bonus = \App\MemberBonus::with('User')->where('user_id',auth()->user()->id)->where('level',"level$i")->first();
                                            @endphp

                                            @for($i=1;$i<=11;$i++)

                                                <tr>
                                                    <td>Level {{$i}}</td>
                                                    @if(auth()->user()->TotalUpline)
                                                        <td>{{auth()->user()->TotalUpline->{'level'.$i} }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif

                                                    @if(auth()->user()->LevelIncome)
                                                        <td>{{auth()->user()->LevelIncome->{'level'.$i} }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif

                                                    @if(auth()->user()->TotalUpline)

                                                        @if($withdraw && auth()->user()->TotalUpline->{'level'.$i})
                                                            @if($withdraw->LoanApprove)
                                                                <td>{{\Carbon\Carbon::parse($withdraw->LoanApprove->release_date)->format('Y-m-d')}}</td>
                                                            @endif
                                                        @else
                                                            <td>

                                                            </td>
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif



                                                    @if(auth()->user()->TotalUpline)
                                                        @if($withdraw && auth()->user()->TotalUpline->{'level'.$i})
                                                            <td>
                                                                @if($withdraw->LoanApprove)
                                                                    {{\Carbon\Carbon::parse($withdraw->LoanApprove->release_date)->format('Y-m-d')}}
                                                                @endif
                                                            </td>
                                                        @else
                                                            <td>

                                                            </td>
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if(auth()->user()->TotalUpline)
                                                        @if($withdraw && auth()->user()->TotalUpline->{'level'.$i})
                                                            @if($withdraw->LoanApprove)
                                                               <td>{{\Carbon\Carbon::parse($withdraw->LoanApprove->payable_by_date)->format('Y-m-d')}}</td>
                                                            @endif


                                                        @else
                                                            <td>

                                                            </td>
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif

                                                    @if(auth()->user()->TotalUpline)
                                                        @if($bonus && auth()->user()->TotalUpline->{'level'.$i})
                                                            <td>
                                                                {{$bonus->bonus}}
                                                            </td>
                                                        @else
                                                            <td>

                                                            </td>
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif

                                                </tr>
                                            @endfor
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
