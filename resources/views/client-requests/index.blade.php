@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card request-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Client Requests</h5>
                    <div>
                        <!-- Keep your existing action buttons or filters here -->
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="client-requests-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Request Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->client_name }}</td>
                                    <td>{{ $request->request_type }}</td>
                                    <td>{{ $request->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ strtolower($request->status) }}">
                                            {{ $request->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="tooltip">
                                            <a href="{{ route('client.requests.view', $request->id) }}" class="action-btn view-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <span class="tooltip-text">View details</span>
                                        </div>
                                        
                                        <div class="tooltip">
                                            <a href="{{ route('client.requests.edit', $request->id) }}" class="action-btn edit-btn">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span class="tooltip-text">Edit request</span>
                                        </div>
                                        
                                        <div class="tooltip">
                                            <button type="button" class="action-btn delete-btn" 
                                                data-toggle="modal" 
                                                data-target="#deleteModal" 
                                                data-id="{{ $request->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <span class="tooltip-text">Delete request</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    {{ $requests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this request?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#deleteModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const id = button.data('id');
            const form = $('#deleteForm');
            
            form.attr('action', `/client-requests/${id}`);
        });
    });
</script>
@endpush

@push('styles')
<link href="{{ asset('css/client-requests.css') }}" rel="stylesheet">
@endpush 