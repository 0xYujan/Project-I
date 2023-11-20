<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    include("../assets/Login_nav.php");
	date_default_timezone_set('Asia/Kathmandu');
  ?>  <br><br><br>


    <?php 
     if ($_SESSION['admin'] == 1) {
        $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
		require 'config.php';?>
 <?php
        $que="select * from booking;";
	$run= $connect->query($que);

    // $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Sever.");
    // $que = "SELECT * FROM register WHERE email != 'code';";
    // $run = $connect->query($que);
    $count = mysqli_num_rows($run);
    ?>
    <div class="container">
        <h3>Reserved List</h3>
        <table border="2" width="90%">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Shift</th>
                <th>Email</th>
                <th>Contact No</th>
            </tr>
                <?php
                while ($row = $run->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['user']."</td>
                            <td>".$row['shift']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['contact']."</td>
                        </tr>";
                }
                ?>
          
        </table>
            </div>
           <?php } else{
                echo "Admin not verified! Please login as Admin.";
            }
   ?>


</body>
</html>