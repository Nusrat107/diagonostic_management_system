@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row mb-4">
                <div class="col-lg-8 offset-lg-2 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Employee Details</h4>
                    <a href="{{ url('/admin/employe') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 mb-3 text-center">
                                    <img width="120" height="120" 
                                        src="{{ asset('backend/assets/img/user.jpg') }}" 
                                        class="rounded-circle" alt="Employee Image">
                                </div>

                                <!-- Left Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control" type="text" 
                                               value="{{ $employee->first_name }} {{ $employee->last_name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Employee ID</label>
                                        <input class="form-control" type="text" value="{{ $employee->employee_id }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" value="{{ $employee->email }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="text" value="{{ $employee->username }}" readonly>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" value="{{ $employee->phone }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <input class="form-control" type="text" value="{{ $employee->role }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" value="{{ ucfirst($employee->status) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Joining Date</label>
                                        <input class="form-control" type="text" value="{{ \Carbon\Carbon::parse($employee->joining_date)->format('d M Y') }}" readonly>
                                    </div>
                                </div>

                            </div> <!-- row -->

                        </div> <!-- card-body -->
                    </div> <!-- card -->

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
