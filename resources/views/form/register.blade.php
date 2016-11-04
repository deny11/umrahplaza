@extends('base.base')

@section('title', 'Registrasi')

@section('content')
    <form action="{{ route('users.doRegister') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="username">
        </div>

        <div>
            <label for="email">Alamat Email</label>
            <input type="email" name="email" placeholder="something@example.com">
        </div>

        <div>
            <label for="name">Nama User</label>
            <input type="text" name="name" placeholder="name">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <label for="phone">Nomor Telepon</label>
            <input type="text" name="phone">
        </div>

        <div>
            <label for="address">Alamat</label>
            <input type="text" name="address" placeholder="address">
        </div>

        @foreach($roles as $role)
            @if($role->type == "Customer")
                <input type="hidden" name="role_id" value="{{ $role->id }}">
            @endif
        @endforeach

        <div>
            <button type="submit" name="action">
                Daftar
            </button>
        </div>
    </form>
@endsection