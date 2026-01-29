<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Request Details #{{ $request->id }} - Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link rel="icon" type="image/ico" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link rel="apple-touch-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <meta name="msapplication-TileImage" content="{{ asset('tree-leaf.ico') }}?v=2">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
    <link href="{{ asset('css/push-notifications.css') }}?v={{ time() }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="sidebarOverlay"></div>
    <div class="dashboard-flex">
        @include('layouts.sidebar')
        <!-- Sidebar Toggle Button for Mobile -->
        <button id="sidebarToggle" class="btn btn-success d-lg-none" type="button" aria-label="Open sidebar">
            <i class="fa fa-bars" style="font-size: 1.3rem;"></i>
        </button>
        <div class="main-content">
            <div style="padding-top: 0;">
                <div class="p-0">
                    <!-- Main Content -->
                    <div class="container my-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Request Details #{{ $request->id }}</h2>
                            <div>
                                <a href="{{ route('requests.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Back to List
                                </a>
                                @if(auth()->user()->role !== 'super_admin')
                                <button id="printRequestBtn" class="btn btn-outline-primary">
                                    <i class="fas fa-print me-1"></i>Print
                                </button>
                                @endif
                            </div>
                        </div>

                        <!-- Notification Container with Push Animation -->
                        <div class="notification-container">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible push-notification" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            </div>
                            @endif
                            
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible push-notification" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                                <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            </div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible push-notification" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>

                        <!-- Pricing Options Dropdown - Only for Client Requests -->
                        @if($request->request_type == 'client')
                        <div class="pricing-options" style="margin-bottom: 20px;">
                            <span class="pricing-label">Pricing Options:</span>
                            <select class="form-select pricing-select" id="pricingOptions" style="max-width: 300px; display: inline-block; margin-left: 10px; padding-right: 30px; text-overflow: ellipsis;">
                                <option value="None" {{ $request->pricing == 'None' ? 'selected' : '' }}>None</option>
                                <option value="Low cost" {{ $request->pricing == 'Low cost' ? 'selected' : '' }}>Low cost</option>
                                <option value="High cost" {{ $request->pricing == 'High cost' ? 'selected' : '' }}>High cost</option>
                            </select>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Request Information</h5>
                                        @if(auth()->user()->role !== 'super_admin')
                                        <button class="btn btn-sm btn-outline-primary edit-request-info-btn" title="Edit Request Information">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif
                                    </div>
                                    <div class="card-body" style="padding: 0;">
                                        <div id="request-info-view">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Status</div>
                                                    <div style="flex: 0 0 auto;">
                                                        @if($request->status == 'pending')
                                                            <span class="badge bg-warning">Pending</span>
                                                        @elseif($request->status == 'sent')
                                                            <span class="badge bg-success">Sent</span>
                                                        @else
                                                            <span class="badge bg-danger">Cancelled</span>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Request Date</div>
                                                    <div style="flex: 0 0 auto; text-align: right; min-width: 100px;">{{ $request->request_date->format('M d, Y') }}</div>
                                                </li>
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Due Date</div>
                                                    <div style="flex: 0 0 auto; text-align: right; min-width: 100px;">{{ $request->due_date->format('M d, Y') }}</div>
                                                </li>
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Total Items</div>
                                                    <div style="flex: 0 0 auto; text-align: right; min-width: 30px;">{{ count($items) }}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">@if($request->request_type == 'user')User Information @else Client Information @endif</h5>
                                        @if(auth()->user()->role !== 'super_admin')
                                        <button class="btn btn-sm btn-outline-primary edit-client-info-btn" title="@if($request->request_type == 'user')Edit User Information @else Edit Client Information @endif">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div id="client-info-view">
                                            <div class="mb-3">
                                                <h6 class="fw-bold">Name</h6>
                                                <p>{{ htmlspecialchars($request->name) }}</p>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold">Email</h6>
                                                <p class="mb-0">{{ htmlspecialchars($request->email) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->role !== 'super_admin')
                                        @if($request->status == 'pending')
                                            <div class="card-footer">
                                                <form action="{{ route('requests.send-email', $request->id) }}" method="POST" style="margin: 0;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success w-100" id="sendEmailBtn">
                                                        <i class="fas fa-envelope me-1"></i> 
                                                        @if($request->request_type == 'user')
                                                            Send Email to User
                                                        @else
                                                            Send Email to Client
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif($request->status == 'sent')
                                            <div class="card-footer">
                                                <form action="{{ route('requests.send-email', $request->id) }}" method="POST" style="margin: 0;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning w-100" id="resendEmailBtn">
                                                        <i class="fas fa-redo me-1"></i> 
                                                        @if($request->request_type == 'user')
                                                            Resend Email to User
                                                        @else
                                                            Resend Email to Client
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Requested Items</h5>
                                        @if(auth()->user()->role !== 'super_admin')
                                        <button class="btn btn-sm btn-outline-primary edit-items-btn" title="Edit Items">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif
                                    </div>
                                    <div class="card-body p-0">
                                        <div id="items-table-view" class="table-responsive">
                                            <table class="table table-striped mb-0" style="table-layout: fixed; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%; text-align: center;">#</th>
                                                        <th style="width: 5%; text-align: center;">Qty</th>
                                                        <th style="width: 15%;">Plant Name</th>
                                                        <th style="width: 8%; text-align: center;">Code</th>
                                                        <th style="width: 8%; text-align: center;">Height<br><small>(mm)</small></th>
                                                        <th style="width: 8%; text-align: center;">Spread<br><small>(mm)</small></th>
                                                        <th style="width: 8%; text-align: center;">Spacing<br><small>(mm)</small></th>
                                                        <th style="width: 18%;">Remarks</th>
                                                        @if($request->request_type == 'user')
                                                        <th style="width: 25%; text-align: center;">Availability</th>
                                                        @else
                                                        <th style="width: 10%; text-align: right;">Unit<br>Price</th>
                                                        <th style="width: 15%; text-align: right;">Total</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($items as $index => $item)
                                                        @php
                                                            $remarks = $item['remarks'] ?? '';
                                                            $isLongRemarks = strlen($remarks) > 30;
                                                            $remarksPreview = $isLongRemarks ? substr($remarks, 0, 30) . '...' : $remarks;
                                                        @endphp
                                                        <tr>
                                                            <td style="text-align: center; white-space: nowrap; padding: 6px;">{{ $index + 1 }}</td>
                                                            <td style="text-align: center; padding: 6px;">{{ $item['quantity'] ?? 1 }}</td>
                                                            <td style="padding: 6px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ htmlspecialchars($item['name'] ?? 'N/A') }}</td>
                                                            <td style="text-align: center; padding: 6px;">{{ htmlspecialchars($item['code'] ?? '') }}</td>
                                                            <td style="text-align: center; padding: 6px;">{{ !empty($item['height']) ? $item['height'] : '' }}</td>
                                                            <td style="text-align: center; padding: 6px;">{{ !empty($item['spread']) ? $item['spread'] : '' }}</td>
                                                            <td style="text-align: center; padding: 6px;">{{ !empty($item['spacing']) ? $item['spacing'] : '' }}</td>
                                                            <td style="padding: 6px;">
                                                                @if($isLongRemarks)
                                                                    <div class="remarks-container">
                                                                        <div class="remarks-preview">{{ htmlspecialchars($remarksPreview) }}</div>
                                                                        <button type="button" class="remarks-view-btn" data-bs-toggle="modal" data-bs-target="#remarksModal{{ $index }}">
                                                                            <i class="fas fa-eye"></i>
                                                                        </button>
                                                                    </div>
                                                                @else
                                                                    <div class="remarks-preview">{{ htmlspecialchars($remarks) }}</div>
                                                                @endif
                                                            </td>
                                                            @if($request->request_type == 'user')
                                                            <td style="text-align: center; padding: 6px;">
                                                                <span class="badge bg-success">{{ $item['availability'] ?? 'Available' }}</span>
                                                            </td>
                                                            @else
                                                            <td style="text-align: right; padding: 6px;">
                                                                @if(!empty($item['unit_price']) && $item['unit_price'] > 0)
                                                                    ₱{{ number_format($item['unit_price'], 2) }}
                                                                @endif
                                                            </td>
                                                            <td style="text-align: right; padding: 6px;">
                                                                @if(!empty($item['total_price']) && $item['total_price'] > 0)
                                                                    ₱{{ number_format($item['total_price'], 2) }}
                                                                @endif
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Sending Loading Modal -->
    <div class="modal fade" id="emailLoadingModal" tabindex="-1" aria-labelledby="emailLoadingModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <div class="spinner-border text-primary mb-3" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <h5 class="mb-3">Sending Email...</h5>
                    <p class="text-muted mb-3">Please wait while we send the email to <span id="emailRecipient"></span></p>
                    <div class="progress mb-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" id="emailProgress"></div>
                    </div>
                    <button type="button" class="btn btn-outline-danger" id="cancelEmailBtn">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Request Information Modal -->
    <div class="modal fade" id="editRequestInfoModal" tabindex="-1" aria-labelledby="editRequestInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRequestInfoModalLabel">Edit Request Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editRequestInfoForm" method="POST" action="{{ route('requests.update-info', $request->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="request_date" class="form-label">Request Date</label>
                            <input type="date" class="form-control" id="request_date" name="request_date" value="{{ $request->request_date->format('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $request->due_date ? $request->due_date->format('Y-m-d') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="sent" {{ $request->status == 'sent' ? 'selected' : '' }}>Sent</option>
                                <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User/Client Information Modal -->
    <div class="modal fade" id="editClientInfoModal" tabindex="-1" aria-labelledby="editClientInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClientInfoModalLabel">Edit @if($request->request_type == 'user')User @else Client @endif Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editClientInfoForm" method="POST" action="{{ route('requests.update-client', $request->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="client_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="client_name" name="name" value="{{ $request->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="client_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="client_email" name="email" value="{{ $request->email }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Items Modal -->
    <div class="modal fade" id="editItemsModal" tabindex="-1" aria-labelledby="editItemsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemsModalLabel">Edit Requested Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editItemsForm" method="POST" action="{{ route('requests.update-items', $request->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Plant Name</th>
                                        <th>Code</th>
                                        <th>Qty</th>
                                        <th>Height (mm)</th>
                                        <th>Spread (mm)</th>
                                        <th>Spacing (mm)</th>
                                        <th>Remarks</th>
                                        @if($request->request_type == 'user')
                                        <th>Availability</th>
                                        @else
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody id="editItemsTableBody">
                                    @foreach($items as $index => $item)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="items[{{ $index }}][name]" value="{{ $item['name'] ?? '' }}">
                                                {{ $item['name'] ?? 'N/A' }}
                                            </td>
                                            <td>
                                                <input type="hidden" name="items[{{ $index }}][code]" value="{{ $item['code'] ?? '' }}">
                                                {{ $item['code'] ?? 'N/A' }}
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] ?? 1 }}" min="1" style="width: 80px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[{{ $index }}][height]" value="{{ $item['height'] ?? '' }}" style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[{{ $index }}][spread]" value="{{ $item['spread'] ?? '' }}" style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[{{ $index }}][spacing]" value="{{ $item['spacing'] ?? '' }}" style="width: 100px;">
                                            </td>
                                            <td>
                                                <textarea class="form-control form-control-sm" name="items[{{ $index }}][remarks]" rows="2" style="width: 150px;">{{ $item['remarks'] ?? '' }}</textarea>
                                            </td>
                                            @if($request->request_type == 'user')
                                            <td>
                                                <select class="form-select form-select-sm" name="items[{{ $index }}][availability]" style="width: 120px;">
                                                    <option value="Available" {{ ($item['availability'] ?? 'Available') == 'Available' ? 'selected' : '' }}>Available</option>
                                                    <option value="Limited Stock" {{ ($item['availability'] ?? '') == 'Limited Stock' ? 'selected' : '' }}>Limited Stock</option>
                                                    <option value="Out of Stock" {{ ($item['availability'] ?? '') == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                                                    <option value="Pre-order" {{ ($item['availability'] ?? '') == 'Pre-order' ? 'selected' : '' }}>Pre-order</option>
                                                </select>
                                            </td>
                                            @else
                                            <td>
                                                <input type="number" class="form-control form-control-sm unit-price-input" name="items[{{ $index }}][unit_price]" value="{{ $item['unit_price'] ?? '' }}" step="0.01" style="width: 100px;" data-index="{{ $index }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm total-price-display" name="items[{{ $index }}][total_price]" value="{{ $item['total_price'] ?? '' }}" step="0.01" style="width: 100px;" readonly>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/push-notifications.js') }}?v={{ time() }}"></script>
    <!-- Add your JavaScript for print functionality and other interactions here -->
    <script>
        $(document).ready(function() {
            // Edit button functionality - show modal forms
            $('.edit-request-info-btn').on('click', function(e) {
                e.preventDefault();
                $('#editRequestInfoModal').modal('show');
            });

            $('.edit-client-info-btn').on('click', function(e) {
                e.preventDefault();
                $('#editClientInfoModal').modal('show');
            });

            $('.edit-items-btn').on('click', function(e) {
                e.preventDefault();
                $('#editItemsModal').modal('show');
            });

            // Auto-calculate total price when unit price or quantity changes
            $(document).on('input', '.unit-price-input', function() {
                const index = $(this).data('index');
                const unitPrice = parseFloat($(this).val()) || 0;
                const quantity = parseInt($('input[name="items[' + index + '][quantity]"]').val()) || 1;
                const totalPrice = unitPrice * quantity;
                $('input[name="items[' + index + '][total_price]"]').val(totalPrice.toFixed(2));
            });

            $(document).on('input', 'input[name*="[quantity]"]', function() {
                const name = $(this).attr('name');
                const match = name.match(/items\[(\d+)\]\[quantity\]/);
                if (match) {
                    const index = match[1];
                    const quantity = parseInt($(this).val()) || 1;
                    const unitPrice = parseFloat($('input[name="items[' + index + '][unit_price]"]').val()) || 0;
                    const totalPrice = unitPrice * quantity;
                    $('input[name="items[' + index + '][total_price]"]').val(totalPrice.toFixed(2));
                }
            });

            // Email sending functionality with loading modal
            let currentEmailRequest = null;
            
            // Handle email sending with loading modal
            $('#sendEmailBtn, #resendEmailBtn').on('click', function(e) {
                e.preventDefault();
                
                const form = $(this).closest('form');
                const recipientEmail = '{{ $request->email }}';
                const recipientName = '{{ $request->name }}';
                const isResend = $(this).attr('id') === 'resendEmailBtn';
                
                // Show loading modal
                $('#emailRecipient').text(`${recipientName} (${recipientEmail})`);
                $('#emailLoadingModal').modal('show');
                
                // Start progress animation
                startEmailProgress();
                
                // Create FormData for AJAX request
                const formData = new FormData(form[0]);
                
                // Send AJAX request
                currentEmailRequest = $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Complete progress
                        $('#emailProgress').css('width', '100%').removeClass('progress-bar-animated');
                        
                        // Hide modal after brief delay
                        setTimeout(() => {
                            $('#emailLoadingModal').modal('hide');
                            
                            // Show success notification
                            if (window.PushNotifications) {
                                const message = isResend 
                                    ? `<i class="fas fa-check-circle me-2"></i>Email resent successfully to ${recipientName} (${recipientEmail})!`
                                    : `<i class="fas fa-check-circle me-2"></i>Email sent successfully to ${recipientName} (${recipientEmail})!`;
                                window.PushNotifications.show('success', message, true);
                            }
                            
                            // Refresh page after short delay to update status
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }, 500);
                    },
                error: function(xhr, status) {
                    // Hide modal
                    $('#emailLoadingModal').modal('hide');
                    
                    // Only show error if it wasn't cancelled
                    if (status !== 'abort') {
                        let errorMessage = 'Failed to send email. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        
                        if (window.PushNotifications) {
                            window.PushNotifications.show('danger', `<i class="fas fa-exclamation-circle me-2"></i>${errorMessage}`, false);
                        }
                    }
                },
                    complete: function() {
                        currentEmailRequest = null;
                    }
                });
            });
            
            // Cancel email sending
            $('#cancelEmailBtn').on('click', function() {
                if (currentEmailRequest) {
                    currentEmailRequest.abort();
                    currentEmailRequest = null;
                }
                $('#emailLoadingModal').modal('hide');
                
                if (window.PushNotifications) {
                    window.PushNotifications.show('warning', '<i class="fas fa-info-circle me-2"></i>Email sending cancelled.', true);
                }
            });
            
            // Progress animation function
            function startEmailProgress() {
                $('#emailProgress').css('width', '0%').addClass('progress-bar-animated');
                
                let progress = 0;
                const progressInterval = setInterval(() => {
                    progress += Math.random() * 15;
                    if (progress > 90) {
                        progress = 90;
                    }
                    $('#emailProgress').css('width', progress + '%');
                    
                    if (!currentEmailRequest || progress >= 90) {
                        clearInterval(progressInterval);
                    }
                }, 200);
            }
            
            // Reset modal when hidden
            $('#emailLoadingModal').on('hidden.bs.modal', function() {
                $('#emailProgress').css('width', '0%').addClass('progress-bar-animated');
            });

            // Form submissions with loading states
            $('#editRequestInfoForm, #editClientInfoForm, #editItemsForm').on('submit', function(e) {
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            });

            // Print button functionality
            $('#printRequestBtn').on('click', function(e) {
                e.preventDefault();
                window.print();
            });

            // Pricing Options dropdown functionality
            $('#pricingOptions').on('change', function() {
                const selectedPricing = $(this).val();
                const requestId = {{ $request->id }};
                
                // Send AJAX request to update pricing
                $.ajax({
                    url: `/requests/update-pricing/${requestId}`,
                    type: 'POST',
                    data: {
                        pricing: selectedPricing,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            AlertSystem.toast({
                                message: 'Pricing option updated successfully!',
                                type: 'success'
                            });
                            // Reload to show updated pricing
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'Failed to update pricing option.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        AlertSystem.toast({
                            message: errorMessage,
                            type: 'error'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>

