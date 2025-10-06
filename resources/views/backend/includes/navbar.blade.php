<div class="header">
    <div class="header-left">
        <a href="{{ url('/admin/dashboard') }}" class="logo">
            <img src="{{ $theme->light_logo ? asset($theme->light_logo) : asset('backend/assets/img/logo.png') }}" width="35" height="35" alt="Logo">
            <span>{{ $theme->website_name ?? 'MediNest' }}</span>
        </a>
    </div>

    <!-- Sidebar toggle buttons -->
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- User Menu -->
   <ul class="nav user-menu float-right">
    <li class="nav-item dropdown has-arrow">
        <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
            <span class="user-img">
                <img class="rounded-circle" 
                     src="{{ Auth::user()->profile_image ? asset(Auth::user()->profile_image) : asset('backend/images/profile/default.png') }}" 
                     width="24" alt="{{ Auth::user()->name }}">
                <span class="status online"></span>
            </span>
            <span>{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('/admin/profile') }}">My Profile</a>
            <a class="dropdown-item" href="{{ url('/admin/profile') }}">Edit Profile</a>
            <a class="dropdown-item" href="{{ url('/admin/settings') }}">Settings</a>
            <a class="dropdown-item" href="{{ url('/admin/logout') }}">Logout</a>
        </div>
    </li>
</ul>