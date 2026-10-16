<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('dashboard') }}">
            <span class="text-danger"><i class="bi bi-fire fs-4"></i></span>
            <span>Spice Route</span>
        </a>

        <!-- Responsive Hamburger Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navigation Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::user()->role === 'manager')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('shifts.*') ? 'active fw-semibold' : '' }}" href="{{ route('shifts.index') }}">
                            <i class="bi bi-clock-history me-1"></i> {{ __('Shifts') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employees.*') ? 'active fw-semibold' : '' }}" href="{{ route('employees.index') }}">
                            <i class="bi bi-people me-1"></i> {{ __('Employees') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.leaves*') ? 'active fw-semibold' : '' }}" href="{{ route('admin.leaves') }}">
                            <i class="bi bi-calendar-check me-1"></i> {{ __('Leave Requests') }}
                        </a>
                    </li>
                    <li>
                         <a class="nav-link {{ request()->routeIs('admin.summary*') ? 'active fw-semibold' : '' }}" href="{{ route('admin.summary') }}">
                             <i class="bi bi-bar-chart-line me-1"></i> {{ __('Summary') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('staff.dashboard') ? 'active fw-semibold' : '' }}" href="{{ route('staff.dashboard') }}">
                            <i class="bi bi-person-badge me-1"></i> {{ __('Staff Portal') }}
                        </a>
                    </li>
                @endif
            </ul>

            <!-- Settings / User Dropdown -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="badge bg-secondary rounded-circle p-2"><i class="bi bi-person-fill"></i></span>
                        <span>{{ Auth::user()->name }}</span>
                        <span class="badge {{ Auth::user()->role === 'manager' ? 'bg-danger' : 'bg-primary' }} text-uppercase" style="font-size: 0.65rem;">
                            {{ Auth::user()->role }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                        <li>
                            <h6 class="dropdown-header">
                                <div class="fw-bold">{{ Auth::user()->name }}</div>
                                <div class="text-muted small">{{ Auth::user()->email }}</div>
                            </h6>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-gear"></i> {{ __('Profile') }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                    <i class="bi bi-box-arrow-right"></i> {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
