@extends('layout.general')
@section('title', 'Detail user')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail User</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')
                <div class="text-center">
                    <a href="{{ route('users.show') }}" class="btn btn-app">
                        <i class="fa fa-arrow-circle-left"></i> Kembali
                    </a>
                    <a href="{{ route('users.update', ['id' => $item->id]) }}" class="btn btn-app">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('users.delete', ['id' => $item->id]) }}" class="btn btn-app">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                </div>

                <ul class="messages">
                    <li>
                        <div class="message_wrapper">
                            <h4 class="heading">Nama User</h4>
                            <blockquote class="message">{{$item->name}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Email</h4>
                            <blockquote class="message">{{$item->email}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Telpon</h4>
                            <blockquote class="message">{{$item->phone}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Alamat</h4>
                            <blockquote class="message">{{$item->address}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Accepted</h4>
                            <blockquote class="message">{{$item->is_accepted}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Verified</h4>
                            <blockquote class="message">{{$item->is_verified}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Role</h4>
                            <blockquote class="message">{{$item->role->type}}</blockquote>
                            <br />
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop