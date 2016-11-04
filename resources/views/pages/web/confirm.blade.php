@extends('clientlayout.general')
@section('title','Beranda')
@section('content')

        <!-- Section Title-->
<div class="section-title-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Order Paket Umroh</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Section Title-->
<!--Content Central -->
<div class="content-central">

    <!-- End content info - page Fill with -->
    <div class="content_info">
        <div class="paddings-mini">
            <div class="container">
                <div class="row">
                    <!-- Sidebars -->
                    <div class="col-md-4">
                        <aside>
                            <h4>Informasi Umum Paket Umroh</h4>
                            <address>
                                <strong>{{$package->name}}</strong><br>
                                <i class="fa fa-calendar"></i><strong>{{$package->schedule}}</strong> <br>
                                <i class="fa fa-plane"></i><strong>{{$package->airline->name}} </strong> <br>
                                <i class="fa fa-money"></i> Harga Kamar <span>Double :</span>
                                @if ($package->currency_id == 1)
                                    Rp.
                                @else
                                    $
                                @endif
                                {{number_format($package->price_double, 0 ,',', '.')}}<br>
                                <i class="fa fa-money"></i> Harga Kamar <span>Triple :</span>
                                @if ($package->currency_id == 1)
                                    Rp.
                                @else
                                    $
                                @endif
                                {{ number_format($package->price_triple, 0 ,',', '.')}}<br>
                                <i class="fa fa-money"></i> Harga Kamar <span>Quadruple :</span>
                                @if ($package->currency_id == 1)
                                    Rp.
                                @else
                                    $
                                @endif
                                {{number_format($package->price_quadruple, 0 ,',', '.')}}<br>
                                <i class="fa fa-money"></i> Diskon
                                @if (!$package->is_discount_in_percentage && $package->currency_id == 1)
                                    Rp. {{number_format($package->discount, 0 ,',', '.')}}
                                @elseif (!$package->is_discount_in_percentage && $package->currency_id == 0)
                                    $  {{number_format($package->discount, 0 ,',', '.')}}

                                @else
                                    {{number_format($package->discount, 0 ,',', '.')}} %
                                @endif
                                <br>
                                <i class="fa fa-building-o"></i> Hotel Makkah : {{$package->hotelMekkah->name}}<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php for ($i = 0; $i < $package->hotelMekkah->rate ; $i++) { ?>
                                <i style="color: #ded731;" class="fa fa-star"></i>
                                <?php } ?><br>
                                <i class="fa fa-building-o"></i> Hotel Madinah : {{$package->hotelMadinah->name}}<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php for ($i = 0; $i < $package->hotelMadinah->rate ; $i++) { ?>
                                <i style="color: #ded731;" class="fa fa-star"></i>
                                <?php } ?><br>
                            </address>

                            <address>
                                <strong>Agen Travel</strong><br>
                                <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;{{$package->user->name}}<br>
                                <i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{{$package->user->phone}}<br>
                                <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;{{$package->user->email}}</a>
                            </address>
                        </aside>

                    </div>
                    <!-- End Sidebars -->

                    <div class="col-md-8">
                        <h3>Transfer</h3>
                        <h4>Sisa waktu transfer:
                            @if($timeDiff>0)
                                {{ floor($timeDiff / 60) }} Jam {{ $timeDiff % 60 }} Menit
                            @else
                                Sudah melewati batas transfer.
                            @endif
                        </h4>
                        <div class="form-theme">
                            <div class="col-lg-4 col-xs-12 text-center">
                                Kamar Double
                                <input disabled value="{{$order->number_double}}" class="text-center" type="number"
                                       placeholder="kamar double" name="number_double" min="0" max="2" required="">
                            </div>
                            {!! csrf_field() !!}
                            <div class="col-lg-4 col-xs-12 text-center">
                                Kamar Triple
                                <input disabled value="{{$order->number_triple}}" class="text-center" type="number"
                                       placeholder="kamar triple" name="number_triple" min="0" max="3" required="">
                            </div>
                            <div class="col-lg-4 col-xs-12 text-center">
                                Kamar Quadruple
                                <input disabled value="{{$order->number_quadruple}}" class="text-center" type="number"
                                       placeholder="kamar quadruple" name="number_quadruple" min="0" max="4"
                                       required="">
                            </div>
                            <h1 class="text-center">
                                Total : <br>
                                <?php
                                $numDouble = $order->number_double;
                                $numTriple = $order->number_triple;
                                $numQuadruple = $order->number_quadruple;
                                $total = 0;
                                $totalDiscount = 0;
                                if ($package->is_discount_in_percentage == true) {
                                    $total = ($numDouble * $package->price_double) + ($numTriple * $package->price_triple) + ($numQuadruple * $package->price_quadruple);
                                    $totalDiscount = $total * $package->discout / 100;
                                    $total = $total - $totalDiscount;
                                } else {
                                    $totalDiscount = ($numDouble + $numTriple + $numQuadruple) * $package->discount;
                                    $total = ($numDouble * $package->price_double) + ($numTriple * $package->price_triple) + ($numQuadruple * $package->price_quadruple);
                                    $total = $total - $totalDiscount;
                                }

                                ?>

                                <?php
                                $total = $total + $order->id;
                                $example = $total;
                                $subtotal = number_format($example, 0, ',', '.');
                                if ($package->currency_id == 1) {
                                    echo "Rp. " . $subtotal . ",-";
                                } else {
                                    echo "$ " . number_format($total, 2, ',', '.') . ",-";
                                }

                                ?>
                                {{--{{  $total }},---}}

                            </h1>
                            <form class="form-theme"
                                  action="{{ route('paymentConfirmations.create', ['order_id' => $order->id]) }}"
                                  method="post">
                                {{ csrf_field() }}

                                <input type="text" placeholder="Atas Nama" name="account_name" required="">
                                <div class="col-md-12">
                                    <div class=" col-lg-3">
                                        Mata Uang :
                                    </div>
                                    <div class=" col-lg-9">
                                        <select name="currency_id" id="">
                                            @if($package->currency_id == 1)
                                                <option value="1">Rp</option>
                                            @else
                                                <option value="2">$</option>
                                            @endif
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class=" col-lg-3">
                                        Bank :
                                    </div>
                                    <div class=" col-lg-9">
                                        <select name="bank_id" id="">
                                            @foreach($banks as $bank)

                                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br> <br>
                                <br>
                                <br>

                                <input type="text" placeholder="Nominal" name="amount_transfered" required="">
                                <div class="col-md-12 text-center">
                                    <input type="submit" name="Submit" value="Konfirmasi" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div id="result"></div>
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