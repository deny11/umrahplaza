@extends('base.base')

@section('title', 'Routes')

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
        @foreach($routes as $route)
            <li> {{ $route->name }}
                <a href="{{ route('routes.delete', ['id' => $route->id]) }}"> delete </a>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('routes.add') }}">Tambah Rute</a>
    </div>

@endsection