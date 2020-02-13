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
                                            <form action="{{route('admin.approve.member-loan')}}" method="POST">
                                                @csrf
                                                <div class="row" style="margin-bottom: 10px">
                                                    <div class="col-md-3">
                                                        <b>Loan Accessible : {{$withdraw->amount}} (Ksh)</b>
                                                        <b>Level : {{ucfirst($withdraw->level)}}</b>

                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="{{$withdraw->id}}">
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Achieve Date
                                                        </label>
                                                        <input type="date" class="form-control input-sm" required name="achieve_date">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Release Date
                                                        </label>
                                                        <input type="date" class="form-control input-sm" required name="release_date">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Payable by Date
                                                        </label>
                                                        <input type="date" class="form-control input-sm" required name="payable_by_date">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Withdraw Approved
                                                        </label>
                                                        <br>
                                                        <div style="padding-left: 20px;">
                                                            <input type="radio" name="approve" value="1">
                                                            Approved<br>
                                                            <input type="radio" name="approve" value="0" checked>Reject
                                                            <br>

                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-info " style="margin-bottom: 10px;">
                                                    Submit
                                                </button>
                                            </form>




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
