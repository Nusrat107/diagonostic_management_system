@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Appointment Details</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input class="form-control" type="text" value="{{ $appointment->patient_name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <input class="form-control" type="text" value="{{ $appointment->department }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <input class="form-control" type="text" value="{{ $appointment->doctor }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" type="text" value="{{ $appointment->date }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input class="form-control" type="text" value="{{ $appointment->time }}" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" value="{{ $appointment->patient_email ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" value="{{ $appointment->patient_phone ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" rows="3" readonly>{{ $appointment->message ?? 'N/A' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" value="{{ ucfirst($appointment->status) }}" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center mt-3">
                                    <a href="{{ url('/admin/appointment') }}" class="btn btn-secondary">Back</a>
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
