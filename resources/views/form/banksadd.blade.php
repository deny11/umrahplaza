@extends('base.base')

@section('title', 'Tambah Bank')

@section('content')
    <form action="{{ route('banks.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Nama Bank</label>
            <input type="text" name="name" placeholder="nama bank">
        </div>

        <div>
            <button type="submit" name="action">
                Tambah Bank
            </button>
        </div>
    </form>
@endsection