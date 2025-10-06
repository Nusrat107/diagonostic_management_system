<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SalarySetting;
use Illuminate\Http\Request;

class SellarySetting extends Controller
{
     public function sellarySetting()
    {
        $salary = SalarySetting::first() ?? new SalarySetting();
        return view('backend.sellary-setting.sellary-setting', compact('salary'));
    }

    // Store or Update Salary Settings
    public function sellarySettingStore(Request $request)
    {
        $salary = SalarySetting::first() ?? new SalarySetting();

        // Directly save/update without validation
        $salary->da = $request->da;
        $salary->hra = $request->hra;
        $salary->pf_employee = $request->pf_employee;
        $salary->pf_organization = $request->pf_organization;
        $salary->esi_employee = $request->esi_employee;
        $salary->esi_organization = $request->esi_organization;

        $salary->save();

        return redirect()->back();
    }
}
