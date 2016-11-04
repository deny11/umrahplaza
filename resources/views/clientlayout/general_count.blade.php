<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | UmrahPlaza.</title>
    @include('clientlayout.head-general')
    @yield('custom_head')
    <script type="text/javascript" src="{{URL::to('timer/source/jquery.1.7.2.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('timer/source/jquery.syotimer.js')}}"></script>

    <style type="text/css">

        /* Customization Style of SyoTimer */
        .timer{
            text-align: center;

            margin: 30px auto 0;
            padding: 0 0 10px;

            border-bottom: 2px solid #80a3ca;
        }
        .timer .table-cell{
            display: inline-block;
            margin: 0 5px;

            width: 79px;
            background: url({{URL::to('timer/images/timer.png')}}) no-repeat 0 0;
        }
        .timer .table-cell .tab-val{
            font-size: 35px;
            color: #80a3ca;

            height: 81px;
            line-height: 81px;

            margin: 0 0 5px;
        }
        .timer .table-cell .tab-metr{
            font-family: Arial;
            font-size: 12px;
            text-transform: uppercase;
        }

        #simple_timer.timer .table-cell.day,
        #periodic_timer_days.timer .table-cell.hour{
            width: 120px;
            background-image: url({{URL::to('timer/images/timer_long.png')}});
        }
    </style>
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