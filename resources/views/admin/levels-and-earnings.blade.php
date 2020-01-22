@extends('layouts.admin')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 7px;">
                            <div class="card">
                                <div class="card-header"
                                     style="background: #1DE9B6 !important;border: none;border-radius: 0;">
                                    <h4 style="color: #fff !important;">Level and Earnings</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <table class="table table-bordered table-levels">
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
                                    @endphp
                                    @for($i=1;$i<=11;$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        @if(auth()->user()->TotalUpline)
                                        <td>{{auth()->user()->TotalUpline->{'level'.$i} }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td></td>
                                        <td></td>
                                        <td>{{$loanPeriod[$i-1]}}</td>
                                        <td>{{$directPurchases[$i-1]}}</td>
                                        <td></td>
                                    </tr>
                                    @endfor

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
