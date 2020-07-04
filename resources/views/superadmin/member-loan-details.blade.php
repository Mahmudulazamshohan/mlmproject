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
                                    <h4 style="color: #fff !important;">Members Loan </h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card ">
                                            @if($memberLoan)
                                                <form action="{{route('admin.approve.member-loan')}}" method="POST">
                                                    @csrf
                                                    <div class="row" style="margin-bottom: 10px">
                                                        <div class="col-md-3">
                                                            <b>Name : {{$memberLoan->User->name}} (Ksh)</b><br>
                                                            <b>Referral : {{$memberLoan->User->refferal_code}} (Ksh)</b><br>
                                                            <b>Loan : {{$memberLoan->amount}} (Ksh)</b><br>
                                                            <b>interest : {{$memberLoan->interest}} (Ksh)</b><br>
                                                            <b>Total Payable
                                                                Amount: {{$memberLoan->amount+$memberLoan->interest}}
                                                                (Ksh)</b>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$memberLoan->id}}">
                                                    <input type="checkbox" name="approved"
                                                           @if($memberLoan->approved) checked @endif "> Approve Loan<br>
                                                    <input type="checkbox" name="paid"
                                                           @if($memberLoan->paid) checked @endif> Amount Paid
                                                    Manually <br>
                                                    <br>
                                                    <button class="btn btn-info " style="margin-bottom: 10px;">
                                                        Submit
                                                    </button>
                                                </form>
                                            @endif


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
