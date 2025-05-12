<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventory Management - Plant Inventory</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600&family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
    <style>
        .inventory-card {
            border: none;
            border-radius: var(--card-border-radius);
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .inventory-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .editable-quantity {
            width: 80px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 5px 10px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .editable-quantity:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.2rem rgba(42, 157, 78, 0.25);
            outline: none;
        }

        .table th {
            font-weight: 600;
            color: var(--text-dark);
            background-color: rgba(247, 247, 247, 0.5);
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-low {
            background-color: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .status-medium {
            background-color: rgba(246, 229, 141, 0.2);
            color: var(--earthy-brown);
        }

        .status-good {
            background-color: rgba(42, 157, 78, 0.1);
            color: var(--primary-green);
        }

        .sidebar-card {
            height: auto;
            max-height: 300px;
            margin-bottom: 1rem;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            border: none;
        }

        .sidebar-card .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1rem;
        }

        .sidebar-card .card-body {
            overflow-y: auto;
            padding: 0;
            flex: 1;
            max-height: 250px;
        }

        .sidebar-card .list-group-item {
            padding: 0.75rem 1rem;
            border-left: none;
            border-right: none;
            border-color: rgba(0, 0, 0, 0.05);
        }

        .sidebar-card .list-group-item:first-child {
            border-top: none;
        }

        .tooltip-inner {
            background-color: var(--text-dark);
            color: white;
            font-size: 0.75rem;
            padding: 5px 10px;
        }

        .btn-success {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .btn-success:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
        }

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

        /* Truncated text with tooltip */
        .truncate-text {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
        }
    </style>
</head>
<body>
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
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-chart-line me-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('walk-in.index') }}"><i class="fas fa-cash-register me-1"></i>Walk-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('plants.index') }}"><i class="fas fa-leaf me-1"></i>Inventory</a>
                    </li>
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users me-1"></i>Users</a>
                    </li>
                    @endif
                </ul>

                <ul class="navbar-nav ms-auto user-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="user-avatar me-2">
                            <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit me-2"></i>Edit Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 fs-4">Walk-in Inventory Management</h2>
                    <div class="btn-group">
                        <a href="{{ route('walk-in.index') }}" class="btn btn-primary">
                            <i class="fas fa-cash-register me-1"></i> Back to Sales
                        </a>
                        <button id="refresh-btn" class="btn btn-success ms-2">
                            <i class="fas fa-sync-alt me-1"></i> Refresh Data
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card inventory-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-light-success me-3">
                                <i class="fas fa-leaf text-success"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Inventory</h6>
                                <h3 class="mb-0" id="total-inventory-count">Loading...</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card inventory-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-light-warning me-3">
                                <i class="fas fa-exclamation-triangle text-warning"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Low Stock Items</h6>
                                <h3 class="mb-0" id="low-stock-count">Loading...</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3 mb-md-0">
                <div class="card inventory-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-light-info me-3">
                                <i class="fas fa-shopping-cart text-info"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Today's Sales</h6>
                                <h3 class="mb-0" id="today-sales-count">Loading...</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card inventory-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon bg-light-primary me-3">
                                <i class="fas fa-peso-sign text-primary"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Revenue (30 days)</h6>
                                <h3 class="mb-0" id="total-revenue">Loading...</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-boxes me-2"></i>Inventory Management</h5>
                        <div class="input-group" style="width: 300px;">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" id="inventory-search" placeholder="Search plants...">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 650px; overflow-y: auto;">
                            <table class="table table-hover mb-0">
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th>Plant Name</th>
                                        <th>Code</th>
                                        <th>Price</th>
                                        <th>Current Stock</th>
                                        <th>New Stock</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="inventory-table-body">
                                    @foreach($plants as $plant)
                                        <tr data-id="{{ $plant->id }}">
                                            <td class="align-middle">{{ $plant->name }}</td>
                                            <td class="align-middle">{{ $plant->code }}</td>
                                            <td class="align-middle">₱{{ number_format($plant->price, 2) }}</td>
                                            <td class="align-middle">{{ $plant->quantity }}</td>
                                            <td class="align-middle">
                                                <input type="number" class="editable-quantity" value="{{ $plant->quantity }}" min="0">
                                            </td>
                                            <td class="align-middle">
                                                @if($plant->quantity < 5)
                                                    <span class="status-badge status-low">
                                                        <i class="fas fa-exclamation-circle"></i> Low
                                                    </span>
                                                @elseif($plant->quantity < 10)
                                                    <span class="status-badge status-medium">
                                                        <i class="fas fa-exclamation-triangle"></i> Medium
                                                    </span>
                                                @else
                                                    <span class="status-badge status-good">
                                                        <i class="fas fa-check-circle"></i> Good
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-sm btn-success save-btn" data-id="{{ $plant->id }}">
                                                    <i class="fas fa-save"></i> Save
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <!-- Recent Sales Card -->
                <div class="card sidebar-card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0 fs-6"><i class="fas fa-receipt me-2 text-primary"></i>Recent Sales</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush" id="recent-sales-list">
                            @foreach($recentSales as $sale)
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1 truncate-text" title="{{ $sale->plant->name }}">{{ $sale->plant->name }}</h6>
                                            <small class="text-muted">
                                                {{ $sale->created_at->format('M d, Y h:i A') }}
                                            </small>
                                        </div>
                                        <span class="badge bg-success">{{ $sale->quantity }} sold</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Low Stock Card -->
                <div class="card sidebar-card mb-3">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fs-6"><i class="fas fa-exclamation-triangle me-2 text-warning"></i>Low Stock Alert</h5>
                        <button id="show-all-low-stock" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#lowStockModal">
                            <i class="fas fa-list-ul me-1"></i> Show All
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush" id="low-stock-list">
                            <!-- Low stock items will be populated here via AJAX -->
                            <div class="list-group-item text-center py-4">
                                <div class="spinner-border text-success" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2 text-muted">Loading low stock items...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast-container"></div>
    </div>

    <!-- Low Stock Modal -->
    <div class="modal fade" id="lowStockModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Low Stock Plants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body modal-body-fullheight p-0" style="min-height: 400px;">
                    <div class="row g-0 h-100">
                        <div class="col-md-3 border-end p-3">
                            <div class="form-group mb-3">
                                <label for="category-filter" class="form-label">Filter by Category</label>
                                <select class="form-select" id="category-filter">
                                    <option value="all">All Categories</option>
                                    <!-- Categories will be populated here via JavaScript -->
                                </select>
                            </div>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <span>These plants are running low on stock and might need reordering soon.</span>
                            </div>
                        </div>
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
                                    <tbody id="lowStockModalBody">
                                        <!-- Low stock items will be populated here via JavaScript -->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Hide loading overlay when page is fully loaded
            setTimeout(function() {
                $('#loading-overlay').fadeOut();
            }, 500);

            // Load inventory statistics on page load
            loadInventoryStats();

            // Refresh button click handler
            $('#refresh-btn').on('click', function() {
                loadInventoryStats();
                showToast('Refresh', 'Data has been refreshed', 'info');
            });

            // Search functionality
            $('#inventory-search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#inventory-table-body tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Category filter for low stock modal
            $('#category-filter').on('change', function() {
                var category = $(this).val();
                if (category === 'all') {
                    $('#lowStockTable tbody tr').show();
                } else {
                    $('#lowStockTable tbody tr').hide();
                    $('#lowStockTable tbody tr[data-category="' + category + '"]').show();
                }
            });

            // Save button click handler
            $('.save-btn').on('click', function() {
                var btn = $(this);
                var originalBtnText = btn.html();
                var plantId = btn.data('id');
                var newQuantity = btn.closest('tr').find('.editable-quantity').val();

                // Validate input
                if (newQuantity === '' || isNaN(newQuantity) || parseInt(newQuantity) < 0) {
                    showToast('Error', 'Please enter a valid quantity', 'error');
                    return;
                }

                // Show loading state
                btn.html('<i class="fas fa-spinner fa-spin"></i> Saving...');
                btn.prop('disabled', true);

                // Send AJAX request to update inventory
                $.ajax({
                    url: '{{ route("walk-in.inventory.update") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        updates: [
                            {
                                id: plantId,
                                quantity: parseInt(newQuantity)
                            }
                        ]
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update current stock display
                            btn.closest('tr').find('td:eq(3)').text(newQuantity);

                            // Update status badge
                            var statusCell = btn.closest('tr').find('td:eq(5)');
                            var quantity = parseInt(newQuantity);

                            if (quantity < 5) {
                                statusCell.html('<span class="status-badge status-low"><i class="fas fa-exclamation-circle"></i> Low</span>');
                            } else if (quantity < 10) {
                                statusCell.html('<span class="status-badge status-medium"><i class="fas fa-exclamation-triangle"></i> Medium</span>');
                            } else {
                                statusCell.html('<span class="status-badge status-good"><i class="fas fa-check-circle"></i> Good</span>');
                            }

                            // Refresh inventory stats
                            loadInventoryStats();

                            // Show success toast
                            showToast('Success', 'Stock updated successfully', 'success');
                        } else {
                            showToast('Error', response.message, 'error');
                        }

                        // Reset button state
                        btn.html(originalBtnText);
                        btn.prop('disabled', false);
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        showToast('Error', 'Failed to update stock', 'error');
                        btn.html(originalBtnText);
                        btn.prop('disabled', false);
                    }
                });
            });

            // Function to load inventory statistics
            function loadInventoryStats() {
                $.ajax({
                    url: '{{ route("walk-in.inventory.stats") }}',
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            const data = response.data;

                            // Update low stock list
                            updateLowStockList(data.low_stock);

                            // Update summary cards
                            updateSummaryCards();
                        } else {
                            showToast('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        showToast('Error', 'Failed to load inventory statistics', 'error');
                    }
                });
            }

            // Function to update low stock list
            function updateLowStockList(lowStockItems) {
                var lowStockList = $('#low-stock-list');
                var lowStockModalBody = $('#lowStockModalBody');
                var categoryFilter = $('#category-filter');
                var showAllButton = $('#show-all-low-stock');

                lowStockList.empty();
                lowStockModalBody.empty();

                // Reset category filter options
                categoryFilter.find('option:not(:first)').remove();
                var categories = [];

                if (lowStockItems.length === 0) {
                    lowStockList.append(`
                        <div class="list-group-item text-center py-3">
                            <i class="fas fa-check-circle text-success mb-2"></i>
                            <p class="mb-0 text-muted small">No low stock items</p>
                        </div>
                    `);

                    // Disable the Show All button if no low stock items
                    showAllButton.prop('disabled', true);
                    showAllButton.addClass('disabled');
                } else {
                    // Enable the Show All button if there are low stock items
                    showAllButton.prop('disabled', false);
                    showAllButton.removeClass('disabled');

                    // Display only the first 4 items in the sidebar
                    $.each(lowStockItems.slice(0, 4), function(index, item) {
                        lowStockList.append(`
                            <div class="list-group-item py-2">
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 truncate-text" title="${item.name}">${item.name}</h6>
                                        <small class="text-muted d-block small">Code: ${item.code}</small>
                                    </div>
                                    <span class="badge bg-danger ms-2">${item.quantity} left</span>
                                </div>
                            </div>
                        `);

                        // Collect unique categories
                        if (categories.indexOf(item.category) === -1) {
                            categories.push(item.category);
                        }
                    });

                    // Populate all items in the modal table
                    $.each(lowStockItems, function(index, item) {
                        lowStockModalBody.append(`
                            <tr data-category="${item.category}">
                                <td>${item.name}</td>
                                <td>${item.category ? item.category.charAt(0).toUpperCase() + item.category.slice(1) : 'N/A'}</td>
                                <td>
                                    <span class="badge bg-warning">${item.quantity} left</span>
                                </td>
                            </tr>
                        `);
                    });

                    // Add category options to filter
                    categories.sort().forEach(function(category) {
                        if (category) {
                            categoryFilter.append(`
                                <option value="${category}">${category.charAt(0).toUpperCase() + category.slice(1)}</option>
                            `);
                        }
                    });
                }

                // Initialize tooltips on truncated text
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('.truncate-text[title]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            // Function to update summary cards
            function updateSummaryCards() {
                $.ajax({
                    url: '{{ route("walk-in.inventory.summary") }}',
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            const data = response.data;

                            $('#total-inventory-count').text(data.total_plants);
                            $('#low-stock-count').text(data.low_stock_count);
                            $('#today-sales-count').text(data.today_sales);
                            $('#total-revenue').text('₱' + data.monthly_revenue);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);

                        // Set default values on error
                        $('#total-inventory-count').text('N/A');
                        $('#low-stock-count').text('N/A');
                        $('#today-sales-count').text('N/A');
                        $('#total-revenue').text('N/A');
                    }
                });
            }

            // Function to show toast messages
            function showToast(title, message, type) {
                var toastId = 'toast-' + Date.now();
                var toastHTML = `
                    <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'error' ? 'danger' : type}" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <strong>${title}:</strong> ${message}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                `;

                $('#toast-container').append(toastHTML);
                var toastElement = document.getElementById(toastId);
                var toast = new bootstrap.Toast(toastElement, { autohide: true, delay: 3000 });
                toast.show();

                // Remove toast from DOM after it's hidden
                $(toastElement).on('hidden.bs.toast', function() {
                    $(this).remove();
                });
            }
        });
    </script>
</body>
</html>