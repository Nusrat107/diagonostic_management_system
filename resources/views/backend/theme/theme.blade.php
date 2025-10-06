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

    /* Main content */
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
    }

    /* ✅ Responsive: mobile এ sidebar উপরে থাকবে */
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
                        <li class="active"><a href="{{ url('/admin/theme') }}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>
                        <li><a href="#"><i class="fa fa-key mr-2"></i> Roles & Permissions</a></li>
                        <li><a href="{{ url('/admin/invoice-setting') }}"><i class="fa fa-pencil-square-o mr-2"></i> Invoice Settings</a></li>
                        <li><a href="{{url('/admin/sellary-setting')}}"><i class="fa fa-money mr-2"></i> Salary Settings</a></li>
                        <li><a href="{{url('/admin/password-setting')}}"><i class="fa fa-lock mr-2"></i> Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h3 class="page-title">Theme Settings</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ url('/admin/theme/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Website Name -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Website Name</label>
                            <div class="col-lg-9">
                                <input name="website_name" class="form-control" value="{{ $theme->website_name ?? 'PreClinic' }}" type="text">
                            </div>
                        </div>

                        <!-- Light Logo -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Light Logo</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="file" name="light_logo">
                                <span class="form-text text-muted">Recommended image size is 40px x 40px</span>
                            </div>
                            <div class="col-lg-2 text-center">
                                <div class="img-thumbnail">
                                    <img src="{{ $theme->light_logo ? asset($theme->light_logo) : asset('backend/assets/img/logo-dark.png') }}" width="40" height="40">
                                    <div class="mt-1 text-truncate">{{ $theme->light_logo ? basename($theme->light_logo) : 'logo-dark.png' }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Favicon -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Favicon</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="file" name="favicon">
                                <span class="form-text text-muted">Recommended image size is 16px x 16px</span>
                            </div>
                            <div class="col-lg-2 text-center">
                                <div class="img-thumbnail">
                                    <img src="{{ $theme->favicon ? asset($theme->favicon) : asset('backend/assets/img/favicon.ico') }}" width="16" height="16">
                                    <div class="mt-1 text-truncate">{{ $theme->favicon ? basename($theme->favicon) : 'favicon.ico' }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
@endsection

