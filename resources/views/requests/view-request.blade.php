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
                                <button id="printRequestBtn" class="btn btn-outline-primary">
                                    <i class="fas fa-print me-1"></i>Print
                                </button>
                            </div>
                        </div>

                        <!-- Pricing Options Dropdown -->
                        <div class="pricing-options" style="margin-bottom: 20px;">
                            <span class="pricing-label">Pricing Options:</span>
                            <select class="form-select pricing-select" id="pricingOptions" style="max-width: 300px; display: inline-block; margin-left: 10px; padding-right: 30px; text-overflow: ellipsis;">
                                <option value="None" {{ $request->pricing == 'None' ? 'selected' : '' }}>None</option>
                                <option value="Low cost" {{ $request->pricing == 'Low cost' ? 'selected' : '' }}>Low cost</option>
                                <option value="High cost" {{ $request->pricing == 'High cost' ? 'selected' : '' }}>High cost</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Request Information</h5>
                                        <button class="btn btn-sm btn-outline-primary edit-request-info-btn" title="Edit Request Information">
                                            <i class="fas fa-edit"></i>
                                        </button>
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
                                        <h5 class="card-title mb-0">Client Information</h5>
                                        <button class="btn btn-sm btn-outline-primary edit-client-info-btn" title="Edit Client Information">
                                            <i class="fas fa-edit"></i>
                                        </button>
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
                                    @if($request->status == 'pending')
                                        <div class="card-footer">
                                            <a href="{{ route('requests.send-email', $request->id) }}" class="btn btn-success w-100" id="sendEmailBtn">
                                                <i class="fas fa-envelope me-1"></i> Send Email to Client
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Requested Items</h5>
                                        <button class="btn btn-sm btn-outline-primary edit-items-btn" title="Edit Items">
                                            <i class="fas fa-edit"></i>
                                        </button>
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
                                                        <th style="width: 10%; text-align: right;">Unit<br>Price</th>
                                                        <th style="width: 15%; text-align: right;">Total</th>
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your JavaScript for print functionality and other interactions here -->
</body>
</html>

