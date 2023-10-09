<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Futsal Bookings</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Futsal Bookings</h1>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "futsal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM futsal_bookings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>User</th>
        <th>Pitch</th>
        <th>Booking Day</th>
        <th>Shift</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Actions</th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td>
            <td>" . $row["user"] . "</td>
            <td>" . $row["pitch"] . "</td>
            <td>" . $row["bookday"] . "</td>
            <td>" . $row["shift"] . "</td>
            <td>" . $row["contact"] . "</td>
            <td>" . $row["email"] . "</td>
            <td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results found";
    }

    $conn->close();
    ?>
</body>

</html>