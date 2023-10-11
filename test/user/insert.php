<?php
// Establish a database connection (you should replace these values with your own)
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "futsal";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form data
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO user_data (name, email) VALUES ('$name', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
