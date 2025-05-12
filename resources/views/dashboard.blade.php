<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Storage;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Plant Inventory</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600&family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Loading overlay that will fade out when page is ready */
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease-out;
        }
        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #2a9d4e;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }
        @keyframes rotation {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-light">
    <!-- Loading Overlay -->
    <div id="loading-overlay">
        <span class="loader"></span>
    </div>

    <!-- Main Navigation -->
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
                        <a class="nav-link" href="{{ route('public.plants') }}"><i class="fas fa-home me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('requests.index') }}"><i class="fas fa-file-invoice me-1"></i>Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}"><i class="fas fa-chart-line me-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('walk-in.index') }}"><i class="fas fa-cash-register me-1"></i>Walk-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('plants.index') }}"><i class="fas fa-leaf me-1"></i>Inventory</a>
                    </li>
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="fas fa-users me-1"></i>Users
                            </a>
                    </li>
                    @endif
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
        <!-- Main Content Area -->
        <div class="p-3">
            <h2 class="mb-4 fs-4">Dashboard Overview</h2>

            <!-- Summary Cards Row - Reduced height via CSS -->
            <div class="row mb-4">
                <div class="col-md-6 mb-2 mb-md-0">
                    <div class="card border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon me-3">
                                    <i class="fas fa-seedling fa-2x text-success opacity-50"></i>
                                </div>
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Total Plants in Stock</h6>
                                    <h2 class="card-title mb-0">{{ number_format($totalStock) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon me-3">
                                    <i class="fas fa-exclamation-triangle fa-2x text-warning opacity-50"></i>
                                </div>
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Low Stock Items</h6>
                                    <h2 class="card-title mb-0">{{ $lowStockItems->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row - Better organized with consistent heights -->
            <div class="main-content-row">
                <!-- Left Column - Low Stock Alerts -->
                <div class="col-md-3">
                    <!-- Low Stock Alerts -->
                    <div class="card low-stock-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fs-6">
                                    <i class="fas fa-exclamation-circle me-2 text-warning"></i>Low Stock Alerts
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @foreach($lowStockItems->take(4) as $item)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <div>
                                                <h6 class="mb-0">{{ $item->name }}</h6>
                                                <small class="text-muted">{{ $item->category }}</small>
                                            </div>
                                            <span class="badge bg-warning">{{ $item->quantity }} left</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if($lowStockItems->count() > 4)
                                <div class="d-grid gap-2 p-2 mt-1">
                                    <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#lowStockModal">
                                    <i class="fas fa-list-ul me-1"></i> Show All Low Stock Items
                                </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Middle Column - Stock Distribution -->
                <div class="col-md-6">
                    <!-- Chart Container with Tabs -->
                    <div class="card chart-container-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <ul class="nav nav-tabs card-header-tabs" id="chart-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="stock-tab" data-bs-toggle="tab" data-bs-target="#stock-chart" type="button" role="tab" aria-controls="stock-chart" aria-selected="true">
                                            <i class="fas fa-chart-pie me-1 text-primary"></i> Stock Distribution
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sales-tab" data-bs-toggle="tab" data-bs-target="#sales-chart" type="button" role="tab" aria-controls="sales-chart" aria-selected="false">
                                            <i class="fas fa-chart-bar me-1 text-success"></i> Sales by Category
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body tab-content">
                            <div class="tab-pane fade show active" id="stock-chart" role="tabpanel" aria-labelledby="stock-tab">
                                <div class="d-flex align-items-center justify-content-center h-100">
                            <canvas id="stockDistributionChart"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sales-chart" role="tabpanel" aria-labelledby="sales-tab">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    @if(count($salesByPlant) > 0)
                                        <canvas id="salesDistributionChart"></canvas>
                                    @else
                                        <div class="text-center text-muted py-5">
                                            <i class="fas fa-info-circle fa-3x mb-3"></i>
                                            <p>No sales data available yet. Complete some sales to see the distribution by plant categories.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Quick Actions and Recent Plants -->
                <div class="col-md-3">
                    <!-- Quick Actions -->
                    <div class="card right-column-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fs-6">
                                    <i class="fas fa-bolt me-2 text-primary"></i>Quick Actions
                                </h5>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <div class="d-grid gap-2 w-100">
                                <button class="btn btn-info text-white" id="updateStockBtn" data-bs-toggle="modal" data-bs-target="#updateStockModal">
                                    <i class="fas fa-sync me-2"></i>Update Stock
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Plants -->
                    <div class="card recent-plants-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fs-6">
                                    <i class="fas fa-leaf me-2 text-success"></i>Recent Plants
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @foreach($recentPlants as $plant)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <div>
                                                <h6 class="mb-0">{{ $plant->name }}</h6>
                                                <small class="text-muted">Added {{ $plant->created_at->diffForHumans() }}</small>
                                            </div>
                                            <span class="badge bg-success">{{ $plant->quantity }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Stock Modal -->
    <div class="modal fade" id="updateStockModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-sync me-2"></i>Update Stock</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body modal-body-fullheight p-0">
                    <div class="row g-0 h-100">
                        <!-- Category Sidebar -->
                        <div class="col-md-3 border-end h-100 sidebar-scroll" style="position: sticky; top: 0; height: 100vh; overflow-y: auto;">
                            <div class="p-3">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action active" data-category="all">
                                        <i class="fas fa-layer-group me-2"></i>All Plants
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="shrub">
                                        <i class="fas fa-seedling me-2"></i>Shrub
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="herbs">
                                        <i class="fas fa-mortar-pestle me-2"></i>Herbs
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="palm">
                                        <i class="fas fa-tree me-2"></i>Palm
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="tree">
                                        <i class="fas fa-tree me-2"></i>Tree
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="grass">
                                        <i class="fas fa-leaf me-2"></i>Grass
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="bamboo">
                                        <i class="fas fa-tree me-2"></i>Bamboo
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-category="fertilizer">
                                        <i class="fas fa-prescription-bottle me-2"></i>Fertilizer
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Main Content -->
                        <div class="col-md-9 d-flex flex-column h-100">
                            <!-- Fixed Search Bar -->
                            <div class="p-3 border-bottom">
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control" 
                                           id="stockSearchInput" 
                                           placeholder="Search plants...">
                                </div>
                            </div>
                            <!-- Scrollable Table -->
                            <div class="flex-grow-1 table-scroll" style="overflow-y: auto; max-height: 70vh;">
                                <div class="table-responsive h-100">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-header-sticky">
                                            <tr>
                                                <th>Plant Name</th>
                                                <th>Category</th>
                                                <th>Current Stock</th>
                                                <th>New Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody id="stockUpdateTableBody">
                                            @foreach($plants as $plant)
                                            <tr data-category="{{ $plant->category }}">
                                                <td>{{ $plant->name }}</td>
                                                <td>{{ ucfirst($plant->category) }}</td>
                                                <td>{{ $plant->quantity }}</td>
                                                <td>
                                                    <input type="number" 
                                                           class="form-control stock-input" 
                                                           data-plant-id="{{ $plant->id }}"
                                                           value="{{ $plant->quantity }}"
                                                           min="0">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info text-white" id="saveStockUpdates">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Request Modal -->
    <div class="modal fade" id="clientRequestModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Plant Information Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body modal-body-scroll">
                    <form id="clientRequestForm">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="client_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="client_email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Company Name (Optional)</label>
                                <input type="text" class="form-control" id="company_name">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes (Optional)</label>
                                <textarea class="form-control" id="notes" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
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
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="plantSearchInput" placeholder="Search plants...">
                            </div>
                        </div>

                        <div class="table-responsive client-table">
                            <table class="table table-hover">
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th class="col-checkbox">
                                            <label class="container-checkbox">
                                                <input type="checkbox" id="selectAllPlants">
                                                <div class="checkmark"></div>
                                            </label>
                                        </th>
                                        <th class="col-name">Plant Name</th>
                                        <th class="col-code">Code</th>
                                        <th class="col-category">Category</th>
                                        <th class="col-scientific">Scientific Name</th>
                                        <th class="col-cost">Unit Cost</th>
                                        <th class="col-availability">Availability</th>
                                    </tr>
                                </thead>
                                <tbody id="plantsTableBody">
                                    @foreach($plants as $plant)
                                    <tr data-category="{{ strtolower($plant->category) }}">
                                        <td class="col-checkbox">
                                            <label class="container-checkbox">
                                                <input type="checkbox" class="plant-checkbox" value="{{ $plant->id }}" data-name="{{ $plant->name }}">
                                                <div class="checkmark"></div>
                                            </label>
                                        </td>
                                        <td class="col-name">{{ $plant->name }}</td>
                                        <td class="col-code">{{ $plant->code }}</td>
                                        <td class="col-category">{{ ucfirst($plant->category) }}</td>
                                        <td class="col-scientific">{{ $plant->scientific_name }}</td>
                                        <td class="col-cost">₱{{ number_format($plant->price, 2) }}</td>
                                        <td class="col-availability">{{ $plant->quantity > 0 ? 'In Stock' : 'Out of Stock' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <div class="alert alert-info" id="selectedPlantsInfo">
                                No plants selected
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="sendRequestBtn">Send Request</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Low Stock Modal -->
    <div class="modal fade" id="lowStockModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Low Stock Plants</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body modal-body-fullheight p-0" style="min-height: 400px;">
                    <div class="row g-0 h-100">
                        <!-- Category Sidebar -->
                        <div class="col-md-3 border-end h-100 sidebar-scroll" style="position: sticky; top: 0; height: 100vh; overflow-y: auto;">
                            <div class="p-3">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action category-link" data-category="all">
                                        <i class="fas fa-layer-group me-2"></i>All Plants
                                    </a>
                                    @foreach($lowStockItems->groupBy('category') as $category => $items)
                                        <a href="#" class="list-group-item list-group-item-action category-link" data-category="{{ $category }}">
                                            <i class="fas fa-folder me-2"></i>{{ ucfirst($category) }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Low Stock Information Table -->
                        <div class="col-md-9 flex-grow-1 table-scroll" style="overflow-y: auto; max-height: 70vh;">
                            <div class="table-responsive h-100">
                                <table class="table table-hover mb-0" id="lowStockTable">
                                    <thead class="table-header-sticky">
                                        <tr>
                                            <th>Plant Name</th>
                                            <th>Category</th>
                                            <th>Current Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lowStockItems as $item)
                                            <tr data-category="{{ $item->category }}">
                                                <td>{{ $item->name }}</td>
                                                <td>{{ ucfirst($item->category) }}</td>
                                                <td>
                                                    <span class="badge bg-warning">{{ $item->quantity }} left</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}?v=2"></script>
    <script>
        $(document).ready(function() {
            // Hide loading overlay when page is ready
            $('#loading-overlay').fadeOut();
            
            // Ensure modals exist before adding event listeners
            const updateStockModal = document.getElementById('updateStockModal');

            if (updateStockModal) {
                $('#updateStockBtn').click(function() {
                    // Your existing code for handling the update stock button
                });
            } else {
                console.error('Element with ID "updateStockBtn" not found.');
            }

            // Initialize stock chart using the function from dashboard.js
            initStockChart('stockDistributionChart', {
                labels: {!! json_encode(array_keys($stockByCategory)) !!},
                values: {!! json_encode(array_values($stockByCategory)) !!}
            });
            
            // Initialize sales distribution chart if data exists
            @if(count($salesByPlant) > 0)
            initSalesChart('salesDistributionChart', {
                labels: {!! json_encode(array_keys($salesByPlant)) !!},
                values: {!! json_encode(array_values($salesByPlant)) !!}
            });
            @endif

            // Stock Update Modal Functionality - Preserved existing functionality
            $('#saveStockUpdates').click(function() {
                const updates = [];
                $('.stock-input').each(function() {
                    const input = $(this);
                    updates.push({
                        plant_id: input.data('plant-id'),
                        quantity: parseInt(input.val()) || 0
                    });
                });

                // Show loading state
                const $saveBtn = $(this);
                const originalText = $saveBtn.html();
                $saveBtn.html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);

                // Send AJAX request to update stock
                $.ajax({
                    url: '/update-stock',
                    method: 'POST',
                    data: { 
                        updates: updates,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showAlert('Stock updated successfully!', 'success');
                        $('#updateStockModal').modal('hide');
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    },
                    error: function(xhr) {
                        let errorMessage = 'An error occurred while updating stock.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showAlert(errorMessage, 'danger');
                        $saveBtn.html(originalText).prop('disabled', false);
                    }
                });
            });

            // Category filter in Low Stock Modal - Preserved existing functionality
            $('.category-link').click(function(e) {
                e.preventDefault();
                
                // Update active state
                $('.category-link').removeClass('active');
                $(this).addClass('active');
                
                const selectedCategory = $(this).data('category');
                $('#lowStockTable tbody tr').each(function() {
                    const rowCategory = $(this).data('category');
                    if (rowCategory === selectedCategory || selectedCategory === 'all') {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            
            // Add search functionality for stock table
            $('#stockSearchInput').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('#stockUpdateTableBody tr').each(function() {
                    const rowText = $(this).text().toLowerCase();
                    if (rowText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
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

        .btn {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
        }

        /* Summary Cards */
        .card-subtitle {
            font-size: 0.75rem;
        }

        .card-title:not(.chart-card .card-title) {
            font-size: 1.5rem;  /* Keep numbers relatively large but smaller than default */
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

        /* Dropdown and Modal */
        .dropdown-item {
            font-size: 0.8rem;
            padding: 0.25rem 1rem;
        }

        .modal-title {
            font-size: 1rem;
        }

        .modal-body {
            font-size: 0.8rem;
        }

        /* Profile Section */
        .profile-btn {
            font-size: 0.8rem;
        }

        .profile-pic-placeholder {
            font-size: 0.8rem;
        }

        /* List Groups */
        .list-group-item {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }

        /* Labels and Small Text */
        label, .small {
            font-size: 0.75rem;
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

        /* Table Header and Cells */
        #plantsTableBody td, 
        #plantsTableBody th,
        .table thead th {
            font-size: 0.8rem;
            padding: 0.5rem;
        }

        /* Info Text */
        #selectedPlantsInfo {
            font-size: 0.8rem;
        }

        /* Alert Messages */
        .alert {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }

        /* Keep chart size unchanged */
        .chart-container {
            font-size: initial;  /* Reset font size for charts */
        }

        .chart-card .card-title {
            font-size: initial;  /* Keep chart titles at original size */
        }

        /* Card Headers */
        .card-header .card-title {
            font-size: 0.9rem !important;  /* Force smaller size for all card headers */
            font-weight: 500;
        }

        /* Make sure chart titles stay readable */
        .chart-card .card-header .card-title {
            font-size: 0.9rem !important;
        }
    </style>
</body>
</html>