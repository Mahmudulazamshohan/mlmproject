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
                                    <h4 style="color: #fff !important;">Members Loan History </h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card ">

                                            <table class="table table-bordered text-center">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Referral ID</th>
                                                    <th>Amount</th>
                                                    <th>Interest</th>
                                                    <th>Paid</th>
                                                    <th>Loan remaining (Ksh)</th>
                                                    <th>Loan</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($memberLoans as $memberLoan)
                                                    <tr>
                                                        <td>{{$memberLoan->User->name}}</td>
                                                        <td>
                                                            {{$memberLoan->User->email}}
                                                        </td>
                                                        <td>
                                                            {{$memberLoan->User->referral_code}}
                                                        </td>
                                                        <td>
                                                            {{$memberLoan->amount}}
                                                        </td>

                                                        <td>
                                                            {{$memberLoan->interest}}
                                                        </td>
                                                        <td>
                                                            {{$memberLoan->paid ? 'Paid' :'Unpaid'}}
                                                        </td>
                                                        <td>
                                                            {{$memberLoan->where('paid',0)->sum('amount')}}
                                                        </td>

                                                        <td>
                                                            @if(!$memberLoan->paid)
                                                            <a href="{{route('admin.details.member-loan',$memberLoan->id)}}"
                                                               class="btn btn-info">
                                                                <i class="fa fa-check"></i>Approve

                                                            </a>
                                                            @else
                                                                <a href="{{route('admin.details.member-loan',$memberLoan->id)}}"
                                                                   class="btn btn-info">
                                                                    <i class="fa fa-check"></i>Approved

                                                                </a>
                                                            @endif
                                                            <a href="{{route('admin.member-loan-more',$memberLoan->User->id)}}"
                                                               class="btn btn-default" data-toggle="tooltip" title="Hooray!">
                                                                <i class="fa fa-chevron-right"></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$memberLoans->links()}}

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
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
