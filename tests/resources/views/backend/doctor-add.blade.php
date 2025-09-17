@extends('backend.master')

@section('content')
<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Add Doctor</h4>
                <a href="{{ url('/admin/doctor') }}" class="btn btn-light btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/doctor-add/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>

                        <!-- Username -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <!-- Doctor Profession -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Doctor Profession <span class="text-danger">*</span></label>
                            <input type="text" name="doc_prof" class="form-control" placeholder="e.g. Cardiologist, Dentist" required>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="Male" class="form-check-input">
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" value="Female" class="form-check-input">
                                <label class="form-check-label">Female</label>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <!-- District -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">District</label>
                            <select name="district" class="form-control">
                                <option value="Dhaka">Dhaka</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Khulna">Khulna</option>
                            </select>
                        </div>

                        <!-- City -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control">
                        </div>

                        <!-- State -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">State/Province</label>
                            <select name="state" class="form-control">
                                <option value="Uttara">Uttara</option>
                                <option value="Kamarpara">Kamarpara</option>
                                <option value="Banani">Banani</option>
                            </select>
                        </div>

                        <!-- Postal Code -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <!-- Avatar -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Avatar</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Biography -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Short Biography</label>
                            <textarea name="biography" rows="3" class="form-control"></textarea>
                        </div>

                        <!-- Education -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Education</label>
                            <div id="educationWrapper">
                                <div class="input-group mb-2">
                                    <input type="text" name="education[]" class="form-control" placeholder="Degree, Institution, Year">
                                    <button class="btn btn-success addEducation" type="button">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Experience -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Experience</label>
                            <div id="experienceWrapper">
                                <div class="input-group mb-2">
                                    <input type="text" name="experience[]" class="form-control" placeholder="Position, Hospital/Clinic, Duration">
                                    <button class="btn btn-success addExperience" type="button">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="status" value="Active" class="form-check-input" checked>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="status" value="Inactive" class="form-check-input">
                                <label class="form-check-label">Inactive</label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Create Doctor
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Education
        document.querySelector('.addEducation').addEventListener('click', function() {
            let wrapper = document.getElementById('educationWrapper');
            let newField = document.createElement('div');
            newField.classList.add('input-group', 'mb-2');
            newField.innerHTML = `
                <input type="text" name="education[]" class="form-control" placeholder="Degree, Institution, Year">
                <button class="btn btn-danger removeField" type="button">-</button>
            `;
            wrapper.appendChild(newField);
        });

        // Experience
        document.querySelector('.addExperience').addEventListener('click', function() {
            let wrapper = document.getElementById('experienceWrapper');
            let newField = document.createElement('div');
            newField.classList.add('input-group', 'mb-2');
            newField.innerHTML = `
                <input type="text" name="experience[]" class="form-control" placeholder="Position, Hospital/Clinic, Duration">
                <button class="btn btn-danger removeField" type="button">-</button>
            `;
            wrapper.appendChild(newField);
        });

        // Remove field
        document.addEventListener('click', function(e) {
            if(e.target && e.target.classList.contains('removeField')) {
                e.target.parentNode.remove();
            }
        });
    });
</script>
@endpush
@endsection
