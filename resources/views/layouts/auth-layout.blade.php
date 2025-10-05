<!-- ============================================
     ENHANCED AUTH-LAYOUT.BLADE.PHP
     Bootstrap 5 + Custom CSS Combined
     ============================================ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Technopark Hotel Auth')</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/vendors/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors/bootstrap-icons.min.css') }}" rel="stylesheet">

    <!-- Custom CSS (loads after Bootstrap) -->
    <link href="{{ asset('css/auth-layout.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Fixed Logo Area with Bootstrap Grid -->
    <header class="logo-wrapper fixed-top">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between g-2">
                <!-- Left Logo -->
                <div class="col-auto">
                    <div class="left-logo">
                        <img src="{{ asset('images/technologo.png') }}"
                             alt="Technopark Logo"
                             class="img-fluid"
                             loading="eager">
                    </div>
                </div>

                <!-- Right Logos -->
                <div class="col-auto">
                    <div class="right-logos d-flex align-items-center gap-2 gap-sm-3">
                        <img src="{{ asset('images/rw.png') }}"
                             alt="RW Logo"
                             class="img-fluid"
                             loading="eager">
                        <img src="{{ asset('images/cvsu.png') }}"
                             alt="CvSU Logo"
                             class="img-fluid"
                             loading="eager">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Auth Section (Skip for now as requested) -->
    <main class="auth-page flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="auth-box">
            @yield('content')
        </div>
    </main>

    <!-- Footer with Bootstrap Utilities -->
    <footer class="footer mt-auto py-2 text-center">
        <small class="d-block">
            <span class="fw-semibold">RW RealWorks</span>
            <span class="mx-1">•</span>
            <span>CvSU–Silang Campus</span>
            <span class="mx-1">•</span>
            <i class="bi bi-c-circle"></i>
            <span>2025</span>
        </small>
    </footer>

    <!-- Bootstrap JS Bundle (Optional - if needed for components) -->
    <script src="{{ asset('js/vendors/bootstrap.bundle.min.js') }}" defer></script>
    @stack('scripts')
</body>
</html>

{{-- DONE CHECKING
     DONE RESPONSIVE. --}}
