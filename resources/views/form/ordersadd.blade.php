@extends('base.base')

@section('title', 'Pesan paket')

@section('content')
    <form action="{{ route('orders.create', ['package_id' => $package_id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="number_double">Jumlah orang dengan kamar double</label>
            <input type="text" name="number_double" placeholder="">
        </div>

        <div>
            <label for="number_triple">Jumlah orang dengan kamar triple</label>
            <input type="text" name="number_triple" placeholder="">
        </div>

        <div>
            <label for="number_quadruple">Jumlah orang dengan kamar quadrupel</label>
            <input type="text" name="number_quadruple" placeholder="">
        </div>

        <div>
            <label for="contact_name">Nama Pemesan</label>
            <input type="text" name="contact_name" placeholder="">
        </div>

        <div>
            <label for="contact_address">Alamat Pemesan</label>
            <input type="text" name="contact_address" placeholder="">
        </div>

        <div>
            <label for="contact_email">Alamat Email</label>
            <input type="email" name="contact_email" placeholder="">
        </div>

        <div>
            <label for="contact_phone">Nomor HP Pemesan</label>
            <input type="text" name="contact_phone" placeholder="">
        </div>

        <div>
            <button type="submit" name="action">
                Pesan
            </button>
        </div>
    </form>
@endsection