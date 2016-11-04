<!-- Info Head -->
<div class="info-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><i class="fa fa-headphones"></i> 087806666226</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Info Head -->

<!-- Header-->
<header id="header" class="header-v3">
    <!-- Main Nav -->
    <nav class="flat-mega-menu">
        <!-- flat-mega-menu class -->
        <label for="mobile-button"> <i class="fa fa-bars"></i></label><!-- mobile click button to show menu -->
        <input id="mobile-button" type="checkbox">

        <ul class="collapse"><!-- collapse class for collapse the drop down -->
            <!-- website title - Logo class -->
            <li class="title">
                <a href="{{URL::to('/')}}"><span>U</span>mrah<span>P</span>laza<span>.</span></a>
            </li>
            <!-- End website title - Logo class -->

            <li>
                <a href="{{URL::to('populer')}}">Paket Populer</a>
            </li>
            <li>
                <a href="{{URL::to('soon')}}">Segera Berangkat</a>
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{URL::to('promo')}}">Promo Spesial</a>--}}
            {{--</li>--}}
            @if( !Auth::check() )
            <li class="login-form"> <i class="fa fa-user"></i><!-- login form -->
                <ul id="lala" class="drop-down hover-expand">
                    <li>
                        <form  method="post" action="{{ route('auth.doLogin') }}">
                            {!! csrf_field() !!}
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" required="required" name="username" placeholder="Username">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="password" required="required" name="password" placeholder="Password">
                                    </td>
                                </tr>
                                <tr>
                                    <td> <input type="submit" value="Login"> </td>
                                    <td> <label><a href="{{URL::to('register')}}" >Daftar Akun</a></label> </td>
                                </tr>
                            </table>
                        </form>
                    </li>
                </ul>
            </li>
            @endif
            @if( Auth::check() )
                <li>
                    <a href="{{ route('orders.show') }}">Riwayat Pemesanan</a>
                </li>
            @if( Auth::user()->role->id != 3 )
                    <li>
                        <a href="{{URL::to('admin')}}">Home Admin</a>
                    </li>
            @endif

            <li class="login-form">
                <a href="{{URL::to('logout')}}">

                    <i class="fa fa-user"></i>&nbsp;&nbsp; Logout<!-- login form -->
                </a>

            </li>

            @endif
        </ul>
    </nav>
    <!-- Main Nav -->
</header>