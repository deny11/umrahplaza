@extends('base.base')

@section('title', 'Admin Home')

@section('content')
    <ul>
        <li><a href="{{ route('airlines.show') }}">List Maskapai</a></li>
        <li><a href="{{ route('hotels.show') }}">List Hotel</a></li>
        <li><a href="{{ route('routes.show') }}">List Rute</a></li>
        <li><a href="">List Gambar</a></li>
        <li><a href="{{ route('banks.show') }}">List Bank</a></li>
        <li><a href="{{ route('users.show') }}">List User</a></li>
        <li><a href="">List Paket</a></li>
        <li><a href="{{ route('auth.logout') }}">Logout</a></li>
    </ul>
@endsection