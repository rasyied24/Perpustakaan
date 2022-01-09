@extends('layouts.admin')
@section('header', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_buku }}</h3>
                    <p>Total Buku</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <a href="{{ url('buku') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_anggota }}</h3>
                    <p>Total Anggota</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="{{ url('anggota') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_penerbit }}</h3>
                    <p>Data penerbit</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book-open"></i>
                </div>
                <a href="{{ url('penerbit') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $peminjaman }}</h3>
                    <p>Data peminjaman</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hand-holding"></i>
                </div>
                <a href="{{ url('peminjaman') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- DONUT CHART -->
        <div class="col-lg-6 col-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Grafik Penerbit</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- jQuery -->
    <script src="{{ asset('asset-admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('asset-admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript">
        var label_donut = '{!! json_encode($label_donut) !!}';
        var data_donut = '{!! json_encode($data_donut) !!}';
        var label_bar = '{!! json_encode($label_bar) !!}';
        var data_bar = '{!! json_encode($data_bar) !!}';

        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: JSON.parse(label_donut),
                datasets: [{
                    data: JSON.parse(data_donut),
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })
        })
        //-------------
        //- BAR CHART -
        //-------------
        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'Desember'
            ],
            datasets: JSON.parse(data_bar),


        }
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    </script>
    <script src="{{ asset('js/data.js') }}"></script>
@endpush
