<section class="content_info" style="background-color: white;">
    <!-- Info Resalt-->
    <div class="padding-bottom">
        <!-- Title -->
        <div class="container">
            <div class="row">
                <div class="titles">
                    <h2>Pilihan Paket <span>Murah</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <!-- End Title-->

        <!-- boxes-carousel-->
        <div id="boxes-carousel">
            @foreach($murah as $item)
                    <!-- Item carousel Boxed-->
            <div>
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
                    <p>{{substr($item->description,0,60)}}...</p>
                    <div class="content-btn"><a href="{{URL::to('paket/detail/').'/'.$item->id}}" class="btn btn-primary">View Details</a></div>
                    <div class="price"><span>&nbsp;&nbsp;&nbsp;&nbsp;@if($item->currency_id == 1) Rp @elseif($item->currency_id == 2) $ @endif</span><b>From</b>@if($item->currency_id == 1)
                            {{number_format($item->price_double,0,',','.') }}
                        @elseif($item->currency_id == 2)
                            {{number_format($item->price_double,2,',','.') }}
                        @endif</div>
                </div>
            </div>
            <!-- End Item carousel Boxed-->
            @endforeach

        </div>
        <!-- End boxes-carousel-->
    </div>
    <!-- End Info Resalt-->
</section>