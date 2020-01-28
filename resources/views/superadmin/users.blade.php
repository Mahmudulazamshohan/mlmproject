
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
                                    <h4 style="color: #fff !important;">Users Information</h4>
                                    <div class="card-header-right-icon" style="color: #fff;font-weight: bold;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Earn(Ksh)</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            @if($user->LevelIncome)
                                            <td>
                                                {{$user->LevelIncome->level1 + $user->LevelIncome->level2 + $user->LevelIncome->level3 +$user->LevelIncome->level4 +$user->LevelIncome->level5 +$user->LevelIncome->level6 +$user->LevelIncome->level7 +$user->LevelIncome->level8 +$user->LevelIncome->level9 +$user->LevelIncome->level10 +$user->LevelIncome->level11}}
                                            </td>
                                            @else
                                                <td>
                                                    0
                                                </td>
                                            @endif
{{--                                            <td>{{ collect($user->LevelIncome->get())->map(function ($l){return $l->level1 + $l->level2 + $l->level3;})->sum() }}</td>--}}



                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$users->links()}}

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
