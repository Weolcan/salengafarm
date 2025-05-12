@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i>Plant Request Submitted</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-info mb-4">
                <i class="fas fa-info-circle me-2"></i> Your request has been successfully submitted. A copy has been sent to your email.
            </div>
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold">Your Name</label>
                        <p>{{ $requestData['name'] }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold">Email</label>
                        <p>{{ $requestData['email'] }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold">Contact Number</label>
                        <p>{{ $requestData['contact_number'] }}</p>
                    </div>
                </div>
            </div>
            
            <h5 class="mb-3">Selected Plants</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Plant Name</th>
                            <th>Code</th>
                            <th style="width: 80px;">Qty</th>
                            <th>Height (mm)</th>
                            <th>Spread (mm)</th>
                            <th>Spacing (mm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requestData['plants'] as $plant)
                        <tr>
                            <td>{{ $plant['name'] }}</td>
                            <td>{{ $plant['code'] }}</td>
                            <td>{{ $plant['quantity'] }}</td>
                            <td>{{ $plant['height'] ?? '-' }}</td>
                            <td>{{ $plant['spread'] ?? '-' }}</td>
                            <td>{{ $plant['spacing'] ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                <p class="text-muted">Request Date: {{ $requestData['created_at'] }}</p>
                <p class="text-muted">Reference ID: {{ substr(md5($requestData['email'] . $requestData['created_at']), 0, 8) }}</p>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Plants
                </a>
                <button type="button" class="btn btn-success" onclick="window.print()">
                    <i class="fas fa-print me-2"></i>Print Request
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    header, footer, .btn, .alert {
        display: none !important;
    }
    
    .card {
        border: none !important;
        box-shadow: none !important;
    }
    
    .card-header {
        background-color: #f8f9fa !important;
        color: #000 !important;
    }
}
</style>

<script>
// Show an alert when the page loads
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        alert('Your plant request has been submitted successfully!');
        
        // Clear any selected plants from storage
        if (window.sessionStorage) {
            sessionStorage.removeItem('selectedPlants');
        }
    }, 500);
});
</script>
@endsection 