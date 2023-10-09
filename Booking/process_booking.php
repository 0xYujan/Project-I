<?php
if (isset($_POST['proceed'])) {
    // Include database configuration
    require_once('../assets/config.php');

    // Get form data and sanitize inputs
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $pitch = mysqli_real_escape_string($connection, $_POST['pitch']);
    $bookday = mysqli_real_escape_string($connection, $_POST['bookday']);
    $shift = mysqli_real_escape_string($connection, $_POST['shift']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Check if user exists
    $user_query = "SELECT * FROM register WHERE username = '$user'";
    $user_result = mysqli_query($connection, $user_query);

    if (mysqli_num_rows($user_result) == 0) {

        echo '<script>alert("Invalid user. Please Sign Up and try again.");</script>';
        header("Location: ../SignUp/signup.php");
        exit();
    }


    // Check pitch availability for the selected date and time
    $query = "SELECT * FROM futsal_bookings WHERE pitch = '$pitch' AND bookday = '$bookday' AND shift = '$shift'";
    $result = mysqli_query($connection, $query);



    if (mysqli_num_rows($result) == 0) {
        // Pitch is available, perform the booking
        $query = "INSERT INTO futsal_bookings (user, pitch, bookday, shift, contact, email, timecheck, confirm_key) VALUES ('$user', '$pitch', '$bookday', '$shift', '$contact', '$email', UNIX_TIMESTAMP(NOW()), 1)";

        if (mysqli_query($connection, $query)) {
            // Booking successful

            // Send email notification
            $to = $email;
            $subject = "Futsal Booking Confirmation";
            $message = "Hello $user,\n\nYour booking for the futsal pitch ($pitch) on $bookday at $shift has been confirmed.\n\nThank you!";
            $headers = "From: yujanr4@gmail.com";

            // Check if the email is sent successfully
            if (mail($to, $subject, $message, $headers)) {
                echo '<script>alert("Booking successful! An email notification has been sent.");</script>';
            } else {
                echo '<script>alert("Booking successful! Failed to send email notification.");</script>';
            }
        } else {
            // Booking failed
            echo '<script>alert("Booking failed. Please try again later.");</script>';
        }
    } else {
        // Pitch is not available, show an error message
        echo '<script>alert("Selected pitch is not available for the given date and time. Please choose a different time slot or pitch.");</script>';
    }

    // Close database connection
    mysqli_close($connection);
} else {
    // 'proceed' parameter is not set, handle the situation accordingly
    echo '<script>alert("Invalid request. Please try again.");</script>';
}

// Redirect back to the booking form
echo '<script>window.location.href = "booking.php";</script>';
