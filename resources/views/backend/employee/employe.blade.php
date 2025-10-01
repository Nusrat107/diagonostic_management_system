@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Employee</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ url('/admin/employe-add') }}" class="btn btn-primary float-right btn-rounded">
                        <i class="fa fa-plus"></i> Add Employee
                    </a>
                </div>
            </div>

            <!-- Employee Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Join Date</th>
                                    <th>Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td>
                                        <img width="28" height="28" src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle" alt="">
                                        <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                                    </td>
                                    <td>{{ $employee->employee_id }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($employee->joining_date)->format('d M Y') }}</td>
                                    <td>
                                        <span class="custom-badge status-green">{{ $employee->role }}</span>
                                    </td>
                                   <td class="text-center">
                                        <a href="{{ url('/admin/employe-view/' . $employee->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/employe-edit/' . $employee->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/employe-delete/' . $employee->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Employees Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
