@extends('layout.general')
@section('title', 'Edit Data Paket')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Paket</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')
                
<!--                 <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Klik untuk kembali ke menu sebelumnya"><i class="fa fa-chevron-circle-left"></i>&nbsp;&nbsp;Kembali</button></a>
                <br>
                <br> -->

                <form action="{{ route('packages.update', ['id' => $item->id]) }}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Paket<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{$item->name}}" type="text" name="name" placeholder="Nama package" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jadwal Keberangkatan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                            <input name="schedule" required type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Tanggal" aria-describedby="inputSuccess2Status">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="description" style="width:100%;" rows="4">{{$item->description}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Rating*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="currency_id" id="">
                                @foreach($currencies as $currency)
                                    <option @if($currency->id == $item->currency_id) selected @endif value="{{ $currency->id }}">{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Kamar Tipe Double<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{$item->price_double}}" type="text" name="price_double" placeholder="harga kamar tipe double" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Kamar Tipe Triple<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{$item->price_triple}}" type="text" name="price_triple" placeholder="harga kamar tipe triple" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Kamar Tipe Quadruple<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{$item->price_quadruple}}" type="text" name="price_quadruple" placeholder="harga kamar tipe triple" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Diskon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{$item->discount}}" type="text" name="discount" placeholder="discount" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat Pas Foto<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="pas_foto_desc" style="width:100%;" rows="4">{{$item->pas_foto_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat KTP<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="ktp_desc" style="width:100%;" rows="4">{{$item->ktp_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat KTP dan KK Asli<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="ktp_kk_asli_desc" style="width:100%;" rows="4">{{$item->ktp_kk_asli_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat Surat Nikah dan KK Asli<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="surat_nikah_kk_asli_desc" style="width:100%;" rows="4">{{$item->surat_nikah_kk_asli_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat Pembayaran Uang Muka<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="uang_muka_desc" style="width:100%;" rows="4">{{$item->uang_muka_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat Pelunasan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="pelunasan_desc" style="width:100%;" rows="4">{{$item->pelunasan_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Syarat Pendaftaran<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="pendaftaran_desc" style="width:100%;" rows="4">{{$item->pendaftaran_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Kartu Kuning<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="kartu_kuning_desc" style="width:100%;" rows="4">{{$item->kartu_kuning_desc}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Persediaan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{$item->stock}}" type="text" name="stock" placeholder="" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Rute*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control"  name="route_id" id="">
                                @foreach($routes as $route)
                                    <option @if($route->id == $item->route_id) selected @endif value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Maskapai*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="airline_id" id="">
                                @foreach($airlines as $airline)
                                    <option @if($airline->id == $item->airline_id) selected @endif value="{{ $airline->id }}">{{ $airline->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Hotel di Mekah*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="hotel_mekkah_id" id="">
                                @foreach($hotels as $hotel)
                                    @if($hotel->city_code == 1)
                                        <option @if($hotel->id == $item->hotel_mekkah_id) selected @endif value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Hotel di Madinah*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="hotel_madinah_id" id="">
                                @foreach($hotels as $hotel)
                                    @if($hotel->city_code == 2)
                                        <option @if($hotel->id == $item->hotel_madinah_id) selected @endif value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop