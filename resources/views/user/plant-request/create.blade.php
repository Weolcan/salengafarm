@extends('layouts.public')

@push('styles')
<link href="{{ asset('css/plant-request.css') }}?v={{ time() }}" rel="stylesheet">
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Plant Request Form</h4>
                </div>
                <div class="card-body p-4">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('user.plant-request.store') }}" method="POST" id="userPlantRequestForm">
                        @csrf
                        <input type="hidden" name="items_json" id="items_json" value="[]">

                        <div class="row mb-4">
                            <div class="col-md-12 mb-4">
                                <div class="card mb-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">Plant Selection</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>Please select the plants you're interested in from our inventory.</p>
                                        <a href="{{ route('user.plant-request.select-plants') }}" class="btn btn-primary btn-lg w-100">
                                            <i class="fas fa-leaf me-2"></i>Select Plants
                                        </a>
                                        <div id="selected-plants-container" class="mt-3 d-none">
                                            <h6>Selected Plants:</h6>
                                            <ul id="selected-plants-list" class="list-group">
                                                <!-- Selected plants will be displayed here -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="card mb-4">
                                    <div class="card-header bg-secondary text-white">
                                        <h5 class="mb-0">Contact Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Your Name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="preferred_delivery_date" class="form-label">Preferred Delivery Date</label>
                                                <input type="date" class="form-control @error('preferred_delivery_date') is-invalid @enderror" id="preferred_delivery_date" name="preferred_delivery_date" value="{{ old('preferred_delivery_date') }}" min="{{ date('Y-m-d', strtotime('+3 days')) }}">
                                                @error('preferred_delivery_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="card mb-4">
                                    <div class="card-header bg-secondary text-white">
                                        <h5 class="mb-0">Delivery & Additional Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Delivery Address</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="message" class="form-label">Additional Information or Special Requirements</label>
                                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                                            @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input @error('agree_to_terms') is-invalid @enderror" type="checkbox" id="agree_to_terms" name="agree_to_terms" required>
                                            <label class="form-check-label" for="agree_to_terms">
                                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
                                            </label>
                                            @error('agree_to_terms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success btn-lg py-3" id="submitRequestBtn" disabled>
                                        <i class="fas fa-paper-plane me-2"></i>Submit Plant Request
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Terms and Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Plant Request Terms and Conditions</h5>
                <p>Please read these terms carefully before submitting your plant request.</p>
                <ol>
                    <li>All plant requests are subject to availability.</li>
                    <li>The farm will contact you within 2-3 business days to confirm your request and provide pricing information.</li>
                    <li>Delivery dates are estimates and may vary based on plant availability and location.</li>
                    <li>Payment terms will be discussed after request confirmation.</li>
                    <li>Plant sizes may vary slightly from those requested.</li>
                    <li>By submitting this form, you agree to be contacted regarding your plant request.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        // Check for selected plants in session storage
        const checkSelectedPlants = function() {
            const selectedPlants = JSON.parse(sessionStorage.getItem('selectedPlants') || '[]');

            if (selectedPlants.length > 0) {
                // Update hidden input
                $('#items_json').val(JSON.stringify(selectedPlants));

                // Show selected plants
                $('#selected-plants-container').removeClass('d-none');
                const plantsList = $('#selected-plants-list');
                plantsList.empty();

                selectedPlants.forEach(function(plant) {
                    plantsList.append(`
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${plant.name}</strong>
                                <span class="badge bg-primary ms-2">Qty: ${plant.quantity || 1}</span>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-plant" data-id="${plant.id}" aria-label="Remove ${plant.name}">
                                <i class="fas fa-times"></i>
                            </button>
                        </li>
                    `);
                });

                // Enable submit button
                $('#submitRequestBtn').prop('disabled', false);
            } else {
                // Hide selected plants section
                $('#selected-plants-container').addClass('d-none');

                // Disable submit button
                $('#submitRequestBtn').prop('disabled', true);
            }
        };

        // Check on page load
        checkSelectedPlants();

        // Remove plant from selection
        $(document).on('click', '.remove-plant', function() {
            const plantId = $(this).data('id');
            let selectedPlants = JSON.parse(sessionStorage.getItem('selectedPlants') || '[]');

            selectedPlants = selectedPlants.filter(plant => plant.id !== plantId);
            sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));

            checkSelectedPlants();
        });
    });
</script>
@endsection