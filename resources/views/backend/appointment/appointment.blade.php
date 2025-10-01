@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Appointments</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ url('/admin/appointment-add') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fa fa-plus"></i> Add Appointment
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Department</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status</th>
                                   <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->appointment_id }}</td>
                                    <td>
                                        <img width="28" height="28" src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle m-r-5" alt="">
                                        {{ $appointment->patient_name }}
                                    </td>
                                    <td>{{ $appointment->doctor }}</td>
                                    <td>{{ $appointment->department }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}</td>
                                    <td>{{ $appointment->time }}</td>
                                    <td>
                                        @if($appointment->status == 'active')
                                            <span class="custom-badge status-green">Active</span>
                                        @else
                                            <span class="custom-badge status-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/appointment-view/' . $appointment->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/appointment-edit/' . $appointment->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/appointment-delete/' . $appointment->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this appointment?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($appointments->isEmpty())
                            <p class="text-center">No appointments found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
