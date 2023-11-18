<?php
if (isset($_POST['proceed'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "futsal";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $bookday = mysqli_real_escape_string($connection, $_POST['bookday']);
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $bookday = mysqli_real_escape_string($connection, $_POST['bookday']);
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $bookday = mysqli_real_escape_string($connection, $_POST['bookday']);

    // Extract hour and minute from the shift value
    list($hour, $minute) = explode('-', $_POST['shift']);

    // Check if it's AM or PM and adjust the hour accordingly
    if (strpos($_POST['shift'], 'PM') !== false && $hour != 12) {
        $hour += 12;
    } elseif (strpos($_POST['shift'], 'AM') !== false && $hour == 12) {
        $hour = 0;
    }

    // Create the formatted time string
    $timeString = $bookday . ' ' . sprintf('%02d', $hour) . ':' . sprintf('%02d', $minute) . ':00';

    // Create a new DateTime object with the correctly formatted time string
    $bookingDateTime = new DateTime($timeString);

    // Check if the booking time is at least 2 hours before the game starts
    $currentDateTime = new DateTime();
    $timeDifference = $currentDateTime->diff($bookingDateTime);

    if ($timeDifference->h < 2) {
        echo '<script>alert("Booking must be made at least 2 hours before the game starts.");</script>';
    } else {
        // Check if there is a waiting list
        $waiting_query = "SELECT * FROM futsal_bookings WHERE bookday = '$bookday' AND shift = '$timeString' AND status = 'waiting' ORDER BY timecheck ASC LIMIT 1";
        $waiting_result = mysqli_query($connection, $waiting_query);

        if (mysqli_num_rows($waiting_result) > 0) {
            $waiting_row = mysqli_fetch_assoc($waiting_result);
            $waiting_user = $waiting_row['user'];

            echo '<script>alert("Payment pending from previous booking. Please try again later.");</script>';
        } else {
            // Insert the booking into the database with status 'waiting'
            $query = "INSERT INTO futsal_booking (user, bookday, shift, contact, email, timecheck, status) VALUES ('$user', '$bookday', '$timeString', '$contact', '$email', UNIX_TIMESTAMP(NOW()), 'waiting')";

            if (mysqli_query($connection, $query)) {
                echo '<script>alert("Booking successful! Payment must be done within 2 hours before the game starts.");</script>';
            } else {
                echo '<script>alert("Booking failed. Please try again later.");</script>';
            }
        }
    }

    mysqli_close($connection);
    echo '<script>window.location.href = "booking.php";</script>';
} else {
    echo '<script>alert("Invalid request. Please try again.");</script>';
    echo '<script>window.location.href = "booking.php";</script>';
}
?>
