<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | UmrahPlaza</title>
    @include('layout.head-general')
    @yield('custom_head')
</head>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('layout.header')
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
    @include('layout.foot-general')
    @yield('custom_foot')
</body>

</html>
