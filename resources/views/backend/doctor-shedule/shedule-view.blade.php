@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Schedule Details</h4>
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
                                        class="rounded-circle" alt="Doctor Image">
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <input class="form-control" type="text" value="{{ $schedule->doctor_name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Unavailable Days</label>
                                        <input class="form-control" type="text" value="{{ $schedule->day }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Available Time</label>
                                        <input class="form-control" type="text" 
                                            value="{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" 
                                            value="{{ ucfirst($schedule->status) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" rows="3" readonly>{{ $schedule->message ?? 'No message available' }}</textarea>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ url('/admin/doctorshedule') }}" class="btn btn-secondary">Back</a>
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
