@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fullcalendar/main.css') }}">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .form-group label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-group label i {
            margin-right: 5px;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
        }

        .btn {
            border-radius: 5px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }

        .card-primary.card-outline .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-info.card-outline .card-header {
            background: linear-gradient(135deg, #17ead9 0%, #6078ea 100%);
        }

        .badge {
            padding: 0.4em 0.8em;
            font-weight: 500;
        }

        .custom-control-label {
            font-weight: 500;
            cursor: pointer;
        }

        .input-group-text {
            background-color: #e9ecef;
            border-color: #ced4da;
            font-weight: 600;
        }

        #calendar_container {
            min-height: 400px;
        }

        .fc-day-today {
            background-color: #d4edda !important;
        }

        @media (max-width: 991px) {
            .card {
                margin-bottom: 1rem;
            }

            #calendar_container {
                min-height: 300px;
            }

            .btn {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card card-primary card-outline">
                    <div id="calendar_container" style="padding: 2%;"></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <form id="projectForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="client_name">
                                            <i class="fas fa-user text-primary"></i> Client Name<span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="client_name" name="client_name"
                                            placeholder="Enter client name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="phone">
                                            <i class="fas fa-phone text-success"></i> Phone Number<span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="instagram">
                                            <i class="fab fa-instagram text-danger"></i>
                                            Instagram
                                        </label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                            placeholder="Enter Instagram handle">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="event_date" name="event_date">

                            <div class="row" style="display: none;">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="event_time">
                                            <i class="fas fa-clock text-info"></i> Event Time <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="time" class="form-control" id="event_time" name="event_time"
                                            value="09:00" required>
                                        <small class="text-muted">Select a date from the calendar first, then choose the
                                            event time</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="city">
                                            <i class="fas fa-map-marker-alt text-danger"></i>City<span
                                                class="text-danger">*</span>
                                        </label>
                                        <select class="form-control select2" id="city" name="city" required
                                            data-placeholder="Select City">
                                            <option value=""></option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="university">
                                            <i class="fas fa-map-marker-alt text-danger"></i>University<span
                                                class="text-danger">*</span>
                                        </label>
                                        <select class="form-control select2" id="university" name="university" required
                                            data-placeholder="Select University">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="faculty">
                                            <i class="fas fa-map-marker-alt text-danger"></i>
                                            Faculty
                                        </label>
                                        <select class="form-control select2" id="faculty" name="faculty"
                                            data-placeholder="Select Faculty">
                                            <option value=""></option>
                                            @foreach ($faculties as $faculty)
                                                <option value="{{ $faculty->faculty }}">{{ $faculty->faculty }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="service_package">
                                            <i class="fas fa-box text-warning"></i> Service Package<span
                                                class="text-danger">*</span>
                                        </label>
                                        <select class="form-control select2" id="service_package" name="service_package"
                                            required data-placeholder="Select Service Package">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="additional">
                                            <i class="fas fa-plus text-info"></i> Add On <small>(optional)</small>
                                        </label>
                                        <select class="form-control select2" id="additional" name="additional[]" multiple
                                            data-placeholder="Select Add On(s)">
                                            <option value=""></option>
                                            @foreach ($additionals as $addon)
                                                <option value="{{ $addon->id }}">{{ $addon->package }} - Rp
                                                    {{ number_format($addon->price, 0, ',', '.') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="notes">
                                    <i class="fas fa-sticky-note text-secondary"></i> Additional Notes
                                </label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"
                                    placeholder="Enter any additional notes or special requests"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="deposit_paid"
                                        name="deposit_paid">
                                    <label for="deposit_paid" class="custom-control-label">
                                        <i class="fas fa-check-circle text-success"></i> Bayar DP
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12 text-right">
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fas fa-undo"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Project
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/fullcalendar/main.js') }}"></script>
    <script>
        var services = @json($services);
        var cities = @json($cities);
        var universities = @json($universities);
        var faculties = @json($faculties);

        var projects = @json($projects);

        var calendar;
        var selectedDate = null;
        var tempEvent = null; // Track temporary event

        // Populate universities based on selected city
        $(document).ready(function() {
            $('[data-widget="pushmenu"]').PushMenu('toggle');
            $('#city').val(null).trigger('change');

            // Initialize select2 first
            $('.select2').each((_i, e) => {
                var e = $(e);
                e.select2({
                    tags: true,
                    allowClear: true,
                    theme: 'bootstrap4',
                    dropdownParent: e.parent()
                });
            });        

            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar_container');
            calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                selectable: true,
                selectMirror: true,
                select: function(info) {
                    selectedDate = info.start;
                    $('#event_date').val(moment(info.start).format('YYYY-MM-DD'));

                    // Set time based on selection (if time is selected, use it; otherwise default to 09:00)
                    var clickedTime = moment(info.start).format('HH:mm');
                    if (clickedTime !== '00:00') {
                        $('#event_time').val(clickedTime);
                    }

                    var eventTime = $('#event_time').val() || '09:00';
                    updateTempEvent();
                    
                },
                editable: true,
                dayMaxEvents: true,
                events: projects.map(function(project) {
                    return {
                        id: project.id,
                        title: project.city + ' - ' + project.university,
                        start: project.event_date + 'T' + (project.event_time || '09:00'),
                        backgroundColor: '#28a745',
                        borderColor: '#218838',
                        textColor: '#fff',
                        extendedProps: {
                            client_name: project.client_name,
                            phone: project.phone,
                            service: project.service_package,
                            notes: project.notes
                        }
                    };
                }),
                dateClick: function(info) {
                    selectedDate = info.date;
                    $('#event_date').val(moment(info.date).format('YYYY-MM-DD'));

                    // Set time based on click (if time is clicked, use it; otherwise default to 09:00)
                    var clickedTime = moment(info.date).format('HH:mm');
                    if (clickedTime !== '00:00') {
                        $('#event_time').val(clickedTime);
                    }

                    var eventTime = $('#event_time').val() || '09:00';
                    updateTempEvent();

                    // Visual feedback
                    toastr.info('Date selected: ' + moment(info.date).format('DD MMM YYYY') + ' at ' +
                        eventTime, '', {
                            timeOut: 2000
                        });
                }
            });
            calendar.render();

            // Form submission handler
            $('#projectForm').on('submit', function(e) {
                e.preventDefault();

                // Validate date is selected
                if (!$('#event_date').val()) {
                    toastr.warning('Please select a date from the calendar');
                    if (typeof error_audio !== 'undefined') {
                        error_audio.play();
                    }
                    return;
                }

                createProject();
            });

            // Update temp event when time changes
            $('#event_time').on('change', function() {
                if (selectedDate && tempEvent) {
                    updateTempEvent();
                }
            });
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        // event listener for city change to populate service packages
        $('#city').on('change', function() {
            var selectedCity = $(this).val();

            var filteredServices = services.filter(function(service) {
                return service.city === selectedCity;
            });

            var filteredUniversities = universities.filter(function(university) {
                return university.city === selectedCity;
            });

            var universitySelect = $('#university');
            universitySelect.empty();
            universitySelect.append('<option value=""></option>');

            filteredUniversities.forEach(function(university) {
                var option = $('<option></option>')
                    .attr('value', university.university)
                    .text(university.university);
                universitySelect.append(option);
            });
            universitySelect.val('').trigger('change');


            var serviceSelect = $('#service_package');
            serviceSelect.empty();
            serviceSelect.append('<option value="">Select package</option>');

            filteredServices.forEach(function(service) {
                var option = $('<option></option>')
                    .attr('value', service.id)
                    .text(service.package + ' - ' + service.duration + ' Jam | Rp ' + numberWithDotsSplit3(
                        service.price));
                serviceSelect.append(option);
            });
            serviceSelect.val('').trigger('change');
        });

        // Function to update temporary event based on selected time
        function updateTempEvent() {
            if (!selectedDate) return;

            // Remove existing temp event
            if (tempEvent) {
                tempEvent.remove();
            }

            var eventTime = $('#event_time').val() || '09:00';
            var eventDate = $('#event_date').val();

            // Calculate end time (add 3 hours to start time)
            var startMoment = moment(eventDate + ' ' + eventTime, 'YYYY-MM-DD HH:mm');
            var endMoment = startMoment.clone().add(1, 'hours');

            var eventStart = startMoment.format('YYYY-MM-DDTHH:mm:ss');
            var eventEnd = endMoment.format('YYYY-MM-DDTHH:mm:ss');

            tempEvent = calendar.addEvent({
                id: 'temp-event',
                title: '📅 Selected',
                start: eventStart,
                end: eventEnd,
                backgroundColor: '#ffc107',
                borderColor: '#ff9800',
                textColor: '#000'
            });
        }


        function createProject() {
            // Temporarily disable the additional field before creating FormData
            const additionalSelect = $('#additional');
            const additionalValues = additionalSelect.val();
            
            // Disable the select so it's not included in FormData
            additionalSelect.prop('disabled', true);
            
            const formData = new FormData(document.getElementById('projectForm'));
            
            // Re-enable the select
            additionalSelect.prop('disabled', false);
            
            // Add the comma-separated values
            if (additionalValues && additionalValues.length > 0) {
                formData.append('additional', additionalValues.join(','));
            }

            $.ajax({
                url: "{{ route('projects.store') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success('Project saved successfully!');
                    if (typeof success_audio !== 'undefined') {
                        success_audio.play();
                    }

                    // Reset form and clear calendar selection
                    $('#projectForm')[0].reset();
                    $('.select2').val(null).trigger('change');
                    selectedDate = null;

                    // Remove temp event
                    if (tempEvent) {
                        tempEvent.remove();
                        tempEvent = null;
                    }

                    // Add event to calendar if response contains event data
                    if (response.event) {
                        calendar.addEvent({
                            id: response.event.id,
                            title: response.event.client_name,
                            start: response.event.event_date + 'T' + response.event.event_time,
                            backgroundColor: '#28a745',
                            borderColor: '#28a745'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        toastr.error(xhr.responseJSON.message);
                    } else {
                        toastr.error('Error saving project. Please check all required fields.');
                    }
                    if (typeof error_audio !== 'undefined') {
                        error_audio.play();
                    }
                }
            });
        }

        function editProject(id) {
            toastr.info('Edit functionality coming soon!');
        }

        function deleteProject(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                $.ajax({
                    url: `/projects/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        toastr.success('Project deleted successfully!');
                        if (typeof success_audio !== 'undefined') {
                            success_audio.play();
                        }
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Error deleting project.');
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
    </script>
@endsection
