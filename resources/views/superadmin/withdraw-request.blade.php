@extends('layouts.superadmin')
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
                                    <h4 style="color: #fff !important;">Withdraw history of members</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>
                                                Account
                                            </th>
                                            <th>
                                                Amount (Ksh)
                                            </th>
                                            <th>
                                                Fee(Ksh) (7%)
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($withdraws as $withdraw)
                                            <tr>
                                                <td>{{$withdraw->User->name}}</td>
                                                <td>{{$withdraw->User->email}}</td>
                                                <td>{{$withdraw->account}}</td>
                                                <td>{{$withdraw->amount}}</td>
                                                <td>{{$withdraw->fees}}</td>

                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                    {{$withdraws->links()}}

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
