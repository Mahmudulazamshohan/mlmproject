<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            ]);
            $user->referral_code = $this->quickRandom(6);
            $user->save();

            $this->mlmSystem($user, $data);
            $totalUpline = new TotalUpline();
            $totalUpline->user_id = $user->id;
            $totalUpline->save();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return $user;
    }

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


                if ($refferalUpline) {
                    if ($refferalUpline->level1) {
                        $upline->level2 = $refferalUpline->level1;
                        $this->addLevelTotalUpline($refferalUpline->level1, 'level2');

                    }
                    if ($refferalUpline->level2) {
                        $upline->level3 = $refferalUpline->level2;
                        $this->addLevelTotalUpline($refferalUpline->level2, 'level3');


                    }
                    if ($refferalUpline->level3) {
                        $upline->level4 = $refferalUpline->level3;
                        $this->addLevelTotalUpline($refferalUpline->level3, 'level4');


                    }
                    if ($refferalUpline->level4) {
                        $upline->level5 = $refferalUpline->level4;
                        $this->addLevelTotalUpline($refferalUpline->level4, 'level5');


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

    private function addLevelTotalUpline($id, $level)
    {
        $totalUpline = TotalUpline::where('user_id', $id);
        $users = $totalUpline->first();
        if ($users) {
            $totalUpline->update([
                $level => $users->{$level} + 1
            ]);
        }
    }

    private function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
