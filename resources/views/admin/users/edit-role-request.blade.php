<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Role Request - Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
</head>
<body class="bg-light dashboard-page">
    <div id="sidebarOverlay"></div>
    <div class="dashboard-flex">
        @include('layouts.sidebar')
        <button id="sidebarToggle" class="btn btn-success d-lg-none" type="button">
            <i class="fa fa-bars" style="font-size: 1.3rem;"></i>
        </button>
        <div class="main-content">
            <div style="padding-top: 0;">
                <div class="p-0">
                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 15px;">
                        <h2 class="mb-0">Edit Role Request #{{ $roleRequest->id }}</h2>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to User Management
                        </a>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="{{ route('users.role-requests.update', $roleRequest->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Account Type</label>
                                        <input type="text" class="form-control" value="{{ ucfirst($roleRequest->account_type) }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status" required>
                                            <option value="pending" {{ $roleRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $roleRequest->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $roleRequest->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" value="{{ $roleRequest->full_name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $roleRequest->email }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="contact_number" value="{{ $roleRequest->contact_number }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ $roleRequest->gender === 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $roleRequest->gender === 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ $roleRequest->gender === 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>

                                @if($roleRequest->account_type === 'individual')
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" rows="2">{{ $roleRequest->address }}</textarea>
                                </div>
                                @else
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{ $roleRequest->company_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Company Address</label>
                                        <input type="text" class="form-control" name="company_address" value="{{ $roleRequest->company_address }}">
                                    </div>
                                </div>
                                @endif

                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" name="message" rows="3" readonly>{{ $roleRequest->message }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Admin Notes</label>
                                    <textarea class="form-control" name="admin_notes" rows="3">{{ $roleRequest->admin_notes }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="make_client" id="make_client" value="1">
                                        <label class="form-check-label" for="make_client">
                                            <strong>Make this user a client</strong> (This will set is_client = true for the user)
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
