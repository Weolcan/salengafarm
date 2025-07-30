@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Salenga Farm</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}?v=3" rel="stylesheet">
    <link href="{{ asset('css/plant-selection.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Early script to ensure clean state -->
    <script>
        // Run this immediately to clean up any previous selection state
        (function() {
            // Remove selection mode class
            if (document.body) {
                document.body.classList.remove('plant-selection-mode');
            }

            // Make sure CSS is fresh by adding a random query param to the URL
            document.querySelectorAll('link[href*="public.css"]').forEach(link => {
                const url = new URL(link.href);
                url.searchParams.set('v', Date.now());
                link.href = url.toString();
            });

            console.log('Early cleanup script executed');
        })();

        // Add scrollToContent function
        function scrollToContent() {
            // First, add the hidden class to the splash page to trigger its animation
            const splashPage = document.getElementById('splashPage');
            if (splashPage) {
                splashPage.classList.add('hidden');
            }
            
            // Then, scroll to the main content
            const contentSection = document.querySelector('.container-fluid');
            if (contentSection) {
                setTimeout(() => {
                    contentSection.scrollIntoView({ behavior: 'smooth' });
                }, 300); // Small delay to let the animation start
            }
        }
    </script>
    <style>
        /* RFQ Form Table Styles */
        #rfqFormModal .modal-dialog {
            max-width: 90%;
            margin: 1.75rem auto;
        }

        #rfqFormModal .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }

        #rfqFormModal .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        #rfqFormModal .table-bordered {
            border: 1px solid #dee2e6;
        }

        #rfqFormModal .table th,
        #rfqFormModal .table td {
            padding: 0.5rem;
            vertical-align: middle;
            border: 1px solid #dee2e6;
        }

        #rfqFormModal .table thead th {
            vertical-align: middle;
            background-color: #f8f9fa;
            font-weight: 500;
            text-align: center;
            border-bottom: 2px solid #dee2e6;
        }

        #rfqFormModal .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        #rfqFormModal .form-control-sm {
            height: calc(1.5em + 0.5rem + 2px);
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
            width: 100%;
        }

        #rfqFormModal .section {
            margin-bottom: 1.5rem;
        }

        /* Extra styles for the modal form inputs */
        #modalRequestForm input[type="text"],
        #modalRequestForm input[type="email"],
        #modalRequestForm input[type="number"] {
            padding: 10px;
            font-size: 16px;
            height: auto;
        }

        #modalSelectedPlantsTable th,
        #modalSelectedPlantsTable td {
            padding: 12px 10px;
            vertical-align: middle;
        }

        #modalSelectedPlantsTable input {
            padding: 8px;
            width: 100%;
        }

        /* Make quantity input wider */
        #modalSelectedPlantsTable input[name*="quantity"] {
            min-width: 80px;
        }

        /* Make measurement inputs wider */
        #modalSelectedPlantsTable input[name*="height"],
        #modalSelectedPlantsTable input[name*="spread"],
        #modalSelectedPlantsTable input[name*="spacing"] {
            min-width: 100px;
        }
    </style>
    <style>
        .menu-btn {
            font-size: 0.98rem;
            font-weight: 500;
            color: #fff;
            background: transparent;
            border: none;
            outline: none;
            box-shadow: none;
        }
        .menu-btn:focus, .menu-btn:hover {
            color: #e0e0e0;
            background: #259d4e22;
        }
        .profile-btn {
            font-size: 0.98rem;
            min-width: 0;
            padding: 2px 8px;
        }
        .profile-pic, .profile-pic-placeholder {
            width: 28px !important;
            height: 28px !important;
            border-radius: 50%;
            object-fit: cover;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
    </style>
    <style>
        .compact-dropdown .dropdown-item {
            font-size: 0.95rem !important;
            padding: 6px 14px !important;
        }
        .compact-dropdown .dropdown-divider {
            margin: 4px 0 !important;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/salengap-modified.png') }}" alt="Salenga Logo" class="nav-logo">
                <span class="brand-text">Salenga Farm</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="navbar-collapse-inner d-flex align-items-center justify-content-end w-100">
                    <div class="user-section d-flex align-items-center">
                    @auth
                        @if(auth()->user()->hasAdminAccess())
                            <div class="dropdown me-2">
                                <button class="btn btn-link dropdown-toggle menu-btn px-3 py-1" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.98rem; font-weight: 500;">
                                    <i class="fas fa-bars me-1"></i>Menu
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('plants.index') }}"><i class="fas fa-seedling me-2"></i>Inventory</a></li>
                                    <li><a class="dropdown-item" href="{{ route('requests.index') }}"><i class="fas fa-envelope-open-text me-2"></i>Request</a></li>
                                    <li><a class="dropdown-item" href="{{ route('walk-in.index') }}"><i class="fas fa-cash-register me-2"></i>Point-of-Sale</a></li>
                                    <li><a class="dropdown-item" href="/site-visits"><i class="fas fa-map-marked-alt me-2"></i>Site Visits</a></li>
                        @if(auth()->user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users-cog me-2"></i>Users</a></li>
                        @endif
                </ul>
                            </div>
                            @endif
                    <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle profile-btn px-2 py-1" type="button" id="profileDropdown" data-bs-toggle="dropdown" style="font-size: 0.98rem; min-width: 0;">
                                @if(auth()->user() && auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile" class="profile-pic" style="width: 28px; height: 28px;">
                            @else
                                    <div class="profile-pic-placeholder" style="width: 28px; height: 28px; font-size: 1.2rem;">
                                        <i class="fas fa-user"></i>
                                </div>
                            @endif
                                <span style="font-size: 0.98rem;">{{ auth()->user() ? auth()->user()->name : 'Profile' }}</span>
                        </button>
                            <ul class="dropdown-menu dropdown-menu-end compact-dropdown" style="min-width: 150px;">
                            <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}" style="font-size: 0.95rem; padding: 6px 14px;">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                            </li>
                                <li><hr class="dropdown-divider" style="margin: 4px 0;"></li>
                            <li>
                                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                    @csrf
                                        <button type="submit" class="dropdown-item" style="font-size: 0.95rem; padding: 6px 14px;">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                            <i class="fas fa-user me-1"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-light">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    @endguest
                </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content structure -->
    <div class="main-content">
        <!-- Splash Page Content -->
    <div class="splash-page" id="splashPage">
                <div class="splash-content">
            <h1 class="display-4">Welcome to Salenga Farm</h1>
            <p class="lead">Discover our wide range of available plants</p>
            <button class="scroll-down-btn" onclick="scrollToContent()">
                <i class="fas fa-chevron-down"></i>
                Explore Plants
            </button>
        </div>
    </div>

        <!-- Marquee Container without any margin -->
        <div class="marquee-container">
        <div class="marquee">
            <div class="marquee-content">
                <img src="{{ asset('images/plantpic/bamboo-p.jpg') }}" alt="Bamboo" class="marquee-img">
                <img src="{{ asset('images/plantpic/fertilizer-p.jpg') }}" alt="Fertilizer" class="marquee-img">
                <img src="{{ asset('images/plantpic/grass-p.jpg') }}" alt="Grass" class="marquee-img">
                <img src="{{ asset('images/plantpic/herbs-pp.jpg') }}" alt="Herbs" class="marquee-img">
                <img src="{{ asset('images/plantpic/palm-pp.jpg') }}" alt="Palm" class="marquee-img">
                <img src="{{ asset('images/plantpic/shrubs-p.jpg') }}" alt="Shrubs" class="marquee-img">
                <img src="{{ asset('images/plantpic/tree-p.jpg') }}" alt="Tree" class="marquee-img">
            </div>
            <!-- Duplicate content for seamless scrolling -->
            <div class="marquee-content">
                <img src="{{ asset('images/plantpic/bamboo-p.jpg') }}" alt="Bamboo" class="marquee-img">
                <img src="{{ asset('images/plantpic/fertilizer-p.jpg') }}" alt="Fertilizer" class="marquee-img">
                <img src="{{ asset('images/plantpic/grass-p.jpg') }}" alt="Grass" class="marquee-img">
                <img src="{{ asset('images/plantpic/herbs-pp.jpg') }}" alt="Herbs" class="marquee-img">
                <img src="{{ asset('images/plantpic/palm-pp.jpg') }}" alt="Palm" class="marquee-img">
                <img src="{{ asset('images/plantpic/shrubs-p.jpg') }}" alt="Shrubs" class="marquee-img">
                <img src="{{ asset('images/plantpic/tree-p.jpg') }}" alt="Tree" class="marquee-img">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid py-5">
        <div class="row">
            <!-- Left sidebar with category filter -->
            <div class="col-md-3">
                <div class="category-filter-box">
                    <h5 class="filter-title mb-3">Category Filter</h5>
                    <div class="category-grid">
                        <div class="category-icon-item active" data-category="all">
                            <div class="icon-circle active">
                                <i class="fas fa-border-all"></i>
                            </div>
                            <span>All</span>
                        </div>
                        <div class="category-icon-item" data-category="shrub">
                            <img src="{{ asset('images/categories/shrub-g.png') }}" alt="Shrub" class="category-img">
                            <span>Shrub</span>
                        </div>
                        <div class="category-icon-item" data-category="herbs">
                            <img src="{{ asset('images/categories/herbs-g.png') }}" alt="Herbs" class="category-img">
                            <span>Herbs</span>
                        </div>
                        <div class="category-icon-item" data-category="palm">
                            <img src="{{ asset('images/categories/palm-g.png') }}" alt="Palm" class="category-img">
                            <span>Palm</span>
                        </div>
                        <div class="category-icon-item" data-category="tree">
                            <img src="{{ asset('images/categories/tree-g.png') }}" alt="Tree" class="category-img">
                            <span>Tree</span>
                        </div>
                        <div class="category-icon-item" data-category="grass">
                            <img src="{{ asset('images/categories/grass-g.png') }}" alt="Grass" class="category-img">
                            <span>Grass</span>
                        </div>
                        <div class="category-icon-item" data-category="bamboo">
                            <img src="{{ asset('images/categories/bamboo-g.png') }}" alt="Bamboo" class="category-img">
                            <span>Bamboo</span>
                        </div>
                        <div class="category-icon-item" data-category="fertilizer">
                            <img src="{{ asset('images/categories/fertilizer-g.png') }}" alt="Fertilizer" class="category-img">
                            <span>Fertilizer</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content area with search and plants grid -->
            <div class="col-md-9">
                <!-- Search bar -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search plants..." autocomplete="off">
                </div>
            </div>
            <div class="col-md-6 text-end search-controls-container">
                    @if(Auth::check() && Auth::user()->hasAdminAccess())
                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addPlantModal">
                    <i class="fas fa-plus me-1"></i>Add New Plant
                </button>
                    @endif

                    @if(Auth::check() && Auth::user()->hasClientAccess())
                    <!-- Client RFQ button -->
                    <button class="btn btn-success me-2" id="requestPlantsBtn">
                        <i class="fas fa-file-invoice me-1"></i>Request for Quotation (RFQ)
                </button>
                    @else
                    <!-- No longer needed button - removed -->
                    @endif
            </div>
        </div>

        <!-- Plants Grid -->
        <div class="row row-cols-1 row-cols-md-4 g-4" id="plantsGrid">
            @foreach($plants as $plant)
            <div class="col plant-item" data-category="{{ $plant->category }}" data-name="{{ $plant->name }}">
                        @if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'manager'))
                            <!-- Admin/Manager View -->
                            <div class="card admin-plant-card">
                                <div class="card-body p-0">
                                    <!-- Main View (Always Visible) -->
                                    <div class="plant-main-view">
                                        <div class="plant-header d-flex justify-content-between align-items-center p-3">
                                            <h5 class="card-title mb-0">{{ $plant->name }}</h5>
                                            <div class="info-icon">
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                        </div>

                                        <!-- Photo Display -->
                                        <div class="plant-image-container">
                                            @if($plant->photo_path)
                                                <img src="{{ asset('storage/' . $plant->photo_path) }}" alt="{{ $plant->name }}" class="plant-main-photo">
                                            @else
                                                <div class="no-photo-placeholder">
                                                    <i class="fas fa-image"></i>
                                                    <p class="small">No Photo Available</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Sliding Details Panel -->
                                    <div class="plant-details-panel">
                                        <!-- Add back button in the header -->
                                        <div class="details-header d-flex justify-content-between align-items-center p-3 border-bottom text-white">
                                            <button class="btn btn-sm btn-link back-to-main" onclick="toggleAdminDetails(this)">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <h6 class="mb-0">Plant Details</h6>
                                        </div>

                                        <!-- Admin Controls -->
                                        <div class="admin-controls p-3 border-bottom">
                                            <button class="btn btn-sm delete-plant-btn"
                                                    data-plant-id="{{ $plant->id }}"
                                                    data-plant-name="{{ $plant->name }}">
                                                <i class="fas fa-trash"></i> Delete Plant
                                            </button>
                                            <button class="btn btn-sm manage-photo-btn"
                                                    data-plant-id="{{ $plant->id }}"
                                                    data-photo-path="{{ $plant->photo_path }}"
                                                    type="button">
                                                <i class="fas fa-camera"></i> Manage Photo
                                            </button>
                                        </div>

                                        <!-- Plant Information -->
                                        <div class="p-3">
                                            <div class="info-section text-white">
                                                <div class="section-content">
                                                    <p><small class="text-muted">Category:</small> <span class="value-text">{{ ucfirst($plant->category) }}</span></p>
                                                    <p><small class="text-muted">Code:</small> <span class="value-text">{{ $plant->code ?? 'N/A' }}</span></p>
                                                    @if($plant->scientific_name)
                                                        <p><small class="text-muted">Scientific Name:</small> <em class="value-text">{{ $plant->scientific_name }}</em></p>
                                                    @endif
                                                    @if($plant->height_mm || $plant->spread_mm || $plant->spacing_mm)
                                                        <div class="measurements mt-2">
                                                            <ul class="list-unstyled mb-0">
                            @if($plant->height_mm)
                                                                    <li><small class="text-muted">Height:</small> <span class="value-text">{{ $plant->height_mm }} mm</span></li>
                            @endif
                            @if($plant->spread_mm)
                                                                    <li><small class="text-muted">Spread:</small> <span class="value-text">{{ $plant->spread_mm }} mm</span></li>
                            @endif
                            @if($plant->spacing_mm)
                                                                    <li><small class="text-muted">Spacing:</small> <span class="value-text">{{ $plant->spacing_mm }} mm</span></li>
                            @endif
                        </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- User View -->
                            <div class="card user-plant-card">
                                <div class="card-body p-0">
                                    <!-- Main View (Always Visible) -->
                                    <div class="plant-main-view">
                                        <div class="plant-header d-flex justify-content-between align-items-center p-3">
                                            <h5 class="card-title mb-0">{{ $plant->name }}</h5>
                                            <div class="info-icon">
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                        </div>

                                        <!-- Photo Display -->
                                        <div class="plant-image-container">
                                            @if($plant->photo_path)
                                                <img src="{{ asset('storage/' . $plant->photo_path) }}" alt="{{ $plant->name }}" class="plant-main-photo">
                                            @else
                                                <div class="no-photo-placeholder">
                                                    <i class="fas fa-image"></i>
                                                    <p class="small">No Photo Available</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Sliding Details Panel -->
                                    <div class="plant-details-panel">
                                        <!-- Back Button Header -->
                                        <div class="details-header d-flex justify-content-between align-items-center p-3 border-bottom text-white">
                                            <button type="button" class="btn btn-sm btn-link back-to-main" onclick="toggleUserDetails(this)">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <h6 class="mb-0">Plant Details</h6>
                                        </div>

                                        <!-- Plant Information -->
                                        <div class="p-3">
                                            <div class="info-section text-white">
                                                <div class="section-content">
                                                    <p><small class="text-muted">Category:</small> <span class="value-text">{{ ucfirst($plant->category) }}</span></p>
                                                    <p><small class="text-muted">Code:</small> <span class="value-text">{{ $plant->code ?? 'N/A' }}</span></p>
                                                    @if($plant->scientific_name)
                                                        <p><small class="text-muted">Scientific Name:</small> <em class="value-text">{{ $plant->scientific_name }}</em></p>
                                                    @endif

                                                    <div class="measurements mt-2">
                                                        <ul class="list-unstyled mb-0">
                                                            @if(Auth::check() && (Auth::user()->role === 'user' || Auth::user()->role === 'manager' || Auth::user()->role === 'admin'))
                                                                <!-- For logged-in users - editable fields -->
                                                                <li class="d-flex align-items-center mb-1">
                                                                    <label class="text-muted mb-0" style="width: 60px; flex-shrink: 0">Height:</label>
                                                                    <div class="input-group input-group-sm" style="width: calc(100% - 70px);">
                                                                        <input type="number" class="form-control form-control-sm editable-measurement"
                                                                               data-field="height"
                                                                               data-original="{{ $plant->height_mm }}"
                                                                               value="{{ $plant->height_mm }}" min="0"
                                                                               style="color: #000 !important; background-color: #fff !important;">
                                                                        <div class="input-group-text" style="color: #000 !important; background-color: #e9ecef !important;">mm</div>
                                                                    </div>
                                                                </li>
                                                                <li class="d-flex align-items-center mb-1">
                                                                    <label class="text-muted mb-0" style="width: 60px; flex-shrink: 0">Spread:</label>
                                                                    <div class="input-group input-group-sm" style="width: calc(100% - 70px);">
                                                                        <input type="number" class="form-control form-control-sm editable-measurement"
                                                                               data-field="spread"
                                                                               data-original="{{ $plant->spread_mm }}"
                                                                               value="{{ $plant->spread_mm }}" min="0"
                                                                               style="color: #000 !important; background-color: #fff !important;">
                                                                        <div class="input-group-text" style="color: #000 !important; background-color: #e9ecef !important;">mm</div>
                                                                    </div>
                                                                </li>
                                                                <li class="d-flex align-items-center">
                                                                    <label class="text-muted mb-0" style="width: 60px; flex-shrink: 0">Spacing:</label>
                                                                    <div class="input-group input-group-sm" style="width: calc(100% - 70px);">
                                                                        <input type="number" class="form-control form-control-sm editable-measurement"
                                                                               data-field="spacing"
                                                                               data-original="{{ $plant->spacing_mm }}"
                                                                               value="{{ $plant->spacing_mm }}" min="0"
                                                                               style="color: #000 !important; background-color: #fff !important;">
                                                                        <div class="input-group-text" style="color: #000 !important; background-color: #e9ecef !important;">mm</div>
                                                                    </div>
                                                                </li>
                                                            @else
                                                                <!-- For guests - non-editable display -->
                                                                @if($plant->height_mm)
                                                                    <li class="d-flex align-items-center">
                                                                        <small class="text-muted" style="width: 60px; flex-shrink: 0">Height:</small>
                                                                        <span class="value-text">{{ $plant->height_mm }} mm</span>
                                                                    </li>
                                                                @endif
                                                                @if($plant->spread_mm)
                                                                    <li class="d-flex align-items-center">
                                                                        <small class="text-muted" style="width: 60px; flex-shrink: 0">Spread:</small>
                                                                        <span class="value-text">{{ $plant->spread_mm }} mm</span>
                                                                    </li>
                                                                @endif
                                                                @if($plant->spacing_mm)
                                                                    <li class="d-flex align-items-center">
                                                                        <small class="text-muted" style="width: 60px; flex-shrink: 0">Spacing:</small>
                                                                        <span class="value-text">{{ $plant->spacing_mm }} mm</span>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        </ul>
                                                    </div>

                                                    <!-- Action buttons section -->
                                                    <div class="action-controls mt-3">
                                                        @if(Auth::check() && (Auth::user()->role === 'user' || Auth::user()->role === 'manager' || Auth::user()->role === 'admin'))
                                                            <!-- For logged-in users - Add/Remove Plant button -->
                                                            <button type="button" class="btn btn-sm plant-action-btn"
                                                                    data-plant-id="{{ $plant->id }}"
                                                                    data-plant-name="{{ $plant->name }}"
                                                                    data-plant-code="{{ $plant->code }}"
                                                                    data-action="add">
                                                                <i class="fas fa-plus"></i> Add Plant
                                                            </button>
                                                        @else
                                                            <!-- For guests - Login prompt -->
                                                            <div class="login-prompt">
                                                                <a href="{{ route('login') }}" class="text-white">
                                                                    <i class="fas fa-sign-in-alt"></i> Want to order? Let's log you in first.
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
            </div>
            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this modal for admin/manager -->
    <div class="modal fade" id="addPlantModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Plant to Display</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Add Select Plant Dropdown -->
                    <div class="mb-3">
                        <label class="form-label">Select Plant from Inventory</label>
                        <div class="search-container position-relative">
                            <input type="text" class="form-control form-control-sm" id="plantSearchInput" placeholder="Search plants..." autocomplete="off">
                            <div id="searchResults" class="search-results d-none position-absolute w-100 bg-white border rounded shadow">
                                <!-- Results will be populated here -->
                            </div>
                        </div>
                    </div>

                    <form id="addPlantForm">
                        <!-- Existing form fields -->
                        <div class="mb-3">
                            <label class="form-label">Plant Name</label>
                            <input type="text" class="form-control" id="plantName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" class="form-control" id="plantCode">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Scientific Name</label>
                            <input type="text" class="form-control" id="scientificName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-control" id="category" required>
                                <option value="shrub">Shrub</option>
                                <option value="herbs">Herbs</option>
                                <option value="palm">Palm</option>
                                <option value="tree">Tree</option>
                                <option value="grass">Grass</option>
                                <option value="bamboo">Bamboo</option>
                                <option value="fertilizer">Fertilizer</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Height (mm)</label>
                                    <input type="number" class="form-control" id="heightMm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Spread (mm)</label>
                                    <input type="number" class="form-control" id="spreadMm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Spacing (mm)</label>
                                    <input type="number" class="form-control" id="spacingMm">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveNewPlant">Add Plant</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo Management Modal -->
    <div class="modal fade" id="photoManageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Plant Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="photoUploadForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="photoPlantId" name="plant_id">
                        <div class="current-photo mb-3 text-center">
                            <img id="currentPhoto" src="" alt="" class="img-fluid mb-2 d-none">
                            <div id="noPhotoPlaceholder" class="no-photo-placeholder mb-2">
                                <i class="fas fa-image"></i>
                                <p class="small">No photo available</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload New Photo</label>
                            <input type="file" class="form-control" id="plantPhoto" name="photo" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="removePhoto">Remove Photo</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="savePhoto">Upload Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Plants Modal -->
    <div class="modal fade" id="requestPlantsModal" tabindex="-1" aria-labelledby="requestPlantsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="requestPlantsModalLabel">Request for Quotation (RFQ)</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
                <div class="modal-body">
                    <p>Please provide your email address to continue with your plant quotation request.</p>
                    <div class="mb-3">
                        <label for="requestEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="requestEmail" placeholder="your@email.com"
                            @auth value="{{ auth()->user()->email }}" @endauth>
                        <div class="form-text">We'll send you updates about your quotation request to this email.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="selectPlantsBtn">Select Plants</button>
                </div>
            </div>
        </div>
    </div>

    <!-- RFQ Form Modal -->
    <div class="modal fade" id="rfqFormModal" tabindex="-1" aria-labelledby="rfqFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="rfqFormModalLabel">
                        <i class="fas fa-file-invoice me-2"></i>Request for Quotation (RFQ)
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div id="rfqFormContainer" class="rfq-form-container">
                        <!-- RFQ Form Content -->
                        <div class="text-center mb-4">
                            <h2>SALENGA FARM</h2>
                            <h3>REQUEST FOR QUOTATION (RFQ)</h3>
                        </div>

                        <div class="row mb-4">
                        <!-- Vendor Information Section -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">VENDOR INFORMATION</h5>
                                    </div>
                                    <div class="card-body">
                            <table class="table table-no-border">
                                <tr>
                                    <td class="fw-bold" style="width:100px;">Company:</td>
                                    <td>
                                        ESTHER LIBRES SALENGA ESTHER'S<br>
                                        FLOWER GARDEN AND LANDSCAPING
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Address:</td>
                                    <td>
                                        INFRONT OF FATIMA VILLAGE SITIO<br>
                                        MCL.DAVAO CITY.PH
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">TIN:</td>
                                    <td>47496058600000</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">E-mail:</td>
                                    <td>salengafarm@example.com</td>
                                </tr>
                            </table>
                                    </div>
                                </div>
                        </div>

                        <!-- RFQ Details Section -->
                                <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">REQUEST DETAILS</h5>
                                </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                <div class="col-md-6">
                                                <p class="mb-1"><strong>RFQ Date:</strong></p>
                                                <p id="rfqDate" class="mb-3"></p>
                                </div>
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>RFQ Due Date:</strong></p>
                                                <p id="rfqDueDate" class="mb-3"></p>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-6">
                                                <p class="mb-1"><strong>Buyer Name:</strong></p>
                                                <p id="buyerName" class="mb-0"></p>
                                </div>
                                <div class="col-md-6">
                                                <p class="mb-1"><strong>Buyer Email:</strong></p>
                                                <p id="buyerEmail" class="mb-0"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Items Table -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">REQUESTED PLANTS</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class="table-light">
                                    <tr>
                                                <th class="text-center" style="width: 40px;">#</th>
                                                <th class="text-center" style="width: 60px;">Qty</th>
                                                <th style="min-width: 150px;">Plant Name</th>
                                                <th style="width: 80px;">Code</th>
                                                <th class="text-center" style="width: 70px;">H(mm)</th>
                                                <th class="text-center" style="width: 70px;">S(mm)</th>
                                                <th class="text-center" style="width: 70px;">Sp(mm)</th>
                                                <th style="width: 120px;">Remarks</th>
                                                <th class="text-center" style="width: 90px;">Unit ₱</th>
                                                <th class="text-center" style="width: 90px;">Total ₱</th>
                                                <th class="text-center" style="width: 80px;">Avail.</th>
                                    </tr>
                                </thead>
                                <tbody id="rfqItemsTable">
                                    <!-- Items will be populated dynamically -->
                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>

                        <!-- Vendor Instructions -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">VENDOR INSTRUCTIONS</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-0">Specify brand/made and availability or quotation will not be honored. Vendor's proposal in response to this RFQ do not need to submit such documentation as part of this RFQ.</p>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">TERMS AND CONDITIONS</h5>
                            </div>
                            <div class="card-body">
                                <ol class="mb-0">
                                <li>Please provide your best quotation for the items listed above.</li>
                                <li>Quotation should include pricing, availability, and delivery timeline.</li>
                                <li>All prices should be valid for at least 30 days from the date of quotation.</li>
                                <li>Please respond to this RFQ by the due date indicated.</li>
                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="submitRequest">
                        <i class="fas fa-paper-plane me-1"></i>Send Request
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay d-none">
        <div class="spinner-container">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
                    </div>
            <p class="text-light mt-3">Processing your request...</p>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Request Submitted</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                <div class="modal-body text-center">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                                </div>
                    <div class="success-message">
                        Your request has been submitted successfully!
                    </div>
                    <p>We'll process your request shortly and send a response to your email address.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue Browsing</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Form Modal -->
    <div class="modal fade" id="requestFormModal" tabindex="-1" aria-labelledby="requestFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl extra-wide-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestFormModalLabel">Plant Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> You can request up to 20 plants. Adjust quantities and measurements as needed.
                    </div>

                    <form id="modalRequestForm" method="POST" action="{{ route('request-form.store') }}">
                        @csrf

                        <!-- User Info Section -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modal_name">Your Name</label>
                                    <input type="text" class="form-control" id="modal_name" name="name"
                                        value="{{ auth()->check() ? auth()->user()->first_name . ' ' . auth()->user()->last_name : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modal_email">Email</label>
                                    <input type="email" class="form-control" id="modal_email" name="email"
                                        value="{{ auth()->check() ? auth()->user()->email : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="modal_contact_number">Contact Number</label>
                                    <input type="text" class="form-control" id="modal_contact_number" name="contact_number"
                                        value="{{ auth()->check() ? auth()->user()->contact_number : '' }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Selected Plants Table -->
                        <h5 class="mb-3">Selected Plants</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="modalSelectedPlantsTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Plant Name</th>
                                        <th>Code</th>
                                        <th style="width: 80px;">Qty</th>
                                        <th>Height (mm)</th>
                                        <th>Spread (mm)</th>
                                        <th>Spacing (mm)</th>
                                        <th style="width: 80px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="modalPlantsTableBody">
                                    <!-- Plants will be loaded here via JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <div id="modalEmptySelection" class="text-center py-4 d-none">
                            <i class="fas fa-leaf fa-3x text-muted mb-3"></i>
                            <p class="mb-0">No plants selected yet</p>
                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">
                                <i class="fas fa-search"></i> Browse Plants
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="modalSubmitButton">
                        <i class="fas fa-paper-plane"></i> Submit Request
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2024 All rights reserved.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/rfq.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>

    <!-- Remove any existing selection-related inline styles -->
    <style>
        .plant-selection-mode .admin-plant-card .selection-overlay,
        .plant-selection-mode .user-plant-card .selection-overlay {
            display: block !important;
            z-index: 999 !important;
        }

        .plant-selection-mode .selection-checkbox {
            z-index: 1000 !important;
            pointer-events: auto !important;
        }

        .plant-selection-mode .admin-plant-card.selected .selection-checkbox,
        .plant-selection-mode .user-plant-card.selected .selection-checkbox {
            background-color: #198754 !important;
        }

        .plant-selection-mode .admin-plant-card.selected .selection-checkbox i,
        .plant-selection-mode .user-plant-card.selected .selection-checkbox i {
            color: white !important;
        }

        /* Add styles to prevent text selection in search results */
        .search-result-item {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            cursor: pointer;
        }

        /* Add styles for card selection */
        .plant-selection-mode .admin-plant-card,
        .plant-selection-mode .user-plant-card {
            cursor: pointer;
            position: relative;
        }

        .plant-selection-mode .admin-plant-card.selected,
        .plant-selection-mode .user-plant-card.selected {
            border: 2px solid #198754;
        }

        .plant-selection-mode .admin-plant-card:hover,
        .plant-selection-mode .user-plant-card:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease;
        }
    </style>

    <!-- Direct script to fix selection counter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Direct selection counter script loaded');

            // Function to directly handle selection toggle
            function directToggleSelection(card, checkboxClicked = false) {
                // If not checkbox clicked, don't toggle selection (preserve details mode)
                if (!checkboxClicked) return;

                // Toggle the selected class
                card.classList.toggle('selected');

                // First, ensure the checkbox overlay exists
                let checkbox = card.querySelector('.selection-checkbox');
                if (!checkbox) {
                    // Create checkbox overlay if it doesn't exist
                    const overlay = document.createElement('div');
                    overlay.classList.add('selection-overlay');
                    overlay.style.position = 'absolute';
                    overlay.style.top = '0';
                    overlay.style.left = '0';
                    overlay.style.width = '100%';
                    overlay.style.height = '100%';
                    overlay.style.background = 'rgba(0,0,0,0.1)';
                    overlay.style.display = 'block';
                    overlay.style.zIndex = '999';
                    card.style.position = 'relative';
                    card.appendChild(overlay);

                    checkbox = document.createElement('div');
                    checkbox.classList.add('selection-checkbox');
                    checkbox.style.position = 'absolute';
                    checkbox.style.top = '10px';
                    checkbox.style.right = '10px';
                    checkbox.style.width = '34px';
                    checkbox.style.height = '34px';
                    checkbox.style.borderRadius = '50%';
                    checkbox.style.background = 'white';
                    checkbox.style.border = '2px solid #ddd';
                    checkbox.style.display = 'flex';
                    checkbox.style.alignItems = 'center';
                    checkbox.style.justifyContent = 'center';
                    checkbox.style.zIndex = '1000';
                    checkbox.style.pointerEvents = 'auto';
                    checkbox.style.cursor = 'pointer';
                    checkbox.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
                    checkbox.innerHTML = '<i class="fas fa-check" style="color: transparent; font-size: 18px;"></i>';
                    checkbox.style.display = document.body.classList.contains('plant-selection-mode') ? 'flex' : 'none';
                    card.appendChild(checkbox);
                }

                // Update checkbox visual state
                if (card.classList.contains('selected')) {
                    checkbox.style.backgroundColor = '#198754';
                    checkbox.style.border = '2px solid #198754';
                    checkbox.querySelector('i').style.color = 'white';

                    // Add border highlight - applied with !important
                    card.style.setProperty('border', '2px solid #198754', 'important');
                    card.style.setProperty('transform', 'scale(1.02)', 'important');
                } else {
                    checkbox.style.backgroundColor = 'white';
                    checkbox.style.border = '2px solid #ddd';
                    checkbox.querySelector('i').style.color = 'transparent';

                    // Remove border highlight - reset to default
                    card.style.removeProperty('border');
                    card.style.removeProperty('transform');
                }

                // Update counter immediately
                updateSelectionCounter();
            }

            // Function to update selection counter
            function updateSelectionCounter() {
                // Count selected plants
                const selectedCards = document.querySelectorAll('.admin-plant-card.selected, .user-plant-card.selected');
                const count = selectedCards.length;

                console.log('Selection counter update - Found ' + count + ' selected plants');

                // Find send plants button
                const sendBtn = document.getElementById('sendPlantsBtn');
                if (sendBtn) {
                    // Update button text and style
                    sendBtn.innerHTML = '<i class="fas fa-paper-plane me-1"></i>Send Plants (' + count + ')';

                    if (count > 0) {
                        sendBtn.disabled = false;
                        sendBtn.classList.remove('btn-secondary');
                        sendBtn.classList.add('btn-success');
                    } else {
                        sendBtn.disabled = true;
                        sendBtn.classList.remove('btn-success');
                        sendBtn.classList.add('btn-secondary');
                    }

                    console.log('Updated button:', sendBtn.innerHTML);
                }
            }

            // Override click handling for all cards when in selection mode
            function setupDirectSelectionHandling() {
                // Check every second if we need to add direct handlers
                setInterval(function() {
                    // Only if in selection mode and handlers not added yet
                    if (document.body.classList.contains('plant-selection-mode') &&
                        !document.body.hasAttribute('direct-handlers-added')) {

                        console.log('Adding direct selection handlers');
                        document.body.setAttribute('direct-handlers-added', 'true');

                        // Add styles to ensure consistency
                        const styleEl = document.createElement('style');
                        styleEl.textContent = `
                            .admin-plant-card, .user-plant-card {
                                position: relative !important;
                                border: 1px solid #dee2e6 !important;
                                border-radius: 0.375rem !important;
                                overflow: hidden !important;
                                transition: all 0.2s ease-in-out !important;
                            }
                            .admin-plant-card.featured, .user-plant-card.featured {
                                border-color: #28a745 !important;
                            }
                            .plant-selection-mode .selection-checkbox {
                                display: flex !important;
                                pointer-events: auto !important;
                                cursor: pointer !important;
                            }
                        `;
                        document.head.appendChild(styleEl);

                        // First, ensure all cards have proper styles and selectors
                        document.querySelectorAll('.admin-plant-card, .user-plant-card').forEach(function(card) {
                            // Ensure consistent border on all cards
                            card.style.setProperty('border', '1px solid #dee2e6', 'important');

                            // Create checkboxes on all cards for selection mode
                            const checkbox = document.createElement('div');
                            checkbox.classList.add('selection-checkbox');
                            checkbox.style.position = 'absolute';
                            checkbox.style.top = '10px';
                            checkbox.style.right = '10px';
                            checkbox.style.width = '34px';
                            checkbox.style.height = '34px';
                            checkbox.style.borderRadius = '50%';
                            checkbox.style.background = 'white';
                            checkbox.style.border = '2px solid #ddd';
                            checkbox.style.display = 'flex';
                            checkbox.style.alignItems = 'center';
                            checkbox.style.justifyContent = 'center';
                            checkbox.style.zIndex = '1000';
                            checkbox.style.pointerEvents = 'auto';
                            checkbox.style.cursor = 'pointer';
                            checkbox.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
                            checkbox.innerHTML = '<i class="fas fa-check" style="color: transparent; font-size: 18px;"></i>';
                            checkbox.style.display = document.body.classList.contains('plant-selection-mode') ? 'flex' : 'none';
                            card.appendChild(checkbox);

                            // Only checkbox should toggle selection, not card
                                checkbox.addEventListener('click', function(e) {
                                    if (!document.body.classList.contains('plant-selection-mode')) return;

                                    // Toggle selection of parent card
                                directToggleSelection(card, true);
                                    e.stopPropagation();

                                    console.log('Checkbox clicked, selection toggled');
                                });
                        });

                        // Initial counter update
                        updateSelectionCounter();
                    }

                    // If not in selection mode, remove the flag so handlers get added next time
                    if (!document.body.classList.contains('plant-selection-mode') &&
                        document.body.hasAttribute('direct-handlers-added')) {
                        document.body.removeAttribute('direct-handlers-added');

                        // Hide all checkboxes when not in selection mode
                        document.querySelectorAll('.selection-checkbox').forEach(function(checkbox) {
                            checkbox.style.display = 'none';
                        });
                    }
                }, 1000);
            }

            // Start the monitoring process
            setupDirectSelectionHandling();

            // Patch the Send Plants button to bypass the original handler
            setInterval(function() {
                const sendPlantsBtn = document.getElementById('sendPlantsBtn');
                if (sendPlantsBtn && !sendPlantsBtn.hasAttribute('direct-handler-added')) {
                    // Remove all existing event listeners by cloning
                    const newBtn = sendPlantsBtn.cloneNode(true);
                    sendPlantsBtn.parentNode.replaceChild(newBtn, sendPlantsBtn);

                    // Add our direct handler
                    newBtn.setAttribute('direct-handler-added', 'true');
                    newBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        // Create a global array of selected plants
                        window.selectedPlants = [];

                        // Get all selected plants
                        const selectedCards = document.querySelectorAll('.admin-plant-card.selected, .user-plant-card.selected');
                        console.log('Direct Send Plants button has', selectedCards.length, 'selected plants');

                        if (selectedCards.length === 0) {
                            alert('Please select at least one plant to continue.');
                            return;
                        }

                        // Build the plants array
                        selectedCards.forEach(function(card) {
                            // Basic plant info
                            const plantName = card.querySelector('.card-title')?.textContent?.trim() || 'Unknown Plant';
                            const plantId = card.getAttribute('data-id') || 'plant_' + Math.random().toString(36).substr(2, 9);

                            // Default values
                            let plantData = {
                                id: plantId,
                                name: plantName,
                                quantity: 1,
                                code: '',
                                height: '',
                                spread: '',
                                spacing: ''
                            };

                            // Try to extract details from the details panel
                            const detailsPanel = card.querySelector('.plant-details-panel');
                            if (detailsPanel) {
                                console.log('Found details panel for', plantName);

                                // Look for code
                                const codeElement = detailsPanel.querySelector('[data-field="code"]');
                                if (codeElement) {
                                    const text = codeElement.textContent.trim();
                                    const match = text.match(/Code:\s*(.*)/);
                                    if (match && match[1]) {
                                        plantData.code = match[1].trim();
                                    }
                                }

                                // Look for height
                                const heightElement = detailsPanel.querySelector('[data-field="height_mm"]');
                                if (heightElement) {
                                    const text = heightElement.textContent.trim();
                                    const match = text.match(/Height:\s*([0-9]+)/);
                                    if (match && match[1]) {
                                        plantData.height = match[1].trim();
                                    }
                                }

                                // Look for spread
                                const spreadElement = detailsPanel.querySelector('[data-field="spread_mm"]');
                                if (spreadElement) {
                                    const text = spreadElement.textContent.trim();
                                    const match = text.match(/Spread:\s*([0-9]+)/);
                                    if (match && match[1]) {
                                        plantData.spread = match[1].trim();
                                    }
                                }

                                // Look for spacing
                                const spacingElement = detailsPanel.querySelector('[data-field="spacing_mm"]');
                                if (spacingElement) {
                                    const text = spacingElement.textContent.trim();
                                    const match = text.match(/Spacing:\s*([0-9]+)/);
                                    if (match && match[1]) {
                                        plantData.spacing = match[1].trim();
                                    }
                                }

                                // Try alternative approach
                                const measurementItems = detailsPanel.querySelectorAll('.measurements li');
                                measurementItems.forEach(item => {
                                    const text = item.textContent.trim();

                                    if (text.includes('Height:') && !plantData.height) {
                                        const match = text.match(/Height:\s*([0-9]+)/);
                                        if (match && match[1]) {
                                            plantData.height = match[1].trim();
                                        }
                                    }

                                    if (text.includes('Spread:') && !plantData.spread) {
                                        const match = text.match(/Spread:\s*([0-9]+)/);
                                        if (match && match[1]) {
                                            plantData.spread = match[1].trim();
                                        }
                                    }

                                    if (text.includes('Spacing:') && !plantData.spacing) {
                                        const match = text.match(/Spacing:\s*([0-9]+)/);
                                        if (match && match[1]) {
                                            plantData.spacing = match[1].trim();
                                        }
                                    }
                                });

                                // Try super alternative approach for code
                                if (!plantData.code) {
                                    const allElements = detailsPanel.querySelectorAll('p, span, div');
                                    for (const element of allElements) {
                                        const text = element.textContent.trim();
                                        if (text.includes('Code:')) {
                                            const match = text.match(/Code:\s*(.*)/);
                                            if (match && match[1]) {
                                                plantData.code = match[1].trim();
                                                break;
                                            }
                                        }
                                    }
                                }
                            }

                            window.selectedPlants.push(plantData);
                        });

                        console.log('Selected plants for RFQ:', window.selectedPlants.length);

                        // Show loading overlay
                        const loadingOverlay = document.getElementById('loadingOverlay');
                        if (loadingOverlay) {
                            loadingOverlay.classList.remove('d-none');
                        }

                        // Get user info
                        const userEmail = document.getElementById('requestEmail')?.value || 'guest@example.com';
                        const userName = document.querySelector('.profile-btn span')?.textContent.trim() || 'Guest User';

                        // Process the request
                        setTimeout(function() {
                            // Hide loading overlay
                            if (loadingOverlay) {
                                loadingOverlay.classList.add('d-none');
                            }

                            // Show RFQ form modal
                            const rfqModal = new bootstrap.Modal(document.getElementById('rfqFormModal'));
                            rfqModal.show();

                            // Get today's date and date 2 weeks from now
                            const today = new Date();
                            const twoWeeksLater = new Date(today.getTime() + 14 * 24 * 60 * 60 * 1000);

                            // Format dates
                            const formatDate = function(date) {
                                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                                return date.toLocaleDateString('en-US', options);
                            };

                            // Populate the form
                            document.getElementById('rfqDate').textContent = formatDate(today);
                            document.getElementById('rfqDueDate').textContent = formatDate(twoWeeksLater);
                            document.getElementById('buyerName').textContent = userName;
                            document.getElementById('buyerEmail').textContent = userEmail;

                            // Fill the items table
                            const itemsTable = document.getElementById('rfqItemsTable');
                            itemsTable.innerHTML = '';

                            console.log(`Populating table with ${window.selectedPlants.length} plants`);

                            window.selectedPlants.forEach(function(plant, index) {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td class="text-center align-middle">${index + 1}</td>
                                    <td class="text-center">
                                        <input type="number" min="1" value="1" class="form-control form-control-sm"
                                            onchange="updatePlantTotalPrice(this)">
                                    </td>
                                    <td class="align-middle">${plant.name}</td>
                                    <td class="align-middle">${plant.code || ''}</td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm height-field">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm spread-field">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm spacing-field">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm remarks-field" placeholder="Add remarks">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm unit-price" value="" min="0" step="0.01"
                                            onchange="updatePlantTotalPrice(this)">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm total-price-input" value="" min="0" step="0.01">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="form-control form-control-sm">
                                    </td>
                                `;
                                itemsTable.appendChild(row);
                                console.log(`Added row ${index + 1} for ${plant.name}`);
                            });

                            // Make sure the table section scrolls to top
                            const tableSection = document.querySelector('#rfqFormModal .section:has(.table-bordered)');
                            if (tableSection) {
                                setTimeout(() => {
                                    tableSection.scrollTop = 0;
                                    console.log('Reset table scroll position');
                                }, 100);
                            }

                            // Add function to calculate total price
                            window.updatePlantTotalPrice = function(input) {
                                const row = input.closest('tr');
                                const quantity = parseFloat(row.querySelector('td:nth-child(2) input').value) || 0;
                                const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
                                const totalPrice = (quantity * unitPrice).toFixed(2);

                                // Update the total price input field if not manually edited
                                const totalPriceInput = row.querySelector('.total-price-input');
                                if (totalPriceInput && !totalPriceInput.hasAttribute('user-edited')) {
                                    totalPriceInput.value = totalPrice;
                                }
                            };

                            // Add event listener to flag when user manually edits total price
                            document.querySelectorAll('#rfqItemsTable .total-price-input').forEach((input) => {
                                input.addEventListener('input', function() {
                                    this.setAttribute('user-edited', 'true');
                                });
                            });

                            // Reset selection mode
                            document.body.classList.remove('plant-selection-mode');

                            // Remove selection bar
                            const selectionBar = document.getElementById('selectionBar');
                            if (selectionBar) {
                                selectionBar.remove();
                            }

                            // Restore original search controls
                            const searchControlsContainer = document.querySelector('.search-controls-container');
                            if (searchControlsContainer) {
                                const originalContent = searchControlsContainer.getAttribute('data-original-content');
                                if (originalContent) {
                                    searchControlsContainer.innerHTML = originalContent;

                                    // Re-attach event listener to the Request Plants button
                                    const requestPlantsBtn = document.getElementById('requestPlantsBtn');
                                    if (requestPlantsBtn) {
                                        requestPlantsBtn.addEventListener('click', function() {
                                            const modal = document.getElementById('requestPlantsModal');
                                            if (modal) {
                                                const modalInstance = new bootstrap.Modal(modal);
                                                modalInstance.show();
                                            }
                                        });
                                    }
                                }
                            }

                            // Remove selected class from all cards
                            document.querySelectorAll('.admin-plant-card.selected, .user-plant-card.selected').forEach(card => {
                                card.classList.remove('selected');
                            });

                            // Remove all selection overlays
                            document.querySelectorAll('.selection-overlay').forEach(overlay => {
                                overlay.remove();
                            });

                            // Add event listener for submit button
                            document.getElementById('submitRequest').addEventListener('click', function() {
                                // Show loading state
                                const submitBtn = this;
                                const originalText = submitBtn.innerHTML;
                                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
                                submitBtn.disabled = true;

                                // Prepare request data
                        const requestData = {
                            email: userEmail,
                            name: userName,
                                    items_json: JSON.stringify(window.selectedPlants.map(plant => ({
                                        name: plant.name,
                                        quantity: plant.quantity || '',
                                        unit_price: plant.unit_price || '',
                                        total_price: plant.total_price || '',
                                        remarks: plant.remarks || ''
                                    })))
                        };

                                // Send request
                        fetch('/client-request', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify(requestData)
                        })
                        .then(response => response.json())
                        .then(data => {
                                    if (data.message) {
                                        // Close the RFQ modal
                            const rfqModal = bootstrap.Modal.getInstance(document.getElementById('rfqFormModal'));
                                rfqModal.hide();

                                        // Show success message popup
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Request Submitted!',
                                            html: `
                                                <div class="text-center mb-3">
                                                    <p>Your request has been submitted successfully!</p>
                                                    <p>Request ID: <strong>${data.request_id}</strong></p>
                                                    <p>We'll process your request shortly and send a response to your email address.</p>
                                                </div>
                                            `,
                                            confirmButtonText: 'Continue Browsing',
                                            confirmButtonColor: '#198754'
                                        });
                                    }
                        })
                        .catch(error => {
                                    console.error('Error:', error);
                                    // Show error message
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'An error occurred while submitting your request. Please try again.'
                                    });
                                })
                                .finally(() => {
                                    // Reset button state
                                    submitBtn.innerHTML = originalText;
                                    submitBtn.disabled = false;
                                });
                        });
                        }, 1000);
                    });

                    console.log('Added direct handler to Send Plants button');
                }
            }, 1000);
        });
    </script>

    <!-- Hidden auth check element for JavaScript -->
    @auth
        <div data-auth-check="true" style="display: none;"></div>
        @if(Auth::user()->hasClientAccess())
            <div data-user-role="client" style="display: none;"></div>
        @endif
    @endauth
</body>
</html>