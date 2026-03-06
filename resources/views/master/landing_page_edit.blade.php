@extends('layouts.app')

@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Libertinus+Serif+Display&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background: #fafbfc;
    }

    .page-header {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }

    .page-header h1 {
        font-family: 'Libertinus Serif Display', serif;
        font-size: 2rem;
        color: #222;
        margin: 0;
        letter-spacing: 2px;
    }

    .section-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 30px;
        margin-bottom: 25px;
    }

    .section-title {
        font-family: 'Libertinus Serif Display', serif;
        font-size: 1.5rem;
        color: #222;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e8e8e8;
        letter-spacing: 1px;
    }

    .image-upload-group {
        margin-bottom: 30px;
    }

    .image-label {
        font-weight: 600;
        color: #555;
        margin-bottom: 10px;
        display: block;
        font-size: 0.95rem;
    }

    .image-preview-container {
        display: flex;
        gap: 20px;
        align-items: flex-start;
        margin-top: 10px;
    }

    .image-preview {
        max-width: 300px;
        max-height: 300px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        object-fit: cover;
    }

    .upload-controls {
        flex: 1;
    }

    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        background: #222;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .custom-file-upload:hover {
        background: #000;
        transform: translateY(-1px);
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .file-info {
        margin-top: 10px;
        font-size: 0.85rem;
        color: #888;
    }

    .btn-save {
        background: #222;
        color: white;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    .btn-save:hover {
        background: #000;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-save:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d4edda;
        border-left: 4px solid #28a745;
        color: #155724;
    }

    .alert-danger {
        background: #f8d7da;
        border-left: 4px solid #dc3545;
        color: #721c24;
    }

    .grid-preview {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 15px;
    }

    .grid-preview-item {
        text-align: center;
    }

    .grid-preview-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .grid-preview-item .image-label {
        margin-top: 10px;
        font-size: 0.85rem;
    }

    .btn-delete-portfolio:hover {
        background: #c82333 !important;
        transform: scale(1.05);
    }

    .portfolio-image-item {
        transition: all 0.3s ease;
    }

    .portfolio-image-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    }
</style>
@endsection

