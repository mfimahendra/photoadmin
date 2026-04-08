@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Portfolio Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Upload Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Upload Portfolio Images</h3>
                        </div>
                        <div class="card-body">
                            <form id="uploadForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="university_id">University <span class="text-danger">*</span></label>
                                            <select class="form-control" id="university_id" name="university_id" required>
                                                <option value="">-- Select University --</option>
                                                @foreach($universities as $univ)
                                                    <option value="{{ $univ->id }}">{{ $univ->university }} ({{ $univ->city }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="images">Images <span class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images" name="images[]" multiple accept="image/*" required>
                                                <label class="custom-file-label" for="images">Choose images...</label>
                                            </div>
                                            <small class="form-text text-muted">You can select multiple images. Max 5MB per image.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" id="btnUpload">
                                            <i class="fas fa-upload"></i> Upload Images
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio Gallery Grouped by University -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Portfolio Gallery (Grouped by University)</h3>
                        </div>
                        <div class="card-body">
                            @if($groupedPortfolio->count() > 0)
                                @foreach($groupedPortfolio as $universityCode => $images)
                                    <div class="university-group mb-5">
                                        <h4 class="mb-3 text-primary">
                                            <i class="fas fa-university"></i> {{ $universityCode }}
                                            <span class="badge badge-info">{{ count($images) }} images</span>
                                        </h4>
                                        <div class="row">
                                            @foreach($images as $image)
                                                <div class="col-md-3 col-sm-6 mb-3">
                                                    <div class="card portfolio-card">
                                                        <img src="{{ asset($image['url']) }}" class="card-img-top portfolio-img" alt="{{ $image['filename'] }}" style="height: 200px; object-fit: cover;">
                                                        <div class="card-body p-2">
                                                            <p class="card-text text-truncate mb-1" style="font-size: 0.85rem;" title="{{ $image['filename'] }}">
                                                                {{ $image['filename'] }}
                                                            </p>
                                                            <button type="button" class="btn btn-danger btn-sm btn-block btn-delete" data-filename="{{ $image['filename'] }}">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <div class="text-center text-muted py-5">
                                    <i class="fas fa-images fa-3x mb-3"></i>
                                    <p>No portfolio images uploaded yet.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image Preview</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="previewImage" src="" class="img-fluid" alt="Preview">
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Update file input label
    $('#images').on('change', function() {
        var fileCount = this.files.length;
        var label = fileCount > 1 ? fileCount + ' files selected' : this.files[0].name;
        $(this).next('.custom-file-label').html(label);
    });

    // Handle form upload
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var btnUpload = $('#btnUpload');
        
        btnUpload.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
        
        $.ajax({
            url: '{{ route("portfolio.upload") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr) {
                var message = xhr.responseJSON?.message || 'Upload failed';
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: message
                });
                btnUpload.prop('disabled', false).html('<i class="fas fa-upload"></i> Upload Images');
            }
        });
    });

    // Handle delete
    $('.btn-delete').on('click', function() {
        var filename = $(this).data('filename');
        var card = $(this).closest('.col-md-3');
        
        Swal.fire({
            title: 'Are you sure?',
            text: 'Delete this image: ' + filename + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("portfolio.delete") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        filename: filename
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        card.fadeOut(300, function() {
                            $(this).remove();
                            // Check if group is empty
                            var group = card.closest('.university-group');
                            if (group.find('.col-md-3').length === 0) {
                                group.next('hr').remove();
                                group.remove();
                            }
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: xhr.responseJSON?.message || 'Delete failed'
                        });
                    }
                });
            }
        });
    });

    // Image click preview
    $('.portfolio-img').on('click', function() {
        var src = $(this).attr('src');
        $('#previewImage').attr('src', src);
        $('#imageModal').modal('show');
    });

    // Add hover effect
    $('.portfolio-card').hover(
        function() {
            $(this).css('transform', 'scale(1.05)');
            $(this).css('box-shadow', '0 8px 16px rgba(0,0,0,0.2)');
        },
        function() {
            $(this).css('transform', 'scale(1)');
            $(this).css('box-shadow', '');
        }
    );
});
</script>

<style>
.portfolio-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.portfolio-img:hover {
    opacity: 0.8;
}

.university-group {
    border-left: 4px solid #007bff;
    padding-left: 20px;
}
</style>
@endsection
