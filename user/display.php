<?php
// Establish a database connection (same as in insert.php)
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "futsal";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user_data";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>User Data</h1>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>Name: " . $row['name'] . ", Email: " . $row['email'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
