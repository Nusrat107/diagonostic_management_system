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

    .settings-sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .settings-sidebar ul li {
        margin-bottom: 10px;
    }

    .settings-sidebar ul li a {
        display: flex;
        align-items: center;
        color: #333;
        font-weight: 500;
        text-decoration: none;
        padding: 8px 12px;
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
        margin-bottom: 30px;
        font-size: 1.5rem;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        height: 45px;
        border-radius: 6px;
        padding: 0 12px;
        font-size: 1rem;
    }

    .submit-btn {
        background: #2F4050;
        color: #fff;
        font-size: 1rem;
        padding: 10px 30px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }

    .submit-btn:hover {
        background: #1f2a38;
    }

    h3.page-sub-title {
        font-size: 1.2rem;
        margin-top: 25px;
        margin-bottom: 15px;
        font-weight: 600;
        border-bottom: 1px solid #eee;
        padding-bottom: 5px;
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
            margin-bottom: 15px;
        }

        .settings-content {
            order: 2;
            padding: 20px;
        }

        .form-control {
            width: 100%;
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
                        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home mr-2"></i>Back to Home</a></li>
                        <li class="menu-title mt-3 mb-2 text-muted">Settings</li>
                        <li><a href="{{ url('/admin/setting') }}"><i class="fa fa-building mr-2"></i>Company Settings</a></li>
                        <li><a href="{{ url('/admin/location') }}"><i class="fa fa-clock-o mr-2"></i>Localization</a></li>
                         <li><a href="{{ url('/admin/theme') }}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>

                        <li><a href="{{ url('/admin/invoice-setting') }}"><i class="fa fa-pencil-square-o mr-2"></i>Invoice Settings</a></li>
                        <li><a href="#"><i class="fa fa-key mr-2"></i>Roles & Permissions</a></li>
                                                <li class="active"><a href="{{ url('/admin/sellary-setting') }}"><i class="fa fa-money mr-2"></i>Salary Settings</a></li>
                        <li><a href="{{url('/admin/password-setting')}}"><i class="fa fa-lock mr-2"></i>Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h3 class="page-title">Salary Settings</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ url('/admin/sellary-setting/store') }}" method="POST">
                        @csrf

                        <!-- DA & HRA -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>DA (%)</label>
                                    <input type="text" name="da" class="form-control" value="{{ $salary->da ?? '' }}" placeholder="Enter DA percentage">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>HRA (%)</label>
                                    <input type="text" name="hra" class="form-control" value="{{ $salary->hra ?? '' }}" placeholder="Enter HRA percentage">
                                </div>
                            </div>
                        </div>

                        <!-- Provident Fund -->
                        <h3 class="page-sub-title">Provident Fund Settings</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee Share (%)</label>
                                    <input type="text" name="pf_employee" class="form-control" value="{{ $salary->pf_employee ?? '' }}" placeholder="Enter employee share">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Organization Share (%)</label>
                                    <input type="text" name="pf_organization" class="form-control" value="{{ $salary->pf_organization ?? '' }}" placeholder="Enter organization share">
                                </div>
                            </div>
                        </div>

                        <!-- ESI -->
                        <h3 class="page-sub-title">ESI Settings</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee Share (%)</label>
                                    <input type="text" name="esi_employee" class="form-control" value="{{ $salary->esi_employee ?? '' }}" placeholder="Enter employee share">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Organization Share (%)</label>
                                    <input type="text" name="esi_organization" class="form-control" value="{{ $salary->esi_organization ?? '' }}" placeholder="Enter organization share">
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn submit-btn">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
