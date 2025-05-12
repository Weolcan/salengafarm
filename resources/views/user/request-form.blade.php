@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Plant Request Form</h4>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Plants
                    </a>
                </div>
                
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> You can request up to 20 plants. Adjust quantities and measurements as needed.
                    </div>
                    
                    <form id="requestForm" method="POST" action="{{ route('request-form.store') }}">
                        @csrf
                        
                        <!-- User Info Section -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ auth()->user()->contact_number }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Selected Plants Table -->
                        <h5 class="mb-3">Selected Plants</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="selectedPlantsTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Plant Name</th>
                                        <th>Code</th>
                                        <th style="width: 80px;">Qty</th>
                                        <th>Height (mm)</th>
                                        <th>Spread (mm)</th>
                                        <th>Spacing (mm)</th>
                                        <th style="width: 80px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="plantsTableBody">
                                    <!-- Plants will be loaded here via JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        
                        <div id="emptySelection" class="text-center py-4 d-none">
                            <i class="fas fa-leaf fa-3x text-muted mb-3"></i>
                            <p class="mb-0">No plants selected yet</p>
                            <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-search"></i> Browse Plants
                            </a>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success" id="submitButton">
                                <i class="fas fa-paper-plane"></i> Submit Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load selected plants from session storage
    const selectedPlants = JSON.parse(sessionStorage.getItem('selectedPlants') || '[]');
    const tableBody = document.getElementById('plantsTableBody');
    const emptySelection = document.getElementById('emptySelection');
    const submitButton = document.getElementById('submitButton');
    
    // Update UI based on selection
    if (selectedPlants.length === 0) {
        emptySelection.classList.remove('d-none');
        submitButton.disabled = true;
    } else {
        // Populate table with selected plants
        selectedPlants.forEach((plant, index) => {
            const row = document.createElement('tr');
            row.dataset.id = plant.id;
            
            row.innerHTML = `
                <td>${plant.name}
                    <input type="hidden" name="plants[${index}][id]" value="${plant.id}">
                    <input type="hidden" name="plants[${index}][name]" value="${plant.name}">
                </td>
                <td>${plant.code || 'N/A'}</td>
                <td>
                    <input type="number" class="form-control form-control-sm qty-input" 
                           name="plants[${index}][quantity]" 
                           value="${plant.quantity}" 
                           min="1" 
                           max="100"
                           required>
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" 
                           name="plants[${index}][height]" 
                           value="${plant.height || ''}" 
                           placeholder="mm">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" 
                           name="plants[${index}][spread]" 
                           value="${plant.spread || ''}" 
                           placeholder="mm">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm" 
                           name="plants[${index}][spacing]" 
                           value="${plant.spacing || ''}" 
                           placeholder="mm">
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-plant" data-id="${plant.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            
            tableBody.appendChild(row);
        });
    }
    
    // Handle remove plant button
    document.querySelectorAll('.remove-plant').forEach(button => {
        button.addEventListener('click', function() {
            const plantId = this.getAttribute('data-id');
            const row = this.closest('tr');
            
            // Remove from UI
            row.remove();
            
            // Remove from selectedPlants array
            const index = selectedPlants.findIndex(p => p.id === plantId);
            if (index !== -1) {
                selectedPlants.splice(index, 1);
                sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));
            }
            
            // Show empty state if no plants left
            if (selectedPlants.length === 0) {
                emptySelection.classList.remove('d-none');
                submitButton.disabled = true;
            }
            
            // Update quantity input names to maintain consecutive indexing
            document.querySelectorAll('#plantsTableBody tr').forEach((row, index) => {
                row.querySelectorAll('input[name*="plants["]').forEach(input => {
                    const name = input.name;
                    const newName = name.replace(/plants\[\d+\]/, `plants[${index}]`);
                    input.name = newName;
                });
            });
        });
    });
    
    // Handle quantity changes
    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('change', function() {
            const plantId = this.closest('tr').dataset.id;
            const newQty = parseInt(this.value);
            
            // Update in selectedPlants array
            const index = selectedPlants.findIndex(p => p.id === plantId);
            if (index !== -1) {
                selectedPlants[index].quantity = newQty;
                sessionStorage.setItem('selectedPlants', JSON.stringify(selectedPlants));
            }
        });
    });
    
    // Form submission
    document.getElementById('requestForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        if (selectedPlants.length === 0) {
            alert('Please select at least one plant for your request.');
            return;
        }
        
        // Submit form
        this.submit();
    });
});
</script>
@endpush 