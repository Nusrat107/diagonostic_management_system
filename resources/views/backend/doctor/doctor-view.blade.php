@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-12 d-flex justify-content-end align-items-center">
                    <!-- Back Button -->
                    <a href="{{ url('/admin/doctor') }}" class="btn btn-secondary btn-rounded mr-2">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <!-- Edit Button -->
                    <a href="{{ url('/admin/profile-edit/'.$doctor->id) }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-pencil"></i> Edit Profile
                    </a>
                </div>
            </div>

            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#">
                                        <img class="avatar" src="{{ asset('backend/images/doctor/'.$doctor->image) }}" alt="Doctor Image">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $doctor->first_name }}</h3>
                                            <small class="text-muted">{{ $doctor->profession }}</small>
                                        
                                            <div class="staff-msg">
                                                <a href="#" class="btn btn-primary">Send Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text">{{ $doctor->phone }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text">{{ $doctor->email }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Birthday:</span>
                                                <span class="text">{{ $doctor->dob }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $doctor->address }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ $doctor->gender }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Education Informations</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user"><div class="before-circle"></div></div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Medical Science (UG)</a>
                                                        <div>MBBS</div>
                                                        <span class="time">2001 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user"><div class="before-circle"></div></div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Medical Science (PG)</a>
                                                        <div>MD - Obstetrics & Gynaecology</div>
                                                        <span class="time">1997 - 2001</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-box mb-0">
                                    <h3 class="card-title">Experience</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user"><div class="before-circle"></div></div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Consultant Gynecologist</a>
                                                        <span class="time">Jan 2014 - Present</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user"><div class="before-circle"></div></div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Consultant Gynecologist</a>
                                                        <span class="time">Jan 2009 - Jan 2014</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
