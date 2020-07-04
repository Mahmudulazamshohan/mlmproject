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
                                    <h4 style="color: #fff !important;">Referral Link <b style="font-size: 12px;">(copy this and share with other's)</b></h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="card p-10">
                                            <b style="color: #555;">Direct Referral Link</b>
                                            <div style="display: flex;flex-flow: row;">
                                                <input type="text" class="form-control mx-2" id="refferal-input" style="color: #6A55FF;font-weight: bold;background: #eee;border-radius: 4px 0px 0px 4px !important;" value="{{url('register?refferal_id='.auth()->user()->referral_code)}}">
                                                <button class="btn btn-info" id="refferal-btn"  style="border-radius: 0px 4px 4px 0px !important;">
                                                    <i class="fa fa-copy">

                                                    </i>
                                                </button>
                                            </div>
                                           </div>
                                    </div>
                                    <div class="col-lg-2">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="card p-10">
                                            <b style="color: #555;">Business Story(Referral Link)</b>
                                            <div style="display: flex;flex-flow: row;">

                                                <input type="text" class="form-control mx-2" id="business-input" style="color: #6A55FF;font-weight: bold;background: #eee;border-radius: 4px 0px 0px 4px !important; " value="{{route('story',auth()->user()->referral_code)}}">
                                                <button class="btn btn-info" id="business-btn" style="border-radius: 0px 4px 4px 0px !important;">
                                                    <i class="fa fa-copy">

                                                    </i>
                                                </button>
                                            </div>
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
                                            <form action="{{route('refferal.story')}}" method="POST">
                                             @csrf
                                            <textarea name="story" id="text-editor" cols="30" rows="10"
                                                      class="form-control">@if(auth()->user()->BusinessStory) {{auth()->user()->BusinessStory->story}} @endif </textarea>
                                                <button type="submit" class="btn btn-info btn-sm my-4" style="margin-top: 10px;" >
                                                    Save
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
    <script>
        var refferalbtn = document.getElementById('refferal-btn')
        refferalbtn.addEventListener('click',function () {
            var copyText = document.getElementById("refferal-input");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert('Text Copied');
        });
        var businessbtn = document.getElementById('business-btn')
        businessbtn.addEventListener('click',function () {
            var copyText = document.getElementById("business-input");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert('Text Copied');

        });


    </script>
    <script type="text/javascript" src="{{asset('assets/js/nicEdit-latest.js')}}"></script>

    <script type="text/javascript">

        new nicEditor().panelInstance('text-editor');
    </script>
@endsection
