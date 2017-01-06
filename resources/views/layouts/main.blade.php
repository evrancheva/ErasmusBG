<!DOCTYPE html>
<html lang="en">
@include('partials._head')
@yield('stylesheets')
<body>
@include('partials._navigation')
<div class="container">
    @include('partials._messages')
    @yield('content')
    @include('partials._footer')
</div><!-- end of .container -->
@include('partials._js')
@yield('scripts')
</body>

</html>