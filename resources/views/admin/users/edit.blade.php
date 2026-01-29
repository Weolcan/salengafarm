<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Salenga Farm - Edit User</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
</head>
<body class="bg-light dashboard-page">
    <div id="sidebarOverlay"></div>
    <div class="dashboard-flex">
        @include('layouts.sidebar')
        <button id="sidebarToggle" class="btn btn-success d-lg-none" type="button" aria-label="Open sidebar">
            <i class="fa fa-bars" style="font-size: 1.3rem;"></i>
        </button>
        <div class="main-content">
            <div style="padding-top: 0;">
                <div class="p-0">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Edit User</h2>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Users
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Edit User Form -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">User Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update', $user) }}" method="POST" id="editUserForm">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name *</label>
                                            <input type="text" 
                                                   class="form-control @error('first_name') is-invalid @enderror" 
                                                   id="first_name" 
                                                   name="first_name" 
                                                   value="{{ old('first_name', $user->first_name) }}" 
                                                   required>
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name *</label>
                                            <input type="text" 
                                                   class="form-control @error('last_name') is-invalid @enderror" 
                                                   id="last_name" 
                                                   name="last_name" 
                                                   value="{{ old('last_name', $user->last_name) }}" 
                                                   required>
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email *</label>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email', $user->email) }}" 
                                                   required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="contact_number" class="form-label">Contact Number</label>
                                            <input type="text" 
                                                   class="form-control @error('contact_number') is-invalid @enderror" 
                                                   id="contact_number" 
                                                   name="contact_number" 
                                                   value="{{ old('contact_number', $user->contact_number) }}">
                                            @error('contact_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role *</label>
                                            <select class="form-select @error('role') is-invalid @enderror" 
                                                    id="role" 
                                                    name="role" 
                                                    required>
                                                <option value="">Select Role</option>
                                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_client" 
                                                       name="is_client" 
                                                       value="1"
                                                       {{ old('is_client', $user->is_client) ? 'checked' : '' }}
                                                       onchange="toggleAccountTypeFields()">
                                                <label class="form-check-label" for="is_client">
                                                    <strong>Is Client</strong>
                                                    <small class="text-muted d-block">Check this if the user is also a client</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Type Section (only shown if is_client is checked) -->
                                <div id="accountTypeSection" style="display: {{ old('is_client', $user->is_client) ? 'block' : 'none' }};">
                                    <hr class="my-4">
                                    <h6 class="mb-3">Client Information</h6>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="account_type" class="form-label">Account Type *</label>
                                                <select class="form-select @error('account_type') is-invalid @enderror" 
                                                        id="account_type" 
                                                        name="account_type"
                                                        onchange="toggleAccountFields()">
                                                    <option value="individual" {{ old('account_type', $user->account_type) == 'individual' ? 'selected' : '' }}>Individual</option>
                                                    <option value="company" {{ old('account_type', $user->account_type) == 'company' ? 'selected' : '' }}>Company</option>
                                                </select>
                                                @error('account_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Individual Fields -->
                                    <div id="individualFields" style="display: {{ old('account_type', $user->account_type) == 'individual' ? 'block' : 'none' }};">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" 
                                                           class="form-control @error('address') is-invalid @enderror" 
                                                           id="address" 
                                                           name="address" 
                                                           value="{{ old('address', $user->address) }}">
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <select class="form-select @error('gender') is-invalid @enderror" 
                                                            id="gender" 
                                                            name="gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                                        <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Company Fields -->
                                    <div id="companyFields" style="display: {{ old('account_type', $user->account_type) == 'company' ? 'block' : 'none' }};">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="company_name" class="form-label">Company Name</label>
                                                    <input type="text" 
                                                           class="form-control @error('company_name') is-invalid @enderror" 
                                                           id="company_name" 
                                                           name="company_name" 
                                                           value="{{ old('company_name', $user->company_name) }}">
                                                    @error('company_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="company_address" class="form-label">Company Address</label>
                                                    <input type="text" 
                                                           class="form-control @error('company_address') is-invalid @enderror" 
                                                           id="company_address" 
                                                           name="company_address" 
                                                           value="{{ old('company_address', $user->company_address) }}">
                                                    @error('company_address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Update User
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}?v=3"></script>
    <script>
        function toggleAccountTypeFields() {
            const isClient = document.getElementById('is_client').checked;
            const accountTypeSection = document.getElementById('accountTypeSection');
            
            if (isClient) {
                accountTypeSection.style.display = 'block';
                toggleAccountFields(); // Also toggle the specific fields
            } else {
                accountTypeSection.style.display = 'none';
            }
        }
        
        function toggleAccountFields() {
            const accountType = document.getElementById('account_type').value;
            const individualFields = document.getElementById('individualFields');
            const companyFields = document.getElementById('companyFields');
            
            if (accountType === 'individual') {
                individualFields.style.display = 'block';
                companyFields.style.display = 'none';
            } else {
                individualFields.style.display = 'none';
                companyFields.style.display = 'block';
            }
        }
    </script>
</body>
</html>
