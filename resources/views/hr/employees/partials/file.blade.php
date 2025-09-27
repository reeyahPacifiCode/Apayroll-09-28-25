{{-- PATH DIRECTORY --}}
<!-- resources/views/employees/partials/file.blade.php -->
<!-- Javascript is in here too because the for each not working to the js.file page, consult first in backend dev :) -->
<!-- public/css/employees-partials.css -->

@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px;">
    <div class="card shadow">
        <div class="card-body" style="padding:20px;">

            <!-- Header Info -->
            <div class="row mb-4">
                <div class="col-6">
                    <h6>Employee ID: <strong>{{ $employee->id }}</strong></h6>
                    <h6>Department: <strong>{{ $employee->department->name ?? 'N/A' }}</strong></h6>
                    <h6>Name: <strong>{{ $employee->fullname }}</strong></h6>
                </div>
                <div class="col-6 text-end">
                    <h6>Cutoff Period</h6>
                    <p>{{ $cutoff->first_half_start }} - {{ $cutoff->second_half_end }} {{ $cutoff->month }}/{{ $cutoff->year }}</p>
                </div>
            </div>

            <!-- Details + Calendar -->
            <div class="row">
                <!-- Left Side -->
                <div class="col-4">
                    <p><strong>Time In:</strong> {{ $schedules->first()->start_time ?? '-' }}</p>
                    <p><strong>Time Out:</strong> {{ $schedules->first()->end_time ?? '-' }}</p>
                    <p><span class="badge bg-primary">Regular = Blue</span></p>
                    <p><span class="badge bg-danger">Restday = Red</span></p>
                </div>

                <!-- Right Side Calendar -->
                <div class="col-8">
                    <div id="print-calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




@push('styles')
<link rel="stylesheet" href="{{ asset('css/employees-partials.css') }}">
@endpush
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('print-calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 400,
        headerToolbar: { left: '', center: 'title', right: '' },
        selectable: false,
        events: [
            @foreach($schedules as $sched)
                {
                    title: "{{ $sched->type === 'regular' ? 'Work' : 'Rest' }}",
                    start: "{{ $sched->date }}",
                    allDay: true,
                    color: "{{ $sched->type === 'regular' ? '#0d6efd' : '#dc3545' }}"
                },
            @endforeach
        ]
    });

    calendar.render();
});
</script>
<script src="{{ asset('js/vendors/fullcalendar.min.js') }}"></script>
@endpush



{{-- DONE CHECKING --}}
