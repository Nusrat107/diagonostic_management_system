@extends('backend.master')

@section('content')

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <!-- Dashboard Widgets -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-stethoscope"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $doctorsCount ?? 0 }}</h3>
                            <span class="widget-title1">Doctors <i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $patientsCount ?? 0 }}</h3>
                            <span class="widget-title2">Patients <i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-user-md"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $attendCount ?? 0 }}</h3>
                            <span class="widget-title3">Attend <i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-heartbeat"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $pendingCount ?? 0 }}</h3>
                            <span class="widget-title4">Pending <i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card chart-card shadow-lg rounded-3 border-0">
                        <div class="card-body">
                            <div class="chart-title d-flex justify-content-between align-items-center mb-3">
                                <h4 class="chart-heading">📈 Patient Total</h4>
                                <span class="trend-text"><i class="fa fa-caret-up"></i> {{ $patientTrend ?? 'N/A' }}% Higher</span>
                            </div>
                            <div class="chart-container">
                                <canvas id="linegraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card chart-card shadow-lg rounded-3 border-0">
                        <div class="card-body">
                            <div class="chart-title d-flex justify-content-between align-items-center mb-3">
                                <h4 class="chart-heading">🏥 Patients In</h4>
                                <div>
                                    <ul class="chat-user-total list-inline m-0">
                                        <li class="list-inline-item"><i class="fa fa-circle text-success"></i> ICU</li>
                                        <li class="list-inline-item"><i class="fa fa-circle text-warning"></i> OPD</li>
                                        <li class="list-inline-item"><i class="fa fa-circle text-danger"></i> Ward</li>
                                        <li class="list-inline-item"><i class="fa fa-circle text-info"></i> Emergency</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointments & Doctors -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Upcoming Appointments</h4>
                            <a href="{{ url('/admin/appointment') }}" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        @foreach($recentAppointments as $appointment)
                                        <tr>
                                            <td style="min-width: 200px;">
                                                @php
                                                    $patientImage = asset('backend/assets/img/user.jpg');
                                                    if(!empty($appointment->patient->image) && file_exists(public_path('backend/images/patient/' . $appointment->patient->image))) {
                                                        $patientImage = asset('backend/images/patient/' . $appointment->patient->image);
                                                    }
                                                @endphp
                                                <a class="avatar" href="#">
                                                    <img src="{{ $patientImage }}" class="w-40 rounded-circle" alt="">
                                                </a>
                                                <h2>
                                                    {{ $appointment->patient->first_name ?? 'N/A' }} {{ $appointment->patient->last_name ?? '' }}
                                                    <span>{{ $appointment->patient->city ?? '' }}</span>
                                                </h2>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Appointment With</h5>
                                                <p>{{ $appointment->doctor->first_name ?? 'N/A' }} {{ $appointment->doctor->last_name ?? '' }}</p>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Timing</h5>
                                                <p>{{ $appointment->time ?? 'N/A' }}</p>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ url('/admin/appointment-view/'.$appointment->id) }}" class="btn btn-outline-primary take-btn">Take up</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doctors Panel -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">Doctors</h4>
                        </div>
                        <div class="card-body">
                            <ul class="contact-list">
                                @foreach($doctors as $doctor)
                                <li>
                                    <div class="contact-cont d-flex align-items-center">
                                        <div class="user-img m-r-10">
                                            @php
                                                $doctorImage = asset('backend/assets/img/user.jpg');
                                                if(!empty($doctor->image) && file_exists(public_path('backend/images/doctor/' . $doctor->image))) {
                                                    $doctorImage = asset('backend/images/doctor/' . $doctor->image);
                                                }
                                            @endphp
                                            <a href="#" title="{{ $doctor->first_name ?? 'N/A' }}">
                                                <img src="{{ $doctorImage }}" alt="{{ $doctor->first_name ?? 'N/A' }}" class="w-40 rounded-circle">
                                                <span class="status {{ $doctor->status ?? 'offline' }}"></span>
                                            </a>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-name text-ellipsis">{{ $doctor->first_name ?? 'No Name' }} {{ $doctor->last_name ?? '' }}</span>
                                            <span class="contact-date">{{ $doctor->profession ?? 'No Designation' }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="{{ url('/admin/doctors') }}" class="text-muted">View all Doctors</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Patients & Hospital Chart -->
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">New Patients </h4>
                            <a href="{{ url('/admin/patient') }}" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 new-patient-table">
                                    <tbody>
                                        @foreach($newPatients as $index => $patient)
                                        <tr>
                                            <td>
                                                @php
                                                    $newPatientImage = asset('backend/assets/img/user.jpg');
                                                    if(!empty($patient->image) && file_exists(public_path('backend/images/patient/' . $patient->image))) {
                                                        $newPatientImage = asset('backend/images/patient/' . $patient->image);
                                                    }
                                                @endphp
                                                <img width="28" height="28" class="rounded-circle" src="{{ $newPatientImage }}" alt="{{ $patient->first_name }} {{ $patient->last_name }}"> 
                                                <h2>{{ $patient->first_name ?? 'N/A' }} {{ $patient->last_name ?? '' }}</h2>
                                            </td>
                                            <td>{{ $patient->email ?? 'N/A' }}</td>
                                            <td>{{ $patient->phone ?? 'N/A' }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-primary-{{ $index+1 }} float-right">{{ $patient->disease ?? 'N/A' }}</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hospital Management Panel (col-4) -->
<div class="col-12 col-md-4 col-lg-4 col-xl-4">
    <div class="bar-chart">
        <h4 class="card-title d-inline-block">Hospital Management</h4>
        <div class="chart clearfix mt-3">
            @if(!empty($hospitalStats) && count($hospitalStats) > 0)
                @foreach($hospitalStats as $stat)
                    <div class="item mb-2">
                        <div class="bar">
                            <span class="percent">{{ $stat['percent'] ?? 0 }}%</span>
                            <div class="item-progress" data-percent="{{ $stat['percent'] ?? 0 }}">
                                <span class="title">{{ $stat['title'] ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="item mb-2">
                    <div class="bar">
                        <span class="percent">0%</span>
                        <div class="item-progress" data-percent="0">
                            <span class="title">No Data</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
