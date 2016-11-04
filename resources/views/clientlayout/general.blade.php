<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | UmrahPlaza.</title>
    @include('clientlayout.head-general')
    @yield('custom_head')
</head>
<body>

<div class="preloader">
    <div class="status">&nbsp;</div>
</div>


        <!-- layout-->
<div id="layout">
    @include('clientlayout.head')
    @include('clientlayout.modal')
    @yield('content')
    @include('clientlayout.footer')
    @yield('custom_footer')
</div>
<!-- End layout-->
</body>
</html>