<!-- End content - Slide Features-->
<div class="content_info">
    <ul id="slide-features">
        <?php for($i = 0; $i < 3; $i++) { ?>
                <!-- Item Slide Features  -->
        <li>
            <!-- content-->
            <div class="container">
                <div class="row">
                    <div class="titles">
                        <h2>Top 3 Paket Bulan {{$i}}<span>Murah</span></h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                    <div class="row list-view">
                        <?php for($j = 0; $j < 3; $j++) { ?>
                                <!-- Item Gallery List View-->
                        <div class="col-md-12">
                            <div class="img-hover">
                                <img src="{{URL::to('travelia/img/hotel-img/1.jpg')}}" alt="" class="img-responsive">
                                <div class="overlay"></div>
                            </div>

                            <div class="info-gallery">
                                <h3>
                                    Hotel Royal National<br>
                                    <span>Gran Londres (Gran Bretaña)</span>
                                </h3>
                                <hr class="separator">
                                <p>The Royal National is in London near Covent Garden and 100 meters from the British Museum.</p>
                                <ul class="starts">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
                                <div class="price"><span>$</span><b>From</b>110</div>
                            </div>
                        </div>
                        <!-- End Item Gallery List View-->
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End content-->
        </li>
        <!-- End Item Slide Features  -->
        <?php } ?>

    </ul>
</div>
<!-- End content - Slide Features-->