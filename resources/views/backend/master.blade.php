<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Dashboard</title>

    @include('backend.includes.style')

</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">

        @include('backend.includes.navbar')
        @include('backend.includes.sidebar')
        <!--begin::App Main-->
        <main class="app-main">

            @yield('content')

        </main>
        <!--end::App Main-->

    </div>
    <!--end::App Wrapper-->

    @include('backend.includes.script')

@stack('script')
</body>
<!--end::Body-->

</html>
