<?php


namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employe; 
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    
    public function employe()
    {
        $employees = Employe::all();
        return view('backend.employee.employe', compact('employees'));
    }

   
    public function employeAdd()
    {
        return view('backend.employee.employe-add');
    }

    
    public function employeStore(Request $request)
    {
        $employee = new Employe();


        $employee->employee_id = 'EMP' . rand(1000, 9999);

       
        $employee->joining_date = Carbon::now()->format('Y-m-d');

 
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->username = $request->username;
        $employee->email = $request->email;


        $employee->password = bcrypt($request->password);

        $employee->phone = $request->phone;
        $employee->role = $request->role;
        $employee->status = $request->status ?? 'Active';

        $employee->save();

        return redirect('/admin/employe');
    }


    public function employeView($id)
    {
        $employee = Employe::findOrFail($id);
        return view('backend.employee.employe-view', compact('employee'));
    }


    public function employeEdit($id)
    {
        $employee = Employe::findOrFail($id);
        return view('backend.employee.employe-edit', compact('employee'));
    }


    public function employeUpdate(Request $request, $id)
    {
        $employee = Employe::findOrFail($id);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->username = $request->username;
        $employee->email = $request->email;


        if ($request->password) {
            $employee->password = bcrypt($request->password);
        }

        $employee->phone = $request->phone;
        $employee->role = $request->role;
        $employee->status = $request->status ?? 'Active';

        $employee->save();

        return redirect('/admin/employe');
    }


    public function employeDelete($id)
    {
        $employee = Employe::findOrFail($id);
        $employee->delete();

        return redirect('/admin/employe');
    }
}

