// Premium

function toggleEdit(btn) {
    const row = btn.closest('tr');
    row.querySelector('.premium-display').classList.add('d-none');
    row.querySelector('.premium-input').classList.remove('d-none');
    btn.classList.add('d-none');
    row.querySelector('.save-btn').classList.remove('d-none');
}

function toggleSave(btn) {
    const row = btn.closest('tr');
    const input = row.querySelector('.premium-input');
    const display = row.querySelector('.premium-display');

    display.value = input.value + " %";
    input.classList.add('d-none');
    display.classList.remove('d-none');

    btn.classList.add('d-none');
    row.querySelector('.edit-btn').classList.remove('d-none');
}

// DONE CHECKING
