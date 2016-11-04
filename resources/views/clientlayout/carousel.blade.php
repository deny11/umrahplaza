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
<div class="tp-banner-container" style="height: 500px;">
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
        </ul>
        <!-- End Nav Tabs-->

        <div class="tab-content">
            <!-- Tab One - Hotel -->
            <div class="tab-pane" id="cat1">
                <!-- FILTER HEADER-->
                <div class="filter-header">
                    <form method="get" action="{{URL::to('search/nama')}}">
                        <input style="width: 100%; text-align: center;" type="text" required="required" name="name" placeholder="Cari Travel Berdasarkan Nama Travel" class="input-large">
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
                    <form method="get" action="{{URL::to('search/jadwal')}}">
                        <input name="from" style="width: 50%;" type="text" required="required" placeholder="Start" class="date-input">
                        <input name="to" style="width: 50%;" type="text" required="required" placeholder="End" class="date-input">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <!-- END FILTER HEADER-->
            </div>
            <!-- Tend ab Two - flights -->
        </div>
    </div>
    <!-- END FILTERHEADER - TITLE HEADER -->
</div>
<!-- End Slide And Filter Section-->