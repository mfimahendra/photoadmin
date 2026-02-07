@extends('layouts.guest')

@section('styles')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px 0;
    }

    .progress-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .card-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }

    .card-header-custom h2 {
        margin: 0;
        font-weight: 700;
        font-size: 28px;
    }

    .card-header-custom p {
        margin: 10px 0 0;
        opacity: 0.9;
        font-size: 16px;
    }

    .card-body-custom {
        padding: 40px;
    }

    .info-section {
        margin-bottom: 30px;
    }

    .info-section h6 {
        color: #667eea;
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
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
        font-weight: 600;
        color: #666;
        width: 150px;
    }

    .info-table td:last-child {
        color: #333;
    }

    .price-box {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        margin-top: 20px;
    }

    .price-box .price-label {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .price-box .price-amount {
        font-size: 32px;
        font-weight: 700;
        color: #667eea;
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
        background-color: #667eea !important;
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
        border: 2px solid #667eea;
        border-radius: 10px;
        padding: 20px;
        margin-top: 15px;
        text-align: center;
    }

    .drive-link-box i {
        font-size: 28px;
        color: #667eea;
        margin-bottom: 15px;
    }

    .btn-drive {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-drive:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    .notes-box {
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px 20px;
        border-radius: 5px;
        margin: 20px 0;
    }

    .notes-box strong {
        color: #856404;
    }

    .notes-box p {
        margin: 5px 0 0;
        color: #856404;
    }

    hr {
        border-top: 2px solid #e9ecef;
        margin: 30px 0;
    }

    .status-badge {
        display: inline-block;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .card-body-custom {
            padding: 20px;
        }

        .info-table td:first-child {
            width: 120px;
        }

        .price-box .price-amount {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    @foreach($projects as $project)
    <div class="progress-card">
        <div class="card-header-custom">
            <h2><i class="fas fa-calendar-check"></i> Progress Booking</h2>
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
                            <td>Panggilan</td>
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
                        <span class="badge badge-primary status-badge"><i class="fas fa-folder-open"></i> ALL FILES</span>
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
                                    <span class="badge badge-primary">All Files Ready</span>
                                @else
                                    <span class="badge badge-secondary">Files Pending</span>
                                @endif
                            </h3>
                            @if($project->drive_link)
                            <div class="timeline-body">
                                <div class="drive-link-box">
                                    <i class="fab fa-google-drive"></i>
                                    <h5>Your Files are Ready!</h5>
                                    <p>Click the button below to access your files</p>
                                    <a href="{{ $project->drive_link }}" target="_blank" class="btn-drive">
                                        <i class="fab fa-google-drive text-white"></i> Open Files
                                    </a>
                                    <a href="#" target="_blank" class="btn-drive">
                                        <i class="fa-solid fa-object-group text-white"></i>
                                        Select Files to Edit
                                    </a>
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
            {{-- Chat Admin & Chat Photographers --}}
            <div class="row mt-4">
                <div class="col-md-6 text-center">
                    <a href="https://wa.me/?text=Halo%20Admin%2C%20saya%20{{ urlencode($project->client_name) }}%20ingin%20bertanya%20tentang%20progres%20foto%20saya." target="_blank" class="btn-drive">
                        <i class="fas fa-headset text-white"></i> Chat Admin
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="https://wa.me/?text=Halo%20Photographer%2C%20saya%20{{ urlencode($project->client_name) }}%20ingin%20bertanya%20tentang%20progres%20foto%20saya." target="_blank" class="btn-drive">
                        <i class="fas fa-camera text-white"></i> Chat Photographer
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
@endsection