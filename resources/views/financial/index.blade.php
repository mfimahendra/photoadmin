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

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-10">
                <div>                    
                    <select id="filter_year" class="form-control select2" style="width: 200px;">
                        @foreach(range(2025, date('Y')) as $year)
                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-2 text-right">
                <button class="btn btn-danger text-right" onclick="modalExpenses('general')">
                    <i class="fas fa-plus"></i>
                    Add Expenses
                </button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div id="table_container">
                    <table id="tableData" class="table table-bordered">
                        <thead style="background: #29342c; color: #ffffff;">
                            <tr>
                                <td>Financial Statement</td>
                                @foreach(range(1, 12) as $month)
                                    @if($month == date('n'))
                                        <td style="background: #475a4c; color: #fff000;">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</td>
                                    @else
                                        <td style="background: #475a4c; color: white;">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</td>
                                    @endif                                    
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="tableDataBody">                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>            
    </div>

    <div class="modal fade" id="modal_expenses" tabindex="-1" role="dialog" aria-labelledby="modalExpensesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExpensesLabel">Add Expenses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_expenses">
                        <div class="form-group">
                            <label for="expense_date">Date</label>
                            <input type="text" class="form-control" id="expense_date" name="date" placeholder="Select date" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="expense_category">Category</label>
                            <select class="form-control select2" id="expense_category" name="category" style="width: 100%;">
                                <option value="">Select category</option>
                            </select>
                            <label for="expense_detail">Detail</label>
                            <select class="form-control select2" id="expense_detail" name="detail" style="width: 100%;">
                                <option value="">Select detail</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expense_amount">Amount</label>
                            <input type="number" class="form-control" id="expense_amount" name="amount" placeholder="Enter amount">
                        </div>                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitExpense()">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/highcharts/highcharts.js') }}"></script>
    <script>
        // Backend data
        var categoriesData = {!! json_encode($categories ?? []) !!};
        var detailsData = {!! json_encode($details ?? []) !!};

        $(document).ready(function() {
            fetchData();
            initializeExpenseDropdowns();
            // renderChart();
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

        function fetchData() {
            $.ajax({
                url: '{{ route("financial.fetch") }}',
                method: 'GET',
                success: function(response) {
                    // Process the response and update the table
                    var tableBody = $('#tableDataBody');
                    tableBody.empty();

                    // Transform data from [{ month: "2026-01", category: "Revenue", amount: 1000 }]
                    // to { "Revenue": { month_1: 1000, month_2: 0, ... } }
                    var categorized = {};
                    
                    response.data.forEach(function(item) {
                        var category = item.category;
                        var monthMatch = item.month.match(/-(\d{2})$/);
                        var monthNum = monthMatch ? parseInt(monthMatch[1]) : 0;
                        
                        if (!categorized[category]) {
                            categorized[category] = {};
                            for (var i = 1; i <= 12; i++) {
                                categorized[category]['month_' + i] = 0;
                            }
                        }
                        
                        if (monthNum >= 1 && monthNum <= 12) {
                            categorized[category]['month_' + monthNum] = parseFloat(item.amount) || 0;
                        }
                    });

                    // Build table rows
                    Object.keys(categorized).forEach(function(category) {
                        var row = '<tr>';
                        row += '<td style="background: #a1ccac; color: #333333; text-align:left;">' + category + '</td>';
                        for (var i = 1; i <= 12; i++) {
                            var amount = categorized[category]['month_' + i];
                            row += '<td style="text-align:center;">' + amount.toLocaleString('id-ID') + '</td>';
                        }
                        row += '</tr>';
                        tableBody.append(row);
                    });
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }

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

        function modalExpenses(type) {        
            $('#modal_expenses').modal('show');
        }

        function initializeExpenseDropdowns() {
            // Get unique categories
            var categories = [...new Set(categoriesData.map(item => item.category))];
            
            // Populate category dropdown
            $('#expense_category').empty().append('<option value="">Select category</option>');
            categories.forEach(function(category) {
                $('#expense_category').append('<option value="' + category + '">' + category + '</option>');
            });

            // Handle category change
            $('#expense_category').on('change', function() {
                var selectedCategory = $(this).val();
                $('#expense_detail').empty().append('<option value="">Select detail</option>');
                
                if (selectedCategory) {
                    // Filter details by selected category
                    var filteredDetails = categoriesData.filter(item => item.category === selectedCategory);
                    filteredDetails.forEach(function(item) {
                        $('#expense_detail').append('<option value="' + item.id + '">' + item.detail + '</option>');
                    });
                }
                
                // Refresh select2
                $('#expense_detail').trigger('change');
            });
        }

    </script>
    <!-- Add your JavaScript code here -->
@endsection
