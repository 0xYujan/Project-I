<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking System</title>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<!-- <header class="header">
    <nav class="navbar">
        <a href="#">HOME</a>
        <a href="#">COURTS</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT</a>
    </nav>
    <form action="#" class="search-bar">
        <input type="text" placeholder="Search.....">
        <button type="submit"><i class='bx bx-search'></i></button>
    </form>
</header>  -->

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
        <form name="myform" method="post" action="#">
            <div class="input-box">
                <input type="text" name="name" placeholder="example">
                <label>Username</label>
            </div>

            <div class="input-box">
                <input type="email" required placeholder="youremail@example.com">
                <label>Email</label>
            </div>

            <div class="input-box">
                <input type="password" required placeholder="*************">
                <label>Password</label>
            </div>

            <div class="input-box">
                <input type="password" required placeholder="*************">
                <label>Conform Password</label>
            </div>

            <div class="terms-conditions">
                <label><input type="checkbox">I agree to the terms & conditions</label>
            </div>
            <button type="submit" class="btn">SIGN UP</button>
            <div class="login-register">
                <p>Already have an account? <a href="LogIn/login.php" class="register-link">Log In</a></p>
            </div>
        </form>
    </div>

</div>
    <script src="script.js"></script>
</body>
</html>