<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/CSS">
        th, td {
            padding: 5px; 
        }

        .container-main {
            margin-top: 20px; /* Add margin to create space between navbar and content */
        }
    </style>
</head>
<body>
<?php
session_start();

if (isset($_SESSION['email'])) {
    date_default_timezone_set('Asia/Kathmandu');

    include("../Final/Assets/user_nav.php"); ?><br><?php

    $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
    require 'config.php';

    $history = "select bookday from booking where confirm_key = 11";
                $test = $connect->query($history);
                $history=$test->fetch_assoc();
                
                $bookday=$history['bookday'];
        
            $timestamp = strtotime($bookday);
            $timecheck = $timestamp + 86400;
            $t = time();
    
            if ($t >= $timecheck) {
                $updateQuery = "UPDATE booking SET confirm_key = 100 WHERE confirm_key = 11 AND email = '" . $_SESSION['email'] . "' ";
                $connect->query($updateQuery);
            }

    $historyQuery = "SELECT booking.id, booking.user, booking.id AS booking_id, booking.bookday, payment.vno
                    FROM booking
                    LEFT JOIN payment ON booking.id = payment.booking_id
                    WHERE booking.confirm_key = 100 AND email = '" . $_SESSION['email'] . "'";
    
    $allBookings = $connect->query($historyQuery);
    $numBookings = $allBookings->num_rows;

    echo '<div class="container container-main" style="background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey;  
                                        box-shadow: 10px 10px 5px #DCDCDC;
                                        width:95%;">';

    echo '<h3><u>Your Bookings History</u></h3><br>';

    if ($numBookings > 0) {
        echo '<div class="container">
                <table border="2" width="90%">
                    <tr>
                        <th>History ID</th>
                        <th>User</th>
                        <th>Booking ID</th>
                        <th>Booked Date</th>
                        <th>Voucher Number</th>
                    </tr>';

        while ($booking = $allBookings->fetch_assoc()) {
            echo "<tr> 
                    <td>" . $booking['id'] . "</td>
                    <td>" . $booking['user'] . "</td>
                    <td>" . $booking['booking_id'] . "</td>
                    <td>" . $booking['bookday'] . "</td>
                    <td>" . $booking['vno'] . "</td>
                  </tr>";
        }

        echo '</table></div>';
    } else {
        echo '<h5 style="color:#777;">No booking history available!</h5>';
    }

    echo '</div>';
} else {
    header("Location: 404-page.php");
    exit();
}
?>
</body>
</html>
