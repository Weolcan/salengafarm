@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i>Request Submitted Successfully</h4>
                </div>
                <div class="card-body text-center py-5">
                    <div class="success-icon mb-4">
                        <i class="fas fa-leaf fa-5x text-success"></i>
                    </div>
                    
                    <h3 class="mb-4">Thank You for Your Plant Request!</h3>
                    
                    <p class="mb-4">Your request has been received and is being processed. Your request reference number is: <strong>#{{ $request->id }}</strong></p>
                    
                    <div class="alert alert-info mb-4">
                        <p><i class="fas fa-info-circle me-2"></i>We've sent a confirmation email to <strong>{{ $request->email }}</strong> with the details of your request.</p>
                    </div>
                    
                    <p>Our team will review your request and get back to you within 2-3 business days.</p>
                    
                    <hr class="my-4">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="d-grid gap-3">
                                <a href="{{ route('user.plant-request.download-pdf', $request->id) }}" class="btn btn-outline-success">
                                    <i class="fas fa-file-pdf me-2"></i>Download Your Request
                                </a>
                                <a href="{{ route('public.plants') }}" class="btn btn-primary">
                                    <i class="fas fa-home me-2"></i>Return to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Clear selection from session storage
        sessionStorage.removeItem('selectedPlants');
    });
</script>
@endsection 