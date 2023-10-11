document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[name='myform']");
    const usernameInput = document.querySelector('input[name="Username"]');
    const emailInput = document.querySelector('input[name="Email"]');
    const passwordInput = document.querySelector('input[name="Password"]');
    const confirmPasswordInput = document.querySelector('input[name="ConfirmPassword"]');
    const termsCheckbox = document.querySelector('input[type="checkbox"]');

    form.addEventListener("submit", function (event) {
        let isValid = true;

        // Validate username
        if (usernameInput.value.trim() === '') {
            isValid = false;
            alert("Username is required.");
            usernameInput.classList.add("input-error");
            event.preventDefault();
        } else {
            usernameInput.classList.remove("input-error");
        }

        // Validate email
        if (!validateEmail(emailInput.value)) {
            isValid = false;
            alert("Invalid email address.");
            emailInput.classList.add("input-error");
            event.preventDefault();
        } else {
            emailInput.classList.remove("input-error");
        }

        // Validate password
        if (passwordInput.value.length < 8) {
            isValid = false;
            alert("Password must be at least 8 characters.");
            passwordInput.classList.add("input-error");
            event.preventDefault();
        } else {
            passwordInput.classList.remove("input-error");
        }

        // Confirm password
        if (passwordInput.value !== confirmPasswordInput.value) {
            isValid = false;
            alert("Password and Confirm Password must match.");
            confirmPasswordInput.classList.add("input-error");
            event.preventDefault();
        } else {
            confirmPasswordInput.classList.remove("input-error");
        }

        // Check terms and conditions
        if (!termsCheckbox.checked) {
            isValid = false;
            alert("You must agree to the terms & conditions.");
            event.preventDefault();
        }


        if (isValid) {

            const errorMessages = document.querySelectorAll(".error-message");
            errorMessages.forEach(function (element) {
                element.remove();
            });
        }
    });

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
