@extends('layouts.public')

@push('styles')
<style>
/* Hide sidebar for admin plant care page */
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

/* Admin Plant Care Management Styling */
.admin-care-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 2.5rem;
    margin-bottom: 2rem;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.admin-care-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.admin-care-header p {
    opacity: 0.9;
    font-size: 1.1rem;
}

.filter-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    margin-bottom: 2rem;
}

.filter-card .form-control,
.filter-card .form-select {
    border-radius: 10px;
    border: 2px solid #e2e8f0;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.filter-card .form-control:focus,
.filter-card .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.admin-plant-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.admin-plant-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.admin-plant-card .card-img-container {
    height: 200px;
    background: #f8f9fa;
    position: relative;
    overflow: hidden;
}

.admin-plant-card .card-img-container img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 15px;
}

.status-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.85rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.status-complete {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.status-missing {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.admin-plant-card .card-body {
    padding: 1.25rem 1.5rem !important;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.admin-plant-card .card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
    min-height: 30px;
    padding-left: 0.25rem;
}

.admin-plant-card .scientific-name-container {
    min-height: 28px;
    margin-bottom: 0.75rem;
    padding-left: 0.25rem;
}

.admin-plant-card .scientific-name {
    font-size: 0.9rem;
    color: #6b7280;
    font-style: italic;
    margin-bottom: 0;
}

.admin-plant-card .category-badge {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 0.35rem 0.85rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-block;
    margin-right: 0.5rem;
    margin-left: 0.25rem;
}

.admin-plant-card .code-badge {
    background: #e5e7eb;
    color: #4b5563;
    padding: 0.35rem 0.85rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-block;
}

.admin-plant-card .care-preview-badges {
    min-height: 32px;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    margin-bottom: 0;
}

.admin-plant-card .care-status-text {
    margin-top: 1rem;
    padding: 0.75rem;
    border-radius: 10px;
    font-size: 0.9rem;
    min-height: 50px;
    display: flex;
    align-items: center;
}

.care-status-text.complete {
    background: #d1fae5;
    color: #065f46;
}

.care-status-text.missing {
    background: #fee2e2;
    color: #991b1b;
}

.admin-plant-card .card-footer {
    background: transparent;
    border: none;
    padding: 0 1.5rem 1.25rem !important;
}

.edit-care-btn {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    color: white;
    padding: 0.75rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    width: 100%;
}

.edit-care-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
    color: white;
}
</style>
@endpush

@section('content')
<div class="container-fluid px-4 py-4" style="max-width: 1600px; margin: 0 auto;">
    <!-- Header -->
    <div class="admin-care-header">
        <h1>🌿 Plant Guide Management</h1>
        <p>Manage care information for all plants in your inventory</p>
    </div>

    <!-- Search and Filter Card -->
    <div class="filter-card">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px; border: 2px solid #e2e8f0; border-right: none;">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 ps-0" id="adminCareSearchInput" placeholder="Search plants..." autocomplete="off" style="border-left: none;">
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="adminCareCategoryFilter">
                    <option value="all">All Categories</option>
                    <option value="shrub">Shrub</option>
                    <option value="herbs">Herbs</option>
                    <option value="palm">Palm</option>
                    <option value="tree">Tree</option>
                    <option value="grass">Grass</option>
                    <option value="bamboo">Bamboo</option>
                    <option value="fertilizer">Fertilizer</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="adminCareStatusFilter">
                    <option value="all">All Status</option>
                    <option value="complete">Has Care Info</option>
                    <option value="missing">Missing Care Info</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Plants Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" id="adminCarePlantsGrid">
        @forelse($plants as $plant)
        <div class="col admin-care-plant-item" 
             data-category="{{ $plant->category }}" 
             data-name="{{ strtolower($plant->name) }}"
             data-status="{{ $plant->has_care_info ? 'complete' : 'missing' }}">
            <div class="admin-plant-card">
                <div class="card-img-container">
                    @if($plant->photo_path)
                        <img src="{{ asset('storage/' . $plant->photo_path) }}" alt="{{ $plant->name }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-leaf fa-3x text-muted"></i>
                        </div>
                    @endif
                    
                    <!-- Care Status Badge -->
                    @if($plant->has_care_info)
                        <span class="status-badge status-complete">
                            <i class="fas fa-check-circle"></i> Complete
                        </span>
                    @else
                        <span class="status-badge status-missing">
                            <i class="fas fa-exclamation-triangle"></i> Missing
                        </span>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $plant->name }}</h5>
                    <div class="scientific-name-container">
                        @if($plant->scientific_name)
                            <p class="scientific-name">{{ $plant->scientific_name }}</p>
                        @endif
                    </div>
                    <div class="mb-2">
                        <span class="category-badge">{{ ucfirst($plant->category) }}</span>
                        @if($plant->code)
                            <span class="code-badge">{{ $plant->code }}</span>
                        @endif
                    </div>
                    
                    <!-- Care Info Badges -->
                    @if($plant->has_care_info)
                        <div class="care-preview-badges mt-2">
                            @if($plant->care_watering)
                                <span class="badge bg-primary bg-opacity-10 text-primary me-1 mb-1">
                                    <i class="fas fa-tint"></i> Watering
                                </span>
                            @endif
                            @if($plant->care_sunlight)
                                <span class="badge bg-warning bg-opacity-10 text-warning me-1 mb-1">
                                    <i class="fas fa-sun"></i> Sunlight
                                </span>
                            @endif
                            @if($plant->care_soil)
                                <span class="badge bg-success bg-opacity-10 text-success me-1 mb-1">
                                    <i class="fas fa-seedling"></i> Soil
                                </span>
                            @endif
                            @if($plant->care_temperature)
                                <span class="badge bg-danger bg-opacity-10 text-danger me-1 mb-1">
                                    <i class="fas fa-thermometer-half"></i> Temp
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('plant-care.edit', ['id' => $plant->id, 'from' => 'admin']) }}" class="edit-care-btn">
                        <i class="fas fa-edit me-2"></i>{{ $plant->has_care_info ? 'Edit' : 'Add' }} Care Info
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info border-0 shadow-sm" style="border-radius: 15px;">
                <i class="fas fa-info-circle"></i> No plants available yet.
            </div>
        </div>
        @endforelse
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('adminCareSearchInput');
    const categoryFilter = document.getElementById('adminCareCategoryFilter');
    const statusFilter = document.getElementById('adminCareStatusFilter');
    const plantItems = document.querySelectorAll('.admin-care-plant-item');
    
    function filterPlants() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value;
        const selectedStatus = statusFilter.value;
        
        plantItems.forEach(item => {
            const plantName = item.getAttribute('data-name');
            const plantCategory = item.getAttribute('data-category');
            const plantStatus = item.getAttribute('data-status');
            
            const matchesSearch = plantName.includes(searchTerm);
            const matchesCategory = selectedCategory === 'all' || plantCategory === selectedCategory;
            const matchesStatus = selectedStatus === 'all' || plantStatus === selectedStatus;
            
            item.style.display = (matchesSearch && matchesCategory && matchesStatus) ? '' : 'none';
        });
    }
    
    searchInput.addEventListener('input', filterPlants);
    categoryFilter.addEventListener('change', filterPlants);
    statusFilter.addEventListener('change', filterPlants);
});
</script>
@endsection
