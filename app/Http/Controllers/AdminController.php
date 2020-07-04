<?php

namespace App\Http\Controllers;

use App\Admin;
use App\LevelIncome;
use App\LevelSettings;
use App\LoanApprove;
use App\MemberBonus;
use App\MemberLoan;
use App\PushNotification;
use App\TotalUpline;
use App\Upline;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $levelSetting = null;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->levelSetting = LevelSettings::first();
    }

    public function dashboard()
    {
        $users = User::all();
        $withdraws = Withdraw::all();
        $today = User::where('created_at', 'like', "%" . date('Y-m-d') . "%")->count();

        return view('superadmin.dashboard', compact('users', 'withdraws', 'today'));
    }

    public function withdrawRequest()
    {
        $withdraws = Withdraw::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.withdraw-request', compact('withdraws'));
    }

    public function withdrawPaid($id)
    {
        $withdraw = Withdraw::find($id);
        if ($withdraw) {
            if ($withdraw->status) {
                $withdraw->status = 0;
            } else {
                $withdraw->status = 1;
            }

            $withdraw->save();
            if ($withdraw) {

                return redirect()->back()
                    ->with('success', true)
                    ->with('message', !$withdraw->status ? 'Withdraw Paid Successfully done' : 'Withdraw Unpaid Successfully done');
            } else {
                return redirect()->back()
                    ->with('fail', true)
                    ->with('message', 'Failed to pay');
            }
        }
    }

    public function users()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.users', compact('users'));
    }

    public function levelSettings()
    {
        $levelSettings = LevelSettings::first();
        if (!$levelSettings) {
            $levelSettings = (object)[

                'join_income' => '',
                'refferal' => '',
                'minimum_withdraw' => '',
                'withdraw_fee' => ''
            ];
        }
        return view('superadmin.level-settings', compact('levelSettings'));
    }

    public function storeLevelSettings(Request $request)
    {
        $this->validate($request, [
            'join_income' => 'required|integer',
            'refferal' => 'required|integer',
            'minimum_withdraw' => 'required|integer',
            'withdraw_fee' => 'required|integer'
        ]);
        $levelSetttings = LevelSettings::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            $request->all()
        );
        if ($levelSetttings) {

            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Level Settings Successfully saved');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Level Settings Failed to save');
        }
    }

    public function profile()
    {
        $profile = Admin::find(Auth::id());
        // dd(Auth::id());
        return view('superadmin.profile', compact('profile'));
    }

    public function storeProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $admin = Auth::user();
        if ($admin) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            if (isset($request->password)) {
                $admin->password = Hash::make($request->password);
            }
            //$admin->password =  $password;
            $admin->save();
            if ($admin) {
                return redirect()->back()
                    ->with('success', true)
                    ->with('message', 'Profile Successfully updated');
            } else {
                return redirect()->back()
                    ->with('fail', true)
                    ->with('message', 'Profile Failed to updated');
            }

        }
    }

    public function manageNews()
    {
        $pushNotifications = PushNotification::orderBy('id', 'desc')->paginate(10);

        return view('superadmin.manage-news', compact('pushNotifications'));
    }

    public function storeManageNews(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'text' => 'required'
        ]);
        $pushNotification = PushNotification::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'title'=>$request->title,
                'text' => $request->text
            ]
        );
        if ($pushNotification) {
            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Notification created successfully');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Notification faild to create , please try again');
        }

    }

    public function editManageNews($id)
    {
        $user = User::find($id);
        return view('superadmin.edit-manage-news', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if ($user) {
            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Member Profile successfully updated');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Member Profile faild to update , please try again');
        }

    }

    public function deleteManageNews($id)
    {
        $pushNotification = PushNotification::where('id', $id)->delete();

        if ($pushNotification) {
            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Notification deleted successfully');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Notification faild to delete , please try again');
        }
    }

    public function manageViews(Request $request)
    {
        if (isset($request->search)) {
            $search = $request->search;
            $users = User::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('referral_code', 'like', "%$search%")
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(10);
        }


        return view('superadmin.manage-views', compact('users'));
    }

    public function members($id)
    {
        $user = User::find($id);
        $directLevels = Upline::where('level1', $id)->paginate(10);
        return view('superadmin.members', compact('user', 'directLevels'));
    }

    public function ban($id)
    {
        $user = User::find($id);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
        if ($user) {
            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Member ban successfully');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Member faild to ban , please try again');
        }

    }

    public function memberLoan(Request $request)
    {
        $memberLoans = MemberLoan::paginate(100);
        return view('superadmin.member-loan', compact('memberLoans'));
    }

    public function memberLoanDetails($id)
    {
        $memberLoan = MemberLoan::find($id);
        return view('superadmin.member-loan-details', compact('memberLoan'));
    }

    public function memberBonusDetails($id)
    {
        $user = User::find($id);
        $memberBonuses = MemberBonus::where('user_id', $id)->paginate(30);
        return view('superadmin.member-bonus-details', compact('user', 'memberBonuses'));

    }

    public function storeMemberBonus(Request $request)
    {
        $this->validate($request, [
            'level' => 'required',
            'bonus' => 'required'
        ]);

        $memberBonus = MemberBonus::create([
            'user_id' => $request->id,
            'level' => $request->level,
            'bonus' => $request->bonus
        ]);
        if ($memberBonus) {
            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Member Bonus created successfully');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Member Bonus faild to create , please try again');
        }
    }

    public function memberBonus(Request $request)
    {
        if (isset($request->search)) {
            $search = $request->search;
            $users = User::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('referral_code', 'like', "%$search%")
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(10);
        }

        return view('superadmin.member-bonus', compact('users'));
    }

    public function memberLoanApprove(Request $request)
    {
        $memberLoan = MemberLoan::find($request->id);
        $memberLoan->approved = $request->approved == 'on' ? 1: 0;
        $memberLoan->paid = $request->paid== 'on' ? 1: 0;
        $memberLoan->save();
        if ($memberLoan) {


            return redirect()->route('admin.member-loans')
                ->with('success', true)
                ->with('message', ' Loan Approved');


        } else {

            return redirect()->route('admin.member-loans')
                ->with('fail', true)
                ->with('message', 'Loan Failed , please try again');

        }
    }

    public function memberLoanMore($id)
    {
        $user = User::find($id);
        $memberLoans = MemberLoan::where('user_id', $id)->paginate(100);
        return view('superadmin.member-loan-more', compact('user', 'memberLoans'));
    }
    public function active($id){
        $user = User::find($id);
        $user->active = !$user->active;
        $user->save();
        //dd($user->Upline->level1);
        $this->addTotalUpline($user);
         $this->mlmSystem($user);
        //$this->joinIncomeAdd($user);

        if ($user) {

            return redirect()->back()
                ->with('success', true)
                ->with('message', 'User Active Successfully done');


        } else {

            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'User Active failed');

        }
    }
    private function levelReturn($i,$val){
        $ranger = [5,20,40,60,80,100,120,140,160,180,200];
        return $ranger[$i-1] > $val && $val < 201;
    }
    private function addTotalUpline($user){
       // $user = User::where('referral_code', $user->referral_code)->first();
        $totalUpline = TotalUpline::where('user_id',$user->Upline->level1)->first();
        $totalUplineSave = TotalUpline::find($totalUpline->id);
        for ($i=1;$i<12;$i++){
            $ranger = [5,20,40,60,80,100,120,140,160,180,200];

            if( $this->levelReturn($i,$totalUpline->{'level'.$i})){
                if($totalUplineSave->{'level'.$i} == 0 && $i!=1){
                    $totalUplineSave->{'level'.$i} += $totalUplineSave->{'level'.($i - 1)} + 1;
                }else{
                    $totalUplineSave->{'level'.$i} += 1;
                }

                $totalUplineSave->save();

                break;
            }
        }
    }
    private function mlmSystem($user)
    {
        if (isset($user)) {
            $refferalUser = $user->Upline;
                $refferalUpline = Upline::where('user_id', $refferalUser->level1)->first();
                $upline = new Upline();
                $upline->user_id = $user->id;
                //$upline->level1 = $refferalUser->id;
                $this->addLevelTotalUpline($refferalUser->level1, 'level1');
                // $this->addLevelIncome($refferalUpline, 'level1');


                if ($refferalUpline) {
                    if ($refferalUpline->level1) {
                        //$upline->level2 = $refferalUpline->level1;
                        $this->addLevelTotalUpline($refferalUpline->level1, 'level2');
                        // $this->addLevelIncome($refferalUpline->level1, 'level2');

                    }
                    if ($refferalUpline->level2) {
                        //$upline->level3 = $refferalUpline->level2;
                        $this->addLevelTotalUpline($refferalUpline->level2, 'level3');
                        //$this->addLevelIncome($refferalUpline->level2, 'level3');


                    }
                    if ($refferalUpline->level3) {
                        //$upline->level4 = $refferalUpline->level3;
                        $this->addLevelTotalUpline($refferalUpline->level3, 'level4');
                        //$this->addLevelIncome($refferalUpline->level3, 'level4');


                    }
                    if ($refferalUpline->level4) {
                        //$upline->level5 = $refferalUpline->level4;
                        $this->addLevelTotalUpline($refferalUpline->level4, 'level5');
                        //$this->addLevelIncome($refferalUpline->level4, 'level5');


                    }
                    if ($refferalUpline->level5) {
                        //$upline->level6 = $refferalUpline->level5;
                        $this->addLevelTotalUpline($refferalUpline->level5, 'level6');


                    }
                    if ($refferalUpline->level6) {
                        //$upline->level7 = $refferalUpline->level6;
                        $this->addLevelTotalUpline($refferalUpline->level6, 'level7');


                    }
                    if ($refferalUpline->level7) {
                        //$upline->level8 = $refferalUpline->level7;
                        $this->addLevelTotalUpline($refferalUpline->level7, 'level8');


                    }
                    if ($refferalUpline->level8) {
                       // $upline->level9 = $refferalUpline->level8;
                        $this->addLevelTotalUpline($refferalUpline->level8, 'level9');


                    }
                    if ($refferalUpline->level9) {
                       // $upline->level10 = $refferalUpline->level9;
                        $this->addLevelTotalUpline($refferalUpline->level9, 'level10');


                    }
                    if ($refferalUpline->level10) {
                        //$upline->level11 = $refferalUpline->level10;
                        $this->addLevelTotalUpline($refferalUpline->level10, 'level11');


                    }


                }

               // $upline->save();

                DB::commit();

            }


    }

    /**
     * @param $id
     * @param $level
     */
    private function addLevelTotalUpline($id, $level)
    {
        $totalUpline = TotalUpline::where('user_id', $id);
        $users = $totalUpline->first();
        if ($users) {
//            $totalUpline->update([
//                $level => $users->{$level} + 1
//            ]);
            $this->addLevelIncome($id, $level, $users);

        }
    }

    private function addLevelIncome($id, $level, $users)
    {
        $amount = 0;
        if ($this->levelSetting) {
            $amount = $this->levelSetting->refferal;
        }
        $totalUpline = TotalUpline::where('user_id', $id)->first();
        for ($i = 1; $i <= 11; $i++) {
            $levelIncome = LevelIncome::where('user_id', $id)->update([
                'level' . $i => $totalUpline->{'level' . $i} * $amount
            ]);
        }


    }


}
