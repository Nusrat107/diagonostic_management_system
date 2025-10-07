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
            order: 1; /* Sidebar উপরে */
        }

        .settings-content {
            order: 2; /* Content নিচে */
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
                        <li>
                            <a href="{{ url('/admin/setting') }}">
                                <i class="fa fa-building mr-2"></i> Company Settings
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ url('/admin/location') }}">
                                <i class="fa fa-clock-o mr-2"></i> Localization
                            </a>
                        </li>
                        <li><a href="{{ url('/admin/theme') }}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>
                        <li><a href="{{url('/admin/role')}}"><i class="fa fa-key mr-2"></i> Roles & Permissions</a></li>
                        <li><a href="{{ url('/admin/invoice-setting') }}"><i class="fa fa-pencil-square-o mr-2"></i> Invoice Settings</a></li>
                        <li><a href="{{url('/admin/sellary-setting')}}"><i class="fa fa-money mr-2"></i> Salary Settings</a></li>
                        <li><a href="{{url('/admin/password-setting')}}"><i class="fa fa-lock mr-2"></i> Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h3 class="page-title">Localization Settings</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ url('/admin/location/store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <!-- Default Country -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Default Country</label>
                                    <select class="form-control" name="country">
                                        <option value="Bangladesh" {{ ($location->country ?? 'Bangladesh') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="USA" {{ ($location->country ?? '') == 'USA' ? 'selected' : '' }}>USA</option>
                                        <option value="United Kingdom" {{ ($location->country ?? '') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="India" {{ ($location->country ?? '') == 'India' ? 'selected' : '' }}>India</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Date Format -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date Format</label>
                                    <input type="text" class="form-control" name="date_format" value="{{ date('d-m-Y') }}" readonly>
                                </div>
                            </div>

                            <!-- Timezone -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Timezone</label>
                                    <select class="form-control" name="timezone">
                                        <option value="Asia/Dhaka" {{ ($location->timezone ?? 'Asia/Dhaka') == 'Asia/Dhaka' ? 'selected' : '' }}>(UTC +6:00) Asia/Dhaka</option>
                                        <option value="Asia/Kolkata" {{ ($location->timezone ?? '') == 'Asia/Kolkata' ? 'selected' : '' }}>(UTC +5:30) India</option>
                                        <option value="Asia/Singapore" {{ ($location->timezone ?? '') == 'Asia/Singapore' ? 'selected' : '' }}>(UTC +8:00) Singapore</option>
                                        <option value="America/New_York" {{ ($location->timezone ?? '') == 'America/New_York' ? 'selected' : '' }}>(UTC -5:00) New York</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Default Language -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Default Language</label>
                                    <select class="form-control" name="language">
                                        <option value="English" {{ ($location->language ?? '') == 'English' ? 'selected' : '' }}>English</option>
                                        <option value="Bangla" {{ ($location->language ?? 'Bangla') == 'Bangla' ? 'selected' : '' }}>Bangla</option>
                                        <option value="French" {{ ($location->language ?? '') == 'French' ? 'selected' : '' }}>French</option>
                                        <option value="Spanish" {{ ($location->language ?? '') == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Currency Code -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Currency Code</label>
                                    <select class="form-control" name="currency_code">
                                        <option value="BDT" {{ ($location->currency_code ?? 'BDT') == 'BDT' ? 'selected' : '' }}>BDT</option>
                                        <option value="USD" {{ ($location->currency_code ?? '') == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EURO" {{ ($location->currency_code ?? '') == 'EURO' ? 'selected' : '' }}>EURO</option>
                                        <option value="Pound" {{ ($location->currency_code ?? '') == 'Pound' ? 'selected' : '' }}>Pound</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Currency Symbol -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Currency Symbol</label>
                                    <input class="form-control" type="text" name="currency_symbol" value="{{ $location->currency_symbol ?? 'Tk' }}">
                                </div>
                            </div>
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


