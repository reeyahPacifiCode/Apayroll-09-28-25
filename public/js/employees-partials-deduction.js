//----------------------------------------EMPLOYEE-PARTIALS-DEDUCTION

document.addEventListener('DOMContentLoaded', function () {
    // ===============================
    // Calculate Per Month Amount
    // ===============================
    const amountInput = document.getElementById('amount');
    const termInput = document.getElementById('term');
    const perPaymentPreview = document.getElementById('perPaymentPreview');

    function updatePerPaymentPreview() {
        const amount = parseFloat(amountInput.value) || 0;
        const term = parseInt(termInput.value) || 1;
        const perMonth = term > 0 ? amount / term : 0;
        perPaymentPreview.textContent = '₱' + perMonth.toFixed(2) + ' /month';
    }

    amountInput.addEventListener('input', updatePerPaymentPreview);
    termInput.addEventListener('input', updatePerPaymentPreview);

    // ===============================
    // Switch Between Record & View Mode
    // ===============================
    const recordMode = document.getElementById('deductionRecordMode');
    const viewMode = document.getElementById('deductionViewMode');
    const backBtn = document.getElementById('backToDeductionList');

    // Handle dynamic buttons
    document.querySelectorAll('.viewDeductionBtn').forEach(btn => {
    btn.addEventListener('click', function() {
        const url = this.dataset.url;

        fetch(url)
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                // Switch mode
                document.getElementById('deductionRecordMode').classList.add('d-none');
                document.getElementById('deductionViewMode').classList.remove('d-none');

                // Fill fields
                document.getElementById('view-type').textContent = data.type ?? '—';
                document.getElementById('view-amount').textContent = parseFloat(data.per_payment_amount).toFixed(2);
                document.getElementById('view-term').textContent = data.term ?? 0;
                document.getElementById('view-total-loan').textContent =
                    (parseFloat(data.per_payment_amount) * parseInt(data.term || 0)).toFixed(2);

                // Status (active/inactive + payments made)
                const status = data.is_active
                    ? (data.payments_made >= data.term ? 'Paid' : 'Active / Partially Paid')
                    : 'Inactive';
                document.getElementById('view-status').textContent = status;

                document.getElementById('view-start-date').textContent = data.start_date ?? '—';
                document.getElementById('view-notes').textContent = data.notes ?? '—';
            })
            .catch(err => {
                console.error('Unable to fetch deduction:', err);
                alert('Unable to load deduction details.');
            });
    });
});

// Back button
document.getElementById('backToDeductionList').addEventListener('click', () => {
    document.getElementById('deductionViewMode').classList.add('d-none');
    document.getElementById('deductionRecordMode').classList.remove('d-none');
});

});


// DONE CHECKING
