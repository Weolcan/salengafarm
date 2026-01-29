<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Salenga Farm') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tree-leaf.ico') }}?v={{ time() }}">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="{{ asset('css/loading.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('css/push-notifications.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
    <!-- Shared public styles (navbar/buttons) to match Home page -->
    <link href="{{ asset('css/public.css') }}?v=3" rel="stylesheet">
    <!-- <link href="{{ asset('css/plant-details.css') }}?v={{ rand(1000,9999) . time() }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/plant-details-fix.css') }}?v={{ rand(1000,9999) . time() }}" rel="stylesheet"> -->
    @stack('styles')
    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .dashboard-flex {
        display: flex !important;
        flex-direction: row !important;
        min-height: 100vh;
        width: 100%;
    }
    .main-content {
        flex: 1 1 0%;
        min-width: 0;
        height: auto;
        min-height: 100vh;
        overflow-y: visible;
        display: block;
    }
    
    /* Force FontAwesome spin animation to work properly with high specificity */
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
    /* Override sidebar spacing when sidebar is hidden */
    body.no-sidebar .dashboard-flex .main-content {
        margin-left: 0 !important;
        width: 100% !important;
    }
    body.no-sidebar .dashboard-flex {
        width: 100% !important;
    }
    /* Ensure cards auto-size on simplified user/client dashboard */
    body.no-sidebar .main-content .card { height: auto !important; }
    body.no-sidebar .main-content .card .card-body { height: auto !important; }
    
    /* Force navbar links to be consistent size */
    .navbar-nav .nav-link {
        font-size: 0.9rem !important;
        font-weight: 500 !important;
        padding: 0.5rem 1rem !important;
    }
    
    /* Force navbar height to match home page */
    .main-nav {
        height: 60px !important;
        min-height: 60px !important;
        max-height: 60px !important;
    }
    </style>
</head>
<body class="bg-light {{ (auth()->check() && auth()->user()->hasAdminAccess()) ? 'with-sidebar' : 'no-sidebar' }}">
    @php
        $noNavbarPatterns = ['/walk-in', '/requests', 'admin/requests'];
        $currentPath = request()->path();
        $hideNavbar = false;
        foreach ($noNavbarPatterns as $pattern) {
            if ($currentPath === ltrim($pattern, '/')) {
                $hideNavbar = true;
                break;
            }
            // Also hide for any subroutes (e.g., admin/requests/*)
            if (str_starts_with($currentPath, ltrim($pattern, '/').'/')) {
                $hideNavbar = true;
                break;
            }
        }
    @endphp
    @if (!$hideNavbar)
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('public.plants') }}">
                <img src="{{ asset('images/salengap-modified.png') }}" alt="Salenga Logo" class="nav-logo">
                <span class="brand-text">Salenga Farm</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="navbar-collapse-inner d-flex align-items-center w-100">
                    @if(auth()->check() && !auth()->user()->hasAdminAccess())
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('public.plants') ? 'active' : '' }}" href="{{ route('public.plants') }}">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('dashboard.user') ? 'active' : '' }}" href="{{ route('dashboard.user') }}">
                                <i class="fas fa-gauge me-1"></i> Dashboard
                            </a>
                        </li>
                        @if(auth()->user()->isClient())
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('client-data.*') ? 'active' : '' }}" href="{{ route('client-data.index') }}">
                                <i class="fas fa-folder-open me-1"></i> Client Data
                            </a>
                        </li>
                        @endif
                    </ul>
                    @endif
                @auth
                <div class="user-section ms-auto d-flex align-items-center gap-2">
                    <!-- Notification Bell -->
                    <div class="position-relative">
                        <div class="notification-bell notification-bell-trigger" id="navbarNotificationBell" title="Notifications">
                            <i class="fas fa-bell"></i>
                            <span class="badge bg-danger notification-badge" style="display: none;">0</span>
                        </div>
                        <!-- Notification Dropdown -->
                        <div class="notification-dropdown" id="navbarNotificationDropdown" style="z-index: 99999;">
                            <div class="notification-header">
                                <h6><i class="fas fa-bell me-2"></i>Notifications</h6>
                                <div class="d-flex gap-2">
                                    <a href="#" class="mark-all-read" title="Mark all as read">
                                        <i class="fas fa-check-double"></i>
                                    </a>
                                    <a href="#" class="delete-all-notifications" title="Delete all">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="notification-list">
                                <div class="no-notifications">
                                    <i class="fas fa-seedling"></i>
                                    <p>Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Dropdown -->
                    <div class="dropdown ms-2">
                        <button class="btn btn-link dropdown-toggle profile-btn" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile" class="profile-pic">
                            @else
                                <div class="profile-pic-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                                <span>{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <div class="user-section ms-auto">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                        <i class="fas fa-user me-1"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-light">
                        <i class="fas fa-user-plus me-1"></i>Register
                    </a>
                </div>
                @endauth
                </div>
            </div>
        </div>
    </nav>
    @endif

    <div class="dashboard-flex">
        @if(auth()->check() && auth()->user()->hasAdminAccess())
            @include('layouts.sidebar')
        @endif
        <div class="main-content">
        @yield('content')
        </div>
    </div>

    <!-- Toast Container for Notifications -->
    <div id="toastContainer" class="toast-container"></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alerts.js') }}?v={{ time() }}"></script>
    @auth
    <script src="{{ asset('js/push-notifications.js') }}?v={{ time() }}"></script>
    @endauth
    @if(request()->routeIs('public.plants') || request()->routeIs('home'))
    <script src="{{ asset('js/home.js') }}?v={{ time() }}"></script>
    @endif
    @if(request()->routeIs('requests.*') || request()->is('*/plants'))
    <script src="{{ asset('js/rfq.js') }}?v={{ time() }}"></script>
    @endif
    @yield('scripts')
</body>
</html>