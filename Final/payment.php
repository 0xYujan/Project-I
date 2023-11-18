
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="grey">
	<div style=" color: #eee   ; background-image: url(img/backgr.jpg); height: 40%;" class ="sgnup_div">

	<form name="voucher" method="POST" action="customer.php" enctype="multipart/form-data">
	<table border="0">
	<tr>
		<?php
			if(isset($_POST['pay']))
			{
				$book_id=$_POST['bookingid'];
			}
		
			echo '<td>Payment for Booking_ID: </td><td> <input type="text" value='.$book_id.' name="bookingid"></td>';
		?>
		</tr>
		<tr>
		<td>Voucher no.:</td><td><input type="text" name="vno" required></td>
		</tr>
		<tr>
		<td>Upload image: </td><td><input type="file" name="vimg" required></td>
		</tr>
		</table>
		<input type="submit" name="vsubmit" value="Confirm Payment">
	</form>
	</div>

</body>
</html>