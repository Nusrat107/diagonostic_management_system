@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row mb-3">
                <div class="col-lg-8 offset-lg-2 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Edit Appointment</h4>
                    <a href="{{ url('/admin/appointment') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/appointment-update/'.$appointment->id) }}" method="POST">
                        @csrf
                        <div class="row">

                            <!-- Left Column -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Patient Name <span class="text-danger">*</span></label>
                                    <input name="patient_name" class="form-control" type="text" value="{{ $appointment->patient_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <input name="department" class="form-control" type="text" value="{{ $appointment->department }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Doctor <span class="text-danger">*</span></label>
                                    <input name="doctor" class="form-control" type="text" value="{{ $appointment->doctor }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Date <span class="text-danger">*</span></label>
                                    <input name="date" class="form-control" type="date" value="{{ $appointment->date }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Time <span class="text-danger">*</span></label>
                                    <input name="time" class="form-control" type="time" value="{{ $appointment->time }}" required>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="patient_email" class="form-control" type="email" value="{{ $appointment->patient_email }}">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="patient_phone" class="form-control" type="text" value="{{ $appointment->patient_phone }}">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control" rows="3">{{ $appointment->message }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="active" {{ $appointment->status == 'active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusActive">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="inactive" {{ $appointment->status == 'inactive' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusInactive">Inactive</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-sm-12 text-center mt-3">
                                <button class="btn btn-primary submit-btn" type="submit">Update Appointment</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
