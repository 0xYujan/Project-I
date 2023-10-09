<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futsal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert court into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $court_name = $_POST["court_name"];
    $address = $_POST["address"];
    $availability = $_POST["availability"];
    $open_time = $_POST["open_time"];
    $close_time = $_POST["close_time"];
    $map_link = $_POST["map_link"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $sql = "INSERT INTO futsal_courts (court_name, address, availability, open_time, close_time, map_link, price, image)
            VALUES ('$court_name', '$address', '$availability', '$open_time', '$close_time', '$map_link', '$price', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New court created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
