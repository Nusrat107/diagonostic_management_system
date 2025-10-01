@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Payslip</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white">CSV</button>
                        <button class="btn btn-white">PDF</button>
                        <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="payslip-title">
                            Payslip for the month of {{ date('F Y', strtotime($payslip->salary_month ?? now())) }}
                        </h4>

                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="{{ asset('backend/assets/img/logo-dark.png') }}" class="inv-logo" alt="">
                                <ul class="list-unstyled mb-0">
                                    <li>Aman IT Agency</li>
                                    <li>Dhaka, Bangladesh</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">Payslip #{{ $payslip->id }}</h3>
                                    <ul class="list-unstyled">
                                        <li>Salary Month: 
                                            <span>{{ date('F, Y', strtotime($payslip->salary_month ?? now())) }}</span>
                                        </li>
                                        <li>Date of Birth: <span>{{ $payslip->employee->dob ?? 'N/A' }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 m-b-20">
                                <ul class="list-unstyled">
                                    <li><h5 class="mb-0"><strong>{{ $payslip->employee->name ?? 'N/A' }}</strong></h5></li>
                                    <li><span>{{ $payslip->employee->designation ?? 'N/A' }}</span></li>
                                    <li>Employee ID: {{ $payslip->employee->employee_id ?? 'N/A' }}</li>
                                    <li>Joining Date: {{ $payslip->employee->joining_date ?? 'N/A' }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Earnings --}}
                            <div class="col-sm-6">
                                <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Basic Salary</strong> 
                                                <span class="float-right">Tk-{{ $payslip->basic_salary }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>House Rent Allowance (H.R.A.)</strong> 
                                                <span class="float-right">Tk-{{ $payslip->hra }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Conveyance</strong> 
                                                <span class="float-right">Tk-{{ $payslip->conveyance }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Other Allowance</strong> 
                                                <span class="float-right">Tk-{{ $payslip->allowance }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Earnings</strong> 
                                                <span class="float-right"><strong>Tk-{{ $payslip->other_earnings }}</strong></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- Deductions --}}
                            <div class="col-sm-6">
                                <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Tax Deducted at Source (T.D.S.)</strong> 
                                                <span class="float-right">Tk-{{ $payslip->tds }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provident Fund (P.F.)</strong> 
                                                <span class="float-right">Tk-{{ $payslip->pf }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Employee State Insurance (E.S.I.)</strong> 
                                                <span class="float-right">Tk-{{ $payslip->esi }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Loan</strong> 
                                                <span class="float-right">Tk-{{ $payslip->fund }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Deductions</strong> 
                                                <span class="float-right"><strong>Tk-{{ $payslip->other_deductions }}</strong></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-12">
                                <p>
                                    <strong>Net Salary: Tk-{{ $payslip->net_salary }}</strong> 
                                    ({{ \App\Helpers\NumberToWord::convert($payslip->net_salary) }} only.)
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
