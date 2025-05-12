@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - Plant Inventory</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/inventory-logo.png') }}" alt="Logo" class="nav-logo">
                Plant Inventory System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav center-nav">
                    @auth
                        @if(auth()->user()->hasAdminAccess())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.plants') ? 'active' : '' }}" href="{{ route('public.plants') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-chart-line me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('plants.index') ? 'active' : '' }}" href="{{ route('plants.index') }}">
                                <i class="fas fa-leaf me-1"></i>Inventory
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="fas fa-users me-1"></i>Users
                            </a>
                        </li>
                        @endif
                    @endauth
                </ul>
                @auth
                <div class="user-section">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle profile-btn" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile" class="profile-pic">
                            @else
                                <div class="profile-pic-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                            <span>{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section text-center py-5">
        <div class="container">
            <h1>Welcome to Our Plant Catalog</h1>
            <p class="lead">Browse our extensive collection of plants and request information</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Search and Filter Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search plants...">
                </div>
            </div>
            <div class="col-md-6">
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

        <!-- Plants Grid -->
        <div class="row row-cols-1 row-cols-md-3 g-4" id="plantsGrid">
            @foreach($plants as $plant)
            <div class="col plant-item" data-category="{{ $plant->category }}">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $plant->name }}</h5>
                        <p class="card-text">
                            <small class="text-muted">Category: {{ ucfirst($plant->category) }}</small>
                        </p>
                        @if($plant->scientific_name)
                            <p class="card-text"><em>{{ $plant->scientific_name }}</em></p>
                        @endif
                        <ul class="list-unstyled">
                            @if($plant->height_mm)
                                <li>Height: {{ $plant->height_mm }}mm</li>
                            @endif
                            @if($plant->spread_mm)
                                <li>Spread: {{ $plant->spread_mm }}mm</li>
                            @endif
                            @if($plant->spacing_mm)
                                <li>Spacing: {{ $plant->spacing_mm }}mm</li>
                            @endif
                        </ul>
                        <button class="btn btn-primary request-info-btn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#requestModal"
                                data-plant-id="{{ $plant->id }}"
                                data-plant-name="{{ $plant->name }}">
                            Request Information
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Request Information Modal -->
    <div class="modal fade" id="requestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Plant Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="requestForm">
                        <input type="hidden" id="plantId">
                        <div class="mb-3">
                            <label class="form-label">Selected Plant</label>
                            <input type="text" class="form-control" id="selectedPlant" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Name *</label>
                            <input type="text" class="form-control" id="clientName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="clientEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Name (Optional)</label>
                            <input type="text" class="form-control" id="companyName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="notes" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="submitRequest">Submit Request</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2024 Plant Inventory. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Search functionality
            $('#searchInput').on('input', function() {
                const searchText = $(this).val().toLowerCase();
                $('.plant-item').each(function() {
                    const text = $(this).text().toLowerCase();
                    $(this).toggle(text.includes(searchText));
                });
            });

            // Category filter
            $('#categoryFilter').change(function() {
                const category = $(this).val();
                if (category === 'all') {
                    $('.plant-item').show();
                } else {
                    $('.plant-item').hide();
                    $(`.plant-item[data-category="${category}"]`).show();
                }
            });

            // Request Information button
            $('.request-info-btn').click(function() {
                const plantId = $(this).data('plant-id');
                const plantName = $(this).data('plant-name');
                $('#plantId').val(plantId);
                $('#selectedPlant').val(plantName);
            });

            // Submit request
            $('#submitRequest').click(function() {
                const requestData = {
                    email: $('#clientEmail').val(),
                    name: $('#clientName').val(),
                    items_json: JSON.stringify([{
                        name: $('#selectedPlant').val(),
                        quantity: $('#quantity').val() || '',
                        unit_price: $('#unitPrice').val() || '',
                        total_price: $('#totalPrice').val() || '',
                        remarks: $('#notes').val() || ''
                    }])
                };

                // Show loading state
                const $btn = $(this);
                const originalText = $btn.text();
                $btn.html('<i class="fas fa-spinner fa-spin"></i> Submitting...').prop('disabled', true);

                $.ajax({
                    url: '/client-request',
                    method: 'POST',
                    data: requestData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            // Redirect to success page or refresh
                            window.location.href = '/request-success/' + response.request_id;
                        });
                    },
                    error: function(xhr) {
                        // Show error message
                        const errorMessage = xhr.responseJSON?.message || 'An error occurred while submitting your request.';
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: errorMessage
                        });
                    },
                    complete: function() {
                        // Reset button state
                        $btn.text(originalText).prop('disabled', false);
                    }
                });
            });
        });
    </script>
</body>
</html> 