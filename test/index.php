<!DOCTYPE html>
<html>

<head>
    <title>Futsal Court Management</title>
</head>

<body>
    <h1>Add Futsal Court</h1>
    <form method="post" action="insert_court.php">
        Court Name: <input type="text" name="court_name" required><br>
        Address: <input type="text" name="address" required><br>
        Availability:
        <select name="availability">
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
        </select><br>
        Open Time: <input type="time" name="open_time" required><br>
        Close Time: <input type="time" name="close_time" required><br>
        Map Link: <input type="text" name="map_link" required><br>
        Price: <input type="number" name="price" required><br>
        Image URL: <input type="file" name="image"><br>
        <input type="submit" value="Add Court">
    </form>

    <h2>Available Futsal Courts</h2>
    <?php
    // Display courts from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "futsal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM futsal_courts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "Court Name: " . $row["court_name"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "Availability: " . $row["availability"] . "<br>";
            echo "Open Time: " . $row["open_time"] . "<br>";
            echo "Close Time: " . $row["close_time"] . "<br>";
            echo "Map Link: <a href='" . $row["map_link"] . "'>" . $row["map_link"] . "</a><br>";
            echo "Price: $" . $row["price"] . "<br>";
            if (!empty($row["image"])) {
                echo "Image: <img src='" . $row["image"] . "' alt='Court Image' width='200'><br>";
            }
            echo "</div><hr>";
        }
    } else {
        echo "No courts available";
    }

    $conn->close();
    ?>
</body>

</html>