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
                                    <h4 style="color: #fff !important;">Level Settings</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form-elements">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ route('admin.store-level-settings') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if(isset($levelSettings->id))
                                                <input type="hidden" name="id" value="{{$levelSettings->id}}">
                                            @endif

                                            <div class="row">

                                                <div class="col-lg-10">


                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Join Income</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control input-sm" value="{{$levelSettings->join_income}}"
                                                                   name="join_income">
                                                        </div>
                                                        @error('join_income')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Refferal</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control input-sm" value="{{$levelSettings->refferal}}"
                                                                   name="refferal">
                                                        </div>
                                                        @error('refferal')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Minimum Withdraw</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control input-sm" value="{{$levelSettings->minimum_withdraw}}"
                                                                   name="minimum_withdraw">
                                                        </div>
                                                        @error('minimum_withdraw')
                                                        <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            class="col-sm-2 control-label">Withdraw Fee(%)</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control input-sm"
                                                                   name="withdraw_fee" value="{{$levelSettings->withdraw_fee}}">
                                                        </div>
                                                        @error('withdraw_fee')
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
