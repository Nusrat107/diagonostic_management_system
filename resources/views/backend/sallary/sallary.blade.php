@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-5">
                    <h4 class="page-title">Employee Salary</h4>
                </div>
                <div class="col-sm-8 col-7 text-right m-b-30">
                    <a href="{{ url('/admin/sallary-add') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fa fa-plus"></i> Add Salary
                    </a>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th style="width:25%;">Employee</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Role</th>
                                    <th>Salary</th>
                                    <th>Payslip</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salaries as $salary)
                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="{{ asset('backend/assets/img/user.jpg') }}" height="28" width="28" alt=""> 
                                        {{ $salary->employee->first_name ?? 'N/A' }}
                                    </td>
                                    <td>{{ $salary->employee->employee_id ?? 'N/A' }}</td>
                                    <td>{{ $salary->employee->email ?? 'N/A' }}</td>
                                    <td>{{ $salary->employee->joining_date ?? 'N/A' }}</td>
                                    <td>{{ $salary->employee->role ?? 'N/A' }}</td>
                                    <td>Tk-{{ $salary->net_salary }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ url('/admin/sallary-view/'.$salary->id) }}">Generate Slip</a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('/admin/sallary-edit/'.$salary->id) }}">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary_{{ $salary->id }}">
                                                    <i class="fa fa-trash-o m-r-5"></i> Delete
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div id="delete_salary_{{ $salary->id }}" class="modal fade delete-modal" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('backend/assets/img/sent.png') }}" alt="" width="50" height="46">
                                                        <h3>Are you sure want to delete this Salary?</h3>
                                                        <div class="m-t-20"> 
                                                            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                                            <form action="{{ url('/admin/sallary-delete/'.$salary->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
</div>
@endsection
