@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Summary Cards -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- Total Projects -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalProjectsThisYear }}</h3>
                        <p>Projects This Year</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <a href="{{ route('projects.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Upcoming Events -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $upcomingEvents }}</h3>
                        <p>Upcoming Events (30 Days)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <a href="{{ route('overview') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Revenue This Month -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Rp {{ number_format($totalRevenueMonth / 1000, 0) }}K</h3>
                        <p>Revenue This Month</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Total: Rp {{ number_format($totalRevenueMonth, 0) }}
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- Completed Projects -->
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $completedProjects }}</h3>
                        <p>Completed Projects</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <a href="{{ route('projects.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Status Overview -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="info-box bg-gradient-danger">
                    <span class="info-box-icon"><i class="fas fa-coins"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending Payment</span>
                        <span class="info-box-number">{{ $pendingPayment }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="info-box bg-gradient-purple">
                    <span class="info-box-icon"><i class="fas fa-folder-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending Files</span>
                        <span class="info-box-number">{{ $pendingFiles }}</span>
                    </div>
                </div>
            </div>

            @if($isAdmin)
            <div class="col-lg-3 col-6">
                <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="fas fa-camera"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Active Photographers</span>
                        <span class="info-box-number">{{ $activePhotographers }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Monthly Bookings Chart -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Monthly Bookings - {{ date('Y') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative">
                            <canvas id="monthlyBookingsChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Distribution Chart -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Project Status Distribution</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="statusChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables Row -->
        <div class="row">
            <!-- Upcoming Events -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-calendar-day mr-1"></i>
                            Upcoming Events
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Package</th>
                                    <th>Location</th>
                                    @if($isAdmin)
                                    <th>Photographer</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($upcomingEventsList as $event)
                                <tr>
                                    <td>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</small>
                                        <br>
                                        <small class="text-primary">{{ $event->event_time ?? '-' }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $event->client_shortname ?? $event->client_name }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $event->event ?? 'N/A' }}</small>
                                    </td>
                                    <td><small>{{ Str::limit($event->service_package, 20) }}</small></td>
                                    <td><small>{{ $event->university ?? $event->service_city }}</small></td>
                                    @if($isAdmin)
                                    <td>
                                        @if($event->photographer_name)
                                            <span class="badge badge-info">{{ $event->photographer_name }}</span>
                                        @else
                                            <span class="badge badge-secondary">Unassigned</span>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ $isAdmin ? 5 : 4 }}" class="text-center text-muted py-4">
                                        <i class="fas fa-calendar-times fa-2x mb-2"></i>
                                        <br>
                                        No upcoming events
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($upcomingEventsList->count() > 0)
                    <div class="card-footer text-center">
                        <a href="{{ route('overview') }}" class="text-uppercase">View All Events</a>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Recent Projects -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-history mr-1"></i>
                            Recent Projects
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Event Date</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProjects as $project)
                                <tr>
                                    <td>
                                        <strong>{{ $project->client_name }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $project->client_phone }}</small>
                                    </td>
                                    <td>
                                        <small>{{ \Carbon\Carbon::parse($project->event_date)->format('d M Y') }}</small>
                                    </td>
                                    <td><small>{{ Str::limit($project->service_package, 15) }}</small></td>
                                    <td>
                                        @if($project->all_done_at)
                                            <span class="badge badge-success"><i class="fas fa-check-circle"></i> Done</span>
                                        @elseif($project->all_filled_at)
                                            <span class="badge bg-purple"><i class="fas fa-folder"></i> Files Ready</span>
                                        @elseif($project->paid_at)
                                            <span class="badge badge-info"><i class="fas fa-check"></i> Paid</span>
                                        @elseif($project->downpayment_at)
                                            <span class="badge badge-primary"><i class="fas fa-hand-holding-usd"></i> DP Paid</span>
                                        @else
                                            <span class="badge badge-secondary"><i class="fas fa-phone"></i> Follow Up</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i>
                                        <br>
                                        No recent projects
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($recentProjects->count() > 0)
                    <div class="card-footer text-center">
                        <a href="{{ route('projects.index') }}" class="text-uppercase">View All Projects</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Revenue Overview -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-gradient-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-chart-line mr-1"></i>
                            Revenue Overview {{ date('Y') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="description-block">
                                    <h5 class="description-header">Rp {{ number_format($totalRevenue, 0) }}</h5>
                                    <span class="description-text">TOTAL REVENUE THIS YEAR</span>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="description-block">
                                    <h5 class="description-header">Rp {{ number_format($totalRevenueMonth, 0) }}</h5>
                                    <span class="description-text">REVENUE THIS MONTH</span>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="description-block">
                                    <h5 class="description-header">Rp {{ $totalProjectsThisYear > 0 ? number_format($totalRevenue / $totalProjectsThisYear, 0) : 0 }}</h5>
                                    <span class="description-text">AVERAGE PER PROJECT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    .bg-gradient-purple {
        background: linear-gradient(180deg, #6f42c1, #563d7c) !important;
    }
    .small-box .icon {
        font-size: 60px;
    }
    .info-box-icon {
        font-size: 2rem;
    }
    .description-block {
        padding: 10px 0;
    }
    .description-header {
        font-size: 1.5rem;
        font-weight: bold;
        margin: 10px 0 5px 0;
        color: #fff;
    }
    .description-text {
        text-transform: uppercase;
        color: rgba(255,255,255,.8);
        font-weight: 600;
    }
</style>
@endsection

@section('scripts')
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<script>
$(function () {
    // Monthly Bookings Bar Chart
    var monthlyBookingsCtx = document.getElementById('monthlyBookingsChart').getContext('2d');
    var monthlyBookingsData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Bookings',
            data: @json($monthlyData),
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            borderWidth: 1
        }]
    };

    var monthlyBookingsChart = new Chart(monthlyBookingsCtx, {
        type: 'bar',
        data: monthlyBookingsData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });

    // Status Distribution Donut Chart
    var statusCtx = document.getElementById('statusChart').getContext('2d');
    var statusData = {
        labels: ['Follow Up', 'DP Paid', 'Paid', 'Files Ready', 'Completed'],
        datasets: [{
            data: [
                {{ $statusDistribution['follow_up'] }},
                {{ $statusDistribution['dp_paid'] }},
                {{ $statusDistribution['paid'] }},
                {{ $statusDistribution['files_ready'] }},
                {{ $statusDistribution['completed'] }}
            ],
            backgroundColor: [
                '#6c757d', // Follow Up - Gray
                '#007bff', // DP Paid - Blue
                '#17a2b8', // Paid - Info
                '#6f42c1', // Files Ready - Purple
                '#28a745'  // Completed - Green
            ]
        }]
    };

    var statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: statusData,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                position: 'bottom'
            }
        }
    });
});
</script>
@endsection
