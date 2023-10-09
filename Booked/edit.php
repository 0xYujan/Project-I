<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futsal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM futsal_bookings WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['user'];
        $pitch = $_POST['pitch'];
        $bookday = $_POST['bookday'];
        $shift = $_POST['shift'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];


        $sql = "UPDATE futsal_bookings SET user='$user', pitch='$pitch', bookday='$bookday', shift='$shift', contact='$contact', email='$email' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Booking updated successfully";
        } else {
            echo "Error updating booking: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-right: 400px;
            /* margin-bottom: 30px; */
            text-align: right;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        input[type=text],
        input[type=date],
        input[type=email] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    
    </style>
</head>

<body>

    <h2>Edit Booking</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>">
        User: <input type="text" name="user" value="<?php echo $row['user']; ?>"><br>
        Pitch: <input type="text" name="pitch" value="<?php echo $row['pitch']; ?>"><br>
        Booking Day: <input type="date" name="bookday" value="<?php echo $row['bookday']; ?>"><br>
        Shift: <input type="text" name="shift" value="<?php echo $row['shift']; ?>"><br>
        Contact: <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>