@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="row mb-3">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Patients</h4>
                </div>
                <div class="col-sm-8 col-9 text-right">
                    <a href="{{ url('/admin/patient-add') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i> Add Patient
                    </a>
                </div>
            </div>

            <!-- Patients Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($patients as $patient)
                                <tr>
                                    <td>
                                        <img width="28" height="28"
                                             src="{{ $patient->image ? asset('backend/images/patient/'.$patient->image) : asset('backend/assets/img/user.jpg') }}"
                                             class="rounded-circle mr-2" alt="">
                                        {{ $patient->first_name }} {{ $patient->last_name }}
                                    </td>
                                    <td>
                                        {{ $patient->dob ? \Carbon\Carbon::parse($patient->dob)->age : 'N/A' }}
                                    </td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/patient-view/' . $patient->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/patient-edit/' . $patient->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/patient-delete/' . $patient->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this patient?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No patients found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- FontAwesome CDN for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-papM2zP8iX4VfB7Sdc+Y6K2p1sYBDh/1A3qf1mOXzFf6xVcl5e/cYVZ+6KcQdUj2b1xTCl+jc6BkgHf0uXnYFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection
