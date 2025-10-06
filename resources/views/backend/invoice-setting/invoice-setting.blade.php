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
    .settings-sidebar ul li.active a { background: #2F4050; color: #fff; }
    .settings-content {
        flex: 1;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.08);
        padding: 30px;
        min-width: 300px;
    }
    .page-title { font-weight: 600; text-align: center; margin-bottom: 25px; }
    .submit-btn { background: #2F4050; border: none; }
    @media (max-width: 991px) {
        .settings-page { flex-direction: column; padding: 10px; }
        .settings-sidebar { width: 100%; position: relative; top: 0; }
        .settings-content { width: 100%; margin-left: 0; padding: 20px; }
        .settings-sidebar ul li a { justify-content: center; text-align: center; }
        .form-group.row { display: block; }
        .form-group.row .col-lg-3,
        .form-group.row .col-lg-7,
        .form-group.row .col-lg-2 { width: 100%; text-align: center; }
        .img-thumbnail { margin-top: 10px; }
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
                            <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home back-icon mr-2"></i> Back to Home</a>
                        </li>
                        <li class="menu-title mt-3 mb-2 text-muted">Settings</li>
                        <li><a href="{{ url('/admin/setting') }}"><i class="fa fa-building mr-2"></i> Company Settings</a></li>
                        <li><a href="{{url('/admin/location')}}"><i class="fa fa-clock-o mr-2"></i> Localization</a></li>
                        <li><a href="{{url('/admin/theme')}}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>
                        <li><a href="#"><i class="fa fa-key mr-2"></i> Roles & Permissions</a></li>
                        <li class="active"><a href="{{url('/admin/invoice-setting')}}"><i class="fa fa-pencil-square-o mr-2"></i> Invoice Settings</a></li>
                        <li><a href="{{url('/admin/sellary-setting')}}"><i class="fa fa-money mr-2"></i> Salary Settings</a></li>
                        <li><a href="#"><i class="fa fa-lock mr-2"></i> Change Password</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="settings-content">
                    <h4 class="page-title">Invoice Settings</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ url('/admin/invoice-setting/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Invoice Prefix</label>
                            <div class="col-lg-9">
                                <input name="invoice_prefix" class="form-control" value="{{ $invoice->invoice_prefix ?? 'INV' }}" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Invoice Logo</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="file" name="invoice_logo">
                                <span class="form-text text-muted">Recommended image size is 200px x 40px</span>
                            </div>
                            <div class="col-lg-2 text-center">
                                <div class="img-thumbnail">
                                    <img src="{{ $invoice->invoice_logo ? asset($invoice->invoice_logo) : asset('backend/assets/img/logo-dark.png') }}" class="img-fluid" width="100" height="100">
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>

                    </form>
                </div>

            </div> <!-- settings-page end -->
        </div>
    </div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
@endsection
