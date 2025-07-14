<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="/" class="logo text-white text-decoration-none fw-bold d-flex align-items-center"
                style="font-size: 20px;">
                <i class="fas fa-user-tie me-2"></i> My Portfolio
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="fas fa-ellipsis-v"></i>
            </button>
        </div>
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('heroes.*') ? 'active' : '' }}">
                    <a href="{{ route('heroes.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        <p>Manage Hero Section</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('skills.*') ? 'active' : '' }}">
                    <a href="{{ route('skills.index') }}">
                        <i class="fas fa-code"></i>
                        <p>Manage Skill Section</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('portfolio.*') ? 'active' : '' }}">
                    <a href="{{ route('portfolio.index') }}">
                        <i class="fas fa-briefcase"></i>
                        <p>Manage My Portfolio</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                    <a href="{{ route('contact.index') }}">
                        <i class="fas fa-address-book"></i>
                        <p>Manage My Contact</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
