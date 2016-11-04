@extends('layout.general')
@section('title', 'Paket')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="col-md-9">
                    <h2>Report Jumlah Transaksi</h2>
                </div>
                <div class="col-md-3">
                    <form action="" class="form-horizontal form-label-left" method="GET" enctype="multipart/form-data">
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        <div class="col-md-12">
                            <select onchange="this.form.submit()" class="form-control" name="tahun" id="rate">
                                <option value="" disabled selected> Pilih tahun</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('layout.notif')

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <canvas id="mybarChart"></canvas>
                </div>

                <script src="{{URL::to('assets/js/chartjs/chart.min.js')}}"></script>
                <script>
                    var ctx = document.getElementById("mybarChart");
                    var mybarChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Septembet", "Oktober", "Nopember", "Desember"],
                            datasets: [{
                                label: 'Jumlah Transaksi Terjadi',
                                backgroundColor: "#26B99A",
                                data: [
                                    <?php
                                    for($i=1;$i<13;$i++){
                                        echo $items[$i].',';
                                    }
                                    ?>
                                ]
                            }]
                        },

                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>

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