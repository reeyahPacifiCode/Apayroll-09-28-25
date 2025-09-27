//HR schedule

//-- Calendar Highlight Script --//
document.addEventListener('DOMContentLoaded', () => {
    const updateHighlight = (fs, fe, ss, se) => {
        document.querySelectorAll('#calendar-table td[data-day]').forEach(td => {
            const day = parseInt(td.dataset.day);
            td.style.backgroundColor = '';
            td.style.color = '';

            if (fs && fe && day >= fs && day <= fe) {
                td.style.backgroundColor = '#1e3a8a';
                td.style.color = 'white';
            }
            if (ss && se && day >= ss && day <= se) {
                td.style.backgroundColor = '#3b82f6';
                td.style.color = 'white';
            }
        });
    };

    // Edit Mode
    if (document.getElementById('first_half_start')) {
        const getVal = id => {
            const el = document.getElementById(id);
            if (!el) return null;
            const val = el.value;
            return val === 'end' ? 31 : (parseInt(val) || null);
        };

        ['first_half_start','first_half_end','second_half_start','second_half_end'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('change', () => {
                updateHighlight(getVal('first_half_start'), getVal('first_half_end'), getVal('second_half_start'), getVal('second_half_end'));
            });
        });

        updateHighlight(getVal('first_half_start'), getVal('first_half_end'), getVal('second_half_start'), getVal('second_half_end'));
    }
    // View Mode
    else {
        const viewBox = document.querySelector('[data-fs]');
        if (viewBox) {
            const fs = parseInt(viewBox.dataset.fs) || null;
            const fe = viewBox.dataset.fe === 'end' ? 31 : (parseInt(viewBox.dataset.fe) || null);
            const ss = parseInt(viewBox.dataset.ss) || null;
            const se = viewBox.dataset.se === 'end' ? 31 : (parseInt(viewBox.dataset.se) || null);
            updateHighlight(fs, fe, ss, se);
        }
    }

    // Calendar highlight – huwag alisin kahit view mode
    function renderCalendar(selectedDates, viewMode = false) {
        // ... existing render logic ...
        selectedDates.forEach(date => {
            const cell = document.querySelector(`[data-date="${date}"]`);
            if (cell) {
                cell.classList.add('highlight');
            }
        });
    }

    let editMode = false;
    let originalValues = {};

    function enableEditMode() {
        editMode = true;

        // Save original values
        document.querySelectorAll('[data-field]').forEach(input => {
            originalValues[input.name] = input.value;
            input.removeAttribute('readonly');
        });

        document.getElementById('editBtn').style.display = 'none';
        document.getElementById('saveBtn').style.display = 'inline-block';
        document.getElementById('cancelBtn').style.display = 'inline-block';
    }

    function cancelEditMode() {
        editMode = false;

        // Restore original values
        document.querySelectorAll('[data-field]').forEach(input => {
            input.value = originalValues[input.name];
            input.setAttribute('readonly', true);
        });

        document.getElementById('editBtn').style.display = 'inline-block';
        document.getElementById('saveBtn').style.display = 'none';
        document.getElementById('cancelBtn').style.display = 'none';
    }

});


// DONE CHECKING
