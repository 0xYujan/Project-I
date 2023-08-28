function validateForm() {
    var name = document.forms["myform"]["name"].value;
    var email = document.forms["myform"]["email"].value;
    var password = document.forms["myform"]["password"].value;
    var confirmPassword = document.forms["myform"]["confirm_password"].value;
    var agreeCheckbox = document.forms["myform"]["agree"];

    if (name === "" || email === "" || password === "" || confirmPassword === "") {
        alert("All fields are required");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    if (!agreeCheckbox.checked) {
        alert("Please agree to the terms and conditions");
        return false;
    }

    if (!validateEmail(email)) {
        alert("Invalid email format");
        return false;
    }

    // You can add more specific validation rules here

    return true;
}

function validateEmail(email) {
    var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
}