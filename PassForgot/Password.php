<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection (replace with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "futsal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $token = bin2hex(random_bytes(16)); // Generate a random token

    // Update the user's reset_token in the database
    $updateQuery = "UPDATE users SET reset_token='$token' WHERE Email='$Email'";
    $conn->query($updateQuery);

    // Send an Email with the reset link containing the token
    $to = $Email;
    $subject = "Password Reset";
    $message = "Click the following link to reset your password: http://example.com/reset_password.php?token=$token";
    $headers = "From: webmaster@example.com";

    mail($to, $subject, $message, $headers);

    echo "Password reset link has been sent to your Email.";

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Forgot Password</title>
</head>

<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="Email">Email:</label>
            <input type="Email" id="Email" name="Email" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>

</html>