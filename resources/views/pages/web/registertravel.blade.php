@extends('clientlayout.general')
@section('title','Beranda')
@section('content')

        <!-- Section Title-->
<div class="section-title-01">
    <!-- Parallax Background -->
    <div class="bg_parallax image_01_parallax"></div>
    <!-- Parallax Background -->

    <!-- Content Parallax-->
    <div class="opacy_bg_02">
        <div class="container">
            <h1>Register Travel</h1>
        </div>
    </div>
    <!-- End Content Parallax-->
</div>
<!-- End Section Title-->
<div class="content-central">
    <div class="content_info">
        <div class="paddings-mini">
            <div class="container">
                <div class="row">
                    <!-- Sidebars -->
                    <div class="col-md-3">
                    </div>
                    <!-- End Sidebars -->

                    <div class="col-md-6">
                        <p class="lead">
                            Dengan mendaftar menjadi Agen Travel UmrahPlaza, Kami akan membantu anda memasarkan paket umrah anda
                        </p>

                        <form action="{{ route('users.doRegister') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <label class="col-md-4" for="username">Username</label>
                                <input class="col-md-8" type="text" name="username" placeholder="username">
                            </div> <br><br><br>

                            <div>
                                <label class="col-md-4" for="email">Alamat Email</label>
                                <input class="col-md-8" type="email" name="email" placeholder="something@example.com">
                            </div><br><br><br>

                            <div>
                                <label class="col-md-4" for="name">Nama User</label>
                                <input class="col-md-8" type="text" name="name" placeholder="name">
                            </div><br><br><br>

                            <div>
                                <label class="col-md-4" for="password">Password</label>
                                <input class="col-md-8" type="password" name="password">
                            </div><br><br><br>

                            <div>
                                <label class="col-md-4" for="phone">Nomor Telepon</label>
                                <input class="col-md-8" type="text" name="phone">
                            </div><br><br><br>

                            <div>
                                <label class="col-md-4" for="address">Alamat</label>
                                <textarea class="col-md-8" rows="4" name="address"></textarea>
                            </div><br><br><br><br><br>

                            @foreach($roles as $role)
                                @if($role->type == "Travel Agent")
                                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                                @endif
                            @endforeach
                            <p >
                                *Setelah anda melakukan submit register, mohon menunggu hingga Admin memverifikasi akun anda.
                            </p>

                            <div class="col-md-12 text-center">
                                <input type="submit" name="Submit" value="Register" class="btn btn-primary">
                            </div>
                        </form>
                        <div id="result"></div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End content info - page Fill with  -->


@include('clientlayout.why')

@stop
@section('custom_foot')

@stop