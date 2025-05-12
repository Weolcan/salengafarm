@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Request Submitted Successfully</div>

                <div class="card-body">
                    <div class="alert alert-success">
                        <h4 class="alert-heading">Thank you for your request!</h4>
                        <p>Your request has been submitted successfully. Here are the details:</p>
                    </div>

                    <div class="request-details">
                        <h5>Request Information</h5>
                        <p><strong>Request ID:</strong> {{ $request->id }}</p>
                        <p><strong>Date:</strong> {{ $request->created_at->format('F d, Y') }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-warning">Pending</span></p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('public.plants') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to Plants
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 