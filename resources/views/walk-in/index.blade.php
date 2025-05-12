@extends('layouts.public')

@section('content')
<style>
    /* Improve input number styles */
    input[type="number"] {
        -moz-appearance: textfield;
        appearance: textfield;
    }
    
    input[type="number"]::-webkit-inner-spin-button, 
    input[type="number"]::-webkit-outer-spin-button { 
        -webkit-appearance: inner-spin-button;
        opacity: 1;
        height: 25px;
        position: absolute;
        right: 0;
        top: 0;
    }
    
    /* Editable fields styling */
    .editable-field {
        border: 1px solid #adb5bd !important;
        background-color: #f8f9fa;
        transition: all 0.2s ease-in-out;
    }
    
    .editable-field:focus {
        background-color: #fff;
        border-color: #86b7fe !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    /* Improve table styling */
    .table {
        vertical-align: middle;
    }
    
    .table th {
        background-color: #f0f0f0;
        border-color: #dee2e6;
        font-weight: 600;
    }
    
    .table-bordered td {
        border-color: #dee2e6;
    }
    
    /* Cart item quantity styling */
    .item-quantity {
        padding-right: 20px !important;
        text-align: center;
        border: 1px solid #adb5bd !important;
        font-weight: 500;
    }

    /* New styles for improved cart layout */
    .cart-section {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .cart-items-container {
        max-height: 250px;
        overflow-y: auto;
        margin-bottom: 10px;
    }
    
    .cart-footer {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        margin-top: auto;
    }
    
    .action-buttons {
        position: sticky;
        bottom: 0;
        background-color: #fff;
        padding: 15px 0;
        border-top: 1px solid #dee2e6;
        z-index: 100;
    }

    .cart-card {
        height: calc(100vh - 200px);
        display: flex;
        flex-direction: column;
    }

    .cart-body {
        flex: 1;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    .customer-info {
        margin-top: 10px;
    }
    
    /* Fix for long container text in tables */
    .table td, .table th {
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    /* Add tooltip capability for truncated text */
    .truncate-text {
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: inline-block;
    }
    
    /* Recent sales and low stock tables */
    #salesRecordsTable th, 
    #salesRecordsTable td,
    #lowStockTable th,
    #lowStockTable td {
        font-size: 0.85rem;
        padding: 0.5rem;
    }
</style>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Walk-in Sales</h1>
                <div>
                    <button id="new-sale-btn" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> New Sale
                    </button>
                    <button id="records-btn" class="btn btn-info ms-2">
                        <i class="fas fa-list me-1"></i> Records
                    </button>
                    <a href="{{ route('walk-in.inventory') }}" class="btn btn-success ms-2">
                        <i class="fas fa-boxes me-1"></i> Inventory
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Plant selection and cart area -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Plant Selection</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="plant-search" placeholder="Search for plants...">
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Height (mm)</th>
                                    <th>Spread (mm)</th>
                                    <th>Spacing (mm)</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="plants-table-body">
                                @forelse($plants as $plant)
                                <tr data-plant-id="{{ $plant->id }}">
                                    <td>{{ $plant->name }}</td>
                                    <td>{{ $plant->code }}</td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm editable-field" 
                                               value="{{ $plant->height }}" min="0" style="border: 1px solid #ced4da;">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm editable-field" 
                                               value="{{ $plant->spread }}" min="0" style="border: 1px solid #ced4da;">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm editable-field" 
                                               value="{{ $plant->spacing }}" min="0" style="border: 1px solid #ced4da;">
                                    </td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" class="form-control editable-field" 
                                                   value="{{ $plant->price }}" min="0" step="0.01" style="border: 1px solid #ced4da;">
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary add-to-cart-btn" data-plant-id="{{ $plant->id }}" data-plant-name="{{ $plant->name }}" data-plant-price="{{ $plant->price }}">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No plants available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Current sale cart - Redesigned with fixed layout -->
            <div class="card mb-4 cart-card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Current Sale</h5>
                </div>
                <div class="card-body p-0 cart-body">
                    <!-- Empty cart message -->
                    <div class="text-center text-muted py-4" id="empty-cart-message">
                        <i class="fas fa-shopping-cart fa-3x mb-2"></i>
                        <p>No items in cart</p>
                    </div>
                    
                    <!-- Cart items with scrollable area -->
                    <div id="cart-items-list" class="d-none">
                        <div class="cart-items-container p-3">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light sticky-top" style="top: 0; z-index: 999; background-color: #fff;">
                                        <tr>
                                            <th>Plant</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-table-body">
                                        <!-- Cart items will be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Subtotal -->
                        <div class="p-3 bg-light border-top border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Subtotal:</h5>
                                <h5 class="mb-0" id="cart-subtotal">₱0.00</h5>
                            </div>
                        </div>
                        
                        <!-- Customer information -->
                        <div class="p-3 customer-info">
                            <div class="mb-3">
                                <label for="customer-name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer-name">
                            </div>
                            <div class="mb-3">
                                <label for="customer-email" class="form-label">Customer Email (Optional)</label>
                                <input type="email" class="form-control" id="customer-email">
                            </div>
                            <div class="mb-3">
                                <label for="payment-method" class="form-label">Payment Method</label>
                                <select class="form-select" id="payment-method">
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" id="notes" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Fixed action buttons -->
                <div class="card-footer action-buttons" id="cart-actions">
                    <div id="empty-cart-actions">
                        <div class="d-grid">
                            <button id="new-sale-btn-empty" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Start New Sale
                            </button>
                        </div>
                    </div>
                    
                    <div id="filled-cart-actions" class="d-none">
                        <div class="row g-2">
                            <div class="col-12">
                                <button id="process-sale-btn" class="btn btn-success w-100">
                                    <i class="fas fa-check-circle me-1"></i> Complete Sale & Print Receipt
                                </button>
                            </div>
                            <div class="col-6">
                                <button id="new-sale-btn-in-cart" class="btn btn-primary w-100">
                                    <i class="fas fa-plus me-1"></i> New Sale
                                </button>
                            </div>
                            <div class="col-6">
                                <button id="cancel-sale-btn" class="btn btn-danger w-100">
                                    <i class="fas fa-times-circle me-1"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sales Records Modal -->
    <div class="modal fade" id="salesRecordsModal" tabindex="-1" aria-labelledby="salesRecordsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salesRecordsModalLabel">Sales Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="date" class="form-control" id="start-date">
                                <span class="input-group-text">To</span>
                                <input type="date" class="form-control" id="end-date">
                                <button class="btn btn-primary" id="filter-records-btn">Filter</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Plant</th>
                                    <th>Height</th>
                                    <th>Spread</th>
                                    <th>Spacing</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Customer</th>
                                    <th>Payment Method</th>
                                </tr>
                            </thead>
                            <tbody id="sales-records-body">
                                <!-- Sales records will be added here dynamically -->
                            </tbody>
                        </table>
                    </div>
                    
                    <div id="sales-records-pagination" class="d-flex justify-content-center mt-3">
                        <!-- Pagination will be added here dynamically -->
                    </div>
                    
                    <div id="no-records-message" class="text-center py-3 d-none">
                        <i class="fas fa-info-circle fa-2x mb-2 text-info"></i>
                        <p>No sales records found for the selected period.</p>
                    </div>
                    
                    <div id="records-loading" class="text-center py-3">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading records...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Preview Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptModalLabel">Sale Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="receipt-content" class="p-3 bg-white">
                        <div class="text-center mb-4">
                            <h4>Salenga Farm</h4>
                            <p class="mb-0">Official Receipt</p>
                            <p id="receipt-date" class="text-muted small">Date: </p>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Customer:</strong> <span id="receipt-customer-name"></span></p>
                                <p><strong>Email:</strong> <span id="receipt-customer-email">-</span></p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <p><strong>Receipt #:</strong> <span id="receipt-number"></span></p>
                                <p><strong>Payment Method:</strong> <span id="receipt-payment-method"></span></p>
                            </div>
                        </div>
                        
                        <div class="table-responsive mb-3">
                            <table class="table table-sm table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Price</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="receipt-items">
                                    <!-- Receipt items will be added here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Subtotal:</th>
                                        <th class="text-end" id="receipt-subtotal">₱0.00</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Notes:</strong></p>
                                <p id="receipt-notes" class="text-muted">-</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <p class="mb-0">Thank you for your purchase!</p>
                                <p class="small text-muted">Visit us again soon.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="print-receipt-btn">
                        <i class="fas fa-print me-1"></i> Print Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        let cart = [];
        let salesRecordsModal;
        let receiptModal;
        let currentPage = 1;
        
        // Initialize Bootstrap modals
        salesRecordsModal = new bootstrap.Modal(document.getElementById('salesRecordsModal'));
        receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
        
        // Records button click handler
        $('#records-btn').click(function() {
            // Reset filters
            $('#start-date').val('');
            $('#end-date').val('');
            
            // Load records
            loadSalesRecords();
            
            // Show modal
            salesRecordsModal.show();
        });
        
        // Helper function to initialize tooltips
        function initTooltips() {
            // Destroy any existing tooltips first
            $('.truncate-text[data-bs-toggle="tooltip"]').tooltip('dispose');
            
            // Initialize tooltips on all truncate-text elements
            $('.truncate-text').attr('data-bs-toggle', 'tooltip');
            
            // Initialize new tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        }
        
        // Filter records button click handler
        $('#filter-records-btn').click(function() {
            currentPage = 1;
            loadSalesRecords();
        });
        
        // Function to load sales records
        function loadSalesRecords(page = 1) {
            currentPage = page;
            $('#no-records-message').addClass('d-none');
            $('#records-loading').removeClass('d-none');
            $('#sales-records-body').empty();
            $('#sales-records-pagination').empty();
            
            // Prepare query parameters
            const params = new URLSearchParams();
            params.append('page', page);
            
            const startDate = $('#start-date').val();
            const endDate = $('#end-date').val();
            
            if (startDate) {
                params.append('start_date', startDate);
            }
            
            if (endDate) {
                params.append('end_date', endDate);
            }
            
            // Fetch records from server
            $.ajax({
                url: '/walk-in/records?' + params.toString(),
                type: 'GET',
                success: function(response) {
                    $('#records-loading').addClass('d-none');
                    
                    if (response.success) {
                        const records = response.data.data;
                        
                        if (records.length === 0) {
                            $('#no-records-message').removeClass('d-none');
                            return;
                        }
                        
                        // Populate records table
                        records.forEach(record => {
                            const saleDate = new Date(record.sale_date);
                            const formattedDate = saleDate.toLocaleDateString() + ' ' + 
                                                saleDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                            
                            $('#sales-records-body').append(`
                                <tr>
                                    <td>${formattedDate}</td>
                                    <td><span class="truncate-text" title="${record.plant ? record.plant.name : 'Unknown'}">${record.plant ? record.plant.name : 'Unknown'}</span></td>
                                    <td>${record.height || 'N/A'}</td>
                                    <td>${record.spread || 'N/A'}</td>
                                    <td>${record.spacing || 'N/A'}</td>
                                    <td>${record.quantity}</td>
                                    <td>₱${parseFloat(record.price).toFixed(2)}</td>
                                    <td>₱${parseFloat(record.total_price).toFixed(2)}</td>
                                    <td><span class="truncate-text" title="${record.customer_name || 'N/A'}">${record.customer_name || 'N/A'}</span></td>
                                    <td>${record.payment_method}</td>
                                </tr>
                            `);
                        });
                        
                        // Create pagination
                        createPagination(response.data);
                        
                        // Initialize tooltips after adding content
                        initTooltips();
                    } else {
                        $('#no-records-message').removeClass('d-none')
                            .find('p').text('Error loading records: ' + response.message);
                    }
                },
                error: function(xhr) {
                    $('#records-loading').addClass('d-none');
                    $('#no-records-message').removeClass('d-none')
                        .find('p').text('Error loading records. Please try again.');
                    console.error(xhr);
                }
            });
        }
        
        // Function to create pagination links
        function createPagination(data) {
            if (data.last_page <= 1) return;
            
            const pagination = $('#sales-records-pagination');
            
            // Create pagination container
            const paginationNav = $('<nav aria-label="Sales records pagination"></nav>');
            const paginationList = $('<ul class="pagination"></ul>');
            
            // Previous page link
            const prevLi = $('<li class="page-item"></li>');
            if (data.current_page === 1) {
                prevLi.addClass('disabled');
            } else {
                prevLi.click(function() {
                    loadSalesRecords(data.current_page - 1);
                });
            }
            prevLi.append('<a class="page-link" href="javascript:void(0)">Previous</a>');
            paginationList.append(prevLi);
            
            // Page number links
            for (let i = 1; i <= data.last_page; i++) {
                const pageLi = $('<li class="page-item"></li>');
                if (i === data.current_page) {
                    pageLi.addClass('active');
                } else {
                    pageLi.click(function() {
                        loadSalesRecords(i);
                    });
                }
                pageLi.append(`<a class="page-link" href="javascript:void(0)">${i}</a>`);
                paginationList.append(pageLi);
            }
            
            // Next page link
            const nextLi = $('<li class="page-item"></li>');
            if (data.current_page === data.last_page) {
                nextLi.addClass('disabled');
            } else {
                nextLi.click(function() {
                    loadSalesRecords(data.current_page + 1);
                });
            }
            nextLi.append('<a class="page-link" href="javascript:void(0)">Next</a>');
            paginationList.append(nextLi);
            
            // Add to DOM
            paginationNav.append(paginationList);
            pagination.append(paginationNav);
        }
        
        // Handle adding items to cart
        $('.add-to-cart-btn').click(function() {
            const plantId = $(this).data('plant-id');
            const plantName = $(this).data('plant-name');
            const row = $(this).closest('tr');
            
            // Get values from editable fields
            const height = row.find('td:eq(2) input').val();
            const spread = row.find('td:eq(3) input').val();
            const spacing = row.find('td:eq(4) input').val();
            const plantPrice = parseFloat(row.find('td:eq(5) input').val());
            
            // Update data attribute with current price
            $(this).data('plant-price', plantPrice);
            
            // Check if item is already in cart
            const existingItem = cart.find(item => item.id === plantId);
            
            if (existingItem) {
                existingItem.quantity += 1;
                existingItem.price = plantPrice; // Update price to current value
                existingItem.height = height;
                existingItem.spread = spread;
                existingItem.spacing = spacing;
                existingItem.total = existingItem.quantity * existingItem.price;
            } else {
                cart.push({
                    id: plantId,
                    name: plantName,
                    price: plantPrice,
                    height: height,
                    spread: spread,
                    spacing: spacing,
                    quantity: 1,
                    total: plantPrice
                });
            }
            
            updateCartDisplay();
        });
        
        // Function to update cart display
        function updateCartDisplay() {
            const cartBody = $('#cart-table-body');
            cartBody.empty();
            
            let subtotal = 0;
            
            if (cart.length > 0) {
                $('#empty-cart-message').addClass('d-none');
                $('#cart-items-list').removeClass('d-none');
                $('#empty-cart-actions').addClass('d-none');
                $('#filled-cart-actions').removeClass('d-none');
                
                cart.forEach(item => {
                    subtotal += item.total;
                    
                    cartBody.append(`
                        <tr data-item-id="${item.id}">
                            <td>${item.name}</td>
                            <td>
                                <input type="number" class="form-control form-control-sm item-quantity" 
                                       value="${item.quantity}" min="1" style="width: 70px; border: 1px solid #ced4da; padding-right: 5px; text-align: center;">
                            </td>
                            <td>₱${item.price.toFixed(2)}</td>
                            <td>₱${item.total.toFixed(2)}</td>
                            <td>
                                <button class="btn btn-sm btn-danger remove-item-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
                
                $('#cart-subtotal').text(`₱${subtotal.toFixed(2)}`);
            } else {
                $('#empty-cart-message').removeClass('d-none');
                $('#cart-items-list').addClass('d-none');
                $('#empty-cart-actions').removeClass('d-none');
                $('#filled-cart-actions').addClass('d-none');
            }
            
            // Attach event handlers to new elements
            attachCartEventHandlers();
        }
        
        // Attach event handlers to cart items
        function attachCartEventHandlers() {
            // Update quantity
            $('.item-quantity').change(function() {
                const row = $(this).closest('tr');
                const itemId = row.data('item-id');
                const newQuantity = parseInt($(this).val());
                
                if (newQuantity <= 0) {
                    $(this).val(1);
                    return;
                }
                
                const cartItem = cart.find(item => item.id === itemId);
                if (cartItem) {
                    cartItem.quantity = newQuantity;
                    cartItem.total = cartItem.price * newQuantity;
                    updateCartDisplay();
                }
            });
            
            // Remove item
            $('.remove-item-btn').click(function() {
                const row = $(this).closest('tr');
                const itemId = row.data('item-id');
                
                cart = cart.filter(item => item.id !== itemId);
                updateCartDisplay();
            });
        }
        
        // Search functionality
        $('#plant-search').keyup(function() {
            const searchTerm = $(this).val().toLowerCase();
            
            $('#plants-table-body tr').each(function() {
                const name = $(this).find('td:first').text().toLowerCase();
                const code = $(this).find('td:nth-child(2)').text().toLowerCase();
                
                if (name.includes(searchTerm) || code.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Function to generate receipt
        function generateReceipt(saleData) {
            // Set basic receipt info
            const receiptDate = new Date();
            $('#receipt-date').text('Date: ' + receiptDate.toLocaleDateString() + ' ' + receiptDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }));
            $('#receipt-customer-name').text(saleData.customer_name || 'Walk-in Customer');
            $('#receipt-customer-email').text(saleData.customer_email || '-');
            $('#receipt-payment-method').text(saleData.payment_method.charAt(0).toUpperCase() + saleData.payment_method.slice(1));
            $('#receipt-notes').text(saleData.notes || '-');
            
            // Generate random receipt number (in reality this should come from the server)
            const receiptNumber = 'INV-' + new Date().getTime().toString().substr(-6);
            $('#receipt-number').text(receiptNumber);
            
            // Clear and populate items
            const receiptItems = $('#receipt-items');
            receiptItems.empty();
            
            let subtotal = 0;
            
            saleData.items.forEach(item => {
                subtotal += item.total;
                
                receiptItems.append(`
                    <tr>
                        <td>${item.name}</td>
                        <td class="text-center">${item.quantity}</td>
                        <td class="text-end">₱${parseFloat(item.price).toFixed(2)}</td>
                        <td class="text-end">₱${parseFloat(item.total).toFixed(2)}</td>
                    </tr>
                `);
            });
            
            $('#receipt-subtotal').text('₱' + subtotal.toFixed(2));
            
            // Show receipt modal
            receiptModal.show();
        }
        
        // Handle print receipt button
        $('#print-receipt-btn').click(function() {
            const receiptContent = document.getElementById('receipt-content').innerHTML;
            const printWindow = window.open('', '_blank');
            
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Sale Receipt</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        @media print {
                            body { padding: 0; }
                            .no-print { display: none; }
                        }
                    </style>
                </head>
                <body>
                    <div class="container mb-4">
                        <div class="no-print text-end mb-3">
                            <button class="btn btn-primary" onclick="window.print()">Print</button>
                            <button class="btn btn-secondary ms-2" onclick="window.close()">Close</button>
                        </div>
                        ${receiptContent}
                    </div>
                </body>
                </html>
            `);
            
            printWindow.document.close();
        });
        
        // Process sale
        $('#process-sale-btn').click(function() {
            if (cart.length === 0) {
                alert('Please add items to cart first.');
                return;
            }
            
            const customerName = $('#customer-name').val();
            if (!customerName) {
                alert('Please enter customer name.');
                return;
            }
            
            // Disable button and show loading state
            const btn = $(this);
            const originalText = btn.html();
            btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Processing...');
            btn.prop('disabled', true);
            
            // Prepare sale data
            const saleData = {
                customer_name: customerName,
                customer_email: $('#customer-email').val(),
                payment_method: $('#payment-method').val(),
                notes: $('#notes').val(),
                items: cart.map(item => ({
                    plant_id: item.id,
                    name: item.name,
                    quantity: item.quantity,
                    price: item.price,
                    height: item.height,
                    spread: item.spread,
                    spacing: item.spacing,
                    total: item.total
                })),
                total_amount: cart.reduce((sum, item) => sum + item.total, 0)
            };
            
            // Send data to server
            $.ajax({
                url: '/walk-in/process-sale',
                type: 'POST',
                data: JSON.stringify(saleData),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Reset button
                    btn.html(originalText);
                    btn.prop('disabled', false);
                    
                    if (response.success) {
                        // Generate and show receipt
                        generateReceipt(saleData);
                        
                        // Reset cart
                        cart = [];
                        updateCartDisplay();
                        
                        // Reset form
                        $('#customer-name').val('');
                        $('#customer-email').val('');
                        $('#notes').val('');
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error(xhr);
                    alert('Error processing sale. Please try again.');
                    
                    // Reset button
                    btn.html(originalText);
                    btn.prop('disabled', false);
                }
            });
        });
        
        // New sale button (all variants)
        $('#new-sale-btn, #new-sale-btn-empty, #new-sale-btn-in-cart').click(function() {
            // Reset the form
            cart = [];
            $('#customer-name').val('');
            $('#customer-email').val('');
            $('#notes').val('');
            $('#payment-method').val('cash');
            
            updateCartDisplay();
        });
        
        // Cancel sale button
        $('#cancel-sale-btn').click(function() {
            if (confirm('Are you sure you want to cancel this sale?')) {
                // Reset the form
                cart = [];
                $('#customer-name').val('');
                $('#customer-email').val('');
                $('#notes').val('');
                $('#payment-method').val('cash');
                
                updateCartDisplay();
            }
        });
    });
</script>
@endsection 