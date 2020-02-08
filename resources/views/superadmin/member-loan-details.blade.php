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
                                            <form action="{{route('admin.member-loan')}}" method="GET">
                                                <div class="row" style="margin-bottom: 10px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Level
                                                        </label>
                                                        <select class="form-control input-sm">
                                                            <option value="level1">Level 1</option>
                                                            <option value="level2">Level 2</option>
                                                            <option value="level3">Level 3</option>
                                                            <option value="level4">Level 4</option>
                                                            <option value="level5">Level 5</option>
                                                            <option value="level6">Level 6</option>
                                                            <option value="level7">Level 7</option>
                                                            <option value="level8">Level 8</option>
                                                            <option value="level9">Level 9</option>
                                                            <option value="level10">Level 10</option>
                                                            <option value="level12">Level 11</option>
                                                        </select>
                                                    </div>



                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Achieve Date
                                                        </label>
                                                        <input type="date" class="form-control input-sm" required>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Release Date
                                                        </label>
                                                        <input type="date" class="form-control input-sm" required>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Payable by Date
                                                        </label>
                                                        <input type="date" class="form-control input-sm" required>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-3">
                                                        <label for="">
                                                            Loan Accessible
                                                        </label>
                                                        <input type="number" class="form-control input-sm" min="0" required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-info " style="margin-bottom: 10px;">
                                                    Create
                                                </button>
                                            </form>

                                            <table class="table table-bordered text-center">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Referral Id</th>
                                                    <th>Level</th>
                                                    <th>Bonus ( Ksh )</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>
                                                        {{$user->email}}
                                                    </td>
                                                    <td>
                                                        {{$user->referral_code}}
                                                    </td>
                                                    <td>
                                                        {{$user->referral_code}}
                                                    </td>
                                                    <td>

                                                        {{$user->referral_code}}
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>


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
