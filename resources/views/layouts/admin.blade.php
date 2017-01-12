<!DOCTYPE html>
<html lang="en">
@include('partials._head_admin_real')
@yield('stylesheets')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
@include('partials._navigation_admin_real')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
    @include('partials._messages')
    @yield('content')
    @include('partials._footer_admin_real')
    </div>
</div>
<!-- end of .container -->
@include('partials._js_admin_real')
@yield('scripts')

</body>

</html>