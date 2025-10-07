<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Sallary;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 

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

        $salary->staff_id = $request->staff_id ?? (Sallary::max('staff_id') + 1);
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

  
    public function sallaryView($id)
    {
        $payslip = Sallary::with('employee')->findOrFail($id);
        return view('backend.sallary.sallary-view', compact('payslip'));
    }

    
    public function exportCsv($id)
    {
        $salary = Sallary::with('employee')->findOrFail($id);

        $filename = "salary_{$salary->id}.csv";

        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename={$filename}",
        ];

        $columns = [
            'Employee Name', 'Employee ID', 'Role', 'Salary Month',
            'Net Salary', 'Basic', 'DA', 'HRA', 'Conveyance', 'Allowance', 'Medical Allowance', 'Other Earnings',
            'TDS', 'PF', 'ESI', 'Fund', 'Other Deductions'
        ];

        $callback = function() use ($salary, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $row = [
                $salary->employee->first_name ?? 'N/A',
                $salary->employee->employee_id ?? 'N/A',
                $salary->employee->role ?? 'N/A',
                $salary->salary_month ?? 'N/A',
                $salary->net_salary ?? 0,
                $salary->basic_salary ?? 0,
                $salary->da ?? 0,
                $salary->hra ?? 0,
                $salary->conveyance ?? 0,
                $salary->allowance ?? 0,
                $salary->medical_allowance ?? 0,
                $salary->other_earnings ?? 0,
                $salary->tds ?? 0,
                $salary->pf ?? 0,
                $salary->esi ?? 0,
                $salary->fund ?? 0,
                $salary->other_deductions ?? 0,
            ];

            fputcsv($file, $row);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

 
    public function exportPdf($id)
    {
        $salary = Sallary::with('employee')->findOrFail($id);
        $pdf = Pdf::loadView('backend.sallary.sallary-pdf', compact('salary'));
        return $pdf->download("salary_{$salary->id}.pdf");
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
