<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .user-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['email'])) {
            include("../Final/Assets/user_nav.php");?><br><br><br><br><br><?php

            $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
            mysqli_select_db($connect, "Futsal1");

            $userEmail = $_SESSION['email'];

            $query = "SELECT * FROM `register` WHERE `email` = '$userEmail'";
            $result = $connect->query($query);

            if ($result && $result->num_rows > 0) {
                $userDetails = $result->fetch_assoc();
                echo "<div class='user-details'>";
                echo "<h2>User Details</h2>";
                echo "<p>First Name: " . $userDetails['fname'] . "</p>";
                echo "<p>Last Name: " . $userDetails['lname'] . "</p>";
                echo "<p>Email: " . $userDetails['email'] . "</p>";
                echo "<p>Contact: " . $userDetails['contact'] . "</p>";
                echo "</div>";
            } else {
                echo "<p>User details not found.</p>";
            }
        } else {
            header("Location: 404-page.php");
            exit();
        }
    ?>
</body>
</html>
