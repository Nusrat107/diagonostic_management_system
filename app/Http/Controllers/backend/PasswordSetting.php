<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PasswordSetting extends Controller
{
    public function passwordSetting()
    {
        $passwordSetting = Password::where('user_id', Auth::id())->latest()->first();
        return view('backend.password.password', compact('passwordSetting'));
    }

    public function passwordSettingStore(Request $request)
    {
        $user = Auth::user();

        // যদি user null হয়
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // current password check
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect!');
        }

        // update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // save record
        Password::create([
            'user_id' => $user->id,
            'changed_at' => now(),
        ]);

        return back();
    }
}
