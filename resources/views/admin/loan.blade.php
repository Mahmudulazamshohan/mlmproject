@extends('layouts.admin')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 7px;">
                            <div class="card alert">
                                <div class="card-header"
                                     style="background: #1DE9B6 !important;border: none;border-radius: 0;">
                                    <h4 style="color: #fff !important;">Get new loan</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p style="margin-left: 30px;" class="text-left text-primary">Current Loan Available

                                        :- @if($memberLoanLast) {{$memberLoanLast->amount + $memberLoanLast->interest }} @else 0 @endif Ksh </p>
                                    <div class="horizontal-form-elements">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ route('store.loan') }}"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">

                                                <div class="col-lg-10">


                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Loan Amount</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control input-sm" value=""
                                                                   name="amount" required>
                                                        </div>
                                                        @error('amount')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label"></label>
                                                        <div class="col-sm-10">
                                                            <input type="checkbox" name="agree">I have to pay 10%
                                                            interest
                                                            <br>
                                                            @error('agree')
                                                            <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                            @enderror
                                                        </div>

                                                    </div>


                                                    <button type="submit" class="btn btn-success"
                                                            style="margin-left: 120px;">Submit
                                                    </button>

                                                </div>
                                                <!-- /# column -->
                                                <!-- /# column -->
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-12" style="margin-top: 7px;">
                            <div class="card alert">
                                <div class="card-header"
                                     style="background: #1DE9B6 !important;border: none;border-radius: 0;">
                                    <h4 style="color: #fff !important;">Previous Loan</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form-elements">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Interest</th>
                                                <th>Approved</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($memberLoans as $memberLoan)
                                                <tr>
                                                    <td>{{$memberLoan->created_at->format('Y-m-d')}}</td>
                                                    <td>{{$memberLoan->amount}}</td>
                                                    <td>{{$memberLoan->interest}}</td>
                                                    <td>
                                                        @if($memberLoan->approved)
                                                            <span class="label label-success">Approved</span>
                                                        @else
                                                            <span class="label label-info">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($memberLoan->paid)
                                                            <span class="label label-success">Paid</span>
                                                        @else
                                                            <span class="label label-info">Unpaid</span>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td>Total : {{$memberLoans->sum('amount')}}</td>
                                                <td>Total : {{$memberLoans->sum('interest')}}</td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
