<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}">
    @yield('moreStyles')
</head>
<body class="teal darken-1">
@yield('navbar')
<div>
    @yield('content')
</div>
@yield('moreScripts')
</body>
</html>
