@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <!-- Top Row: Page Title + Back Button -->
            <div class="row mb-3">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Edit Profile</h4>
                    <a href="{{ url('/admin/doctor-view/'.$doctor->id) }}" class="btn btn-secondary btn-rounded">
    <i class="fa fa-arrow-left"></i> Back
</a>
                </div>
            </div>

            <form action="{{ url('/admin/profile-update/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Basic Informations --}}
                <div class="card-box">
                    <h3 class="card-title">Basic Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" src="{{ $doctor->profile_image ? asset('backend/images/doctor/'.$doctor->image) : asset('backend/images/doctor/'.$doctor->image) }}" alt="user">
                                <div class="fileupload btn">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" type="file" name="profile_image">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">First Name</label>
                                            <input type="text" class="form-control floating" name="first_name"  value="{{ $doctor->first_name ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Last Name</label>
                                            <input type="text" class="form-control floating" name="last_name" value="{{ $doctor->last_name ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Birth Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control floating datetimepicker" type="text" name="birth_date" value="{{ $doctor->birth_date ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">Gender</label>
                                            <select class="select form-control floating" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ ($doctor->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ ($doctor->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Informations --}}
                <div class="card-box">
                    <h3 class="card-title">Contact Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-focus">
                                <label class="focus-label">Address</label>
                                <input type="text" class="form-control floating" name="address"  value="{{ $doctor->address ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">State</label>
                                <input type="text" class="form-control floating" name="state"  value="{{ $doctor->state ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Country</label>
                                <input type="text" class="form-control floating" name="country"  value="{{ $doctor->country ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Phone Number</label>
                                <input type="text" class="form-control floating" name="phone"  value="{{ $doctor->phone ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Education Informations --}}
                <div class="card-box">
                    <h3 class="card-title">Education Informations</h3>
                    <div id="education-wrapper">
                        @php $educations = $doctor->educations ?? []; @endphp
                        @forelse($educations as $edu)
                            <div class="row education-row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Institution</label>
                                        <input type="text" class="form-control floating" name="institution[]" value="{{ $edu->institution ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Subject</label>
                                        <input type="text" class="form-control floating" name="subject[]" value="{{ $edu->subject ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Starting Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="start_date[]" value="{{ $edu->start_date ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Complete Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="complete_date[]" value="{{ $edu->complete_date ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Degree</label>
                                        <input type="text" class="form-control floating" name="degree[]" value="{{ $edu->degree ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Grade</label>
                                        <input type="text" class="form-control floating" name="grade[]" value="{{ $edu->grade ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row education-row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Institution</label>
                                        <input type="text" class="form-control floating" name="institution[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Subject</label>
                                        <input type="text" class="form-control floating" name="subject[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Starting Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="start_date[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Complete Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="complete_date[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Degree</label>
                                        <input type="text" class="form-control floating" name="degree[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Grade</label>
                                        <input type="text" class="form-control floating" name="grade[]">
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="add-more">
                        <a href="#" id="add-education" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Institute</a>
                    </div>
                </div>

                {{-- Experience Informations --}}
                <div class="card-box">
                    <h3 class="card-title">Experience Informations</h3>
                    <div id="experience-wrapper">
                        @php $experiences = $doctor->experiences ?? []; @endphp
                        @forelse($experiences as $exp)
                            <div class="row experience-row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Company Name</label>
                                        <input type="text" class="form-control floating" name="company[]" value="{{ $exp->company ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Location</label>
                                        <input type="text" class="form-control floating" name="location[]" value="{{ $exp->location ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Job Position</label>
                                        <input type="text" class="form-control floating" name="job_position[]" value="{{ $exp->job_position ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Period From</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="period_from[]" value="{{ $exp->period_from ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Period To</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="period_to[]" value="{{ $exp->period_to ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row experience-row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Company Name</label>
                                        <input type="text" class="form-control floating" name="company[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Location</label>
                                        <input type="text" class="form-control floating" name="location[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Job Position</label>
                                        <input type="text" class="form-control floating" name="job_position[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Period From</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="period_from[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Period To</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="period_to[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="add-more">
                        <a href="#" id="add-experience" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Experience</a>
                    </div>
                </div>

                <div class="text-center m-t-20">
                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>

{{-- JS Section --}}
@section('scripts')
<script>
    document.getElementById('add-education').addEventListener('click', function(e){
        e.preventDefault();
        let wrapper = document.getElementById('education-wrapper');
        let row = wrapper.querySelector('.education-row');
        let clone = row.cloneNode(true);
        clone.querySelectorAll('input').forEach(input => input.value = '');
        wrapper.appendChild(clone);
    });

    document.getElementById('add-experience').addEventListener('click', function(e){
        e.preventDefault();
        let wrapper = document.getElementById('experience-wrapper');
        let row = wrapper.querySelector('.experience-row');
        let clone = row.cloneNode(true);
        clone.querySelectorAll('input').forEach(input => input.value = '');
        wrapper.appendChild(clone);
    });
</script>
@endsection

@endsection
