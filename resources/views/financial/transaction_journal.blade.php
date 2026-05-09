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
        #table_journal_transactions{
            width: 100%;            
        }

        #table_journal_transactions th, #table_journal_transactions td {
            white-space: nowrap;
        }

        #table_journal_transactions th {
            background-color: #f4f6f9;
        }

        #table_journal_transactions th, #table_journal_transactions td {
            text-align: center;
            font-size: 14px;
            padding: 5px;
        }

    </style>
@endsection

@section('nav-title')
    Riwayat Transaksi
@endsection

@section('content-header')
    <div class="row">
        <div class="col-8"></div>
        <div class="col-4" style="text-align: right;">
            <button class="btn bg-blue btn-sm" onclick="modalAddSubscription()">
                <i class="fa-solid fa-calendar-plus"></i>
                Tambah Subscription
            </button>
            <button class="btn bg-green btn-sm" onclick="modalAddTransaction()">
                <i class="fa-solid fa-plus"></i>
                Tambah Expense
            </button>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">                
                            <div class="col">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="filter_date">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="filter">Debit</label>                                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-boxes-packing"></i>
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="account_debit_filter" data-placeholder="Pilih Akun Debit">
                                            <option value="">-- Pilih Akun --</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->account_id }}">{{ $account->account_id }}</option>\
                                            @endforeach        
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="filter">Kredit</label>                                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-boxes-packing"></i>
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="account_kredit_filter" data-placeholder="Pilih Akun Kredit">
                                            <option value="">-- Pilih Akun --</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->account_id }}">{{ $account->account_id }}</option>
                                            @endforeach        
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: right;">
                                <div class="form-group">                                    
                                    <button class="btn bg-green btn-sm" onclick="fetchData()">
                                        <i class="fa-solid fa-search"></i>
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="table_container"></div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal quick add journal transaction --}}
    <div class="modal fade" id="modal-quick-add-journal-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h4 class="modal-title">Tambah Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="form-quick-add-journal-transaction">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="date">Tanggal</label>
                                <input type="text" id="date" name="date" class="form-control datepicker">
                            </div>
                            <div class="form-group col-6">
                                <label for="account">Akun</label>
                                <select id="account" name="account" class="form-control">
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->account_id }}">{{ $account->account_id }}</option>\
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Transaction -->
    <div class="modal fade" id="modalAddTransaction" tabindex="-1" role="dialog" aria-labelledby="modalAddTransactionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h5 class="modal-title" id="modalAddTransactionLabel">Tambah Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAddTransaction">
                        <div class="form-group">
                            <label for="transactionDate">Tanggal</label>
                            <input type="text" class="form-control datepicker" id="transactionDate" name="transactionDate">
                        </div>
                        <div class="form-group">
                            <label for="transactionAccount">Category (Akun)</label>
                            <select class="form-control select2" id="input_debit" name="transactionAccount" style="width: 100%;">
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->account_id }}">{{ $account->account_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transactionDescription">Detail</label>
                            <input type="text" class="form-control" id="transactionDescription" name="transactionDescription" placeholder="e.g., Buying equipment, Office supplies, etc.">
                        </div>
                        <div class="form-group">
                            <label for="transactionAmount">Price</label>
                            <input type="number" class="form-control" id="transactionAmount" name="transactionAmount">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn bg-green" onclick="saveTransaction()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Subscription -->
    <div class="modal fade" id="modalAddSubscription" tabindex="-1" role="dialog" aria-labelledby="modalAddSubscriptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="modalAddSubscriptionLabel">Tambah Subscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAddSubscription">
                        <div class="form-group">
                            <label for="subscriptionCategory">Category</label>
                            <input type="text" class="form-control" id="subscriptionCategory" name="subscriptionCategory" placeholder="e.g., Software, Hosting, etc.">
                        </div>
                        <div class="form-group">
                            <label for="subscriptionDescription">Description</label>
                            <input type="text" class="form-control" id="subscriptionDescription" name="subscriptionDescription" placeholder="e.g., Adobe Creative Cloud">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subscriptionValidFrom">Valid From</label>
                                    <input type="text" class="form-control datepicker" id="subscriptionValidFrom" name="subscriptionValidFrom">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subscriptionValidTo">Valid To</label>
                                    <input type="text" class="form-control datepicker" id="subscriptionValidTo" name="subscriptionValidTo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subscriptionPrice">Total Price (akan dibagi per bulan otomatis)</label>
                            <input type="number" class="form-control" id="subscriptionPrice" name="subscriptionPrice" placeholder="Total price for the subscription period">
                        </div>
                        <div class="form-group">
                            <label for="subscriptionRemark">Remark</label>
                            <textarea class="form-control" id="subscriptionRemark" name="subscriptionRemark" rows="3" placeholder="Optional notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn bg-blue" onclick="saveSubscription()">Simpan</button>
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
    <script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        var journal_transactions = [];

        $(document).ready(function() {
            $('body').addClass('sidebar-collapse');                        

            $('.select2').each((_i, e) => {
                var e = $(e);
                e.select2({
                    allowClear: true,
                    theme: 'bootstrap4',
                    dropdownParent: e.parent()
                });
            });

            // set filter select2 null
            $('#account_debit_filter').val(null).trigger('change');
            $('#account_kredit_filter').val(null).trigger('change');

            $('#search_date').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            // set date range to previous year january to current date
           $('#filter_date').val('{{ date('Y-m-d') }}');

            fetchData();
        });

        $(function() {

            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });

            $('#filter_date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });

            $('.datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });

        });


        function fetchData() {
            $.ajax({
                url: '{{ route('financial.fetchJournalData') }}',
                type: 'GET',
                data: {
                    date: $('#filter_date').val(),
                    account_debit: $('#account_debit_filter').val(),
                    account_kredit: $('#account_kredit_filter').val()
                },
                success: function(response) {
                    let data = response.data;
                    renderTable(data);
                }
            });
        }

        function initTable() {
            $('#table_container').html('');

            let html = '';
            html += '<table id="table_journal_transactions" class="table table-bordered table-striped">';
            html += '<thead>';
            html += '<tr>';
            html += '<th>No</th>';
            html += '<th>Tanggal</th>';
            html += '<th>Deskripsi</th>';
            html += '<th>Sumber</th>';
            html += '<th>Pajak</th>';
            html += '<th>Nominal</th>';
            html += '<th>Debit</th>';
            html += '<th>Kredit</th>';
            html += '<th>#</th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';
            html += '</tbody>';
            html += '<tfoot>';
            html += '<tr style="font-weight: bold; background-color: #f0f0f0;">';
            html += '<td colspan="5" style="text-align: right;">TOTAL:</td>';
            html += '<td id="footer-total-price">0</td>';
            html += '<td id="footer-total-debit">0</td>';
            html += '<td id="footer-total-kredit">0</td>';
            html += '<td></td>';
            html += '</tr>';
            html += '<tr style="font-weight: bold; background-color: #e8e8e8;">';
            html += '<td colspan="5" style="text-align: right;">BALANCE:</td>';
            html += '<td id="footer-balance" colspan="3">0</td>';
            html += '<td></td>';
            html += '</tr>';
            html += '</tfoot>';

            $('#table_container').html(html);
        }

        function renderTable(data) {
            initTable();

            let journal_data = data.data || data;
            let totals = data.totals || { debit: 0, kredit: 0, balance: 0 };

            // if undefined
            if (journal_data == undefined) {
                journal_data = [];
            }

            let html = '';
            let totalPrice = 0;

            journal_data.forEach((journal, index) => {
                totalPrice += parseFloat(journal.price) || 0;
                
                html += '<tr>';
                html += '<td>' + (index + 1) + '</td>';
                html += '<td>' + journal.date + '</td>';
                html += '<td>' + journal.description + '</td>';
                html += '<td>' + journal.source + '</td>';
                html += '<td>' + journal.is_tax + '</td>';
                html += '<td style="text-align: right;">Rp ' + numberWithDots(journal.price) + '</td>';
                html += '<td>' + journal.debit + '</td>';
                html += '<td>' + journal.credit + '</td>';
                html += '<td style="text-align: center;">';
                if (journal.type === 'expense') {
                    html += '<button class="btn bg-red btn-sm" onclick="deleteJournalTransaction(\'' + journal.id + '\')"><i class="fa-solid fa-trash"></i></button>';
                } else if (journal.type === 'subscription') {
                    html += '<span class="badge badge-info">Auto</span>';
                }
                html += '</td>';
                html += '</tr>';
            });

            $('#table_journal_transactions tbody').html(html);

            // Update totals
            $('#footer-total-price').text('Rp ' + numberWithDots(totalPrice));
            $('#footer-total-debit').text('Rp ' + numberWithDots(totals.debit));
            $('#footer-total-kredit').text('Rp ' + numberWithDots(totals.kredit));
            $('#footer-balance').text('Rp ' + numberWithDots(totals.balance));
        }

        function modalAddTransaction() {
            $('#modalAddTransaction').modal('show');
        }

        function saveTransaction() {

            let formData = new FormData();

            formData.append('date', $('#transactionDate').val());
            formData.append('account_debit', $('#input_debit').val());
            formData.append('account_credit', $('#input_credit').val());
            formData.append('description', $('#transactionDescription').val());
            formData.append('source', $('#transactionSource').val());
            formData.append('amount', $('#transactionAmount').val());
            formData.append('type', 'expense');
            // csrf
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('financial.saveTransaction') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {
                        $('#modalAddTransaction').modal('hide');
                        $('#formAddTransaction')[0].reset();
                        fetchData();
                        alert('Transaction saved successfully');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }

        function deleteJournalTransaction(id) {
            if (!confirm('Are you sure you want to delete this transaction?')) {
                return;
            }

            let formData = new FormData();
            formData.append('id', id);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('financial.deleteTransaction') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {
                        fetchData();
                        alert('Transaction deleted successfully');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }

        function numberWithDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function modalAddSubscription() {
            $('#modalAddSubscription').modal('show');
        }

        function saveSubscription() {
            let formData = new FormData();

            formData.append('category', $('#subscriptionCategory').val());
            formData.append('description', $('#subscriptionDescription').val());
            formData.append('valid_from', $('#subscriptionValidFrom').val());
            formData.append('valid_to', $('#subscriptionValidTo').val());
            formData.append('price', $('#subscriptionPrice').val());
            formData.append('remark', $('#subscriptionRemark').val());
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route('financial.saveSubscription') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'success') {
                        $('#modalAddSubscription').modal('hide');
                        $('#formAddSubscription')[0].reset();
                        fetchData();
                        alert('Subscription saved successfully');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }




    </script>
    <!-- Add your JavaScript code here -->
@endsection
