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
                                    <h4 style="color: #fff !important;">Edit Member Profile</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form-elements">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ route('admin.edit-profile') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if($user)
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            @endif
                                            <div class="row">

                                                <div class="col-lg-10">


                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value="{{$user->name}}"
                                                                   name="name">
                                                        </div>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value="{{$user->email}}"
                                                                   name="email" >
                                                        </div>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control input-sm" value=""
                                                                   name="password">
                                                        </div>
                                                        @error('password')
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
