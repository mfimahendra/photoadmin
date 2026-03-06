@extends('layouts.guest')

@section('styles')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Libertinus+Serif+Display&family=Petit+Formal+Script&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background: #fafbfc;
        color: #333;
        min-height: 100vh;
        padding: 20px 0;
    }

    .progress-card {
        max-width: 900px;
        margin: 15px auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.06);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .card-header-custom {
        background: white;
        color: #222;
        padding: 40px 60px 30px;
        text-align: center;
        border-bottom: 1px solid #e8e8e8;
    }

    .card-header-custom .logo {
        max-width: 120px;
        margin-bottom: 20px;
    }

    .card-header-custom h2 {
        font-family: 'Libertinus Serif Display', serif;
        margin: 0;
        font-weight: 600;
        font-size: 2.5rem;
        color: #222;
        letter-spacing: 3px;
    }

    .card-header-custom p {
        margin: 12px 0 0;
        color: #888;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
    }

    .card-body-custom {
        padding: 50px 60px;
    }

    .info-section {
        margin-bottom: 30px;
    }

    .info-section h6 {
        font-family: 'Libertinus Serif Display', serif;
        color: #222;
        font-weight: 500;
        font-size: 1.5rem;
        margin-bottom: 24px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-section h6 i {
        font-size: 1.3rem;
        color: #222;
    }

    .info-table {
        width: 100%;
        margin-bottom: 0;
    }

    .info-table td {
        padding: 10px 0;
        border: none;
        font-size: 15px;
    }

    .info-table td:first-child {
        font-weight: 500;
        color: #555;
        width: 150px;
    }

    .info-table td:last-child {
        color: #333;
    }

    .price-box {
        background: #f7f7f7;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        margin-top: 20px;
        border: 1.5px solid #e0e0e0;
    }

    .price-box .price-label {
        font-size: 0.88rem;
        color: #555;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .price-box .price-amount {
        font-size: 32px;
        font-weight: 700;
        color: #222;
        margin: 0;
    }

    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 30px;
        top: 0;
        bottom: 0;
        width: 4px;
        background: #e0e0e0;
    }

    .timeline > div {
        position: relative;
        margin-bottom: 30px;
        padding-left: 70px;
    }

    .timeline > div:last-child {
        margin-bottom: 0;
    }

    .timeline > div > i {
        position: absolute;
        left: 17px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        z-index: 2;
    }

    .timeline .bg-success {
        background-color: #28a745 !important;
    }

    .timeline .bg-warning {
        background-color: #ffc107 !important;
    }

    .timeline .bg-info {
        background-color: #17a2b8 !important;
    }

    .timeline .bg-primary {
        background-color: #222 !important;
    }

    .timeline .bg-secondary {
        background-color: #6c757d !important;
    }

    .timeline .bg-gray {
        background-color: #adb5bd !important;
    }

    .timeline-item {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
    }

    .timeline-item .time {
        font-size: 13px;
        color: #6c757d;
        display: block;
        margin-bottom: 10px;
    }

    .timeline-item h3 {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 15px;
        color: #222;
    }

    .timeline-body {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #dee2e6;
    }

    .badge {
        font-size: 13px;
        padding: 8px 15px;
        font-weight: 600;
        border-radius: 20px;
    }

    .drive-link-box {
        background: white;
        border: 2px solid #222;
        border-radius: 12px;
        padding: 20px;
        margin-top: 15px;
        text-align: center;
    }

    .drive-link-box i {
        font-size: 28px;
        color: #222;
        margin-bottom: 15px;
    }

    .btn-drive {
        background: #222;
        color: white;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
        margin: 5px;
    }

    .btn-drive:hover {
        background: #000;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        color: white;
        text-decoration: none;
    }

    .notes-box {
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px 20px;
        border-radius: 5px;
        margin: 10px 0;
    }

    .notes-box strong {
        color: #856404;
    }

    .notes-box p {
        margin: 5px 0 0;
        color: #856404;
    }

    hr {
        border: none;
        border-top: 1px solid #e8e8e8;
        margin: 40px 0;
    }

    .status-badge {
        display: inline-block;
        font-size: 0.95rem;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .bg-purple {
        background-color: #6f42c1;
        color: white;
    }

    @media (max-width: 991px) {
        .progress-card {
            margin: 30px 20px;
        }

        .card-header-custom {
            padding: 35px 30px 25px;
        }

        .card-body-custom {
            padding: 35px 30px;
        }

        .info-table td:first-child {
            width: 120px;
        }

        .price-box .price-amount {
            font-size: 24px;
        }

        .card-header-custom h2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .card-header-custom {
            padding: 25px 20px;
        }

        .card-body-custom {
            padding: 25px 20px;
        }

        .card-header-custom h2 {
            font-size: 1.6rem;
        }

        .info-section h6 {
            font-size: 1.2rem;
        }

        .btn-drive {
            padding: 10px 24px;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    @foreach($projects as $project)
    <div class="progress-card">
        <div class="card-header-custom">
            <img src="{{ asset('images/icon/esokhari.png') }}" alt="Esokhari Logo" class="logo">
            <h2>PROGRESS BOOKING</h2>
            <p>{{ $project->client_name }}</p>
        </div>
        <div class="card-body-custom">
            <!-- Personal & Event Information -->
            <div class="row info-section">
                <div class="col-md-6">
                    <h6><i class="fas fa-user"></i> Personal Information</h6>
                    <table class="info-table">
                        <tr>
                            <td>Name</td>
                            <td>: {{ $project->client_name }}</td>
                        </tr>
                        <tr>
                            <td>Nickname</td>
                            <td>: {{ $project->client_shortname ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Instagram</td>
                            <td>: {{ $project->client_instagram ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-calendar-alt"></i> Event Details</h6>
                    <table class="info-table">
                        <tr>
                            <td>Date</td>
                            <td>: {{ \Carbon\Carbon::parse($project->event_date)->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Session</td>
                            <td>: 
                                @if($project->event_time && $project->service_duration)
                                    {{ \Carbon\Carbon::parse($project->event_time)->format('H:i') }} - 
                                    {{ \Carbon\Carbon::parse($project->event_time)->addHours(floor($project->service_duration))->addMinutes(($project->service_duration - floor($project->service_duration)) * 60)->format('H:i') }}
                                @else
                                    {{ $project->event_time ?? '-' }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>: {{ $project->city }}</td>
                        </tr>
                        <tr>
                            <td>University</td>
                            <td>: {{ $project->university }}</td>
                        </tr>
                        <tr>
                            <td>Faculty</td>
                            <td>: {{ $project->faculty ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <!-- Package Information -->
            <div class="info-section">
                <h6><i class="fas fa-camera"></i> Paket</h6>
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>{{ $project->service_package }}</strong> - {{ $project->service_duration }} jam</p>
                        <p>Price: Rp {{ number_format($project->service_price, 0, ',', '.') }}</p>                        
                        
                        @if(count($project->additionals) > 0)
                            <h6 class="mt-3">Additional Services:</h6>

                            {{-- @php
                                dd($project->additionals);    
                            @endphp --}}
                            <ul>
                                @foreach($project->additionals as $addon)
                                    <li>{{ $addon->description }} - Rp {{ number_format($addon->price, 0, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="price-box">
                            <div class="price-label">Total Price</div>
                            <h3 class="price-amount">
                                Rp {{ number_format($project->service_price + collect($project->additionals)->sum('price'), 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            @if($project->notes)
            <div class="notes-box">
                <strong><i class="fas fa-sticky-note"></i> Notes</strong>
                <p>{{ $project->notes }}</p>
            </div>
            @endif

            <hr>

            <!-- Progress Timeline -->
            <div class="info-section">
                <h6><i class="fas fa-tasks"></i> Progress Status</h6>
                <p>
                    <strong>Current Status:</strong> 
                    @if($project->cancelled_at)
                        <span class="badge badge-danger status-badge"><i class="fas fa-times-circle"></i> CANCELLED</span>
                    @elseif($project->all_done_at)
                        <span class="badge badge-success status-badge"><i class="fas fa-check-circle"></i> ALL DONE</span>
                    @elseif($project->all_filled_at)
                        <span class="badge bg-purple status-badge"><i class="fas fa-folder-open"></i> ALL FILES</span>
                    @elseif($project->paid_at)
                        <span class="badge badge-info status-badge"><i class="fas fa-check"></i> LUNAS</span>
                    @elseif($project->invoiced_at)
                        <span class="badge badge-warning status-badge"><i class="fas fa-file-invoice"></i> INVOICE</span>
                    @elseif($project->downpayment_at)
                        <span class="badge status-badge" style="background-color: #e83e8c; color: white;"><i class="fas fa-dollar-sign"></i> DP</span>
                    @else
                        <span class="badge badge-secondary status-badge"><i class="fas fa-hourglass-half"></i> WAITING</span>
                    @endif
                </p>

                <div class="timeline">
                    <!-- DP -->
                    <div>
                        <i class="fas {{ $project->downpayment_at ? 'fa-check-circle bg-success' : 'fa-circle bg-secondary' }}"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fas fa-clock"></i> 
                                {{ $project->downpayment_at ? \Carbon\Carbon::parse($project->downpayment_at)->format('d M Y H:i') : 'Not yet paid' }}
                            </span>
                            <h3 class="timeline-header no-border">
                                @if($project->downpayment_at)
                                    <span class="badge badge-success">DP Paid</span>
                                @else
                                    <span class="badge badge-secondary">DP Pending</span>
                                @endif
                            </h3>
                        </div>
                    </div>

                    <!-- Invoice -->
                    <div>
                        <i class="fas {{ $project->invoiced_at ? 'fa-file-invoice bg-warning' : 'fa-circle bg-secondary' }}"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fas fa-clock"></i> 
                                {{ $project->invoiced_at ? \Carbon\Carbon::parse($project->invoiced_at)->format('d M Y H:i') : 'Not yet invoiced' }}
                            </span>
                            <h3 class="timeline-header no-border">
                                @if($project->invoiced_at)
                                    <span class="badge badge-warning">Invoiced</span>
                                @else
                                    <span class="badge badge-secondary">Invoice Pending</span>
                                @endif
                            </h3>
                        </div>
                    </div>

                    <!-- Lunas -->
                    <div>
                        <i class="fas {{ $project->paid_at ? 'fa-check bg-info' : 'fa-circle bg-secondary' }}"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fas fa-clock"></i> 
                                {{ $project->paid_at ? \Carbon\Carbon::parse($project->paid_at)->format('d M Y H:i') : 'Not yet paid' }}
                            </span>
                            <h3 class="timeline-header no-border">
                                @if($project->paid_at)
                                    <span class="badge badge-info">Lunas</span>
                                @else
                                    <span class="badge badge-secondary">Payment Pending</span>
                                @endif
                            </h3>
                        </div>
                    </div>

                    <!-- All Files -->
                    <div>
                        <i class="fas {{ $project->all_filled_at ? 'fa-folder-open bg-primary' : 'fa-circle bg-secondary' }}"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fas fa-clock"></i> 
                                {{ $project->all_filled_at ? \Carbon\Carbon::parse($project->all_filled_at)->format('d M Y H:i') : 'Not yet completed' }}
                            </span>
                            <h3 class="timeline-header no-border">
                                @if($project->all_filled_at)
                                    <span class="badge bg-purple">All Files Ready</span>
                                @else
                                    <span class="badge badge-secondary">Files Pending</span>
                                @endif
                            </h3>
                            @php
                                // client only can select files to edit 14 days since $project->event_date
                                // client only could open files from gdrive 1 month since $project->event_date
                                $eventDate = \Carbon\Carbon::parse($project->event_date);
                                $canSelectFiles = now()->lessThanOrEqualTo($eventDate->copy()->addDays(14));
                                $canOpenFiles = now()->lessThanOrEqualTo($eventDate->copy()->addMonth());
                            @endphp

                            {{-- preview terms in here --}}
                            @if($project->all_filled_at)
                                <div class="timeline-body">
                                    <div class="notes-box" style="background: #e7f3ff; border-left: 4px solid #2196F3;">
                                        <strong style="color: #1565C0;"><i class="fas fa-info-circle"></i> Important Information</strong>
                                        <p style="color: #1565C0; margin-top: 10px;">
                                            <strong>Current Date:</strong> {{ now()->format('d F Y') }}<br>
                                            <strong>Event Date:</strong> {{ $eventDate->format('d F Y') }}<br><br>
                                            
                                            <strong>Terms & Conditions:</strong>
                                        </p>
                                        <ul style="color: #1565C0; margin: 10px 0 0 20px;">
                                            <li><strong>File Selection:</strong> Available until {{ $eventDate->copy()->addDays(14)->format('d F Y') }} (14 days after event)</li>
                                            <li><strong>File Access:</strong> Available until {{ $eventDate->copy()->addMonth()->format('d F Y') }} (1 month after event)</li>
                                            @if(!$canSelectFiles)
                                                <li style="color: #d32f2f;"><strong>Note:</strong> Selection period has expired</li>
                                            @endif
                                            @if(!$canOpenFiles)
                                                <li style="color: #d32f2f;"><strong>Note:</strong> Access period has expired</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endif


                            @if($project->link && $project->all_filled_at)
                                <div class="timeline-body">
                                    <div class="drive-link-box">
                                        <i class="fab fa-google-drive"></i>
                                        <h5>Your Files are Ready!</h5>
                                        <p>Click the button below to access your files</p>
                                        
                                        @if($canOpenFiles)
                                            <a href="{{ $project->link }}" target="_blank" class="btn-drive">
                                                <i class="fab fa-google-drive text-white"></i> Open Files
                                            </a>
                                        @else
                                            <button class="btn-drive" disabled style="opacity: 0.6; cursor: not-allowed;">
                                                <i class="fab fa-google-drive text-white"></i> Link Expired (1 month limit)
                                            </button>
                                        @endif
                                        
                                        @if($canSelectFiles)
                                            <a href="{{ url('esokhari-select-images/' . $project->event_date . '/' . $shortname) }}" target="_blank" class="btn-drive">
                                                <i class="fa-solid fa-object-group text-white"></i>
                                                Select Files to Edit
                                            </a>
                                        @else
                                            <button class="btn-drive" disabled style="opacity: 0.6; cursor: not-allowed;">
                                                <i class="fa-solid fa-object-group text-white"></i>
                                                Selection Period Expired (14 days limit)
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @elseif($project->paid_at)
                                <div class="timeline-body">
                                    <div class="notes-box" style="background: #d1ecf1; border-left: 4px solid #17a2b8;">
                                        <strong style="color: #0c5460;"><i class="fas fa-hourglass-half"></i> Waiting Admin for Uploading</strong>
                                        <p style="color: #0c5460;">Please kindly wait while we upload your files.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- All Done -->
                    <div>
                        <i class="fas {{ $project->all_done_at ? 'fa-check-circle bg-success' : 'fa-circle bg-secondary' }}"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fas fa-clock"></i> 
                                {{ $project->all_done_at ? \Carbon\Carbon::parse($project->all_done_at)->format('d M Y H:i') : 'Not yet completed' }}
                            </span>
                            <h3 class="timeline-header no-border">
                                @if($project->all_done_at)
                                    <span class="badge badge-success">All Done</span>
                                @else
                                    <span class="badge badge-secondary">Not Completed</span>
                                @endif
                            </h3>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
            <hr style="margin: 0 15px;">
            
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
@endsection