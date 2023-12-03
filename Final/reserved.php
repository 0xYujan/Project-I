<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <?php
    session_start();

    if ($_SESSION['admin'] == 1) {
        include("../Final/Assets/admin_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }

    date_default_timezone_set('Asia/Kathmandu');
    ?><br><br><br>

    <?php
    if ($_SESSION['admin'] == 1) {
        $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Sever.");
        require 'config.php';

        echo '<div class="container" style="background-color: #eee;
            
            width:90%;
            margin: 50px;
            padding:0 0 20px 0;">';

        $que = "select * from booking where confirm_key = 1;";
        $run = $connect->query($que);
        $count = mysqli_num_rows($run);

        echo '
        <div class="container">
            <h3>Reserved List</h3>
            <table border="2" width="90%">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Shift</th>
                    <th>Email</th>
                    <th>Contact No</th>
                </tr>';

        while ($row = $run->fetch_assoc()) {
            echo "
                <tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['user'] . "</td>
                    <td>" . $row['shift'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['contact'] . "</td>
                </tr>";
        }

        echo '</table>
            </div>';
        echo '</div>';
    } else {
        header("Location: 404-page.php");
        exit();
    }

    $connect->close();
    ?>

</body>

</html>
