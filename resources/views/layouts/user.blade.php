<!DOCTYPE html>
<html lang="en">
@include('partials._head_admin')
@yield('stylesheets')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
@include('partials._navigation_admin')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
    @include('partials._messages')
    @yield('content')
    @include('partials._footer_admin')
    </div>
</div>
<!-- end of .container -->
@include('partials._js_admin')
@yield('scripts')
</body>

</html>