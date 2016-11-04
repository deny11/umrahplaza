@extends('layout.general')
@section('title', 'Detail Hotel')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail Hotel</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')
                <div class="text-center">
                    <a href="{{ route('hotels.show') }}" class="btn btn-app">
                        <i class="fa fa-arrow-circle-left"></i> Kembali
                    </a>
                    <a href="{{ route('hotels.update', ['id' => $item->id]) }}" class="btn btn-app">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('hotels.delete', ['id' => $item->id]) }}" class="btn btn-app">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                </div>

                <ul class="messages">
                    <li>
                        <div class="message_wrapper">
                            <h4 class="heading">Nama Hotel</h4>
                            <blockquote class="message">{{$item->name}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Rating</h4>
                            <blockquote class="message">
                                <?php for ($i=0; $i < $item->rate ; $i++) { ?>
                                    <i style="color: #ded731;" class="fa fa-star"></i>
                                <?php } ?>
                                <?php for ($i=0; $i < 5-$item->rate ; $i++) { ?>
                                    <i class="fa fa-star"></i>
                                <?php } ?>
                            </blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Lokasi Hotel</h4>
                            <blockquote class="message">{{$item->location}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Makanan dan Minuman</h4>
                            <blockquote class="message">{{$item->food}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Internet</h4>
                            <blockquote class="message">{{$item->internet}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Jarak</h4>
                            <blockquote class="message">{{$item->distance}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Tempat Parkir</h4>
                            <blockquote class="message">{{$item->parking_area}}</blockquote>
                            <br />
                        </div>
                        <div class="message_wrapper">
                            <h4 class="heading">Fasilitas Publik</h4>
                            <blockquote class="message">{{$item->public_facility}}</blockquote>
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