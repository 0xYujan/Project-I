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

    <style>
        

.container {
    width: 50%;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #3c763d;
}

.alert-danger {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
}


    </style>

</head>

<body>
    <br><br><br><br><br>

    <div class="container">
        <h2>Update Password</h2>

        <?php
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
