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
                                    <h4 style="color: #fff !important;">Withdraw</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p style="margin-left: 30px;" class="text-left text-primary">Current Account Available :- {{$totalAmount - ($totalWithdraw + $withdrawPending + $totalWithdrawFees + $withdrawPendingFees)}} Ksh </p>
                                    <div class="horizontal-form-elements">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ route('store.withdraw') }}"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">

                                                <div class="col-lg-10">


                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">
                                                            Payout Method
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="radio" name="payment_method" value="paypal"
                                                                   checked>
                                                            <img
                                                                src="{{asset('assets/images/paypal-logo.png')}}" alt=""
                                                                style="width:70px;height: 70px;">
                                                            <input type="radio" name="payment_method"
                                                                   value="bank_transfer"> <img
                                                                src="{{asset('assets/images/bank_transfer.png')}}"
                                                                alt="" style="width:70px;height: 70px;">

                                                        </div>
                                                        @error('payment_method')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Account</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value=""
                                                                   name="account" placeholder="Account Email Address"
                                                                   required>
                                                        </div>
                                                        @error('account')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Amount</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control input-sm" value=""
                                                                   name="amount" placeholder="Amount minimum Ksh 3000"
                                                                   min="3000" required>
                                                        </div>
                                                        @error('new_password')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
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
                                    <h4 style="color: #fff !important;">Previous Withdraw</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form-elements">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>Account</th>
                                                <th>Payment Method</th>
                                                <th>Amount</th>
                                                <th>Fee</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($withdraws as $withdraw)
                                                <tr>
                                                    <td>{{$withdraw->account}}</td>
                                                    <td>{{strtoupper(str_replace("_"," ",$withdraw->payment_method))}}</td>
                                                    <td>{{$withdraw->amount}}</td>
                                                    <td>{{$withdraw->fees}}</td>
                                                    <td>
                                                        @if($withdraw->status)
                                                            <span class="label label-success">Paid</span>
                                                        @else
                                                            <span class="label label-info">Pending</span>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$withdraws->links()}}
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
