@extends('layouts.app')
@section('styles')    
    <style>
        * {
            box-sizing: border-box;
        }

        /* Calendar container styling */
        #calendar_container .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            border: none;            
        }

        #calendar_container .card-body {
            padding: 20px;
        }

        /* Custom Calendar Styles */
        .custom-calendar {
            width: 100%;
            user-select: none;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0 20px;
        }

        .calendar-header .month-year {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            flex: 1;
        }

        .calendar-nav {
            display: flex;
            gap: 2px;
        }

        .calendar-nav button {
            width: 35px;
            height: 35px;
            background-color: transparent;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #7f8c8d;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-nav button:hover {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
            transform: scale(1.05);
        }

        .calendar-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 12px;
            margin-bottom: 8px;
        }

        .calendar-weekday {
            text-align: center;
            font-weight: 600;
            color: #95a5a6;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 0;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 14px;
            font-weight: 500;
            color: #2c3e50;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .calendar-day:hover:not(.disabled) {
            background-color: #ecf0f1;
            transform: scale(1.1);
        }

        .calendar-day.disabled {
            color: #bdc3c7;
            opacity: 0.5;
            cursor: default;
        }

        .calendar-day.disabled:hover {
            background-color: transparent;
            transform: none;
            opacity: 0.7;
        }

        .calendar-day.today {
            background-color: #3498db !important;
            color: white !important;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }

        .calendar-day.selected {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .calendar-day.today.selected {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        /* Event list card styling */
        .event-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .event-card .card-header {
            @if(auth()->check() && auth()->user()->role_code === 'photographer')
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            @else
                background: linear-gradient(135deg, #faa54b 0%, #db2254 100%);
            @endif
                 
            color: white;
            border-radius: 12px 12px 0 0 !important;
            border: none;
            padding: 20px;
        }

        .event-card .card-header h3 {
            margin: 0;
            font-weight: 600;
            font-size: 18px;
        }

        .event-card .card-body {
            padding: 20px;
        }

        /* Event item styling */
        .event-item-modern {
            background: white;            
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .event-row {
            display: flex;
            margin-bottom: 0;
        }

        .event-date {
            width: 120px;
            flex-shrink: 0;
        }

        .event-details {
            flex: 1;
        }

        .event-details ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .event-details li {
            display: flex;
            margin-bottom: 8px;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .event-details li:last-child {
            margin-bottom: 0;
        }

        .event-details li:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .event-date {
            font-weight: 600;
            color: #333;
            font-size: 14px;
            text-transform: uppercase;
        }

        .event-time {
            width: 150px;
            flex-shrink: 0;
            color: #333;
            font-weight: 400;
            font-size: 14px;
        }

        .event-city {
            width: 120px;
            flex-shrink: 0;
            color: #333;
            font-weight: 400;
            font-size: 14px;
        }

        .event-university {
            width: 200px;
            flex-shrink: 0;
            color: #333;
            font-weight: 400;
            font-size: 14px;
        }

        .event-location {
            width: 200px;
            flex-shrink: 0;
            color: #333;
            font-weight: 400;
            font-size: 14px;
        }

        .event-photographer {
            width: 180px;
            flex-shrink: 0;
            color: #333;
            font-weight: 400;
            font-size: 14px;
        }

        .event-client {
            flex: 1;
            color: #333;
            font-weight: 400;
            font-size: 14px;
        }

        .event-item-modern .badge {
            font-size: 11px;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
            margin-left: 8px;
        }

        /* Upcoming events styling */
        .upcoming-event-item {
            padding: 12px 0;
            border-bottom: 1px solid #ecf0f1;
            transition: all 0.2s ease;
        }

        .upcoming-event-item:last-child {
            border-bottom: none;
        }

        .upcoming-event-item:hover {
            padding-left: 10px;
            background-color: #f8f9fa;
        }

        .upcoming-event-date {
            font-size: 12px;
            color: #7f8c8d;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .upcoming-event-title {
            font-size: 14px;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .upcoming-event-time {
            font-size: 12px;
            color: #95a5a6;
        }

        .event-card .card-footer {
            background-color: white;
            border-top: 2px solid #ecf0f1;
            padding: 20px;
        }

        .upcoming-events-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        /* Event count table styling */
        #table_resume_event_count_container {
            padding: 15px;
        }

        .event-count-table {
            width: 100%;
            font-size: 12px;
        }

        .event-count-table th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
            padding: 8px 6px;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
            font-size: 11px;
        }

        .event-count-table td {
            padding: 6px;
            border-bottom: 1px solid #ecf0f1;
            color: #2c3e50;
        }

        .event-count-table tr:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }

        .event-count-table .date-col {
            font-weight: 500;
            font-size: 11px;
        }

        .event-count-table .qty-col {
            text-align: center;
            font-weight: 600;
            color: #3498db;
        }

        .event-count-title {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
<div class="row" style="padding-top:1%;">
    <div class="col-12 col-md-2">
        <div id="calendar_container">
            <div class="card">                                
                <div class="card-body">
                    <div class="custom-calendar">
                        <div class="calendar-header">
                            <div class="month-year" id="monthYear"></div>
                            <div class="calendar-nav">
                                <button id="prevMonth">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button id="nextMonth">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="calendar-weekdays">
                            <div class="calendar-weekday">S</div>
                            <div class="calendar-weekday">M</div>
                            <div class="calendar-weekday">T</div>
                            <div class="calendar-weekday">W</div>
                            <div class="calendar-weekday">T</div>
                            <div class="calendar-weekday">F</div>
                            <div class="calendar-weekday">S</div>
                        </div>
                        <div class="calendar-days" id="calendarDays"></div>
                    </div>
                </div>                
                <hr style="margin: 0 15px;">
                <div id="table_resume_event_count_container">

                </div>
                
            </div>

        </div>
    </div>
    <div class="col-12 col-md-10">
        <div class="card" style="border: none; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12); border-radius: 16px; overflow: hidden;">
            <div class="card-body" style="padding: 12px;">
                <div class="input-group" style="position: relative;">
                    <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); z-index: 10; color: #8e8e93;">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" 
                           class="form-control" 
                           id="searchInput" 
                           placeholder="Search" 
                           style="border: none; 
                                  background-color: #f2f2f7; 
                                  border-radius: 12px; 
                                  padding: 10px 16px 10px 44px; 
                                  font-size: 15px; 
                                  transition: all 0.2s ease;
                                  box-shadow: none;">
                </div>
            </div>
        </div>

        <div class="card event-card">
            <div class="card-header">
                <h3 class="card-title">Events for <span id="selectedDate">Today</span></h3>
            </div>
            <div class="card-body">
                <div id="eventList">
                    <p class="text-muted">Select a date to view events</p>
                </div>
            </div>
            <div class="card-footer">
                
                {{-- upcoming events --}}
                <div id="upcomingEvents">
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('[data-widget="pushmenu"]').PushMenu('toggle');

            // Fetch events from backend
            fetchPhotographerEvents();

            // Search functionality
            $('#searchButton').on('click', function() {
                performSearch();
            });

            $('#searchInput').on('keyup', function(e) {
                if (e.key === 'Enter') {
                    performSearch();
                } else {
                    // Real-time search on typing
                    performSearch();
                }
            });

            // Event row click handler
            $(document).on('click', '.event-details li[data-event-id]', function() {
                var eventId = $(this).data('event-id');
                viewEventDetails(eventId);
            });
        });        

        function viewEventDetails(eventId) {
            var event = allEventsData.find(e => e.id === eventId);
            if (!event) {
            toastr.error('Event not found');
            return;
            }

            // Additional services (if any)
            var additionals = event.additionals || [];
            var additionalsHtml = '';
            if (additionals.length > 0) {
            additionalsHtml = '<h6 class="mt-3">Additional Services:</h6><ul>';
            additionals.forEach(function(addon) {
                additionalsHtml += '<li>' + addon.description + ' - Rp ' + numberWithDotsSplit3(addon.price) + '</li>';
            });
            additionalsHtml += '</ul>';
            }

            // Event session time
            var eventSessionTime = '-';
            if (event.event_time && event.service_duration) {
            var startTime = moment(event.event_time, 'HH:mm:ss');
            var duration = parseFloat(event.service_duration);
            var hours = Math.floor(duration);
            var minutes = Math.round((duration - hours) * 60);
            var endTime = startTime.clone().add(hours, 'hours').add(minutes, 'minutes');
            eventSessionTime = startTime.format('HH:mm') + ' - ' + endTime.format('HH:mm');
            } else if (event.event_time) {
            eventSessionTime = event.event_time;
            }

            // Total price calculation
            var servicePrice = parseInt(event.service_price || 0);
            var additionalsTotal = additionals.reduce((sum, addon) => sum + parseInt(addon.price || 0), 0);
            var totalPrice = servicePrice + additionalsTotal;

            // Modal HTML
            var modalHtml = `
            <div class="modal fade" id="eventDetailModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="fas fa-calendar-alt"></i> Event Details</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                        <h6>👤 Client Information</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Name:</strong></td><td>${event.client_name || '-'}</td></tr>
                            <tr><td><strong>Phone:</strong></td><td>
                            ${event.client_phone ? '<a href="https://wa.me/' + (event.client_phone.startsWith('0') ? '62' + event.client_phone.substring(1) : event.client_phone) + '" target="_blank">' + event.client_phone + '</a>' : '-'}
                            </td></tr>
                            <tr><td><strong>Instagram:</strong></td><td>${event.client_instagram || '-'}</td></tr>
                        </table>
                        </div>
                        <div class="col-md-6">
                        <h6> 📅 Event Details</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Date:</strong></td><td>${event.event_date ? moment(event.event_date).format('DD MMMM YYYY') : '-'}</td></tr>
                            <tr><td><strong>Session:</strong></td><td>${eventSessionTime}</td></tr>
                            <tr><td><strong>City:</strong></td><td>${event.city || '-'}</td></tr>
                            <tr><td><strong>University:</strong></td><td>${event.university || '-'}</td></tr>
                            <tr><td><strong>Faculty:</strong></td><td>${event.faculty || '-'}</td></tr>
                            @if(auth()->check() && auth()->user()->role_code === 'admin')
                            <tr><td><strong>Photographer:</strong></td><td>${event.photographer_username ? (event.photographer_name + ' (' + event.photographer_username + ')') : '-'}</td></tr>
                            @endif
                        </table>
                        </div>
                    </div>
                    <hr>
                    <h6>📷 Paket</h6>
                    <div class="row">
                        <div class="col-md-7">
                        <p><strong>${event.service_package || '-'}</strong> - ${event.service_duration || '-'} jam<br>
                        Price: Rp ${numberWithDotsSplit3(servicePrice)}</p>
                        ${additionalsHtml}
                        </div>
                        <div class="col-md-5" style="border-left: 2px solid #dee2e6; padding-left: 20px;">
                        <p class="mb-1"><strong>Total Price</strong></p>
                        <h4 class="text-primary mb-0"><strong>Rp ${numberWithDotsSplit3(totalPrice)}</strong></h4>
                        <p class="mb-1 mt-3"><strong>Invoice</strong></p>
                        <a href="/events/${event.id}/invoice" class="btn btn-sm btn-warning" target="_blank">
                            <i class="fas fa-file-invoice"></i> Open Invoice
                        </a>
                        </div>
                    </div>
                    ${event.notes ? '<hr><h6>📝 Notes</h6><p>' + event.notes + '</p>' : ''}
                    <hr>
                    <p><strong>Status:</strong> ${getProgressBadge(event)}</p>
                    <div class="timeline">
                        <!-- DP -->
                        <div>
                        <i class="fas ${event.downpayment_at ? 'fa-check-circle bg-success' : 'fa-circle bg-secondary'}"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> ${event.downpayment_at ? moment(event.downpayment_at).format('DD MMM YYYY HH:mm') : 'Not yet paid'}</span>
                            <h3 class="timeline-header no-border">${event.downpayment_at ? '<span class="badge badge-success">DP Paid</span>' : '<span class="badge badge-secondary">DP Pending</span>'}</h3>
                        </div>
                        </div>
                        <!-- Lunas -->
                        <div>
                        <i class="fas ${event.paid_at ? 'fa-check bg-info' : 'fa-circle bg-secondary'}"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> ${event.paid_at ? moment(event.paid_at).format('DD MMM YYYY HH:mm') : 'Not yet paid'}</span>
                            <h3 class="timeline-header no-border">${event.paid_at ? '<span class="badge badge-info">Lunas</span>' : '<span class="badge badge-secondary">Payment Pending</span>'}</h3>
                        </div>
                        </div>
                        <!-- All Files -->
                        <div>
                        <i class="fas ${event.all_filled_at ? 'fa-folder-open bg-primary' : 'fa-circle bg-secondary'}"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> ${event.all_filled_at ? moment(event.all_filled_at).format('DD MMM YYYY HH:mm') : 'Not yet completed'}</span>
                            <h3 class="timeline-header no-border">${event.all_filled_at ? '<span class="badge badge-primary">All Files Ready</span>' : '<span class="badge badge-secondary">Files Pending</span>'}</h3>
                            <div class="timeline-body">
                            <div class="form-group">
                                <label for="drive_link">Google Drive Link:</label>
                                <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="drive_link_${event.id}" value="${event.link || ''}" placeholder="Enter Google Drive link">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="saveDriveLink(${event.id})">
                                    <i class="fas fa-save"></i> Save
                                    </button>
                                </div>
                                </div>
                                <small class="form-text text-muted">Leave empty to clear the link</small>
                            </div>
                            ${event.link ? '<p><a href="' + event.link + '" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-google-drive"></i> Open Files</a></p>' : ''}                                            
                            <a href="/events/${event.id}/edit-files" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> List File to Edit
                            </a>
                            </div>
                        </div>
                        </div>
                        <!-- All Done -->
                        <div>
                        <i class="fas ${event.all_done_at ? 'fa-check-circle bg-success' : 'fa-circle bg-secondary'}"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> ${event.all_done_at ? moment(event.all_done_at).format('DD MMM YYYY HH:mm') : 'Not yet completed'}</span>
                            <h3 class="timeline-header no-border">${event.all_done_at ? '<span class="badge badge-success">All Done</span>' : '<span class="badge badge-secondary">Not Completed</span>'}</h3>
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
            $('#eventDetailModal').modal('show');
            $('#eventDetailModal').on('hidden.bs.modal', function () {
            $(this).remove();
            });
        }

        // Helper for progress badge (status)
        function getProgressBadge(event) {
            if (event.cancelled_at) {
            return '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> CANCELLED</span>';
            } else if (event.all_done_at) {
            return '<span class="badge badge-success"><i class="fas fa-check-circle"></i> ALL DONE</span>';
            } else if (event.all_filled_at) {
            return '<span class="badge badge-primary"><i class="fas fa-folder-open"></i> ALL FILES</span>';
            } else if (event.paid_at) {
            return '<span class="badge badge-info"><i class="fas fa-check"></i> LUNAS</span>';
            } else if (event.downpayment_at) {
            return '<span class="badge" style="background-color: #e83e8c; color: white;"><i class="fas fa-dollar-sign"></i> DP</span>';
            } else {
            return '<span class="badge badge-secondary"><i class="fas fa-hourglass-half"></i> WAITING</span>';
            }
        }

        // Helper for price formatting
        function numberWithDotsSplit3(x) {
            if (!x) return '0';
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function fetchPhotographerEvents() {
            $.ajax({
                url: '{{ route("overview.photographerEvents") }}',
                type: 'GET',
                data: {
                    year: new Date().getFullYear()
                },
                success: function(response) {
                    if (response.status === 'success') {
                        allEventsData = response.events;
                        
                        // Initialize custom calendar
                        const calendar = new CustomCalendar();
                        calendar.init();
                        
                        // Load upcoming events
                        loadUpcomingEvents();
                        
                        // Generate event count table
                        generateEventCountTable();
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching events:', xhr.responseText);
                    allEventsData = [];
                    
                    // Initialize calendar even if no data
                    const calendar = new CustomCalendar();
                    calendar.init();
                }
            });
        }

        class CustomCalendar {
            constructor() {
                this.currentDate = new Date();
                this.selectedDate = null;
                this.monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                                 'July', 'August', 'September', 'October', 'November', 'December'];
            }

            getEventsForDay(year, month, day) {
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                return allEventsData.filter(event => event.event_date === dateStr);
            }

            getColorForEventCount(count) {
                if (count === 0) return { bg: 'transparent', text: '#2c3e50' };
                
                // Gradient from light blue to dark purple based on count
                if (count === 1) return { bg: '#e3f2fd', text: '#2c3e50' };
                if (count === 2) return { bg: '#bbdefb', text: '#2c3e50' };
                if (count === 3) return { bg: '#90caf9', text: '#2c3e50' };
                if (count === 4) return { bg: '#64b5f6', text: '#2c3e50' };
                if (count === 5) return { bg: '#42a5f5', text: '#2c3e50' };
                if (count === 6) return { bg: '#2196f3', text: '#2c3e50' };
                if (count === 7) return { bg: '#1e88e5', text: '#ffffff' };
                if (count === 8) return { bg: '#1976d2', text: '#ffffff' };
                if (count === 9) return { bg: '#1565c0', text: '#ffffff' };
                if (count >= 10 && count < 15) return { bg: '#0d47a1', text: '#ffffff' };
                if (count >= 15 && count < 20) return { bg: '#512da8', text: '#ffffff' };
                if (count >= 20) return { bg: '#311b92', text: '#ffffff' };
                
                return { bg: 'transparent', text: '#2c3e50' };
            }

            init() {
                this.render();
                this.attachEventListeners();
            }

            attachEventListeners() {
                const self = this;
                
                $('#prevMonth').on('click', function() {
                    self.currentDate.setMonth(self.currentDate.getMonth() - 1);
                    self.render();
                });

                $('#nextMonth').on('click', function() {
                    self.currentDate.setMonth(self.currentDate.getMonth() + 1);
                    self.render();
                });

                $(document).on('click', '.calendar-day:not(.disabled)', function() {
                    const day = parseInt($(this).text());
                    const year = self.currentDate.getFullYear();
                    const month = self.currentDate.getMonth();
                    
                    self.selectedDate = new Date(year, month, day);
                    
                    // Update selected state
                    $('.calendar-day').removeClass('selected');
                    $(this).addClass('selected');
                    
                    // Update selected date display
                    const dateStr = self.formatDate(self.selectedDate);
                    $('#selectedDate').text(dateStr);
                    
                    // Load events
                    loadEventsForDate(self.formatDateForEvents(self.selectedDate));
                });
            }

            render() {
                const year = this.currentDate.getFullYear();
                const month = this.currentDate.getMonth();
                
                // Update month/year display
                $('#monthYear').text(`${this.monthNames[month]} ${year}`);
                
                // Get first day of month and number of days
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const daysInPrevMonth = new Date(year, month, 0).getDate();
                
                // Get today's date
                const today = new Date();
                const isCurrentMonth = (today.getMonth() === month && today.getFullYear() === year);
                
                let html = '';
                
                // Previous month days
                for (let i = firstDay - 1; i >= 0; i--) {
                    const day = daysInPrevMonth - i;
                    html += `<div class="calendar-day disabled">${day}</div>`;
                }
                
                // Current month days
                for (let day = 1; day <= daysInMonth; day++) {
                    let classes = 'calendar-day';
                    
                    // Get events for this day
                    const dayEvents = this.getEventsForDay(year, month, day);
                    const eventCount = dayEvents.length;
                    const colors = this.getColorForEventCount(eventCount);
                    
                    let styles = '';
                    if (eventCount > 0) {
                        styles = `style="background-color: ${colors.bg}; color: ${colors.text};"`;
                    }
                    
                    if (isCurrentMonth && day === today.getDate()) {
                        classes += ' today';
                    }
                    
                    if (this.selectedDate && 
                        day === this.selectedDate.getDate() && 
                        month === this.selectedDate.getMonth() && 
                        year === this.selectedDate.getFullYear()) {
                        classes += ' selected';
                    }
                    
                    html += `<div class="${classes}" ${styles}>${day}</div>`;
                }
                
                // Next month days to fill grid
                const totalCells = Math.ceil((firstDay + daysInMonth) / 7) * 7;
                const remainingCells = totalCells - (firstDay + daysInMonth);
                
                for (let day = 1; day <= remainingCells; day++) {
                    html += `<div class="calendar-day disabled">${day}</div>`;
                }
                
                $('#calendarDays').html(html);
            }

            formatDate(date) {
                const months = ['January', 'February', 'March', 'April', 'May', 'June',
                              'July', 'August', 'September', 'October', 'November', 'December'];
                return `${months[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
            }

            formatDateForEvents(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
        }

        var allEventsData = [];

        function performSearch() {
            var searchQuery = $('#searchInput').val().toLowerCase().trim();
            
            if (searchQuery === '') {
                // If search is empty, show all upcoming events
                loadUpcomingEvents();
                $('#selectedDate').text('Search Results');
                return;
            }

            // Filter events based on search query
            var filteredEvents = allEventsData.filter(function(event) {
                var clientName = (event.client_shortname || event.client_name || '').toLowerCase();
                var city = (event.city || '').toLowerCase();
                var university = (event.university || '').toLowerCase();
                var location = (event.location || '').toLowerCase();
                var eventType = (event.event_type || '').toLowerCase();
                var eventDate = (event.event_date || '').toLowerCase();
                
                return clientName.includes(searchQuery) ||
                       city.includes(searchQuery) ||
                       university.includes(searchQuery) ||
                       location.includes(searchQuery) ||
                       eventType.includes(searchQuery) ||
                       eventDate.includes(searchQuery);
            });

            // Update the event list with filtered results
            var eventList = $('#eventList');
            eventList.empty();
            
            if (filteredEvents.length > 0) {
                $('#selectedDate').text('Search Results (' + filteredEvents.length + ' events found)');
                var html = generateEventHTML(filteredEvents);
                eventList.append(html);
            } else {
                $('#selectedDate').text('Search Results');
                eventList.html('<p class="text-muted text-center" style="padding: 40px 0;">No events found matching "' + $('#searchInput').val() + '"</p>');
            }

            // Clear calendar selection
            $('.calendar-day').removeClass('selected');
        }

        function generateEventHTML(events) {
            // Group events by date
            var eventsByDate = {};
            events.forEach(function(event) {
                if (!eventsByDate[event.event_date]) {
                    eventsByDate[event.event_date] = [];
                }
                eventsByDate[event.event_date].push(event);
            });
            
            var html = '';

            // theadings
            html += '<div class="event-item-header">' +
                    '<div class="event-row">' +
                    '<div class="event-date"></div>' +
                    '<div class="event-details">' +
                    '<ul>' +                    
                    '<li><span class="event-time">Time</span><span class="event-client">Client</span><span class="event-location">Location</span><span class="event-university">University</span><span class="event-city">City</span><span class="event-photographer">Photographer</span></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                    
            
            // Create HTML for each date group
            Object.keys(eventsByDate).forEach(function(dateKey) {
                var dateEvents = eventsByDate[dateKey];
                var eventDate = new Date(dateKey);
                var formattedDate = formatShortDate(eventDate);                
                
                var eventsHtml = '';
                
                dateEvents.forEach(function(event) {
                    var clientName = event.client_shortname || event.client_name;
                    var city = event.city || '';
                    var university = event.university || '';
                    var location = event.location || 'Location TBD';
                    var photographer = event.photographer_username || 'Unassigned';

                    // Calculate event session time
                    var eventSessionTime = '-';
                    if (event.event_time && event.service_duration) {
                        var startTime = moment(event.event_time, 'HH:mm:ss');
                        var endTime = startTime.clone().add(Math.floor(event.service_duration), 'hours').add((event.service_duration % 1) * 60, 'minutes');
                        eventSessionTime = startTime.format('HH:mm') + ' - ' + endTime.format('HH:mm');
                    } else if (event.event_time) {
                        eventSessionTime = event.event_time;
                    }

                    eventsHtml += '<li data-event-id="' + event.id + '" style="cursor: pointer;">' +
                        '<span class="event-time">' + eventSessionTime + '</span>' +
                        '<span class="event-client">' + clientName + '</span>' +
                        '<span class="event-location">' + location + '</span>' +
                        '<span class="event-university">' + university + '</span>' +
                        '<span class="event-city">' + city + '</span>' +
                        '<span class="event-photographer">' + photographer + '</span>' +
                        '</li>';
                });
                
                html += '<div class="event-item-modern">' +
                        '<div class="event-row">' +
                        '<div class="event-date">' + formattedDate + '</div>' +
                        '<div class="event-details"><ul>' + eventsHtml + '</ul></div>' +
                        '</div>' +
                        '</div>';
            });
            
            return html;
        }

        function loadEventsForDate(date) {
            var eventList = $('#eventList');
            eventList.empty();
            
            var dayEvents = allEventsData.filter(function(event) {
                return event.event_date === date;
            });
            
            if (dayEvents.length > 0) {
                var html = generateEventHTML(dayEvents);
                eventList.append(html);
            } else {
                eventList.html('<p class="text-muted text-center" style="padding: 40px 0;">No events scheduled for this date</p>');
            }
        }

        function formatShortDate(date) {
            const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN',
                          'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
            const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
            
            return date.getDate() + ' ' + months[date.getMonth()] + ', ' + days[date.getDay()];
        }

        function getEventStatus(event) {
            if (event.settled_at) return 'completed';
            if (event.invoice_at) return 'confirmed';
            if (event.downpayment_at) return 'confirmed';
            return 'pending';
        }

        function loadUpcomingEvents() {
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            // Filter upcoming events (today and future)
            var upcomingEvents = allEventsData.filter(function(event) {
                var eventDate = new Date(event.event_date);
                return eventDate >= today;
            });

            // Sort by date
            upcomingEvents.sort(function(a, b) {
                return new Date(a.event_date) - new Date(b.event_date);
            });

            var upcomingEventsContainer = $('#upcomingEvents');
            upcomingEventsContainer.empty();

            if (upcomingEvents.length > 0) {
                var html = '<div class="upcoming-events-title">Upcoming Events</div>';
                html += generateEventHTML(upcomingEvents);
                upcomingEventsContainer.html(html);
            } else {
                upcomingEventsContainer.html('<p class="text-muted text-center">No upcoming events</p>');
            }
        }

        function formatEventDate(date) {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            
            return days[date.getDay()] + ', ' + months[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
        }

        function generateEventCountTable() {
            // Count events per date
            var eventCounts = {};
            allEventsData.forEach(function(event) {
                if (event.event_date) {
                    if (!eventCounts[event.event_date]) {
                        eventCounts[event.event_date] = 0;
                    }
                    eventCounts[event.event_date]++;
                }
            });

            // Sort dates
            var sortedDates = Object.keys(eventCounts).sort();

            // Generate table HTML
            var html = '<div class="event-count-title">Event Summary</div>';
            html += '<table class="event-count-table">';
            html += '<thead>';
            html += '<tr>';
            html += '<th>Date</th>';
            html += '<th style="text-align: center;">Qty</th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';

            sortedDates.forEach(function(dateKey) {
                var date = new Date(dateKey);
                var formattedDate = date.getDate() + ' ' + 
                                  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][date.getMonth()];
                var qty = eventCounts[dateKey];

                html += '<tr class="event-count-row" data-date="' + dateKey + '">';
                html += '<td class="date-col">' + formattedDate + '</td>';
                html += '<td class="qty-col">' + qty + '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';

            $('#table_resume_event_count_container').html(html);

            // Add click handler for table rows
            $(document).on('click', '.event-count-row', function() {
                var dateKey = $(this).data('date');
                var date = new Date(dateKey);
                
                // Update calendar to show the month of this date
                const calendar = new CustomCalendar();
                calendar.currentDate = new Date(date.getFullYear(), date.getMonth(), 1);
                calendar.selectedDate = date;
                calendar.render();
                
                // Update selected date display
                $('#selectedDate').text(calendar.formatDate(date));
                
                // Load events for this date
                loadEventsForDate(dateKey);
                
                // Scroll to event list
                $('html, body').animate({
                    scrollTop: $('.event-card').offset().top - 20
                }, 500);
            });
        }

        function saveDriveLink(projectId) {
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
                        
                        // Update the event data in allEventsData
                        var eventIndex = allEventsData.findIndex(e => e.id === projectId);
                        if (eventIndex >= 0) {
                            allEventsData[eventIndex].link = driveLink;
                        }
                        
                        // Refresh the details modal if it's open
                        if ($('#eventDetailModal').length) {
                            $('#eventDetailModal').modal('hide');
                            setTimeout(function() {
                                viewEventDetails(projectId);
                            }, 300);
                        }
                    } else {
                        toastr.error(response.message || 'Failed to save Google Drive link');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to save Google Drive link: ' + error);
                }
            });
        }
    </script>
@endsection
