@extends('layout.general')
@section('title', 'Konfirmasi Pembayaran')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Konfirmasi Pembayaran</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')

                {{--<a href="{{ route('packages.add') }}">--}}
                {{--<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Klik untuk tampilkan menu tambahkan maskapai baru"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button></a>--}}
                <br>
                <br>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center" width="3mm">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Order</th>
                        <th class="text-center">Paket</th>
                        <th class="text-center" width="10mm">Status</th>
                        @if(Auth::user()->role_id==1)
                            <th class="text-center" width="60mm">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($paymentConfirmations as $item)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">{{$i++}}</td>
                            <td class="text-center" style="vertical-align: middle;">{{$item->account_name}}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $item->currency->symbol }}{{$item->amount_transfered}}</td>
                            <td class="text-center" style="vertical-align: middle;">{{$item->order->contact_email}}</td>
                            <td class="text-center" style="vertical-align: middle;"><a href="{{ route('packages.detail', ['id' => $item->order->package->id]) }}">{{$item->order->package->name}}</a></td>

                            <td class="text-center" style="vertical-align: middle;">
                                @if($item->order->status==1)
                                    <a class="btn btn-warning btn-xs">Pending</a>
                                @elseif($item->order->status==2)
                                    <a class="btn btn-danger btn-xs">Ignore</a>
                                @elseif($item->order->status==3)
                                    <a class="btn btn-info btn-xs">DP</a>
                                @elseif($item->order->status==4)
                                    <a class="btn btn-success btn-xs">Accept</a>
                                @elseif($item->order->status==5)
                                    <a class="btn btn-info btn-xs">Transfered</a>
                                @endif

                            </td>
                            @if(Auth::user()->role_id==1)
                                <td class="text-center" style="vertical-align: middle;">
                                    @if($item->order->status!=1)
                                        <a href="{{ route('orders.status', ['order_id'=>$item->order->id, 'status_id'=>1]) }}" class="btn btn-warning btn-xs">Pending</a>
                                    @endif
                                    @if($item->order->status!=2)
                                        <a href="{{ route('orders.status', ['order_id'=>$item->order->id, 'status_id'=>2]) }}" class="btn btn-danger btn-xs">Ignore</a>
                                    @endif
                                    @if($item->order->status!=3)
                                        <a href="{{ route('orders.status', ['order_id'=>$item->order->id, 'status_id'=>3]) }}" class="btn btn-info btn-xs">DP</a>
                                    @endif
                                    @if($item->order->status!=4)
                                        <a href="{{ route('orders.status', ['order_id'=>$item->order->id, 'status_id'=>4]) }}" class="btn btn-success btn-xs">Accept</a>
                                    @endif
                                        @if($item->order->status!=5)
                                            <a href="{{ route('orders.status', ['order_id'=>$item->order->id, 'status_id'=>5]) }}" class="btn btn-info btn-xs">Transfered</a>
                                        @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
@section('custom_foot')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
                keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });
        });
        TableManageButtons.init();
    </script>
@stop