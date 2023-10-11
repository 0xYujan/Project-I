<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "futsal";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Username = $_POST['Username'];
$Email = $_POST['Email'];
$Password = md5($_POST['Password']);
$ConfirmPassword = md5($_POST['ConfirmPassword']);


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

$hashedPassword = md5($Password);
$hashedConfirmPassword = md5($ConfirmPassword);

$insertQuery = "INSERT INTO register (Username, Email, Password, ConfirmPassword) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssss", $Username, $Email, $Password, $ConfirmPassword);

if ($stmt->execute()) {
    echo '<script>alert("Registration successful"); window.location.href="../Log In/login.php";</script>';
} else {
    echo '<script>alert("Error: Registration failed.");</script>';
}


$stmt->close();
$conn->close();
