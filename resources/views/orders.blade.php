@extends('base.base')

@section('title', 'Pemesanan')

@section('content')
    @if(Session::has('success') || Session::has('fail'))
        <div>
            <div>
                @if(Session::has('success'))
                    <div>
                        <span>{{ Session::get('success') }}</span>
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
        @foreach($orders as $order)
            <li> {{ $order->id }}
                @if($order->status != 1)
                    <a href="{{ route('orders.status', ['order_id' => $order->id, 'status_id' => 1]) }}"> Pending </a>
                @endif
                @if($order->status != 2)
                    <a href="{{ route('orders.status', ['order_id' => $order->id, 'status_id' => 2]) }}"> Reject </a>
                @endif
                @if($order->status != 3)
                    <a href="{{ route('orders.status', ['order_id' => $order->id, 'status_id' => 3]) }}"> Accept </a>
                @endif
                <a href="{{ route('orders.confirm', ['order_id' => $order->id]) }}"> Konfirmasi Pembayaran </a>
            </li>
        @endforeach
    </ul>
@endsection