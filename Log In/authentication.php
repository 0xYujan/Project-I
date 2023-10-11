<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "futsal";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if (empty($Email) || empty($Password)) {
        echo "Both Email and Password are required.";
        $conn->close();
        exit;
    }

    $checkUserQuery = "SELECT * FROM register WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("ss", $Email, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo "Login successful!";
        header("Location: ../HPA_Log_In/index.php");
        exit();
    } else {
        echo "Invalid Email or Password.";
    }

    $stmt->close();
    $conn->close();
}
