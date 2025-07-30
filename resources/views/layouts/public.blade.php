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
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}?v=4" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}?v=2" rel="stylesheet">
    <!-- Optionally keep public.css if needed for other elements -->
    <!-- <link href="{{ asset('css/public.css') }}?v={{ rand(1000,9999) . time() }}" rel="stylesheet"> -->
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
        width: 100vw;
    }
    .main-content {
        flex: 1 1 0%;
        min-width: 0;
        height: 100vh;
        overflow-y: auto;
        display: block;
    }
    </style>
</head>
<body class="bg-light">
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
                <div class="navbar-collapse-inner">
                    <ul class="navbar-nav center-nav" style="min-width: 550px; display: flex; flex-wrap: nowrap;"></ul>
                @auth
                <div class="user-section">
                    <div class="dropdown">
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
                <div class="user-section">
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
        @include('layouts.sidebar')
        <div class="main-content">
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @if(request()->routeIs('public.plants') || request()->routeIs('home'))
    <script src="{{ asset('js/home.js') }}?v={{ time() }}"></script>
    @endif
    @if(request()->routeIs('requests.*') || request()->is('*/plants'))
    <script src="{{ asset('js/rfq.js') }}?v={{ time() }}"></script>
    @endif
    @yield('scripts')
</body>
</html>