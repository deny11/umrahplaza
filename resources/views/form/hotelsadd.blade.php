@extends('base.base')

@section('title', 'Tambah Hotel')

@section('content')
    <form action="{{ route('hotels.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Nama Hotel</label>
            <input type="text" name="name" placeholder="nama hotel">
        </div>

        <div>
            <label for="rate">Rating</label>
            <select name="rate" id="rate">
                <option value="" disabled selected> Pilih Rating </option>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
            </select>
        </div>

        <div>
            <label for="rate">Kota</label>
            <select name="city_code" id="rate">
                <option value="" disabled selected> Pilih Kota </option>
                <option value="1"> Mekkah </option>
                <option value="2"> Madinah </option>
            </select>
        </div>

        <div>
            <div>
                <label for="location">Lokasi Hotel</label>
            </div>
            <textarea name="location" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <div>
                <label for="food">Deskripsi Fasilitas Makanan & Minuman</label>
            </div>
            <textarea name="food" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <div>
                <label for="internet">Deskripsi Fasilitas Internet</label>
            </div>
            <textarea name="internet" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <div>
                <label for="distance">Deskripsi Jarak Hotel</label>
            </div>
            <textarea name="distance" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <div>
                <label for="parking_area">Deskripsi Fasilitas Tempat Parkir</label>
            </div>
            <textarea name="parking_area" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <div>
                <label for="public_facility">Deskripsi Fasilitas Publik</label>
            </div>
            <textarea name="public_facility" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <button type="submit" name="action">
                Tambah Maskapai
            </button>
        </div>
    </form>
@endsection