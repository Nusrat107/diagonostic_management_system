<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Depertment;
use Illuminate\Http\Request;

class DepertmentController extends Controller
{

    public function depertment()
    {
        $departments = Depertment::all();
        return view('backend.depertment.depertment', compact('departments'));
    }

  
    public function depertmentAdd()
    {
        return view('backend.depertment.depertment-add');
    }

  
    public function depertmentStore(Request $request)
    {
        $department = new Depertment();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->status = $request->status;
        $department->save();

        return redirect('/admin/depertment');
    }

  
    public function depertmentView($id)
    {
        $department = Depertment::findOrFail($id);
        return view('backend.depertment.depertment-view', compact('department'));
    }

 
    public function depertmentEdit($id)
    {
        $department = Depertment::findOrFail($id);
        return view('backend.depertment.depertment-edit', compact('department'));
    }


    public function depertmentUpdate(Request $request, $id)
    {
        $department = Depertment::findOrFail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->status = $request->status;
        $department->save();

        return redirect('/admin/depertment');
    }


    public function depertmentDelete($id)
    {
        $department = Depertment::findOrFail($id);
        $department->delete();

        return redirect('/admin/depertment');
    }
}
