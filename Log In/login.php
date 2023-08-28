<?php
// Assuming you have defined database credentials
$host = "your_host";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Establishing database connection
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize user inputs here
    // Perform SQL query to check if the email and password match a record
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        session_start();
        $_SESSION["email"] = $email;
        // Redirect to the member area or another page
        header("Location: member_area.php");
        exit();
    } else {
        // Failed login, show an error message
        $error = "Invalid email or password.";
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking System</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php include("../assets/Logout_nav.php"); ?>
    <div class="row-line">
        <div class="members-text">
            <h2>MEMBERS AREA</h2>
        </div>

    </div>
    <div class="login-text">
        <h2>Login to <br> access <br>Futsal</h2>
    </div>

    <div class="logreg-box">
        <div class="form-box login">
            <form action="#">
                <div class="input-box">
                    <input type="email" required placeholder="youremail@example.com">
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <input type="password" required placeholder="***************">
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit" class="btn"><strong>LOGIN</strong></button>
                <div class="login-register">
                    <p>Don't have an account? <a href="../SignUp/signup.php" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>