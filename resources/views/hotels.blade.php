@extends('base.base')

@section('title', 'Hotels')

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
        @foreach($hotels as $hotel)
            <li> {{ $hotel->name }}
                <a href="{{ route('hotels.delete', ['id' => $hotel->id]) }}"> delete </a>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('hotels.add') }}">Tambah Hotel</a>
    </div>

@endsection