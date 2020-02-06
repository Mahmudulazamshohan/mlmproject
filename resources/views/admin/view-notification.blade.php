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
                                    <h4 style="color: #fff !important;">Notification</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="horizontal-form-elements">
                                        @if($pushNotification)
                                        <?php echo $pushNotification->text?>
                                        @endif

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
