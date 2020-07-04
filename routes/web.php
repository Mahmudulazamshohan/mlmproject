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

use App\LevelIncome;
use App\TotalUpline;
use App\Upline;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

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
Route::get('/loan', 'DashboardController@loan')->name('loan');
Route::post('/loan', 'DashboardController@storeLoan')->name('store.loan');
Route::get('/blocked', 'HomeController@blocked')->name('blocked');
Route::get('/confirm', 'HomeController@confirm')->name('confirm');

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
    Route::get('/active/{id}', 'AdminController@active')->name('admin.active');
});
Route::get('/result', function (\Illuminate\Support\Facades\Request $request) {
    dd($request);
})->name('result');
Route::get('/test', function (\Illuminate\Http\Request $request) {

    $qa = 'a';
    $user = User::whereHas('profile', function (\Illuminate\Database\Eloquent\Builder $query) {
        $query->where('image', 'like', '%jpg%');
    })->toSql();
    dd($user);
//    $ch = curl_init();
//    $fields = [
//        'jp_item_type' => env('jp_item_type'),
//        'jp_item_name' => env('jp_item_name'),
//        'order_id' => time(),
//        'jp_business' => 'salonquip.co.ke@gmail.com',
//        'jp_amount_1' => '3500',
//        'jp_payee' => 'mahmudulazam@gmail.com',
//        'jp_shipping' => env('jp_shipping'),
//        'jp_rurl' => route('result'),
//        'jp_furl' => route('result'),
//        'jp_curl' => route('result'),
//
//    ];
//    curl_setopt($ch, CURLOPT_URL, "https://www.jambopay.com/JPExpress.aspx");
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
//
//
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//    $server_output = curl_exec($ch);
//
//    curl_close($ch);
//   dd($server_output);
//    if ($server_output == "OK") {
//
//    } else {
//    }

});
