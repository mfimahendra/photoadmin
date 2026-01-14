@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">

    <style>        

    </style>
@endsection

@section('nav-title')
    Menu Financial
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div id="chart_container"></div>
            </div>            
            <div class="col-2">
                <a href="{{ route('financial.accountIndex') }}" class="btn bg-purple btn-md btn-block">
                    <i class="fa-solid fa-coins"></i>
                    Akun Keuangan
                </a>
                <a href="{{ route('financial.jurnalIndex') }}" class="btn bg-green btn-md btn-block">
                    <i class="fa-solid fa-coins"></i>
                    Jurnal Transaksi
                </a>                
                <hr>
                <button class="btn bg-primary btn-md btn-block">
                    <i class="fa-solid fa-book"></i>
                    Buku Besar
                </button>
                <button class="btn bg-info btn-md btn-block">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    Laporan Keuangan
                </button>
                <hr>
                <button class="btn bg-orange btn-md btn-block">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    Laporan Laba Rugi
                </button>
                <button class="btn bg-orange btn-md btn-block">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    Laporan Neraca
                </button>                
            </div>
        </div>            
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>    
    
    <script src="{{ asset('js/highcharts/highcharts.js') }}"></script>
    <script>
        $(document).ready(function() {
            renderChart();
        });        

        $(function() {

            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('#filter_date').daterangepicker();

        });


        function renderChart() {
            Highcharts.chart('chart_container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Financial Account'
                },                
                xAxis: {
                    categories: ['USA', 'China', 'Brazil', 'EU', 'Argentina', 'India'],
                    crosshair: true,
                    accessibility: {
                        description: 'Countries'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '1000 metric tons (MT)'
                    }
                },
                tooltip: {
                    valueSuffix: ' (1000 MT)'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [
                    {
                        name: 'Corn',
                        data: [387749, 280000, 129000, 64300, 54000, 34300]
                    },
                    {
                        name: 'Wheat',
                        data: [45321, 140000, 10000, 140500, 19500, 113500]
                    }
                ]
            });

        }

    </script>
    <!-- Add your JavaScript code here -->
@endsection
