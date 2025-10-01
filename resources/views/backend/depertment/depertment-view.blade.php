@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row mb-3">
                <div class="col-lg-8 offset-lg-2 d-flex justify-content-between align-items-center">
                    <h4 class="page-title mb-0">Department Details</h4>
                    <a href="{{ url('/admin/depertment') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <input class="form-control" type="text" value="{{ $department->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" readonly>{{ $department->description ?? 'N/A' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" 
                                            value="{{ $department->status == 1 ? 'Active' : 'Inactive' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Created At</label>
                                        <input class="form-control" type="text" 
                                            value="{{ $department->created_at->format('d M Y h:i A') }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Updated At</label>
                                        <input class="form-control" type="text" 
                                            value="{{ $department->updated_at->format('d M Y h:i A') }}" readonly>
                                    </div>
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
