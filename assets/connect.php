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
$Password = md5($_POST['Password']);
$ConfirmPassword = md5($_POST['ConfirmPassword']);


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
$checkUserQuery = "SELECT * FROM register WHERE Email = ? AND Username = ?";
$stmt = $conn->prepare($checkUserQuery);
$stmt->bind_param("ss", $Email, $Username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "User with this email already exists. Please use a different email.";
    $stmt->close();
    $conn->close();
    exit;
}

// Hash the password and confirm password using MD5
$hashedPassword = md5($Password);
$hashedConfirmPassword = md5($ConfirmPassword);

// Insert user data into the database using prepared statement
$insertQuery = "INSERT INTO register (Username, Email, Password, ConfirmPassword) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssss", $Username, $Email, $Password, $ConfirmPassword);

if ($stmt->execute()) {
    // Registration successful
    echo '<script>alert("Registration successful"); window.location.href="../Log In/login.php";</script>';
} else {
    // Registration failed
    echo '<script>alert("Error: Registration failed.");</script>';
    // Log or handle the error here
}


// Close the prepared statement and database connection
$stmt->close();
$conn->close();
