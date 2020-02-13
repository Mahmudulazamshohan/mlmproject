<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\JoinIncome;
use App\LevelIncome;
use App\LevelSettings;
use App\Providers\RouteServiceProvider;
use App\TotalUpline;
use App\Upline;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $levelSetting = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->levelSetting = LevelSettings::first();

    }

    public function showRegistrationForm()
    {
        $refferal_id = null;
        if (\request()->has('refferal_id')) {
            if (User::where('referral_code', \request()->input('refferal_id'))->first()) {
                $refferal_id = \request()->input('refferal_id');
            }

        }
        return view('auth.register', compact('refferal_id'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required'],
            'country' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone'=>$data['phone'],
                'country'=>$data['country'],
            ]);
            $user->referral_code = $this->quickRandom(6);
            $user->save();
            $this->addTotalUpline($user,$data);
            $this->mlmSystem($user, $data);
            $this->joinIncomeAdd($user);
            $totalUpline = new TotalUpline();
            $totalUpline->user_id = $user->id;
            $totalUpline->save();
            $levelIncome = new LevelIncome();
            $levelIncome->user_id = $user->id;
            $levelIncome->save();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

        return $user;
    }
    private function levelReturn($i,$val){
        $ranger = [20,40,60,80,100,120,140,160,180,200,10000000000000000];
        return $ranger[$i-1] > $val ;
    }
    private function addTotalUpline($user,$data){
        $user = User::where('referral_code', $data['referral_code'])->first();
        $totalUpline = TotalUpline::where('user_id',$user->id)->first();
        $totalUplineSave = TotalUpline::find($totalUpline->id);
        for ($i=1;$i<12;$i++){
            $ranger = [20,40,60,80,100,120,140,160,180,200,10000000000000000];

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

    /**
     * @param $user
     * @param $data
     */
    private function mlmSystem($user, $data)
    {
        if (isset($user)) {
            $refferalUser = User::where('referral_code', $data['referral_code'])->first();
            if ($refferalUser) {
                $refferalUpline = Upline::where('user_id', $refferalUser->id)->first();
                $upline = new Upline();
                $upline->user_id = $user->id;

                $upline->level1 = $refferalUser->id;
                $this->addLevelTotalUpline($refferalUser->id, 'level1');
                // $this->addLevelIncome($refferalUpline, 'level1');


                if ($refferalUpline) {
                    if ($refferalUpline->level1) {
                        $upline->level2 = $refferalUpline->level1;
                        $this->addLevelTotalUpline($refferalUpline->level1, 'level2');
                        // $this->addLevelIncome($refferalUpline->level1, 'level2');

                    }
                    if ($refferalUpline->level2) {
                        $upline->level3 = $refferalUpline->level2;
                        $this->addLevelTotalUpline($refferalUpline->level2, 'level3');
                        //$this->addLevelIncome($refferalUpline->level2, 'level3');


                    }
                    if ($refferalUpline->level3) {
                        $upline->level4 = $refferalUpline->level3;
                        $this->addLevelTotalUpline($refferalUpline->level3, 'level4');
                        //$this->addLevelIncome($refferalUpline->level3, 'level4');


                    }
                    if ($refferalUpline->level4) {
                        $upline->level5 = $refferalUpline->level4;
                        $this->addLevelTotalUpline($refferalUpline->level4, 'level5');
                        //$this->addLevelIncome($refferalUpline->level4, 'level5');


                    }
                    if ($refferalUpline->level5) {
                        $upline->level6 = $refferalUpline->level5;
                        $this->addLevelTotalUpline($refferalUpline->level5, 'level6');


                    }
                    if ($refferalUpline->level6) {
                        $upline->level7 = $refferalUpline->level6;
                        $this->addLevelTotalUpline($refferalUpline->level6, 'level7');


                    }
                    if ($refferalUpline->level7) {
                        $upline->level8 = $refferalUpline->level7;
                        $this->addLevelTotalUpline($refferalUpline->level7, 'level8');


                    }
                    if ($refferalUpline->level8) {
                        $upline->level9 = $refferalUpline->level8;
                        $this->addLevelTotalUpline($refferalUpline->level8, 'level9');


                    }
                    if ($refferalUpline->level9) {
                        $upline->level10 = $refferalUpline->level9;
                        $this->addLevelTotalUpline($refferalUpline->level9, 'level10');


                    }
                    if ($refferalUpline->level10) {
                        $upline->level11 = $refferalUpline->level10;
                        $this->addLevelTotalUpline($refferalUpline->level10, 'level11');


                    }


                }

                $upline->save();

                DB::commit();

            }

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

    private function joinIncomeAdd($user)
    {
        $amount = 0;
        if ($this->levelSetting) {
            $amount = $this->levelSetting->join_income;
        }


        if ($user) {
            JoinIncome::create([
                'user_id' => $user->id,
                'amount' => $amount
            ]);
        }

        $ch = curl_init();
        $fields = [
            'jp_item_type' => env('jp_item_type'),
            'jp_item_name' => env('jp_item_name'),
            'order_id' => mt_rand(10,100000000),
            'jp_business' => env('jp_business'),
            'jp_amount_1' => '3500',
            'jp_payee' => $user->email,
            'jp_shipping' => env('jp_shipping'),
            'jp_rurl' => route('admin.login'),
            'jp_furl' => route('admin.login'),
            'jp_curl' => route('admin.login'),

        ];
        curl_setopt($ch, CURLOPT_URL, "https://www.jambopay.com/JPExpress.aspx");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);


// Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        echo $server_output;
        if ($server_output == "OK") {

        } else {
        }
    }

    private function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

}
