@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Provident Fund Details</h4>
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
                                        <label>Employee Name</label>
                                        <input class="form-control" type="text" value="{{ $provident->employee->name ?? 'N/A' }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Fund Type</label>
                                        <input class="form-control" type="text" value="{{ $provident->fund_type }}" readonly>
                                    </div>

                                    @if($provident->fund_type == 'Fixed Amount')
                                    <div class="form-group">
                                        <label>Employee Share (Amount)</label>
                                        <input class="form-control" type="text" value="{{ $provident->employee_share_amount }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Organization Share (Amount)</label>
                                        <input class="form-control" type="text" value="{{ $provident->organization_share_amount }}" readonly>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label>Employee Share (%)</label>
                                        <input class="form-control" type="text" value="{{ $provident->employee_share_percentage }}%" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Organization Share (%)</label>
                                        <input class="form-control" type="text" value="{{ $provident->organization_share_percentage }}%" readonly>
                                    </div>
                                    @endif
                                </div>

                                <!-- Right Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" value="{{ $provident->status }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="6" readonly>{{ $provident->description ?? 'No description provided' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center mt-3">
                                    <a href="{{ url('/admin/provident') }}" class="btn btn-secondary">Back</a>
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
