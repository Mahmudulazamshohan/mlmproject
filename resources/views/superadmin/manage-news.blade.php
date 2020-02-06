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
                                    <h4 style="color: #fff !important;">Notification <b style="font-size: 12px;">(create
                                            notification for user)</b></h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card -10">


                                            <form action="{{route('admin.store.manage-news')}}" method="POST">
                                                @csrf

                                                <textarea name="text" id="text-editor" cols="30" rows="10"
                                                          class="form-control"> </textarea>
                                                <button type="submit" class="btn btn-info btn-sm my-4"
                                                        style="margin-top: 10px;">
                                                    Save
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card ">
                                            <div class="card-header"
                                                 style="background: rgba(0,0,0,0.1) !important;box-shadow: 0px 2px 5px rgba(0,0,0,0.24);border: 1px solid #666;">
                                                <h4>
                                                    Previous Notifications
                                                </h4>
                                            </div>
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Preview</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($pushNotifications as $pushNotification)
                                                    <tr>
                                                        <td>{{$pushNotification->created_at->format('d/m/Y')}}</td>
                                                        <td>
                                                            @if($pushNotification->text)
                                                                <?=substr($pushNotification->text,0,100)?>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.edit.manage-news',$pushNotification->id)}}" class="btn btn-info">
                                                                <i class="fa fa-pencil">

                                                                </i>
                                                            </a>
                                                            <a href="{{route('admin.delete.manage-news',$pushNotification->id)}}"
                                                               class="btn btn-danger">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
