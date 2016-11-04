@extends('base.base')

@section('title', 'Daftar Pengguna')

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
        @foreach($users as $user)
            <li> {{ $user->name }}
                <a href="{{ route('users.delete', ['id' => $user->id]) }}"> delete </a>
                @if($user->is_accepted)
                    [Confirmed]
                @else
                    [Not Confirmed]
                @endif

                @if($user->is_verified)
                    [Verified]
                @else
                    [Not Verified]
                @endif
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('users.add') }}">Tambah User</a>
    </div>

@endsection