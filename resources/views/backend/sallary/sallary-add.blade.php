@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Staff Salary</h4>

                    <form action="{{ url('/admin/create-sallary/store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <!-- Select Staff & Net Salary -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Select Staff</label>
                                    <select name="staff_id" class="form-control" required>
                                        <option value="">-- Select Staff --</option>
                                        @php
                                            // Pre-defined staff options
                                            $staffs = [
                                                (object)['id' => 1, 'name' => 'Nurse', 'staff_id' => 'ST-001', 'email'=>'nurse@example.com', 'joining_date'=>'01-01-2023', 'role'=>'Nurse'],
                                                (object)['id' => 2, 'name' => 'Doctor', 'staff_id' => 'ST-002', 'email'=>'doctor@example.com', 'joining_date'=>'01-02-2023', 'role'=>'Doctor'],
                                                (object)['id' => 3, 'name' => 'Pharmacist', 'staff_id' => 'ST-003', 'email'=>'pharmacist@example.com', 'joining_date'=>'01-03-2023', 'role'=>'Pharmacist'],
                                                (object)['id' => 4, 'name' => 'Accountant', 'staff_id' => 'ST-004', 'email'=>'accountant@example.com', 'joining_date'=>'01-04-2023', 'role'=>'Accountant'],
                                                (object)['id' => 5, 'name' => 'Receptionist', 'staff_id' => 'ST-005', 'email'=>'receptionist@example.com', 'joining_date'=>'01-05-2023', 'role'=>'Receptionist'],
                                            ];
                                        @endphp
                                        @foreach($staffs as $staff)
                                            <option value="{{ $staff->id }}" {{ old('staff_id') == $staff->id ? 'selected' : '' }}>
                                                {{ $staff->name }} ({{ $staff->role }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Net Salary</label>
                                    <input name="net_salary" class="form-control" type="text" placeholder="Net Salary" value="{{ old('net_salary') }}" required>
                                </div>
                            </div>

                            <!-- Earnings -->
                            <div class="col-sm-6 mt-3">
                                <h4 class="text-primary">Earnings</h4>
                                @php
                                    $earnings = [
                                        'basic_salary' => 'Basic Salary',
                                        'da' => 'DA (Dearness Allowance 40%)',
                                        'hra' => 'HRA (House Rent Allowance 15%)',
                                        'conveyance' => 'Conveyance',
                                        'allowance' => 'Allowance',
                                        'medical_allowance' => 'Medical Allowance',
                                        'other_earnings' => 'Others'
                                    ];
                                @endphp

                                @foreach($earnings as $name => $label)
                                    <div class="form-group">
                                        <label>{{ $label }}</label>
                                        <input name="{{ $name }}" class="form-control" type="text" placeholder="{{ $label }}" value="{{ old($name) }}">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Deductions -->
                            <div class="col-sm-6 mt-3">
                                <h4 class="text-primary">Deductions</h4>
                                @php
                                    $deductions = [
                                        'tds' => 'TDS (Tax Deducted at Source)',
                                        'esi' => "ESI (Employees' State Insurance)",
                                        'pf' => 'PF (Provident Fund)',
                                        'leave_deduction' => 'Leave Deduction',
                                        'prof_tax' => 'Prof. Tax (Professional Tax)',
                                        'labour_welfare' => 'Labour Welfare',
                                        'fund' => 'Fund',
                                        'other_deductions' => 'Others'
                                    ];
                                @endphp

                                @foreach($deductions as $name => $label)
                                    <div class="form-group">
                                        <label>{{ $label }}</label>
                                        <input name="{{ $name }}" class="form-control" type="text" placeholder="{{ $label }}" value="{{ old($name) }}">
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Create Salary</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
