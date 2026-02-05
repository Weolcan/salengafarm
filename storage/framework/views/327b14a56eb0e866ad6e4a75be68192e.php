<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .log-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .log-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
        }
        .log-table {
            font-size: 13px;
        }
        .log-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .log-level {
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
        }
        .level-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .level-error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .level-warning {
            background-color: #fff3cd;
            color: #856404;
        }
        .level-debug {
            background-color: #d6d8db;
            color: #383d41;
        }
        .log-context {
            font-family: 'Courier New', monospace;
            font-size: 11px;
            color: #6c757d;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .log-message {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .filter-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .btn-action {
            margin-left: 5px;
        }
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid" style="margin-left: 250px; padding: 20px;">
        <div class="log-container">
            <!-- Header -->
            <div class="log-header">
                <div>
                    <h2><i class="fas fa-file-alt"></i> System Logs</h2>
                    <p class="text-muted mb-0">Monitor system activity and errors</p>
                </div>
                <div>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="stats-card">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Log File Size</h6>
                        <h4><?php echo e(number_format($logSize / 1024, 2)); ?> KB</h4>
                    </div>
                    <div class="col-md-4">
                        <h6>Entries Shown</h6>
                        <h4><?php echo e(count($logs)); ?></h4>
                    </div>
                    <div class="col-md-4">
                        <h6>Last Updated</h6>
                        <h4><?php echo e(now()->format('H:i:s')); ?></h4>
                    </div>
                </div>
            </div>

            <!-- Success/Error Messages -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Filters -->
            <div class="filter-section">
                <form method="GET" action="<?php echo e(route('admin.logs')); ?>" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Filter by Level</label>
                        <select name="level" class="form-select">
                            <option value="all" <?php echo e($level == 'all' ? 'selected' : ''); ?>>All Levels</option>
                            <option value="info" <?php echo e($level == 'info' ? 'selected' : ''); ?>>INFO</option>
                            <option value="error" <?php echo e($level == 'error' ? 'selected' : ''); ?>>ERROR</option>
                            <option value="warning" <?php echo e($level == 'warning' ? 'selected' : ''); ?>>WARNING</option>
                            <option value="debug" <?php echo e($level == 'debug' ? 'selected' : ''); ?>>DEBUG</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Number of Lines</label>
                        <select name="lines" class="form-select">
                            <option value="50" <?php echo e($lines == 50 ? 'selected' : ''); ?>>50</option>
                            <option value="100" <?php echo e($lines == 100 ? 'selected' : ''); ?>>100</option>
                            <option value="200" <?php echo e($lines == 200 ? 'selected' : ''); ?>>200</option>
                            <option value="500" <?php echo e($lines == 500 ? 'selected' : ''); ?>>500</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search logs..." value="<?php echo e($search); ?>">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Actions -->
            <div class="mb-3">
                <button onclick="location.reload()" class="btn btn-info btn-sm">
                    <i class="fas fa-sync"></i> Refresh
                </button>
                <a href="<?php echo e(route('admin.logs.download')); ?>" class="btn btn-success btn-sm btn-action">
                    <i class="fas fa-download"></i> Download
                </a>
                <button onclick="confirmClear()" class="btn btn-danger btn-sm btn-action">
                    <i class="fas fa-trash"></i> Clear Logs
                </button>
            </div>

            <!-- Logs Table -->
            <div class="table-responsive">
                <table class="table table-hover log-table">
                    <thead>
                        <tr>
                            <th style="width: 150px;">Timestamp</th>
                            <th style="width: 80px;">Level</th>
                            <th>Message</th>
                            <th style="width: 300px;">Context</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <small><?php echo e($log['timestamp']); ?></small>
                                </td>
                                <td>
                                    <span class="log-level level-<?php echo e(strtolower($log['level'])); ?>">
                                        <?php echo e($log['level']); ?>

                                    </span>
                                </td>
                                <td>
                                    <div class="log-message" title="<?php echo e($log['message']); ?>">
                                        <?php echo e($log['message']); ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="log-context" title="<?php echo e($log['context']); ?>">
                                        <?php echo e($log['context']); ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-3"></i>
                                    <p>No logs found</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Clear Confirmation Form -->
    <form id="clearForm" method="POST" action="<?php echo e(route('admin.logs.clear')); ?>" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmClear() {
            if (confirm('Are you sure you want to clear all logs? A backup will be created.')) {
                document.getElementById('clearForm').submit();
            }
        }

        // Auto-refresh every 30 seconds (optional)
        // setInterval(() => location.reload(), 30000);
    </script>
</body>
</html>
<?php /**PATH C:\CODING\my_Inventory\resources\views/admin/logs/index.blade.php ENDPATH**/ ?>