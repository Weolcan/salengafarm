@extends('layouts.public')

@push('styles')
<link href="{{ asset('css/plant-selection-grid.css') }}?v={{ time() }}" rel="stylesheet">
@endpush

@section('content')

<div class="container py-5">
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Select Plants for Your Request</h4>
                    <a href="{{ route('user.plant-request.create') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>Back to Form
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="search-filter-section">
                        <div class="row mb-4">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" id="plantSearchInput" placeholder="Search plants by name...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="categoryFilter">
                                    <option value="all">All Categories</option>
                                    <option value="shrub">Shrub</option>
                                    <option value="herbs">Herbs</option>
                                    <option value="palm">Palm</option>
                                    <option value="tree">Tree</option>
                                    <option value="grass">Grass</option>
                                    <option value="bamboo">Bamboo</option>
                                    <option value="fertilizer">Fertilizer</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert alert-info mb-4">
                            <p class="mb-0"><i class="fas fa-info-circle me-2"></i>Click on the plants you're interested in. You can select multiple plants.</p>
                        </div>
                    </div>

                    <div id="plantsGrid">
                        @if(count($plants) > 0)
                            @foreach($plants as $plant)
                            <div class="plant-item" data-category="{{ $plant->category }}" data-name="{{ $plant->name }}">
                                <div class="plant-card" data-plant-id="{{ $plant->id }}" data-plant-name="{{ $plant->name }}">
                                    <div class="selection-checkbox">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="plant-image-container">
                                        @if($plant->photo_path)
                                            <img src="{{ asset('storage/' . $plant->photo_path) }}" alt="{{ $plant->name }}" class="plant-image">
                                        @else
                                            <div class="no-photo-placeholder">
                                                <i class="fas fa-image fa-3x mb-2"></i>
                                                <p class="small mb-0">No Photo Available</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="plant-info">
                                        <h5 class="plant-title">{{ $plant->name }}</h5>
                                        <p class="card-text text-muted small">
                                            <span class="badge bg-light text-dark">{{ ucfirst($plant->category) }}</span>
                                            @if($plant->code)
                                            <span class="badge bg-light text-dark">Code: {{ $plant->code }}</span>
                                            @endif
                                        </p>
                                        <div class="plant-meta">
                                            @if($plant->height_mm || $plant->spread_mm || $plant->spacing_mm)
                                            <div class="card-text small">
                                                <ul class="list-unstyled mb-0">
                                                    @if($plant->height_mm)
                                                    <li><small class="text-muted">Height:</small> {{ $plant->height_mm }}mm</li>
                                                    @endif
                                                    @if($plant->spread_mm)
                                                    <li><small class="text-muted">Spread:</small> {{ $plant->spread_mm }}mm</li>
                                                    @endif
                                                    @if($plant->spacing_mm)
                                                    <li><small class="text-muted">Spacing:</small> {{ $plant->spacing_mm }}mm</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="empty-state col-12">
                                <i class="fas fa-leaf fa-3x mb-3 text-muted"></i>
                                <h4>No Plants Available</h4>
                                <p class="text-muted">There are currently no plants in our inventory.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Selection Bar -->
