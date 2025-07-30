@php
    use Illuminate\Support\Facades\Auth;
@endphp

<nav id="sidebarMenu" class="sidebar" style="background: #f8faf5; box-shadow: 8px 0 32px rgba(60,120,60,0.22); border-radius: 0;">
    <div class="sidebar-header">
        <a href="/" class="d-flex align-items-center justify-content-start mb-1" style="padding-left: 0;">
            <img src="{{ asset('images/salengap-modified.png') }}" alt="Salenga Logo" style="height: 28px;">
            </a>
        <span class="brand-script">Salenga Farm</span>
        </div>
    <ul class="nav flex-column mt-3" style="gap: 0.25rem; flex: 1 1 auto;">
            <li class="nav-item">
            <a href="/" class="nav-link sidebar-link">
                <i class="fas fa-house me-2 text-success"></i> Home
                </a>
            </li>
                <li class="nav-item">
            <a href="/dashboard" class="nav-link sidebar-link">
                <i class="fas fa-tachometer-alt me-2 text-success"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
            <a href="/plants" class="nav-link sidebar-link">
                <i class="fas fa-seedling me-2 text-success"></i> Inventory
                    </a>
                </li>
                <li class="nav-item">
            <a href="/walk-in" class="nav-link sidebar-link">
                <i class="fas fa-cash-register me-2 text-success"></i> Point-of-Sale
                    </a>
                </li>
                <li class="nav-item">
            <a href="/requests" class="nav-link sidebar-link">
                <i class="fas fa-envelope-open-text me-2 text-success"></i> Requests
                    </a>
                </li>
                <li class="nav-item">
            <a href="/site-visits" class="nav-link sidebar-link">
                <i class="fas fa-map-marked-alt me-2 text-success"></i> Site Visits
                    </a>
                </li>
                <li class="nav-item">
            <a href="/users" class="nav-link sidebar-link">
                <i class="fas fa-users-cog me-2 text-success"></i> Users
                    </a>
                </li>
    </ul>
    <hr style="margin: 1.2rem 0 0.7rem 0.7rem; border-color: #e0e8d8;">
    <!-- Sidebar Footer: Profile Card and Logout -->
    @auth
    <div class="sidebar-footer">
        <a href="/profile/edit" class="sidebar-profile-card-link">
            <div class="sidebar-profile-card">
                <div class="sidebar-profile-avatar sidebar-profile-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="sidebar-profile-info">
                    <div class="sidebar-profile-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                </div>
            </div>
        </a>
        <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="nav-link sidebar-link sidebar-logout-link"
                onclick="return confirm('Are you sure you want to log out?');">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
    @endauth
    @guest
    <div class="sidebar-footer">
        <a href="{{ route('login') }}" class="nav-link sidebar-link">Login</a>
        <a href="{{ route('register') }}" class="nav-link sidebar-link">Register</a>
    </div>
    @endguest
</nav>