@extends('base.base')

@section('title', 'Airlines')

@section('content')
    @if(Session::has('success') || Session::has('fail'))
        <div>
            <div>
                @if(Session::has('success'))
                    <div>
                        <span >{{ Session::get('success') }}</span>
                    </div>
                @endif
                @if(Session::has('fail'))
                    <div>
                        <span>{{ Session::get('fail') }}</span>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <ul>
        @foreach($images as $image)
            <li>
                <img src="{{ route('images.get', ['id' => $image->id]) }}" alt="" width="100px" height="70px">
                <a href="{{ route('images.delete', ['id' => $image->id]) }}"> delete </a>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('images.add') }}">Tambah Gambar</a>
    </div>

@endsection