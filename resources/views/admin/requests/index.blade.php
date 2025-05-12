@extends('layouts.public')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3">Plant Requests</h1>
            <p class="text-muted">Manage plant requests from both clients and users</p>
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

    @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tabbed Navigation -->
    <ul class="nav nav-tabs nav-fill mb-4" id="requestTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="client-tab" data-bs-toggle="tab" data-bs-target="#client-requests"
                    type="button" role="tab" aria-controls="client-requests" aria-selected="true">
                <i class="fas fa-building me-2"></i>Client Requests
                <span class="badge bg-primary ms-2">{{ count($clientRequests) }}</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-requests"
                    type="button" role="tab" aria-controls="user-requests" aria-selected="false">
                <i class="fas fa-users me-2"></i>User Requests
                <span class="badge bg-primary ms-2">{{ count($userRequests) }}</span>
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="requestTabContent">
        <!-- Client Requests Tab -->
        <div class="tab-pane fade show active" id="client-requests" role="tabpanel" aria-labelledby="client-tab">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Request Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Items</th>
                                    <th>Pricing Options</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clientRequests as $request)
                                    <tr class="align-middle">
                                        <td>{{ $request->id }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->email }}</td>
                                        <td>{{ $request->request_date->format('M d, Y') }}</td>
                                        <td>{{ $request->due_date->format('M d, Y') }}</td>
                                        <td>
                                            @if($request->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($request->status == 'sent')
                                                <span class="badge bg-success">Sent</span>
                                            @elseif($request->status == 'cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>{{ count($request->items_json) }} plants</td>
                                        <td>
                                            @php
                                                $pricing = $request->pricing ?? 'None';
                                                $pricingClass = '';
                                                if($pricing == 'Low cost') {
                                                    $pricingClass = 'text-success';
                                                } elseif($pricing == 'High cost') {
                                                    $pricingClass = 'text-danger';
                                                }
                                            @endphp
                                            <span class="{{ $pricingClass }}">{{ $pricing }}</span>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('requests.plain-view', $request->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="View request details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($request->status == 'pending')
                                            <a href="{{ route('requests.send-email', $request->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Send email to client">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            @endif
                                            <form action="{{ route('requests.destroy', $request->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger delete-request-btn" data-request-id="{{ $request->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this request">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">No client requests found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Requests Tab -->
        <div class="tab-pane fade" id="user-requests" role="tabpanel" aria-labelledby="user-tab">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                    <th>Items</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userRequests as $request)
                                    <tr class="align-middle">
                                        <td>{{ $request->id }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->email }}</td>
                                        <td>{{ $request->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($request->request_date)->format('M d, Y') }}</td>
                                        <td>
                                            @if($request->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($request->status == 'sent')
                                                <span class="badge bg-success">Sent</span>
                                            @elseif($request->status == 'cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>{{ is_array($request->items_json) ? count($request->items_json) : 0 }} plants</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('requests.view', $request->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="View request details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($request->pdf_path)
                                            <a href="{{ route('requests.download-pdf', $request->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            @endif
                                            <form action="{{ route('requests.destroy', $request->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger delete-request-btn" data-request-id="{{ $request->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this request">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">No user requests found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this request? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Check if a specific tab should be shown based on URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');

        if (tabParam === 'user') {
            $('#user-tab').tab('show');
        }

        // Enable swipe functionality between tabs
        const container = document.querySelector('.container-fluid');
        let touchStartX = 0;
        let touchEndX = 0;

        container.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, false);

        container.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, false);

        function handleSwipe() {
            const swipeThreshold = 100; // minimum distance to trigger swipe

            if (touchEndX + swipeThreshold < touchStartX) {
                // Swipe left - go to user requests
                $('#user-tab').tab('show');
            } else if (touchEndX > touchStartX + swipeThreshold) {
                // Swipe right - go to client requests
                $('#client-tab').tab('show');
            }
        }

        // Update URL when tab changes
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            const targetId = $(e.target).attr('id');

            if (targetId === 'user-tab') {
                history.replaceState(null, null, '?tab=user');
            } else {
                history.replaceState(null, null, '?tab=client');
            }
        });

        // Handle delete request functionality
        let formToDelete = null;

        // Delete request button click
        $('.delete-request-btn').on('click', function() {
            formToDelete = $(this).closest('form');
            $('#deleteConfirmModal').modal('show');
        });

        // Confirm delete button click
        $('#confirmDelete').on('click', function() {
            if (formToDelete) {
                formToDelete.submit();
            }
            $('#deleteConfirmModal').modal('hide');
        });

        // Properly initialize and configure tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl, {
                boundary: document.body,
                container: 'body',
                trigger: 'hover',
                animation: false,
                popperConfig: {
                    modifiers: [
                        {
                            name: 'preventOverflow',
                            options: {
                                altAxis: true,
                                boundary: document.body
                            }
                        }
                    ]
                }
            });
        });

        // Close tooltips when scrolling to prevent position issues
        $(window).on('scroll', function() {
            $('.tooltip').remove();
        });

        // Remove tooltip when mouse leaves
        $('[data-bs-toggle="tooltip"]').on('mouseleave', function() {
            var tooltip = bootstrap.Tooltip.getInstance(this);
            if (tooltip) {
                tooltip.hide();
            }
        });
    });
</script>
@endsection

@push('styles')
<link href="{{ asset('css/no-hover.css') }}?v={{ time() }}" rel="stylesheet">
<style>
/* Larger row height for tables */
.table td, .table th {
    padding: 0.75rem;
    vertical-align: middle;
}

/* Swipe indicator styles */
.swipe-indicator {
    text-align: center;
    padding: 5px;
    color: #6c757d;
    font-size: 0.8rem;
    margin-top: -10px;
    margin-bottom: 10px;
}

/* Active tab indicator */
.nav-tabs .nav-link.active {
    font-weight: bold;
    border-bottom-width: 3px;
}

/* Smooth tab transitions */
.tab-pane {
    transition: all 0.3s ease;
}

/* Badge styling */
.badge {
    font-weight: 500;
    padding: 0.5em 0.75em;
}
</style>
@endpush