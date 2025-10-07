@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add New Role</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/role/store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <!-- Role Name -->
                                <div class="form-group">
                                    <label>Role Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter role name" required>
                                </div>

                                <!-- Permissions -->
                                <div class="form-group">
                                    <label>Module Permissions</label>
                                    <div class="row">
                                        @foreach($modules as $module)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $module }}" id="{{ Str::slug($module) }}">
                                                <label class="form-check-label" for="{{ Str::slug($module) }}">
                                                    {{ $module }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add Role</button>
                                    <a href="{{ url('/admin/role') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
