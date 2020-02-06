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
})->name('welcome');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/refferal-link', 'DashboardController@refferalLink')->name('refferal.link');
Route::post('/refferal-story', 'DashboardController@refferalStory')->name('refferal.story');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::post('/profile', 'ProfileController@storeProfile')->name('store.profile');
Route::get('/withdraw', 'WithdrawController@withdraw')->name('withdraw');
Route::post('/withdraw', 'WithdrawController@storeWithdraw')->name('store.withdraw');
Route::get('/levels-and-earnings', 'LevelsEarningsController@levelsAndEarnings')->name('levels-and-earnings');
Route::get('/story/{id}','HomeController@story')->name('story');
Route::get('/view-notification/{id}','DashboardController@viewNotification')->name('view-notification');
Route::get('/notifications','DashboardController@notifications')->name('notifications');
Route::prefix('admin')->group(function (){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/store-login', 'Auth\AdminLoginController@login')->name('admin.store-login');
    Route::post('/logout', function (){
        \Illuminate\Support\Facades\Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    })->name('admin.logout');

    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/withdraw-request', 'AdminController@withdrawRequest')->name('admin.withdraw-request');
    Route::get('/withdraw-paid/{id}', 'AdminController@withdrawPaid')->name('admin.withdraw-paid');
    Route::get('/users', 'AdminController@users')->name('admin.users');
    Route::get('/level-settings', 'AdminController@levelSettings')->name('admin.level-settings');
    Route::post('/level-settings', 'AdminController@storeLevelSettings')->name('admin.store-level-settings');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::post('/profile', 'AdminController@storeProfile')->name('admin.store.profile');
    Route::get('/manage-news', 'AdminController@manageNews')->name('admin.manage-news');
    Route::post('/manage-news', 'AdminController@storeManageNews')->name('admin.store.manage-news');
    Route::get('/edit-manage-news/{id}', 'AdminController@editManageNews')->name('admin.edit.manage-news');
    Route::get('/delete-manage-news/{id}', 'AdminController@deleteManageNews')->name('admin.delete.manage-news');
});
Route::get('/test', function () {
    echo \Illuminate\Support\Facades\Hash::make('123456').'';
    for ($i=1;$i<=11;$i++){echo $i;}
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
});
