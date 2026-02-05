<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('tree-leaf.ico')); ?>?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/sidebar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/dashboard.css')); ?>?v=4" rel="stylesheet">
    <link href="<?php echo e(asset('css/inventory.css')); ?>?v=2" rel="stylesheet">
    <link href="<?php echo e(asset('css/push-notifications.css')); ?>?v=<?php echo e(time()); ?>" rel="stylesheet">
</head>
<body class="bg-light dashboard-page">
    <div id="sidebarOverlay"></div>
    <div class="dashboard-flex">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <button id="sidebarToggle" class="btn btn-success d-lg-none" type="button" aria-label="Open sidebar">
            <i class="fa fa-bars" style="font-size: 1.3rem;"></i>
        </button>
        <div class="main-content">
            <div style="padding-top: 0;">
                <div class="p-0">
                    <!-- Title and Add Account Button -->
                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 15px;">
                        <h2 class="mb-0">User Management</h2>
                        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Add Account
                        </a>
                    </div>
                    
                    <!-- Notification Container -->
                    <div class="notification-container">
                        <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible push-notification" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                            <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            <div class="alert-countdown-bar"></div>
                        </div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible push-notification" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                            <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            <div class="alert-countdown-bar"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Tabs -->
                    <ul class="nav nav-tabs mt-4" id="userTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="accounts-tab" data-bs-toggle="tab" data-bs-target="#accounts" type="button" role="tab">
                                <i class="fas fa-users me-2"></i>User Accounts
                                <span class="badge bg-primary ms-2"><?php echo e(count($users)); ?></span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="role-requests-tab" data-bs-toggle="tab" data-bs-target="#role-requests" type="button" role="tab">
                                <i class="fas fa-user-plus me-2"></i>Role Requests
                                <span class="badge bg-warning ms-2"><?php echo e($roleRequests->where('status', 'pending')->count()); ?></span>
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="userTabsContent">
                        <!-- User Accounts Tab -->
                        <div class="tab-pane fade show active" id="accounts" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Role</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($index + 1); ?></td>
                                                    <td><?php echo e($user->first_name); ?></td>
                                                    <td><?php echo e($user->last_name); ?></td>
                                                    <td>
                                                        <?php
                                                            $badgeColor = match($user->role) {
                                                                'super_admin' => 'bg-warning text-dark',
                                                                'admin' => 'bg-danger',
                                                                'user' => 'bg-success',
                                                                default => 'bg-secondary'
                                                            };
                                                        ?>
                                                        <span class="badge <?php echo e($badgeColor); ?>">
                                                            <?php echo e(ucfirst(str_replace('_', ' ', $user->role))); ?>

                                                        </span>
                                                        <?php if($user->is_client): ?>
                                                        <span class="badge bg-info">Client</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="<?php echo e(route('users.edit', $user)); ?>" class="btn btn-link text-primary p-0" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-link text-danger p-0 delete-user-btn" 
                                                                data-user-id="<?php echo e($user->id); ?>" 
                                                                data-user-name="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>"
                                                                title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <form id="delete-user-form-<?php echo e($user->id); ?>" action="<?php echo e(route('users.destroy', $user)); ?>" method="POST" class="d-none">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Role Requests Tab -->
                        <div class="tab-pane fade" id="role-requests" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User</th>
                                                    <th>Account Type</th>
                                                    <th>Contact</th>
                                                    <th>Submitted</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $roleRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td>#<?php echo e($request->id); ?></td>
                                                    <td>
                                                        <strong><?php echo e($request->full_name); ?></strong><br>
                                                        <small class="text-muted"><?php echo e($request->email); ?></small>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo e($request->account_type === 'individual' ? 'bg-info' : 'bg-warning text-dark'); ?>">
                                                            <?php echo e($request->account_type === 'individual' ? 'Individual' : 'Company'); ?>

                                                        </span>
                                                    </td>
                                                    <td><?php echo e($request->contact_number); ?></td>
                                                    <td><?php echo e($request->created_at->format('M d, Y')); ?></td>
                                                    <td>
                                                        <?php if($request->status === 'pending'): ?>
                                                        <span class="badge bg-warning">Pending</span>
                                                        <?php elseif($request->status === 'approved'): ?>
                                                        <span class="badge bg-success"></span>
                                                        <?php else: ?>
                                                        <span class="badge bg-danger"></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewRequestModal<?php echo e($request->id); ?>" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <?php if($request->status === 'pending'): ?>
                                                        <button type="button" class="btn btn-sm btn-success approve-role-request-btn" 
                                                                data-request-id="<?php echo e($request->id); ?>" 
                                                                data-request-name="<?php echo e($request->full_name); ?>"
                                                                title="Accept">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger reject-role-request-btn" 
                                                                data-request-id="<?php echo e($request->id); ?>" 
                                                                data-request-name="<?php echo e($request->full_name); ?>"
                                                                title="Reject">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                        <?php else: ?>
                                                        <button type="button" class="btn btn-sm btn-secondary done-role-request-btn" 
                                                                data-request-id="<?php echo e($request->id); ?>" 
                                                                data-request-name="<?php echo e($request->full_name); ?>"
                                                                title="Done - Remove from list">
                                                            <i class="fas fa-check-circle"></i> Done
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <!-- View Request Modal -->
                                                <div class="modal fade" id="viewRequestModal<?php echo e($request->id); ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Role Request #<?php echo e($request->id); ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <strong>Full Name:</strong> <?php echo e($request->full_name); ?>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Email:</strong> <?php echo e($request->email); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <strong>Contact:</strong> <?php echo e($request->contact_number); ?>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Account Type:</strong> <?php echo e(ucfirst($request->account_type)); ?>

                                                                    </div>
                                                                </div>
                                                                <?php if($request->account_type === 'individual'): ?>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <strong>Gender:</strong> <?php echo e(ucfirst($request->gender ?? 'N/A')); ?>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Address:</strong> <?php echo e($request->address ?? 'N/A'); ?>

                                                                    </div>
                                                                </div>
                                                                <?php else: ?>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <strong>Company:</strong> <?php echo e($request->company_name ?? 'N/A'); ?>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Company Address:</strong> <?php echo e($request->company_address ?? 'N/A'); ?>

                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php if($request->message): ?>
                                                                <div class="mb-3">
                                                                    <strong>Message:</strong>
                                                                    <p><?php echo e($request->message); ?></p>
                                                                </div>
                                                                <?php endif; ?>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <strong>Status:</strong> 
                                                                        <span class="badge bg-<?php echo e($request->status === 'pending' ? 'warning' : ($request->status === 'approved' ? 'success' : 'danger')); ?>">
                                                                            <?php echo e(ucfirst($request->status)); ?>

                                                                        </span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Submitted:</strong> <?php echo e($request->created_at->format('M d, Y H:i A')); ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-5">
                                                        <div style="color: #6c757d;">
                                                            <i class="fas fa-inbox fa-3x mb-3"></i>
                                                            <h5>No Role Requests</h5>
                                                            <p class="text-muted mb-0">There are no client role requests at this time.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
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
    
    <!-- Delete User Confirmation Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div style="font-size: 4rem; color: #dc3545;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h5 class="mt-3 mb-3">Are you sure you want to delete this user?</h5>
                    <p class="text-muted mb-2"><strong id="deleteUserName"></strong></p>
                    <p class="text-danger"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteUser">
                        <i class="fas fa-trash me-1"></i> Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Approve Role Request Confirmation Modal -->
    <div class="modal fade" id="approveRoleRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Approve Client Request</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div style="font-size: 4rem; color: #198754;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h5 class="mt-3 mb-3">Approve this client request?</h5>
                    <p class="text-muted mb-2"><strong id="approveRequestName"></strong></p>
                    <p class="text-success"><small>This user will be granted client access and receive a notification.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <form id="approveRoleRequestForm" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check me-1"></i> Yes, Approve
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Role Request Confirmation Modal -->
    <div class="modal fade" id="rejectRoleRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Reject Client Request</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div style="font-size: 4rem; color: #dc3545;">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <h5 class="mt-3 mb-3">Reject this client request?</h5>
                    <p class="text-muted mb-2"><strong id="rejectRequestName"></strong></p>
                    <p class="text-danger"><small>The user will be notified that their request was reviewed.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <form id="rejectRoleRequestForm" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-times me-1"></i> Yes, Reject
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Role Request Confirmation Modal -->
    <div class="modal fade" id="doneRoleRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Remove Role Request</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div style="font-size: 4rem; color: #0d6efd;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h5 class="mt-3 mb-3">Remove this role request from the list?</h5>
                    <p class="text-muted mb-2"><strong id="doneRequestName"></strong></p>
                    <p class="text-muted"><small>This request has been processed and will be removed from the list.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <form id="doneRoleRequestForm" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-1"></i> Yes, Remove
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('js/alerts.js')); ?>?v=<?php echo e(time()); ?>"></script>
    <script src="<?php echo e(asset('js/push-notifications.js')); ?>?v=<?php echo e(time()); ?>"></script>
    
    <script>
        // Check if we should activate the role requests tab
        <?php if(session('activeTab') === 'role-requests'): ?>
        document.addEventListener('DOMContentLoaded', function() {
            const roleRequestsTab = document.getElementById('role-requests-tab');
            const roleRequestsPane = document.getElementById('role-requests');
            const accountsTab = document.getElementById('accounts-tab');
            const accountsPane = document.getElementById('accounts');
            
            // Deactivate accounts tab
            accountsTab.classList.remove('active');
            accountsPane.classList.remove('show', 'active');
            
            // Activate role requests tab
            roleRequestsTab.classList.add('active');
            roleRequestsPane.classList.add('show', 'active');
        });
        <?php endif; ?>
        
        // Auto-dismiss alerts after 5 seconds with countdown animation
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert.push-notification');
            alerts.forEach(function(alert) {
                const countdownBar = alert.querySelector('.alert-countdown-bar');
                
                // Start countdown animation
                if (countdownBar) {
                    countdownBar.style.animation = 'countdown 5s linear forwards';
                }
                
                // Auto-dismiss after 5 seconds
                const dismissTimer = setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
                
                // Manual close button - clear timer if manually closed
                const closeBtn = alert.querySelector('.notification-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        clearTimeout(dismissTimer);
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    });
                }
            });
        });
        
        // Delete User Modal
        let userIdToDelete = null;
        
        $('.delete-user-btn').on('click', function() {
            userIdToDelete = $(this).data('user-id');
            const userName = $(this).data('user-name');
            $('#deleteUserName').text(userName);
            $('#deleteUserModal').modal('show');
        });
        
        $('#confirmDeleteUser').on('click', function() {
            if (userIdToDelete) {
                $('#delete-user-form-' + userIdToDelete).submit();
            }
        });
        
        // Approve Role Request Modal
        $('.approve-role-request-btn').on('click', function() {
            const requestId = $(this).data('request-id');
            const requestName = $(this).data('request-name');
            $('#approveRequestName').text(requestName);
            $('#approveRoleRequestForm').attr('action', '/users/role-requests/' + requestId + '/approve');
            $('#approveRoleRequestModal').modal('show');
        });
        
        // Reject Role Request Modal
        $('.reject-role-request-btn').on('click', function() {
            const requestId = $(this).data('request-id');
            const requestName = $(this).data('request-name');
            $('#rejectRequestName').text(requestName);
            $('#rejectRoleRequestForm').attr('action', '/users/role-requests/' + requestId + '/reject');
            $('#rejectRoleRequestModal').modal('show');
        });
        
        // Done Role Request Modal
        $('.done-role-request-btn').on('click', function() {
            const requestId = $(this).data('request-id');
            const requestName = $(this).data('request-name');
            $('#doneRequestName').text(requestName);
            $('#doneRoleRequestForm').attr('action', '/users/role-requests/' + requestId);
            $('#doneRoleRequestModal').modal('show');
        });
    </script>
    
    <style>
        /* Countdown bar animation */
        .alert-countdown-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            width: 100%;
            background: rgba(0, 0, 0, 0.2);
            transform-origin: left;
        }

        @keyframes countdown {
            from {
                transform: scaleX(1);
            }
            to {
                transform: scaleX(0);
            }
        }
        
        .push-notification {
            position: relative;
            overflow: hidden;
        }
    </style>
</body>
</html>
<?php /**PATH C:\CODING\my_Inventory\resources\views/admin/users/index.blade.php ENDPATH**/ ?>