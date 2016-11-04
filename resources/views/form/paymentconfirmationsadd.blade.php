@extends('base.base')

@section('title', 'Tambah Maskapai')

@section('content')
    <form action="{{ route('paymentConfirmations.create', ['order_id' => $order_id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <select name="currency_id" id="">
            @foreach($currencies as $currency)
                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
            @endforeach
        </select>

        <select name="bank_id" id="">
            @foreach($banks as $bank)
                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
            @endforeach
        </select>

        <div>
            <label for="account_name">Atas Name</label>
            <input type="text" name="account_name" placeholder="">
        </div>

        <div>
            <label for="amount_transfered">Jumlah Transfer</label>
            <input type="text" name="amount_transfered" placeholder="">
        </div>

        <div>
            <button type="submit" name="action">
                Konfirmasi
            </button>
        </div>
    </form>
@endsection