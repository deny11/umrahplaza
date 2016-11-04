@extends('base.base')

@section('title', 'Tambah Maskapai')

@section('content')
    <form action="{{ route('airlines.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Nama Maskapai</label>
            <input type="text" name="name" placeholder="nama maskapai">
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
            <div>
                <span>Logo Maskapai</span>
                <input name="logo" type="file">
            </div>
        </div>
        <div>
            <button type="submit" name="action">
                Tambah Maskapai
            </button>
        </div>
    </form>
@endsection