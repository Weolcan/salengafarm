<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link rel="icon" type="image/ico" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <meta name="msapplication-TileImage" content="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/salengap-modified.png') }}" alt="Salenga Logo" class="nav-logo">
                <span class="brand-text">Salenga Farm</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="navbar-collapse-inner">
                    <ul class="navbar-nav center-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('public.plants') ? 'active' : '' }}" href="{{ route('public.plants') }}">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        @auth
                            @if(auth()->user()->hasAdminAccess())
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('requests.*') ? 'active' : '' }}" href="{{ route('requests.index') }}">
                                    <i class="fas fa-file-invoice me-1"></i>Request
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                    <i class="fas fa-chart-line me-1"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('walk-in.*') ? 'active' : '' }}" href="{{ route('walk-in.index') }}">
                                    <i class="fas fa-cash-register me-1"></i>Walk-in
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
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12 p-4">
                <h2 class="mb-4 fs-4">Plant Inventory</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Search Bar -->
                <div class="search-bar mb-4">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label>Plant Name</label>
                                <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Search plant name">
                            </div>
                            <div class="d-flex gap-2 mb-3">
                                <button id="addBtn" class="btn btn-success btn-lg">Add New Plant</button>
                                <div id="bulkActionButtons" class="d-none d-inline">
                                    <button id="bulkEditBtn" class="btn btn-primary btn-lg">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button id="bulkDeleteBtn" class="btn btn-danger btn-lg">
                                        <i class="fas fa-trash"></i> Delete Selected
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <label>Category Filter</label>
                            <div class="category-icons d-flex justify-content-between align-items-center">
                                <div class="category-icon-item text-center" data-category="all">
                                    <div class="icon-circle active">
                                        <i class="fas fa-border-all"></i>
                                    </div>
                                    <span class="d-block mt-1">All</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="shrub">
                                    <img src="{{ asset('images/categories/shrub-g.png') }}" alt="Shrub" class="category-img">
                                    <span class="d-block mt-1">Shrub</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="herbs">
                                    <img src="{{ asset('images/categories/herbs-g.png') }}" alt="Herbs" class="category-img">
                                    <span class="d-block mt-1">Herbs</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="palm">
                                    <img src="{{ asset('images/categories/palm-g.png') }}" alt="Palm" class="category-img">
                                    <span class="d-block mt-1">Palm</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="tree">
                                    <img src="{{ asset('images/categories/tree-g.png') }}" alt="Tree" class="category-img">
                                    <span class="d-block mt-1">Tree</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="grass">
                                    <img src="{{ asset('images/categories/grass-g.png') }}" alt="Grass" class="category-img">
                                    <span class="d-block mt-1">Grass</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="bamboo">
                                    <img src="{{ asset('images/categories/bamboo-g.png') }}" alt="Bamboo" class="category-img">
                                    <span class="d-block mt-1">Bamboo</span>
                                </div>
                                <div class="category-icon-item text-center" data-category="fertilizer">
                                    <img src="{{ asset('images/categories/fertilizer-g.png') }}" alt="Fertilizer" class="category-img">
                                    <span class="d-block mt-1">Fertilizer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bulk Edit Section (Initially Hidden) -->
                <div id="bulkEditSection" class="card mb-3 d-none">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Bulk Edit Selected Plants</h6>
                    </div>
                    <div class="card-body">
                        <form id="bulkEditForm" class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Availability Status</label>
                                <select class="form-control" id="bulkAvailability">
                                    <option value="">No Change</option>
                                    <option value="in_stock">In Stock</option>
                                    <option value="out_of_stock">Out of Stock</option>
                                    <option value="pending">Pending Restock</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Unit Cost (₱)</label>
                                <input type="number" class="form-control" id="bulkPrice" step="0.01" placeholder="No Change">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Cost per SQM (₱)</label>
                                <input type="number" class="form-control" id="bulkCostPerSqm" step="0.01" placeholder="No Change">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Cost per MM (₱)</label>
                                <input type="number" class="form-control" id="bulkCostPerMm" step="0.01" placeholder="No Change">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="bulkQuantity" placeholder="No Change">
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-secondary me-2" id="cancelBulkEdit">Cancel</button>
                                <button type="button" class="btn btn-primary" id="saveBulkEdit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Plants Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50">
                                <label class="container-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <div class="checkmark"></div>
                                </label>
                            </th>
                            <th width="50">#</th>
                            <th width="20%">Name</th>
                            <th width="10%">Code</th>
                            <th width="20%">Scientific Name</th>
                            <th width="10%">Availability</th>
                            <th width="10%">Height (mm)</th>
                            <th width="10%">Spread (mm)</th>
                            <th width="10%">Spacing (mm)</th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="plantsTableBody">
                        @foreach($plants as $plant)
                            <tr class="plant-row" 
                                data-id="{{ $plant->id }}"
                                data-category="{{ $plant->category }}"
                                data-height-mm="{{ $plant->height_mm }}"
                                data-spread-mm="{{ $plant->spread_mm }}"
                                data-spacing-mm="{{ $plant->spacing_mm }}"
                                data-oc="{{ $plant->oc }}"
                                data-price="{{ $plant->price }}"
                                data-cost-per-sqm="{{ $plant->cost_per_sqm }}"
                                data-pieces-per-sqm="{{ $plant->pieces_per_sqm }}"
                                data-cost-per-mm="{{ $plant->cost_per_mm }}"
                                data-quantity="{{ $plant->quantity }}">
                                <td>
                                    <label class="container-checkbox">
                                        <input type="checkbox" class="plant-checkbox" value="{{ $plant->id }}">
                                        <div class="checkmark"></div>
                                    </label>
                                </td>
                                <td class="row-number"></td>
                                <td class="text-nowrap">{{ $plant->name }}</td>
                                <td class="text-nowrap">{{ $plant->code }}</td>
                                <td>{{ $plant->scientific_name }}</td>
                                <td>{{ $plant->quantity > 0 ? 'In Stock' : 'Out of Stock' }}</td>
                                <td>{{ $plant->height_mm }}</td>
                                <td>{{ $plant->spread_mm }}</td>
                                <td>{{ $plant->spacing_mm }}</td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button class="btn btn-link text-primary edit-plant" data-plant-id="{{ $plant->id }}" title="Edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </button>
                                        <button class="btn btn-link text-danger delete-plant" data-plant-id="{{ $plant->id }}" title="Delete">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                        <button class="btn btn-link text-secondary toggle-details" data-plant-id="{{ $plant->id }}">
                                            <i class="fas fa-chevron-circle-down fa-lg"></i>
                                    </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="details-row d-none" id="details-{{ $plant->id }}">
                                <td colspan="6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <h6 class="fw-bold">Basic Information</h6>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Common Name:</label>
                                                                <div>{{ $plant->name }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Code:</label>
                                                                <div>{{ $plant->code }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Scientific Name:</label>
                                                                <div>{{ $plant->scientific_name }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="fw-bold">Stock Information</h6>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Unit Cost:</label>
                                                                <div>₱{{ number_format($plant->price, 2) }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Quantity:</label>
                                                                <div>{{ $plant->quantity }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Category:</label>
                                                                <div>{{ ucfirst($plant->category) }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <h6 class="fw-bold">Measurements</h6>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Height (mm):</label>
                                                                <div>{{ $plant->height_mm }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Spread (mm):</label>
                                                                <div>{{ $plant->spread_mm }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Spacing (mm):</label>
                                                                <div>{{ $plant->spacing_mm }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">OC:</label>
                                                                <div>{{ $plant->oc }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="fw-bold">Cost Information</h6>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Cost per SQM:</label>
                                                                <div>₱{{ number_format($plant->cost_per_sqm, 2) }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">No. PCS per SQM:</label>
                                                                <div>{{ $plant->pieces_per_sqm }}</div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label class="text-muted">Cost per MM:</label>
                                                                <div>₱{{ number_format($plant->cost_per_mm, 2) }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Plant Details Modal -->
    <div class="modal fade" id="plantModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="modalTitle">Plant Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="plantForm">
                        @csrf
                        <!-- Basic Information Section -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Basic Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Plant Name *</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Code</label>
                                            <input type="text" class="form-control" id="code" name="code">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="scientific_name" class="form-label">Scientific Name</label>
                                            <input type="text" class="form-control" id="scientific_name" name="scientific_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-select" id="category" name="category">
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
                                </div>
                            </div>
                        </div>

                        <!-- Measurements Section -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-ruler me-2"></i>Measurements</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="height_mm" class="form-label">Height (mm)</label>
                                            <input type="number" class="form-control" id="height_mm" name="height_mm">
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="spread_mm" class="form-label">Spread (mm)</label>
                                            <input type="number" class="form-control" id="spread_mm" name="spread_mm">
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="spacing_mm" class="form-label">Spacing (mm)</label>
                                            <input type="number" class="form-control" id="spacing_mm" name="spacing_mm">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="oc" class="form-label">OC</label>
                                    <input type="text" class="form-control" id="oc" name="oc">
                                </div>
                            </div>
                        </div>

                        <!-- Cost & Inventory Section -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-coins me-2"></i>Cost & Inventory</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cost_per_sqm" class="form-label">Cost per SQM (₱)</label>
                                            <input type="number" class="form-control" id="cost_per_sqm" name="cost_per_sqm" step="0.01" min="0" value="0">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pieces_per_sqm" class="form-label">No. PCS per SQM</label>
                                            <input type="number" class="form-control" id="pieces_per_sqm" name="pieces_per_sqm" min="0" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Unit Cost (₱)</label>
                                            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="cost_per_mm" class="form-label">Cost per MM (₱)</label>
                                            <input type="number" class="form-control" id="cost_per_mm" name="cost_per_mm" step="0.01" min="0" value="0">
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" min="0" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="saveBtn">
                        <i class="fas fa-save me-1"></i>Save Plant
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <i class="fas fa-exclamation-triangle text-danger delete-icon"></i>
                    </div>
                    <p class="text-center fs-5">Are you sure you want to delete this plant?</p>
                    <p class="text-center text-muted">This action cannot be undone.</p>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> No, Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">
                        <i class="fas fa-trash me-1"></i> Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            let selectedPlant = null;
            const modal = new bootstrap.Modal(document.getElementById('plantModal'));
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            let isEditing = false;
            let editingPlantId = null;

            // Function to update row numbers
            function updateRowNumbers() {
                let visibleIndex = 1;
                $('.plant-row:visible').each(function() {
                    $(this).find('.row-number').text(visibleIndex++);
                });
            }

            // Initial numbering
            updateRowNumbers();

            // Category icon selection
            $('.category-icon-item').click(function() {
                const category = $(this).data('category');
                
                // Update active state
                $('.category-icon-item').removeClass('active');
                $(this).addClass('active');
                $('.icon-circle').removeClass('active');
                if (category === 'all') {
                    $(this).find('.icon-circle').addClass('active');
                }
                
                // Filter plants
                if (category === 'all') {
                    $('.plant-row').show();
                } else {
                    $('.plant-row').hide();
                    $(`.plant-row[data-category="${category}"]`).show();
                }
                updateRowNumbers();
            });

            // Search functionality
            $('#searchInput').on('input', function() {
                const searchText = $(this).val().toLowerCase();
                $('.plant-row').each(function() {
                    const name = $(this).find('td:eq(1)').text().toLowerCase(); // Updated index due to new number column
                    $(this).toggle(name.includes(searchText));
                });
                updateRowNumbers(); // Update numbers after search
            });

            // Plant row selection
            $(document).on('click', '.plant-row', function() {
                $('.plant-row').removeClass('plant-selected');
                $(this).addClass('plant-selected');
                selectedPlant = {
                    id: $(this).data('id'),
                    name: $(this).find('td:eq(2)').text(),
                    code: $(this).find('td:eq(3)').text(),
                    scientific_name: $(this).find('td:eq(4)').text(),
                    height_mm: $(this).data('height-mm'),
                    spread_mm: $(this).data('spread-mm'),
                    spacing_mm: $(this).data('spacing-mm'),
                    oc: $(this).data('oc'),
                    price: $(this).data('price'),
                    quantity: $(this).data('quantity'),
                    category: $(this).data('category'),
                    cost_per_sqm: $(this).data('cost-per-sqm'),
                    pieces_per_sqm: $(this).data('pieces-per-sqm'),
                    cost_per_mm: $(this).data('cost-per-mm')
                };
                
                $('#editBtn, #deleteBtn').prop('disabled', false);
            });

            // Add this function to show notifications
            function showNotification(message, type = 'success') {
                const notification = $(`
                    <div class="notification-toast ${type}" style="display: none;">
                        <div class="notification-content">
                            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                            <span>${message}</span>
                        </div>
                    </div>
                `).appendTo('body');
                
                notification.fadeIn(300).delay(3000).fadeOut(300, function() {
                    $(this).remove();
                });
            }

            // Save button click handler
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                
                // Clear previous error states
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                $('.alert').remove();

                // Get form data properly
                const formData = new FormData();
                
                // Add CSRF token
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                
                // Add method if editing
                if (isEditing) {
                    formData.append('_method', 'PUT');
                }

                // Collect all form fields
                const fields = {
                    'name': '#name',
                    'code': '#code',
                    'scientific_name': '#scientific_name',
                    'category': '#category',
                    'height_mm': '#height_mm',
                    'spread_mm': '#spread_mm',
                    'spacing_mm': '#spacing_mm',
                    'oc': '#oc',
                    'price': '#price',
                    'cost_per_sqm': '#cost_per_sqm',
                    'pieces_per_sqm': '#pieces_per_sqm',
                    'cost_per_mm': '#cost_per_mm',
                    'quantity': '#quantity'
                };

                // Append all fields to formData, handling null/empty values properly
                Object.entries(fields).forEach(([key, selector]) => {
                    const $field = $(selector);
                    const value = $field.val();
                    // Handle numeric fields
                    if ($field.attr('type') === 'number') {
                        formData.append(key, value === null || value === '' ? '0' : value);
                    } else {
                        formData.append(key, value === null || value === '' ? '' : value.trim());
                    }
                });

                // Validate required fields
                if (!formData.get('name')) {
                    $('#name').addClass('is-invalid')
                        .after('<div class="invalid-feedback">Plant name is required</div>');
                    return;
                }

                // Ensure numeric fields have valid values
                const numericFields = ['price', 'cost_per_sqm', 'cost_per_mm', 'pieces_per_sqm', 'quantity'];
                numericFields.forEach(field => {
                    const value = formData.get(field);
                    if (value === '') {
                        formData.set(field, '0');
                    }
                });

                // Show loading state
                const $saveBtn = $(this);
                const originalText = $saveBtn.html();
                $saveBtn.html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);

                // Determine URL based on whether we're editing or adding
                const url = isEditing ? `/plants/${editingPlantId}` : '/plants';

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        $('#plantModal').modal('hide');
                        showNotification('Plant saved successfully!');
                        location.reload();
                    },
                    error: function(xhr) {
                        let errorMessage = 'An error occurred while saving the plant.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showNotification(errorMessage, 'error');
                    },
                    complete: function() {
                        // Reset button state
                        $saveBtn.html(originalText).prop('disabled', false);
                    }
                });
            });

            // Add button click handler
            $('#addBtn').click(function() {
                isEditing = false;
                editingPlantId = null;
                selectedPlant = null;
                $('#modalTitle').text('Add New Plant');
                $('#plantForm')[0].reset();
                $('#editBtn, #deleteBtn').prop('disabled', true);
                modal.show();
            });

            // Edit button click handler
            $(document).on('click', '.edit-plant', function(e) {
                e.stopPropagation();
                    isEditing = true;
                editingPlantId = $(this).data('plant-id');
                const plantRow = $(this).closest('tr');
                
                // Get plant data from the row
                const plant = {
                    id: plantRow.data('id'),
                    name: plantRow.find('td:eq(2)').text().trim(),
                    code: plantRow.find('td:eq(3)').text().trim(),
                    scientific_name: plantRow.find('td:eq(4)').text().trim(),
                    category: plantRow.data('category'),
                    height_mm: plantRow.data('height-mm'),
                    spread_mm: plantRow.data('spread-mm'),
                    spacing_mm: plantRow.data('spacing-mm'),
                    oc: plantRow.data('oc'),
                    price: plantRow.data('price'),
                    cost_per_sqm: plantRow.data('cost-per-sqm'),
                    pieces_per_sqm: plantRow.data('pieces-per-sqm'),
                    cost_per_mm: plantRow.data('cost-per-mm'),
                    quantity: plantRow.data('quantity')
                };
                
                // Reset form and clear previous errors
                $('#plantForm')[0].reset();
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                
                // Fill form with plant data
                Object.keys(plant).forEach(key => {
                    const $field = $(`#${key}`);
                    if ($field.length) {
                        $field.val(plant[key] || '');
                    }
                });
                
                $('#modalTitle').text('Edit Plant');
                $('#plantModal').modal('show');
            });

            // Delete button click handler
            $(document).on('click', '.delete-plant', function(e) {
                e.stopPropagation();
                const plantId = $(this).data('plant-id');
                selectedPlant = { id: plantId };
                    deleteModal.show();
            });

            // Confirm delete handler
            $('#confirmDelete').click(function() {
                if (!selectedPlant || !selectedPlant.id) return;
                
                const $btn = $(this);
                const originalText = $btn.html();
                $btn.html('<i class="fas fa-spinner fa-spin"></i> Deleting...').prop('disabled', true);

                $.ajax({
                    url: `/plants/${selectedPlant.id}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        deleteModal.hide();
                        window.location.reload();
                    },
                    error: function(xhr) {
                        deleteModal.hide();
                        alert('Error deleting plant: ' + (xhr.responseJSON?.message || 'Unknown error'));
                    },
                    complete: function() {
                        $btn.html(originalText).prop('disabled', false);
                    }
                });
            });

            // Toggle details
            $('.toggle-details').click(function(e) {
                e.stopPropagation(); // Prevent row selection when clicking toggle
                const plantId = $(this).data('plant-id');
                const detailsRow = $(`#details-${plantId}`);
                
                // Toggle the details row
                detailsRow.toggleClass('d-none');
                
                // Toggle the icon
                const icon = $(this).find('i');
                if (detailsRow.hasClass('d-none')) {
                    icon.removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
                } else {
                    icon.removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');
                }
            });

            // Checkbox and bulk actions functionality
            $('#selectAll').change(function() {
                $('.plant-checkbox').prop('checked', $(this).is(':checked'));
                updateBulkButtons();
            });

            $(document).on('change', '.plant-checkbox', function() {
                updateBulkButtons();
                // Update "select all" checkbox
                $('#selectAll').prop('checked', 
                    $('.plant-checkbox:checked').length === $('.plant-checkbox').length);
            });

            function updateBulkButtons() {
                const checkedCount = $('.plant-checkbox:checked').length;
                if (checkedCount > 0) {
                    $('#bulkActionButtons').removeClass('d-none');
                } else {
                    $('#bulkActionButtons').addClass('d-none');
                    $('#bulkEditSection').addClass('d-none');
                }
            }

            // Bulk edit functionality
            $('#bulkEditBtn').click(function() {
                $('#bulkEditSection').removeClass('d-none');
            });

            $('#cancelBulkEdit').click(function() {
                $('#bulkEditSection').addClass('d-none');
            });

            $('#saveBulkEdit').click(function() {
                const selectedIds = $('.plant-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                const bulkData = {
                    ids: selectedIds,
                    availability: $('#bulkAvailability').val() || null,
                    price: $('#bulkPrice').val() || null,
                    cost_per_sqm: $('#bulkCostPerSqm').val() || null,
                    cost_per_mm: $('#bulkCostPerMm').val() || null,
                    quantity: $('#bulkQuantity').val() || null
                };

                $.ajax({
                    url: '/plants/bulk-update',
                    method: 'POST',
                    data: bulkData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        alert('Error updating plants');
                    }
                });
            });
        });
    </script>
    <style>
        /* Navigation and general text */
        .navbar-brand {
            font-size: 0.9rem;
        }

        .nav-link {
            font-size: 0.8rem;
        }

        /* Buttons */
        .btn {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
        }

        /* Form Elements */
        .form-control, .input-group-text {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
        }

        /* Tables */
        .table {
            font-size: 0.8rem;
        }

        .table th {
            font-size: 0.75rem;
        }

        /* Category text but not icons */
        .category-icon-item span {
            font-size: 0.75rem;
        }

        /* Profile and Dropdown */
        .profile-btn {
            font-size: 0.8rem;
        }

        .dropdown-item {
            font-size: 0.8rem;
            padding: 0.25rem 1rem;
        }

        /* Labels and Headers */
        label, .small {
            font-size: 0.75rem;
        }

        .card-header h5 {
            font-size: 0.9rem;
        }

        /* Plant Details */
        .plant-details td {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        .plant-details th {
            font-size: 0.75rem;
            padding: 0.5rem;
        }

        /* Modal Elements */
        .modal-title {
            font-size: 1rem;
        }

        .modal-body {
            font-size: 0.8rem;
        }

        .form-label {
            font-size: 0.8rem;
            margin-bottom: 0.25rem;
        }

        /* Action Buttons Text */
        .action-buttons .btn {
            font-size: 0.8rem;
        }

        /* Status and Badge Text */
        .badge {
            font-size: 0.75rem;
        }

        /* Search Section */
        #searchInput::placeholder {
            font-size: 0.8rem;
        }

        /* Bulk Actions Section */
        .bulk-actions {
            font-size: 0.8rem;
        }

        /* Alert Messages */
        .alert {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }

        /* Spacing Adjustments */
        .mb-4 {
            margin-bottom: 1rem !important;
        }

        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }

        .p-4 {
            padding: 1.5rem !important;
        }

        /* Info Text */
        .text-muted {
            font-size: 0.75rem;
        }

        /* Keep category icons unchanged */
        .category-img {
            width: 28px;
            height: 28px;
        }

        .icon-circle {
            width: 28px;
            height: 28px;
        }

        /* List Items and Table Cells */
        .list-group-item {
            font-size: 0.8rem;
            padding: 0.5rem 0.75rem;
        }

        /* Checkbox Adjustments */
        .container-checkbox {
            transform: scale(0.9);
            margin: 0;
            position: relative;
            display: inline-block;
            width: 18px;  /* Match checkmark size */
            height: 18px; /* Match checkmark size */
            vertical-align: middle;
        }

        .checkmark {
            width: 18px;
            height: 18px;
            background-color: #fff;
            border: 2px solid #198754;
            border-radius: 4px;
            position: absolute;  /* Changed to absolute */
            cursor: pointer;
            display: block;     /* Changed to block */
            top: 0;            /* Position at the top */
            left: 0;           /* Position at the left */
        }

        /* Hide the default checkbox */
        .container-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            margin: 0;        /* Remove any margins */
            padding: 0;       /* Remove any padding */
        }

        .container-checkbox input:checked ~ .checkmark {
            background-color: #198754;
        }

        .container-checkbox input:checked ~ .checkmark:after {
            content: '';
            position: absolute;
            left: 5px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* Add specific table cell styling for checkbox columns */
        .col-checkbox {
            width: 30px;      /* Fixed width for checkbox column */
            padding: 0.5rem;
            text-align: center;
            vertical-align: middle;
        }

        /* Table Row Text */
        .plant-row td {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        /* Plant Name and Details */
        .plant-row .text-nowrap {
            font-size: 0.8rem;
        }

        /* Action Icons */
        .fa-lg {
            font-size: 1.2em !important;  /* Slightly smaller icons */
        }

        /* Details Section */
        .details-row td {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        /* Bulk Edit Section */
        #bulkEditSection h6 {
            font-size: 0.9rem;
        }

        /* Card Headers in Forms */
        .card-header h6 {
            font-size: 0.9rem;
        }

        /* Form Section Headers */
        .section-header {
            font-size: 0.9rem;
        }

        /* Delete Modal Text */
        .delete-icon {
            font-size: 2rem;  /* Smaller warning icon */
        }

        .fs-5 {
            font-size: 0.9rem !important;
        }

        /* Table Header Background Color */
        .table thead th {
            background-color: #bcebbc !important;  /* Light green background */
            font-size: 0.8rem;
            padding: 0.5rem;
            font-weight: 500;
        }

        /* Ensure the background color stays on hover */
        .table thead tr:hover th {
            background-color: #bcebbc !important;
        }

        /* Modal styling */
        .modal-dialog {
            max-width: 800px;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .card {
            border: 1px solid rgba(0,0,0,.125);
            box-shadow: 0 1px 3px rgba(0,0,0,.1);
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0,0,0,.125);
        }

        .card-header h6 {
            color: #495057;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 0.375rem;
            border-color: #dee2e6;
            padding: 0.5rem 0.75rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }

        .invalid-feedback {
            font-size: 0.875rem;
        }

        /* Notification Toast Styling */
        .notification-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            animation: slideIn 0.3s ease-out;
        }

        .notification-toast.success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .notification-toast.error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .notification-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notification-content i {
            font-size: 1.25rem;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</body>
</html> 