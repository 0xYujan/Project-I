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
        <div class="register-text">
            <h2>REGISTRATION AREA</h2>
        </div>

    </div>
    <div class="signup-text">
        <h2>Sign Up to <br> access <br>Futsal</h2>
    </div>

    <div class="logreg-box">
        <div class="form-box register">
            <form name="myform" method="post" action="../assets/connect.php">
                <div class="input-box">
                    <input type="text" name="Username" placeholder="example">
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <input type="email" name="Email" required placeholder="youremail@example.com">
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <input type="password" name="Password" required placeholder="*************">
                    <label>Password</label>
                </div>

                <div class="input-box">
                    <input type="password" name="ConfirmPassword" required placeholder="*************">
                    <label>Confirm Password</label>
                </div>

                <div class="terms-conditions">
                    <label><input type="checkbox">I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn"><strong>SIGN UP</strong></button>
                <div class="login-register">
                    <p>Already have an account? <a href="../Log In/login.php" class="register-link">Log In</a></p>
                </div><br><br><br>
            </form>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>