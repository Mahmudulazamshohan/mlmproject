<?php

namespace App\Http\Controllers;

use App\Admin;
use App\LevelSettings;
use App\MemberBonus;
use App\PushNotification;
use App\Upline;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
            'text' => 'required'
        ]);
        $pushNotification = PushNotification::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
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

        return view('superadmin.member-loan', compact('users'));
    }

    public function memberLoanDetails($id)
    {
        $user = User::find($id);
        return view('superadmin.member-loan-details', compact('user'));
    }

    public function memberBonusDetails($id)
    {
        $user = User::find($id);
        $memberBonuses = MemberBonus::where('user_id',$id)->paginate(30);
        return view('superadmin.member-bonus-details', compact('user','memberBonuses'));

    }

    public function storeMemberBonus(Request $request)
    {
        $this->validate($request, [
            'level' => 'required',
            'bonus' => 'required'
        ]);

        $memberBonus = MemberBonus::create([
            'user_id'=> $request->id,
            'level'=> $request->level,
            'bonus'=> $request->bonus
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
    public function storeMemberLoan(Request $request){

    }


}
