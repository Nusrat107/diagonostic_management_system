@extends('backend.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Doctor</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/doctor-update/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name" value="{{ $doctor->first_name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name" value="{{ $doctor->last_name }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" value="{{ $doctor->username }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ $doctor->email }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password (leave empty if not changing)</label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Profession <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="profession" value="{{ $doctor->profession }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" value="{{ $doctor->dob }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ $doctor->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $doctor->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ $doctor->gender == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address" value="{{ $doctor->address }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" type="text" name="country" value="{{ $doctor->country }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city" value="{{ $doctor->city }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state" value="{{ $doctor->state }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control" type="text" name="postal_code" value="{{ $doctor->postal_code }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $doctor->phone }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input class="form-control" type="file" name="image">
                                    @if($doctor->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('backend/images/doctor/'.$doctor->image) }}" width="80" alt="doctor avatar">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Short Biography</label>
                            <textarea class="form-control" rows="3" cols="30" name="bio">{{ $doctor->bio }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" {{ $doctor->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="doctor_active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0" {{ $doctor->status == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="doctor_inactive">Inactive</label>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Doctor</button>
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
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" data-reff=""></div>
@endsection
