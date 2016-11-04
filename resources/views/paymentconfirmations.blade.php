@extends('base.base')

@section('title', 'Konfirmasi Pembayaran')

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
        @foreach($paymentConfirmations as $paymentConfirmation)
            <li> {{ $paymentConfirmation->order->id }}
                <a href="{{ route('orders.add', ['paymentConfirmation_id' => $paymentConfirmation->id]) }}"> Pesan </a>
            </li>
        @endforeach
    </ul>
@endsection