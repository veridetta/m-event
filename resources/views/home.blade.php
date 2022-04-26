@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="container-fluid">

    <div class="row">
    
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total }}</h3>
                <p>Total Event</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/kegiatan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $selesai }}</h3>
                <p>Event Selesai</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/kegiatan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $jalan }}</h3>
                <p>Event Berjalan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/kegiatan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $tunda }}</h3>
                <p>Event Tertunda</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
                <a href="/kegiatan" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    </div>

    {{-- <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Simple Full Width Table</h3>
        <div class="card-tools">
        <ul class="pagination pagination-sm float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
        </div>
        </div>
        
        <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
        <tr>
        <th>#</th>
        <th>Nama Kegiatan</th>
        <th>Progress</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>1.</td>
        <td>Update software</td>
        <td>
        <div class="progress progress-xs">
        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
        </div>
        </td>
        </tr>
        <tr>
        <td>2.</td>
        <td>Clean database</td>
        <td>
        <div class="progress progress-xs">
        <div class="progress-bar bg-warning" style="width: 70%"></div>
        </div>
        </td>
        </tr>
        <tr>
        <td>3.</td>
        <td>Cron job running</td>
        <td>
        <div class="progress progress-xs progress-striped active">
        <div class="progress-bar bg-primary" style="width: 30%"></div>
        </div>
        </td>
        </tr>
        <tr>
        <td>4.</td>
        <td>Fix and squish bugs</td>
        <td>
        <div class="progress progress-xs progress-striped active">
        <div class="progress-bar bg-success" style="width: 90%"></div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        
        </div>
    </div> --}}

    <div class="container-fluid">
        <!-- Main content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-6">

                        {{-- Grafik peserta per-EO --}}
                        <div class="card">
                            <div id="chartjumlah"></div>
                        </div>
                        {{-- End --}}

                    </div>

                    <div class="col-lg-6">

                        {{-- Grafik kegiatan per-EO --}}
                        <div class="card">
                            <div id = "targetpeserta"></div>
                        </div>
                        {{-- End --}}

                    </div>

                </div>
                <!-- End row -->

            </div>
            <!-- End container-fluid -->

        </div>
        {{-- End --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte.js?v=3.2.0"></script>

    <script src="plugins/chart.js/Chart.min.js"></script>

    <script src="dist/js/demo.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="dist/js/pages/dashboard3.js"></script>

    {{-- Script Chart Peserta Wilayah --}}
    <script>
        Highcharts.chart('chartjumlah', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Jumlah kegiatan per bulan'
        },
        subtitle: {
            // text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Januari',
                'Februari',
                'Maret',
                'April'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Kegiatan'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Bulan',
            data: {!!json_encode($data)!!}

        }]
    });
    </script>

    <script>
        Highcharts.chart('targetpeserta', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Target Peserta per Kegiatan'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Jumlah Peserta'
        }
    }, {
        title: {
            text: 'Target Peserta'
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Target Peserta',
        color: 'rgba(248,161,63,1)',
        data: {!!json_encode($target)!!},
        pointPadding: 0.3,
        pointPlacement: 0.2,
        yAxis: 1
    }, {
        name: 'Jumlah Peserta',
        color: 'rgba(186,60,61,.9)',
        data: [88, 111, 90,55,100,0],
        pointPadding: 0.4,
        pointPlacement: 0.2,
        yAxis: 1
    }]
});
    </script>
    {{-- End --}}
    <footer id="footer">
        <style>
            .footer {
              position: fixed;
              left: 0;
              bottom: 0;
              width: 100%;
              background-color: #f8f9fa;
              color: grey;
              text-align: center;
            }
            </style>
            
            <br>
            <div class="footer">
                <div class="copyright">
                  &copy; Copyright <strong><span>Manajement Event <a href="https://spero.id/">Spero</a></span></strong>. All Rights Reserved
              </div>
            <br>     
    </div>
@stop
