<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "futsal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$Username = $_POST['Username'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$ConfirmPassword = $_POST['ConfirmPassword'];

// Server-side validation
if (empty($Username) || empty($Email) || empty($Password) || empty($ConfirmPassword)) {
    echo "All fields are required.";
    $conn->close();
    exit;
}

if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    $conn->close();
    exit;
}

if (strlen($Password) < 8) {
    echo "Password must be at least 8 characters.";
    $conn->close();
    exit;
}

if ($Password !== $ConfirmPassword) {
    echo "Password and Confirm Password must match.";
    $conn->close();
    exit;
}

// Check if the user with the same email exists
$checkUserQuery = "SELECT * FROM register WHERE Email = ?";
$stmt = $conn->prepare($checkUserQuery);
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "User with this email already exists. Please use a different email.";
    $stmt->close();
    $conn->close();
    exit;
}

// Hash the password for security (you should use a more secure hashing method)

$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
$hashedConfirmPassword = password_hash($ConfirmPassword, PASSWORD_DEFAULT);

// Insert user data into the database using prepared statement
$insertQuery = "INSERT INTO register (Username, Email, Password, ConfirmPassword) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssss", $Username, $Email, $hashedPassword, $hashedConfirmPassword);

if ($stmt->execute()) {
    echo "Registration successful";
    header("Location: ../Log In/login.php");
} else {
    echo "Error: Registration failed.";
    // Log or handle the error here
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
