<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>

    <style type="text/css">
		 @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Oxygen', sans-serif;
}
        body {
            background-image: url(img/backgr.jpg);
        }

        th, td {
            padding: 5px;
        }

        .container {
            background-color: #eee;
            overflow: auto;
            border: 2px solid grey;
            margin: 50px;
            box-shadow: 10px 10px 5px #DCDCDC;
            padding: 20px;
        }

        h3 {
            background-color: #222;
            color: #eee;
            padding: 10px;
        }

        .button {
            background-color: skyblue;
            color: #222;
            padding: 8px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include("../assets/Login_nav.php");
	date_default_timezone_set('Asia/Kathmandu');

?><br><br>
<?php
    if ($_SESSION['admin'] == 1) {
        $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
		require 'config.php';
		
		if(isset($_POST['approve']))
		{
			$book_id = $_POST['bookingid'];
 			$approv = "update booking set confirm_key = 11 where id = '$book_id'";
			$connect->query($approv);

			/* for sending mail to the user after confirmation!
			$t=time()+13500;
			$time=date("Y:M:d @ H:i:s",$t);

			$to = $_POST['email'];
			$subject = "My subject";
			$txt = "Hi $user, \  Your booking has been approved for the date and time mentioned below.
					Thank You! Mail sent @ $time";
			$headers = "From: webmaster@example.com" . "\r\n" .
					   "CC: somebodyelse@example.com";

			mail($to,$subject,$txt,$headers);*/
		}
		if(isset($_POST['decline']))
		{
			$book_id = $_POST['bookingid'];
 			$declin = "delete from booking where id ='$book_id'";
			$connect->query($declin);
		}

		if(isset($_POST['delete']))
		{
			$del_id = $_POST['del_id'];
 			$del = "delete from register where id ='$del_id'";
			$connect->query($del);
		}
		//to show stats status
		
		/*
		$userData = "select * from users;";
		$itemData = "select * from items where status = 'Y';";
		$orderData = "select * from orders;";
		$noOfBidItem = "select itemId from items where type = 'B' and status = 'Y';";
		$noOfBids = "select itemId from items where type = 'B' and custId is not null and status = 'Y';";

		$userData = $connect->query($userData);
		$itemData = $connect->query($itemData);
		$orderData = $connect->query($orderData);
		$noOfBidItem = $connect->query($noOfBidItem);
		$noOfBids = $connect->query($noOfBids);

		$noOfUsers = mysqli_num_rows($userData);
		$noOfItems = mysqli_num_rows($itemData);
		$noOfOrder = mysqli_num_rows($orderData);
		$noOfBidItem  = mysqli_num_rows($noOfBidItem);
		$noOfBids = mysqli_num_rows($noOfBids);

		echo"
				<div style = 'width : 70%; top : 10px; left : 10px;border:2px solid grey; margin: 50px; box-shadow: 10px 10px 5px 	#DCDCDC; '>
					<table style ='padding: 5px;'>
						<th>Stats</th>
						<tr>
							<td> Total no. of users </td>
							<td> Total no. of items </td>
							<td> Items on Bid </td>
							<td> Items on Sale </td>
							<td> Total no. of orders</td>
							<td> Total no. of bids</td>
						</tr>
						<tr>
							<td>".$noOfUsers."</td>
							<td>".$noOfItems."</td>
							<td>".$noOfBidItem."</td>
							<td>".($noOfItems-$noOfBidItem)."</td>
							<td>".$noOfOrder."</td>
							<td>".$noOfBids."</td>
						</tr>
					</table>
				</div>
			";
		*/

	$reqPending = "select * from booking where confirm_key = 10;";
	$res = $connect->query($reqPending);
	$i=1;
	//This div is for the booking requests that await approval from the admin
?>
	<div style = "background-color: #eee;
				overflow:auto; 
				border:2px solid grey; 
				margin: 50px; 
				box-shadow: 10px 10px 5px #DCDCDC;"
				class="container">

				<h3><a name="pending"> Pending requests:</h3></a>
	
			<?php
			while($row = $res->fetch_assoc())
			{
				$email=$row['email'];
				$bookingid=$row['id'];
				// $deadLine=$row['timecheck']; 
				// if ($deadLine = time())	
				// 	$connect->query("delete from booking where id= '$bookingid'");
				$que = "select id,lname from register where email = '$email'";
				$sqlrun = $connect->query($que);
				$user = $sqlrun->fetch_assoc();
					echo "<br><div class = 'row' style = 'border:2px;'>
					<div class='col-md-6'>
					<form method = 'post' action = 'admin.php'>
					<table border = '0'>
					<u><tr><td> Booking ID </td><td>: <b>".$row['id']."</b></td></tr></u>
					<tr><td> Booked By  </td><td><b>: ".$row['user'].'&nbsp'. $user['lname']."</b></tr>
					<tr><td> Booked Date </td><td> 	: ".$row['bookday']."</td></tr>
					<tr><td> User ID </td><td>		: ".$user['id']."</td></tr>
					<tr><td> Booked at </td><td> 	: ".date("Y/M/d (H:i:s)",$row['timecheck'])."</td></tr>
					<tr><td> Shift </td><td> 		: ".$row['shift']."</td></tr>
					
					<tr><td> Contact </td><td> 		: ".$row['contact']."</td></tr>
					<tr><td> Email  </td><td> 		: ".$row['email']."</td></tr>
					<tr><td > Payment deadLine </td><td> 	:<b style='background-color:orange;'>".date("Y  M  d ( H:i:s )",$deadLine)."</b></td></tr>
					<tr><td> Voucher no. </td><td> 		: ".$row['vno']."</td></tr>
					</table><br>
					<input type = 'hidden' name = 'email' value = ".$row['email'].">
					<input type = 'hidden' name = 'bookingid' value = ".$row['id'].">

					<input type = 'submit' class='button' name = 'approve' value = 'Approve'>
					<input type = 'submit' name = 'decline' class='button' value = 'Decline'>
					</form> </div>
					<div class='col-md-6'>
					<img src = ".$row['vimgloc']." height = '300' width = '450'>
					</div>
					</div><br><br>";
				$i++;
			}
			$i--;

			echo "<hr><h4>&emsp;
				<b>Total number of booking requests = ".$i." </b>
				</h4></div>";

			

			$approved = "select * from booking where confirm_key = 11;";
			$res = $connect->query($approved);
			$i=1;
			//This div is for the bookig requests that have been approved by the admin
?>
				<div style = "background-color: #eee;
				overflow:auto; 
				border:2px solid grey; 
				margin: 50px; 
				box-shadow: 10px 10px 5px #DCDCDC;"
				class="container">
				<h3><a name="approved">Approved requests: </a></h3>
<?php
			while($row = $res->fetch_assoc())
			{
				$email=$row['email'];
				$bookingid=$row['id'];
				$que = "select id,lname from register where email = '$email'";
				$sqlrun = $connect->query($que);
				$user = $sqlrun->fetch_assoc();
					echo "<br><div class='row'>
					<div class='col-md-6'>
					<form method = 'post' action = 'admin.php'>
					<table border = '0' >
					<u><tr><td> Booking ID </td><td>: <b>".$row['id']."</b></td></tr></u>
					<tr><td> Booked By  </td><td> 	: ".$row['user'].'&nbsp'. $user['lname']."</tr>
					<tr><td> Booked Date </td><td> 	: ".$row['bookday']."</td></tr>
					<tr><td> User ID </td><td>		: ".$user['id']."</td></tr>
					<tr><td> Booked at </td><td> 	: ".date("Y/M/d (H:i:s)",$row['timecheck'])."</td></tr>
					<tr><td> Shift </td><td> 		: ".$row['shift']."</td></tr>
					<tr><td> Contact </td><td> 		: ".$row['contact']."</td></tr>
					<tr><td> Email  </td><td> 		: ".$row['email']."</td></tr>
					<tr><td> Voucher no. </td><td> 	: ".$row['vno']."</td></tr>
					</table><br>
					<input type = 'hidden' name = 'email' value = ".$row['email'].">
					<input type = 'hidden' name = 'bookingid' value = ".$row['id'].">

					<input type = 'submit' name = 'decline' class='button' value = 'Cancel Booking'>
					</form> </div>
					<div class='col-md-6'>
						<img src = ".$row['vimgloc']." height = '300' width = '450'>
					</div>
					</div><br><br>";
					
				$i++;
			}
			$i--;
			echo "<hr><h4> &emsp;
			<b>Total number of approved bookings = ".$i." </b></h4></div>";
		 

		 

	} 
	else {
        echo "Admin not verified! Please login as Admin.";
    }
    ?>

    <?php
	$que="select * from register where email !='code';";
	$run= $connect->query($que);

    // $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Sever.");
    // $que = "SELECT * FROM register WHERE email != 'code';";
    // $run = $connect->query($que);
    $count = mysqli_num_rows($run);
    ?>

    <div class="container">
        <h3>Manage Users</h3>
        <table border="2" width="90%">
            <tr>
                <th>User_id</th>
                <th>First_name</th>
                <th>Last_name</th>
                <th>Email_id</th>
                <th>Contact_no.</th>
            </tr>

            <form name="edit" action="admin.php" name="delete" method="POST">
                <?php
                while ($row = $run->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['fname']."</td>
                            <td>".$row['lname']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['contact']."</td>
                        </tr>";
                }
                ?>
            </form>
        </table>
        <br>
        <!-- <button type="button" class="button" data-toggle="modal" data-target="#myModal">Edit</button>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-image: url(img/backgr.jpg); color:#eee;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter the user_id to be deleted</h4>
                    </div>
                    <div class="modal-body" style="background-image: url(img/backgr.jpg);">
                        <form name="delete" action="admin.php">
                            <input type="text" name="del_id" value="">
                            <input type="submit" value="Delete" name="delete">
                        </form>
                    </div>
                    <div class="modal-footer" style="background-image: url(img/backgr.jpg);">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <p>
            <h4><b>Total no. of users = <?= $count ?></h4></b>
        </p>
    </div>    
</body>
</html>
