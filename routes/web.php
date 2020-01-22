<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\TotalUpline;
use App\Upline;
use App\User;

Route::get('/', function () {
    //returuniqidn ();
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/refferal-link', 'DashboardController@refferalLink')->name('refferal.link');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/profile', 'ProfileController@storeProfile')->name('store.profile');
Route::get('/withdraw', 'WithdrawController@withdraw')->name('withdraw');
Route::get('/levels-and-earnings', 'LevelsEarningsController@levelsAndEarnings')->name('levels-and-earnings');

//Route::get('/test', function () {
//    $user = User::find(2);
//    if (isset($user)) {
//        $refferalUser = User::where('referral_code', $user->referral_code)->first();
//        if ($refferalUser) {
//            $refferalUpline = Upline::find($refferalUser->id);
//            $upline = new Upline();
//            $upline->user_id = $user->id;
//            $upline->level1 = $refferalUser->id;
//            if ($refferalUpline) {
//                if ($refferalUpline->level1) {
//                    $upline->level2 = $refferalUpline->level1;
//                    $totalUpline = TotalUpline::where('user_id',$refferalUpline->level1);
//                    $users = $totalUpline->first();
//                    $level = 'level2';
//                    $totalUpline->update([
//                        $level=>$users->{$level} + 1
//                    ]);
//                }
//                if ($refferalUpline->level2) {
//                    $upline->level3 = $refferalUpline->level2;
//                }
//                if ($refferalUpline->level3) {
//                    $upline->level4 = $refferalUpline->level3;
//                }
//                if ($refferalUpline->level4) {
//                    $upline->level5 = $refferalUpline->level4;
//                }
//                if ($refferalUpline->level5) {
//                    $upline->level6 = $refferalUpline->level5;
//                }
//                if ($refferalUpline->level6) {
//                    $upline->level7 = $refferalUpline->level6;
//                }
//                if ($refferalUpline->level7) {
//                    $upline->level8 = $refferalUpline->level7;
//                }
//                if ($refferalUpline->level8) {
//                    $upline->level9 = $refferalUpline->level8;
//                }
//                if ($refferalUpline->level9) {
//                    $upline->level10 = $refferalUpline->level9;
//                }
//                if ($refferalUpline->level10) {
//                    $upline->level11 = $refferalUpline->level10;
//                }
//
//
//            }
//            $upline->save();
//
//        }
//
//    }
//});
