<?php

namespace App\Http\Controllers;

use App\BusinessStory;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function story($id)
    {
        $user = User::where('referral_code', $id)->first();
        $businessStory = null;
        if ($user && !$user->is_blocked) {

            $businessStory = BusinessStory::where('user_id', $user->id)->first();

            return view('admin.story', compact('id', 'businessStory'));
        }else{
            return view('admin.block');
        }

    }

    public function blocked(){
        return view('admin.block');
    }
}
