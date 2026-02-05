

<?php $__env->startPush('styles'); ?>
<style>
/* Hide sidebar for plant care show page */
body.with-sidebar {
    display: block !important;
}
body.with-sidebar .dashboard-flex {
    display: block !important;
}
body.with-sidebar .dashboard-flex .sidebar {
    display: none !important;
}
body.with-sidebar .dashboard-flex .main-content {
    margin-left: 0 !important;
    width: 100% !important;
    padding-left: 0 !important;
}

/* Plant Care Detail Page Styling */
.plant-care-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.plant-image-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    background: white;
    height: 250px;
    max-width: 300px;
}

.plant-image-container img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 15px;
}

.care-card {
    border: none;
    border-radius: 15px;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    height: 100%;
}

.care-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.care-card .card-body {
    padding: 1.75rem 2.5rem !important;
}

.care-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    flex-shrink: 0;
}

.icon-water { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
.icon-sun { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; }
.icon-soil { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; }
.icon-temp { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; }
.icon-humidity { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; }
.icon-fertilizer { background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); color: white; }
.icon-pruning { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #333; }
.icon-propagation { background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); color: #333; }
.icon-pests { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: #333; }
.icon-growth { background: linear-gradient(135deg, #ff6e7f 0%, #bfe9ff 100%); color: white; }
.icon-toxicity { background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%); color: white; }
.icon-notes { background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%); color: white; }

.care-card h5 {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.75rem;
    font-size: 1.1rem;
    padding: 0;
}

.care-card p {
    color: #4a5568;
    line-height: 1.7;
    margin: 0;
    padding: 0;
    word-break: break-word;
}

.back-button {
    background: white;
    border: 2px solid #e2e8f0;
    color: #4a5568;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.back-button:hover {
    background: #f7fafc;
    border-color: #cbd5e0;
    transform: translateX(-5px);
    color: #2d3748;
}

.edit-button {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.edit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    color: white;
}

.category-badge {
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1.5rem;
    border-radius: 50px;
    font-size: 1rem;
    font-weight: 500;
    display: inline-block;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 2rem;
    position: relative;
    padding-bottom: 0.75rem;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 2px;
}

.no-care-info {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
}

.no-care-info i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.8;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-4" style="max-width: 1400px; margin: 0 auto;">
    <!-- Back and Edit Buttons -->
    <div class="mb-4 d-flex gap-2">
        <a href="<?php echo e(route('plant-care.index')); ?>" class="back-button">
            <i class="fas fa-arrow-left me-2"></i>Back to Library
        </a>
        <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('plant-care.edit', $plant->id)); ?>" class="edit-button">
                <i class="fas fa-edit me-2"></i>Edit Care Info
            </a>
        <?php endif; ?>
    </div>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" style="border-radius: 12px;">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Plant Hero Section -->
    <div class="plant-care-hero">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="plant-image-container">
                    <?php if($plant->photo_path): ?>
                        <img src="<?php echo e(asset('storage/' . $plant->photo_path)); ?>" alt="<?php echo e($plant->name); ?>">
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-leaf" style="font-size: 5rem; opacity: 0.3;"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="display-4 fw-bold mb-2"><?php echo e($plant->name); ?></h1>
                <?php if($plant->scientific_name): ?>
                    <p class="fs-5 mb-3" style="opacity: 0.9;"><em><?php echo e($plant->scientific_name); ?></em></p>
                <?php endif; ?>
                <span class="category-badge">
                    <i class="fas fa-tag me-2"></i><?php echo e(ucfirst($plant->category)); ?>

                </span>
            </div>
        </div>
    </div>

    <?php if($plant->care_watering || $plant->care_sunlight || $plant->care_soil): ?>
        <!-- Care Guide Section -->
        <h2 class="section-title">
            <i class="fas fa-book-open me-2"></i>Complete Care Guide
        </h2>
        
        <div class="row g-5">
            <?php if($plant->care_watering): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-water">
                            <i class="fas fa-tint"></i>
                        </div>
                        <h5>Watering</h5>
                        <p><?php echo e($plant->care_watering); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_sunlight): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-sun">
                            <i class="fas fa-sun"></i>
                        </div>
                        <h5>Sunlight</h5>
                        <p><?php echo e($plant->care_sunlight); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_soil): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-soil">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h5>Soil</h5>
                        <p><?php echo e($plant->care_soil); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_temperature): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-temp">
                            <i class="fas fa-thermometer-half"></i>
                        </div>
                        <h5>Temperature</h5>
                        <p><?php echo e($plant->care_temperature); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_humidity): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-humidity">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <h5>Humidity</h5>
                        <p><?php echo e($plant->care_humidity); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_fertilizing): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-fertilizer">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h5>Fertilizing</h5>
                        <p><?php echo e($plant->care_fertilizing); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_pruning): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-pruning">
                            <i class="fas fa-cut"></i>
                        </div>
                        <h5>Pruning</h5>
                        <p><?php echo e($plant->care_pruning); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_propagation): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-propagation">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h5>Propagation</h5>
                        <p><?php echo e($plant->care_propagation); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_pests): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-pests">
                            <i class="fas fa-bug"></i>
                        </div>
                        <h5>Common Pests & Issues</h5>
                        <p><?php echo e($plant->care_pests); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_growth_rate): ?>
            <div class="col-md-6 col-lg-4">
                <div class="care-card">
                    <div class="card-body">
                        <div class="care-icon icon-growth">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5>Growth Rate</h5>
                        <p><?php echo e($plant->care_growth_rate); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_toxicity): ?>
            <div class="col-md-12">
                <div class="care-card" style="border-left: 4px solid #f59e0b;">
                    <div class="card-body">
                        <div class="care-icon icon-toxicity">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h5>⚠️ Toxicity Warning</h5>
                        <p><?php echo e($plant->care_toxicity); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($plant->care_notes): ?>
            <div class="col-md-12">
                <div class="care-card" style="background: linear-gradient(135deg, #f6f8fb 0%, #e9f0f5 100%);">
                    <div class="card-body">
                        <div class="care-icon icon-notes">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h5>💡 Pro Tips & Additional Notes</h5>
                        <p><?php echo e($plant->care_notes); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="no-care-info">
            <i class="fas fa-seedling"></i>
            <h3 class="mb-3">Care Information Coming Soon</h3>
            <p class="mb-0">We're working on adding comprehensive care information for this plant. Check back soon!</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\my_Inventory\resources\views/plant-care/show.blade.php ENDPATH**/ ?>