<?php

namespace App\Http\Controllers;

use App\BusinessStory;
use App\JoinIncome;
use App\LevelIncome;
use App\LevelSettings;
use App\Upline;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalAmount = 0;
        $todayAmount = 0;
        $totalWithdraw = 0;
        $withdrawPending = 0;
        $levelIncomes = LevelIncome::where('user_id', Auth::id())->get();
        $todayLevelIncomes = LevelIncome::where('user_id', Auth::id())->where('created_at','like','%'.date('Y-m-d').'%')->get();
        $withdraws = Withdraw::where('user_id',Auth::id())->get();

        $joinIncome = JoinIncome::where('user_id', Auth::id())->first();
        foreach ($levelIncomes as $levelIncome) {
            $totalAmount += $levelIncome->level1 + $levelIncome->level2 + $levelIncome->level3 + $levelIncome->level4 + $levelIncome->level5 + $levelIncome->level6 + $levelIncome->level7 + $levelIncome->level8 + $levelIncome->level9 + $levelIncome->level10 + $levelIncome->level11;
        }
        if ($joinIncome) {
            $totalAmount += $joinIncome->amount;
        }
        foreach ($todayLevelIncomes as $todayLevelIncome) {
            $todayAmount += $todayLevelIncome->level1 + $todayLevelIncome->level2 + $todayLevelIncome->level3 + $todayLevelIncome->level4 + $todayLevelIncome->level5 + $todayLevelIncome->level6 + $todayLevelIncome->level7 + $todayLevelIncome->level8 + $todayLevelIncome->level9 + $todayLevelIncome->level10 + $todayLevelIncome->level11;
        }
//        foreach ($withdraws->where('status',1)->values() as $withdraw){
//            $totalWithdraw += $withdraw->amount;
//        }
//        foreach ($withdraws->where('status',0)->values() as $withdraw){
//            $withdrawPending += $withdraw->amount;
//        }
        $withdrawPending = $withdraws->where('status',0)->sum('amount');
        $totalWithdraw = $withdraws->where('status',1)->sum('amount');
        $withdrawPendingFees = $withdraws->where('status',0)->sum('fees');
        $totalWithdrawFees = $withdraws->where('status',1)->sum('fees');
        $uplines = Upline::where('level1',Auth::id())->paginate(10);
        return view('admin.dashboard', compact('totalAmount','todayAmount','totalWithdraw','withdrawPending','withdrawPendingFees'
,'totalWithdrawFees','uplines'));
    }

    public function refferalLink()
    {
        return view('admin.refferal-link');
    }

    public function refferalStory(Request $request)
    {
        $this->validate($request, [
            'story' => 'required'
        ]);
        $businessStory = BusinessStory::updateOrCreate(
            [
                'user_id' => Auth::id()
            ],
            [
                'story' => $request->story
            ]
        );
        if ($businessStory) {

            return redirect()->back()
                ->with('success', true)
                ->with('message', 'Story Successfully saved');
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Story Failed to save');
        }
    }


}
