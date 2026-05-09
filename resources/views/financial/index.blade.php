@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">    
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}"> --}}

    <style>
        #table_journal {
            font-size: 13px;
        }

        #table_journal th {
            text-align: center;
            vertical-align: middle;
        }

        #table_journal td {
            vertical-align: middle;
        }

        .btn-xs {
            padding: 2px 6px;
            font-size: 11px;
        }

        .modal-header.bg-success,
        .modal-header.bg-primary {
            color: white;
        }
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
                <button class="btn btn-primary btn-sm" onclick="modalAddSubscription()">
                    <i class="fas fa-calendar-plus"></i> Subscription
                </button>
                <button class="btn btn-success btn-sm" onclick="modalAddExpense()">
                    <i class="fas fa-plus"></i> Expense
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

    <!-- Modal Add Expense -->
    <div class="modal fade" id="modal_expenses" tabindex="-1" role="dialog" aria-labelledby="modalExpensesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="modalExpensesLabel">Add Expense</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_expenses">
                        <div class="form-group">
                            <label for="expense_date">Date</label>
                            <input type="text" class="form-control datepicker" id="expense_date" name="date" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="expense_category">Category</label>
                            <select class="form-control select2" id="expense_category" name="category" style="width: 100%;">
                                <option value="">Select category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expense_detail">Detail</label>
                            <input type="text" class="form-control" id="expense_detail" name="detail" placeholder="Enter detail">
                        </div>
                        <div class="form-group">
                            <label for="expense_amount">Amount</label>
                            <input type="number" class="form-control" id="expense_amount" name="amount" placeholder="Enter amount">
                        </div>                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="submitExpense()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Subscription -->
    <div class="modal fade" id="modal_subscription" tabindex="-1" role="dialog" aria-labelledby="modalSubscriptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="modalSubscriptionLabel">Add Subscription</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_subscription">
                        <div class="form-group">
                            <label for="subscription_category">Category</label>
                            <input type="text" class="form-control" id="subscription_category" name="category" placeholder="e.g., Software, Hosting, etc.">
                        </div>
                        <div class="form-group">
                            <label for="subscription_description">Description</label>
                            <input type="text" class="form-control" id="subscription_description" name="description" placeholder="e.g., Adobe Creative Cloud">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subscription_valid_from">Valid From</label>
                                    <input type="text" class="form-control datepicker" id="subscription_valid_from" name="valid_from">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subscription_valid_to">Valid To</label>
                                    <input type="text" class="form-control datepicker" id="subscription_valid_to" name="valid_to">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subscription_price">Total Price (akan dibagi per bulan otomatis)</label>
                            <input type="number" class="form-control" id="subscription_price" name="price" placeholder="Total price for the subscription period">
                        </div>
                        <div class="form-group">
                            <label for="subscription_remark">Remark</label>
                            <textarea class="form-control" id="subscription_remark" name="remark" rows="3" placeholder="Optional notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitSubscription()">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        var accounts = [];

        $(document).ready(function() {
            fetchAccounts();
            fetchData();
            
            // Auto fetch on year change
            $('#filter_year').on('change', function() {
                fetchData();
            });
        });        

        $(function() {
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });

            $('.select2').select2({
                theme: 'bootstrap4',
                allowClear: true
            });

            $('.datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });

        function fetchAccounts() {
            var categories = ['Operating Expenses', 'Marketing Expenses', 'Cost of Services', 'Other Expenses', 'Revenue'];
            
            $('#expense_category, #subscription_category').each(function() {
                var select = $(this);
                categories.forEach(function(cat) {
                    if (cat !== 'Revenue') {
                        select.append('<option value="' + cat + '">' + cat + '</option>');
                    }
                });
            });
        }

        function fetchData() {
            var year = $('#filter_year').val();
            
            $.ajax({
                url: '{{ route("financial.fetch") }}',
                method: 'GET',
                data: { year: year },
                success: function(response) {
                    renderMonthlyTable(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Error fetching financial data');
                }
            });
        }

        function renderMonthlyTable(response) {
            var allData = {};
            
            // Process all data (revenue, expenses, subscriptions)
            response.data.forEach(function(item) {
                var category = item.category;
                var monthMatch = item.month.match(/-(\d{2})$/);
                var monthNum = monthMatch ? parseInt(monthMatch[1]) : 0;
                
                if (!allData[category]) {
                    allData[category] = {};
                    for (var i = 1; i <= 12; i++) {
                        allData[category]['month_' + i] = 0;
                    }
                }
                
                if (monthNum >= 1 && monthNum <= 12) {
                    allData[category]['month_' + monthNum] += parseFloat(item.amount) || 0;
                }
            });

            updateTable(allData);
        }

        function updateTable(allData) {
            var tableBody = $('#tableDataBody');
            tableBody.empty();

            var currentMonth = {{ (int)date('n') }};

            // Render rows for each category
            Object.keys(allData).forEach(function(category) {
                var data = allData[category];
                var row = '<tr>';
                
                // Category cell
                row += '<td style="background: #a1ccac; color: #333333; text-align:left; font-weight: 500;">';
                row += category;
                row += '</td>';
                
                // Month columns
                for (var i = 1; i <= 12; i++) {
                    var amount = data['month_' + i] || 0;
                    var bgColor = (i == currentMonth) ? '#fff9e6' : '';
                    row += '<td style="text-align:right; padding-right: 10px; background: ' + bgColor + ';">';
                    row += (amount > 0 ? numberWithDots(amount) : '-');
                    row += '</td>';
                }
                row += '</tr>';
                tableBody.append(row);
            });

            // Add totals row
            if (Object.keys(allData).length > 0) {
                var totalRow = '<tr style="background: #d4edda; font-weight: bold;">';
                totalRow += '<td>TOTAL</td>';
                
                for (var i = 1; i <= 12; i++) {
                    var monthTotal = 0;
                    Object.keys(allData).forEach(function(cat) {
                        monthTotal += allData[cat]['month_' + i] || 0;
                    });
                    var bgColor = (i == currentMonth) ? '#fff9e6' : '';
                    totalRow += '<td style="text-align:right; padding-right: 10px; background: ' + bgColor + ';">' + numberWithDots(monthTotal) + '</td>';
                }
                totalRow += '</tr>';
                tableBody.append(totalRow);
            }
        }

        function numberWithDots(x) {
            return Math.round(x).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function modalAddExpense() {
            $('#modal_expenses').modal('show');
        }

        function modalAddSubscription() {
            $('#modal_subscription').modal('show');
        }

        function submitExpense() {
            let formData = new FormData();

            formData.append('date', $('#expense_date').val());
            formData.append('account_debit', $('#expense_category').val());
            formData.append('description', $('#expense_detail').val());
            formData.append('amount', $('#expense_amount').val());
            formData.append('type', 'expense');
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('financial.saveTransaction') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {
                        $('#modal_expenses').modal('hide');
                        $('#form_expenses')[0].reset();
                        fetchData();
                        alert('Expense saved successfully');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + (xhr.responseJSON?.message || 'Failed to save'));
                }
            });
        }

        function submitSubscription() {
            let formData = new FormData();

            formData.append('category', $('#subscription_category').val());
            formData.append('description', $('#subscription_description').val());
            formData.append('valid_from', $('#subscription_valid_from').val());
            formData.append('valid_to', $('#subscription_valid_to').val());
            formData.append('price', $('#subscription_price').val());
            formData.append('remark', $('#subscription_remark').val());
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('financial.saveSubscription') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {
                        $('#modal_subscription').modal('hide');
                        $('#form_subscription')[0].reset();
                        fetchData();
                        alert('Subscription saved successfully');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + (xhr.responseJSON?.message || 'Failed to save'));
                }
            });
        }
    </script>
@endsection
