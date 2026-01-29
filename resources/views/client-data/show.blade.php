@extends('layouts.public')

@section('content')
    <div class="container-fluid py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="fas fa-folder-open me-2 text-success"></i>
                Client Data
            </h2>
            <a href="{{ route('client-data.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Client Data
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div><strong>Visit Date:</strong> {{ optional($siteVisit->visit_date)->format('M j, Y') }}</div>
                        <div class="mt-1"><strong>Status:</strong> <span class="badge bg-{{ $siteVisit->status_badge_color }}">{{ ucfirst(str_replace('_',' ', $siteVisit->status)) }}</span></div>
                    </div>
                    <div class="col-md-8">
                        <div><strong>Location:</strong> {{ $siteVisit->location_address ?? $siteVisit->location ?? '—' }}</div>
                        @php $isOpen = $isOpen ?? false; @endphp
                        <div class="mt-1">
                            <strong>Uploads:</strong>
                            @if($isOpen)
                                <span class="badge bg-success">Open</span>
                            @else
                                <span class="badge bg-secondary">Not yet open</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Client's Data Checklist -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-file-upload me-2 text-success"></i>Client's Data Checklist</h5>
            </div>
            <div class="card-body">
                @php
                    $clientDataItems = [
                        'land_title' => 'Land Title',
                        'sketch_plan' => 'Sketch Plan',
                        'topogrophy' => 'Topography',
                        'tree_map' => 'Tree Map',
                        'site_development_plan_sdp' => 'Site Development Plan (SDP)',
                        'master_development_plant_mdp' => 'Master Development Plan (MDP)',
                        'drone_map' => 'Drone Map',
                    ];
                    $cd = $siteVisit->client_data_checklist ?? [];
                    $cdStatus = $siteVisit->client_data_statuses ?? [];
                    $isAdmin = auth()->check() && auth()->user()->hasAdminAccess();
                    $isLinkedClient = auth()->check() && $siteVisit->user_id === auth()->id();
                    $canUpload = ($isAdmin || $isLinkedClient) && $isOpen;
                @endphp

                <div class="table-responsive">
                    <table class="table table-sm table-bordered align-middle bg-white">
                        <thead>
                            <tr>
                                <th style="width: 28%">Item</th>
                                <th>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Files</span>
                                        @if($canUpload)
                                            <div id="deleteButtonsContainer">
                                                <button type="button" id="toggleDeleteMode" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash me-1"></i>Delete
                                                </button>
                                                <button type="button" id="cancelDeleteMode" class="btn btn-sm btn-secondary d-none">
                                                    <i class="fas fa-times me-1"></i>Cancel
                                                </button>
                                                <button type="button" id="deleteSelectedFiles" class="btn btn-sm btn-danger d-none">
                                                    <i class="fas fa-trash me-1"></i>Delete Selected
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </th>
                                <th style="width: 22%">Upload</th>
                                <th style="width: 18%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientDataItems as $key => $label)
                                @php
                                    $files = $cd[$key] ?? [];
                                    $st = $cdStatus[$key]['status'] ?? 'missing';
                                    $note = $cdStatus[$key]['note'] ?? null;
                                @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $label }}</td>
                                    <td>
                                        @if(empty($files))
                                            <span class="text-muted">No files uploaded.</span>
                                        @else
                                            <ul class="mb-0 list-unstyled">
                                                @foreach($files as $index => $f)
                                                    <li class="d-flex align-items-center mb-2 file-item">
                                                        <input type="checkbox" class="file-checkbox me-2 d-none" 
                                                               data-item-key="{{ $key }}" 
                                                               data-file-index="{{ $index }}"
                                                               data-site-visit-id="{{ $siteVisit->id }}">
                                                        <div class="flex-grow-1">
                                                            <a href="{{ asset('storage/' . $f['path']) }}" target="_blank">{{ $f['original_name'] }}</a>
                                                            <small class="text-muted">({{ $f['type'] }})</small>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        @if($canUpload)
                                            <form action="{{ route('site-visits.client-data.upload', ['siteVisit' => $siteVisit->id, 'itemKey' => $key]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="input-group input-group-sm">
                                                    <input type="file" name="file" class="form-control" required>
                                                    <button class="btn btn-success" type="submit"><i class="fas fa-upload me-1"></i>Upload</button>
                                                </div>
                                                @if($key === 'drone_map')
                                                    <small class="text-muted">Allowed: pdf, jpg, jpeg, png, mp4, mov. Max 20MB.</small>
                                                @else
                                                    <small class="text-muted">Allowed: pdf, jpg, jpeg, png. Max 20MB.</small>
                                                @endif
                                            </form>
                                        @else
                                            @if(!$isOpen)
                                                <span class="text-muted">Uploads not open yet.</span>
                                            @else
                                                <span class="text-muted">No permission to upload.</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $badge = match($st) {
                                                'received' => 'success',
                                                'rejected' => 'danger',
                                                'submitted' => 'warning',
                                                'missing' => 'secondary',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}">{{ ucfirst($st) }}</span>
                                        @if($note)
                                            <small class="text-muted d-block">Note: {{ $note }}</small>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Proposal Checklist (read-only for clients) -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-file-alt me-2 text-success"></i>Proposal Checklist</h5>
            </div>
            <div class="card-body">
                @php
                    $proposalItems = [
                        'concept_board' => 'Concept Board',
                        'design_service_agreement' => 'Design Service Agreement',
                        'build_service_agreement' => 'Build Service Agreement',
                        'design_quotation' => 'Design Quotation',
                        'build_quotation_rough_estimate' => 'Build Quotation: Rough Estimate',
                        'supervision_quotation' => 'Supervision Quotation',
                        'bill_of_materials_boq' => 'Bill of Materials (BOQ)',
                    ];
                    $pp = $siteVisit->proposal_checklist ?? [];
                    $ppStatus = $siteVisit->proposal_item_statuses ?? [];
                @endphp

                <div class="table-responsive">
                    <table class="table table-sm table-bordered align-middle bg-white">
                        <thead>
                            <tr>
                                <th style="width: 28%">Item</th>
                                <th>Files</th>
                                <th style="width: 18%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proposalItems as $key => $label)
                                @php
                                    $files = $pp[$key] ?? [];
                                    $st = $ppStatus[$key]['status'] ?? 'pending';
                                    $badge = match($st) {
                                        'uploaded' => 'warning',
                                        'reviewed' => 'info',
                                        'approved' => 'success',
                                        'pending' => 'secondary',
                                        default => 'secondary'
                                    };
                                @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $label }}</td>
                                    <td>
                                        @if(empty($files))
                                            <span class="text-muted">No files uploaded.</span>
                                        @else
                                            <ul class="mb-0">
                                                @foreach($files as $f)
                                                    <li>
                                                        <a href="{{ asset('storage/' . $f['path']) }}" target="_blank">{{ $f['original_name'] }}</a>
                                                        <small class="text-muted">({{ $f['type'] }})</small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $badge }}">{{ ucfirst($st) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleDeleteBtn = document.getElementById('toggleDeleteMode');
            const cancelDeleteBtn = document.getElementById('cancelDeleteMode');
            const deleteSelectedBtn = document.getElementById('deleteSelectedFiles');
            const fileCheckboxes = document.querySelectorAll('.file-checkbox');

            if (!toggleDeleteBtn) return;

            // Toggle delete mode
            toggleDeleteBtn.addEventListener('click', function() {
                // Show checkboxes
                fileCheckboxes.forEach(cb => cb.classList.remove('d-none'));
                
                // Toggle buttons
                toggleDeleteBtn.classList.add('d-none');
                cancelDeleteBtn.classList.remove('d-none');
                deleteSelectedBtn.classList.remove('d-none');
            });

            // Cancel delete mode
            cancelDeleteBtn.addEventListener('click', function() {
                // Hide checkboxes and uncheck all
                fileCheckboxes.forEach(cb => {
                    cb.classList.add('d-none');
                    cb.checked = false;
                });
                
                // Toggle buttons
                toggleDeleteBtn.classList.remove('d-none');
                cancelDeleteBtn.classList.add('d-none');
                deleteSelectedBtn.classList.add('d-none');
            });

            // Delete selected files
            deleteSelectedBtn.addEventListener('click', function() {
                const selectedFiles = Array.from(fileCheckboxes).filter(cb => cb.checked);
                
                if (selectedFiles.length === 0) {
                    AlertSystem.alert({
                        title: 'No Files Selected',
                        message: 'Please select at least one file to delete.',
                        type: 'warning'
                    });
                    return;
                }

                AlertSystem.confirm({
                    title: 'Delete Files?',
                    message: `Are you sure you want to delete ${selectedFiles.length} file(s)?`,
                    confirmText: 'Yes, Delete',
                    cancelText: 'Cancel',
                    onConfirm: function() {
                        performFileDelete(selectedFiles);
                    }
                });
            });
            
            function performFileDelete(selectedFiles) {

                // Create a form to submit deletions
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("site-visits.client-data.bulk-delete", $siteVisit->id) }}';
                
                // Add CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Add method spoofing for DELETE
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                // Add selected files data
                selectedFiles.forEach((cb, index) => {
                    const itemKeyInput = document.createElement('input');
                    itemKeyInput.type = 'hidden';
                    itemKeyInput.name = `files[${index}][item_key]`;
                    itemKeyInput.value = cb.dataset.itemKey;
                    form.appendChild(itemKeyInput);

                    const fileIndexInput = document.createElement('input');
                    fileIndexInput.type = 'hidden';
                    fileIndexInput.name = `files[${index}][file_index]`;
                    fileIndexInput.value = cb.dataset.fileIndex;
                    form.appendChild(fileIndexInput);
                });

                document.body.appendChild(form);
                form.submit();
            }
        });
    </script>
@endsection
