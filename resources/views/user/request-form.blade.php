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

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title" id="successModalLabel">
                    <i class="fas fa-check-circle me-2"></i>Request Submitted Successfully!
                </h5>
            </div>
            <div class="modal-body text-center py-5">
                <div class="success-checkmark mb-4">
                    <div class="check-icon">
                        <span class="icon-line line-tip"></span>
                        <span class="icon-line line-long"></span>
                        <div class="icon-circle"></div>
                        <div class="icon-fix"></div>
                    </div>
                </div>
                <h4 class="text-success mb-3">Thank You!</h4>
                <p class="text-muted mb-0">Your plant request has been submitted successfully.</p>
                <p class="text-muted">We'll process your request and send a response to your email.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-success px-4" id="continueBtn">
                    <i class="fas fa-home me-2"></i>Return to Home
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Animated Success Checkmark */
.success-checkmark {
    width: 80px;
    height: 80px;
    margin: 0 auto;
}

.check-icon {
    width: 80px;
    height: 80px;
    position: relative;
    border-radius: 50%;
    box-sizing: content-box;
    border: 4px solid #4caf50;
}

.check-icon::before {
    top: 3px;
    left: -2px;
    width: 30px;
    transform-origin: 100% 50%;
    border-radius: 100px 0 0 100px;
}

.check-icon::after {
    top: 0;
    left: 30px;
    width: 60px;
    transform-origin: 0 50%;
    border-radius: 0 100px 100px 0;
    animation: rotate-circle 4.25s ease-in;
}

.icon-line {
    height: 5px;
    background-color: #4caf50;
    display: block;
    border-radius: 2px;
    position: absolute;
    z-index: 10;
}

.icon-line.line-tip {
    top: 46px;
    left: 14px;
    width: 25px;
    transform: rotate(45deg);
    animation: icon-line-tip 0.75s;
}

.icon-line.line-long {
    top: 38px;
    right: 8px;
    width: 47px;
    transform: rotate(-45deg);
    animation: icon-line-long 0.75s;
}

.icon-circle {
    top: -4px;
    left: -4px;
    z-index: 10;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    position: absolute;
    box-sizing: content-box;
    border: 4px solid rgba(76, 175, 80, 0.5);
}

.icon-fix {
    top: 8px;
    width: 5px;
    left: 26px;
    z-index: 1;
    height: 85px;
    position: absolute;
    transform: rotate(-45deg);
    background-color: #fff;
}

@keyframes rotate-circle {
    0% {
        transform: rotate(-45deg);
    }
    5% {
        transform: rotate(-45deg);
    }
    12% {
        transform: rotate(-405deg);
    }
    100% {
        transform: rotate(-405deg);
    }
}

@keyframes icon-line-tip {
    0% {
        width: 0;
        left: 1px;
        top: 19px;
    }
    54% {
        width: 0;
        left: 1px;
        top: 19px;
    }
    70% {
        width: 50px;
        left: -8px;
        top: 37px;
    }
    84% {
        width: 17px;
        left: 21px;
        top: 48px;
    }
    100% {
        width: 25px;
        left: 14px;
        top: 45px;
    }
}

@keyframes icon-line-long {
    0% {
        width: 0;
        right: 46px;
        top: 54px;
    }
    65% {
        width: 0;
        right: 46px;
        top: 54px;
    }
    84% {
        width: 55px;
        right: 0px;
        top: 35px;
    }
    100% {
        width: 47px;
        right: 8px;
        top: 38px;
    }
}
</style>

@endsection

@section('scripts')
<script>
console.log('Request form script loading...');
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded fired for request form');
    
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
    
    // Prevent double submission
    let isSubmitting = false;
    
    // Form submission
    const form = document.getElementById('requestForm');
    console.log('Attaching submit event listener to form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submit event fired, isSubmitting:', isSubmitting);
        
        // Prevent double submission
        if (isSubmitting) {
            console.log('Form already submitting, ignoring duplicate submission');
            return;
        }
        
        // Validate form
        if (selectedPlants.length === 0) {
            AlertSystem.alert({
                title: 'No Plants Selected',
                message: 'Please select at least one plant for your request.',
                type: 'warning'
            });
            return;
        }
        
        // Set submission flag
        isSubmitting = true;
        
        // Show loading state with domino loader
        LoadingManager.buttonStart(submitButton, 'Submitting...');
        
        // Show full page loading overlay
        setTimeout(() => {
            LoadingManager.show('Submitting Your Request...', 'Please wait while we process your plant request');
        }, 300);
        
        // Submit form
        const formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Clear selected plants from sessionStorage
                sessionStorage.removeItem('selectedPlants');
                
                // Hide loading
                LoadingManager.hide();
                LoadingManager.buttonStop(submitButton);
                
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                
                // Handle continue button
                document.getElementById('continueBtn').addEventListener('click', function() {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        window.location.href = '{{ route("home") }}';
                    }
                });
            } else {
                // Reset submission flag on error
                isSubmitting = false;
                LoadingManager.hide();
                LoadingManager.buttonStop(submitButton);
                AlertSystem.alert({
                    title: 'Error',
                    message: data.message || 'Failed to submit request',
                    type: 'error'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Reset submission flag on error
            isSubmitting = false;
            LoadingManager.hide();
            LoadingManager.buttonStop(submitButton);
            AlertSystem.alert({
                title: 'Error',
                message: 'An error occurred while submitting your request. Please try again.',
                type: 'error'
            });
        });
    });
});
</script>
@endsection 