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
                                    <h4 style="color: #fff !important;">Edit Notification</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card -10">


                                            <form action="{{route('admin.store.manage-news')}}" method="POST">
                                                @csrf
                                                @if($pushNotification)
                                                <input type="hidden" name="id" value="{{$pushNotification->id}}">
                                                @endif
                                                <textarea name="text" id="text-editor" cols="30" rows="10"
                                                          class="form-control">@if($pushNotification) {{$pushNotification->text}} @endif</textarea>
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
    <script type="text/javascript" src="{{asset('assets/js/nicEdit-latest.js')}}"></script>

    <script type="text/javascript">
        new nicEditor().panelInstance('text-editor');
    </script>
@endsection
