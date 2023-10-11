<?php
if (isset($_POST['proceed'])) {
    // Include database configuration
    // require_once('../assets/config.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "futsal";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $pitch = mysqli_real_escape_string($connection, $_POST['pitch']);
    $bookday = mysqli_real_escape_string($connection, $_POST['bookday']);
    $shift = mysqli_real_escape_string($connection, $_POST['shift']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $user_query = "SELECT * FROM register WHERE username = '$user'";
    $user_result = mysqli_query($connection, $user_query);

    if (mysqli_num_rows($user_result) == 0) {

        echo '<script>alert("Invalid user. Please Sign Up and try again.");</script>';
        header("Location: ../SignUp/signup.php");
        exit();
    }


    $query = "SELECT * FROM futsal_bookings WHERE pitch = '$pitch' AND bookday = '$bookday' AND shift = '$shift'";
    $result = mysqli_query($connection, $query);



    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO futsal_bookings (user, pitch, bookday, shift, contact, email, timecheck, confirm_key) VALUES ('$user', '$pitch', '$bookday', '$shift', '$contact', '$email', UNIX_TIMESTAMP(NOW()), 1)";

        if (mysqli_query($connection, $query)) {
            // Booking successful

            // Send email notification
            $to = $email;
            $subject = "Futsal Booking Confirmation";
            $message = "Hello $user,\n\nYour booking for the futsal pitch ($pitch) on $bookday at $shift has been confirmed.\n\nThank you!";
            $headers = "From: yujanr4@gmail.com";

            if (mail($to, $subject, $message, $headers)) {
                echo '<script>alert("Booking successful! An email notification has been sent.");</script>';
            } else {
                echo '<script>alert("Booking successful! Failed to send email notification.");</script>';
            }
        } else {
            echo '<script>alert("Booking failed. Please try again later.");</script>';
        }
    } else {
        echo '<script>alert("Selected pitch is not available for the given date and time. Please choose a different time slot or pitch.");</script>';
    }

    mysqli_close($connection);
} else {
    echo '<script>alert("Invalid request. Please try again.");</script>';
}

echo '<script>window.location.href = "booking.php";</script>';
