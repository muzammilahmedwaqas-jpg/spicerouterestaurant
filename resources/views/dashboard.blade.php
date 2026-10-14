<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 fw-bold text-dark">
                <i class="bi bi-speedometer2 me-2 text-primary"></i>{{ __('Dashboard') }}
            </h2>
            <span class="text-muted small">
                {{ now()->format('l, F j, Y') }}
            </span>
        </div>
    </x-slot>

    <!-- Welcome Hero Card -->
    <div class="card shadow-sm border-0 mb-4 rounded-3 bg-white">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge bg-danger-subtle text-danger px-3 py-2 mb-2 rounded-pill fw-semibold">
                        <i class="bi bi-fire me-1"></i> Spice Route Restaurant
                    </span>
                    <h1 class="h3 fw-bold text-dark mb-2">
                        Welcome back, {{ Auth::user()->name }}!
                    </h1>
                    <p class="text-muted mb-4">
                        Manage your restaurant staff shifts, employee records, and daily schedules efficiently from your centralized control panel.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('shifts.create') }}" class="btn btn-primary fw-semibold">
                            <i class="bi bi-plus-circle me-1"></i> Add New Shift
                        </a>
                        <a href="{{ route('employees.create') }}" class="btn btn-outline-primary fw-semibold">
                            <i class="bi bi-person-plus me-1"></i> Add New Employee
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-none d-lg-block">
                    <div class="display-1 text-danger opacity-75">
                        <i class="bi bi-shop-window"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Cards -->
    <div class="row g-4">
        <!-- Shifts Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-3">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="p-3 bg-primary-subtle text-primary rounded-3 fs-4">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Schedules</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Shifts Management</h5>
                    <p class="text-muted small flex-grow-1">
                        Configure morning, evening, and night duty shifts with defined operating hours and monitor staff allocations.
                    </p>
                    <a href="{{ route('shifts.index') }}" class="btn btn-outline-primary w-100 mt-2 fw-semibold">
                        View Shifts <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Employees Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-3">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="p-3 bg-success-subtle text-success rounded-3 fs-4">
                            <i class="bi bi-people"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Team</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Employee Directory</h5>
                    <p class="text-muted small flex-grow-1">
                        View staff directory, assign designations (Chefs, Waiters, Managers), link shifts, and track joining dates.
                    </p>
                    <a href="{{ route('employees.index') }}" class="btn btn-outline-success w-100 mt-2 fw-semibold">
                        View Employees <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 rounded-3">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="p-3 bg-secondary-subtle text-secondary rounded-3 fs-4">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <span class="badge bg-light text-secondary border">Security</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Account & Settings</h5>
                    <p class="text-muted small flex-grow-1">
                        Manage your account profile information, update your security password, and review access preferences.
                    </p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary w-100 mt-2 fw-semibold">
                        Edit Profile <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
