@extends('backend.master')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 d-flex justify-content-between align-items-center mb-3">
                        <h4 class="page-title mb-0">Edit Department</h4>
                        <a href="{{ url('/admin/depertment') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        {{-- Form Start --}}
                        <form action="{{ url('/admin/depertment-update/'.$department->id) }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $department->name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description">{{ $department->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="display-block">Department Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="department_active" value="1" {{ $department->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="department_active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="department_inactive" value="0" {{ $department->status == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="department_inactive">Inactive</label>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Update Department</button>
                            </div>
                        </form>
                        {{-- Form End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>
@endsection
