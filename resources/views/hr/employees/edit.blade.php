{{-- PATH DIRECTORY --}}
<!-- resources/views/employees/edit.blade.php -->
<!-- public/js/hr-employees-edit.js-->
<!-- public/css/hr.css -->

@extends('layouts.hr')

@section('page-title', 'Edit Employee')

@section('hr-content')

<div class="container py-3">
    <p class="small text-muted mb-2">*put N/A if none</p>
    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data" id="employeeForm">
        @csrf
        @method('PUT')
        <div class="row g-3">
            {{-- LEFT SIDE: Employee Info --}}
            <div class="col-md-9">
                <div class="card text-light p-3 shadow-sm">
                    <div class="row g-2">
                        {{-- Row 1 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Department Name</label>
                            <input type="text" name="department" class="form-control form-control-sm" value="{{ $employee->department }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Employee Number</label>
                            <input type="text" name="employee_number" class="form-control form-control-sm" value="{{ $employee->employee_number }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Position</label>
                            <input type="text" name="position" class="form-control form-control-sm" value="{{ $employee->position }}" readonly>
                        </div>

                        {{-- Row 2 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-sm" value="{{ $employee->last_name }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">First Name</label>
                            <input type="text" name="first_name" class="form-control form-control-sm" value="{{ $employee->first_name }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control form-control-sm" value="{{ old('middle_name', $employee->middle_name) }}">
                        </div>

                        {{-- Row 3 --}}
                        <div class="col-md-6">
                            <label class="form-label small">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" value="{{ old('address', $employee->address) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">ZIP code</label>
                            <input type="text" name="zip_code" class="form-control form-control-sm" value="{{ old('zip_code', $employee->zip_code) }}" pattern="\d*" maxlength="6">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Mobile</label>
                            <input type="text" name="contact" class="form-control form-control-sm" value="{{ old('contact', $employee->contact) }}" pattern="\d*" maxlength="11">
                        </div>

                        {{-- Row 4 --}}
                        <div class="col-md-6">
                            <label class="form-label small">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email', $employee->email) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm" value="{{ old('phone', $employee->phone) }}" pattern="\d*">
                        </div>

                        {{-- Row 5 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Birth Place</label>
                            <input type="text" name="birthplace" class="form-control form-control-sm" value="{{ old('birthplace', $employee->birthplace) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm" value="{{ old('birthdate', $employee->birthdate) }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Age</label>
                            <input type="number" name="age" id="age" class="form-control form-control-sm" value="{{ old('age', $employee->age) }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Sex</label>
                            <select name="gender" class="form-select form-select-sm">
                                <option value="">Select</option>
                                <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        {{-- Row 6 --}}
                        <div class="col-md-4">
                            <label class="form-label small">Civil Status</label>
                            <select name="civil_status" class="form-select form-select-sm">
                                <option value="">Select</option>
                                <option value="Single" {{ $employee->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $employee->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Widowed" {{ $employee->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Religion</label>
                            <input type="text" name="religion" class="form-control form-control-sm" value="{{ old('religion', $employee->religion) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small">Nationality</label>
                            <input type="text" name="nationality" class="form-control form-control-sm" value="{{ old('nationality', $employee->nationality) }}">
                        </div>

                        {{-- Row 7: SSS, PhilHealth, PAG-IBIG, TIN --}}
                        <div class="col-md-3">
                            <label class="form-label small">SSS</label>
                            <input type="text" name="sss" class="form-control form-control-sm" value="{{ old('sss', $employee->sss) }}" pattern="\d*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">PhilHealth</label>
                            <input type="text" name="philhealth" class="form-control form-control-sm" value="{{ old('philhealth', $employee->philhealth) }}" pattern="\d*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">PAG-IBIG</label>
                            <input type="text" name="pagibig" class="form-control form-control-sm" value="{{ old('pagibig', $employee->pagibig) }}" pattern="\d*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">TIN</label>
                            <input type="text" name="tin" class="form-control form-control-sm" value="{{ old('tin', $employee->tin) }}" pattern="\d*">
                        </div>

                        {{-- Row 8: Bank Info --}}
                        <div class="col-md-6">
                            <label class="form-label small">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control form-control-sm" value="{{ old('bank_name', $employee->bank_name) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Bank Account</label>
                            <input type="text" name="bank_account" class="form-control form-control-sm" value="{{ old('bank_account', $employee->bank_account) }}" pattern="\d*">
                        </div>

                        {{-- Row 9: Financial Info --}}
                        <div class="col-md-6">
                            <label class="form-label small">Basic Rate</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="basic_rate" class="form-control form-control-sm" value="{{ old('basic_rate', $employee->basic_rate) }}" step="0.01" min="0">
                                <select name="rate_type" class="form-select form-select-sm" style="max-width:120px;">
                                    <option value="monthly" {{ $employee->rate_type == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="daily" {{ $employee->rate_type == 'daily' ? 'selected' : '' }}>Daily</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Allowance</label>
                            <input type="number" name="allowance" class="form-control form-control-sm" value="{{ old('allowance', $employee->allowance) }}" step="0.01" min="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small">Other Pay</label>
                            <input type="number" name="other_pay" class="form-control form-control-sm" value="{{ old('other_pay', $employee->other_pay) }}" step="0.01" min="0">
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT SIDE: Profile Picture + Buttons --}}
            <div class="col-md-3">
                <div class="card shadow-sm p-3 text-center d-flex flex-column justify-content-center align-items-center" style="height: 250px;">
                    <label class="form-label small fw-bold mb-2">Profile Picture</label>

                    {{-- Profile Picture / Current or Preview --}}
                    <div class="profile-picture-container mb-2">
                        @if($employee->photo)
                            <img id="preview" src="{{ asset('storage/' . $employee->photo) }}" alt="Profile Preview" class="rounded border profile-preview">
                        @else
                            <img id="preview" src="{{ asset('images/default-profile.jpg') }}" alt="Profile Preview" class="rounded border profile-preview">
                        @endif
                    </div>

                    {{-- Hidden File Input --}}
                    <input type="file" name="photo" accept="image/*" class="d-none" onchange="previewImage(this)">

                    {{-- Upload Button --}}
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.querySelector('input[name=photo]').click()">Change Photo</button>
                </div>

                {{-- Update/Cancel buttons --}}
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.history.back()">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="updateBtn">Update</button>
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
<script src="{{ asset('js/hr-employees-edit.js') }}"></script>
@endpush


{{-- DONE CHECKING --}}
