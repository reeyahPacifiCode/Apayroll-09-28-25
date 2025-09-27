<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Technopark Hotel Auth')</title>
    <!-- Blade Layout (e.g., app.blade.php or login.blade.php) | External libraries CSS-->
    <link href="{{ asset('css/vendors/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors/bootstrap-icons.min.css') }}" rel="stylesheet">
    <!-- Your CSS must come AFTER Bootstrap | Custom CSS -->
    <link href="{{ asset('css/auth-layout.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <!-- Fixed Logo Area -->
    <div class="logo-wrapper">
        <div class="left-logo">
            <img src="{{ asset('images/technologo.png') }}" alt="Technopark Logo">
        </div>
        <div class="right-logos">
            <img src="{{ asset('images/rw.png') }}" alt="RW Logo">
            <img src="{{ asset('images/cvsu.png') }}" alt="CvSU Logo">
        </div>
    </div>

    <!-- Main Auth Section -->
    <div class="auth-page">
        <div class="auth-box">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        RW RealWorks • CvSU–Silang Campus • <i class="bi bi-c-circle"></i> 2025
    </div>

    @stack('scripts')
</body>
</html>


{{-- DONE CHECKING. --}}
