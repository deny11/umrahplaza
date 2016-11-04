@extends('layout.general')
@section('title', 'Edit Data User')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data User</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')
                
<!--                 <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Klik untuk kembali ke menu sebelumnya"><i class="fa fa-chevron-circle-left"></i>&nbsp;&nbsp;Kembali</button></a>
                <br>
                <br> -->

                <form action="{{ route('users.update', ['id' => $item->id]) }}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama User<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" placeholder="X Airline" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$item->name}}">
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$item->email}}">
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="password" id="first-name" class="form-control col-md-7 col-xs-12" value="">
                            *jangan diisi bila tidak ingin mengubah
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="phone" placeholder="X Airline" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$item->phone}}">
                        </div>
                    </div>

                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="address" class="form-control" rows="3">{{$item->address}}</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Accepted</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="is_accepted" id="rate">
                                <option @if($item->is_accepted == 0) selected @endif value="0"> Belum </option>
                                <option @if($item->is_accepted == 1) selected @endif value="1"> Sudah </option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Verified</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="is_verified" id="rate">
                                <option @if($item->is_verified == 0) selected @endif value="0"> Belum </option>
                                <option @if($item->is_verified == 1) selected @endif value="1"> Sudah </option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop
@section('custom_foot')
    <script type="text/javascript">
    </script>
@stop