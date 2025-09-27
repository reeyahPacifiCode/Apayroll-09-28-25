// Heres the scripts for app.php and hr.php

// ********************************** APP SCRIPTS ************** //
const sidebar = document.querySelector('.sidebar');
const toggleIcon = document.getElementById('sidebarToggle');

toggleIcon.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');

    // Toggle icon symbol
    if (sidebar.classList.contains('collapsed')) {
        toggleIcon.textContent = '☰';
    } else {
        toggleIcon.textContent = '☰';
    }
});

//For icons? I guess lucide
lucide.createIcons();
document.getElementById('department').addEventListener('change', function () {
this.form.submit();
});



// ********************************** HR SCRIPTS ************** //
// Auto-dismiss flash messages after 3 seconds
setTimeout(() => {
    const flash = document.getElementById('flash-message');
    if (flash) {
        flash.classList.remove('show');
        flash.classList.add('fade');
        setTimeout(() => flash.remove(), 500); // wait for fade animation
    }
}, 3000);





// DONE CHEKCING
