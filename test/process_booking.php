<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$date = $_POST['date'];
$timeSlot = $_POST['time_slot'];

// Check if the selected time slot is available
$sql = "SELECT * FROM bookings WHERE date = '$date' AND time_slot = '$timeSlot'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Selected time slot is not available. Please choose another time slot.";
} else {
    // If the time slot is available, insert the booking into the database
    $insertSql = "INSERT INTO bookings (date, time_slot, status) VALUES ('$date', '$timeSlot', 'booked')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Booking successful! Your time slot is reserved.";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
