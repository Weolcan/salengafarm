@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">My Request Details #{{ $request->id }}</h1>
            <p class="text-muted">View your request details</p>
        </div>
        <div>
            <a href="{{ route('user.requests.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to My Requests
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <!-- Request Info -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Request Information</h5>
                    <button class="btn btn-sm btn-outline-primary edit-btn" data-target="#request-info">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div class="card-body" id="request-info">
                    <div class="mb-3">
                        <label class="fw-bold">Status:</label>
                        <p>
                            @if($request->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($request->status == 'sent')
                                <span class="badge bg-success">Sent</span>
                            @elseif($request->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-secondary">{{ $request->status }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Request Date:</label>
                        <p>{{ $request->request_date->format('M d, Y g:i A') }}</p>
                    </div>
                    @if($request->due_date)
                    <div class="mb-3">
                        <label class="fw-bold">Preferred Delivery Date:</label>
                        <p>{{ $request->due_date->format('M d, Y') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- User Information -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="card-title">User Information</h5>
                    <button class="btn btn-sm btn-outline-primary edit-btn" data-target="#user-info">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div class="card-body" id="user-info">
                    <div class="mb-3">
                        <label class="fw-bold">Name:</label>
                        <p>{{ $request->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Email:</label>
                        <p>{{ $request->email }}</p>
                    </div>
                    @if($request->phone)
                    <div class="mb-3">
                        <label class="fw-bold">Phone:</label>
                        <p>{{ $request->phone }}</p>
                    </div>
                    @endif
                    @if($request->address)
                    <div class="mb-3">
                        <label class="fw-bold">Address:</label>
                        <p>{{ $request->address }}</p>
                    </div>
                    @endif
                    @if($request->message)
                    <div class="mb-3">
                        <label class="fw-bold">Additional Message:</label>
                        <p>{{ $request->message }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Request Summary -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Request Summary</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="fw-bold">Total Plants:</label>
                        <p>{{ is_array($request->items_json) ? count($request->items_json) : 0 }} plants</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Request Type:</label>
                        <p><span class="badge bg-info">User Request</span></p>
                    </div>
                    @if($request->pdf_path)
                    <a href="{{ route('user.requests.download-pdf', $request->id) }}" class="btn btn-success w-100">
                        <i class="fas fa-download me-1"></i> Download PDF
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Requested Items -->
    <div class="card mb-4">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Requested Plants</h5>
            <button class="btn btn-sm btn-outline-primary edit-btn" data-target="#items-section">
                <i class="fas fa-edit"></i>
            </button>
        </div>
        <div class="card-body" id="items-section">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Plant Name</th>
                            <th>Plant Code</th>
                            <th>Quantity</th>
                            <th>Height (mm)</th>
                            <th>Spread (mm)</th>
                            <th>Spacing (mm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(is_array($request->items_json))
                            @foreach($request->items_json as $plant)
                                <tr>
                                    <td>{{ $plant['name'] ?? 'N/A' }}</td>
                                    <td>{{ $plant['code'] ?? 'N/A' }}</td>
                                    <td>{{ $plant['quantity'] ?? 1 }}</td>
                                    <td>{{ $plant['height'] ?? 'N/A' }}</td>
                                    <td>{{ $plant['spread'] ?? 'N/A' }}</td>
                                    <td>{{ $plant['spacing'] ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No plant details available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/view_request.js') }}"></script>
@endsection
