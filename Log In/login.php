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

    <header class="header">
        <nav class="navbar">
            <a href="#">HOME</a>
            <a href="#">COURTS</a>
            <a href="#">ABOUT</a>
            <a href="#">CONTACT</a>
        </nav>
        <nav class="login-signup">
            <a href="#">LOGIN</a>
            <a href="#">SIGNUP</a>
        </nav>
    </header>
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
                    <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

    </div>


    <script src="script.js"></script>
</body>

</html>