const openBtn = document.querySelector('.button');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('close-btn');

openBtn.addEventListener('click', () => {
    overlay.style.display = 'flex';
});

closeBtn.addEventListener('click', () => {
    overlay.style.display = 'none';
});



//----------------------------------------------------------//
// Sample array to store booked dates (you would replace this with data from your backend)
const bookedDates = ["2023-09-30", "2023-10-05", "2023-10-12"];

document.addEventListener("DOMContentLoaded", function () {
    const openBtn = document.querySelector('.button');
    const overlay = document.getElementById('overlay');
    const closeBtn = document.getElementById('close-btn');
    const dateInput = document.getElementById('date');
    const bookingForm = document.querySelector('form');

    openBtn.addEventListener('click', () => {
        overlay.style.display = 'flex';
    });

    closeBtn.addEventListener('click', () => {
        overlay.style.display = 'none';
    });

    bookingForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const selectedDate = dateInput.value;

        // Check if the selected date is in the array of booked dates
        if (bookedDates.includes(selectedDate)) {
            alert("This date is already booked. Please choose another date.");
        } else {
            // If not booked, you can proceed with the booking logic here
            alert("Booking successful!");
            overlay.style.display = 'none';
        }
    });
});


// ...-------------------------------

bookingForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const selectedDate = dateInput.value;

    // Check if the selected date is in the array of booked dates
    if (bookedDates.includes(selectedDate)) {
        // Use the alert-red class to change text color to red
        alert("This date is already booked. Please choose another date.");
        document.querySelector('.swal-text').classList.add('alert-red');
    } else {
        // If not booked, you can proceed with the booking logic here
        alert("Booking successful!");
        overlay.style.display = 'none';
    }
});

// ...
