@extends('backend.master')

@section('content')
<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Doctor Profile</h4>
                <a href="{{ url('/admin/doctor') }}" class="btn btn-light">
                    <i class="fa fa-arrow-left"></i> Back to Doctor List
                </a>
            </div>

            <div class="card-body">
                <!-- Doctor Image -->
                <div class="text-center mb-4">
                    <img src="{{ asset('uploads/doctors/'.$doctor->image) }}" 
                         alt="Doctor Image" 
                         class="rounded-circle img-thumbnail" 
                         style="width:180px; height:180px; object-fit:cover;">
                </div>

                <!-- Doctor Basic Info Table -->
                <div class="mb-4">
                    <h5 class="text-primary mb-3">Personal Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Full Name</th>
                            <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $doctor->username }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $doctor->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $doctor->phone }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $doctor->gender }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $doctor->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $doctor->address }}, {{ $doctor->city }}, {{ $doctor->district }}, {{ $doctor->state }}, {{ $doctor->postal_code }}</td>
                        </tr>
                        <tr>
                            <th>Profession</th>
                            <td>{{ $doctor->doc_prof }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge {{ $doctor->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $doctor->status }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Biography</th>
                            <td>{{ $doctor->biography }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Education -->
                <div class="mb-4">
                    <h5 class="text-primary mb-3"><i class="fa fa-graduation-cap"></i> Education</h5>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Degree</th>
                                <th>Institution</th>
                                <th>Start Year</th>
                                <th>End Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(is_array($doctor->education))
                                @foreach($doctor->education as $edu)
                                    <tr>
                                        <td>{{ $edu['degree'] }}</td>
                                        <td>{{ $edu['institution'] }}</td>
                                        <td>{{ $edu['start_year'] }}</td>
                                        <td>{{ $edu['end_year'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="4" class="text-center">No Education Data Found</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Experience -->
                <div class="mb-4">
                    <h5 class="text-primary mb-3"><i class="fa fa-briefcase"></i> Experience</h5>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Position</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(is_array($doctor->experience))
                                @foreach($doctor->experience as $exp)
                                    <tr>
                                        <td>{{ $exp['position'] }}</td>
                                        <td>{{ $exp['start_date'] }}</td>
                                        <td>{{ $exp['end_date'] ?? 'Present' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="3" class="text-center">No Experience Data Found</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Action Buttons -->
                <div class="text-end">
                    <a href="{{ url('/admin/doctor-edit/' . $doctor->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit
                    </a>

                    <form action="{{ url('/admin/doctor-delete/' . $doctor->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this doctor?');
}
</script>
@endsection
