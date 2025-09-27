{{-- PATH DIRECTORY --}}
<!-- resources/views/hr/employees/index.blade.php -->
<!-- public/js/app.js-->
<!-- Not yet done for CSS -->

@extends('layouts.app')

@section('content')
    <div class="page-body">
        @if (session('success'))
            <div id="flash-message" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="flash-message" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('hr-content')
    </div>
@endsection


@push('styles')
<link rel="stylesheet" href="">
@endpush
@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endpush



{{-- DONE CHECKING--}}
