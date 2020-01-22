@extends('layouts.admin')
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
                                    <h4 style="color: #fff !important;">Refferal Link <b style="font-size: 12px;">(copy this and share with other's)</b></h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card p-10">
                                            <b style="color: #555;">Refferal Link</b>
                                            <input type="text" class="form-control mx-2" style="color: #6A55FF;font-weight: bold;" value="{{url('register?refferal_id='.auth()->user()->referral_code)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card -10">
                                            <div class="card-header" style="background: none !important;
;border: none;">
                                                <h4 style="line-height: 1.2em;text-decoration: underline;">
                                                    Business Story and Vision
                                                </h4>
                                            </div>
                                            <form action="">
                                            <textarea name="" id="text-editor" cols="30" rows="10"
                                                      class="form-control"></textarea>
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
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

    <script type="text/javascript">
        new nicEditor().panelInstance('text-editor');
    </script>
@endsection