@extends('clientlayout.general')
@section('title','Beranda')
@section('content')

        <!-- Section Title-->
<div class="section-title-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Order Paket Umroh</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Section Title-->
<!--Content Central -->
<div class="content-central">

    <!-- End content info - page Fill with -->
    <div class="content_info">
        <div class="paddings-mini">
            <div class="container">
                <div class="row">
                    <!-- Sidebars -->
                    <div class="col-md-4">
                        <aside>
                            <h4>Informasi Umum Paket Umroh</h4>
                            <address>
                                <strong>{{$package->name}}</strong><br>
                                <i class="fa fa-calendar"></i><strong>{{$package->schedule}}</strong> <br>
                                <i class="fa fa-plane"></i><strong>{{$package->airline->name}} </strong> <br>
                                <i class="fa fa-money"></i> Harga Kamar
                                <span>Double :</span> {{ $package->currency->symbol }} {{ number_format($package->price_double, 2, ',', '.') }}<br>
                                <i class="fa fa-money"></i> Harga Kamar
                                <span>Triple :</span> {{ $package->currency->symbol }} {{number_format($package->price_triple, 2, ',', '.')}}<br>
                                <i class="fa fa-money"></i> Harga Kamar
                                <span>Quadruple :</span> {{ $package->currency->symbol }} {{number_format($package->price_quadruple, 2, ',', '.')}}
                                <br>
                                <i class="fa fa-money"></i>
                                @if ($package->is_discount_in_percentage == 1)
                                    Diskon {{$package->discount}}%
                                @else
                                    Diskon Rp. {{number_format($package->discount, 2, ',', '.')}}
                                @endif
                                <br>
                                <i class="fa fa-building-o"></i> Hotel Makkah : {{$package->hotelMekkah->name}}<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php for ($i = 0; $i < $package->hotelMekkah->rate ; $i++) { ?>
                                <i style="color: #ded731;" class="fa fa-star"></i>
                                <?php } ?><br>
                                <i class="fa fa-building-o"></i> Hotel Madinah : {{$package->hotelMadinah->name}}<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php for ($i = 0; $i < $package->hotelMadinah->rate ; $i++) { ?>
                                <i style="color: #ded731;" class="fa fa-star"></i>
                                <?php } ?><br>
                            </address>

                            <address>
                                <strong>Agen Travel</strong><br>
                                <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;{{$package->user->name}}<br>
                                <i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{{$package->user->phone}}<br>
                                <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;{{$package->user->email}}</a>
                            </address>
                        </aside>

                    </div>
                    <!-- End Sidebars -->

                    <div class="col-md-8">
                        <h3>Form Pesan Paket Umroh</h3>
                        <p>
                            Masukkan jumlah jamaah untuk memesan paket :
                        </p>
                        <form class="form-theme" action="{{ route('orders.create', ['package_id' => $package->id]) }}"
                              method="post">
                            <div class="col-lg-4 col-xs-12">
                                <input class="text-center" type="number" placeholder="kamar double" name="number_double"
                                       min="0">
                            </div>
                            {!! csrf_field() !!}
                            <div class="col-lg-4 col-xs-12">
                                <input class="text-center" type="number" placeholder="kamar triple" name="number_triple"
                                       min="0">
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <input class="text-center" type="number" placeholder="kamar quadruple"
                                       name="number_quadruple" min="0">
                            </div>
                            <p>
                                Masukkan identitas pemesan :
                            </p>
                            <input type="text" placeholder="Nama Pemesan" name="contact_name" required="">
                            <input type="text" placeholder="Alamat Pemesan" name="contact_address" required="">
                            <input type="email" placeholder="Alamat Email Pemesan" name="contact_email" required="">
                            <input type="text" placeholder="Nomor Telpon Pemesan" name="contact_phone" required="">

                            <input type="submit" name="Submit" value="Pesan" class="btn btn-primary">
                        </form>
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content info - page Fill with  -->
</div>
<!-- End Content Central -->

@stop
@section('custom_foot')

@stop