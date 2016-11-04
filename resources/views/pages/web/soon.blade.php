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
            <h1>Segera Berangkat</h1>
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
                        <h3>List Paket Umroh yang Berangkat Kurang dari 2 Bulan</a></h3>
                    </div>
                    <!-- End Title Results-->

                    <div class="row">
                        @foreach($items as $item)
                                <!-- Item Gallery-->
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            @if(count($item->images)>0)
                                <div class="img-hover">
                                    <img style="width: 100%; height: 200px;" src="{{URL::to('gambar/get').'/'.$item->images[0]->id}}" alt="" class="img-responsive">
                                    <div class="overlay"><a href="{{URL::to('assets/murah.jpg')}}" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                                </div>
                            @else
                                <div class="img-hover">
                                    <img  style="width: 100%; height: 200px;" src="{{URL::to('assets/murah.jpg')}}" alt="" class="img-responsive">
                                    <div class="overlay"><a href="{{URL::to('assets/murah.jpg')}}" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                                </div>
                            @endif

                            <div class="info-gallery">
                                <h3>
                                    {{$item->name}}<br>
                                    <span>{{$item->schedule}}</span>
                                </h3>
                                <hr class="separator">
                                <p>{{substr($item->description,0,60)}}...</p><br>
                                <div class="content-btn"><a href="{{URL::to('paket/detail/').'/'.$item->id}}" class="btn btn-primary">View Details</a></div>
                                <div class="price"><span>@if($item->currency_id == 1) Rp @elseif($item->currency_id == 2) $ @endif</span><b>From</b>{{$item->price_double}}</div>
                            </div>
                        </div>
                        <!-- End Item Gallery-->
                        @endforeach
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