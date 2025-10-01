@extends('backend.master')

@section('content')
@php
    use Carbon\Carbon;
    $todayDate = Carbon::now()->format('Y-m-d'); // Today's date
@endphp

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            
            <!-- Page Title -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Employee</h4>
                </div>
            </div>

            <!-- Edit Employee Form -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    
                    <form action="{{ url('/admin/employee-update/'.$employee->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name" 
                                        value="{{ old('first_name', $employee->first_name) }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name" 
                                        value="{{ old('last_name', $employee->last_name) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" 
                                        value="{{ old('username', $employee->username) }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" 
                                        value="{{ old('email', $employee->email) }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="confirm_password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="employee_id" 
                                        value="{{ old('employee_id', $employee->employee_id) }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Joining Date <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="joining_date" 
                                        value="{{ old('joining_date', $employee->joining_date ?? $todayDate) }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone" 
                                        value="{{ old('phone', $employee->phone) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        <option {{ $employee->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option {{ $employee->role == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                                        <option {{ $employee->role == 'Nurse' ? 'selected' : '' }}>Nurse</option>
                                        <option {{ $employee->role == 'Laboratorist' ? 'selected' : '' }}>Laboratorist</option>
                                        <option {{ $employee->role == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                                        <option {{ $employee->role == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                                        <option {{ $employee->role == 'Receptionist' ? 'selected' : '' }}>Receptionist</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Active" 
                                    {{ $employee->status == 'Active' ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Inactive" 
                                    {{ $employee->status == 'Inactive' ? 'checked' : '' }}>
                                <label class="form-check-label">Inactive</label>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Employee</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
