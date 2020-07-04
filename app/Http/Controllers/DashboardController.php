<?php

namespace App\Http\Controllers;

use App\BusinessStory;
use App\JoinIncome;
use App\LevelIncome;
use App\LevelSettings;
use App\MemberLoan;
use App\PushNotification;
use App\PushNotificationView;
use App\TotalUpline;
use App\Upline;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'block','confirmation']);
    }

    private function levelReturn($i, $val)
    {
        $ranger = [5, 20, 40, 60, 80, 100, 120, 140, 160, 180, 200];
        return $ranger[$i - 1] > $val && $val < 201;
    }

    public function dashboard()
    {
        $totalAmount = 0;
        $todayAmount = 0;
        $totalWithdraw = 0;
        $withdrawPending = 0;
        $levelIncomes = LevelIncome::where('user_id', Auth::id())->get();
        $todayLevelIncomes = LevelIncome::where('user_id', Auth::id())->where('created_at', 'like', '%' . date('Y-m-d') . '%')->get();
        $withdraws = Withdraw::where('user_id', Auth::id())->get();

        $joinIncome = JoinIncome::where('user_id', Auth::id())->first();
        foreach ($levelIncomes as $levelIncome) {
            $totalAmount += $levelIncome->level1 + $levelIncome->level2 + $levelIncome->level3 + $levelIncome->level4 + $levelIncome->level5 + $levelIncome->level6 + $levelIncome->level7 + $levelIncome->level8 + $levelIncome->level9 + $levelIncome->level10 + $levelIncome->level11;
        }

        foreach ($todayLevelIncomes as $todayLevelIncome) {
            $todayAmount += $todayLevelIncome->level1 + $todayLevelIncome->level2 + $todayLevelIncome->level3 + $todayLevelIncome->level4 + $todayLevelIncome->level5 + $todayLevelIncome->level6 + $todayLevelIncome->level7 + $todayLevelIncome->level8 + $todayLevelIncome->level9 + $todayLevelIncome->level10 + $todayLevelIncome->level11;
        }

        $totalUpline = TotalUpline::where('user_id', Auth::id())->first();
        $totalUplineAmount = 0;
        $arr = [];
        for ($i = 1; $i < 12; $i++) {
            $arr[] = $totalUpline->{'level' . $i};
        }

        $totalUplineAmount = collect($arr)->max();
        $withdrawPending = $withdraws->where('status', 0)->sum('amount');
        $totalWithdraw = $withdraws->where('status', 1)->sum('amount');
        $withdrawPendingFees = $withdraws->where('status', 0)->sum('fees');
        $totalWithdrawFees = $withdraws->where('status', 1)->sum('fees');
        $uplines = Upline::where('level1', Auth::id())->paginate(10);
        $levelSettings = LevelSettings::first();
        $today = Upline::where('level1', Auth::id())->where('created_at', '>=', Carbon::today()->toDateString())->count();
        $memberLoan = MemberLoan::where('user_id', Auth::id())->get();

        return view('admin.dashboard', compact('totalAmount', 'todayAmount', 'totalWithdraw', 'withdrawPending', 'withdrawPendingFees'
            , 'totalWithdrawFees',
            'uplines',
            'withdraws',
            'today',
            'totalUplineAmount',
            'levelSettings',
            'memberLoan'
        ));

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

    public function viewNotification($id)
    {
        $pushNotification = PushNotification::find($id);

        $pushNotificationView = PushNotificationView::where('push_notification_views_id', $id)
            ->where('user_id', Auth::id())
            ->first();
       // dd($pushNotification);
        if (!$pushNotificationView) {
            $pushNotification = PushNotificationView::create([
                'push_notification_views_id' => $pushNotification->id,
                'user_id' => Auth::id()
            ]);
        }
        return view('admin.view-notification', compact('pushNotification'));
    }

    public function notifications()
    {
        $pushNotifications = PushNotification::all();
        return view('admin.notifications', compact('pushNotifications'));
    }

    public function loan()
    {
        $levelIncome = LevelIncome::where('user_id', Auth::id())->first();
        $totolLevelIncome = 0;
        for ($i = 1; $i < 12; $i++) {
            $totolLevelIncome += $levelIncome->{'level' . $i};
        }
        $memberLoan = MemberLoan::where('user_id', Auth::id())
            ->where('paid', 0)
            ->get();
        $amount = $memberLoan->sum('amount');
        $interest = $memberLoan->sum('interest');
        $totalLoan = $amount + $interest;
        $total = $totolLevelIncome - $totalLoan;

        $memberLoans = MemberLoan::where('user_id', Auth::id())->get();
        $memberLoanLast = MemberLoan::where('user_id',Auth::id())->get()->last();

        return view('admin.loan',
            compact(
                'total',
                'memberLoans',
                'memberLoanLast'
            ));
    }

    public function storeLoan(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'agree' => 'required'
        ]);
        $totalUpline = TotalUpline::where('user_id', Auth::id())->first();
        $totalUplineAmount = 0;
        $arr = [];
        for ($i = 1; $i < 12; $i++) {
            $arr[] = $totalUpline->{'level' . $i};
        }
        $totalUplineAmount = collect($arr)->max();
        $memberLoan = MemberLoan::where('user_id', Auth::id())
            ->get();

        $amount = $memberLoan->sum('amount');
        $interest = $memberLoan->sum('interest');

        $totalLoan = $amount + $interest;
        $total = (1 * LevelSettings::first()->refferal) - $totalLoan;
        //echo $total > 0 && $request->amount <= $total;

        if ($total > 0 && $request->amount <= $total) {
            $memberLoan = new MemberLoan();
            $memberLoan->user_id = Auth::id();
            $memberLoan->amount = $request->amount;
            $memberLoan->interest = $this->percentage($request->amount, 10);
            $memberLoan->save();
            if ($memberLoan) {

                return redirect()->back()
                    ->with('success', true)
                    ->with('message', 'Loan Request Successfully done');
            } else {
                return redirect()->back()
                    ->with('fail', true)
                    ->with('message', 'Loan Request failed done');
            }
        } else {
            return redirect()->back()
                ->with('fail', true)
                ->with('message', 'Loan request failed ,Please repay your previos loan or achive your loan goal');
        }

    }

    private function percentage($amount, $percent)
    {
        return ($amount / 100) * $percent;
    }


}
