@extends('backend.master')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-6">
                        <h4 class="page-title">Leave Request</h4>
                    </div>
                    <div class="col-sm-4 col-6 text-right m-b-30">
                        <a href="{{ url('/admin/leave-add') }}" class="btn btn-primary btn-rounded float-right">
                            <i class="fa fa-plus"></i> Add Leave
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Leave Type</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>No of Days</th>
                                        <th>Reason</th>
                                        <th>Remaining</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leaves as $leave)
                                        <tr>
                                            <td>{{ $leave->id }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ \Carbon\Carbon::parse($leave->from_date)->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($leave->to_date)->format('d M Y') }}</td>
                                            <td>{{ $leave->days }} days</td>
                                            <td>{{ $leave->reason }}</td>
                                            <td>{{ $leave->remaining_leaves }}</td>
                                            <td class="text-center">
                                        <a href="{{ url('/admin/leave-view/' . $leave->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/leave-edit/' . $leave->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/leave-delete/' . $leave->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                        </tr>
                                    @endforeach
                                    @if($leaves->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">No Leave Requests Found</td>
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
