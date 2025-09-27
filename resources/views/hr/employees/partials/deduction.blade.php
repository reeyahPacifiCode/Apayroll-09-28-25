{{-- PATH DIRECTORY --}}
<!-- resources/views/employees/partials/deduction.blade.php -->
<!-- public/js/employee-partials-deduction.js-->
<!-- Not yet done for CSS -->

<div class="tab-pane fade" id="deductions" role="tabpanel">

    <!-- Record Mode -->
    <div id="deductionRecordMode">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Deductions</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeductionModal">
                <i class="bi bi-plus-lg"></i> Add Deduction
            </button>
        </div>

        <table class="table table-striped table-bordered" id="deductionsTable">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee->deductions as $deduction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $deduction->formatted_deduction_type }}</td>
                    <td>
                        <span class="badge bg-{{ $deduction->is_active ? 'success' : 'secondary' }}">
                            {{ $deduction->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>{{ $deduction->start_date->format('M d, Y') }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-info viewDeductionBtn"
                                data-url="{{ route('employees.deductions.show', [$employee->id, $deduction->id]) }}">
                            View
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- View Mode -->
    <div id="deductionViewMode" class="d-none">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Deduction Details</h5>
                <button id="backToDeductionList" class="btn btn-sm btn-outline-secondary">Back</button>
            </div>
            <div class="card-body">
                <p><strong>Deduction Type:</strong> <span id="view-type">—</span></p>
                <p><strong>Monthly Amount:</strong> <span id="view-amount">0.00</span></p>
                <p><strong>Months to Pay:</strong> <span id="view-term">0</span></p>
                <p><strong>Total Loan:</strong> <span id="view-total-loan">0.00</span></p>
                <p><strong>Status:</strong> <span id="view-status">—</span></p>
                <p><strong>Start Date:</strong> <span id="view-start-date">—</span></p>
                <p><strong>Notes:</strong> <span id="view-notes">—</span></p>
            </div>
        </div>
    </div>

</div>

<!-- Add Deduction Modal -->
<div class="modal fade" id="addDeductionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('employees.deductions.store', $employee->id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Deduction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Deduction Type -->
                <div class="mb-3">
                    <label class="form-label">Deduction Type <span class="text-danger">*</span></label>
                    <select name="deduction_type" id="deductionType" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="company_loan">Company Loan</option>
                        <option value="cash_advance">Cash Advance</option>
                        <option value="sss_loan">SSS Loan</option>
                        <option value="hdmf_loan">HDMF Loan</option>
                        <option value="other">Others - Add Type</option>
                    </select>
                </div>

                <!-- Custom Type (for Others) -->
                <div class="mb-3" id="customTypeDiv" style="display: none;">
                    <label class="form-label">Custom Type <span class="text-danger">*</span></label>
                    <input type="text" name="custom_type" id="customType" class="form-control"
                        placeholder="Enter custom deduction type">
                </div>

                <!-- Term (Months to Pay) -->
                <div class="mb-3">
                    <label class="form-label">Term (Months to Pay) <span class="text-danger">*</span></label>
                    <input type="number" name="term" id="term" min="1" max="120" class="form-control" required>
                    <div class="form-text">Maximum 120 months (10 years)</div>
                </div>

                <!-- Monthly Amount -->
                <div class="mb-3">
                    <label class="form-label">Monthly Amount <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" step="0.01" class="form-control" required>
                </div>

                <!-- Cutoff -->
                <div class="mb-3">
                    <label class="form-label">Cut Off <span class="text-danger">*</span></label>
                    <select name="cut_off" class="form-select" required>
                        <option value="">Select Cut Off</option>
                        <option value="1st_half">1st Half</option>
                        <option value="2nd_half">2nd Half</option>
                    </select>
                </div>

                <!-- Start Date -->
                <div class="mb-3">
                    <label class="form-label">Effective Date <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <!-- Notes -->
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Deduction</button>
            </div>
        </form>
    </div>
</div>





@push('styles')
<link rel="stylesheet" href="">

@endpush
@push('scripts')
<script src="{{ asset('js/employees-partials-deduction.js') }}"></script>
@endpush



{{-- DONE CHECKING --}}