@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="page-header">
                        <h1><i class="fas fa-image"></i> LANDING PAGE EDITOR</h1>
                        <p style="margin: 10px 0 0; color: #888;">Manage images displayed on the landing page</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <!-- Hero Image Section (Dynamic) - Separate Form -->
            <div class="section-card">
                <h3 class="section-title"><i class="fas fa-star"></i> Hero Section (Dynamic)</h3>
                <p style="color: #888; margin-bottom: 20px;">Upload and manage the hero background image displayed on the landing page.</p>
                
                <!-- Upload Hero Image -->
                <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                    <h5 style="font-weight: 600; margin-bottom: 15px; color: #222;">
                        <i class="fas fa-upload"></i> Upload Hero Image
                    </h5>
                    <form action="{{ route('master.uploadHeroImage') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                        @csrf
                        <label class="custom-file-upload">
                            <input type="file" name="hero_image" accept="image/*" required onchange="previewNewHero(this)">
                            <i class="fas fa-upload"></i> Choose Image
                        </label>
                        <button type="submit" class="btn-save" style="padding: 10px 24px; margin: 0;">
                            <i class="fas fa-cloud-upload-alt"></i> Upload
                        </button>
                        <div class="file-info" style="margin: 0;">
                            <i class="fas fa-info-circle"></i> Recommended size: 1920x600px, Max 5MB
                        </div>
                    </form>
                    <div id="new-hero-preview" style="margin-top: 15px; display: none;">
                        <img id="preview-new-hero" style="max-width: 400px; max-height: 250px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    </div>
                </div>

                <!-- Current Hero Image -->
                <div style="border-top: 2px solid #e8e8e8; padding-top: 20px;">
                    <h5 style="font-weight: 600; margin-bottom: 15px; color: #222;">
                        <i class="fas fa-image"></i> Current Hero Image
                    </h5>
                    
                    @if(isset($heroImage))
                        <div style="text-align: center; background: white; border: 2px solid #e8e8e8; border-radius: 8px; padding: 15px;">
                            <img src="{{ $heroImage }}" style="max-width: 100%; max-height: 400px; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <p style="margin-top: 10px; color: #888; font-size: 0.85rem;">
                                <i class="fas fa-check-circle" style="color: #28a745;"></i> Hero image is set
                            </p>
                        </div>
                    @else
                        <div style="text-align: center; padding: 40px; color: #999; background: #f9f9f9; border-radius: 8px; border: 2px dashed #ddd;">
                            <i class="fas fa-image" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;"></i>
                            <p>No hero image uploaded yet. Upload one above!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Portfolio Gallery Section (Dynamic) - Separate Form -->
            <div class="section-card">
                <h3 class="section-title"><i class="fas fa-th-large"></i> Portfolio Gallery (Dynamic)</h3>
                <p style="color: #888; margin-bottom: 20px;">Upload and manage portfolio images that will be displayed in the portfolio section.</p>
                
                <!-- Upload New Image -->
                <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
                    <h5 style="font-weight: 600; margin-bottom: 15px; color: #222;">
                        <i class="fas fa-plus-circle"></i> Upload New Portfolio Image
                    </h5>
                    <form action="{{ route('master.uploadPortfolioImage') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                        @csrf
                        <label class="custom-file-upload">
                            <input type="file" name="portfolio_image" accept="image/*" required onchange="previewNewPortfolio(this)">
                            <i class="fas fa-upload"></i> Choose Image
                        </label>
                        <button type="submit" class="btn-save" style="padding: 10px 24px; margin: 0;">
                            <i class="fas fa-cloud-upload-alt"></i> Upload
                        </button>
                        <div class="file-info" style="margin: 0;">
                            <i class="fas fa-info-circle"></i> Max 5MB, formats: JPG, PNG, GIF
                        </div>
                    </form>
                    <div id="new-portfolio-preview" style="margin-top: 15px; display: none;">
                        <img id="preview-new-portfolio" style="max-width: 250px; max-height: 250px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    </div>
                </div>

                <!-- List of Portfolio Images -->
                <div style="border-top: 2px solid #e8e8e8; padding-top: 20px;">
                    <h5 style="font-weight: 600; margin-bottom: 15px; color: #222;">
                        <i class="fas fa-images"></i> Current Portfolio Images ({{ count($portfolioImages ?? []) }})
                    </h5>
                    
                    @if(isset($portfolioImages) && count($portfolioImages) > 0)
                        <div class="grid-preview" style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));">
                            @foreach($portfolioImages as $image)
                                <div class="portfolio-image-item" data-path="{{ $image['path'] }}" style="position: relative; border: 2px solid #e8e8e8; border-radius: 8px; padding: 10px; background: white;">
                                    <img src="{{ asset($image['url']) }}" style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px;">
                                    <div style="margin-top: 10px; font-size: 0.8rem; color: #666;">
                                        <i class="fas fa-file-image"></i> {{ $image['name'] }}<br>
                                        <i class="fas fa-weight"></i> {{ number_format($image['size'] / 1024, 1) }} KB
                                    </div>
                                    <button onclick="deletePortfolioImage('{{ $image['path'] }}', this)" 
                                            class="btn-delete-portfolio" 
                                            style="position: absolute; top: 5px; right: 5px; background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; transition: all 0.3s;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div style="text-align: center; padding: 40px; color: #999; background: #f9f9f9; border-radius: 8px;">
                            <i class="fas fa-image" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;"></i>
                            <p>No portfolio images yet. Upload your first image above!</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')    
<script>        
    function previewNewPortfolio(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                $('#new-portfolio-preview').show();
                $('#preview-new-portfolio').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewNewHero(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                $('#new-hero-preview').show();
                $('#preview-new-hero').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function deletePortfolioImage(imagePath, button) {
        if (!confirm('Are you sure you want to delete this image?')) {
            return;
        }

        const $button = $(button);
        const originalHtml = $button.html();
        $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

        $.ajax({
            url: '{{ route("master.deletePortfolioImage") }}',
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                image_path: imagePath
            },
            success: function(response) {
                if (response.success) {
                    // Remove the item with animation
                    $button.closest('.portfolio-image-item').fadeOut(300, function() {
                        $(this).remove();
                        
                        // Update count
                        const remainingCount = $('.portfolio-image-item').length;
                        $('h5:contains("Current Portfolio Images")').html(
                            '<i class="fas fa-images"></i> Current Portfolio Images (' + remainingCount + ')'
                        );
                        
                        // Show empty state if no images left
                        if (remainingCount === 0) {
                            $('.grid-preview').parent().html(`
                                <div style="text-align: center; padding: 40px; color: #999; background: #f9f9f9; border-radius: 8px;">
                                    <i class="fas fa-image" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;"></i>
                                    <p>No portfolio images yet. Upload your first image above!</p>
                                </div>
                            `);
                        }
                    });
                    
                    // Show success message
                    alert('Image deleted successfully!');
                } else {
                    alert('Error: ' + response.message);
                    $button.prop('disabled', false).html(originalHtml);
                }
            },
            error: function(xhr) {
                alert('Error deleting image. Please try again.');
                $button.prop('disabled', false).html(originalHtml);
            }
        });
    }
</script>
@endsection
