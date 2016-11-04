@extends('clientlayout.general')
@section('custom_head')

@stop
@section('title','Beranda')
@section('content')
        <!-- Section Title-->
<div class="section-title-detailed">
    <!-- Single Carousel-->
    <div id="single-carousel">
        @if(count($package->images)>0)
            @foreach($package->images as $item)
                <div class="img-hover">
                    <div style="height: 500px;" class="overlay"><a href="{{URL::to('gambar/get').'/'.$item->id}}"
                                                                   class="fancybox" rel="gallery"></a>
                    </div>
                    <img src="{{URL::to('gambar/get').'/'.$item->id}}" alt="" class="img-responsive">
                </div>
            @endforeach
        @else
            <div class="img-hover">
                <div class="overlay"><a href="{{URL::to('assets/1.jpg')}}" class="fancybox" rel="gallery"></a>
                </div>
                <img src="{{URL::to('assets/1.jpg')}}" alt="" class="img-responsive">
            </div>

            <div class="img-hover">
                <div class="overlay"><a href="{{URL::to('assets/2.jpg')}}" class="fancybox" rel="gallery"></a>
                </div>
                <img src="{{URL::to('assets/2.jpg')}}" alt="" class="img-responsive">
            </div>

            <div class="img-hover">
                <div class="overlay"><a href="{{URL::to('assets/3.jpg')}}" class="fancybox" rel="gallery"></a>
                </div>
                <img src="{{URL::to('assets/3.jpg')}}" alt="" class="img-responsive">
            </div>
        @endif
    </div>
    <!-- End Single Carousel-->

    <!-- Section Title-->
    <div class="title-detailed">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2>{{ $package->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Title-->
</div>
<!-- End Section Title-->

<!--Content Central -->
<div class="content-central">
    <!-- Shadow Semiboxed -->
    <div class="semiboxshadow text-center">
        <img src="img/img-theme/shp.png" class="img-responsive" alt="">
    </div>
    <!-- End Shadow Semiboxed -->

    <!-- End content info - Grey Section-->
    <div class="content_info">
        <!-- Info Resalt-->
        <div class="content_resalt paddings-mini tabs-detailed">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-10">
                        <!-- Nav Tabs-->
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="#desc" data-toggle="tab"><i class="fa fa-book"></i> DESCRIPTION</a>
                            </li>
                            <li>
                                <a href="#hotelmekkah" data-toggle="tab"><i class="fa fa-building-o"></i>Hotel di Mekkah</a>
                            </li>
                            <li>
                                <a href="#hotelmadinah" data-toggle="tab"><i class="fa fa-building-o"></i> Hotel di
                                    Madinah</a>
                            </li>
                            <li>
                                <a href="#syarat" data-toggle="tab"><i class="fa fa-bolt"></i>Syarat dan Ketentuan</a>
                            </li>
                        </ul>
                        <!-- End Nav Tabs-->

                        <div class="tab-content">
                            <!-- Tab One - Hotel -->
                            <div class="tab-pane active" id="desc">
                                <h2>Informasi Paket</h2>
                                <p>{{ $package->description }}</p>

                                <h2>Jadwal Keberangkatan</h2>
                                <p>{{ date('d F Y', strtotime($package->schedule))  }}</p>
                                <h2>Harga Per Jamaah</h2>
                                <ul>
                                    <li>
                                        <h4>Kamar Double</h4>
                                        <strong>
                                            {{ $package->currency->symbol }}
                                            {{ number_format($package->price_double, 2, ',', '.') }}
                                        </strong>
                                    </li>
                                    <li>
                                        <h4>Kamar Triple</h4>
                                        <strong>
                                            {{ $package->currency->symbol }}
                                            {{ number_format($package->price_triple, 2, ',', '.') }}
                                        </strong>
                                    </li>
                                    <li>
                                        <h4>Kamar Quadruple</h4>
                                        <strong>
                                            {{ $package->currency->symbol }}
                                            {{ number_format($package->price_quadruple, 2, ',', '.') }}
                                        </strong>
                                    </li>
                                </ul>

                                <h2>Diskon</h2>
                                <strong>
                                    @if($package->is_discount_in_percentage)
                                        {{ $package->discount  }}%
                                    @else
                                        {{ $package->currency->symbol }} {{ number_format($package->discount, 2, ',', '.') }}
                                    @endif


                                </strong>

                                <h2>Maskapai</h2>
                                <strong><p>{{ $package->airline->name  }}</p></strong>

                            </div>
                            <!-- end Tab One - Hotel -->

                            <!-- Tab Two - Preferences -->
                            <div class="tab-pane" id="hotelmekkah">
                                <h1>{{ $package->hotelMekkah->name }}</h1>


                                <h3> Lokasi </h3>
                                <p> {{ $package->hotelMekkah->location }} </p>

                                <h3> Makanan dan Minuman </h3>
                                <p> {{ $package->hotelMekkah->food }} </p>

                                <h3> Internet </h3>
                                <p> {{ $package->hotelMekkah->internet }} </p>

                                <h3> Jarak </h3>
                                <p> {{ $package->hotelMekkah->distance }} </p>

                                <h3> Lahan Parkir </h3>
                                <p> {{ $package->hotelMekkah->parking_area }} </p>

                                <h3> Layanan Publik </h3>
                                <p> {{ $package->hotelMekkah->public_facility }} </p>


                            </div>
                            <!-- end Tab Two - Preferences -->
                            <!-- Tab Two - Preferences -->
                            <div class="tab-pane" id="hotelmadinah">
                                <h1>{{ $package->hotelMadinah->name }}</h1>

                                <h3> Lokasi </h3>
                                <p> {{ $package->hotelMadinah->location }} </p>

                                <h3> Makanan dan Minuman </h3>
                                <p> {{ $package->hotelMadinah->food }} </p>

                                <h3> Internet </h3>
                                <p> {{ $package->hotelMadinah->internet }} </p>

                                <h3> Jarak </h3>
                                <p> {{ $package->hotelMadinah->distance }} </p>

                                <h3> Lahan Parkir </h3>
                                <p> {{ $package->hotelMadinah->parking_area }} </p>

                                <h3> Layanan Publik </h3>
                                <p> {{ $package->hotelMadinah->public_facility }} </p>


                            </div>
                            <!-- end Tab Two - Preferences -->
                            <!-- Tab Two - Preferences -->
                            <!-- end Tab Two - Preferences -->
                            <!-- Tab Two - Preferences -->
                            <div class="tab-pane" id="syarat">

                                @if($package->pas_foto_desc)
                                    <h3> Syarat Pas Foto </h3>
                                    <p> {{ $package->pas_foto_desc }} </p>
                                @endif

                                @if($package->ktp_desc)
                                    <h3> Syarat KTP </h3>
                                    <p> {{ $package->ktp_desc }} </p>
                                @endif

                                @if($package->ktp_kk_asli_desc)
                                    <h3> Syarat KTP dan KK Asli </h3>
                                    <p> {{ $package->ktp_kk_asli_desc }} </p>
                                @endif

                                @if($package->surat_nikah_kk_asli_desc)
                                    <h3> Syarat Surat Nikah dan KK Asli </h3>
                                    <p> {{ $package->surat_nikah_kk_asli_desc }} </p>
                                @endif

                                @if($package->uang_muka_desc)
                                    <h3> Pembayaran Uang Muka </h3>
                                    <p> {{ $package->uang_muka_desc }} </p>
                                @endif

                                @if($package->pelunasan_desc)
                                    <h3> Pelunasan </h3>
                                    <p> {{ $package->pelunasan_desc }} </p>
                                @endif

                                @if($package->pendaftaran_desc)
                                    <h3> Pendaftaran </h3>
                                    <p> {{ $package->pendaftaran_desc }} </p>
                                @endif

                                @if($package->kartu_kuning_desc)
                                    <h3> Kartu Kuning </h3>
                                    <p> {{ $package->kartu_kuning_desc }} </p>
                                @endif

                            </div>
                            <!-- end Tab Two - Preferences -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="col-md-3">
                            @if(Auth::check())
                                <a href="{{ route('orders.add', ['package_id' => $package->id]) }}" class="btn btn-primary">Pesan
                                    Sekarang</a>
                            @else
                                <a href="#login" class="btn btn-primary">Memesan?<br>Silahkan login<br>terlebih dahulu</a>
                                <div class="remodal" data-remodal-id="login" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                    <div class="col-md-12">
                                        <h2 id="modal1Title">Login</h2>
                                        <p id="modal1Desc">
                                        <div class="login-form">
                                            <form  method="post" action="{{ route('auth.doLogin') }}">
                                                {!! csrf_field() !!}
                                                <div >
                                                    <table class="text-center col-md-12">
                                                        <tr>
                                                            <td colspan="2">
                                                                <input type="text" required="required" name="username" placeholder="Username"><br><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <input type="password" required="required" name="password" placeholder="Password"><br><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <input class="btn btn-primary" type="submit" value="Login"><br><br> </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <label><a href="{{URL::to('register')}}" >Daftar Akun</a></label> </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                        </p>
                                    </div>
                                    <br>
                                    {{--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>--}}
                                    {{--<button data-remodal-action="confirm" class="remodal-confirm">OK</button>--}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Info Resalt-->
    </div>
    <!-- End content info - Grey Section-->
</div>

@stop
@section('custom_foot')

@stop