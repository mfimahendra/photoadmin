<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .invoice-header {
            text-align: left;
            margin-bottom: 30px;
        }

        .brand-name {
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 2px;
            color: #333;
            margin-bottom: 20px;
        }

        .invoice-title {
            font-size: 36px;
            font-weight: 700;
            color: #000;
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .invoice-to {
            flex: 1;
        }

        .invoice-to h4 {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 10px;
        }

        .invoice-to p {
            font-size: 14px;
            color: #333;
            line-height: 1.6;
            margin: 0;
        }

        .invoice-to strong {
            color: #000;
            font-weight: 600;
        }

        .invoice-date {
            text-align: right;
        }

        .invoice-date h4 {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 5px;
        }

        .invoice-date p {
            font-size: 14px;
            color: #333;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .invoice-table thead {
            background: #e0e0e0;
        }

        .invoice-table th {
            padding: 12px 10px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: #333;
            border: 1px solid #ccc;
        }

        .invoice-table td {
            padding: 12px 10px;
            font-size: 13px;
            color: #333;
            border: 1px solid #ccc;
            vertical-align: top;
        }

        .invoice-table tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        .item-name {
            font-weight: 600;
            color: #2196F3;
            margin-bottom: 3px;
        }

        .item-detail {
            font-size: 12px;
            color: #666;
        }

        .schedule-time {
            font-weight: 600;
            color: #333;
            margin-bottom: 3px;
        }

        .info-text {
            font-size: 12px;
            color: #2196F3;
            line-height: 1.5;
        }

        .invoice-summary {
            margin-left: auto;
            width: 300px;
            margin-bottom: 30px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
        }

        .summary-row.total {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
            font-size: 16px;
            padding: 12px 0;
            margin-top: 10px;
        }

        .summary-label {
            color: #333;
        }

        .summary-value {
            color: #333;
            font-weight: 600;
        }

        .invoice-notes {
            background: #f9f9f9;
            padding: 20px;
            /* border-left: 4px solid #2196F3; */
            margin-bottom: 30px;
        }

        .invoice-notes h4 {
            font-size: 14px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .invoice-notes p, .invoice-notes ul {
            font-size: 12px;
            color: #555;
            line-height: 1.8;
            margin: 5px 0;
        }

        .invoice-notes ul {
            margin-left: 20px;
        }

        .invoice-footer {
            text-align: right;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .invoice-footer h4 {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 5px;
        }

        .invoice-footer p {
            font-size: 13px;
            color: #333;
            margin: 2px 0;
        }

        .invoice-footer a {
            color: #2196F3;
            text-decoration: none;
        }

        /* Print styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .invoice-container {
                box-shadow: none;
                padding: 20px;
            }

            .no-print {
                display: none !important;
            }

            @page {
                margin: 1cm;
            }
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #2196F3;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 1000;
        }

        .print-button:hover {
            background: #1976D2;
        }

        .print-button i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <button class="print-button no-print" onclick="window.print()">
        <i class="fas fa-print"></i> Print Invoice
    </button>

    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div class="brand-name">
                <img src="{{ asset('images/icon/invoice_esokhari.png')}}" alt="" style="width: 120px; height:auto;">

            </div>
        </div>

        <!-- Title -->
        <h1 class="invoice-title">INVOICE</h1>

        <!-- Invoice Info -->
        <div class="invoice-info">
            <div class="invoice-to">
                <h4>Invoice to.</h4>
                <p>
                    <strong>{{ $project->client_name }}</strong><br>
                    {{ $project->client_phone }}<br>
                    {{ $project->faculty ? $project->faculty . ' ' : '' }}{{ $project->university }}<br>
                    {{ $project->city }}
                </p>
            </div>
            <div class="invoice-date">
                <h4>Date Released</h4>
                <p>{{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Invoice Table -->
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item Booked</th>
                    <th>Schedule</th>
                    <th>Ratecard</th>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody>
                <!-- Main Service -->
                <tr>
                    <td>
                        <div class="item-name">{{ $project->service_package }}</div>
                        {{-- <div class="item-detail">{{ $project->service_duration }} jam</div> --}}
                    </td>
                    <td>
                        <div class="schedule-time">
                            {{ \Carbon\Carbon::parse($project->event_date)->format('d F Y') }}
                        </div>
                        <div class="item-detail">
                            @if($project->event_time && $project->service_duration)
                                {{ \Carbon\Carbon::parse($project->event_time)->format('H:i') }} - 
                                {{ \Carbon\Carbon::parse($project->event_time)->addHours(floor($project->service_duration))->addMinutes(($project->service_duration - floor($project->service_duration)) * 60)->format('H:i') }}
                            @else
                                {{ $project->event_time ?? '-' }}
                            @endif
                        </div>
                    </td>
                    <td>Rp{{ number_format($project->service_price, 0, ',', '.') }}</td>
                    <td>
                        <div class="info-text">
                            @if($project->downpayment_at)
                                ✓ DP has been paid on {{ \Carbon\Carbon::parse($project->downpayment_at)->format('d M Y') }}
                            @else
                                Awaiting down payment
                            @endif
                        </div>
                    </td>
                </tr>

                <!-- Additional Services -->
                @foreach($additionals as $addon)
                <tr>
                    <td>
                        <div class="item-name">{{ $addon->description }}</div>
                        {{-- <div class="item-detail">Extra</div> --}}
                    </td>
                    <td>-</td>
                    <td>Rp{{ number_format($addon->price, 0, ',', '.') }}</td>
                    <td>-</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Summary -->
        <div class="invoice-summary">
            @php
                $totalRatecard = $project->service_price + $additionals->sum('price');
                $dpFees = 150000; // Manual adjustable
                $disc = 0; // Manual adjustable
                $remaining = $totalRatecard - $dpFees - $disc;
            @endphp

            <div class="summary-row">
                <span class="summary-label">Total Ratecard :</span>
                <span class="summary-value">Rp{{ number_format($totalRatecard, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">DP Fees :</span>
                <span class="summary-value">Rp{{ number_format($dpFees, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Disc :</span>
                <span class="summary-value">Rp{{ number_format($disc, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row total">
                <span class="summary-label">Remaining :</span>
                <span class="summary-value">
                    @if($project->paid_at)
                        <span style="font-weight: bold; color:green;">PAID</span>
                        <br>
                        <span style="font-size: 11px; color: #666;">
                            Paid on {{ \Carbon\Carbon::parse($project->paid_at)->format('d M Y') }}
                        </span>
                    @else
                        Rp{{ number_format($remaining, 0, ',', '.') }}
                    @endif
                </span>
            </div>
        </div>

        <!-- Notes -->
        <div class="invoice-notes">
            <h4>Notes.</h4>
            <p><strong>*</strong>With the issuance of this invoice, your schedule has been officially recorded.</p>
            <p><strong>*</strong>Remaining must be paid a maximum of DP fees.</p>
            @if($project->notes)
            <p><strong>Additional Notes:</strong></p>
            <p>{{ $project->notes }}</p>
            @endif
        </div>

        <!-- Footer -->
        <div class="invoice-footer">
            <h4>Released by</h4>
            <p><strong>@wisudesokhari</strong></p>
            <p>
                @if($adminPhone)
                    <a href="https://wa.me/{{ $adminPhone }}">+{{ $adminPhone }}</a>
                @else
                    +62 858 686 668 007
                @endif
            </p>
        </div>
    </div>

    <script>
        // Auto-print functionality (optional)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>
