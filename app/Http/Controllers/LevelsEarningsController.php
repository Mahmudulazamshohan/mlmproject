<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelsEarningsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'block','confirmation']);
    }
   public function levelsAndEarnings(Request $request){
        return view('admin.levels-and-earnings');
   }
}
