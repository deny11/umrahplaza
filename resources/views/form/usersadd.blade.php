@extends('base.base')

@section('title', 'Tambah User')

@section('content')
    <form action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
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

        <div>
            <label for="role_id">Peran</label>
            <select name="role_id" id="">
                <option value="0" disabled selected>Pilih Peran</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->type }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" name="action">
                Tambah User
            </button>
        </div>
    </form>
@endsection