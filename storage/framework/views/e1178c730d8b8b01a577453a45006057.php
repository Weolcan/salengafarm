<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Salenga Farm')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap & Font Awesome -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="<?php echo e(asset('css/sidebar.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/loading.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/push-notifications.css')); ?>?v=<?php echo e(time()); ?>" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="<?php echo e(asset('csss/public.css')); ?>" rel="stylesheet">
        
        <!-- FontAwesome spin fix -->
        <style>
        .fa-spin,
        .fas.fa-spin,
        .far.fa-spin,
        .fab.fa-spin,
        .fal.fa-spin,
        i.fa-spin,
        i.fas.fa-spin,
        .fa-spinner.fa-spin {
            -webkit-animation: custom-fa-spin 1s infinite linear !important;
            animation: custom-fa-spin 1s infinite linear !important;
            -webkit-transform-origin: center !important;
            transform-origin: center !important;
        }
        
        @-webkit-keyframes custom-fa-spin {
            0% { 
                -webkit-transform: rotate(0deg); 
                transform: rotate(0deg); 
            }
            100% { 
                -webkit-transform: rotate(360deg); 
                transform: rotate(360deg); 
            }
        }
        
        @keyframes custom-fa-spin {
            0% { 
                -webkit-transform: rotate(0deg); 
                transform: rotate(0deg); 
            }
            100% { 
                -webkit-transform: rotate(360deg); 
                transform: rotate(360deg); 
            }
        }
        </style>
        
        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-fluid" style="margin-left: 220px; padding-top: 0.5rem;">
            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                    <header class="bg-white dark:bg-gray-800 shadow" style="padding: 0.5rem 1rem;">
                        <div class="max-w-7xl mx-auto py-2 px-2 sm:px-4 lg:px-6" style="font-size: 1.1rem;">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
                <main style="font-size: 0.97rem;">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
            </div>
        </div>
        
        <!-- Base Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?php echo e(asset('js/loading.js')); ?>"></script>
        <?php if(auth()->guard()->check()): ?>
        <script src="<?php echo e(asset('js/push-notifications.js')); ?>?v=<?php echo e(time()); ?>"></script>
        <?php endif; ?>
        
        <!-- Scripts Section -->
        <?php echo $__env->yieldContent('scripts'); ?>
        
        <!-- Toast Container for Notifications -->
        <div id="toastContainer" class="toast-container"></div>
    </body>
</html>
<?php /**PATH C:\CODING\my_Inventory\resources\views/layouts/app.blade.php ENDPATH**/ ?>