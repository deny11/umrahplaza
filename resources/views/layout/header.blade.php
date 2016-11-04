<div class="col-md-3 left_col" style="max-height: 100%; overflow: scroll;">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><img src="{{URL::to('assets/umrah.png')}}" width="40px">
                <span>Umrah Plaza</span></a>
        </div>
        <div class="clearfix"></div>

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Payment</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('paymentConfirmations.show') }}"><i class="fa fa-money"></i>Konfirmasi
                            Pembayaran ( {{count(Auth::user()->hasNotif())}} )</a></li>
                </ul>
            </div>

            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    @if(Auth::user()->role_id == 1)
                        <li><a href="{{ route('airlines.show') }}"><i class="fa fa-plane"></i>Maskapai</a></li>
                        <li><a href="{{ route('hotels.show') }}"><i class="fa fa-building"></i>Hotel</a></li>
                        <li><a href="{{ route('routes.show') }}"><i class="fa fa-location-arrow"></i>List Rute</a></li>
                        <li><a href="{{ route('images.show') }}"><i class="fa fa-image"></i>List Gambar</a></li>
                        <li><a href="{{ route('banks.show') }}"><i class="fa fa-dollar"></i>List Bank</a></li>
                        <li><a href="{{ route('users.show') }}"><i class="fa fa-user"></i>List User</a></li>
                    @endif
                    <li><a href="{{ route('packages.show') }}"><i class="fa fa-database"></i>List Paket</a></li>
                </ul>
            </div>
            @if(Auth::user()->role_id == 1)
            <div class="menu_section">
                <h3>Report</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('report1.show') }}"><i class="fa fa-money"></i>Grafik Pemasukan</a></li>
                    <li><a href="{{ route('report2.show') }}"><i class="fa fa-money"></i>Grafik Jumlah Transaksi</a></li>
                </ul>
            </div>
            @endif
            <!-- <div class="menu_section">
                <h3>Akses Tabel</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-list"></i> Type <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="{{URL::to('type/create')}}">Insert</a>
                        </li>
                        <li><a href="{{URL::to('type')}}">Manage</a>
                        </li>
                    </ul>
                    </li>
                </ul>
            </div> -->

        </div>
        <!-- /sidebar menu -->

    </div>
</div>

<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="{{URL::to('logout')}}" aria-expanded="false">
                        {{Auth::user()->name}}&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                    </a>
                </li>
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-exclamation-circle"></i>
                        <span class="badge bg-green">{{count(Auth::user()->hasNotif())}}</span>
                    </a>
                    <?php $notif = Auth::user()->hasNotif(); //dd($notif); ?>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @foreach($notif as $item)
                        <li>
                            <a href="{{URL::to('konfirmasi')}}">
                                <span>
                                    <span>Konfirmasi Pembayaran Baru</span>
                                </span>
                                <span class="message">
                                    Oleh = {{$item->paymentConfirmation->account_name}}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

            </ul>

        </nav>
    </div>

</div>
<!-- /top navigation -->