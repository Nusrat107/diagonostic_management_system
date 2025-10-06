@extends('backend.master')

@section('content')
<style>
    .settings-page {
        display: flex;
        flex-wrap: wrap;
        background: #f9f9f9;
        padding: 20px;
        gap: 20px;
    }

    /* Sidebar */
    .settings-sidebar {
        width: 260px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        padding: 20px;
        position: sticky;
        top: 100px;
    }

    .settings-sidebar ul { list-style: none; padding: 0; margin: 0; }
    .settings-sidebar ul li { margin-bottom: 10px; }

    .settings-sidebar ul li a {
        display: flex;
        align-items: center;
        color: #333;
        font-weight: 500;
        text-decoration: none;
        padding: 8px 10px;
        border-radius: 6px;
        transition: 0.3s;
    }

    .settings-sidebar ul li a:hover,
    .settings-sidebar ul li.active a {
        background: #2F4050;
        color: #fff;
    }

    /* Main content */
    .settings-content {
        flex: 1;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.08);
        padding: 30px;
    }

    .page-title {
        font-weight: 600;
        text-align: center;
        margin-bottom: 25px;
    }

    .submit-btn {
        background: #2F4050;
        border: none;
        color: #fff;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background: #1f2d3d;
    }

    .form-group label {
        font-weight: 500;
    }

    input.form-control, select.form-control {
        border-radius: 8px;
        box-shadow: none;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .settings-page { flex-direction: column; padding: 10px; }
        .settings-sidebar { width: 100%; position: relative; top: 0; }
        .settings-content { margin-left: 0; padding: 20px; }
        .settings-sidebar ul li a { justify-content: center; }
    }

    /* Alerts */
    .alert {
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-weight: 500;
        text-align: center;
    }
    .alert-success { background: #d4edda; color: #155724; }
    .alert-error { background: #f8d7da; color: #721c24; }
</style>

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="settings-page">

                <!-- Sidebar -->
                <div class="settings-sidebar">
                    <ul>
                        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home mr-2"></i>Back to Home</a></li>
                        <li class="menu-title mt-3 mb-2 text-muted">Settings</li>
                        <li class="active"><a href="{{ url('/admin/profile') }}"><i class="fa fa-user mr-2"></i>Profile Settings</a></li>
                        <li><a href="{{ url('/admin/password-setting') }}"><i class="fa fa-lock mr-2"></i>Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h4 class="page-title">Update Profile</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div class="alert alert-error">{{ session('error') }}</div>
                    @endif

                    <form action="{{ url('/admin/profile/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="text-center mb-3">
                            @if($user->profile_image)
                                <img src="{{ asset($user->profile_image) }}" style="width:100px; height:100px; border-radius:50%; object-fit:cover;">
                            @else
                                <img src="{{ asset('backend/images/profile/default.png') }}" style="width:100px; height:100px; border-radius:50%; object-fit:cover;">
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        

                        <div class="form-group mb-4">
                            <label>Profile Picture</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="submit-btn">Update Profile</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection




