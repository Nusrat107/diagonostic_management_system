@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-lg-8 offset-lg-2 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Edit Patient</h4>
                    <a href="{{ url('/admin/patient') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/patient-update/' . $patient->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name" value="{{ $patient->first_name }}" required>
                                </div>
                            </div>
                            <!-- Last Name -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name" value="{{ $patient->last_name }}">
                                </div>
                            </div>
                            <!-- Username -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="username" value="{{ $patient->username }}" required>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ $patient->email }}" required>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password <small>(leave blank if not changing)</small></label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation">
                                </div>
                            </div>
                            <!-- DOB & Gender -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="{{ $patient->dob }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="gen-label">Gender: <span class="text-danger">*</span></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input" value="Male" {{ $patient->gender == 'Male' ? 'checked' : '' }} required> Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" class="form-check-input" value="Female" {{ $patient->gender == 'Female' ? 'checked' : '' }}> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $patient->address }}">
                                </div>
                            </div>
                            <!-- Country, City, State, Postal -->
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country">
                                        <option value="USA" {{ $patient->country == 'USA' ? 'selected' : '' }}>USA</option>
                                        <option value="United Kingdom" {{ $patient->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $patient->city }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>State/Province</label>
                                    <select class="form-control" name="state">
                                        <option value="California" {{ $patient->state == 'California' ? 'selected' : '' }}>California</option>
                                        <option value="Alaska" {{ $patient->state == 'Alaska' ? 'selected' : '' }}>Alaska</option>
                                        <option value="Alabama" {{ $patient->state == 'Alabama' ? 'selected' : '' }}>Alabama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" name="postal_code" value="{{ $patient->postal_code }}">
                                </div>
                            </div>
                            <!-- Phone -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $patient->phone }}">
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="{{ $patient->image ? asset('backend/images/patient/'.$patient->image) : asset('backend/assets/img/default-user.png') }}">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Active" {{ $patient->status == 'Active' ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Inactive" {{ $patient->status == 'Inactive' ? 'checked' : '' }}>
                                <label class="form-check-label">Inactive</label>
                            </div>
                        </div>

                        <!-- Update Button -->
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Update Patient</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
