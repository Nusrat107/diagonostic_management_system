@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Doctors</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ url('/admin/doctor-add') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fa fa-plus"></i> Add Doctor
                    </a>
                </div>
            </div>

            <div class="row doctor-grid">
                @foreach ($doctorlist as $doctor)
                    <div class="col-md-4 col-sm-4 col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="{{ url('/admin/doctor-view/'.$doctor->id) }}">
                                    <img alt="" src="{{ asset('backend/images/doctor/'.$doctor->image) }}">
                                </a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/admin/doctor-edit/'.$doctor->id) }}">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/admin/doctor-delete/'.$doctor->id) }}"
                                       onclick="return confirm('Are you sure you want to delete this doctor?');">
                                       <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>
                            <div class="doc-prof">{{ $doctor->profession }}</div>
                            <div class="first_name">{{ $doctor->first_name }}</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> {{ $doctor->address }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

       
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
