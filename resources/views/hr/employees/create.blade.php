{{-- PATH DIRECTORY --}}
<!-- resources/views/employees/edit.blade.php -->
<!-- public/js/js/hr-employees-create.js-->
<!-- public/css/hr.css -->

@extends('layouts.hr')

@section('page-title', 'Add Employee')

@section('hr-content')

<div class="container py-3">
    <p class="small text-muted mb-2">*put N/A if none</p>
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data" id="employeeForm">
        @csrf
        <div class="row g-3">
            {{-- LEFT SIDE: Employee Info --}}
            <div class="col-md-9">
                <div class="card text-light p-3 shadow-sm">
                    <div class="row g-2">
                        {{-- Row 1 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Department Name</label>
                            <select name="department" class="form-select form-control-sm" required>
                                <option value="">-- Select --</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department }}">{{ $department }}</option>
                                @endforeach
                                <option value="__other">Others...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Employee Number</label>
                            <input type="text" name="employee_number" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Position</label>
                            <input type="text" name="position" class="form-control form-control-sm">
                        </div>

                        {{-- Row 2 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">First Name</label>
                            <input type="text" name="first_name" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control form-control-sm">
                        </div>

                        {{-- Row 3 --}}
                        <div class="col-md-6">
                            <label class="form-label small">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">ZIP code</label>
                            <input type="text" name="zip_code" class="form-control form-control-sm" required pattern="\d*" maxlength="6">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Mobile</label>
                            <input type="text" name="contact" class="form-control form-control-sm" required pattern="\d*" maxlength="11">
                        </div>

                        {{-- Row 4 --}}
                        <div class="col-md-6">
                            <label class="form-label small">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm" pattern="\d*">
                        </div>

                        {{-- Row 5 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Birth Place</label>
                            <input type="text" name="birthplace" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Age</label>
                            <input type="number" name="age" id="age" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Sex</label>
                            <select name="gender" class="form-select form-select-sm" required>
                                <option value="">Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        {{-- Row 6 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Civil Status</label>
                            <select name="civil_status" class="form-select form-select-sm">
                                <option value="">Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Religion</label>
                            <input type="text" name="religion" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Nationality</label>
                            <input type="text" name="nationality" class="form-control form-control-sm">
                        </div>

                        {{-- Row 7: SSS, PhilHealth, PAG-IBIG, TIN --}}
                        <div class="col-md-3">
                            <label class="form-label small">SSS</label>
                            <input type="text" name="sss" class="form-control form-control-sm" pattern="\d*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">PhilHealth</label>
                            <input type="text" name="philhealth" class="form-control form-control-sm" pattern="\d*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">PAG-IBIG</label>
                            <input type="text" name="pagibig" class="form-control form-control-sm" pattern="\d*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">TIN</label>
                            <input type="text" name="tin" class="form-control form-control-sm" pattern="\d*">
                        </div>

                        {{-- Row 8: Bank Info --}}
                        <div class="col-md-6">
                            <label class="form-label small">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Bank Account</label>
                            <input type="text" name="bank_account" class="form-control form-control-sm" pattern="\d*">
                        </div>

                        {{-- Row 9: Financial Info --}}
                        <div class="col-md-6">
                            <label class="form-label small">Basic Rate</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="basic_rate" class="form-control form-control-sm" step="0.01" min="0" required>
                                <select name="rate_type" class="form-select form-select-sm" style="max-width:120px;" required>
                                    <option value="monthly">Monthly</option>
                                    <option value="daily">Daily</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Allowance</label>
                            <input type="number" name="allowance" class="form-control form-control-sm" step="0.01" min="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Other Pay</label>
                            <input type="number" name="other_pay" class="form-control form-control-sm" step="0.01" min="0">
                        </div>
                    </div>
                </div>
            </div>

                {{-- RIGHT SIDE: Profile Picture + Buttons --}}
            <div class="col-md-3">
                <div class="card shadow-sm p-3 text-center d-flex flex-column justify-content-center align-items-center" style="height: 250px;">
                    <label class="form-label small fw-bold mb-2">Profile Picture</label>

                    {{-- Profile Picture / Temporary Preview --}}
                    <div class="profile-picture-container mb-2">
                        <img id="preview" src="{{ asset('images/default-profile.jpg') }}" alt="Profile Preview" class="rounded border profile-preview">
                    </div>

                    {{-- Hidden File Input --}}
                    <input type="file" name="photo" accept="image/*" class="d-none" onchange="previewImage(this)">

                    {{-- Upload Button --}}
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.querySelector('input[name=photo]').click()">Upload</button>
                </div>

                {{-- Save/Cancel buttons --}}
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.history.back()">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="saveBtn">Save</button>
                </div>
            </div>
        </div>
        <!-- Other Department Modal -->
        <div class="modal fade" id="otherDepartmentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Other Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="otherDepartmentInput" class="form-control" placeholder="Department Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="saveOtherDeptBtn" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/hr.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/hr-employees-create.js') }}"></script>
@endpush

{{-- DONE CHECKING --}}
