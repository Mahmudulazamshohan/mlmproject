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
                                    <h4 style="color: #fff !important;">
                                        Name: {{$user->name}}
                                    </h4>
                                    <br>
                                    <h4 style="color: #fff !important;">
                                        Email: {{$user->email}}
                                    </h4>
                                    <br>
                                    <h4 style="color: #fff !important;">
                                        Total Loan: {{$user->Withdraw->sum('amount')}}
                                    </h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>
                                            Account
                                        </th>

                                        <th>
                                            Loan (Ksh)
                                        </th>
                                        <th>
                                            Fee(Ksh)
                                        </th>
                                        <th>
                                            Status
                                        </th>

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



                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$memberLoans->links()}}
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
