@extends('layouts.guest')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .form-group label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-group label i {
            margin-right: 5px;
        }

        .btn {
            border-radius: 5px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            /* border-radius: 10px 10px 0 0 !important; */
        }

        .card-primary.card-outline .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .custom-control-label {
            font-weight: 500;
            cursor: pointer;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #495057;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            color: #667eea;
        }

        @media (max-width: 991px) {
            .card {
                margin-bottom: 1rem;
            }

            .btn {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-camera"></i> {{ $title }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>
                            Panduan Mengisi Booking Form: <br>

                            1. Gunakan EYD + huruf kapital di awal kata <br>
                            2. Tulis singkatan Univ (contoh: UNAIR, UB, IIK BW) <br>
                            3. Kota = kota kampus, bukan kota domisili <br>
                            4. Contoh jam -> 05.30 - 06.30 / 13.00 - 14.00 <br>
                            5. Event tulis yg sesuai, misal: Grad / Sumpah Dokter / Pelantikan Ners <br>
                            6. Lokasi cukup sebut kampus/hotel/tempatnya, tidak perlu detail <br>
                            7. DP biarkan default, kecuali mau langsung lunas
                        </p>
                        <form id="bookingForm">
                            @csrf

                            <!-- Client Information Section -->
                            <div class="mb-4">
                                <div class="section-title">
                                    <i class="fas fa-user"></i>
                                    Data Pribadi
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="client_name">
                                                <i class="fas fa-user text-primary"></i> Nama Lengkap <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="client_name" name="client_name" required placeholder="Masukkan nama lengkap">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nickname">
                                                <i class="fas fa-id-badge text-secondary"></i> Nama Panggilan <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="nickname" name="nickname" required placeholder="Masukkan Nama Panggilan" >
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="phone">
                                                <i class="fas fa-phone text-success"></i> No. WhatsApp <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="08xxxxxxxxxx">
                                        </div>
                                    </div>                                    

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="instagram">
                                                <i class="fab fa-instagram text-danger"></i> Instagram
                                            </label>
                                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="@username">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Event Details Section -->
                            <div class="mb-4">
                                <div class="section-title">
                                    <i class="fas fa-calendar-alt"></i>
                                    Detail Acara
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="event_date">
                                                <i class="fas fa-calendar text-primary"></i> Tanggal Acara <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" id="event_date" name="event_date" required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="event_time">
                                                <i class="fas fa-clock text-info"></i> Waktu Acara
                                            </label>
                                            <input type="time" class="form-control" id="event_time" name="event_time">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="city">
                                                <i class="fas fa-city text-success"></i> Kota <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control select2" id="city" name="city" required data-placeholder="Pilih Kota">
                                                <option value=""></option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="university">
                                                <i class="fas fa-university text-primary"></i> Universitas <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control select2" id="university" name="university" required data-placeholder="Pilih Universitas">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="faculty">
                                                <i class="fas fa-graduation-cap text-success"></i> Fakultas <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control select2" id="faculty" name="faculty" required data-placeholder="Pilih Fakultas">
                                                <option value=""></option>
                                                @foreach($faculties as $faculty)
                                                    <option value="{{ $faculty->faculty }}">{{ $faculty->faculty }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3">                                        
                                        <div class="form-group">
                                            <label for="location">
                                                <i class="fas fa-map-marker-alt text-danger"></i> Lokasi <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="location" name="location" required placeholder="Masukkan lokasi acara">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="service_package">
                                                <i class="fas fa-box text-warning"></i> Paket <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control select2" id="service_package" name="service_package" required data-placeholder="Pilih Paket">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="event_type">
                                                <i class="fas fa-tags text-info"></i> Event <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control select2" id="event_type" name="event_type" required data-placeholder="Pilih Jenis Acara">
                                                <option value=""></option>
                                                @foreach($events as $event)
                                                    <option value="{{ $event->event }}">{{ $event->event }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="additional">
                                                <i class="fas fa-plus text-info"></i> Add On <small>(opsional, dapat memilih lebih dari satu)</small>
                                            </label>
                                            <select class="form-control select2" id="additional" name="additional[]" multiple data-placeholder="Pilih Layanan Tambahan">
                                                <option value=""></option>                                                
                                            </select>
                                        </div>
                                    </div>                                    

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="notes">
                                                <i class="fas fa-sticky-note text-secondary"></i> Catatan Tambahan
                                            </label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Tambahkan catatan atau permintaan khusus..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                            <hr>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fas fa-undo"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <i class="fas fa-paper-plane"></i> Kirim Booking
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        var cities = @json($cities);
        var services = @json($services);
        var universities = @json($universities);
        var faculties = @json($faculties);
        var admin_phone = "{{ $admin_phone }}";

        $(document).ready(function() {
            // Initialize select2
            $('.select2').each((_i, e) => {
                var e = $(e);
                e.select2({
                    tags: true,
                    allowClear: true,
                    theme: 'bootstrap4',
                    dropdownParent: e.parent()
                });
            });

            // Set initial state
            $('#city').val(null).trigger('change');

            // Event listener for city change to populate universities and services
            $('#city').on('change', function() {
                var selectedCity = $(this).val();

                // Filter and populate universities
                var filteredUniversities = universities.filter(function(university) {
                    return university.city === selectedCity;
                });

                var universitySelect = $('#university');
                universitySelect.empty();
                universitySelect.append('<option value=""></option>');

                filteredUniversities.forEach(function(university) {
                    var option = $('<option></option>')
                        .attr('value', university.university)
                        .text(university.university);
                    universitySelect.append(option);
                });
                universitySelect.val('').trigger('change');

                // Filter and populate services
                var filteredServices = services.filter(function(service) {
                    return service.city === selectedCity;
                });

                var serviceSelect = $('#service_package');
                serviceSelect.empty();
                serviceSelect.append('<option value=""></option>');

                filteredServices.forEach(function(service) {
                    var option = $('<option></option>')
                        .attr('value', service.id)
                        .text(service.package + ' - ' + service.duration + ' jam | Rp ' + numberWithDotsSplit3(service.price));
                    serviceSelect.append(option);
                });
                serviceSelect.val('').trigger('change');

                // Filter and populate Add On
                var filteredAdditionals = @json($additionals).filter(function(addon) {
                    return addon.city === selectedCity;
                });
                var additionalSelect = $('#additional');
                additionalSelect.empty();
                additionalSelect.append('<option value=""></option>');
                filteredAdditionals.forEach(function(addon) {
                    var option = $('<option></option>')
                        .attr('value', addon.id)
                        .text(addon.package + ' - Rp ' + numberWithDotsSplit3(addon.price));
                    additionalSelect.append(option);
                });
                additionalSelect.val(null).trigger('change');
            });


            // user only input without space for nickname
            $('#nickname').on('input', function() {
                this.value = this.value.replace(/\s/g, '');
            });


            // Set minimum date to today
            var today = new Date().toISOString().split('T')[0];
            $('#event_date').attr('min', today);

            // Form submission
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();

                var submitBtn = $('#submitBtn');
                submitBtn.prop('disabled', true);
                submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Mengirim...');

                // Temporarily disable the additional field before creating FormData
                const additionalSelect = $('#additional');
                const additionalValues = additionalSelect.val();
                
                // Disable the select so it's not included in FormData
                additionalSelect.prop('disabled', true);
                
                const formData = new FormData(this);
                
                // Re-enable the select
                additionalSelect.prop('disabled', false);
                
                // Add the comma-separated values
                if (additionalValues && additionalValues.length > 0) {
                    formData.append('additional', additionalValues.join(','));
                }

                $.ajax({
                    url: "{{ route('clients.store') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            if (typeof success_audio !== 'undefined') {
                                success_audio.play();

                            // Redirect to WhatsApp after a short delay
                            setTimeout(function() {
                                redirectToWhatsApp(formData);
                            }, 1500);
                            }
                            
                            // Reset form
                            $('#bookingForm')[0].reset();
                            $('.select2').val(null).trigger('change');
                        } else {
                            toastr.error(response.message || 'Terjadi kesalahan. Silakan coba lagi.');
                            if (typeof error_audio !== 'undefined') {
                                error_audio.play();
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        toastr.error(errorMessage);
                        if (typeof error_audio !== 'undefined') {
                            error_audio.play();
                        }
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false);
                        submitBtn.html('<i class="fas fa-paper-plane"></i> Kirim Booking');
                    }
                });
            });
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        function numberWithDotsSplit3(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function redirectToWhatsApp(formData) {
            // Get the actual text values from select elements            
            var cityValue = formData.get('city');
            var universityValue = formData.get('university');
            var facultyValue = formData.get('faculty');
            var serviceValue = formData.get('service_package');

            // Get text values from data arrays instead of select options
            var cityText = cityValue;
            
            var universityObj = universities.find(u => u.university === universityValue);
            var universityText = universityObj ? universityObj.university : universityValue;
            
            var facultyObj = faculties.find(f => f.id == facultyValue);
            var facultyText = facultyObj ? facultyObj.faculty : facultyValue;
            
            var serviceObj = services.find(s => s.id == serviceValue);
            var serviceText = serviceObj ? serviceObj.package + ' - ' + serviceObj.duration + ' jam | Rp ' + numberWithDotsSplit3(serviceObj.price) : serviceValue;
            
            // Get selected additional services text
            var additionalTexts = [];
            var additionalValue = formData.get('additional');
            if (additionalValue) {
                var additionalIds = additionalValue.split(',');
                var additionals = @json($additionals);
                additionalIds.forEach(function(id) {
                    var addonObj = additionals.find(a => a.id == id);
                    if (addonObj) {
                        additionalTexts.push(addonObj.package + ' - Rp ' + numberWithDotsSplit3(addonObj.price));
                    }
                });
            }


            let message = "BOOKING FORM\nESOKHARI 2026\n\n";
            message += "Nama Lengkap: " + formData.get('client_name') + "\n";
            message += "Panggilan: " + formData.get('nickname') + "\n";
            message += "Univ: " + universityText + "\n";
            message += "Kota: " + cityText + "\n";            
            message += "No. WA: " + formData.get('phone') + "\n";
            message += "Ig: " + (formData.get('instagram') || '-') + "\n";
            message += "Package: " + serviceText + "\n";
            message += "Add On: " + (additionalTexts.length > 0 ? additionalTexts.join(', ') : '-') + "\n";
            message += "Tanggal: " + formatDate(formData.get('event_date')) + "\n";
            message += "Jam: " + (formData.get('event_time') || '-') + "\n";
            message += "Event: " + formData.get('event_type') + "\n";
            message += "Lokasi Foto: " + formData.get('location') + "\n";
            if (formData.get('notes')) {
                message += "\n\nCatatan Tambahan:\n" + formData.get('notes');
            }
            message += "DP: 150000\n\n";
            message += "_____\n\n";
            message += "- Wajib sertakan bukti transfernya yaa\n";
            message += "- Untuk pelunasan maksimal h-1\n\n";
            message += "No. Rek: 001922209548 (Blu by BCA Digital)\n";
            message += "A.n.: Arga Puguh Pratama\n";
            message += "••";            
            
            message = encodeURIComponent(message);

            var whatsappUrl = "https://wa.me/" + admin_phone + "?text=" + message;
            window.open(whatsappUrl, '_blank');
        }

        function formatDate(dateString) {
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            var date = new Date(dateString);
            return date.toLocaleDateString('id-ID', options);
        }

    </script>
@endsection
