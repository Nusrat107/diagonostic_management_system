@extends('backend.master')

@section('content')
<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Doctor Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/doctor-update/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Basic Info -->
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="profile-img-wrap mb-3">
                                        <img class="img-fluid rounded" src="{{ asset('uploads/doctors/'.$doctor->image) }}" alt="Doctor">
                                        <div class="fileupload btn btn-sm btn-light mt-2">
                                            <span class="btn-text">Change</span>
                                            <input class="upload" type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" value="{{ $doctor->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="{{ $doctor->last_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input type="date" name="date_of_birth" class="form-control" value="{{ $doctor->date_of_birth }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control">
                                                    <option value="Male" {{ $doctor->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $doctor->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Contact Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $doctor->address }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education Info -->
                    <div class="card mb-4">
                        <div class="card-header bg-warning text-white">
                            <h5 class="mb-0">Education</h5>
                        </div>
                        <div class="card-body education-container">
                            @php
                                $educations = is_array($doctor->education) ? $doctor->education : [['institution'=>'','degree'=>'','start_year'=>'','end_year'=>'']];
                            @endphp
                            @foreach($educations as $index => $edu)
                                <div class="row mb-3 education-item">
                                    <div class="col-md-6">
                                        <input type="text" name="education[{{ $index }}][institution]" class="form-control mb-2" placeholder="Institution" value="{{ $edu['institution'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="education[{{ $index }}][degree]" class="form-control mb-2" placeholder="Degree" value="{{ $edu['degree'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="education[{{ $index }}][start_year]" class="form-control mb-2" placeholder="Start Year" value="{{ $edu['start_year'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="education[{{ $index }}][end_year]" class="form-control mb-2" placeholder="End Year" value="{{ $edu['end_year'] }}">
                                    </div>
                                </div>
                            @endforeach
                            <button type="button" class="btn btn-primary" id="add-education"><i class="fa fa-plus"></i> Add More Education</button>
                        </div>
                    </div>

                    <!-- Experience Info -->
                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Experience</h5>
                        </div>
                        <div class="card-body experience-container">
                            @php
                                $experiences = is_array($doctor->experience) ? $doctor->experience : [['company'=>'','position'=>'','from'=>'','to'=>'']];
                            @endphp
                            @foreach($experiences as $index => $exp)
                                <div class="row mb-3 experience-item">
                                    <div class="col-md-6">
                                        <input type="text" name="experience[{{ $index }}][company]" class="form-control mb-2" placeholder="Company" value="{{ $exp['company'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="experience[{{ $index }}][position]" class="form-control mb-2" placeholder="Position" value="{{ $exp['position'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="experience[{{ $index }}][from]" class="form-control mb-2" placeholder="From" value="{{ $exp['from'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="experience[{{ $index }}][to]" class="form-control mb-2" placeholder="To" value="{{ $exp['to'] }}">
                                    </div>
                                </div>
                            @endforeach
                            <button type="button" class="btn btn-primary" id="add-experience"><i class="fa fa-plus"></i> Add More Experience</button>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS for Add More (Education & Experience) -->
    <script>
        let eduIndex = {{ count($educations) }};
        document.getElementById('add-education').addEventListener('click', function() {
            const container = document.querySelector('.education-container');
            const newItem = document.createElement('div');
            newItem.classList.add('row','mb-3','education-item');
            newItem.innerHTML = `
                <div class="col-md-6"><input type="text" name="education[${eduIndex}][institution]" class="form-control mb-2" placeholder="Institution"></div>
                <div class="col-md-6"><input type="text" name="education[${eduIndex}][degree]" class="form-control mb-2" placeholder="Degree"></div>
                <div class="col-md-6"><input type="text" name="education[${eduIndex}][start_year]" class="form-control mb-2" placeholder="Start Year"></div>
                <div class="col-md-6"><input type="text" name="education[${eduIndex}][end_year]" class="form-control mb-2" placeholder="End Year"></div>
            `;
            container.appendChild(newItem);
            eduIndex++;
        });

        let expIndex = {{ count($experiences) }};
        document.getElementById('add-experience').addEventListener('click', function() {
            const container = document.querySelector('.experience-container');
            const newItem = document.createElement('div');
            newItem.classList.add('row','mb-3','experience-item');
            newItem.innerHTML = `
                <div class="col-md-6"><input type="text" name="experience[${expIndex}][company]" class="form-control mb-2" placeholder="Company"></div>
                <div class="col-md-6"><input type="text" name="experience[${expIndex}][position]" class="form-control mb-2" placeholder="Position"></div>
                <div class="col-md-6"><input type="text" name="experience[${expIndex}][from]" class="form-control mb-2" placeholder="From"></div>
                <div class="col-md-6"><input type="text" name="experience[${expIndex}][to]" class="form-control mb-2" placeholder="To"></div>
            `;
            container.appendChild(newItem);
            expIndex++;
        });
    </script>
@endsection
