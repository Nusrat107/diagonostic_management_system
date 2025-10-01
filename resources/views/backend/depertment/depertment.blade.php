@extends('backend.master')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Departments</h4>
                    </div>
                    <div class="col-sm-7 col-7 text-right m-b-30">
                        <a href="{{ url('/admin/depertment-add') }}" class="btn btn-primary btn-rounded">
                            <i class="fa fa-plus"></i> Add Department
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $key => $department)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>
                                                @if($department->status == 1)
                                                    <span class="custom-badge status-green">Active</span>
                                                @else
                                                    <span class="custom-badge status-red">Inactive</span>
                                                @endif
                                            </td>
                                           <td class="text-center">
                                        <a href="{{ url('/admin/depertment-view/' . $department->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/depertment-edit/' . $department->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/depertment-delete/' . $department->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this depertment?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                        </tr>
                                    @endforeach

                                    @if($departments->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">No Departments Found!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>
@endsection
