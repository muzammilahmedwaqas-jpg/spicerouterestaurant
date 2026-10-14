<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Spice Route Restaurant') }} - Authentic Culinary Heritage</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap 5 CSS & Icons CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Custom Application Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            }
            .hero-section {
                background: linear-gradient(135deg, #1b1b18 0%, #2c1a1d 100%);
                color: #ffffff;
                padding: 100px 0 80px 0;
            }
            .feature-icon-box {
                width: 60px;
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                font-size: 1.75rem;
                margin-bottom: 1.25rem;
            }
        </style>
    </head>
    <body class="bg-light d-flex flex-column min-vh-100">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/">
                    <span class="text-danger"><i class="bi bi-fire fs-3"></i></span>
                    <span class="fs-4">{{ config('app.name', 'Spice Route') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarWelcome" aria-controls="navbarWelcome" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarWelcome">
                    <ul class="navbar-nav align-items-center gap-2 mt-3 mt-lg-0">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary fw-semibold px-4">
                                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link text-white fw-semibold px-3">
                                        Sign In
                                    </a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="btn btn-danger fw-semibold px-4">
                                            Register
                                        </a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="hero-section text-center text-lg-start">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7">
                        <span class="badge bg-danger px-3 py-2 rounded-pill fw-semibold mb-3">
                            <i class="bi bi-stars me-1"></i> Fine Dining & Authentic Spices
                        </span>
                        <h1 class="display-4 fw-bold mb-3">
                            Welcome to Spice Route Restaurant
                        </h1>
                        <p class="lead text-light opacity-75 mb-4">
                            Experience the exquisite heritage of authentic culinary traditions, paired with state-of-the-art restaurant staff shift management and service excellence.
                        </p>
                        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg fw-semibold px-4">
                                    <i class="bi bi-speedometer2 me-1"></i> Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-danger btn-lg fw-semibold px-4">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Staff Portal Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg fw-semibold px-4">
                                        Register Team
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="col-lg-5 text-center">
                        <div class="p-4 bg-white bg-opacity-10 rounded-4 border border-white border-opacity-25 shadow-lg">
                            <i class="bi bi-egg-fried display-1 text-danger"></i>
                            <h4 class="mt-3 text-white fw-bold">Hospitality & Precision</h4>
                            <p class="text-white-50 small mb-0">Coordinating dedicated kitchen masters, floor supervisors, and dining servers seamlessly across all shifts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Features Section -->
        <section class="py-5 bg-white">
            <div class="container py-4">
                <div class="row text-center mb-5">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="h2 fw-bold text-dark">Management Features</h2>
                        <p class="text-muted">A modern platform built with Bootstrap 5 to coordinate our team and delight our patrons.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 rounded-3 text-center">
                            <div class="feature-icon-box bg-primary-subtle text-primary mx-auto">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h4 class="h5 fw-bold text-dark">Smart Shift Scheduling</h4>
                            <p class="text-muted small mb-0">Organize Morning, Evening, and Night duty shifts with accurate operational hours to maintain smooth kitchen and floor coverage.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 rounded-3 text-center">
                            <div class="feature-icon-box bg-success-subtle text-success mx-auto">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4 class="h5 fw-bold text-dark">Employee Directory</h4>
                            <p class="text-muted small mb-0">Maintain complete staff profiles, designations, contact numbers, and shift assignments with instant updates and filters.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 rounded-3 text-center">
                            <div class="feature-icon-box bg-danger-subtle text-danger mx-auto">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4 class="h5 fw-bold text-dark">Secure Staff Authentication</h4>
                            <p class="text-muted small mb-0">Robust role-based authentication, password reset systems, and profile controls powered by Laravel.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-dark text-white-50 py-4 mt-auto border-top border-secondary">
            <div class="container text-center">
                <p class="mb-1 text-white fw-bold">&copy; {{ date('Y') }} {{ config('app.name', 'Spice Route Restaurant') }}. All rights reserved.</p>
                <small class="text-secondary">Designed with Bootstrap 5 &amp; Laravel</small>
            </div>
        </footer>

        <!-- Bootstrap 5 JS Bundle CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
