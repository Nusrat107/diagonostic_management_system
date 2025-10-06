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

    .settings-sidebar {
        width: 260px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        padding: 20px;
        height: fit-content;
        position: sticky;
        top: 100px;
        flex-shrink: 0;
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

    .settings-content {
        flex: 1;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.08);
        padding: 30px;
        min-width: 300px;
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
        transition: 0.3s;
    }

    .submit-btn:hover {
        background: #1f2d3d;
    }

    .form-group label {
        font-weight: 500;
    }

    input.form-control {
        border-radius: 8px;
        box-shadow: none;
    }

    @media (max-width: 991px) {
        .settings-page {
            flex-direction: column;
            padding: 10px;
        }

        .settings-sidebar {
            width: 100%;
            position: relative;
            top: 0;
            order: 1;
        }

        .settings-content {
            order: 2;
            margin-left: 0;
            padding: 20px;
        }

        .settings-sidebar ul li a {
            justify-content: center;
            text-align: center;
        }
    }

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
                        <li>
                            <a href="{{ url('/admin/dashboard') }}">
                                <i class="fa fa-home back-icon mr-2"></i> Back to Home
                            </a>
                        </li>
                        <li class="menu-title mt-3 mb-2 text-muted">Settings</li>
                        <li><a href="{{ url('/admin/setting') }}"><i class="fa fa-building mr-2"></i> Company Settings</a></li>
                        <li><a href="{{ url('/admin/location') }}"><i class="fa fa-clock-o mr-2"></i> Localization</a></li>
                        <li><a href="{{ url('/admin/theme') }}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>
                        <li><a href="#"><i class="fa fa-key mr-2"></i> Roles & Permissions</a></li>
                        <li><a href="{{ url('/admin/invoice-setting') }}"><i class="fa fa-pencil-square-o mr-2"></i> Invoice Settings</a></li>
                        <li><a href="{{url('/admin/sellary-setting')}}"><i class="fa fa-money mr-2"></i> Salary Settings</a></li>
                        <li class="active"><a href="{{url('/admin/password-setting')}}"><i class="fa fa-lock mr-2"></i> Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h4 class="page-title">Change Password</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div class="alert alert-error">{{ session('error') }}</div>
                    @endif

                    <form action="{{ url('/admin/password-setting/store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                        </div>

                        <div class="form-group mb-4">
                            <label>Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="Re-enter new password" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="submit-btn">Update Password</button>
                        </div>
                    </form>

                    @if(isset($passwordSetting))
                        <p class="text-center mt-4 text-muted">
                            Last changed: {{ \Carbon\Carbon::parse($passwordSetting->changed_at)->diffForHumans() }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
