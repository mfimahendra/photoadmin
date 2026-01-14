@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('js/jspreadsheet/jsuites.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('js/jspreadsheet/jspreadsheet.css') }}" type="text/css" />
@endsection

@section('content-header')
    <div class="container-fluid">
        <p style="padding: 0; margin: 0; font-size: 1rem;">{{ $title }}</p>        

        <button class="btn btn-success" style="float: right; padding: 6px 12px; margin-top: -25px;" onclick="saveSpreadsheet()">
            <i class="fas fa-save"></i>&nbsp;Save
        </button>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-12">
                                {{-- TODO: Show Calendar of all projects Here --}}
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
        
        $(document).ready(function () {            
            $('[data-widget="pushmenu"]').PushMenu('toggle');
            
            // Initialize jspreadsheet
            spreadsheet = jspreadsheet(document.getElementById('spreadsheet'), {
                worksheets: [{
                    data: [
                        ['', '', '', '', '', '', '', '', ''],
                    ],
                    columns: [
                        { type: 'calendar', title: '📆 Date', width: 150, options: { format: 'YYYY-MM-DD', today: true } },
                        { type: 'text', title: '⏰ Time', width: 100 },
                        { type: 'text', title: '👤 Name', width: 150 },
                        { type: 'text', title: '☎️ Phone', width: 150 },
                        { type: 'text', title: '📧 Email', width: 200 },
                        { type: 'text', title: '🏠 Address', width: 150 },
                        { type: 'text', title: '📍 Region', width: 150 },
                        { type: 'dropdown', title: '📸 Paket', width: 150, source: ['Wisuda','Wedding', 'Prewedding', 'Event'] },                        
                        { type: 'text', title: '📄 Notes', width: 150 },
                    ],
                    minDimensions: [5, 5],
                    allowInsertRow: true,
                    allowManualInsertRow: true,
                    allowDeleteRow: true,
                    allowInsertColumn: false,
                    allowManualInsertColumn: false,
                    allowDeleteColumn: false,
                    allowRenameColumn: false,
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
                url: "{{ route('projects.store') }}",
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
