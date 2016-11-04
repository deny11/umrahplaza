@extends('base.base')

@section('title', 'Tambah Maskapai')

@section('content')
    <form action="{{ route('images.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Nama Gambar</label>
            <input type="text" name="name" placeholder="nama gambar">
        </div>

        <div>
            <div>
                <span>File Gambar</span>
                <input name="imageFile" type="file">
            </div>
        </div>
        <div>
            <button type="submit" name="action">
                Tambah Gambar
            </button>
        </div>
    </form>
@endsection