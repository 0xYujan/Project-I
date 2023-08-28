document.addEventListener("DOMContentLoaded", function() {
  const bookingDateInput = document.getElementById("bookingDate");
  const startTimeInput = document.getElementById("startTime");
  const endTimeInput = document.getElementById("endTime");
  const calculateBtn = document.getElementById("calculateBtn");
  const resultElement = document.getElementById("result");

  calculateBtn.addEventListener("click", function() {
    const courtName = document.getElementById("courtName").value;
    const startTime = startTimeInput.value.split(":")[0] + ":00";
    const endTime = endTimeInput.value.split(":")[0] + ":00";

    const bookingDate = new Date(bookingDateInput.value);
    const today = new Date();

    if (bookingDate < today) {
      resultElement.textContent = "Error: Please select a today or future date.";
    } else if (startTimeInput.value.split(":")[1] !== "00" || endTimeInput.value.split(":")[1] !== "00") {
      resultElement.textContent = "Error: Minutes must be set to 00.";
    } else {
      const startHours = parseInt(startTime.split(":")[0]);
      const endHours = parseInt(endTime.split(":")[0]);
      const duration = endHours - startHours;
      resultElement.textContent = `Court: ${courtName} | Duration: ${duration} hours`;
    }
  });
});
