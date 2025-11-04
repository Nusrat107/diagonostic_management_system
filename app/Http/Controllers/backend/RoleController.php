<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{

public function role()
    {
        $roles = Role::all();
        $modules = ['Employee','Holidays','Leave Request','Events'];
        return view('backend.role-setting.role', compact('roles', 'modules'));
    }


    public function roleAdd()
    {
        $modules = ['Employee','Holidays','Leave Request','Events'];
        return view('backend.role-setting.role-add', compact('modules'));
    }


    public function roleStore(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'permissions' => $request->permissions ?? []
        ]);

        return redirect('/admin/role');
    }


    public function roleEdit($id)
    {
        $role = Role::findOrFail($id);
        $modules = ['Employee','Holidays','Leave Request','Events'];
        return view('backend.role.edit', compact('role', 'modules'));
    }

  
    public function roleUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
            'permissions' => $request->permissions ?? []
        ]);

        return redirect('/admin/role');
    }

  
    public function roleDelete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/admin/role');
    }

    public function userCreate()
    {
        $users = User::latest()->get();
        return view('backend.users.users-create', compact('users'));
    }

       public function userStore(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'role'      => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/images/profile/'), $filename);
        }

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->status   = 'active';
        $user->profile_image = $filename;
        $user->save();

        return redirect()->back()->with('success', 'User created successfully!');
    }

}
