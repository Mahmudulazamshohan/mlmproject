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
Route::get('/story/{id}', 'HomeController@story')->name('story');
Route::get('/view-notification/{id}', 'DashboardController@viewNotification')->name('view-notification');
Route::get('/notifications', 'DashboardController@notifications')->name('notifications');
Route::get('/blocked', 'HomeController@blocked')->name('blocked');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/store-login', 'Auth\AdminLoginController@login')->name('admin.store-login');
    Route::post('/logout', function () {
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
    Route::post('/edit-profile', 'AdminController@editProfile')->name('admin.edit-profile');
    Route::get('/delete-manage-news/{id}', 'AdminController@deleteManageNews')->name('admin.delete.manage-news');
    Route::get('/manage-views', 'AdminController@manageViews')->name('admin.manage-views');
    Route::get('/members/{id}', 'AdminController@members')->name('admin.members');
    Route::get('/ban/{id}', 'AdminController@ban')->name('admin.members.ban');
    Route::get('/ban/{id}', 'AdminController@ban')->name('admin.members.ban');
    Route::get('/member-loans', 'AdminController@memberLoan')->name('admin.member-loans');
    Route::get('/member-loan/{id}', 'AdminController@memberLoanDetails')->name('admin.details.member-loan');
    Route::get('/member-loan', 'AdminController@storeMemberLoan')->name('admin.store.member-loan');
    Route::post('/member-loan-approve', 'AdminController@memberLoanApprove')->name('admin.approve.member-loan');
    Route::get('/member-loan-more/{id}', 'AdminController@memberLoanMore')->name('admin.member-loan-more');
    Route::get('/member-bonus/{id}', 'AdminController@memberBonusDetails')->name('admin.details.member-bonus');
    Route::get('/member-bonus', 'AdminController@memberBonus')->name('admin.member-bonus');
    Route::post('/member-bonus', 'AdminController@storeMemberBonus')->name('admin.store.member-bonus');
});
Route::get('/test', function () {

    function levelReturn($i,$val){
        $ranger = [20,40,60,80,100,120,140,160,180,200,10000000000000000];
        return $ranger[$i-1] > $val ;
    }
    $user = User::where('referral_code', 'EkGN0g')->first();

    $totalUpline = TotalUpline::where('user_id',$user->id)->first();
    $totalUplineSave = TotalUpline::find($totalUpline->id);
    for ($i=1;$i<12;$i++){
        $ranger = [20,40,60,80,100,120,140,160,180,200,10000000000000000];
        if( levelReturn($i,$totalUpline->{'level'.$i})){
            if($totalUplineSave->{'level'.$i} == 0 && $i!=1){
                $totalUplineSave->{'level'.$i} += $totalUplineSave->{'level'.($i - 1)} + 1;
            }else{
                $totalUplineSave->{'level'.$i} += 1;
            }

            $totalUplineSave->save();
            echo 'level'.$i;
            break;
        }
    }

});
