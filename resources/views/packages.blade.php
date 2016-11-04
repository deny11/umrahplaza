@extends('base.base')

@section('title', 'Paket')

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
        @foreach($packages as $package)
            <li> {{ $package->name }}
                <a href="{{ route('packages.delete', ['id' => $package->id]) }}"> delete </a>
                <a href="{{ route('orders.add', ['package_id' => $package->id]) }}"> Pesan </a>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('packages.add') }}">Tambah Paket</a>
    </div>

@endsection