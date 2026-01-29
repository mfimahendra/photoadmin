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
        font-size: 0.85rem;
        padding: 0.4em 0.8em;
        font-weight: 500;
    }
    
    .table-sm td {
        vertical-align: middle;
    }

    .btn-action {
        margin: 2px;
    }

    .date-filter-container {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .stats-card {
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        color: white;
        transition: transform 0.2s;
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
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Statistics Cards -->
    <div class="row pt-3">
        <div class="col-md-3 col-sm-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <h3 id="stat-total">0</h3>
                <p><i class="fas fa-users"></i> Total Clients</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <h3 id="stat-booking">0</h3>
                <p><i class="fas fa-calendar-check"></i> Booking</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <h3 id="stat-confirmed">0</h3>
                <p><i class="fas fa-check-circle"></i> Confirmed</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <h3 id="stat-completed">0</h3>
                <p><i class="fas fa-check-double"></i> Completed</p>
            </div>
        </div>
    </div>

    <!-- Clients Table -->
    <div class="row pt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Clients List</h3>
                    <div class="card-tools">
                        <a href="{{ route('projects.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Add New Client
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Date Range Filter -->
                    <div class="date-filter-container">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="daterange"><i class="fas fa-calendar"></i> Filter by Event Date:</label>
                                <input type="text" id="daterange" class="form-control" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="filter-city"><i class="fas fa-map-marker-alt"></i> City:</label>
                                <select id="filter-city" class="form-control select2" data-placeholder="All Cities">
                                    <option value="">All Cities</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="filter-progress"><i class="fas fa-tasks"></i> Progress:</label>
                                <select id="filter-progress" class="form-control select2" data-placeholder="All Status">
                                    <option value="">All Status</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="waiting_confirmation">Waiting Confirmation</option>
                                    <option value="booking">Booking</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="shooting">Shooting</option>
                                    <option value="editing">Editing</option>
                                    <option value="review">Review</option>
                                    <option value="completed">Completed</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-block" onclick="applyFilters()">
                                    <i class="fas fa-filter"></i> Apply
                                </button>
                            </div>
                        </div>
                    </div>

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
<script>
    var clients = [];
    var additionals = [];
    var allClients = [];

    $(document).ready(function () {
        $('[data-widget="pushmenu"]').PushMenu('toggle');
        
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4'
        });

        // Initialize date range picker
        var start = moment().startOf('month');
        var end = moment().endOf('month');

        $('#daterange').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'DD/MM/YYYY'
            },
            ranges: {
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'All Time': [moment().subtract(10, 'years'), moment().add(1, 'year')]
            }
        });

        fetchData();
    });

    function applyFilters() {
        fetchData();
    }

    function fetchData() {
        var dateRange = $('#daterange').data('daterangepicker');
        var startDate = dateRange.startDate.format('YYYY-MM-DD');
        var endDate = dateRange.endDate.format('YYYY-MM-DD');

        $.ajax({
            type: "GET",
            url: "{{ route('clients.getProjectClients') }}",
            data: {
                start_date: startDate,
                end_date: endDate
            },
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);
                allClients = response.projects_clients || [];
                additionals = response.additionals || [];
                
                applyLocalFilters();
                updateStatistics();
                populateCityFilter();
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
        var cityFilter = $('#filter-city').val();
        var progressFilter = $('#filter-progress').val();

        clients = allClients.filter(function(client) {
            var cityMatch = !cityFilter || client.city === cityFilter;
            var progressMatch = !progressFilter || client.progress === progressFilter;
            return cityMatch && progressMatch;
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
                    <th>No</th>
                    <th>Progress</th>
                    <th>Photographer</th>
                    <th>Event Date</th>
                    <th>Time</th>
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>University</th>
                    <th>City</th>
                    <th>Service</th>
                    <th>DP</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>`);

        var tbody = $('#clients-table tbody');

        if (clients && clients.length > 0) {
            clients.forEach(function(client, index) {
                var progressBadge = getProgressBadge(client.progress);
                var dpBadge = client.downpayment_at 
                    ? '<span class="badge badge-success"><i class="fas fa-check"></i> Paid</span>' 
                    : '<span class="badge badge-warning"><i class="fas fa-clock"></i> Pending</span>';
                
                var eventDate = client.event_date ? moment(client.event_date).format('DD MMM YYYY') : '-';
                var eventTime = client.event_time || '-';
                
                var row = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + progressBadge + '</td>' +
                    '<td>' + (client.photographer_name || '-') + '</td>' +
                    '<td>' + eventDate + '</td>' +
                    '<td>' + eventTime + '</td>' +
                    '<td><strong>' + (client.client_name || '-') + '</strong><br><small class="text-muted">' + (client.client_shortname || '') + '</small></td>' +
                    '<td><a href="https://wa.me/' + client.client_phone + '" target="_blank"><i class="fab fa-whatsapp text-success"></i> ' + client.client_phone + '</a></td>' +
                    '<td>' + (client.university || '-') + '<br><small class="text-muted">' + (client.faculty || '') + '</small></td>' +
                    '<td>' + (client.city || '-') + '</td>' +
                    '<td>' + (client.service_package || '-') + '<br><small class="text-muted">Rp ' + numberWithDotsSplit3(client.service_price || 0) + '</small></td>' +
                    '<td>' + dpBadge + '</td>' +
                    '<td>' +
                        '<button class="btn btn-info btn-xs btn-action" onclick="viewDetails(' + client.id + ')" title="View Details"><i class="fas fa-eye"></i></button> ' +
                        '<button class="btn btn-primary btn-xs btn-action" onclick="editData(' + client.id + ')" title="Edit"><i class="fas fa-edit"></i></button> ' +
                        '<button class="btn btn-danger btn-xs btn-action" onclick="deleteData(' + client.id + ')" title="Delete"><i class="fas fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        } else {
            tbody.append('<tr><td colspan="11" class="text-center"><i class="fas fa-inbox"></i> No clients found</td></tr>');
        }

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#clients-table')) {
            $('#clients-table').DataTable().destroy();
        }

        $('#clients-table').DataTable({
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
        }).buttons().container().appendTo('#clients-table_wrapper .col-md-6:eq(0)');
    }

    function getProgressBadge(progress) {
        var badges = {
            'waiting_confirmation': '<span class="badge badge-progress badge-secondary"><i class="fas fa-hourglass-half"></i> Waiting Confirmation</span>',
            'booking': '<span class="badge badge-progress badge-warning"><i class="fas fa-calendar"></i> Booking</span>',
            'confirmed': '<span class="badge badge-progress badge-info"><i class="fas fa-check"></i> Confirmed</span>',
            'shooting': '<span class="badge badge-progress badge-primary"><i class="fas fa-camera"></i> Shooting</span>',
            'editing': '<span class="badge badge-progress badge-secondary"><i class="fas fa-edit"></i> Editing</span>',
            'review': '<span class="badge badge-progress badge-dark"><i class="fas fa-eye"></i> Review</span>',
            'completed': '<span class="badge badge-progress badge-success"><i class="fas fa-check-double"></i> Completed</span>',
            'delivered': '<span class="badge badge-progress badge-success"><i class="fas fa-box"></i> Delivered</span>',
            'cancelled': '<span class="badge badge-progress badge-danger"><i class="fas fa-times"></i> Cancelled</span>'
        };
        return badges[progress] || '<span class="badge badge-secondary">' + progress + '</span>';
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
                                    <h6>Personal Information</h6>
                                    <table class="table table-sm">
                                        <tr><td><strong>Name:</strong></td><td>${client.client_name}</td></tr>
                                        <tr><td><strong>Phone:</strong></td><td><a href="https://wa.me/${client.client_phone}" target="_blank">${client.client_phone}</a></td></tr>
                                        <tr><td><strong>Email:</strong></td><td>${client.client_email || '-'}</td></tr>
                                        <tr><td><strong>Instagram:</strong></td><td>${client.client_instagram || '-'}</td></tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h6>Event Details</h6>
                                    <table class="table table-sm">
                                        <tr><td><strong>Date:</strong></td><td>${moment(client.event_date).format('DD MMMM YYYY')}</td></tr>
                                        <tr><td><strong>Time:</strong></td><td>${client.event_time || '-'}</td></tr>
                                        <tr><td><strong>City:</strong></td><td>${client.city}</td></tr>
                                        <tr><td><strong>University:</strong></td><td>${client.university}</td></tr>
                                        <tr><td><strong>Faculty:</strong></td><td>${client.faculty || '-'}</td></tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <h6>Service Package</h6>
                            <p><strong>${client.service_package}</strong> - ${client.service_duration} menit<br>
                            Price: Rp ${numberWithDotsSplit3(client.service_price)}</p>
                            ${additionalsHtml}
                            ${client.notes ? '<hr><h6>Notes</h6><p>' + client.notes + '</p>' : ''}
                            <hr>
                            <p><strong>Status:</strong> ${getProgressBadge(client.progress)}</p>
                            <p><strong>Down Payment:</strong> ${client.downpayment_at ? '<span class="badge badge-success">Paid on ' + moment(client.downpayment_at).format('DD MMM YYYY HH:mm') + '</span>' : '<span class="badge badge-warning">Not Paid</span>'}</p>
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

        var clientAdditionals = additionals.filter(a => a.project_id === clientId);
        var selectedAdditionals = clientAdditionals.map(a => a.additional_id);

        var modalHtml = `
            <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Client</h5>
                            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="editClientForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="client_id" value="${client.id}">
                            
                            <div class="modal-body">
                                <!-- Personal Information -->
                                <h6 class="border-bottom pb-2 mb-3"><i class="fas fa-user"></i> Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="client_name" value="${client.client_name || ''}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" name="phone" value="${client.client_phone || ''}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="${client.client_email || ''}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" class="form-control" name="instagram" value="${client.client_instagram || ''}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Event Details -->
                                <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-calendar"></i> Event Details</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Event Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="event_date" value="${client.event_date || ''}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Event Time</label>
                                            <input type="time" class="form-control" name="event_time" value="${client.event_time || ''}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="city" value="${client.city || ''}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>University <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="university" value="${client.university || ''}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <input type="text" class="form-control" name="faculty" value="${client.faculty || ''}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Service Package <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="service_package_display" value="${client.service_package || ''}" readonly>
                                            <input type="hidden" name="service_package" value="${client.service_id || ''}">
                                            <small class="text-muted">Rp ${numberWithDotsSplit3(client.service_price || 0)} - ${client.service_duration || 0} menit</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Progress Status</label>
                                            <select class="form-control" name="progress">
                                                <option value="waiting_confirmation" ${client.progress === 'waiting_confirmation' ? 'selected' : ''}>Waiting Confirmation</option>
                                                <option value="booking" ${client.progress === 'booking' ? 'selected' : ''}>Booking</option>
                                                <option value="confirmed" ${client.progress === 'confirmed' ? 'selected' : ''}>Confirmed</option>
                                                <option value="shooting" ${client.progress === 'shooting' ? 'selected' : ''}>Shooting</option>
                                                <option value="editing" ${client.progress === 'editing' ? 'selected' : ''}>Editing</option>
                                                <option value="review" ${client.progress === 'review' ? 'selected' : ''}>Review</option>
                                                <option value="completed" ${client.progress === 'completed' ? 'selected' : ''}>Completed</option>
                                                <option value="delivered" ${client.progress === 'delivered' ? 'selected' : ''}>Delivered</option>
                                                <option value="cancelled" ${client.progress === 'cancelled' ? 'selected' : ''}>Cancelled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <textarea class="form-control" name="notes" rows="3">${client.notes || ''}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment -->
                                <h6 class="border-bottom pb-2 mb-3 mt-3"><i class="fas fa-money-bill"></i> Payment</h6>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="edit_deposit_paid" name="deposit_paid" ${client.downpayment_at ? 'checked' : ''}>
                                        <label class="custom-control-label" for="edit_deposit_paid">Down Payment Paid</label>
                                    </div>
                                    ${client.downpayment_at ? '<small class="text-muted">Paid on ' + moment(client.downpayment_at).format('DD MMM YYYY HH:mm') + '</small>' : ''}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" id="saveEditBtn">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        `;

        $('body').append(modalHtml);
        $('#editModal').modal('show');
        
        // Handle form submission
        $('#editClientForm').on('submit', function(e) {
            e.preventDefault();
            
            var saveBtn = $('#saveEditBtn');
            saveBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            
            var formData = new FormData(this);
            
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
    $('#filter-city, #filter-progress').on('change', function() {
        applyLocalFilters();
        updateStatistics();
    });
</script>
@endsection