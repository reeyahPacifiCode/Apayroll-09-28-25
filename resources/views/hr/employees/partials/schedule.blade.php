{{-- PATH DIRECTORY --}}
<!-- resources/views/employees/partials/schedule.blade.php -->
<!-- public/js/employee-partials-schedule.js-->
<!-- public/css/employee-partials-schedule.css -->

<div class="tab-pane fade" id="schedule" role="tabpanel">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 id="schedule-title">Employee Schedule</h5>
            <div>
                <button id="schedule-add-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                    + Add Schedule
                </button>

            </div>
        </div>

        <div class="card-body">
            <!-- RECORD MODE -->
            <div id="schedule-record">
                @if($employee->schedules->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date Created</th>
                                    <th>Week(s)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee->scheduleFiles as $file)
                                    <tr>
                                        <!-- # -->
                                        <td>{{ $loop->iteration }}</td>

                                        <!-- Date Created -->
                                        <td>{{ \Carbon\Carbon::parse($file->created_at)->format('F d, Y') }}</td>

                                        <!-- Weeks -->
                                        <td>{{ $file->weeks }}</td>

                                        <!-- Actions -->
                                        <td>
                                            <button class="btn btn-sm btn-info view-schedule-btn" data-group="{{ $file->id }}">View</button>
                                            <a href="{{ route('employees.schedules.download', [$employee->id, $file->id]) }}" class="btn btn-sm btn-success" target="_blank">Download</a>
                                            <form method="POST" action="{{ route('employees.schedules.destroy', [$employee, $file]) }}" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No schedule records yet.</p>
                @endif
            </div>

            <!-- VIEW MODE -->
            <div id="schedule-view" style="display:none;">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Department:</strong> <span id="view-department"></span></p>
                        <p><strong>Employee ID:</strong> <span id="view-employee-id"></span></p>
                        <p><strong>Full Name:</strong> <span id="view-fullname"></span></p>
                        <p><strong>Weeks:</strong> <span id="view-weeks"></span></p>
                        <p><strong>Schedule:</strong> <span id="view-schedule"></span></p>
                        <p><strong>Time In:</strong> <span id="view-time-in"></span></p>
                        <p><strong>Time Out:</strong> <span id="view-time-out"></span></p>

                        <!-- Legend -->
                        <div id="view-legend" class="mt-3">
                            <span class="badge bg-primary">Working Day (Blue)</span>
                            <span class="badge bg-danger">Rest Day (Red)</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="view-calendars-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ADD SCHEDULE MODAL -->
<div class="modal fade" id="addScheduleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('employees.schedules.store', $employee->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row">
                    <!-- Left: Options -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Weeks</label>
                            <select name="weeks" id="weeks" class="form-control" required>
                                <option value="1">1 Week</option>
                                <option value="2">2 Weeks</option>
                                <option value="3">3 Weeks</option>
                                <option value="4">4 Weeks</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Time In</label>
                            <input type="time" name="time_in" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Time Out</label>
                            <input type="time" name="time_out" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mark Days As:</label>
                            <div class="btn-group w-100">
                                <button type="button" id="btn-working" class="btn btn-outline-primary active">Working Day</button>
                                <button type="button" id="btn-rest" class="btn btn-outline-danger">Rest Day</button>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Calendar -->
                    <div class="col-md-9">
                        <div id="mini-calendar"></div>
                        <input type="hidden" name="days_json" id="days-json">
                        <small class="text-muted">
                            Select up to <span id="max-days-label">7</span> days (based on weeks).
                        </small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/employees-partials-schedule.css') }}">
@endpush

@push('scripts')
<!-- FullCalendar -->
<script src="{{ asset('js/vendors/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/employees-partials-schedule.js') }}"></script>
<script>
    // Pass PHP data to JavaScript
    window.employeeData = {
        id: '{{ $employee->id }}',
        takenDates: @json($employee->scheduleFiles
            ->flatMap(fn($f) => $f->days_json ? json_decode($f->days_json, true) : [])
            ->pluck('date')
            ->values())
    };
</script>
@endpush


{{-- DONE  CHECKING --}}

