<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking System</title>
    <link rel="stylesheet" href="../SignUp/style.css">
    <script src="javascript/jvs.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
 
<body>

<?php
    // session_start();
    
    include("../assets/Logout_nav.php"); ?>

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
            <form name="myform" method="post" action="customer.php" id= "myForm" onsubmit="return checkpw()">
                <div class="input-boxx">
                    <input type="text" id="fname" name="fname" placeholder="example">
                    <label>First Name</label>
               
                    <input type="text" name="lname" id="lname" placeholder="example" style="margin-left: 4%;">
                    <label style="top:-30%; left:52%; ">Last Name</label>
                    
                </div>

                <div class="input-boxx">
                    <input type="email" id="email" name="email" required placeholder="youremail@example.com">
                    <label>Email</label>

                    <input type="text" id="contact" name="contact" placeholder="Your contact number" style="margin-left: 4%;">
                    <label style="top:-30%; left:52%; ">Contact</label>
                </div>

                <div class="input-box">
                    <input type="password" id="password" name="password" required placeholder="*************">
                    <label>Password</label>
                </div>

                <div class="input-box">
                    <input type="password" name="cpassword" id="cpassword" required placeholder="*************">
                    <label>Confirm Password</label>
                </div>

                <div class="terms-conditions">
                    <label><input type="checkbox">I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn" name="btnSubmit" value="Register" onclick="checkpw();" class="loginbutton"><strong>SIGN UP</strong></button>
                <div class="login-register">
                    <p>Already have an account? <a href="../Final/login.php" class="register-link">Log In</a></p>
                </div><br><br><br>
            </form>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>