@extends('layouts.public')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">User Plant Requests</h1>
            <p class="text-muted">Manage and view plant requests from regular users</p>
        </div>
        <div>
            <a href="{{ route('requests.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-building me-1"></i> View Client Requests
            </a>
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
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm small">
                    <thead>
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
                            <tr>
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
                                    <a href="{{ route('user-requests.view', $request->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="View request details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($request->pdf_path)
                                    <a href="{{ route('user-requests.download-pdf', $request->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF">
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
                                <td colspan="8" class="text-center py-4">No user plant requests found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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

        // Properly initialize and configure tooltips to prevent scrollbars
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