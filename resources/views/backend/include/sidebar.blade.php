<!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                            class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item ">
                            <a>
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>

                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('/admin/invoice')}}">
                            
                    <i class="fa-solid fa-file-contract"></i>
                                <p>Invoice and Billing</p>

                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">

                                </ul>
                            </div>
                        </li>
                        </li>
                        <li class="nav-item ">
                            <a>
                            
                   <i class="fa-solid fa-flag"></i>
                                <p>Report Entry</p>

                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">

                                </ul>
                            </div>
                        </li>





                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
