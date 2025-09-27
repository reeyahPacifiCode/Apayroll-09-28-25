// Heres the scripts of login.php, register.php and forgot.php

//-------------------LOG IN SCRIPTS------------------------------//
    document.getElementById('showPassword').addEventListener('change', function () {
        const passwordInput = document.querySelector('input[name="password"]');
        passwordInput.type = this.checked ? 'text' : 'password';
    });

    window.addEventListener('load', function () {
        document.querySelectorAll('input[type="text"], input[type="email"]').forEach(input => {
            input.value = '';
        });
    });

//------------------- REHISTRATION SCRIPTS------------//
        document.getElementById('showPassword').addEventListener('change', function () {
            const type = this.checked ? 'text' : 'password';
            document.getElementById('password').type = type;
            document.getElementById('confirm_password').type = type;
        });

        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const message = document.getElementById('passwordMessage');

        function checkPasswords() {
            if (!confirmPassword.value) {
                message.textContent = "";
                confirmPassword.classList.remove("is-valid", "is-invalid");
                return;
            }

            if (password.value === confirmPassword.value) {
                message.textContent = "Passwords match ✅";
                message.classList.remove("text-danger");
                message.classList.add("text-success");
                confirmPassword.classList.add("is-valid");
                confirmPassword.classList.remove("is-invalid");
            } else {
                message.textContent = "Passwords do not match ❌";
                message.classList.remove("text-success");
                message.classList.add("text-danger");
                confirmPassword.classList.add("is-invalid");
                confirmPassword.classList.remove("is-valid");
            }
        }

        password.addEventListener('input', checkPasswords);
        confirmPassword.addEventListener('input', checkPasswords);


//-------------------FORGOT PASSWORD SCRIPTS
        function togglePassword() {
            const pw1 = document.getElementById("password");
            const pw2 = document.getElementById("confirm_password");
            const type = pw1.type === "password" ? "text" : "password";
            pw1.type = type;
            if (pw2) pw2.type = type;
        }

