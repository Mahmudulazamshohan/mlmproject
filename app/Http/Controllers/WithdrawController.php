<?php

namespace App\Http\Controllers;

use App\JoinIncome;
use App\LevelIncome;
use App\LevelSettings;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    protected $levelSettings;

    public function __construct(LevelSettings $levelSettings)
    {
        $this->middleware(['auth', 'block','confirmation']);
        $this->levelSettings = $levelSettings->first();
    }

    public function withdraw()
    {
        $todayAmount = 0;
        $levelIncomes = LevelIncome::where('user_id', Auth::id())->get();
        $todayLevelIncomes = LevelIncome::where('user_id', Auth::id())->where('created_at', 'like', '%' . date('Y-m-d') . '%')->get();
        $withdraws = Withdraw::where('user_id', Auth::id())->get();

        $totalAmount = 0;
        $leveIncome = LevelIncome::where('user_id', Auth::id())->first();

        if ($leveIncome) {
            if ($leveIncome->level2 >= 50000) {
                $totalAmount += 2000;
            }
            if ($leveIncome->level2 >= 250000) {
                $totalAmount += 6000;
            }
            if ($leveIncome->level2 >= 450000) {
                $totalAmount += 12000;
            }
        }


        foreach ($todayLevelIncomes as $todayLevelIncome) {
            $todayAmount += $todayLevelIncome->level1 + $todayLevelIncome->level2 + $todayLevelIncome->level3 + $todayLevelIncome->level4 + $todayLevelIncome->level5 + $todayLevelIncome->level6 + $todayLevelIncome->level7 + $todayLevelIncome->level8 + $todayLevelIncome->level9 + $todayLevelIncome->level10 + $todayLevelIncome->level11;
        }

        $withdrawPending = $withdraws->where('status', 0)->sum('amount');
        $totalWithdraw = $withdraws->where('status', 1)->sum('amount');
        $withdrawPendingFees = $withdraws->where('status', 0)->sum('fees');
        $totalWithdrawFees = $withdraws->where('status', 1)->sum('fees');

        $withdraws = Withdraw::where('user_id', Auth::id())->paginate(10);

        return view('admin.withdraw', compact('withdraws', 'totalAmount', 'todayAmount', 'totalWithdraw', 'withdrawPending', 'withdrawPendingFees'
, 'totalWithdrawFees'));
}

    public function storeWithdraw(Request $request)
    {
        $this->validate($request, [
            'account' => 'required',
            'payment_method' => 'required',
            'amount' => 'required'
        ]);
        $fees = $this->percentageOfWithdraw($request->amount);
        $withdraw = new Withdraw();
        $withdraw->user_id = Auth::id();
        $withdraw->account = $request->account;
        $withdraw->payment_method = $request->payment_method;
        $withdraw->amount = $request->amount - $fees;
        $withdraw->fees = $fees;

        if ($this->levelSettings) {
            if ($request->amount <= $this->totalIncomeAmount()) {
                $withdraw->save();
                if ($withdraw) {
                    return redirect()->back()
                        ->with('success', true)
                        ->with('message', 'You withdraw request successfully done , You Withdrawals will be process within 24hrs');
                } else {

                    return redirect()->back()
                        ->with('fail', true)
                        ->with('message', 'withdraw request Failed,Please try agian');
                }
            } else {
                return redirect()->back()
                    ->with('fail', true)
                    ->with('message', 'Insufficient balance ');
            }
        }


    }

    /**
     * @param $amount
     * @return float|int
     */
    private function percentageOfWithdraw($amount)
    {
        $levelSettings = LevelSettings::first();
        $percentage = 0;
        if ($levelSettings) {
            $percentage = ($amount / 100) * $levelSettings->withdraw_fee;
        }
        return $percentage;
    }

    public function totalLevelIncomeAmount($request)
    {
        if (isset($request->level) && isset($request->amount)) {
            $currentLevel = $request->level;
            $amount = $request->amount;

            $levelIncome = LevelIncome::where('user_id', Auth::id())
                ->where($currentLevel, '>=', $amount)
                ->first();
            $totalIncome = 0;
            if ($levelIncome) {
                $totalIncome = $levelIncome->{$currentLevel};
            }


            $fixedLevelIncomeRange = [
                'level1' => 12500,
                'level2' => 50000,
                'level3' => 50000 * 2,
                'level4' => 50000 * 3,
                'level5' => 50000 * 4,
                'level6' => 50000 * 5,
                'level7' => 50000 * 6,
                'level8' => 50000 * 7,
                'level9' => 50000 * 8,
                'level10' => 50000 * 9,
                'level11' => 50000 * 10,

            ];
            if ($totalIncome >= $fixedLevelIncomeRange[$currentLevel]) {
                return $totalIncome;
            } else {
                return 0;
            }
        }
        return 0;

    }

    /**
     * @return int
     */
    private function totalIncomeAmount()
    {
        $total = 0;
        $leveIncome = LevelIncome::where('user_id', Auth::id())->first();

        if ($leveIncome) {
            if ($leveIncome->level2 >= 50000) {
                $total += 2000;
            }
            if ($leveIncome->level2 >= 250000) {
                $total += 6000;
            }
            if ($leveIncome->level2 >= 450000) {
                $total += 12000;
            }
        }
        $fees = ($total /100 ) * 7;
        return $total + $fees;
    }
}
