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
                                    <h4 style="color: #fff !important;">Members </h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 style="width: 100%;border-bottom: 1px dashed #000;padding-bottom: 20px;">
                                            Member Information
                                        </h4>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>
                                                    Name : {{$user->name}}
                                                </h5>
                                                <h5>
                                                    Email : {{$user->email}}
                                                </h5>
                                                <h5>
                                                    Referral ID : {{$user->referral_code}}
                                                </h5>
                                            </div>
                                            <h4 style="width: 100%;border-bottom: 1px dashed #000;padding-bottom: 20px;">
                                                Direct Referral List
                                            </h4>
                                            @foreach($directLevels as $directLevel)
                                                @if($directLevel->User)
                                                    <div class="card" style="background: #eee;">
                                                       <p>Name: {{$directLevel->User->name}}</p>
                                                        <p>Email: {{$directLevel->User->email}}</p>

                                                    </div>
                                                @endif
                                            @endforeach
                                            {{$directLevels->links()}}


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
