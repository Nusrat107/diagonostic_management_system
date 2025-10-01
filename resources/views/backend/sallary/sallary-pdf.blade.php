<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Salary Payslip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .header, .footer {
            text-align: center;
        }
        .company-details {
            margin-bottom: 20px;
        }
        .employee-details, .salary-details {
            width: 100%;
            margin-bottom: 20px;
        }
        .employee-details td, .salary-details td {
            padding: 8px;
        }
        .salary-details th {
            background-color: #f2f2f2;
            padding: 8px;
        }
        .totals {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Company Name: Madinest</h2>
        <p>Dhaka, Bangladesh</p>
        <h3>Payslip for {{ date('F, Y', strtotime($salary->salary_month ?? now())) }}</h3>
    </div>

    <table class="employee-details" border="0">
        <tr>
            <td><strong>Employee Name:</strong> {{ $salary->employee->first_name ?? 'N/A' }}</td>
            <td><strong>Employee ID:</strong> {{ $salary->employee->employee_id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Role:</strong> {{ $salary->employee->role ?? 'N/A' }}</td>
            <td><strong>Joining Date:</strong> {{ $salary->employee->joining_date ?? 'N/A' }}</td>
        </tr>
    </table>

    <table class="salary-details" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Earnings</th>
                <th>Amount (Tk)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Basic Salary</td>
                <td>{{ $salary->basic_salary ?? 0 }}</td>
            </tr>
            <tr>
                <td>Dearness Allowance (DA)</td>
                <td>{{ $salary->da ?? 0 }}</td>
            </tr>
            <tr>
                <td>House Rent Allowance (HRA)</td>
                <td>{{ $salary->hra ?? 0 }}</td>
            </tr>
            <tr>
                <td>Conveyance</td>
                <td>{{ $salary->conveyance ?? 0 }}</td>
            </tr>
            <tr>
                <td>Allowance</td>
                <td>{{ $salary->allowance ?? 0 }}</td>
            </tr>
            <tr>
                <td>Medical Allowance</td>
                <td>{{ $salary->medical_allowance ?? 0 }}</td>
            </tr>
            <tr>
                <td>Other Earnings</td>
                <td>{{ $salary->other_earnings ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <table class="salary-details" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Deductions</th>
                <th>Amount (Tk)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TDS (Tax Deducted at Source)</td>
                <td>{{ $salary->tds ?? 0 }}</td>
            </tr>
            <tr>
                <td>PF (Provident Fund)</td>
                <td>{{ $salary->pf ?? 0 }}</td>
            </tr>
            <tr>
                <td>ESI (Employees' State Insurance)</td>
                <td>{{ $salary->esi ?? 0 }}</td>
            </tr>
            <tr>
                <td>Leave Deduction</td>
                <td>{{ $salary->leave_deduction ?? 0 }}</td>
            </tr>
            <tr>
                <td>Professional Tax</td>
                <td>{{ $salary->prof_tax ?? 0 }}</td>
            </tr>
            <tr>
                <td>Labour Welfare</td>
                <td>{{ $salary->labour_welfare ?? 0 }}</td>
            </tr>
            <tr>
                <td>Fund</td>
                <td>{{ $salary->fund ?? 0 }}</td>
            </tr>
            <tr>
                <td>Other Deductions</td>
                <td>{{ $salary->other_deductions ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <p class="totals">
        <strong>Net Salary: Tk-{{ $salary->net_salary ?? 0 }}</strong>
    </p>

    <div class="footer">
        <p>Generated on {{ date('d-m-Y') }}</p>
    </div>

</body>
</html>
