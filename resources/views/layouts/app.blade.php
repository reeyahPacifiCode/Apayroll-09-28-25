{{-- PATH DIRECTORY --}}
<!-- resources/views/layouts.blade.php -->
<!-- public/js/app.js-->
<!-- public/css/fixed-nav.css -->
<!-- public/css/hr-dashboard.css -->
<!-- public/css/employees-partials.css -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>HR Dashboard</title>

    <!-- External libraries CSS -->
    <link href="{{ asset('css/vendors/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors/bootstrap-icons.min.css') }}" rel="stylesheet">
     <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/fixed-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hr-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/employees-partials.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>

<body class="d-flex flex-column" style="height: 100vh; margin: 0;">
    <!-- Logo Header -->
    <div class="background-wrapper" style="height: 60px;">
        <div class="left-logo">
            <img src="{{ asset('images/technologo.png') }}" alt="Technopark Logo">
        </div>
        <div class="right-logos">
            <img src="{{ asset('images/rw.png') }}" alt="RW Logo">
            <img src="{{ asset('images/cvsu.png') }}" alt="CvSU Logo">
        </div>
    </div>

    <!-- Top Navigation Bar -->
    <div class="topbar">
        <div class="logo-title">
            <h3>HR Department</h3>
        </div>
        <div class="top-right d-flex align-items-center gap-3">
            <span class="bell-icon">🔔</span>

    <!-- User Dropdown -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle d-flex align-items-center gap-2" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border: none; color: inherit;">
                    <span class="user-icon">👤</span>
                    <span class="username">{{ auth('hr')->user()->first_name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

<!-- Sidebar + Main Content -->
<div class="layout-container">
<div id="sidebar" class="sidebar">
    @php
        $currentRoute = Route::currentRouteName();
        $pageTitle = match($currentRoute) {
            'dashboard' => 'Dashboard',
            'employee' => 'Employee',
            default => 'HR Portal'
        };
    @endphp

        <div class="sidebar-header">
            <h4>{{ $pageTitle }}</h4>
            <span id="sidebarToggle" class="toggle-icon">☰</span>
            </div>

            <ul class="sidebar-nav">
                <li class="{{ $currentRoute == 'hr.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('hr.dashboard') }}">
                        <i data-lucide="layout-dashboard"></i><span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ $currentRoute == 'employees.index' ? 'active' : '' }}">
                    <a href="{{ route('employees.index') }}">
                        <i data-lucide="users"></i><span>Employee</span>
                    </a>
                </li>

                <li class="{{ $currentRoute == 'schedule.index' ? 'active' : '' }}">
                    <a href="{{ route('schedule.index') }}">
                        <i data-lucide="calendar-clock"></i>
                        <span>Schedule</span>
                    </a>
                </li>

                <li class="{{ $currentRoute == 'deductions.index' ? 'active' : '' }}">
                    <a href="{{ route('deductions.index') }}">
                        <i data-lucide="percent"></i><span>Deduction</span>
                    </a>
                </li>

                <li class="{{ $currentRoute == 'premium.index' ? 'active' : '' }}">
                    <a href="{{ route('premium.index') }}">
                        <i data-lucide="dollar-sign"></i><span>Premium Setup</span>
                    </a>
                </li>

                <li><a href="#"><i data-lucide="file-text"></i><span>Payroll</span></a></li>
                <li><a href="#"><i data-lucide="wallet"></i><span>Pay Slip</span></a></li>

                <li class="{{ $currentRoute == 'calendar.index' ? 'active' : '' }}">
                    <a href="{{ route('calendar.index') }}">
                        <i data-lucide="calendar"></i><span>Calendar</span>
                    </a>
                </li>

                <li><a href="#"><i data-lucide="file-warning"></i><span>Report</span></a></li>
                <li><a href="#"><i data-lucide="archive"></i><span>Archive</span></a></li>
            </ul>

        </div>

        <div class="main-content">
        <!-- Fixed Page Header -->
        <div class="page-header">
            <h4>@yield('page-title')</h4>
        </div>

        <!-- Scrollable Page Body -->
        <div class="page-body">
            @yield('content')
        </div>
    </div>
    </div>

     <!-- Footer-->
    <div class="footer">
        RW RealWorks • CvSU–Silang Campus • &nbsp;<i class="bi bi-c-circle"></i>&nbsp;2025
    </div>


<!-- Calendar -->
<script src="{{ asset('js/vendors/fullcalendar.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>


    @stack('scripts')
</body>
</html>


{{-- DONE CHECKING/ NAIDAGDAG @stack('styles') / content.css as new is hr-dashboard.css /
ALL ONLINE EXTERNAL LIBRARIES CHANGE TO OFFLINE. CSS, JS, AND CALENDAR--}}
