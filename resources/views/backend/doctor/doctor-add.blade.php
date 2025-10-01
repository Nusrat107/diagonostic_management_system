@extends('backend.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Doctor</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{url('/admin/create-doctor/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Proffession <span class="text-danger">*</span></label>
                                    <input class="form-control" type="profession" name="profession">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" name="dob">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" type="text" name="country">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control" type="text" name="postal_code">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                            </div>

                             {{-- Education Informations --}}
                <div class="card-box">
                    <h3 class="card-title">Education Informations</h3>
                    <div id="education-wrapper">
                        <div class="row education-row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Institution</label>
                                    <input type="text" class="form-control floating" name="institution">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Subject</label>
                                    <input type="text" class="form-control floating" name="subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Starting Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Complete Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" name="complete_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Degree</label>
                                    <input type="text" class="form-control floating" name="degree">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Grade</label>
                                    <input type="text" class="form-control floating" name="grade">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Experience Informations --}}
                <div class="card-box">
                    <h3 class="card-title">Experience Informations</h3>
                    <div id="experience-wrapper">
                        <div class="row experience-row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Company Name</label>
                                    <input type="text" class="form-control floating" name="company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Location</label>
                                    <input type="text" class="form-control floating" name="location">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Job Position</label>
                                    <input type="text" class="form-control floating" name="job_position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Period From</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" name="period_from">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Period To</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" name="period_to">
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                       
                       
                    </div>
                    
                </div>
                                                    
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Short Biography</label>
                            <textarea class="form-control" rows="3" cols="30" name="bio"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" checked>
                                <label class="form-check-label" for="doctor_active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0">
                                <label class="form-check-label" for="doctor_inactive">Inactive</label>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Doctor</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        <!-- Notification Box -->
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet...</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">See all messages</a>
                </div>
            </div>
        </div>
    

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" data-reff=""></div>
@endsection
