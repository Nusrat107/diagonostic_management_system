@extends('backend.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Appointment</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="{{ url('/admin/create-appointment/store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Patient Name <span class="text-danger">*</span></label>
                                <input name="patient_name" class="form-control" type="text" placeholder="Enter patient name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <input name="department" class="form-control" type="text" placeholder="Enter department" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Doctor <span class="text-danger">*</span></label>
                                <input name="doctor" class="form-control" type="text" placeholder="Enter doctor name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input name="date" class="form-control" type="date" value="{{ $currentDate }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Time</label>
                                <input name="time" class="form-control" type="time" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="patient_email" class="form-control" type="email" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="patient_phone" class="form-control" type="text" placeholder="Enter phone">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Enter message"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="statusActive" value="active" checked>
                                    <label class="form-check-label" for="statusActive">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="statusInactive" value="inactive">
                                    <label class="form-check-label" for="statusInactive">Inactive</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Create Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" data-reff=""></div>
</div>
@endsection
