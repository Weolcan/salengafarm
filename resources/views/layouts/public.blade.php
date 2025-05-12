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
    <link href="{{ asset('css/public.css') }}?v={{ rand(1000,9999) . time() }}" rel="stylesheet">
    <link href="{{ asset('css/plant-details.css') }}?v={{ rand(1000,9999) . time() }}" rel="stylesheet">
    <link href="{{ asset('css/plant-details-fix.css') }}?v={{ rand(1000,9999) . time() }}" rel="stylesheet">

    <!-- Additional styles -->
    @stack('styles')
</head>
<body class="bg-light">
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
                <ul class="navbar-nav center-nav" style="min-width: 550px; display: flex; flex-wrap: nowrap;">
                    @auth
                        @if(auth()->user()->hasAdminAccess())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.plants') || request()->is('/') ? 'active' : '' }}" href="{{ route('public.plants') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('requests.*') ? 'active' : '' }}" href="{{ route('requests.index') }}">
                                <i class="fas fa-file-invoice me-1"></i>Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-chart-line me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('walk-in.*') ? 'active' : '' }}" href="{{ route('walk-in.index') }}">
                                <i class="fas fa-cash-register me-1"></i>Walk-in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('plants.*') ? 'active' : '' }}" href="{{ route('plants.index') }}">
                                <i class="fas fa-leaf me-1"></i>Inventory
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="fas fa-users me-1"></i>Users
                            </a>
                        </li>
                        @endif
                    @endauth
                </ul>
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

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts with dynamic timestamps to prevent caching -->
    @if(request()->routeIs('public.plants') || request()->routeIs('home'))
    <script src="{{ asset('js/home.js') }}?v={{ time() }}"></script>
    @endif

    @if(request()->routeIs('requests.*') || request()->is('*/plants'))
    <script src="{{ asset('js/rfq.js') }}?v={{ time() }}"></script>
    @endif

    <!-- Scripts Section -->
    @yield('scripts')
</body>
</html>