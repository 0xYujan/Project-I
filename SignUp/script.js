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
            usernameInput.classList.add("input-error"); // Add the input-error class
            event.preventDefault(); // Prevent form submission
        } else {
            usernameInput.classList.remove("input-error"); // Remove the input-error class
        }

        // Validate email
        if (!validateEmail(emailInput.value)) {
            isValid = false;
            alert("Invalid email address.");
            emailInput.classList.add("input-error"); // Add the input-error class
            event.preventDefault(); // Prevent form submission
        } else {
            emailInput.classList.remove("input-error"); // Remove the input-error class
        }

        // Validate password
        if (passwordInput.value.length < 8) {
            isValid = false;
            alert("Password must be at least 8 characters.");
            passwordInput.classList.add("input-error"); // Add the input-error class
            event.preventDefault(); // Prevent form submission
        } else {
            passwordInput.classList.remove("input-error"); // Remove the input-error class
        }

        // Confirm password
        if (passwordInput.value !== confirmPasswordInput.value) {
            isValid = false;
            alert("Password and Confirm Password must match.");
            confirmPasswordInput.classList.add("input-error"); // Add the input-error class
            event.preventDefault(); // Prevent form submission
        } else {
            confirmPasswordInput.classList.remove("input-error"); // Remove the input-error class
        }

        // Check terms and conditions
        if (!termsCheckbox.checked) {
            isValid = false;
            alert("You must agree to the terms & conditions.");
            event.preventDefault(); // Prevent form submission
        }

        // If the form is valid, you can proceed with submission
        if (isValid) {
            // Remove any previous error messages
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
