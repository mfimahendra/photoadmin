@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
<style>
    .badge-progress {
        font-size: 12px;
        padding: 0.4em 0.8em;
        font-weight: 500;
    }
    
    .table-sm td {
        vertical-align: middle;
    }

    #clients-table tr th{
        font-size: 12px;
        text-align: center;
        /* background: #4285f4;
        color: white; */
    }
    #clients-table tr td{
        font-size: 13px;
    }

    .btn-action {
        margin: 2px;
    }

    .date-filter-container {
        font-size: 12px;
        background: #f8f9fa;
        padding: 15px;
        border-radius: 5px;        
    }

    .stats-card {
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        color: white;
        transition: transform 0.2s;
        min-width: 150px;
        flex: 1;
        margin-right: 10px;
    }

    .stats-card:last-child {
        margin-right: 0;
    }

    .stats-card:hover {
        transform: translateY(-5px);
    }

    .stats-card h3 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .stats-card p {
        margin: 5px 0 0;
        opacity: 0.9;
        font-size: 0.9rem;
    }

    .stats-container {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        gap: 10px;
        padding-bottom: 5px;
    }

    .stats-container::-webkit-scrollbar {
        height: 8px;
    }

    .stats-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .stats-container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .stats-container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .checklist-cell {
        text-align: center;
        vertical-align: middle !important;
    }

    .checklist-cell input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        margin: 0;
        scale: 1.2;
    }

    .checklist-cell input[type="checkbox"]:disabled {
        cursor: not-allowed;
        opacity: 0.5;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="date-filter-container">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">📆 Year</span>
                    </div>
                    <select name="filter_year" id="filter-year" class="form-control select2" style="width: 100px;">                                    
                        @for ($year = date('Y') + 1; $year >= date('Y') - 1; $year--)
                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>            
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row pt-1">
        <div class="col-12">
            <div id="statistic_card_container"></div>
        </div>        
    </div>

    <div class="row pt-1">
        <div class="col-12">
            <div id="chart_container"></div>
        </div>
    </div>

    <!-- Clients Table -->
    <div class="row pt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">🌙 Month</span>
                                </div>
                                <select name="filter_month" id="filter-month" class="form-control select2" style="width: 120px;">
                                    <option value="all">All Months</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ $m == date('n') ? 'selected' : '' }}>{{ DateTime::createFromFormat('!m', $m)->format('F') }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="card-tools">
                                @if(auth()->check() && auth()->user()->role_code === 'admin')
                                    <a href="{{ route('clients.indexForms') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus"></i> Add New Client
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">                                        

                    <div id="table_container">
                        <div class="text-center">
                            <i class="fas fa-spinner fa-spin fa-3x text-primary"></i>
                            <p class="mt-2">Loading data...</p>
                        </div>
                    </div>                    
                </div>
            </div>
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
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/highcharts/highcharts.js') }}"></script>
<script>
    var clients = [];
    var additionals = [];
    var allClients = [];
    var photographers = @json($photographers);
    var cities = @json($cities);
    var services = @json($services);
    var universities = @json($universities);
    var faculties = @json($faculties);
    var additionalsData = @json($additionals);
    var events = @json($events);
    var isPhotographer = {{ auth()->check() && auth()->user()->role_code === 'photographer' ? 'true' : 'false' }};

    $(document).ready(function () {
        $('[data-widget="pushmenu"]').PushMenu('toggle');
        
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4'
        });                

        fetchData();
    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    function applyFilters() {
        fetchData();
    }

    function fetchData() {
        var year = $('#filter-year').val();

        $.ajax({
            type: "GET",
            url: "{{ route('projects.getProjectClients') }}",
            data: {
                year: year
            },
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);
                allClients = response.projects_clients || [];
                additionals = response.additionals || [];
                
                applyLocalFilters();
                updateStatistics();
                populateCityFilter();
                renderChart();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
                console.error('Response:', xhr.responseText);
                toastr.error('Failed to fetch data');
                clients = [];
                renderData();
            }
        });
    }

    function applyLocalFilters() {
        var monthFilter = $('#filter-month').val();

        clients = allClients.filter(function(client) {
            // Only filter by month if it's not "all"
            if (monthFilter && monthFilter !== 'all') {
                var clientMonth = moment(client.event_date).format('MM'); // Returns "01", "02", etc.
                if (clientMonth !== monthFilter) {
                    return false;
                }
            }
            return true;
        });

        renderData();
    }

    function populateCityFilter() {
        var cities = [...new Set(allClients.map(c => c.city))].sort();
        var citySelect = $('#filter-city');
        var currentValue = citySelect.val();
        
        citySelect.find('option:not(:first)').remove();
        cities.forEach(function(city) {
            citySelect.append(new Option(city, city));
        });
        
        citySelect.val(currentValue);
    }

    function updateStatistics() {
        $('#stat-total').text(allClients.length);
        $('#stat-booking').text(allClients.filter(c => c.progress === 'booking').length);
        $('#stat-confirmed').text(allClients.filter(c => c.downpayment_at !== null).length);
        $('#stat-completed').text(allClients.filter(c => c.progress === 'completed').length);
    }

    function renderData(){
        var container = $('#table_container');
        container.empty();
        container.append(
        `<table id="clients-table" class="table table-sm table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th style="width:1%;">No</th>
                    <th style="width:5%;">Progress</th>
                    <th style="width:5%;">Tanggal</th>
                    ` + (!isPhotographer ? '<th style="width:10%;">FG</th>' : '') + `
                    ` + (!isPhotographer ? '<th style="width:1%; color:white; background-color:#e83e8c;">DP</th>' : '') + `                    
                    ` + (!isPhotographer ? '<th style="width:1%; color:white; background-color:#17a2b8;">L</th>' : '') + `
                    ` + (!isPhotographer ? '<th style="width:1%; color:white; background-color:#6f42c1;">AF</th>' : '') + `
                    ` + (!isPhotographer ? '<th style="width:1%; color:white; background-color:#28a745;">AD</th>' : '') + `
                    <th>Nama</th>
                    <th>Jam Sesi</th>
                    <th>Kota</th>
                    <th>Universitas</th>                    
                    <th>Lokasi</th>                    
                    <th>Whatsapp</th>
                    <th>Paket</th>
                    ` + (isPhotographer ? '<th>Link Gdrive</th>' : '') + `
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Progress</th>
                    <th>Tanggal</th>
                    ` + (!isPhotographer ? '<th>FG</th>' : '') + `
                    ` + (!isPhotographer ? '<th>DP</th>' : '') + `                    
                    ` + (!isPhotographer ? '<th>L</th>' : '') + `
                    ` + (!isPhotographer ? '<th>AF</th>' : '') + `
                    ` + (!isPhotographer ? '<th>AD</th>' : '') + `
                    <th>Nama</th>
                    <th>Jam Sesi</th>
                    <th>Kota</th>
                    <th>Universitas</th>                    
                    <th>Lokasi</th>                    
                    <th>Whatsapp</th>
                    <th>Paket</th>
                    ` + (isPhotographer ? '<th>Link Gdrive</th>' : '') + `
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>`);

        // change tfoot to input search

        $('#clients-table tfoot th').each(function () {
            var title = $(this).text();
            if (title === 'Progress') {
                var progress_array = ['WAITING', 'DP', 'LUNAS', 'ALL FILES', 'ALL DONE', 'CANCELLED'];
                var progressOptions = '<option value="">All</option>';

                progress_array.forEach(function(progress) {
                    progressOptions += '<option value="' + progress + '">' + progress + '</option>';
                });
                $(this).html('<select class="form-control form-control-sm select2-filter">' + progressOptions + '</select>');
            } else if (title === 'Kota') {
                var cityOptions = '<option value="">All</option>';
                var uniqueCities = [...new Set(clients.map(c => c.city))].sort();
                uniqueCities.forEach(function(city) {
                    cityOptions += '<option value="' + city + '">' + city + '</option>';
                });
                $(this).html('<select class="form-control form-control-sm select2-filter">' + cityOptions + '</select>');
            } else if (title === 'Universitas') {
                var univOptions = '<option value="">All</option>';
                var uniqueUnivs = [...new Set(clients.map(c => c.university))].sort();
                uniqueUnivs.forEach(function(univ) {
                    univOptions += '<option value="' + univ + '">' + univ + '</option>';
                });
                $(this).html('<select class="form-control form-control-sm select2-filter">' + univOptions + '</select>');
            } else if (title !== 'No' && title !== 'Actions' && title !== 'DP' && title !== 'L' && title !== 'AF' && title !== 'AD') {
                $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');
            } else {
                $(this).html('');
            }
        });

        var tbody = $('#clients-table tbody');

        if (clients && clients.length > 0) {
            clients.forEach(function(data, index) {                            
                var progressBadge = getProgressBadge(data);
                var eventDate = '-';
                if (data.event_date) {
                    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    var date = moment(data.event_date);
                    eventDate = days[date.day()] + ', ' + date.format('DD') + ' ' + months[date.month()];
                }
                var clientAdditionals = additionals.filter(a => a.project_id === data.id);

                var eventSessionTime = '-';
                if (data.event_time && data.service_duration) {
                    var startTime = moment(data.event_time, 'HH:mm');
                    var duration = parseFloat(data.service_duration);
                    var hours = Math.floor(duration);
                    var minutes = Math.round((duration - hours) * 60);
                    var endTime = startTime.clone().add(hours, 'hours').add(minutes, 'minutes');
                    eventSessionTime = startTime.format('HH:mm') + ' - ' + endTime.format('HH:mm');
                } else if (data.event_time) {
                    eventSessionTime = data.event_time;
                }
                
                // Generate photographer cell
                var photographerCell = '';
                if (data.photographer_id) {
                    // Find photographer name
                    var photographer = photographers.find(p => p.id == data.photographer_id);
                    var photographerName = photographer ? (photographer.username + '<br><small class="text-muted">' + (photographer.domicile || '') + '</small>') : 'Unknown';
                    var photographerPhone = photographer ? photographer.phone : '';
                    var whatsappLink = photographerPhone ? ' <a href="https://wa.me/' + photographerPhone + '" target="_blank" style="color: #25d366; text-decoration: none; font-size: 0.85em;">[WhatsApp]</a>' : '';

                    photographerCell = '<td class="photographer-cell" data-client-id="' + data.id + '" data-photographer-id="' + data.photographer_id + '">' +
                        '<span class="photographer-display">' + photographerName + ' <a href="javascript:void(0)" class="photographer-edit-link" style="color: #007bff; text-decoration: none; font-size: 0.85em;">[Edit]</a>' + whatsappLink + '</span>' +
                        '<span class="photographer-edit-mode" style="display: none;"></span>' +
                        '</td>';
                } else {
                    // Build select options
                    var photographerOptions = '<option value="">- Select -</option>';
                    photographers.forEach(function(photographer) {
                        photographerOptions += '<option value="' + photographer.id + '">' + (photographer.domicile || '') + ' - ' + photographer.username + '</option>';
                    });
                    photographerCell = '<td class="photographer-cell" data-client-id="' + data.id + '">' +
                        '<select class="form-control form-control-sm select2-photographer" data-client-id="' + data.id + '" style="width: 100%;">' + photographerOptions + '</select>' +
                        '</td>';
                }

                var row = '<tr' + (!data.photographer_id ? ' style="background-color: #fff3cd;"' : '') + '>' +
                    '<td style="text-align:center;">' + (index + 1) + '</td>' +
                    '<td>' + progressBadge + '</td>' +
                    '<td style="white-space: nowrap; text-align:right;">' + eventDate + '</td>' +
                    (!isPhotographer ? photographerCell : '') +

                    // checklist to update DP, L, AF, AD status (DP, L hidden for photographers)                    
                    (!isPhotographer ? '<td class="checklist-cell"><input type="checkbox" class="checklist-dp" data-client-id="' + data.id + '" data-field="downpayment_at" ' + (data.downpayment_at ? 'checked' : '') + '></td>' : '') +                    
                    (!isPhotographer ? '<td class="checklist-cell"><input type="checkbox" class="checklist-l" data-client-id="' + data.id + '" data-field="paid_at" ' + (data.paid_at ? 'checked' : '') + '></td>' : '') +
                    (!isPhotographer ? '<td class="checklist-cell"><input type="checkbox" class="checklist-af" data-client-id="' + data.id + '" data-field="all_filled_at" ' + (data.all_filled_at ? 'checked' : '') + '></td>' : '') +
                    (!isPhotographer ? '<td class="checklist-cell"><input type="checkbox" class="checklist-ad" data-client-id="' + data.id + '" data-field="all_done_at" ' + (data.all_done_at ? 'checked' : '') + '></td>' : '') +

                    
                    '<td><strong>' + (data.client_name || '-') + '</strong><br><small class="text-muted">' + (data.client_shortname || '') + '</small></td>' +
                    '<td>' + eventSessionTime + '</td>' +
                    '<td>' + (data.city || '-') + '</td>' +                    
                    '<td>' + (data.university || '-') + '<br><small class="text-muted">' + (data.faculty || '') + '</small></td>' +
                    '<td>' + (data.location || '-') + '</td>' +                    
                    '<td><a href="https://wa.me/' + (data.client_phone ? (data.client_phone.startsWith('0') ? '62' + data.client_phone.substring(1) : data.client_phone) : '') + '?text=' + encodeURIComponent('Halo kak ' + (data.client_shortname || data.client_name) + ' \n\n') + '" target="_blank"><i class="fab fa-whatsapp text-success"></i> ' + (data.client_phone || '-') + '</a></td>' +
                    // '<td>' + (data.service_package || '-') + (clientAdditionals.length > 0 ? '<br><small class="text-muted">' + clientAdditionals.map(a => a.description).join(', ') + '</small>' : '') + '</td>' +
                    '<td>' + (data.service_package || '-') + (data.is_upgraded == 1 ? ' <span class="badge badge-success badge-sm">Upgraded</span>' : '') + (clientAdditionals.length > 0 ? '<br><small class="text-muted">' + clientAdditionals.map(a => a.description).join(', ') + '</small>' : '') + '</td>' +
                    (isPhotographer ? '<td>' + (data.link ? '<a href="' + data.link + '" target="_blank"><i class="fas fa-folder-open"></i> ' + (data.link || '-') + '</a>' : '-') + '</td>' : '') +
                    '<td style="display: flex; gap: 5px; flex-wrap: wrap; align-items: center;">' +
                        '<button style="width: 30px; height:30px;" class="btn btn-secondary btn-xs btn-action" onclick="viewDetails(' + data.id + ')" title="View Details"><i class="fas fa-eye"></i></button> ' +                        
                        (!isPhotographer ? '<button style="width: 30px; height:30px;" class="btn btn-secondary btn-xs btn-action" onclick="copyClientProgress(' + data.id + ')" title="ClientProgress"><i class="fas fa-user"></i></button> ' : '') +
                        (!isPhotographer ? '<button style="width: 30px; height:30px;" class="btn btn-secondary btn-xs btn-action" onclick="editData(' + data.id + ')" title="Edit"><i class="fas fa-edit"></i></button> ' : '') +
                        (!isPhotographer ? '<button style="width: 30px; height:30px;" class="btn btn-secondary btn-xs btn-action" onclick="deleteData(' + data.id + ')" title="Cancel"><i class="fas fa-xmark"></i></button> ' : '') +

                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        } else {
            tbody.append('<tr><td colspan="' + (isPhotographer ? '18' : '17') + '" class="text-center"><i class="fas fa-inbox"></i> No clients found</td></tr>');
        }

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#clients-table')) {
            $('#clients-table').DataTable().destroy();
        }

        // Only initialize DataTable if there's data
        if (clients && clients.length > 0) {
            var clients_table = $('#clients-table').DataTable({
                responsive: true,
                autoWidth: false,
                order: [[2, 'desc']],
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn-sm',
                    title: 'Clients List - ' + moment().format('DD MMM YYYY')
                },
                {
                    extend: 'pdf',
                    className: 'btn-sm',
                    title: 'Clients List',
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    className: 'btn-sm'
                }
            ],
            language: {
                search: "",
                searchPlaceholder: "Search clients..."
            },
            dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6 text-right"f>>rtip'
        });
        
            clients_table.buttons().container().appendTo('#clients-table_wrapper .col-md-6:eq(0)');

            // apply search columns
            clients_table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

            // move tfoot to thead
            $('#clients-table tfoot tr').appendTo('#clients-table thead');

            // Initialize select2 for photographer dropdowns
            $('.select2-photographer').select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: '- Select -',
                dropdownAutoWidth: true,
                dropdownParent: $('body')
            });
        } else {
            // If no data, just remove the tfoot to avoid duplicate headers
            $('#clients-table tfoot').remove();
        }
    }

    function getProgressBadge(data) {        
        // status based on downpayment_at, paid_at, all_filed_at, all_done_at not based on data.progress
        
        let paid_at = data.paid_at;
        let all_filled_at = data.all_filled_at;
        let all_done_at = data.all_done_at;
        let cancelled_at = data.cancelled_at;


        if(cancelled_at) {
            return '<span class="badge badge-progress badge-danger"><i class="fas fa-times-circle"></i> CANCELLED <br><small>' + moment(cancelled_at).format('DD MMM YYYY HH:mm') + '</small></span>';
        } else if(all_done_at) {
            return '<span class="badge badge-progress badge-success"><i class="fas fa-check-circle"></i> ALL DONE <br><small>' + moment(all_done_at).format('DD MMM YYYY HH:mm') + '</small></span>';
        } else if(all_filled_at) {
            return '<span class="badge badge-progress bg-purple"><i class="fas fa-folder-open"></i> ALL FILES <br><small>' + moment(all_filled_at).format('DD MMM YYYY HH:mm') + '</small></span>';
        } else if(paid_at) {
            return '<span class="badge badge-progress badge-info"><i class="fas fa-check"></i> LUNAS <br><small>' + moment(paid_at).format('DD MMM YYYY HH:mm') + '</small></span>';
        } else if(data.downpayment_at) {
            return '<span class="badge badge-progress bg-pink"><i class="fas fa-dollar-sign"></i> DP <br><small>' + moment(data.downpayment_at).format('DD MMM YYYY HH:mm') + '</small></span>';
        } else {
            return '<span class="badge badge-progress badge-secondary"><i class="fas fa-hourglass-half"></i> WAITING </span>';
        }

        // var badges = {
        //     'CANCELLED': '<span class="badge badge-progress badge-danger"><i class="fas fa-times-circle"></i> CANCELLED</span>',
        //     'WAITING': '<span class="badge badge-progress badge-secondary"><i class="fas fa-hourglass-half"></i> WAITING</span>',
        //     'INVOICE': '<span class="badge badge-progress badge-warning"><i class="fas fa-file-invoice"></i> INVOICE</span>',
        //     'LUNAS': '<span class="badge badge-progress badge-info"><i class="fas fa-check"></i> LUNAS</span>',
        //     'ALL FILES': '<span class="badge badge-progress badge-primary"><i class="fas fa-folder-open"></i> ALL FILES</span>',
        //     'ALL DONE': '<span class="badge badge-progress badge-success"><i class="fas fa-check-circle"></i> ALL DONE</span>',
        // };
        // return badges[progress] || '<span class="badge badge-secondary">' + progress + '</span>';
    }

    function viewDetails(clientId) {
        var client = clients.find(c => c.id === clientId);
        if (!client) {
            toastr.error('Client not found');
            return;
        }

        var clientAdditionals = additionals.filter(a => a.project_id === clientId);
        var additionalsHtml = '';
        if (clientAdditionals.length > 0) {
            additionalsHtml = '<h6 class="mt-3">Additional Services:</h6><ul>';
            clientAdditionals.forEach(function(addon) {
                additionalsHtml += '<li>' + addon.description + ' - Rp ' + numberWithDotsSplit3(addon.price) + '</li>';
            });
            additionalsHtml += '</ul>';
        }

        var eventSessionTime = '-';
        if (client.event_time && client.service_duration) {
            var startTime = moment(client.event_time, 'HH:mm');
            var duration = parseFloat(client.service_duration);
            var hours = Math.floor(duration);
            var minutes = Math.round((duration - hours) * 60);
            var endTime = startTime.clone().add(hours, 'hours').add(minutes, 'minutes');
            eventSessionTime = startTime.format('HH:mm') + ' - ' + endTime.format('HH:mm');
        } else if (client.event_time) {
            eventSessionTime = client.event_time;
        }

        // Get drive_link directly from client
        var driveLink = client.link || '';

        var modalHtml = `
            <div class="modal fade" id="detailModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><i class="fas fa-user"></i> Client Details</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>👤 Personal Information</h6>
                                    <table class="table table-sm">
                                        <tr><td><strong>Name:</strong></td><td>${client.client_name}</td></tr>
                                        <tr><td><strong>Phone:</strong></td><td><a href="https://wa.me/${client.client_phone}" target="_blank">${client.client_phone}</a></td></tr>                                        
                                        <tr><td><strong>Instagram:</strong></td><td>${client.client_instagram || '-'}</td></tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h6> 📅 Event Details</h6>
                                    <table class="table table-sm">
                                        <tr><td><strong>Date:</strong></td><td>${moment(client.event_date).format('DD MMMM YYYY')}</td></tr>                                        
                                        <tr><td><strong>Session:</strong></td><td>${eventSessionTime}</td></tr>
                                        <tr><td><strong>City:</strong></td><td>${client.city}</td></tr>
                                        <tr><td><strong>University:</strong></td><td>${client.university}</td></tr>
                                        <tr><td><strong>Faculty:</strong></td><td>${client.faculty || '-'}</td></tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <h6>📷 Paket</h6>
                            <div class="row">
                                <div class="col-md-7">
                                    <p><strong>${client.service_package}</strong> - ${client.service_duration} jam<br>
                                    Price: Rp ${numberWithDotsSplit3(client.service_price)}</p>
                                    ${additionalsHtml}
                                </div>
                                <div class="col-md-5" style="border-left: 2px solid #dee2e6; padding-left: 20px;">
                                    <p class="mb-1"><strong>Total Price</strong></p>
                                    <h4 class="text-primary mb-0"><strong>Rp ${numberWithDotsSplit3(parseInt(client.service_price) + clientAdditionals.reduce((sum, addon) => sum + parseInt(addon.price), 0))}</strong></h4>

                                    <p class="mb-1 mt-3"><strong>Invoice</strong></p>
                                    ${client.client_shortname ? 
                                        '<a href="{{ url("") }}/' + client.event_date + '/' + client.client_shortname + '/invoice" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-file-invoice"></i> Open Invoice</a>' 
                                        : '<button class="btn btn-sm btn-secondary" disabled title="Nickname required for invoice"><i class="fas fa-file-invoice"></i> No Nickname</button>'}
                                </div>
                            </div>
                            ${client.notes ? '<hr><h6>📝 Notes</h6><p>' + client.notes + '</p>' : ''}
                            <hr>
                            <p><strong>Status:</strong> ${getProgressBadge(client)}</p>
                            <div class="timeline">
                                <!-- DP -->
                                <div>
                                    <i class="fas ${client.downpayment_at ? 'fa-check-circle bg-success' : 'fa-circle bg-secondary'}"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ${client.downpayment_at ? moment(client.downpayment_at).format('DD MMM YYYY HH:mm') : 'Not yet paid'}</span>
                                        <h3 class="timeline-header no-border">${client.downpayment_at ? '<span class="badge badge-success">DP Paid</span>' : '<span class="badge badge-secondary">DP Pending</span>'}</h3>
                                    </div>
                                </div>
                                <!-- Lunas -->
                                <div>
                                    <i class="fas ${client.paid_at ? 'fa-check bg-info' : 'fa-circle bg-secondary'}"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ${client.paid_at ? moment(client.paid_at).format('DD MMM YYYY HH:mm') : 'Not yet paid'}</span>
                                        <h3 class="timeline-header no-border">${client.paid_at ? '<span class="badge badge-info">Lunas</span>' : '<span class="badge badge-secondary">Payment Pending</span>'}</h3>
                                    </div>
                                </div>
                                <!-- All Files -->
                                <div>
                                    <i class="fas ${client.all_filled_at ? 'fa-folder-open bg-primary' : 'fa-circle bg-secondary'}"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ${client.all_filled_at ? moment(client.all_filled_at).format('DD MMM YYYY HH:mm') : 'Not yet completed'}</span>
                                        <h3 class="timeline-header no-border">${client.all_filled_at ? '<span class="badge badge-primary">All Files Ready</span>' : '<span class="badge badge-secondary">Files Pending</span>'}</h3>
                                        <div class="timeline-body">                                            
                                            <div class="form-group">
                                                <label for="drive_link">Google Drive Link:</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="drive_link_${client.id}" value="${driveLink}" placeholder="Enter Google Drive link">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button" onclick="savedriveLink(${client.id})">
                                                            <i class="fas fa-save"></i> Save
                                                        </button>
                                                    </div>
                                                </div>
                                                <small class="form-text text-muted">Leave empty to clear the link</small>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="photo_list">Photo Edit List:</label>
                                                <textarea class="form-control form-control-sm" id="photo_list_${client.id}" rows="4" readonly>${client.photo_list ? JSON.parse(client.photo_list).join('\n') : 'No photos'}</textarea>
                                                <small class="form-text text-muted">List of photos to be edited</small>
                                            </div>

                                            ${driveLink ? '<p><a href="' + driveLink + '" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-google-drive"></i> Open Files</a></p>' : ''}                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- All Done -->
                                <div>
                                    <i class="fas ${client.all_done_at ? 'fa-check-circle bg-success' : 'fa-circle bg-secondary'}"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ${client.all_done_at ? moment(client.all_done_at).format('DD MMM YYYY HH:mm') : 'Not yet completed'}</span>
                                        <h3 class="timeline-header no-border">${client.all_done_at ? '<span class="badge badge-success">All Done</span>' : '<span class="badge badge-secondary">Not Completed</span>'}</h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('body').append(modalHtml);
        $('#detailModal').modal('show');
        $('#detailModal').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }

    function editData(clientId) {
        var client = clients.find(c => c.id === clientId);
        if (!client) {
            toastr.error('Client not found');
            return;
        }

        // Build city options
        var cityOptions = '';
        cities.forEach(function(city) {
            var selected = city === client.city ? 'selected' : '';
            cityOptions += '<option value="' + city + '" ' + selected + '>' + city + '</option>';
        });

        // Build university options based on selected city
        var universityOptions = '<option value=""></option>';
        var filteredUniversities = universities.filter(u => u.city === client.city);
        var universityExists = filteredUniversities.some(u => u.university === client.university);
        
        // If current university doesn't exist in filtered list, add it first
        if (client.university && !universityExists) {
            universityOptions += '<option value="' + client.university + '" selected>' + client.university + '</option>';
        }
        
        filteredUniversities.forEach(function(university) {
            var selected = university.university === client.university ? 'selected' : '';
            universityOptions += '<option value="' + university.university + '" ' + selected + '>' + university.university + '</option>';
        });

        // Build faculty options
        var facultyOptions = '<option value=""></option>';
        var facultyExists = faculties.some(f => f.faculty === client.faculty);
        
        // If current faculty doesn't exist in list, add it first
        if (client.faculty && !facultyExists) {
            facultyOptions += '<option value="' + client.faculty + '" selected>' + client.faculty + '</option>';
        }
        
        faculties.forEach(function(faculty) {
            var selected = faculty.faculty === client.faculty ? 'selected' : '';
            facultyOptions += '<option value="' + faculty.faculty + '" ' + selected + '>' + faculty.faculty + '</option>';
        });

        // Build service options based on selected city
        var serviceOptions = '<option value=""></option>';
        var filteredServices = services.filter(s => s.city === client.city);
        filteredServices.forEach(function(service) {
            var selected = service.id == client.service_id ? 'selected' : '';
            serviceOptions += '<option value="' + service.id + '" ' + selected + '>' + service.package + ' - ' + service.duration + ' jam | Rp ' + numberWithDotsSplit3(service.price) + '</option>';
        });

        // Build additional options based on selected city
        var clientAdditionals = additionals.filter(a => a.project_id === clientId);
        var clientAdditionalIds = clientAdditionals.map(a => a.additional_id);
        var additionalOptions = '<option value=""></option>';
        var filteredAdditionals = additionalsData.filter(a => a.city === client.city);
        filteredAdditionals.forEach(function(addon) {
            var selected = clientAdditionalIds.includes(addon.id) ? 'selected' : '';
            additionalOptions += '<option value="' + addon.id + '" ' + selected + '>' + addon.package + ' - Rp ' + numberWithDotsSplit3(addon.price) + '</option>';
        });

        // Build event options from m_events
        var eventOptions = '<option value=""></option>';
        events.forEach(function(event) {
            var selected = event.event === client.event_type ? 'selected' : '';
            eventOptions += '<option value="' + event.event + '" ' + selected + '>' + event.event + '</option>';
        });

        var modalHtml = `
            <div class="modal fade" id="editModal" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Client</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="editClientForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="client_id" value="${client.id}">
                            <input type="hidden" name="service_package" value="${client.service_id || ''}">
                            
                            <div class="modal-body">
                                <table class="table table-sm table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%; background-color: #f8f9fa;"><strong>Nama Lengkap</strong> <span class="text-danger">*</span></td>
                                            <td><input type="text" class="form-control form-control-sm" name="client_name" value="${client.client_name || ''}" required></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Panggilan</strong></td>
                                            <td><input type="text" class="form-control form-control-sm" name="nickname" value="${client.client_shortname || ''}"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>No. WhatsApp</strong> <span class="text-danger">*</span></td>
                                            <td><input type="tel" class="form-control form-control-sm" name="phone" value="${client.client_phone || ''}" required></td>
                                        </tr>                                        
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Instagram</strong></td>
                                            <td><input type="text" class="form-control form-control-sm" name="instagram" value="${client.client_instagram || ''}"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Kota</strong> <span class="text-danger">*</span></td>
                                            <td>
                                                <select class="form-control form-control-sm select2-edit" name="city" required>
                                                    ${cityOptions}
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Universitas</strong> <span class="text-danger">*</span></td>
                                            <td>
                                                <select class="form-control form-control-sm select2-edit" name="university" required>
                                                    ${universityOptions}
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Fakultas</strong></td>
                                            <td>
                                                <select class="form-control form-control-sm select2-edit" name="faculty">
                                                    ${facultyOptions}
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Tanggal Event</strong> <span class="text-danger">*</span></td>
                                            <td><input type="date" class="form-control form-control-sm" name="event_date" value="${client.event_date || ''}" required></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Jam Mulai Sesi</strong></td>
                                            <td><input type="time" class="form-control form-control-sm" name="event_time" value="${client.event_time || ''}"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Event</strong></td>
                                            <td>
                                                <select class="form-control form-control-sm select2-edit" name="event_type" id="edit_event_type">
                                                    ${eventOptions}
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Lokasi Foto</strong></td>
                                            <td><input type="text" class="form-control form-control-sm" name="location" value="${client.location || ''}"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Paket</strong> <span class="text-danger">*</span></td>
                                            <td>
                                                <select class="form-control form-control-sm select2-edit" id="edit_service_package" name="service_package" required>
                                                    ${serviceOptions}
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Add On</strong></td>
                                            <td>
                                                <select class="form-control form-control-sm select2-edit" id="edit_additional" name="additional" multiple>
                                                    ${additionalOptions}
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #f8f9fa;"><strong>Catatan Tambahan</strong></td>
                                            <td><textarea class="form-control form-control-sm" name="notes" rows="3">${client.notes || ''}</textarea></td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm" id="saveEditBtn">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        `;

        $('body').append(modalHtml);
        $('#editModal').modal('show');
            

        $('.select2-edit').each((_i, e) => {
          var e = $(e);
          e.select2({
            tags: true,
            allowClear: true,
            theme: 'bootstrap4',
            dropdownParent: e.parent()
          });
        });

        // Set selected values for multi-select add-ons after Select2 initialization
        if (clientAdditionalIds.length > 0) {
            $('#edit_additional').val(clientAdditionalIds).trigger('change');
        }

        // Event listener for city change to populate universities and services
        $('#editModal').on('change', 'select[name="city"]', function() {
            var selectedCity = $(this).val();

            // Filter and populate universities
            var filteredUniversities = universities.filter(u => u.city === selectedCity);
            var universitySelect = $('select[name="university"]');
            universitySelect.empty().append('<option value=""></option>');
            filteredUniversities.forEach(function(university) {
                universitySelect.append($('<option></option>').val(university.university).text(university.university));
            });
            universitySelect.val('').trigger('change');

            // Filter and populate services
            var filteredServices = services.filter(s => s.city === selectedCity);
            var serviceSelect = $('#edit_service_package');
            serviceSelect.empty().append('<option value=""></option>');
            filteredServices.forEach(function(service) {
                serviceSelect.append($('<option></option>').val(service.id).text(service.package + ' - ' + service.duration + ' jam | Rp ' + numberWithDotsSplit3(service.price)));
            });
            serviceSelect.val('').trigger('change');

            // Filter and populate Add On
            var filteredAdditionals = additionalsData.filter(a => a.city === selectedCity);
            var additionalSelect = $('#edit_additional');
            additionalSelect.empty().append('<option value=""></option>');
            filteredAdditionals.forEach(function(addon) {
                additionalSelect.append($('<option></option>').val(addon.id).text(addon.package + ' - Rp ' + numberWithDotsSplit3(addon.price)));
            });
            additionalSelect.val(null).trigger('change');
        });
        
        // Handle form submission
        $('#editClientForm').on('submit', function(e) {
            e.preventDefault();
            
            var saveBtn = $('#saveEditBtn');

            // do checking if admin changing the service package show confirmation modal about changing service package
            const originalServicePackage = $('#edit_service_package').data('original');
            const newServicePackage = $('#edit_service_package').val();
            if (originalServicePackage !== newServicePackage) {
                if (!confirm('Are you sure you want to change the service package? This action may affect the project details.')) {
                    saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save Changes');
                    return;
                }
            }
            
            saveBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            
            // Temporarily disable the additional field before creating FormData
            const additionalSelect = $('#edit_additional');
            const additionalValues = additionalSelect.val();
            
            // Disable the select so it's not included in FormData
            additionalSelect.prop('disabled', true);            
            
            const formData = new FormData(this);
            
            // Re-enable the select
            additionalSelect.prop('disabled', false);
            
            // Add the comma-separated values
            if (additionalValues && additionalValues.length > 0) {
                formData.append('additional', additionalValues.join(','));
            }
            
            $.ajax({
                url: "{{ route('projects.update', ['id' => ':id']) }}".replace(':id', clientId),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        if (typeof success_audio !== 'undefined') {
                            success_audio.play();
                        }
                        $('#editModal').modal('hide');
                        fetchData(); // Reload data
                    } else {
                        toastr.error(response.message || 'Failed to update client');
                        if (typeof error_audio !== 'undefined') {
                            error_audio.play();
                        }
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Error updating client: ' + (xhr.responseJSON?.message || error));
                    if (typeof error_audio !== 'undefined') {
                        error_audio.play();
                    }
                },
                complete: function() {
                    saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save Changes');
                }
            });
        });
        
        $('#editModal').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }

    function deleteData(clientId) {
        if (confirm('Are you sure you want to delete this client? This action cannot be undone.')) {
            $.ajax({
                url: "{{ route('projects.delete', ['id' => ':id']) }}".replace(':id', clientId),
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success('Client deleted successfully');
                    if (typeof success_audio !== 'undefined') {
                        success_audio.play();
                    }
                    fetchData();
                },
                error: function(xhr, status, error) {
                    toastr.error('Error deleting client');
                    if (typeof error_audio !== 'undefined') {
                        error_audio.play();
                    }
                }
            });
        }
    }

    function numberWithDotsSplit3(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Apply filters when city or progress changes
    // Note: These filters are removed from the main UI but kept for DataTable column filters
    $(document).on('change', '#filter-city, #filter-progress', function() {
        applyLocalFilters();
        updateStatistics();
    });

    // Apply filters when year or month changes
    $('#filter-year, #filter-month').on('change', function() {
        var filterType = $(this).attr('id');
        
        if (filterType === 'filter-year') {
            // Year changed - fetch new data from server
            fetchData();
        } else {
            // Month changed - filter locally
            applyLocalFilters();
        }
    });

    // Handle photographer edit button click
    $(document).on('click', '.photographer-edit-link', function(e) {
        e.preventDefault();
        var cell = $(this).closest('.photographer-cell');
        var clientId = cell.data('client-id');
        var currentPhotographerId = cell.data('photographer-id');
        
        // Build select options
        var photographerOptions = '<option value="">- Select -</option>';
        photographers.forEach(function(photographer) {
            var selected = photographer.id == currentPhotographerId ? 'selected' : '';
            photographerOptions += '<option value="' + photographer.id + '" ' + selected + '>' + (photographer.domicile || '') + ' - ' + photographer.username + '</option>';
        });
        
        var editHtml = '<select class="form-control form-control-sm photographer-select-temp" style="width: 100%; display: inline-block; margin-bottom: 5px;">' + photographerOptions + '</select><br>' +
            '<a href="javascript:void(0)" class="photographer-save-link" style="color: #28a745; text-decoration: none; margin-right: 10px;">[Save]</a>' +
            '<a href="javascript:void(0)" class="photographer-cancel-link" style="color: #6c757d; text-decoration: none; margin-right: 10px;">[Cancel]</a>' +
            '<a href="javascript:void(0)" class="photographer-delete-link" style="color: #dc3545; text-decoration: none;">[Delete]</a>';
        
        cell.find('.photographer-display').hide();
        cell.find('.photographer-edit-mode').html(editHtml).show();
        
        // Initialize Select2 on the newly created select
        cell.find('.photographer-select-temp').select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: '- Select -',
            dropdownAutoWidth: true,
            dropdownParent: $('body')
        });
    });

    // Handle photographer cancel
    $(document).on('click', '.photographer-cancel-link', function(e) {
        e.preventDefault();
        var cell = $(this).closest('.photographer-cell');
        cell.find('.photographer-edit-mode').hide().empty();
        cell.find('.photographer-display').show();
    });

    // Handle photographer delete
    $(document).on('click', '.photographer-delete-link', function(e) {
        e.preventDefault();
        if (!confirm('Are you sure you want to remove this photographer assignment?')) {
            return;
        }
        
        var cell = $(this).closest('.photographer-cell');
        var clientId = cell.data('client-id');
        
        // Disable buttons
        $(this).css('pointer-events', 'none').text('[Deleting...]');
        
        $.ajax({
            url: "{{ route('projects.updatePhotographer') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                project_id: clientId,
                photographer_id: null
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Update the client data in allClients array
                    var clientIndex = allClients.findIndex(c => c.id === clientId);
                    if (clientIndex !== -1) {
                        allClients[clientIndex].photographer_id = null;
                        
                        // Update the corresponding client in filtered array
                        var filteredIndex = clients.findIndex(c => c.id === clientId);
                        if (filteredIndex !== -1) {
                            clients[filteredIndex].photographer_id = null;
                        }
                    }

                    // Replace cell with select dropdown
                    var photographerOptions = '<option value="">- Select -</option>';
                    photographers.forEach(function(photographer) {
                        photographerOptions += '<option value="' + photographer.id + '">' + (photographer.domicile || '') + ' - ' + photographer.username + '</option>';
                    });
                    cell.removeAttr('data-photographer-id');
                    cell.html('<select class="form-control form-control-sm select2-photographer" data-client-id="' + clientId + '" style="width: 100%;">' + photographerOptions + '</select>');
                    cell.find('.select2-photographer').select2({
                        theme: 'bootstrap4',
                        width: '100%',
                        placeholder: '- Select -',
                        dropdownAutoWidth: true,
                        dropdownParent: $('body')
                    });
                    
                    // Update row background color to yellow
                    cell.closest('tr').css('background-color', '#fff3cd');
                    
                    // Update the chart to reflect changes
                    renderChart();
                    
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message || 'Failed to remove photographer');
                }
            },
            error: function(xhr, status, error) {
                toastr.error('Failed to remove photographer: ' + error);
            }
        });
    });

    // Handle photographer save
    $(document).on('click', '.photographer-save-link', function(e) {
        e.preventDefault();
        var cell = $(this).closest('.photographer-cell');
        var clientId = cell.data('client-id');
        var select = cell.find('.photographer-select-temp');
        var photographerId = select.val();
        
        // Disable buttons
        $(this).css('pointer-events', 'none').text('[Saving...]');
        
        $.ajax({
            url: "{{ route('projects.updatePhotographer') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                project_id: clientId,
                photographer_id: photographerId || null
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Update the client data in allClients array
                    var clientIndex = allClients.findIndex(c => c.id === clientId);
                    if (clientIndex !== -1) {
                        allClients[clientIndex].photographer_id = photographerId;
                        
                        // Update the corresponding client in filtered array
                        var filteredIndex = clients.findIndex(c => c.id === clientId);
                        if (filteredIndex !== -1) {
                            clients[filteredIndex].photographer_id = photographerId;
                        }
                    }

                    // Update the cell display
                    if (photographerId) {
                        var photographer = photographers.find(p => p.id == photographerId);
                        var photographerName = photographer ? (photographer.domicile + ' - ' + photographer.username) : 'Unknown';
                        cell.data('photographer-id', photographerId);
                        cell.find('.photographer-display').html(photographerName + '<a href="javascript:void(0)" class="photographer-edit-link" style="color: #007bff; text-decoration: none; font-size: 0.85em;">[Edit]</a>');
                    } else {
                        // If cleared, render as select dropdown
                        var photographerOptions = '<option value="">- Select -</option>';
                        photographers.forEach(function(photographer) {
                            photographerOptions += '<option value="' + photographer.id + '">' + (photographer.domicile || '') + ' - ' + photographer.username + '</option>';
                        });
                        cell.html('<select class="form-control form-control-sm select2-photographer" data-client-id="' + clientId + '" style="width: 100%;">' + photographerOptions + '</select>');
                        cell.find('.select2-photographer').select2({
                            theme: 'bootstrap4',
                            width: '100%',
                            placeholder: '- Select -',
                            dropdownAutoWidth: true,
                            dropdownParent: $('body')
                        });
                    }
                    
                    cell.find('.photographer-edit-mode').hide().empty();
                    cell.find('.photographer-display').show();
                    
                    // Update the chart to reflect changes
                    renderChart();
                    
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message || 'Failed to update photographer');
                }
            },
            error: function(xhr, status, error) {
                toastr.error('Failed to update photographer: ' + error);
            }
        });
    });

    // Handle photographer selection change (for unassigned photographers)
    $(document).on('change', '.select2-photographer', function() {
        var select = $(this);
        var clientId = select.data('client-id');
        var photographerId = select.val();

        if (!photographerId) return;

        // Disable select while processing
        select.prop('disabled', true);

        $.ajax({
            url: "{{ route('projects.updatePhotographer') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                project_id: clientId,
                photographer_id: photographerId || null
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Update the client data in allClients array
                    var clientIndex = allClients.findIndex(c => c.id === clientId);
                    if (clientIndex !== -1) {
                        allClients[clientIndex].photographer_id = photographerId;
                        
                        // Update the corresponding client in filtered array
                        var filteredIndex = clients.findIndex(c => c.id === clientId);
                        if (filteredIndex !== -1) {
                            clients[filteredIndex].photographer_id = photographerId;
                        }
                    }

                    // Replace with text + edit link
                    var photographer = photographers.find(p => p.id == photographerId);
                    var photographerName = photographer ? (photographer.domicile + ' - ' + photographer.username) : 'Unknown';
                    var cell = select.closest('.photographer-cell');
                    cell.data('photographer-id', photographerId);
                    cell.html('<span class="photographer-display">' + photographerName + ' <a href="javascript:void(0)" class="photographer-edit-link" style="color: #007bff; text-decoration: none; font-size: 0.85em;">[Edit]</a></span>' +
                        '<span class="photographer-edit-mode" style="display: none;"></span>');

                    // Update the chart to reflect changes
                    renderChart();

                    toastr.success(response.message);
                } else {
                    toastr.error(response.message || 'Failed to update photographer');
                }
            },
            error: function(xhr, status, error) {
                toastr.error('Failed to update photographer: ' + error);
            },
            complete: function() {
                // Re-enable select
                select.prop('disabled', false);
            }
        });
    });

    // Handle checkbox changes for progress updates
    $(document).on('change', '.checklist-dp, .checklist-l, .checklist-af, .checklist-ad', function() {
        var checkbox = $(this);
        var clientId = checkbox.data('client-id');
        var field = checkbox.data('field');
        var isChecked = checkbox.is(':checked');

        // Disable checkbox while processing
        checkbox.prop('disabled', true);

        $.ajax({
            url: "{{ route('projects.updateProgress') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                project_id: clientId,
                field: field,
                value: isChecked ? 1 : 0
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Update the client data in allClients array
                    var clientIndex = allClients.findIndex(c => c.id === clientId);
                    if (clientIndex !== -1) {
                        allClients[clientIndex][field] = response.data[field];
                        
                        // Update the corresponding client in filtered array
                        var filteredIndex = clients.findIndex(c => c.id === clientId);
                        if (filteredIndex !== -1) {
                            clients[filteredIndex][field] = response.data[field];
                        }
                    }

                    // Update the progress badge in the row
                    var row = checkbox.closest('tr');
                    var progressCell = row.find('td:eq(1)');
                    var updatedClient = allClients.find(c => c.id === clientId);
                    if (updatedClient) {
                        progressCell.html(getProgressBadge(updatedClient));
                    }

                    // Update the chart to reflect new progress data
                    renderChart();

                    toastr.success(response.message);
                    success_audio.play();
                } else {
                    // Revert checkbox on error
                    checkbox.prop('checked', !isChecked);
                    toastr.error(response.message || 'Failed to update progress');
                    error_audio.play();
                }
            },
            error: function(xhr, status, error) {
                // Revert checkbox on error
                checkbox.prop('checked', !isChecked);
                toastr.error('Failed to update progress: ' + error);
            },
            complete: function() {
                // Re-enable checkbox
                checkbox.prop('disabled', false);
            }
        });
    });

    function savedriveLink(projectId) {
        var inputField = $('#drive_link_' + projectId);
        var driveLink = inputField.val().trim();
        
        $.ajax({
            url: "{{ route('projects.updateDriveLink') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                project_id: projectId,
                drive_link: driveLink || null
            },
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(driveLink ? 'Google Drive link saved successfully' : 'Google Drive link cleared successfully');
                    success_audio.play();
                    
                    // Update the client data with new drive link
                    var clientIndex = allClients.findIndex(c => c.id === projectId);
                    if (clientIndex !== -1) {
                        allClients[clientIndex].link = driveLink || null;
                    }

                } else {
                    error_audio.play();
                    toastr.error(response.message || 'Failed to save Google Drive link');
                }
            },
            error: function(xhr, status, error) {
                error_audio.play();
                toastr.error('Failed to save Google Drive link: ' + error);
            }
        });
    }

    function copyClientProgress(id) {
        let url = "{{ url('esokhari/{date}/{shortname}') }}"
            .replace('{date}', moment(clients.find(c => c.id === id).event_date).format('YYYYMMDD'))
            .replace('{shortname}', clients.find(c => c.id === id).client_shortname || clients.find(c => c.id === id).client_name);
            
            // Copy to clipboard
            navigator.clipboard.writeText(url).then(function() {
                toastr.success('URL copied to clipboard!');
                success_audio.play();
            }, function(err) {
                toastr.error('Failed to copy URL');
                error_audio.play();
            });
    }

    

    function renderChart(){
        // Prepare monthly data for stacked bar chart
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        // Initialize data structure for each progress status
        var waitingData = [];
        var dpData = [];        
        var lunasData = [];
        var allFilesData = [];
        var allDoneData = [];
        var cancelledData = [];
        
        // Loop through each month (1-12)
        for (var i = 1; i <= 12; i++) {
            var monthClients = allClients.filter(c => moment(c.event_date).format('M') === i.toString());
            
            waitingData.push(monthClients.filter(c => !c.downpayment_at && !c.cancelled_at).length);
            dpData.push(monthClients.filter(c => c.downpayment_at && !c.cancelled_at && !c.paid_at).length);            
            lunasData.push(monthClients.filter(c => c.paid_at && !c.all_filled_at && !c.cancelled_at).length);
            allFilesData.push(monthClients.filter(c => c.all_filled_at && !c.all_done_at && !c.cancelled_at).length);
            allDoneData.push(monthClients.filter(c => c.all_done_at && !c.cancelled_at).length);
            cancelledData.push(monthClients.filter(c => c.cancelled_at).length);
        }

        $('#chart_container').empty();
                $('#chart_container').append('<div id="progress-chart" style="width: 100%; height: 250px;"></div>');

                Highcharts.chart('progress-chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Monthly Progress Overview'
                    },
                    xAxis: {
                        categories: months,
                        title: {
                            text: 'Month'
                        }
                    },
                    yAxis: {
                        min: 0,
                        allowDecimals: false,
                        title: {
                            text: 'Clients'
                        },
                        stackLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'bold',
                                color: 'gray'
                            }
                        }
                    },
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        floating: false,
                        backgroundColor: 'white',
                        borderColor: '#CCC',
                        borderWidth: 1,
                        shadow: false
                    },
                    tooltip: {
                        headerFormat: '<b>{point.x}</b><br/>',
                        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: false
                            },
                            point: {
                                events: {
                                    click: function() {
                                        // Get the clicked month index (0-11)
                                        var monthIndex = this.category;
                                        var monthMap = {
                                            'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
                                            'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
                                            'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
                                        };
                                        
                                        // Set the month filter and trigger change
                                        $('#filter-month').val(monthMap[monthIndex]).trigger('change');
                                    }
                                }
                            },
                            cursor: 'pointer'
                        }
                    },
                    series: [
                    @if(auth()->user()->role_code === 'admin')                    
                    {
                        name: 'WAITING',
                        data: waitingData,
                        color: '#6c757d'
                    }, {
                        name: 'DP',
                        data: dpData,
                        color: '#e83e8c'
                    }, {
                        name: 'LUNAS',
                        data: lunasData,
                        color: '#17a2b8'
                    }, 
                    @endif
                    {
                        name: 'ALL FILES',
                        data: allFilesData,
                        color: '#6f42c1'
                    }, {
                        name: 'ALL DONE',
                        data: allDoneData,
                        color: '#28a745'
                    },                     
                ],
                    credits: {
                        enabled: false
                    }
                });

                // Render statistics table and upcoming clients
                var today = moment().format('YYYY-MM-DD');
                var tomorrow = moment().add(1, 'days').format('YYYY-MM-DD');
                
                var todayClients = allClients.filter(c => moment(c.event_date).format('YYYY-MM-DD') === today && !c.cancelled_at);
                var tomorrowClients = allClients.filter(c => moment(c.event_date).format('YYYY-MM-DD') === tomorrow && !c.cancelled_at);
                
                var statsHtml = `
                    <div style="display: grid; grid-template-columns: auto 1fr 1fr; gap: 15px; align-items: stretch;">
                        <div style="background: white; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 12px 15px; display: flex; flex-direction: column;">
                            <table style="width: 100%; font-size: 0.85em; border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td style="padding: 4px 8px; color: #667eea;"><i class="fas fa-users"></i> Total</td>
                                        <td style="padding: 4px 8px; text-align: right; font-weight: 600; color: #667eea;">${allClients.filter(c => !c.cancelled_at).length}</td>
                                    </tr>
                                    @if(auth()->user()->role_code === 'admin')
                                    <tr style="border-top: 1px solid #f0f0f0;">
                                        <td style="padding: 4px 8px; color: #6c757d;"><i class="fas fa-hourglass-half"></i> Waiting</td>
                                        <td style="padding: 4px 8px; text-align: right; font-weight: 600; color: #6c757d;">${allClients.filter(c => !c.downpayment_at && !c.cancelled_at).length}</td>
                                    </tr>
                                    <tr style="border-top: 1px solid #f0f0f0;">
                                        <td style="padding: 4px 8px; color: #e83e8c;"><i class="fas fa-dollar-sign"></i> DP</td>
                                        <td style="padding: 4px 8px; text-align: right; font-weight: 600; color: #e83e8c;">${allClients.filter(c => c.downpayment_at && !c.cancelled_at && !c.paid_at).length}</td>
                                    </tr>
                                    <tr style="border-top: 1px solid #f0f0f0;">
                                        <td style="padding: 4px 8px; color: #17a2b8;"><i class="fas fa-check"></i> Lunas</td>
                                        <td style="padding: 4px 8px; text-align: right; font-weight: 600; color: #17a2b8;">${allClients.filter(c => c.paid_at && !c.all_filled_at && !c.cancelled_at).length}</td>
                                    </tr>
                                    @endif
                                    <tr style="border-top: 1px solid #f0f0f0;">
                                        <td style="padding: 4px 8px; color: #007bff;"><i class="fas fa-folder-open"></i> All Files</td>
                                        <td style="padding: 4px 8px; text-align: right; font-weight: 600; color: #007bff;">${allClients.filter(c => c.all_filled_at && !c.all_done_at && !c.cancelled_at).length}</td>
                                    </tr>
                                    <tr style="border-top: 1px solid #f0f0f0;">
                                        <td style="padding: 4px 8px; color: #28a745;"><i class="fas fa-check-circle"></i> All Done</td>
                                        <td style="padding: 4px 8px; text-align: right; font-weight: 600; color: #28a745;">${allClients.filter(c => c.all_done_at && !c.cancelled_at).length}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="background: white; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 12px 15px; display: flex; flex-direction: column;">
                            <div style="font-size: 0.8em; font-weight: 600; color: #007bff; margin-bottom: 8px; display: flex; align-items: center; gap: 5px; flex-shrink: 0;">
                                <i class="fas fa-calendar-day"></i> Hari Ini <span style="background: #007bff; color: white; padding: 2px 6px; border-radius: 10px; font-size: 0.9em; margin-left: auto;">${todayClients.length}</span>
                            </div>
                            <div style="flex: 1; overflow-y: auto; font-size: 0.8em; min-height: 0;">
                                ${todayClients.length > 0 ? todayClients.map(c => {
                                    var eventSessionTime = '';
                                    if (c.event_time && c.service_duration) {
                                        var startTime = moment(c.event_time, 'HH:mm');
                                        var duration = parseFloat(c.service_duration);
                                        var hours = Math.floor(duration);
                                        var minutes = Math.round((duration - hours) * 60);
                                        var endTime = startTime.clone().add(hours, 'hours').add(minutes, 'minutes');
                                        eventSessionTime = startTime.format('HH:mm') + ' - ' + endTime.format('HH:mm');
                                    } else if (c.event_time) {
                                        eventSessionTime = c.event_time;
                                    }
                                    var photographer = c.photographer_id ? photographers.find(p => p.id == c.photographer_id) : null;
                                    var photographerHtml = '';
                                    if (photographer) {
                                        var waNumber = photographer.phone ? photographer.phone.replace(/[^0-9]/g, '') : '';
                                        if (waNumber && !waNumber.startsWith('62')) {
                                            waNumber = '62' + waNumber.replace(/^0+/, '');
                                        }
                                        photographerHtml = '<div style="color: #28a745; font-size: 0.9em; margin-top: 2px;"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/' + waNumber + '?text=Halo%20' + encodeURIComponent(photographer.username) + '%2C%20konfirmasi%20jadwal%20' + encodeURIComponent(c.client_shortname) + '%20' + eventSessionTime + '" target="_blank" style="color: #28a745; text-decoration: none;" onclick="event.stopPropagation();">' + photographer.username + '</a></div>';
                                    }
                                    return `
                                    <div style="padding: 5px 0; border-bottom: 1px solid #f0f0f0;">
                                        <a href="#" onclick="viewDetails(${c.id})" style="font-weight: 600; color: #333; font-size: 1.05em;">${c.client_shortname} | ${c.client_name}</a>
                                        <div style="color: #888; font-size: 0.9em; margin-top: 2px;"><i class="fas fa-university"></i> ${c.university || '-'} • <i class="fas fa-map-marker-alt"></i> ${c.city || '-'}</div>
                                        ${eventSessionTime ? '<div style="color: #007bff; font-size: 0.9em; margin-top: 2px;"><i class="far fa-clock"></i> ' + eventSessionTime + '</div>' : ''}
                                        ${photographerHtml}
                                    </div>
                                `}).join('') : '<div style="color: #999; text-align: center; padding: 10px 0;">Tidak ada client</div>'}
                            </div>
                        </div>
                        <div style="background: white; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 12px 15px; display: flex; flex-direction: column;">
                            <div style="font-size: 0.8em; font-weight: 600; color: #28a745; margin-bottom: 8px; display: flex; align-items: center; gap: 5px; flex-shrink: 0;">
                                <i class="fas fa-calendar-plus"></i> Besok <span style="background: #28a745; color: white; padding: 2px 6px; border-radius: 10px; font-size: 0.9em; margin-left: auto;">${tomorrowClients.length}</span>
                            </div>
                            <div style="flex: 1; overflow-y: auto; font-size: 0.8em; min-height: 0;">
                                ${tomorrowClients.length > 0 ? tomorrowClients.map(c => {
                                    var eventSessionTime = '';
                                    if (c.event_time && c.service_duration) {
                                        var startTime = moment(c.event_time, 'HH:mm');
                                        var duration = parseFloat(c.service_duration);
                                        var hours = Math.floor(duration);
                                        var minutes = Math.round((duration - hours) * 60);
                                        var endTime = startTime.clone().add(hours, 'hours').add(minutes, 'minutes');
                                        eventSessionTime = startTime.format('HH:mm') + ' - ' + endTime.format('HH:mm');
                                    } else if (c.event_time) {
                                        eventSessionTime = c.event_time;
                                    }
                                    var photographer = c.photographer_id ? photographers.find(p => p.id == c.photographer_id) : null;
                                    var photographerHtml = '';
                                    if (photographer) {
                                        var waNumber = photographer.phone ? photographer.phone.replace(/[^0-9]/g, '') : '';
                                        if (waNumber && !waNumber.startsWith('62')) {
                                            waNumber = '62' + waNumber.replace(/^0+/, '');
                                        }
                                        photographerHtml = '<div style="color: #28a745; font-size: 0.9em; margin-top: 2px;"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/' + waNumber + '?text=Halo%20' + encodeURIComponent(photographer.username) + '%2C%20konfirmasi%20jadwal%20' + encodeURIComponent(c.client_shortname) + '%20' + eventSessionTime + '" target="_blank" style="color: #28a745; text-decoration: none;" onclick="event.stopPropagation();">' + photographer.username + '</a></div>';
                                    }
                                    return `
                                    <div style="padding: 5px 0; border-bottom: 1px solid #f0f0f0;">
                                        <a href="#" onclick="viewDetails(${c.id})" style="font-weight: 600; color: #333; font-size: 1.05em;">${c.client_shortname} | ${c.client_name}</a>
                                        <div style="color: #888; font-size: 0.9em; margin-top: 2px;"><i class="fas fa-university"></i> ${c.university || '-'} • <i class="fas fa-map-marker-alt"></i> ${c.city || '-'}</div>
                                        ${eventSessionTime ? '<div style="color: #007bff; font-size: 0.9em; margin-top: 2px;"><i class="far fa-clock"></i> ' + eventSessionTime + '</div>' : ''}
                                        ${photographerHtml}
                                    </div>
                                `}).join('') : '<div style="color: #999; text-align: center; padding: 10px 0;">Tidak ada client</div>'}
                            </div>
                        </div>
                    </div>
                `;
                $('#statistic_card_container').html(statsHtml);
    }
</script>
@endsection