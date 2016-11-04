@extends('layout.general')
@section('title', 'Detail Paket')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail Paket</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')
                <div class="text-center">
                    <a href="{{ URL::previous() }}" class="btn btn-app">
                        <i class="fa fa-arrow-circle-left"></i> Kembali
                    </a>
                    <a href="{{ route('packages.update', ['id' => $package->id]) }}" class="btn btn-app">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('packages.delete', ['id' => $package->id]) }}" class="btn btn-app">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                </div>

                <ul class="messages">
                    <li>
                        <div class="message_wrapper">
                            <h4 class="heading">Nama Paket</h4>
                            <blockquote class="message">{{$package->name}}</blockquote>
                            <br/>
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Jadwal</h4>
                            <blockquote class="message">{{$package->schedule}}</blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Harga Kamar Double Perorang</h4>
                            <blockquote
                                    class="message">{{ $package->currency->symbol }} {{ $package->price_double}}</blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Harga Kamar Triple Perorang</h4>
                            <blockquote
                                    class="message">{{ $package->currency->symbol }} {{$package->price_triple}}</blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Harga Kamar Quadruple Perorang</h4>
                            <blockquote
                                    class="message">{{ $package->currency->symbol }} {{$package->price_quadruple}}</blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Diskon</h4>
                            <blockquote class="message">{{$package->discount}} %</blockquote>
                            <br/>
                        </div>

                        @if($package->description)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Paket</h4>
                                <blockquote class="message">{{$package->description}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->pas_foto_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Syarat Pas Foto</h4>
                                <blockquote class="message">{{$package->pas_foto_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->ktp_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Syarat KTP</h4>
                                <blockquote class="message">{{$package->ktp_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->ktp_kk_asli_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Syarat KTP dan KK Asli</h4>
                                <blockquote class="message">{{$package->ktp_kk_asli_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->surat_nikah_kk_asli_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Syarat Surat Nikah & KK Asli</h4>
                                <blockquote class="message">{{$package->surat_nikah_kk_asli_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->uang_muka_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Pembayaran Uang Muka</h4>
                                <blockquote class="message">{{$package->uang_muka_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->pelunasan_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Pelunasan</h4>
                                <blockquote class="message">{{$package->pelunasan_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->pendaftaran_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Syarat Pendaftaran</h4>
                                <blockquote class="message">{{$package->pendaftaran_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        @if($package->kartu_kuning_desc)
                            <div class="message_wrapper">
                                <h4 class="heading">Deskripsi Kartu Kuning</h4>
                                <blockquote class="message">{{$package->kartu_kuning_desc}}</blockquote>
                                <br/>
                            </div>
                        @endif

                        <div class="message_wrapper">
                            <h4 class="heading">Persediaan</h4>
                            <blockquote class="message">{{$package->stock}}</blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Rate (jumlah view)</h4>
                            <blockquote class="message">{{$package->time_viewed}}</blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Maskapai</h4>
                            <blockquote class="message">
                                <a href="">
                                    {{$package->airline->name}}
                                </a>
                            </blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Rute</h4>
                            <blockquote class="message">
                                    {{$package->route->name}}
                            </blockquote>
                            <br/>
                        </div>

                        <div class="message_wrapper">
                            <h4 class="heading">Travel Agent</h4>
                            <blockquote class="message">
                                <a href="{{ route('users.detail', ['id'=>$package->user->id]) }}">
                                    {{$package->user->name}}
                                </a>
                            </blockquote>
                            <br/>
                        </div>

                    </li>
                </ul>

            </div>
        </div>
    </div>
@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop