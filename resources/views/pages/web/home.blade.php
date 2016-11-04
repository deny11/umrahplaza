@extends('clientlayout.general')
@section('title','Beranda')
@section('content')
@include('clientlayout.carousel')

{{--@include('clientlayout.top3')--}}

{{--<div class="row">--}}
    {{--@include('clientlayout.paketsoon')--}}
{{--</div>--}}
<div class="row">
    @include('clientlayout.paketmurah')
</div>

@include('clientlayout.why')

@stop
@section('custom_foot')

@stop