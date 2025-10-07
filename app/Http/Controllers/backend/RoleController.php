<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

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

}
