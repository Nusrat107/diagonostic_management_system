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

    /* ✅ Responsive - sidebar উপরে থাকবে mobile এ */
    @media (max-width: 991px) {
        .settings-page {
            flex-direction: column;
            padding: 10px;
        }

        .settings-sidebar {
            width: 100%;
            position: relative;
            top: 0;
            order: 1; /* Sidebar উপরে থাকবে */
        }

        .settings-content {
            order: 2; /* Main content নিচে যাবে */
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
                        <li class="active">
                            <a href="{{ url('/admin/setting') }}">
                                <i class="fa fa-building mr-2"></i> Company Settings
                            </a>
                        </li>
                        <li><a href="{{url('/admin/location')}}"><i class="fa fa-clock-o mr-2"></i> Localization</a></li>
                        <li><a href="{{url('/admin/theme')}}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>
                        <li><a href="#"><i class="fa fa-key mr-2"></i> Roles & Permissions</a></li>
                        <li><a href="{{url('/admin/invoice-setting')}}"><i class="fa fa-pencil-square-o mr-2"></i> Invoice Settings</a></li>
                        <li><a href="{{url('/admin/sellary-setting')}}"><i class="fa fa-money mr-2"></i> Salary Settings</a></li>
                        <li><a href="{{url('/admin/password-setting')}}"><i class="fa fa-lock mr-2"></i> Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h3 class="page-title">Company Settings</h3>

                    <form action="{{ url('/admin/setting/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input class="form-control" type="text" name="company_name" value="{{ $company->company_name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <input class="form-control" type="text" name="contact_person" value="{{ $company->contact_person ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" value="{{ $company->address ?? '' }}">
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" type="text" name="country" value="{{ $company->country ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city" value="{{ $company->city ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state" value="{{ $company->state ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control" type="text" name="postal_code" value="{{ $company->postal_code ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $company->email ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $company->phone ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text" name="mobile" value="{{ $company->mobile ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control" type="text" name="fax" value="{{ $company->fax ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Website URL</label>
                            <input class="form-control" type="text" name="website" value="{{ $company->website ?? '' }}">
                        </div>

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


