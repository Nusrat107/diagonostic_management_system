@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Leave Details</h4>
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
                                        class="rounded-circle" alt="User Image">
                                </div>

                                <!-- Left Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Leave Type</label>
                                        <input class="form-control" type="text" value="{{ $leave->leave_type }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input class="form-control" type="text" value="{{ $leave->from_date }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Total Days</label>
                                        <input class="form-control" type="text" value="{{ $leave->days }}" readonly>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input class="form-control" type="text" value="{{ $leave->to_date }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Remaining Leaves</label>
                                        <input class="form-control" type="text" value="{{ $leave->remaining_leaves }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea class="form-control" rows="4" readonly>{{ $leave->reason ?? 'No reason provided' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center mt-3">
                                    <a href="{{ url('/admin/leave') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
