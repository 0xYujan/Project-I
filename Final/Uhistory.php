<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/CSS">
        th,td{
            padding:5px; 
        }
    </style>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['email'])) {
    include("../Final/Assets/user_nav.php");
} else {
    header("Location: 404-page.php");
    exit();
}

date_default_timezone_set('Asia/Kathmandu');
?><br><br><br>

<?php
if (isset($_SESSION['email'])) {
    $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
    require 'config.php';

    $history = "SELECT bookday FROM booking WHERE confirm_key = 11 AND email = '" . $_SESSION['email'] . "'";
    $test = $connect->query($history);
    $history = $test->fetch_assoc();  
    $bookday = $history['bookday'];

    $timestamp = strtotime($bookday);
    $timecheck = $timestamp + 86400;
    $t = time();

    if ($t >= $timecheck) {
        $updateQuery = "UPDATE booking SET confirm_key = 100 WHERE confirm_key = 11 AND email = '" . $_SESSION['email'] . "'";
        $connect->query($updateQuery);
    }

    echo '<div class="container" style="background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey;  
                                        box-shadow: 10px 10px 5px #DCDCDC;
                                        width:95%;
                                        margin: 20px;">
                  <h3><u>Your Bookings History</u></h3><br>';

    $historyQuery = "SELECT * FROM booking WHERE confirm_key = 100 AND email = '" . $_SESSION['email'] . "'";
    $allbookings = $connect->query($historyQuery);

    $i = 0;

    echo '
    <div class="container">
        <table border="2" width="90%">
            <tr>
                <th>History ID</th>
                <th>User</th>
                <th>Booking ID</th>
                <th>Booked Date</th>
                <th>Voucher Number</th>
            </tr>';

    while ($booking = $allbookings->fetch_assoc()) {
        echo " <tr> 
                        <td> " . $booking['id'] . "</td>
                        <td> " . $booking['user'] . "</td>
                        <td> " . $booking['id'] . "</td>
                        <td> " . $booking['bookday'] . "</td>
                        <td> " . $booking['vno'] . "</td>
                </tr";
        $i++;
    }

    echo '</table>
        </div>';

    if ($i == 0) {
        echo '<h5 style="color:#777;">No record!</h5>';
    }

    echo '</div>';
} else {
    header("Location: 404-page.php");
    exit();
}
?>

</body>
</html>
