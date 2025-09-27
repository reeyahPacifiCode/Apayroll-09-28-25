// -------------CALENDAR MANAGEMENT-------------//
// Hindi nagana json rito, nilipat ko muna ulit sa original huhu.

document.addEventListener('DOMContentLoaded', function () {
    // ================================
    // EXISTING: CALENDAR SIDE (no change)
    // ================================
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth() + 1;
    let currentYear = currentDate.getFullYear();
    let selectedType = null; // "Regular" or "Special"
    let selectedDate = null;

    const monthSelect = document.getElementById('monthSelect');
    const yearSelect = document.getElementById('yearSelect');
    const calendarBody = document.getElementById('calendarBody');
    const holidayNameInput = document.getElementById('holidayNameInput');
    const addHolidayBtn = document.getElementById('addHolidayBtn');
    const holidayBtn = document.getElementById('holidayBtn');
    const specialBtn = document.getElementById('specialBtn');
    const holidayList = document.getElementById('holidayList');

    function generateCalendar(month, year) {
        calendarBody.innerHTML = '';
        const firstDay = new Date(year, month - 1, 1).getDay();
        const daysInMonth = new Date(year, month, 0).getDate();

        let date = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement('tr');
            for (let j = 0; j < 7; j++) {
                const cell = document.createElement('td');
                if (i === 0 && j < firstDay) {
                    cell.innerHTML = '';
                } else if (date > daysInMonth) {
                    break;
                } else {
                    cell.textContent = date;
                    cell.classList.add('calendar-cell');
                    cell.dataset.date = `${year}-${String(month).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                    cell.style.cursor = 'pointer';
                    cell.addEventListener('click', function () {
                        if (!selectedType) {
                            alert('Please select Holiday or Special first.');
                            return;
                        }

                        document.querySelectorAll('.calendar-cell').forEach(c => {
                            c.classList.remove('selected-holiday', 'selected-special');
                        });

                        this.classList.add(selectedType === 'Regular' ? 'selected-holiday' : 'selected-special');
                        selectedDate = this.dataset.date;
                        addHolidayBtn.disabled = false;
                    });

                    date++;
                }
                row.appendChild(cell);
            }
            calendarBody.appendChild(row);
        }
    }

    function resetButtonStyles() {
        holidayBtn.classList.remove('active');
        specialBtn.classList.remove('active');
    }

    holidayBtn.addEventListener('click', () => {
        selectedType = 'Regular';
        resetButtonStyles();
        holidayBtn.classList.add('active');
    });

    specialBtn.addEventListener('click', () => {
        selectedType = 'Special';
        resetButtonStyles();
        specialBtn.classList.add('active');
    });

    addHolidayBtn.addEventListener('click', () => {
        const name = holidayNameInput.value.trim();

        if (!selectedDate || !selectedType || !name) {
            alert('Complete the fields before adding.');
            return;
        }

        const existingDates = Array.from(holidayList.querySelectorAll('input[type="date"]'))
            .map(input => input.value);

        if (existingDates.includes(selectedDate)) {
            alert('This date is already added.');
            return;
        }

        const index = holidayList.querySelectorAll('tr').length;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="date" name="holidays[${index}][date]" class="form-control form-control-sm" value="${selectedDate}" readonly></td>
            <td><input type="text" name="holidays[${index}][name]" class="form-control form-control-sm" value="${name}"></td>
            <td>
                <select name="holidays[${index}][type]" class="form-select form-select-sm">
                    <option value="Regular" ${selectedType === 'Regular' ? 'selected' : ''}>Holiday</option>
                    <option value="Special" ${selectedType === 'Special' ? 'selected' : ''}>Special</option>
                </select>
            </td>
            <td><button type="button" class="btn btn-sm btn-danger remove-row">Delete</button></td>
        `;

        holidayList.appendChild(row);

        holidayNameInput.value = '';
        addHolidayBtn.disabled = true;
        selectedDate = null;
    });

    holidayList.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    document.getElementById('prevMonth').addEventListener('click', () => {
        if (currentMonth === 1) {
            currentMonth = 12;
            currentYear--;
        } else {
            currentMonth--;
        }
        monthSelect.value = String(currentMonth);
        yearSelect.value = String(currentYear);
        generateCalendar(currentMonth, currentYear);
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        if (currentMonth === 12) {
            currentMonth = 1;
            currentYear++;
        } else {
            currentMonth++;
        }
        monthSelect.value = currentMonth;
        yearSelect.value = currentYear;
        generateCalendar(currentMonth, currentYear);
    });

    monthSelect.addEventListener('change', () => {
        currentMonth = parseInt(monthSelect.value);
        generateCalendar(currentMonth, currentYear);
    });

    yearSelect.addEventListener('change', () => {
        currentYear = parseInt(yearSelect.value);
        generateCalendar(currentMonth, currentYear);
    });

    monthSelect.value = currentMonth;
    yearSelect.value = currentYear;
    generateCalendar(currentMonth, currentYear);


    // ================================
    // RIGHT SIDE VIEW / EDIT MODE
    // ================================
    const toggleBtn = document.getElementById('toggleModeBtn');
    const form = document.getElementById('holidayForm');

    // 🟢 Default: kung walang holidays, edit mode agad; kung meron, view mode
    let isEditMode = @json(!$hasHolidays);

    function setMode(editMode) {
        const inputs = form.querySelectorAll('input, select, button.remove-row');

        inputs.forEach(el => {
            if (el.type === 'button' && el.classList.contains('remove-row')) {
                // delete buttons visible only in edit mode
                el.style.display = editMode ? '' : 'none';
            } else if (el !== toggleBtn) {
                el.disabled = !editMode;
                if (el.tagName === 'INPUT' && !editMode) {
                    el.setAttribute('readonly', true);
                } else {
                    el.removeAttribute('readonly');
                }
            }
        });

        // ✅ Update button label
        toggleBtn.textContent = editMode ? 'Save' : 'Edit';
    }

    if (toggleBtn) {
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();

            if (!isEditMode) {
                // 📝 switch to edit mode
                isEditMode = true;
                setMode(true);
            } else {
                // 💾 save → submit form
                if (confirm("Are you sure you want to save all changes?")) {
                    form.submit();
                }
            }
        });

        // Initial state
        setMode(isEditMode);
    }

    console.log('Calendar + Holiday Management script loaded');

});


