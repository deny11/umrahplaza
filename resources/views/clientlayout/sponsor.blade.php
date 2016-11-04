<div class="content_info">
    <!-- Title -->
    <div class="container">
        <div class="row">
            <div class="titles">
                <h2>Our <span>Sponsors</span></h2>
                <i class="fa fa-plane"></i>
                <hr class="tall">
            </div>
        </div>
    </div>
    <!-- End Title-->

    <!-- content-->
    <div class="container">
        <div class="row padding-bottom">
            <div class="col-md-12">
                <ul id="sponsors" class="tooltip-hover">
                    <?php for($i = 1; $i < 8; $i++) { ?>
                    <li data-toggle="tooltip" title data-original-title="Name Sponsor"> <a href="#"><img src="{{URL::to('travelia/img/sponsors').'/'.$i.'.png'}}" alt="Image"></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- End content-->
</div>