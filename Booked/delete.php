<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futsal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM futsal_bookings WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
}

$conn->close();
