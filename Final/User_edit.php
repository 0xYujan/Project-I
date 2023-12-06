<?php
session_start();
if (isset($_SESSION['email'])) {
    include("../Final/Assets/user_nav.php");
} else {
    header("Location: 404-page.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email'])) {
        $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
        require 'config.php';
    
        $pws = "SELECT password FROM register WHERE email = '" . $_SESSION['email'] . "'";
        $test = $connect->query($pws);
        $pws = $test->fetch_assoc();  
        $password = $pws['password'];


        
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password != $oldPassword) {
        $error = "Passwords do not match.";
    } 
    else if ($newPassword != $confirmPassword) {
        $error = "Passwords do not match."; 
       
    }else{
        //$hashedPwd = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = "UPDATE register SET password='" . $newPassword . "' WHERE email='".$_SESSION['email']."' ";
        echo "<script>alert('Your Password has been changed successfully!');</script>";
            session_destroy();    
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <br><br><br><br><br>

    <div class="container">
        <h2>Update Password</h2>

        <?php
        // Display success or error messages
        if (isset($success)) {
            echo '<div class="alert alert-success">' . $success . '</div>';
        }

        if (isset($error)) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
        ?>

        <form method="post" action="">
        <div class="form-group">
                <label >Old Password:</label>
                <input type="password" name="old_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label >New Password:</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label >Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>

</body>

</html>
