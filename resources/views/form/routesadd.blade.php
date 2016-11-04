@extends('base.base')

@section('title', 'Tambah Rute')

@section('content')
    <form action="{{ route('routes.create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Rute</label>
            <input type="text" name="name" placeholder="rute">
        </div>

        <div>
            <button type="submit" name="action">
                Tambah Maskapai
            </button>
        </div>
    </form>
@endsection