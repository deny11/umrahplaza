@extends('clientlayout.general')
@section('title','Beranda')
@section('content')

        <!-- Section Title-->
<div class="section-title-01">
    <!-- Parallax Background -->
    <div class="bg_parallax image_04_parallax"></div>
    <!-- Parallax Background -->

    <!-- Content Parallax-->
    <div class="opacy_bg_02">
        <div class="container">
            <h1>Spesial Promo</h1>
            <div class="crumbs">
                <ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Content Parallax-->
</div>
<!-- End Section Title-->

<!--Content Central -->
<div class="content-central">
    <!-- Shadow Semiboxed -->
    <div class="semiboxshadow text-center">
        <img src="{{URL::to('travelia/img/img-theme/shp.png')}}" class="img-responsive" alt="">
    </div>
    <!-- End Shadow Semiboxed -->

    <!-- End content info - page Fill with -->
    <div class="content_info">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <!-- Title Results-->
                    <div class="title-results">
                        <h3>41 Hotels starting at $56 Narrow results or <a href="#">view all</a></h3>
                    </div>
                    <!-- End Title Results-->

                    <div class="row">
                        <?php for($i = 0; $i<9; $i++) { ?>
                                <!-- Item Gallery-->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="img-hover">
                                <img src="{{URL::to('travelia/img/hotel-img/1.jpg')}}" alt="" class="img-responsive">
                                <div class="overlay"><a href="{{URL::to('travelia/img/hotel-img/1.jpg')}}" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                            </div>

                            <div class="info-gallery">
                                <h3>
                                    The Large Everest Mount<br>
                                    <span>HIMALAYA MOUNTAINS</span>
                                </h3>
                                <hr class="separator">
                                <p>The Royal National is in London near Covent Garden and 100 meters.</p>
                                <ul class="starts">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                                </ul>
                                <div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
                                <div class="price"><span>$</span><b>From</b>45</div>
                            </div>
                        </div>
                        <!-- End Item Gallery-->
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-1">
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