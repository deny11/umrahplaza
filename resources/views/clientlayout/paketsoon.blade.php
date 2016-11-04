<section class="content_info" >
    <!-- Info Resalt-->
    <div class="padding-bottom">
        <!-- Title -->
        <div class="container">
            <div class="row">
                <div class="titles">
                    <h2>Pilihan Paket <span>Segera Berangkat</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <!-- End Title-->

        <!-- boxes-carousel-->
        <div id="boxes-carousel">
            @foreach($soon as $item)
                    <!-- Item carousel Boxed-->
            <div>
                <div class="img-hover">
                    <img src="{{URL::to('travelia/img/gallery-2/1.jpg')}}" alt="" class="img-responsive">
                    <div class="overlay"><a href="{{URL::to('travelia/img/gallery-2/1.jpg')}}" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                </div>

                <div class="info-gallery">
                    <h3>
                        {{$item->name}}<br>
                        <span>{{$item->schedule}}</span>
                    </h3>
                    <hr class="separator">
                    <p>{{substr($item->description,0,60)}}...</p>
                    <div class="content-btn"><a href="{{URL::to('paket/detail/').'/'.$item->id}}" class="btn btn-primary">View Details</a></div>
                    <div class="price"><span>&nbsp;&nbsp;&nbsp;&nbsp;@if($item->currency_id == 1) Rp @elseif($item->currency_id == 2) $ @endif</span><b>From</b>{{$item->price_double}}</div>
                </div>
            </div>
            <!-- End Item carousel Boxed-->
            @endforeach

        </div>
        <!-- End boxes-carousel-->
    </div>
    <!-- End Info Resalt-->
</section>