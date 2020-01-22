<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function storeProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'new_password' => 'nullable|min:6',
            'image' => 'mimes:jpg,png,jpeg,gif'
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        if ($request->has('new_password')) {
            $user->password = Hash::make($request->new_password);
        }
        $imageLocation = null;
        $user->save();
        if ($request->hasFile('image')) {
            $imageLocation = time() . '.' . request()->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageLocation);
            if ($user) {
                $profile = Profile::updateOrCreate([
                    'user_id' => Auth::id()
                ], [
                    'image' => $imageLocation
                ]);
                if ($profile) {
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
        return redirect()->back()
            ->with('success', true)
            ->with('message', 'Profile Successfully updated');


    }

}
