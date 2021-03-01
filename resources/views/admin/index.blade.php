@extends('admin.layouts.app')
@section('content')
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
        
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-8">
                        <!-- <h6>Grafik</h6> -->
                        <div class="card">
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-sm-4">
                        <!-- <h6>Tracer Alumni STMJ</h6> -->
                        <div class="card">
                            <div class="card-header bg-white d-flex justify-content-between" style="align-items: center;">
                                <div>
                                    @if($scrollTahun > 2015)
                                    <a href="?jurusan={{$jurusan}}&tahun={{$scrollTahun-1}}"><i class="fas fa-angle-left"></i></a>
                                    @endif
                                </div>
                                <h5 class="text-center mb-0">{{$scrollTahun}}</h5>
                                <div>
                                    @if($scrollTahun < date('Y'))
                                    <a href="?jurusan={{$jurusan}}&tahun={{$scrollTahun+1}}"><i class="fas fa-angle-right"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <ul class="daftar-list">
                                    <li class="active"><a href="?jurusan=RPL&tahun={{$scrollTahun+1}}">Rekayasa Perangkat Lunak</a></li>
                                    <li><a href="?jurusan=OI&tahun={{$scrollTahun+1}}">Otomasi Industri</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
<!--                     <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            </div>
                        </div>
                    </div> -->
                    <!-- column -->
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent blogss -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent blogss -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2020 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    
@endsection
@section('chart')
<script src="{{asset('assets/plugins/chart/chart.src.js')}}"></script>
<script> 
    Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Data Alumni Tahun'+{!! $scrollTahun !!}
    },
    subtitle: {
        text: '{!! $jurusan !!}'
    },
    //tahun
    xAxis: {
        categories: [
            ''
            ],
        crosshair: false
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Alumni'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Bekerja',
        data: [{!! $profession[0] !!}]

    }, {
        name: 'Kuliah',
        data: [{!! $profession[1] !!}]

    }, {
        name: 'Wirausaha',
        data: [{!! $profession[2] !!}]

    }]
});
</script>
@endsection
@section('css')
<style>   
    .daftar-list{
        padding: 0;
        margin: 0;
    }
    .daftar-list li{
        list-style: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
    .daftar-list .active a{
        background-color: #f2f7f8;
        color: #007bff;
    }
    .daftar-list li a{
        padding: .5rem 1rem;
        display: block;
        color: black;
    }
    .daftar-list li a:hover{
        background-color: rgba(0,0,0,.03);
    }
</style>
@endsection