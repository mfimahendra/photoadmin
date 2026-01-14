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

        var users = @json($users);
        
        $(document).ready(function () {            
            $('[data-widget="pushmenu"]').PushMenu('toggle');

            // Prepare data for jspreadsheet
            var users_data = users.map(function(user) {
                return [
                    user.username,
                    '',
                    user.name,
                    user.phone,
                    user.email,
                    user.role_code
                ];
            });
            
            // Initialize jspreadsheet
            spreadsheet = jspreadsheet(document.getElementById('spreadsheet'), {
                worksheets: [{
                    data: users_data,
                    columns: [                        
                        { type: 'text', title: '👤 Username', width: 150 },
                        { type: 'text', title: '🔐 Password Baru', width: 150 },
                        { type: 'text', title: '🪪 Name', width: 150 },
                        { type: 'text', title: '☎️ Phone', width: 200 },
                        { type: 'text', title: '📧 Email', width: 200 },                                                
                        { type: 'dropdown', title: 'Role Code', width: 150, source: ['admin','editor', 'photographer']}                        
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
                url: "{{ route('users.update') }}",
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
