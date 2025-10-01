@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Patient Details</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 text-center mb-3">
                                    <img width="120" height="120" 
                                        src="{{ $patient->image ? asset('backend/images/patient/'.$patient->image) : asset('backend/assets/img/default-user.png') }}" 
                                        class="rounded-circle" alt="Patient Image">
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" value="{{ $patient->first_name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" value="{{ $patient->last_name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="text" value="{{ $patient->username }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" value="{{ $patient->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input class="form-control" type="text" value="{{ $patient->dob }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input class="form-control" type="text" value="{{ $patient->gender }}" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" type="text" value="{{ $patient->address }}" readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input class="form-control" type="text" value="{{ $patient->country }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" type="text" value="{{ $patient->city }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>State/Province</label>
                                                <input class="form-control" type="text" value="{{ $patient->state }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input class="form-control" type="text" value="{{ $patient->postal_code }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" value="{{ $patient->phone }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" value="{{ $patient->status }}" readonly>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ url('/admin/patient') }}" class="btn btn-secondary">Back</a>
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
