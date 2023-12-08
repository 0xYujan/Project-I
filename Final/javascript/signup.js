document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form[name='myform']");
  const fnameInput = document.getElementById("fname");
  const lnameInput = document.getElementById("lname");
  const emailInput = document.getElementById("email");
  const contactInput = document.getElementById("contact");
  const passwordInput = document.getElementById("password");
  const cpasswordInput = document.getElementById("cpassword");
  const termsCheckbox = document.getElementById("termsCheckbox");

  form.addEventListener("submit", function (event) {
    let isValid = true;

    // Validate first name
    if (fnameInput.value.trim() === "") {
      isValid = false;
      alert("First name is required.");
      fnameInput.classList.add("input-error");
      event.preventDefault();
    } else {
      fnameInput.classList.remove("input-error");
    }

    // Validate last name
    if (lnameInput.value.trim() === "") {
      isValid = false;
      alert("Last name is required.");
      lnameInput.classList.add("input-error");
      event.preventDefault();
    } else {
      lnameInput.classList.remove("input-error");
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

    // Validate contact
    if (contactInput.value.trim() === "") {
      isValid = false;
      alert("Contact number is required.");
      contactInput.classList.add("input-error");
      event.preventDefault();
    } else {
      contactInput.classList.remove("input-error");
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
    if (passwordInput.value !== cpasswordInput.value) {
      isValid = false;
      alert("Password and Confirm Password must match.");
      cpasswordInput.classList.add("input-error");
      event.preventDefault();
    } else {
      cpasswordInput.classList.remove("input-error");
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
