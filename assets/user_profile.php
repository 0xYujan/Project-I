<?php
// Assuming you have established a database connection here
$servername = "localhost";
$username = "root";
$password = "";
$database = "futsal";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have the user's unique ID stored in a session variable after login
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if user is not logged in
    exit();
}

$userID = $_SESSION['user_id'];

// Retrieve user profile information from the database based on the user's ID
$sql = "SELECT * FROM register WHERE id = $userID"; // Replace "users" with your actual table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    // Add more fields as needed
} else {
    echo "User not found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Profile</title>
    <!-- Add your CSS styles or link to external CSS files here -->
</head>

<body>
    <h1>User Profile</h1>
    <p><strong>Username:</strong> <?php echo $username; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <!-- Display more user profile information as needed -->

    <!-- You can provide options for the user to edit their profile, change password, etc. -->
    <!-- Example: <a href="edit_profile.php">Edit Profile</a> -->

    <!-- Add other profile-related content and functionality as needed -->

    <!-- Add your scripts or link to external JS files here if necessary -->
</body>

</html>