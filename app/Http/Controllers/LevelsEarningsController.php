<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelsEarningsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function levelsAndEarnings(Request $request){
        return view('admin.levels-and-earnings');
   }
}
