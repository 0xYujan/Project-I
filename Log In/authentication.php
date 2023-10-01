<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "futsal";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Email = $_POST['Email'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM register WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($Password, $row['Password'])) {
        echo "Login successful"; // Redirect user to dashboard or desired page
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found"; // Handle the case when the user does not exist
}

$stmt->close();
$conn->close();
