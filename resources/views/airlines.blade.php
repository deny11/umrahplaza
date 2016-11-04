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
        @foreach($airlines as $airline)
            <li> {{ $airline->name }}
                <a href="{{ route('airlines.delete', ['id' => $airline->id]) }}"> delete </a>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('airlines.add') }}">Tambah Maskapai</a>
    </div>

@endsection