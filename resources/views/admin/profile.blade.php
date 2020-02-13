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
                                                            <input type="text" class="form-control input-sm"
                                                                   value="{{auth()->user()->name}}"
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
                                                            <input type="text" class="form-control input-sm"
                                                                   value="{{auth()->user()->email}}"
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
                                                    <div class="form-group @error('phone') has-error @enderror">
                                                        <label class="col-sm-2 ">Phone</label>
                                                        <div class="col-sm-10">
                                                            <input id="phone" type="text" class="form-control input-sm"
                                                                   name="phone" required value="{{auth()->user()->phone}}">
                                                            @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="form-group @error('country') has-error @enderror">
                                                        <label class="col-sm-2 ">Country</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control input-sm" id="country"
                                                                    name="country">
                                                                <option value="Mombas">
                                                                    Mombas
                                                                </option>
                                                                <option value="Kwale"> Kwale</option>
                                                                <option value="Kilifi"> Kilifi</option>
                                                                <option value="Tana River"> Tana River</option>
                                                                <option value="Lamu"> Lamu</option>
                                                                <option value="Taita Taveta"> Taita Taveta</option>
                                                                <option value="Garissa"> Garissa</option>
                                                                <option value="Wajir"> Wajir</option>
                                                                <option value="Mandera"> Mandera</option>
                                                                <option value="Marsabit"> Marsabit</option>
                                                                <option value="Isiolo"> Isiolo</option>
                                                                <option value="Meru"> Meru</option>
                                                                <option value="Tharaka Nithi"> Tharaka Nithi</option>
                                                                <option value="Embu"> Embu</option>
                                                                <option value="Kitui"> Kitui</option>
                                                                <option value="Machakos"> Machakos</option>
                                                                <option value="Makueni"> Makueni</option>
                                                                <option value="Nyandarua"> Nyandarua</option>
                                                                <option value="Nyeri"> Nyeri</option>
                                                                <option value="Kirinyaga"> Kirinyaga</option>
                                                                <option value="Murang’a"> Murang’a</option>
                                                                <option value="Kiambu"> Kiambu</option>
                                                                <option value="Turkana"> Turkana</option>
                                                                <option value="West Pokot"> West Pokot</option>
                                                                <option value="Samburu"> Samburu</option>
                                                                <option value="Uasin Gishu"> Uasin Gishu</option>
                                                                <option value="Trans-Nzoia"> Trans-Nzoia</option>
                                                                <option value="Elgeyo-Marakwet"> Elgeyo-Marakwet
                                                                </option>
                                                                <option value="Nandi"> Nandi</option>
                                                                <option value="Baringo"> Baringo</option>
                                                                <option value="Laikipia"> Laikipia</option>
                                                                <option value="Nakuru"> Nakuru</option>
                                                                <option value="Narok"> Narok</option>
                                                                <option value="Kajiado"> Kajiado</option>
                                                                <option value="Kericho"> Kericho</option>
                                                                <option value="Bomet"> Bomet</option>
                                                                <option value="Kakamega"> Kakamega</option>
                                                                <option value="Vihiga"> Vihiga</option>
                                                                <option value="Bungoma"> Bungoma</option>
                                                                <option value="Busia"> Busia</option>
                                                                <option value="Siaya"> Siaya</option>
                                                                <option value="Kisumu"> Kisumu</option>
                                                                <option value="Homa Bay"> Homa Bay</option>
                                                                <option value="Migori"> Migori</option>
                                                                <option value="Kisii"> Kisii</option>
                                                                <option value="Nyamira"> Nyamira</option>
                                                                <option value="Nairobi"> Nairobi</option>
                                                            </select>
                                                            @error('country')
                                                            <span class="invalid-feedback" role="alert">
                                        <strong class="error-form" style="color: red;">{{ $message }}</strong>
                                    </span>
                                                            @enderror
                                                        </div>

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
