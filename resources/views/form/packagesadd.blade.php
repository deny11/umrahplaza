@extends('base.base')

@section('title', 'Tambah Paket')

@section('content')
    <form action="{{ route('packages.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Nama Paket</label>
            <input type="text" name="name" placeholder="nama paket">
        </div>

        <div>
            <label for="schedule">Jadwal</label>
            <input type="date" name="schedule" placeholder="Jadwal">
        </div>

        <select name="currency_id" id="">
            @foreach($currencies as $currency)
                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
            @endforeach
        </select>

        <div>
            <label for="price_double">Harga Kamar Tipe Double</label>
            <input type="text" name="price_double" placeholder="harga kamar tipe double">
        </div>

        <div>
            <label for="price_triple">Harga Kamar Tipe Triple</label>
            <input type="text" name="price_triple" placeholder="harga kamar tipe triple">
        </div>

        <div>
            <label for="price_quadruple">Harga Kamar Tipe Quadruple</label>
            <input type="text" name="price_quadruple" placeholder="harga kamar tipe triple">
        </div>

        <div>
            <label for="discount">Diskon</label>
            <input type="text" name="discount" placeholder="discount"> %
        </div>

        <div>
            <label for="pas_foto_desc">Deskripsi Syarat Pas Foto</label>
            <textarea name="pas_foto_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="ktp_desc">Deskripsi Syarat KTP</label>
            <textarea name="ktp_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="ktp_kk_asli_desc">Deskripsi Syarat KTP dan KK Asli</label>
            <textarea name="ktp_kk_asli_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="surat_nikah_kk_asli_desc">Deskripsi Syarat Surat Nikah dan KK Asli</label>
            <textarea name="surat_nikah_kk_asli_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="uang_muka_desc">Deskripsi Syarat Pembayaran Uang Muka</label>
            <textarea name="uang_muka_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="pelunasan_desc">Deskripsi Syarat Pelunasan</label>
            <textarea name="pelunasan_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="pendaftaran_desc">Deskripsi Syarat Pendaftaran</label>
            <textarea name="pendaftaran_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="kartu_kuning_desc">Deskripsi Kartu Kuning</label>
            <textarea name="kartu_kuning_desc" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="stock">Persediaan</label>
            <input type="text" name="stock" placeholder="">
        </div>

        <div>
            <label for="route_id">Rute</label>
            <select name="route_id" id="">
                @foreach($routes as $route)
                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="airline_id">Maskapai</label>
            <select name="airline_id" id="">
                @foreach($airlines as $airline)
                    <option value="{{ $airline->id }}">{{ $airline->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="hotel_mekkah_id">Hotel di Mekah</label>
            <select name="hotel_mekkah_id" id="">
                @foreach($hotels as $hotel)
                    @if($hotel->city_code == 1)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div>
            <label for="hotel_madinah_id">Hotel di Madinah</label>
            <select name="hotel_madinah_id" id="">
                @foreach($hotels as $hotel)
                    @if($hotel->city_code == 2)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" name="action">
                Tambah Paket
            </button>
        </div>
    </form>
@endsection