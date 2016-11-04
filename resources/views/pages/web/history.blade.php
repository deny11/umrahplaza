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
            <h1>History Pemesanan Paket Umrah</h1>
            <div class="crumbs">
                <ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Content Parallax-->
</div>
<!-- End Section Title-->

<!--Content Central -->
<div class="content-central">

    <!-- End content info - page Fill with -->
    <div class="content_info">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar-->
                <div class="col-md-3">
                    <div class="container-by-widget-filter bg-dark color-white">
                        <!-- Widget Filter -->
                        <aside class="widget padding-top-mini">
                            <h3 class="title-widget">Search</h3>

                            <!-- FILTER widget-->
                            <div class="filter-widget">
                                <form method="get" action="{{URL::to('search/nama')}}">
                                    <input name="name" type="text" required="required" placeholder="Agen Travel" class="input-large">
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                            <!-- END FILTER widget-->
                            <br>
                            <br>
                            <!-- FILTER widget-->
                            <div class="filter-widget">
                                <form method="get" action="{{URL::to('search/jadwal')}}">
                                    <input name="from" type="text" required="required" placeholder="Start" class="date-input">
                                    <input name="to" type="text" required="required" placeholder="End" class="date-input">
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                            <!-- END FILTER widget-->
                        </aside>
                        <!-- End Widget Filter -->
                    </div>
                </div>
                <!-- End Left Sidebar-->

                <div class="col-md-9">

                    <div class="row list-view" style="margin-top: 30px;">
                        @foreach($items as $item)
                                <!-- Item Gallery List View-->
                        <div class="col-md-12">
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
                                    {{$item->package->name}}<br>
                                    <span>oleh : {{$item->package->user->name}} | {{$item->package->user->email}}</span>
                                </h3>
                                <hr class="separator">
                                <p>{{substr($item->package->description,0,90)}}...<br>
                                    @if($item->currency_id == 1) Rp @elseif($item->currency_id == 2) $ @endif {{$item->price_double}}</p>
                                <div class="content-btn"><a href="{{URL::to('detail/').'/'.$item->id}}" class="btn btn-primary">Konfirmasi Pembayaran</a></div>
                            </div>
                        </div>
                        <!-- End Item Gallery List View-->
                        @endforeach
                                <!-- pagination-->
                        {!! $items->render() !!}
                                <!-- End pagination-->
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