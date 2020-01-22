@extends('layouts.admin')
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
                                    <h4 style="color: #fff !important;">Edit Profile</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form-elements">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ route('store.profile') }}"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">

                                                <div class="col-lg-10">


                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value="{{auth()->user()->name}}"
                                                                   name="name">
                                                        </div>
                                                        @error('product_name')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value="{{auth()->user()->email}}"
                                                                   name="email" disabled>
                                                        </div>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value=""
                                                                   name="new_password">
                                                        </div>
                                                        @error('new_password')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Profile Picture</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control input-sm"
                                                                   name="image">
                                                        </div>
                                                        @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-success"
                                                            style="margin-left: 120px;">Update
                                                    </button>

                                                </div>
                                                <!-- /# column -->
                                                <!-- /# column -->
                                            </div>
                                        </form>
                                    </div>
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
