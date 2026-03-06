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

    .credits-box {
        background: #f7f7f7;
        border-radius: 12px;
        padding: 25px;
        color: #222;
        margin-bottom: 30px;
        text-align: center;
        border: 1.5px solid #e0e0e0;
    }

    .credits-box .credits-number {
        font-size: 48px;
        font-weight: 700;
        margin: 10px 0;
        color: #222;
    }

    .credits-box .credits-label {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .credits-box .credits-info {
        font-size: 0.88rem;
        color: #666;
        margin-top: 10px;
    }

    .instruction-box {
        background: #e7f3ff;
        border-left: 4px solid #2196F3;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 25px;
    }

    .instruction-box h6 {
        color: #1976D2;
        margin-bottom: 15px;
        font-weight: 600;
        font-size: 1rem;
    }

    .instruction-box ol {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .instruction-box li {
        margin-bottom: 8px;
        color: #1565C0;
    }

    .photo-list-container {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        border: 2px dashed #222;
    }

    .photo-list-container textarea {
        font-family: 'Courier New', monospace;
        font-size: 14px;
        border: 2px solid #dee2e6;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .photo-list-container textarea:focus {
        border-color: #222;
        box-shadow: 0 0 0 3px rgba(34, 34, 34, 0.08);
    }

    .photo-list-container textarea.drag-over {
        border-color: #667eea;
        background-color: #f0f4ff;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
    }

    .drag-drop-hint {
        text-align: center;
        padding: 10px;
        color: #666;
        font-size: 13px;
        margin-top: 10px;
    }

    .drag-drop-hint i {
        color: #667eea;
        margin-right: 5px;
    }

    .counter-box {
        background: white;
        padding: 15px;
        border-radius: 8px;
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .counter-item {
        text-align: center;
        flex: 1;
    }

    .counter-item .counter-value {
        font-size: 24px;
        font-weight: 700;
        color: #222;
    }

    .counter-item .counter-label {
        font-size: 12px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-submit {
        background: #222;
        color: white;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    .btn-submit:hover {
        background: #000;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        color: white;
    }

    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .btn-back {
        background: #f0f0f0;
        color: #555;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    .btn-back:hover {
        background: #e0e0e0;
        color: #333;
        text-decoration: none;
    }

    .preview-section {
        margin-top: 25px;
        display: none;
    }

    .preview-section.active {
        display: block;
    }

    .preview-list {
        max-height: 300px;
        overflow-y: auto;
        background: white;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .preview-item {
        padding: 8px 12px;
        margin-bottom: 5px;
        background: #f8f9fa;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .preview-item:last-child {
        margin-bottom: 0;
    }

    .preview-item .item-number {
        background: #222;
        color: white;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        margin-right: 10px;
    }

    .preview-item .item-name {
        flex: 1;
        font-family: 'Courier New', monospace;
        font-size: 13px;
    }

    .alert-warning-custom {
        background: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px;
        border-radius: 5px;
        margin-top: 15px;
    }

    .alert-warning-custom i {
        color: #856404;
        margin-right: 8px;
    }

    .package-info-box {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .package-item {
        display: flex;
        align-items: center;
        padding: 15px;
        margin-bottom: 10px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #222;
    }

    .package-item:last-child {
        margin-bottom: 0;
    }

    .package-item i {
        font-size: 24px;
        margin-right: 15px;
        min-width: 30px;
        text-align: center;
    }

    .package-details {
        flex: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .package-details strong {
        color: #333;
        font-size: 15px;
    }

    .package-credits {
        color: #222;
        font-weight: 600;
        font-size: 14px;
        background: white;
        padding: 5px 15px;
        border-radius: 15px;
        border: 1px solid #222;
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

        .credits-box .credits-number {
            font-size: 36px;
        }

        .counter-item .counter-value {
            font-size: 20px;
        }

        .card-header-custom h2 {
            font-size: 2rem;
        }

        .package-details {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .package-credits {
            margin-top: 5px;
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

        .btn-submit, .btn-back {
            padding: 10px 24px;
            font-size: 0.9rem;
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    @foreach($projects as $project)
    <div class="progress-card">
        <div class="card-header-custom">
            <img src="{{ asset('images/icon/esokhari-logo.png') }}" alt="Esokhari Logo" class="logo">
            <h2>EDIT PHOTO LIST</h2>
            <p>{{ $project->client_name }}</p>
        </div>
        <div class="card-body-custom">
            {{-- information how much user credits to edit --}}
            <div class="credits-box">
                <div class="credits-label">
                    <i class="fas fa-ticket-alt"></i> Available Edit Credits
                </div>
                <div class="credits-number" id="available-credits">
                    @if($quota == -1)
                        <i class="fas fa-infinity"></i> Unlimited
                    @else
                        {{ $quota }}
                    @endif
                </div>
                <div class="credits-info">
                    @if($quota == -1)
                        You have unlimited edit credits • Edit as many photos as you like!
                    @else
                        Each photo selected will use 1 credit • Total available: {{ $quota }} credits
                    @endif
                </div>
            </div>

            {{-- Package and Additionals Information --}}
            <div class="info-section">
                <h6><i class="fas fa-box-open"></i> Your Package Details</h6>
                <div class="package-info-box">
                    <div class="package-item">
                        <i class="fas fa-camera text-primary"></i>
                        <div class="package-details">
                            <strong>{{ $service_name }}</strong>
                            @php
                                $serviceEditCredits = DB::table('m_services')
                                    ->where('package', $service_name)
                                    ->value('edit_credits');
                            @endphp
                            <span class="package-credits">
                                @if($serviceEditCredits && $serviceEditCredits > 0)
                                    Base: {{ $serviceEditCredits }} edit credits
                                @else
                                    Base package
                                @endif
                            </span>
                        </div>
                    </div>
                    
                    @if($project->additionals && count($project->additionals) > 0)
                        @foreach($project->additionals as $additional)
                            @php
                                $editCredits = DB::table('m_additionals')
                                    ->where('id', $additional->additional_id)
                                    ->value('edit_credits');
                            @endphp
                            @if($editCredits !== null && $editCredits != 0)
                                <div class="package-item">
                                    <i class="fas fa-plus-circle text-success"></i>
                                    <div class="package-details">
                                        <strong>{{ $additional->description }}</strong>
                                        <span class="package-credits">
                                            @if($editCredits == -1)
                                                <i class="fas fa-infinity"></i> Unlimited credits
                                            @else
                                                +{{ $editCredits }} edit credits
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Instructions --}}
            <div class="instruction-box">
                <h6><i class="fas fa-info-circle"></i> How to Select Photos for Editing</h6>
                <ol>
                    <li>Open your <strong>Google Drive folder</strong> with all uploaded photos</li>
                    <li>Select the photos you want to be edited (Ctrl+Click or Cmd+Click for multiple selection)</li>
                    <li>Right-click and copy the file names, or press <kbd>Ctrl+C</kbd> / <kbd>Cmd+C</kbd></li>
                    <li>Paste the file names in the text area below (<kbd>Ctrl+V</kbd> / <kbd>Cmd+V</kbd>)</li>
                    <li>Review your selection and click <strong>Submit Photo List</strong></li>
                </ol>
            </div>

            {{-- Text area to put photo name which copyied from gdrive image, to inform the editor which photo to edit --}}
            <div class="info-section">
                <h6><i class="fas fa-images"></i> Photo List for Editing</h6>
                
                <div class="photo-list-container">
                    <label for="input_photo_lists" class="mb-2">
                        <strong>Drag & Drop files or Paste file names:</strong>
                    </label>
                    <textarea 
                        id="input_photo_lists" 
                        class="form-control" 
                        rows="12" 
                        placeholder="Drag image files here from File Explorer, or paste file names...&#10;Example:&#10;IMG_001.jpg&#10;IMG_002.jpg&#10;IMG_003.jpg"
                    ></textarea>
                    <div class="drag-drop-hint">
                        <i class="fas fa-hand-pointer"></i> <strong>Tip:</strong> You can drag image files directly from File Explorer or Google Drive!
                    </div>
                    
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-value" id="photo-count">0</div>
                            <div class="counter-label">Photos Selected</div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-value" id="credits-used">0</div>
                            <div class="counter-label">Credits Used</div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-value" id="credits-remaining">
                                @if($quota == -1)
                                    <i class="fas fa-infinity"></i>
                                @else
                                    {{ $quota }}
                                @endif
                            </div>
                            <div class="counter-label">Credits Left</div>
                        </div>
                    </div>

                    <div id="warning-exceeded" class="alert-warning-custom" style="display: none;">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Warning:</strong> You've selected more photos than your available credits. 
                        Please reduce your selection or contact us to purchase additional credits.
                    </div>
                </div>
            </div>

            {{-- Preview Section --}}
            <div class="preview-section" id="preview-section">
                <h6><i class="fas fa-eye"></i> Preview Selected Photos</h6>
                <div class="preview-list" id="preview-list"></div>
            </div>

            {{-- Action Buttons --}}
            <div class="text-center mt-4">
                <button type="button" class="btn btn-submit" id="btn-submit" onclick="submitPhotoList()">
                    <i class="fas fa-paper-plane"></i> Submit Photo List
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Back to Progress
                </a>
            </div>

        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var availableCredits = {{ $quota }};
    var isUnlimited = {{ $quota == -1 ? 'true' : 'false' }};
    var photoList = [];

    $(document).ready(function() {
        var $textarea = $('#input_photo_lists');
        
        // Handle drag over event
        $textarea.on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('drag-over');
        });
        
        // Handle drag leave event
        $textarea.on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('drag-over');
        });
        
        // Handle drop event
        $textarea.on('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('drag-over');
            
            var files = e.originalEvent.dataTransfer.files;
            
            if (files.length > 0) {
                var fileNames = [];
                var imageExtensions = /\.(jpg|jpeg|png|gif|bmp|webp|heic|raw|cr2|nef|arw|tiff|tif)$/i;
                
                // Extract file names
                for (var i = 0; i < files.length; i++) {
                    var fileName = files[i].name;
                    
                    // Check if it's an image file
                    if (imageExtensions.test(fileName)) {
                        fileNames.push(fileName);
                    }
                }
                
                if (fileNames.length > 0) {
                    // Remove duplicates and sort
                    fileNames = [...new Set(fileNames)].sort();
                    
                    // Get existing content
                    var existingContent = $(this).val().trim();
                    var existingFiles = existingContent ? existingContent.split('\n') : [];
                    
                    // Merge with existing, remove duplicates
                    var allFiles = [...new Set([...existingFiles, ...fileNames])];
                    
                    // Set the formatted text
                    $(this).val(allFiles.join('\n'));
                    
                    // Update counters and preview
                    updateCounters();
                    updatePreview();
                    
                    // Show success feedback
                    showToast('success', `Added ${fileNames.length} image file(s)`);
                } else {
                    showToast('warning', 'No valid image files found. Please drop JPG, JPEG, PNG, or other image files.');
                }
            }
        });
        
        // Handle paste event
        $('#input_photo_lists').on('paste', function(e) {
            e.preventDefault();
            
            // Get pasted data
            var pastedData = (e.originalEvent || e).clipboardData.getData('text');
            
            // Split by newlines and filter out empty lines
            var lines = pastedData.split(/\r?\n/).filter(line => line.trim() !== '');
            
            // Clean and format filenames
            var cleanedLines = lines.map(line => {
                line = line.trim();
                
                // Extract filename from full path (handles both Windows and Unix paths)
                // If path contains \ or /, extract just the filename
                if (line.includes('\\') || line.includes('/')) {
                    // Get the last part after the last slash
                    var parts = line.split(/[\\\/]/);
                    line = parts[parts.length - 1];
                }
                
                // Remove common prefixes like numbers, dots, dashes at the start
                line = line.replace(/^[\d\.\-\s]+/, '');
                
                // Remove quotes if present
                line = line.replace(/['"]/g, '');
                
                // Normalize spaces
                line = line.replace(/\s+/g, ' ').trim();
                
                // Validate it looks like an image file
                var imageExtensions = /\.(jpg|jpeg|png|gif|bmp|webp|heic|raw|cr2|nef|arw)$/i;
                if (line && !imageExtensions.test(line)) {
                    // If no extension, might still be valid, keep it
                    // If has wrong extension, still keep it and let server validate
                }
                
                return line;
            }).filter(line => line !== '');
            
            // Remove duplicates
            var uniqueLines = [...new Set(cleanedLines)];
            
            // Format as one filename per line
            var formattedText = uniqueLines.join('\n');
            
            // Set the formatted text in the textarea
            $(this).val(formattedText);
            
            // Update counters and preview
            updateCounters();
            updatePreview();
        });

        // Handle manual input
        $('#input_photo_lists').on('input', function() {
            updateCounters();
            updatePreview();
        });

        // Load existing data if any
        loadExistingPhotoList();
    });

    function updateCounters() {
        var text = $('#input_photo_lists').val().trim();
        
        if (text === '') {
            photoList = [];
        } else {
            // Split by newlines and filter empty lines
            photoList = text.split(/\r?\n/)
                .map(line => line.trim())
                .filter(line => line !== '');
        }
        
        var photoCount = photoList.length;
        var creditsUsed = photoCount;
        var creditsRemaining = isUnlimited ? -1 : (availableCredits - creditsUsed);
        
        // Update display
        $('#photo-count').text(photoCount);
        $('#credits-used').text(creditsUsed);
        
        if (isUnlimited) {
            $('#credits-remaining').html('<i class="fas fa-infinity"></i>');
            $('#warning-exceeded').hide();
            $('#btn-submit').prop('disabled', false);
        } else {
            $('#credits-remaining').text(creditsRemaining);
            
            // Show warning if exceeded
            if (creditsRemaining < 0) {
                $('#warning-exceeded').show();
                $('#credits-remaining').css('color', '#dc3545');
                $('#btn-submit').prop('disabled', true);
            } else {
                $('#warning-exceeded').hide();
                $('#credits-remaining').css('color', '#222');
                $('#btn-submit').prop('disabled', false);
            }
        }
    }

    function updatePreview() {
        if (photoList.length === 0) {
            $('#preview-section').removeClass('active');
            return;
        }
        
        $('#preview-section').addClass('active');
        
        var previewHtml = '';
        photoList.forEach(function(filename, index) {
            previewHtml += `
                <div class="preview-item">
                    <span class="item-number">${index + 1}</span>
                    <span class="item-name">${escapeHtml(filename)}</span>
                </div>
            `;
        });
        
        $('#preview-list').html(previewHtml);
    }

    function submitPhotoList() {
        if (photoList.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Photos Selected',
                text: 'Please paste photo file names before submitting.',
                confirmButtonColor: '#667eea'
            });
            return;
        }

        var creditsRemaining = isUnlimited ? -1 : (availableCredits - photoList.length);
        
        if (!isUnlimited && creditsRemaining < 0) {
            Swal.fire({
                icon: 'error',
                title: 'Insufficient Credits',
                text: 'You have selected more photos than your available credits. Please reduce your selection.',
                confirmButtonColor: '#667eea'
            });
            return;
        }

        // Show confirmation
        var confirmHtml = `
            <p>You are about to submit <strong>${photoList.length} photo(s)</strong> for editing.</p>
        `;
        
        if (isUnlimited) {
            confirmHtml += `<p>You have <strong>unlimited</strong> edit credits.</p>`;
        } else {
            confirmHtml += `
                <p>This will use <strong>${photoList.length} credit(s)</strong>.</p>
                <p>Credits remaining: <strong>${creditsRemaining}</strong></p>
            `;
        }
        
        Swal.fire({
            title: 'Confirm Photo Selection',
            html: confirmHtml,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#667eea',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Submit',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                savePhotoList();
            }
        });
    }

    function savePhotoList() {
        // Show loading
        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we save your photo list.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '{{ route("clients.savePhotoList", $project->id) }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                photo_list: photoList,
                credits_used: photoList.length
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your photo list has been submitted successfully.',
                    confirmButtonColor: '#667eea'
                }).then(() => {
                    window.location.href = '{{ url()->previous() }}';
                });
            },
            error: function(xhr) {
                var errorMessage = 'Failed to save photo list. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    confirmButtonColor: '#667eea'
                });
            }
        });
    }

    function loadExistingPhotoList() {
        // Load existing photo list if available
        $.ajax({
            url: '{{ route("clients.getPhotoList", $project->id) }}',
            method: 'GET',
            success: function(response) {
                if (response.photo_list && response.photo_list.length > 0) {
                    $('#input_photo_lists').val(response.photo_list.join('\n'));
                    updateCounters();
                    updatePreview();
                }
            },
            error: function(xhr) {
                console.log('No existing photo list found');
            }
        });
    }

    function escapeHtml(text) {
        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }
    
    function showToast(icon, message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        
        Toast.fire({
            icon: icon,
            title: message
        });
    }

</script>
@endsection