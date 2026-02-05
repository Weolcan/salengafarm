@extends('layouts.public')

@push('styles')
<link href="{{ asset('css/loading.css') }}" rel="stylesheet">
<style>
    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }
    .btn-sm i {
        font-size: 0.875rem;
    }
    
    /* Fixed height for recent requests table - max 8 rows */
    .recent-requests-wrapper {
        max-height: 480px; /* Approximately 8 rows at ~60px per row */
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    /* Sticky table header */
    .recent-requests-wrapper thead {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #f8f9fa;
    }
    
    /* Custom scrollbar styling */
    .recent-requests-wrapper::-webkit-scrollbar {
        width: 8px;
    }
    
    .recent-requests-wrapper::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    .recent-requests-wrapper::-webkit-scrollbar-thumb {
        background: #198754;
        border-radius: 4px;
    }
    
    .recent-requests-wrapper::-webkit-scrollbar-thumb:hover {
        background: #146c43;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0"><i class="fas fa-gauge me-2 text-success"></i>Dashboard</h4>
    </div>

    <div class="row g-3">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Recent Requests</h6>
                </div>
                <div class="card-body p-0">
                    <div class="recent-requests-wrapper">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;">ID</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $r)
                                <tr>
                                    <td>#{{ $r->id }}</td>
                                    <td>{{ optional($r->created_at)->format('M d, Y') ?? '—' }}</td>
                                    <td>
                                        @php
                                            $status = strtolower($r->status ?? 'pending');
                                            // Change 'sent' to 'received' for display
                                            $displayStatus = $status === 'sent' ? 'received' : $status;
                                            $badgeClass = in_array($status, ['approved','sent','completed']) ? 'success' : ($status === 'pending' ? 'warning' : 'secondary');
                                        @endphp
                                        <span class="badge bg-{{ $badgeClass }}">
                                            {{ ucfirst($displayStatus) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        No requests yet. Go to <a href="{{ route('public.plants') }}">Home</a> to place a request.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <a href="{{ route('public.plants') }}" class="btn btn-success w-100">
                    <i class="fas fa-rotate-left me-2"></i>Return to Home to Request
                </a>
            </div>
            @if(!auth()->user()->is_client)
            <div class="mb-3">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#clientRequestModal">
                    <i class="fas fa-user-plus me-2"></i>Request to be a Client
                </button>
            </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="mb-2">Tips</h6>
                    <ul class="mb-0">
                        <li>To request plants, go back to Home and use the Request button.</li>
                        <li>We’ll email you when your quotation is ready.</li>
                        <li>This page shows a simple summary of your recent requests.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Client Request Modal -->
<div class="modal fade" id="clientRequestModal" tabindex="-1" aria-labelledby="clientRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="clientRequestModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Request to Become a Client
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Benefits of becoming a client:</strong>
                </div>
                <ul class="mb-3">
                    <li>Access to detailed pricing and quotations</li>
                    <li>Priority order processing</li>
                    <li>Flexible delivery arrangements</li>
                    <li>Ongoing support for all your plant needs</li>
                    <li>Access to exclusive plant varieties</li>
                </ul>
                
                <form id="clientRequestForm" method="POST" action="{{ route('client-request.submit') }}">
                    @csrf
                    
                    <!-- Account Type Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Account Type <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="account_type" id="accountIndividual" value="individual" checked onchange="toggleAccountFields()">
                                    <label class="form-check-label" for="accountIndividual">
                                        <i class="fas fa-user me-1"></i> Individual / Homeowner
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="account_type" id="accountCompany" value="company" onchange="toggleAccountFields()">
                                    <label class="form-check-label" for="accountCompany">
                                        <i class="fas fa-building me-1"></i> Company / Organization
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Individual Fields -->
                    <div id="individualFields">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="full_name_individual" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name_individual" name="full_name" value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_individual" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="contact_individual" name="contact_number" value="{{ auth()->user()->contact_number }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address_individual" class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address_individual" name="address" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="email_individual" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_individual" name="email" value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>

                    <!-- Company Fields -->
                    <div id="companyFields" style="display: none;">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="full_name_company" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name_company" name="full_name_company" value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_company" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="contact_company" name="contact_number_company" value="{{ auth()->user()->contact_number }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender_company" class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-select" id="gender_company" name="gender_company">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ auth()->user()->company_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="company_address" class="form-label">Company Address (Optional)</label>
                            <textarea class="form-control" id="company_address" name="company_address" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="email_company" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_company" name="email_company" value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="request_message" class="form-label">Additional Message (Optional)</label>
                        <textarea class="form-control" id="request_message" name="message" rows="3" placeholder="Tell us about your business or why you'd like to become a client..."></textarea>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <small>Your request will be sent to our team for review. We'll contact you via email within 1-2 business days.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="clientRequestForm" class="btn btn-success" id="submitRequestBtn">
                    <span id="submitBtnText"><i class="fas fa-paper-plane me-2"></i>Submit Request</span>
                    <span id="submitBtnLoader" style="display: none;">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Submitting...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="clientRequestSuccessModal" tabindex="-1" aria-labelledby="clientRequestSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title" id="clientRequestSuccessModalLabel">
                    <i class="fas fa-check-circle me-2"></i>Request Sent Successfully!
                </h5>
            </div>
            <div class="modal-body text-center py-5">
                <div class="success-checkmark mb-4">
                    <div class="check-icon">
                        <span class="icon-line line-tip"></span>
                        <span class="icon-line line-long"></span>
                        <div class="checkmark-circle"></div>
                        <div class="icon-fix"></div>
                    </div>
                </div>
                <h4 class="text-success mb-3">Thank You!</h4>
                <p class="text-muted mb-0">Your client request has been sent!</p>
                <p class="text-muted">We've received your request to become a client. Our team will review your information and contact you via email within 1-2 business days.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">
                    <i class="fas fa-check me-2"></i>Continue
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

.checkmark-circle {
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

<script src="{{ asset('js/loading.js') }}"></script>
<script>
// Check if there's a success message and show modal
@if(session('success'))
    document.addEventListener('DOMContentLoaded', function() {
        var successModal = new bootstrap.Modal(document.getElementById('clientRequestSuccessModal'));
        successModal.show();
    });
@endif

// Form submission with loading screen
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('clientRequestForm');
    const submitBtn = document.getElementById('submitRequestBtn');
    const submitBtnText = document.getElementById('submitBtnText');
    const submitBtnLoader = document.getElementById('submitBtnLoader');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            // Show button loader
            submitBtnText.style.display = 'none';
            submitBtnLoader.style.display = 'inline-block';
            submitBtn.disabled = true;
            
            // Show standardized loading overlay
            setTimeout(function() {
                LoadingManager.show('Submitting your request...');
            }, 300);
        });
    }
});

function toggleAccountFields() {
    const isIndividual = document.getElementById('accountIndividual').checked;
    const individualFields = document.getElementById('individualFields');
    const companyFields = document.getElementById('companyFields');
    
    if (isIndividual) {
        individualFields.style.display = 'block';
        companyFields.style.display = 'none';
        // Enable individual fields
        document.querySelectorAll('#individualFields input, #individualFields select, #individualFields textarea').forEach(el => {
            if (!el.readOnly) el.required = true;
        });
        // Disable company fields
        document.querySelectorAll('#companyFields input:not([readonly]), #companyFields select, #companyFields textarea').forEach(el => {
            el.required = false;
        });
    } else {
        individualFields.style.display = 'none';
        companyFields.style.display = 'block';
        // Disable individual fields
        document.querySelectorAll('#individualFields input:not([readonly]), #individualFields select, #individualFields textarea').forEach(el => {
            el.required = false;
        });
        // Enable company fields (except optional ones)
        document.getElementById('full_name_company').required = true;
        document.getElementById('contact_company').required = true;
        document.getElementById('gender_company').required = true;
        document.getElementById('company_name').required = true;
    }
}
</script>

@push('scripts')
<script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
@endsection
