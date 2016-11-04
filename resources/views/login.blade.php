<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Nama Aplikasi</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" type="image/png" href="{{URL::to('assets/Pay-It_logo.png')}}">
    <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::to('assets/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{URL::to('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/icheck/flat/green.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/js/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/js/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/js/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/js/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/js/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>



    <!-- select2 -->
    <link href="{{URL::to('assets/css/select/select2.min.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body style="background:#F7F7F7;">

<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <form action="" name="login" method="post" action="{{ route('auth.doLogin') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h1>Login Form</h1>
                    <br>
                    <br>
                    <div>
                        <input class="form-control" name="username" id="username" type="text"  required=""
                           aria-required="true">
                    </div>
                    <div>
                        <input name="password" id="password" type="password" required=""
                           aria-required="true" class="form-control">
                    </div>
                    <div>
                        <input name="submit" value="Log In" type="submit" class="btn btn-default submit" required="" />
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>
                    <br>
                    <br>
                    <br><br><br>

                    <div class="clearfix"></div>
                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1>UmrahPlaza.</h1>

                            <p>©2016 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
            <!-- content -->
        </div>
    </div>
</div>

</body>

</html>
