@extends('base.base')

@section('title', 'Daftar Bank')

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
        @foreach($banks as $bank)
            <li> {{ $bank->name }}
                <a href="{{ route('banks.delete', ['id' => $bank->id]) }}"> delete </a>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('banks.add') }}">Tambah Bank</a>
    </div>

@endsection