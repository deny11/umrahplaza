@extends('layout.general')
@section('title', 'Edit Data Maskapai')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Data Maskapai</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')
                
<!--                 <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Klik untuk kembali ke menu sebelumnya"><i class="fa fa-chevron-circle-left"></i>&nbsp;&nbsp;Kembali</button></a>
                <br>
                <br> -->

                <form action="{{ route('airlines.update', ['id' => $item->id]) }}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Maskapai<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" placeholder="X Airline" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$item->name}}">
                        </div>
                    </div>

                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rate">Rating</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="rate" id="rate">
                                <option value="" disabled> Pilih Rating </option>
                                <option @if($item->rate == 1) selected @endif value="1"> 1 </option>
                                <option @if($item->rate == 2) selected @endif value="2"> 2 </option>
                                <option @if($item->rate == 3) selected @endif value="3"> 3 </option>
                                <option @if($item->rate == 4) selected @endif value="4"> 4 </option>
                                <option @if($item->rate == 5) selected @endif value="5"> 5 </option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo Maskapai<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img height="100px" src="{{ route('airlines.getImages', ['filename' => $item->logo]) }}" alt="Avatar">
                            <input name="logo" type="file">
                        </div>
                    </div>
                    <br>
                    <br>
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