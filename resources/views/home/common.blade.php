@extends('clientlayout.general')
@section('title','Beranda')
@section('content')
        <!--Slider Function-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.tp-banner').show().revolution({
            dottedOverlay:"none",
            delay:9000,
            startwidth:1170,
            startheight:925,
            minHeight:500,
            navigationType:"none",
            navigationArrows:"solo",
            navigationStyle:"preview1"
        });
    }); //ready
</script>
<!--End Slider Function-->
<!-- Slide And Filter Section-->
<div class="tp-banner-container">
    <!-- SLIDE  -->
    <div class="tp-banner" >
        <!-- SLIDES CONTENT-->
        <ul>
            <!-- SLIDE  -->
            <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                <!-- MAIN IMAGE -->
                <img src="{{URL::to('assets/1.jpg')}}"  alt="fullslide1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                <!-- LAYERS -->
            </li>

            <!-- SLIDE  -->
            <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                <!-- MAIN IMAGE -->
                <img src="{{URL::to('assets/2.jpg')}}"  alt="fullslide1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                <!-- LAYERS -->
            </li>

            <!-- SLIDE  -->
            <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                <!-- MAIN IMAGE -->
                <img src="{{URL::to('assets/3.jpg')}}"  alt="fullslide1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                <!-- LAYERS -->
            </li>
        </ul>
        <!-- END SLIDES  -->
        <div class="tp-bannertimer"></div>
    </div>
    <!-- SLIDE CONTENT-->

    <!-- FILTER HEADER - TITLE HEADER-->
    <div class="filter-title top-40">
        <!-- Nav Tabs-->
        <ul class="nav nav-tabs" id="myTab">
            <li>
                <a href="#cat1" data-toggle="tab"><i class="fa fa-home"></i> TRAVEL UMROH</a>
            </li>
            <li class="active">
                <a href="#cat2" data-toggle="tab"><i class="fa fa-plane"></i>JADWAL KEBERANGKATAN</a>
            </li>
            <li>
                <a href="#cat3" data-toggle="tab"><i class="fa fa-car"></i> SPESIAL PROMO</a>
            </li>
        </ul>
        <!-- End Nav Tabs-->

        <div class="tab-content">
            <!-- Tab One - Hotel -->
            <div class="tab-pane" id="cat1">
                <!-- FILTER HEADER-->
                <div class="filter-header">
                    <form action="#">
                        <input style="width: 100%; text-align: center;" type="text" required="required" placeholder="Cari Travel Berdasarkan Nama Travel" class="input-large">
                        <input style="width: 100%;" type="submit" value="Search">
                    </form>
                </div>
                <!-- END FILTER HEADER-->
            </div>
            <!-- end Tab One - Hotel -->

            <!-- Tab Two - flights -->
            <div class="tab-pane active" id="cat2">
                <!-- FILTER HEADER-->
                <div class="filter-header flights-filter">
                    <form action="#">
                        <input style="width: 33%;" type="text" required="required" placeholder="Departing On" class="date-input">
                        <input style="width: 33%;" type="text" required="required" placeholder="Arriving On" class="date-input">
                        <div style="width: 34%;" class="selector">
                            <select class="guests-input">
                                <option value="1">xx - xx</option>
                                <option value="2">xx - xx</option>
                                <option value="3">xx - xx</option>
                                <option value="4">xx - xx</option>
                            </select>
                            <span class="custom-select">Rentang Harga</span>
                        </div>
                        <input type="submit" value="Search">
                    </form>
                </div>
                <!-- END FILTER HEADER-->
            </div>
            <!-- Tend ab Two - flights -->

            <!-- Tab Theree - Car -->
            <div class="tab-pane" id="cat3">
                <!-- FILTER HEADER-->
                <div class="filter-header car-filter">
                    <div class="content-boxes">
                        <?php for($i = 0; $i < 2; $i++) { ?>
                                <!-- Item-boxe-->
                        <div class="item-boxed">
                            <div class="image-boxed">
                                <span class="overlay"></span>
                                <img src="{{URL::to('travelia/img/gallery-1/foto.jpg')}}" alt="">
                            </div>
                            <div class="info-boxed boxed-top">
                                <h3>Umrah Exclusive 7 free 1<br>
                                    <span>Rp. 27,25 Jt</span>
                                </h3>
                                <hr class="separator">
                                <ul class="starts">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                                </ul>
                                <div class="content-btn"><a href="hotel-detailed.html" class="btn btn-primary">View Details</a></div>
                            </div>
                        </div>
                        <!-- End Item-boxe-->
                        <?php } ?>
                        <?php for($i = 0; $i < 2; $i++) { ?>
                                <!-- Item-boxe-->
                        <div class="item-boxed">
                            <div class="info-boxed boxed-bottom">
                                <h3>
                                    Akhir Tahun Paket Ekonomis<br>
                                    <span>Rp 21,23 Jt</span>
                                </h3>
                                <hr class="separator">
                                <ul class="starts">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                                </ul>
                                <div class="content-btn"><a href="hotel-detailed.html" class="btn btn-primary">View Details</a></div>
                            </div>
                            <div class="image-boxed image-bottom">
                                <span class="overlay"></span>
                                <img src="{{URL::to('travelia/img/gallery-1/foto.jpg')}}" alt="">
                            </div>
                        </div>
                        <!-- End Item-boxe-->
                        <?php } ?>
                    </div>
                </div>
                <!-- END FILTER HEADER-->
            </div>
            <!-- end Tab Theree - Car -->
        </div>
    </div>
    <!-- END FILTERHEADER - TITLE HEADER -->
</div>
<!-- End Slide And Filter Section-->

@include('clientlayout.top3')

@include('clientlayout.paketmurah')

@include('clientlayout.why')

@stop
@section('custom_foot')

@stop