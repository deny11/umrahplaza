@extends('layout.general')
@section('title', 'User')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Kelola Daftar User</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')

                {{--<a href="{{ route('users.add') }}">--}}
                {{--<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Klik untuk tampilkan menu tambahkan maskapai baru"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button></a>--}}
                <br>
                <br>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center" width="3mm">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Accepted / Confirmed</th>
                        <th class="text-center" width="15mm">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($users as $item)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{$i++}}</td>
                        <td class="text-center" style="vertical-align: middle;"><a href="{{ route('users.detail', ['id' => $item->id]) }}">{{$item->name}}</a></td>
                        <td class="text-center" style="vertical-align: middle;">{{$item->email}}</td>
                        <td class="text-center" style="vertical-align: middle;">{{$item->role->type}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            @if($item->role_id == 2)
                                @if($item->is_accepted)
                                    <p>Sudah Dikonfirmasi</p>
                                @else
                                    <p>Belum Dikonfirmasi</p>
                                @endif
                            @else
                                @if($item->is_verified && $item->is_accepted)
                                    <p>Sudah Diverifikasi</p>
                                @else
                                    <p>Belum Diverifikasi</p>
                                @endif
                            @endif
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="{{ route('users.update', ['id' => $item->id]) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                            <button type="button" class="btgon btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$i}}"><span class="glyphicon glyphicon-remove"></span></button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Yakin Ingin Menghapus?</h4>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin menghapus "{{$item->name}}"? <br><br><br> klik "Ok!!" untuk konfirmasi
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="{{ route('users.delete', ['id' => $item->id]) }}">
                                                <button type="button" class="btn btn-primary">Ok!!</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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
        $(document).ready(function() {
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