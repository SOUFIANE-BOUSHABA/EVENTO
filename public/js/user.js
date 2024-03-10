document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        const firstName = document.getElementById("firstName").value.trim();
        const lastName = document.getElementById("lastName").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const passwordConfirmation = document.getElementById("passwordConfirmation").value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        if (firstName === "" || lastName === "") {
            showError("Please enter your first and last name.");
            return false;
        }
        if (!emailRegex.test(email)) {
            showError("Please enter a valid email address.");
            return false;
        }
        if (!passwordRegex.test(password)) {
            showError("Please enter a strong password (at least 8 characters, one uppercase, one lowercase, one digit).");
            return false;
        }
        if (password !== passwordConfirmation) {
            showError("Password confirmation does not match.");
            return false;
        }
        return true;
    }

    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message,
        });
    }
});



