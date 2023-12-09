<html>
<head>
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body><br><br><br><br><br><br>
    <div class="container">
        <form class="form-signin" action="#" method="POST">
            <h2 class="form-signin-heading" style="color:white;">Forgot Password</h2>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Email/Username</span>
                <input type="email" name="email" class="form-control" placeholder="example@abc.com" required>
            </div>
            <br />
            <button class="btn btn-lg btn-primary " type="submit">Forgot Password</button>
            <a class="btn btn-lg btn-primary " href="login.php">Login</a>
        </form>

        <?php

        include("../Final/Assets/out_user_nav.php");
        ?>
        <?php
        $con = mysqli_connect("localhost", "root", "", "Futsal2");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST) && !empty($_POST)) {
            $email = $_POST['email'];
            $sql = "SELECT * FROM register WHERE email = '$email'";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $r = mysqli_fetch_assoc($res);

                $password = bin2hex(random_bytes(4));
                $updateTokenSql = "UPDATE register SET password = '$password' WHERE email = '$email'";
                $updateTokenResult = mysqli_query($con, $updateTokenSql);
                $to = $r['email'];
                $subject = "Your Recovered Password!";
                $message = "Please use this password to login: $password";
                $headers = "From: $email";
                if (mail($to, $subject, $message, $headers)) {
                    echo '<script language="javascript">
                    alert("Your Password has been sent to your email id");
                   
                    </script>';
                } else {
                    echo '<script language="javascript">
                    alert("Failed to Recover your password, try again<br>Check Your internet Connection!");
                    </script>';
                }
            } else {
                echo '<script language="javascript">
                alert("User name does not exist in the database");
                </script>';
            }
        }
        ?>
    </div>
</body>
</html>
