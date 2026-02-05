<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Request Details #<?php echo e($request->id); ?> - Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('tree-leaf.ico')); ?>?v=2">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('tree-leaf.ico')); ?>?v=2">
    <link rel="icon" type="image/ico" href="<?php echo e(asset('tree-leaf.ico')); ?>?v=2">
    <link rel="apple-touch-icon" href="<?php echo e(asset('tree-leaf.ico')); ?>?v=2">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('tree-leaf.ico')); ?>?v=2">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/sidebar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/dashboard.css')); ?>?v=4" rel="stylesheet">
    <link href="<?php echo e(asset('css/push-notifications.css')); ?>?v=<?php echo e(time()); ?>" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="sidebarOverlay"></div>
    <div class="dashboard-flex">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <h2 class="mb-0">Request Details #<?php echo e($request->id); ?></h2>
                            <div>
                                <a href="<?php echo e(route('requests.index')); ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Back to List
                                </a>
                                <?php if(auth()->user()->role !== 'super_admin'): ?>
                                <button id="printRequestBtn" class="btn btn-outline-primary">
                                    <i class="fas fa-print me-1"></i>Print
                                </button>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Notification Container with Push Animation -->
                        <div class="notification-container">
                            <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible push-notification" role="alert">
                                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                                <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            
                            <?php if(session('error')): ?>
                            <div class="alert alert-danger alert-dismissible push-notification" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                                <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-dismissible push-notification" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <button type="button" class="btn-close notification-close" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Pricing Options Dropdown - Only for Client Requests -->
                        <?php if($request->request_type == 'client'): ?>
                        <div class="pricing-options" style="margin-bottom: 20px;">
                            <span class="pricing-label">Pricing Options:</span>
                            <select class="form-select pricing-select" id="pricingOptions" style="max-width: 300px; display: inline-block; margin-left: 10px; padding-right: 30px; text-overflow: ellipsis;">
                                <option value="None" <?php echo e($request->pricing == 'None' ? 'selected' : ''); ?>>None</option>
                                <option value="Low cost" <?php echo e($request->pricing == 'Low cost' ? 'selected' : ''); ?>>Low cost</option>
                                <option value="High cost" <?php echo e($request->pricing == 'High cost' ? 'selected' : ''); ?>>High cost</option>
                            </select>
                        </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Request Information</h5>
                                        <?php if(auth()->user()->role !== 'super_admin'): ?>
                                        <button class="btn btn-sm btn-outline-primary edit-request-info-btn" title="Edit Request Information">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body" style="padding: 0;">
                                        <div id="request-info-view">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Status</div>
                                                    <div style="flex: 0 0 auto;">
                                                        <?php if($request->status == 'pending'): ?>
                                                            <span class="badge bg-warning">Pending</span>
                                                        <?php elseif($request->status == 'sent'): ?>
                                                            <span class="badge bg-success">Sent</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Cancelled</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Request Date</div>
                                                    <div style="flex: 0 0 auto; text-align: right; min-width: 100px;"><?php echo e($request->request_date->format('M d, Y')); ?></div>
                                                </li>
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Due Date</div>
                                                    <div style="flex: 0 0 auto; text-align: right; min-width: 100px;"><?php echo e($request->due_date->format('M d, Y')); ?></div>
                                                </li>
                                                <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                                    <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Total Items</div>
                                                    <div style="flex: 0 0 auto; text-align: right; min-width: 30px;"><?php echo e(count($items)); ?></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0"><?php if($request->request_type == 'user'): ?>User Information <?php else: ?> Client Information <?php endif; ?></h5>
                                        <?php if(auth()->user()->role !== 'super_admin'): ?>
                                        <button class="btn btn-sm btn-outline-primary edit-client-info-btn" title="<?php if($request->request_type == 'user'): ?>Edit User Information <?php else: ?> Edit Client Information <?php endif; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <div id="client-info-view">
                                            <div class="mb-3">
                                                <h6 class="fw-bold">Name</h6>
                                                <p><?php echo e(htmlspecialchars($request->name)); ?></p>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold">Email</h6>
                                                <p class="mb-0"><?php echo e(htmlspecialchars($request->email)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(auth()->user()->role !== 'super_admin'): ?>
                                        <?php if($request->status == 'pending'): ?>
                                            <div class="card-footer">
                                                <form action="<?php echo e(route('requests.send-email', $request->id)); ?>" method="POST" style="margin: 0;">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-success w-100" id="sendEmailBtn">
                                                        <i class="fas fa-envelope me-1"></i> 
                                                        <?php if($request->request_type == 'user'): ?>
                                                            Send Email to User
                                                        <?php else: ?>
                                                            Send Email to Client
                                                        <?php endif; ?>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php elseif($request->status == 'sent'): ?>
                                            <div class="card-footer">
                                                <form action="<?php echo e(route('requests.send-email', $request->id)); ?>" method="POST" style="margin: 0;">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-warning w-100" id="resendEmailBtn">
                                                        <i class="fas fa-redo me-1"></i> 
                                                        <?php if($request->request_type == 'user'): ?>
                                                            Resend Email to User
                                                        <?php else: ?>
                                                            Resend Email to Client
                                                        <?php endif; ?>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Requested Items</h5>
                                        <?php if(auth()->user()->role !== 'super_admin'): ?>
                                        <button class="btn btn-sm btn-outline-primary edit-items-btn" title="Edit Items">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <?php endif; ?>
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
                                                        <?php if($request->request_type == 'user'): ?>
                                                        <th style="width: 25%; text-align: center;">Availability</th>
                                                        <?php else: ?>
                                                        <th style="width: 10%; text-align: right;">Unit<br>Price</th>
                                                        <th style="width: 15%; text-align: right;">Total</th>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $remarks = $item['remarks'] ?? '';
                                                            $isLongRemarks = strlen($remarks) > 30;
                                                            $remarksPreview = $isLongRemarks ? substr($remarks, 0, 30) . '...' : $remarks;
                                                        ?>
                                                        <tr>
                                                            <td style="text-align: center; white-space: nowrap; padding: 6px;"><?php echo e($index + 1); ?></td>
                                                            <td style="text-align: center; padding: 6px;"><?php echo e($item['quantity'] ?? 1); ?></td>
                                                            <td style="padding: 6px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo e(htmlspecialchars($item['name'] ?? 'N/A')); ?></td>
                                                            <td style="text-align: center; padding: 6px;"><?php echo e(htmlspecialchars($item['code'] ?? '')); ?></td>
                                                            <td style="text-align: center; padding: 6px;"><?php echo e(!empty($item['height']) ? $item['height'] : ''); ?></td>
                                                            <td style="text-align: center; padding: 6px;"><?php echo e(!empty($item['spread']) ? $item['spread'] : ''); ?></td>
                                                            <td style="text-align: center; padding: 6px;"><?php echo e(!empty($item['spacing']) ? $item['spacing'] : ''); ?></td>
                                                            <td style="padding: 6px;">
                                                                <?php if($isLongRemarks): ?>
                                                                    <div class="remarks-container">
                                                                        <div class="remarks-preview"><?php echo e(htmlspecialchars($remarksPreview)); ?></div>
                                                                        <button type="button" class="remarks-view-btn" data-bs-toggle="modal" data-bs-target="#remarksModal<?php echo e($index); ?>">
                                                                            <i class="fas fa-eye"></i>
                                                                        </button>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="remarks-preview"><?php echo e(htmlspecialchars($remarks)); ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if($request->request_type == 'user'): ?>
                                                            <td style="text-align: center; padding: 6px;">
                                                                <span class="badge bg-success"><?php echo e($item['availability'] ?? 'Available'); ?></span>
                                                            </td>
                                                            <?php else: ?>
                                                            <td style="text-align: right; padding: 6px;">
                                                                <?php if(!empty($item['unit_price']) && $item['unit_price'] > 0): ?>
                                                                    ₱<?php echo e(number_format($item['unit_price'], 2)); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td style="text-align: right; padding: 6px;">
                                                                <?php if(!empty($item['total_price']) && $item['total_price'] > 0): ?>
                                                                    ₱<?php echo e(number_format($item['total_price'], 2)); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <form id="editRequestInfoForm" method="POST" action="<?php echo e(route('requests.update-info', $request->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="request_date" class="form-label">Request Date</label>
                            <input type="date" class="form-control" id="request_date" name="request_date" value="<?php echo e($request->request_date->format('Y-m-d')); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo e($request->due_date ? $request->due_date->format('Y-m-d') : ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" <?php echo e($request->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="sent" <?php echo e($request->status == 'sent' ? 'selected' : ''); ?>>Sent</option>
                                <option value="cancelled" <?php echo e($request->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
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
                    <h5 class="modal-title" id="editClientInfoModalLabel">Edit <?php if($request->request_type == 'user'): ?>User <?php else: ?> Client <?php endif; ?> Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editClientInfoForm" method="POST" action="<?php echo e(route('requests.update-client', $request->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="client_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="client_name" name="name" value="<?php echo e($request->name); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="client_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="client_email" name="email" value="<?php echo e($request->email); ?>" required>
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
                <form id="editItemsForm" method="POST" action="<?php echo e(route('requests.update-items', $request->id)); ?>">
                    <?php echo csrf_field(); ?>
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
                                        <?php if($request->request_type == 'user'): ?>
                                        <th>Availability</th>
                                        <?php else: ?>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody id="editItemsTableBody">
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="items[<?php echo e($index); ?>][name]" value="<?php echo e($item['name'] ?? ''); ?>">
                                                <?php echo e($item['name'] ?? 'N/A'); ?>

                                            </td>
                                            <td>
                                                <input type="hidden" name="items[<?php echo e($index); ?>][code]" value="<?php echo e($item['code'] ?? ''); ?>">
                                                <?php echo e($item['code'] ?? 'N/A'); ?>

                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[<?php echo e($index); ?>][quantity]" value="<?php echo e($item['quantity'] ?? 1); ?>" min="1" style="width: 80px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[<?php echo e($index); ?>][height]" value="<?php echo e($item['height'] ?? ''); ?>" style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[<?php echo e($index); ?>][spread]" value="<?php echo e($item['spread'] ?? ''); ?>" style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm" name="items[<?php echo e($index); ?>][spacing]" value="<?php echo e($item['spacing'] ?? ''); ?>" style="width: 100px;">
                                            </td>
                                            <td>
                                                <textarea class="form-control form-control-sm" name="items[<?php echo e($index); ?>][remarks]" rows="2" style="width: 150px;"><?php echo e($item['remarks'] ?? ''); ?></textarea>
                                            </td>
                                            <?php if($request->request_type == 'user'): ?>
                                            <td>
                                                <select class="form-select form-select-sm" name="items[<?php echo e($index); ?>][availability]" style="width: 120px;">
                                                    <option value="Available" <?php echo e(($item['availability'] ?? 'Available') == 'Available' ? 'selected' : ''); ?>>Available</option>
                                                    <option value="Limited Stock" <?php echo e(($item['availability'] ?? '') == 'Limited Stock' ? 'selected' : ''); ?>>Limited Stock</option>
                                                    <option value="Out of Stock" <?php echo e(($item['availability'] ?? '') == 'Out of Stock' ? 'selected' : ''); ?>>Out of Stock</option>
                                                    <option value="Pre-order" <?php echo e(($item['availability'] ?? '') == 'Pre-order' ? 'selected' : ''); ?>>Pre-order</option>
                                                </select>
                                            </td>
                                            <?php else: ?>
                                            <td>
                                                <input type="number" class="form-control form-control-sm unit-price-input" name="items[<?php echo e($index); ?>][unit_price]" value="<?php echo e($item['unit_price'] ?? ''); ?>" step="0.01" style="width: 100px;" data-index="<?php echo e($index); ?>">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm total-price-display" name="items[<?php echo e($index); ?>][total_price]" value="<?php echo e($item['total_price'] ?? ''); ?>" step="0.01" style="width: 100px;" readonly>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script src="<?php echo e(asset('js/push-notifications.js')); ?>?v=<?php echo e(time()); ?>"></script>
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
                const recipientEmail = '<?php echo e($request->email); ?>';
                const recipientName = '<?php echo e($request->name); ?>';
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
                const requestId = <?php echo e($request->id); ?>;
                
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

<?php /**PATH C:\CODING\my_Inventory\resources\views/requests/view-request.blade.php ENDPATH**/ ?>