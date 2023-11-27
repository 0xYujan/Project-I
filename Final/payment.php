<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="../Final/CSS/payment.css">

</head>
<body background="grey">
	
<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
    date_default_timezone_set('Asia/Kathmandu');
?>
<div class="row-line">
        <div class="members-text">
            <h2>PAYMENT AREA</h2>
        </div>

    </div><br><br><br><br><br><br><br><br><br><br>
	<div class="logreg-box">
	<div class="form-box">
	<form name="voucher" method="POST" action="customer.php" enctype="multipart/form-data">
	<table border="0">
	<div class="input-box">
		<?php
			if(isset($_POST['pay']))
			{
				$book_id=$_POST['bookingid'];
			}
		
			echo '<label>Payment for Booking ID:<input type="text" value='.$book_id.' name="bookingid"> </label> ';
		?>
</div>
<div class="input-box">
		<label>Voucher no.:<input type="text" name="vno" required><label>
		</div>
		<div class="input-box">
		<label>Upload image:<input type="file" name="vimg" required></label>
		</div>
		</table>
		<input class="btn" type="submit" name="vsubmit" value="Confirm Payment">
	</form>
	</div>
		</div>

</body>
</html>