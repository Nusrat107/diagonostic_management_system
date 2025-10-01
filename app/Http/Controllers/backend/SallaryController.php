<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Sallary;
use Illuminate\Http\Request;

class SallaryController extends Controller
{

 public function sallary()
    {
        $salaries = Sallary::with('employee')->latest()->get();
        return view('backend.sallary.sallary', compact('salaries'));
    }

    public function sallaryAdd()
    {
        $staffs = Employe::all();
        return view('backend.sallary.sallary-add', compact('staffs'));
    }

    public function sallaryStore(Request $request)
    {
        $salary = new Sallary();

        $salary->staff_id = $request->staff_id;
        $salary->net_salary = $request->net_salary;
        $salary->basic_salary = $request->basic_salary;
        $salary->da = $request->da;
        $salary->hra = $request->hra;
        $salary->conveyance = $request->conveyance;
        $salary->allowance = $request->allowance;
        $salary->medical_allowance = $request->medical_allowance;
        $salary->other_earnings = $request->other_earnings;
        $salary->tds = $request->tds;
        $salary->esi = $request->esi;
        $salary->pf = $request->pf;
        $salary->leave_deduction = $request->leave_deduction;
        $salary->prof_tax = $request->prof_tax;
        $salary->labour_welfare = $request->labour_welfare;
        $salary->fund = $request->fund;
        $salary->other_deductions = $request->other_deductions;
        $salary->salary_month = $request->salary_month;

        $salary->save();

        return redirect('/admin/sallary')->with('success', 'Salary created successfully.');
    }

    public function sallaryView($id)
    {
        $payslip = Sallary::with('employee')->findOrFail($id);
        return view('backend.sallary.sallary-view', compact('payslip'));
    }

    public function sallaryEdit($id)
    {
        $salary = Sallary::findOrFail($id);
        $staffs = Employe::all();
        return view('backend.sallary.sallary-edit', compact('salary', 'staffs'));
    }

    public function sallaryUpdate(Request $request, $id)
    {
        $salary = Sallary::findOrFail($id);

        $salary->staff_id = $request->staff_id;
        $salary->net_salary = $request->net_salary;
        $salary->basic_salary = $request->basic_salary;
        $salary->da = $request->da;
        $salary->hra = $request->hra;
        $salary->conveyance = $request->conveyance;
        $salary->allowance = $request->allowance;
        $salary->medical_allowance = $request->medical_allowance;
        $salary->other_earnings = $request->other_earnings;
        $salary->tds = $request->tds;
        $salary->esi = $request->esi;
        $salary->pf = $request->pf;
        $salary->leave_deduction = $request->leave_deduction;
        $salary->prof_tax = $request->prof_tax;
        $salary->labour_welfare = $request->labour_welfare;
        $salary->fund = $request->fund;
        $salary->other_deductions = $request->other_deductions;
        $salary->salary_month = $request->salary_month;

        $salary->save();
        return redirect('/admin/sallary');
    }

    public function sallaryDelete($id)
    {
        $salary = Sallary::findOrFail($id);
        $salary->delete();
        return redirect('/admin/sallary');
    }
}