<div class="selection-floating-bar" id="selectionBar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 mb-2 mb-md-0">
                <div class="d-flex align-items-center">
                    <span class="badge bg-success me-2 fs-5" id="selectedCount">0</span>
                    <span>Plants Selected</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-md-end text-center">
                <button class="btn btn-secondary me-2" id="clearSelectionBtn">
                    <i class="fas fa-times me-1"></i>Clear
                </button>
                <button class="btn btn-success" id="continueBtn">
                    <i class="fas fa-check me-1"></i>Continue with Selection
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Plant Quantity Modal -->
<div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="quantityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quantityModalLabel">Customize Your Selection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">Adjust the quantity for each plant you've selected:</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plant</th>
                                <th style="width: 120px;">Quantity</th>
                                <th style="width: 80px;">Remove</th>
                            </tr>
                        </thead>
                        <tbody id="selectedPlantsTable">
                            <!-- Selected plants will be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="saveQuantitiesBtn">Save & Continue</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Enable plant selection mode
        $('body').addClass('plant-selection-mode');

        // Initialize selected plants from session storage
        let selectedPlants = JSON.parse(sessionStorage.getItem('selectedPlants') || '[]');

        // Mark previously selected plants
        selectedPlants.forEach(function(plant) {
            $(`.plant-card[data-plant-id="${plant.id}"]`).addClass('selected');
        });

        // Update selection counter
        updateSelectionCounter();

        // Toggle plant selection
        $('.plant-card').click(function() {
            const plantId = $(this).data('plant-id');
            const plantName = $(this).data('plant-name');

            $(this).toggleClass('selected');

            if ($(this).hasClass('selected')) {
                // Add to selection if not already there
                if (!selectedPlants.some(p => p.id === plantId)) {
                    selectedPlants.push({
                        id: plantId,
                        name: plantName,
                        quantity: 1
                    });
                }
            } else {
                // Remove from selection
                selectedPlants = selectedPlants.filter(p => p.id !== plantId);
            }

            // Save to session storage
            sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));

            // Update counter
            updateSelectionCounter();
        });

        // Update selection counter and floating bar
        function updateSelectionCounter() {
            const count = selectedPlants.length;
            $('#selectedCount').text(count);

            if (count > 0) {
                $('#selectionBar').addClass('active');
            } else {
                $('#selectionBar').removeClass('active');
            }
        }

        // Search functionality
        $('#plantSearchInput').on('keyup', function() {
            const value = $(this).val().toLowerCase();

            $('.plant-item').filter(function() {
                const name = $(this).data('name').toLowerCase();
                const matchesSearch = name.indexOf(value) > -1;
                const matchesCategory = $('#categoryFilter').val() === 'all' || $(this).data('category') === $('#categoryFilter').val();

                $(this).toggle(matchesSearch && matchesCategory);
            });

            // Show empty state if no plants match
            checkEmptyResults();
        });

        // Category filter
        $('#categoryFilter').on('change', function() {
            const category = $(this).val();
            const searchValue = $('#plantSearchInput').val().toLowerCase();

            $('.plant-item').filter(function() {
                const matchesCategory = category === 'all' || $(this).data('category') === category;
                const matchesSearch = $(this).data('name').toLowerCase().indexOf(searchValue) > -1;

                $(this).toggle(matchesCategory && matchesSearch);
            });

            // Show empty state if no plants match
            checkEmptyResults();
        });

        // Check for empty results
        function checkEmptyResults() {
            if ($('.plant-item:visible').length === 0) {
                if ($('#empty-results-message').length === 0) {
                    $('#plantsGrid').append(`
                        <div id="empty-results-message" class="empty-state col-12">
                            <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                            <h4>No Matching Plants</h4>
                            <p class="text-muted">Try adjusting your search or filter criteria.</p>
                        </div>
                    `);
                }
            } else {
                $('#empty-results-message').remove();
            }
        }

        // Clear selection
        $('#clearSelectionBtn').click(function() {
            selectedPlants = [];
            sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));
            $('.plant-card').removeClass('selected');
            updateSelectionCounter();
        });

        // Continue with selection
        $('#continueBtn').click(function() {
            // Populate modal with selected plants
            const table = $('#selectedPlantsTable');
            table.empty();

            selectedPlants.forEach(function(plant, index) {
                table.append(`
                    <tr data-plant-id="${plant.id}">
                        <td class="align-middle">${plant.name}</td>
                        <td>
                            <div class="input-group input-group-sm quantity-input-group mx-auto">
                                <button class="btn btn-outline-secondary decrease-qty" type="button">-</button>
                                <input type="number" class="form-control text-center plant-qty" value="${plant.quantity || 1}" min="1">
                                <button class="btn btn-outline-secondary increase-qty" type="button">+</button>
                            </div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-danger remove-plant">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            });

            // Show modal
            $('#quantityModal').modal('show');
        });

        // Quantity controls in modal
        $(document).on('click', '.increase-qty', function() {
            const input = $(this).siblings('input');
            let value = parseInt(input.val());
            input.val(value + 1);
        });

        $(document).on('click', '.decrease-qty', function() {
            const input = $(this).siblings('input');
            let value = parseInt(input.val());
            if (value > 1) {
                input.val(value - 1);
            }
        });

        // Remove plant in modal
        $(document).on('click', '.remove-plant', function() {
            const row = $(this).closest('tr');
            const plantId = row.data('plant-id');

            // Remove from UI
            row.remove();

            // Remove from array
            selectedPlants = selectedPlants.filter(p => p.id !== plantId);

            // Remove selection in the grid
            $(`.plant-card[data-plant-id="${plantId}"]`).removeClass('selected');

            // Update storage and counter
            sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));
            updateSelectionCounter();

            // Close modal if no plants left
            if (selectedPlants.length === 0) {
                $('#quantityModal').modal('hide');
            }
        });

        // Save quantities and continue
        $('#saveQuantitiesBtn').click(function() {
            // Update quantities
            $('#selectedPlantsTable tr').each(function() {
                const plantId = $(this).data('plant-id');
                const quantity = parseInt($(this).find('.plant-qty').val());

                // Update quantity in array
                const plantIndex = selectedPlants.findIndex(p => p.id === plantId);
                if (plantIndex !== -1) {
                    selectedPlants[plantIndex].quantity = quantity;
                }
            });

            // Save to session storage
            sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));

            // Close modal
            $('#quantityModal').modal('hide');

            // Return to the request form
            window.location.href = "{{ route('user.plant-request.create') }}";
        });
    });
</script>
@endsection