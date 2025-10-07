<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller

{


    public function profile()
    {
        $user = Auth::user();
        return view('backend.profile.profile', compact('user'));
    }


    public function profileStore(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back();
        }


        $user->name = $request->name;
        $user->email = $request->email;
      

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $imageName = rand() . '.' . $file->extension();
            $file->move(public_path('backend/images/profile/'), $imageName);
            $user->profile_image = 'backend/images/profile/' . $imageName;
        }

        $user->save();

        return redirect()->back();
    }

}
