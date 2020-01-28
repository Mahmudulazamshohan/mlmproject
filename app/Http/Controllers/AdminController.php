<?php

namespace App\Http\Controllers;

use App\Admin;
use App\LevelSettings;
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


}
