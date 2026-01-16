@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('js/jspreadsheet/jsuites.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('js/jspreadsheet/jspreadsheet.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2">            
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-12 mt-3">
                                <button class="btn btn-success" style=" padding: 6px 12px; margin-top: -25px;" onclick="saveSpreadsheet()">
                                    <i class="fas fa-save"></i>&nbsp;Save
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="spreadsheet"></div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/jspreadsheet/jsuites.js') }}"></script>
    <script src="{{ asset('js/jspreadsheet/jspreadsheet.js') }}"></script>
    
    <script>
        var spreadsheet;

        var masters = @json($masters);
        var master_columns = @json($master_columns);
        var tableName = @json($table_name);
        
        $(document).ready(function () {            
            $('[data-widget="pushmenu"]').PushMenu('toggle');

            // Prepare data for jspreadsheet
            var masters_data = masters.map(function(master) {
                var row = [];
                master_columns.forEach(function(column) {
                    row.push(master[column] || '');
                });
                return row;
            });
            
            // Dynamically create columns
            var columns = master_columns.map(function(column) {
                var columnConfig = {
                    type: 'text',
                    title: column.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase()),
                    width: 200
                };
                
                // Auto-detect number columns
                if (column.includes('price') || column.includes('amount') || column.includes('total')) {
                    columnConfig.type = 'number';
                    columnConfig.mask = 'Rp #.##0';
                } else if (column.includes('duration') || column.includes('qty') || column.includes('quantity')) {
                    columnConfig.type = 'number';
                }
                
                return columnConfig;
            });
            
            // Initialize jspreadsheet
            spreadsheet = jspreadsheet(document.getElementById('spreadsheet'), {
                worksheets: [{
                    data: masters_data,
                    columns: columns,
                    minDimensions: [master_columns.length, 5],
                    allowInsertRow: true,
                    allowManualInsertRow: true,
                    allowDeleteRow: true,
                    allowInsertColumn: false,
                    allowManualInsertColumn: false,
                    allowDeleteColumn: false,
                    allowRenameColumn: false,
                    search: true,
                }],
                tableOverflow: true,
                tableWidth: '100%',
            });
        });

        function saveSpreadsheet() {
            const data = spreadsheet[0].getData();

            // check at least has 1 data in a row then send to server
            let hasData = false;
            for (let i = 0; i < data.length; i++) {
                if (data[i].some(cell => cell !== '')) {
                    hasData = true;
                    break;
                }
            }

            if (!hasData) {
                toastr.warning('Tidak ada data untuk disimpan.');
                error_audio.play();                
                return;
            }

            // send only rows that have data
            const filteredData = data.filter(row => row.some(cell => cell !== ''));

            $.ajax({
                url: "{{ route('master.update', ['masters' => $table_name]) }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    data: filteredData
                },
                success: function (response) {
                    toastr.success('Spreadsheet data saved successfully!');
                    success_audio.play();
                },
                error: function (xhr, status, error) {
                    toastr.error('Error saving spreadsheet data.');
                    error_audio.play();
                }
            });
        }



        
    </script>
@endsection
