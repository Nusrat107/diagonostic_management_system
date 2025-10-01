<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\ProvidentFund;
use Illuminate\Http\Request;


class ProvidentController extends Controller
{

    public function provident()
    {
        $providents = ProvidentFund::latest()->get();
        return view('backend.provident.provident', compact('providents'));
    }

    public function providentAdd()
    {
        $employees = Employe::all();
        return view('backend.provident.provident-add', compact('employees'));
    }

    public function providentStore(Request $request)
    {
        $provident = new ProvidentFund();
        $provident->employee_id = $request->employee_id;
        $provident->fund_type = $request->fund_type;

        if ($request->fund_type == 'Fixed Amount') {
            $provident->employee_share_amount = $request->employee_share_amount;
            $provident->organization_share_amount = $request->organization_share_amount;
        } else {
            $provident->employee_share_percentage = $request->employee_share_percentage;
            $provident->organization_share_percentage = $request->organization_share_percentage;
        }

        $provident->status = $request->status; 
        $provident->description = $request->description;
        $provident->save();

        return redirect('/admin/provident');
    }

    public function providentView($id)
    {
        $provident = ProvidentFund::findOrFail($id);
        return view('backend.provident.provident-view', compact('provident'));
    }

    public function providentEdit($id)
    {
        $provident = ProvidentFund::findOrFail($id);
        $employees = Employe::all();
        return view('backend.provident.provident-edit', compact('provident', 'employees'));
    }

    public function providentUpdate(Request $request, $id)
    {
        $provident = ProvidentFund::findOrFail($id);

        $provident->employee_id = $request->employee_id;
        $provident->fund_type = $request->fund_type;

        if ($request->fund_type == 'Fixed Amount') {
            $provident->employee_share_amount = $request->employee_share_amount;
            $provident->organization_share_amount = $request->organization_share_amount;
            $provident->employee_share_percentage = null;
            $provident->organization_share_percentage = null;
        } else {
            $provident->employee_share_percentage = $request->employee_share_percentage;
            $provident->organization_share_percentage = $request->organization_share_percentage;
            $provident->employee_share_amount = null;
            $provident->organization_share_amount = null;
        }

        $provident->status = $request->status; 
        $provident->description = $request->description;
        $provident->save();

        return redirect('/admin/provident');
    }

    public function providentDelete($id)
    {
        $provident = ProvidentFund::findOrFail($id);
        $provident->delete();

        return redirect('/admin/provident');
    }
}


