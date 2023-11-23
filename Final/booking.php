<!DOCTYPE html>
<html>

<head>
    <title>Book</title>
    <script src="javascript/jvs.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
        body {
         
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oxygen', sans-serif;
            color: #eee;
        }

      
        .content {
            position: relative;
            color: #eee;
            margin: 0 0 0 20%;
            font-size: 20px;
            margin-top: 150px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="date"] {
            color: #222;
        }

        table {
            margin-top: 50px;
            border-spacing: 40px;
            border-collapse: separate;
        }

        td {
            height: 50px;
            text-align: center;
            font-size: 22px;
        }

        td button {
            font-size: 20px;
        }

        .btn-success {
            background-color: #28a745;
            color: black;
           
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
            
        }

        .success {
            background-color: rgb(80, 238, 62);
            color: black;
            width: 8%;      
        }

        .warning{
            background-color: rgb(226, 238, 49);
            color: black;
            width: 8%;          
        }

     
    </style>

</head>

<body>
<!--  -->

<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
    date_default_timezone_set('Asia/Kathmandu');
?>
    
    <div class="content">

        <form name="booking" action="booking.php" method="POST">
            <p><label>Select Date:</label>
                <input type="date" name="bookdate" style="color:#222; height:30px;" value="<?php
                                                                            if (isset($_POST['dSubmit']))
                                                                                echo $_POST['bookdate'];
                                                                            else {
                                                                                $today = time();
                                                                                echo (date("Y-m-d", $today));
                                                                            }
                                                                            ?>" required>
                
                    <input type="submit" class="btn-success" style="height:30px; width:55px" value="Check" name="dSubmit" onclick="myFunction(bookdate.value);">
               
            </p>
        </form>

    </div>

<?php
// session_start();

$connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
require 'config.php';

if (isset($_POST['dSubmit'])) {
    $bookdate = $_POST['bookdate'];

    $timestamp = strtotime($bookdate);
    $current_time = time();

    if (($timestamp - $current_time) < 0) {
        echo '<script language="javascript">
                    alert("Sorry, you entered an expired date value!!\nPlease select a valid date. \nDate has been reverted to the current date! ");
                    window.location.replace("booking.php");
                    </script>';
    }
} else {
    $t = time();
    $bookdate = date('Y-m-d', $t);
}


    $deadline = time();
    $deadline2 = time()+ 600;
    $bktime = "delete from booking where timecheck < '$deadline' and confirm_key = 1";
    $rushour = "DELETE FROM booking WHERE bookday < '$deadline2' AND confirm_key = 2";
    $connect->query($bktime);
    $connect->query($rushour);


 
$allshifts = array('6 TO 7 AM','7 TO 8 AM', '8 TO 9 AM', '9 TO 10 AM','10 TO 11 AM', '11 TO 12 AM' , '12 TO 1 PM' , '1 TO 2 PM', '2 TO 3 PM' , '3 TO 5 PM' ,'4 TO 5 PM' , '5 TO 6 PM' , '6 TO 7 PM' , '7 TO 8 PM');

$test = "select shift from booking where bookday='" . $bookdate . "'";
$allbookings_result = $connect->query($test);
$i = 0;
$testarr = array();
while ($test = $allbookings_result->fetch_assoc()) {
    $testarr[$i] = $test['shift'];
    $i++;
}
$result = array_diff($allshifts, $testarr);
    
    echo '<div style ="position:relative; top : 20px; left : 5%; margin: 10px; height:90%; width:80%; font-size: 20px;  padding : 3px; color: #eee;">
				<form name = "shiftselect" action = "customer.php"  method = "POST"> 
					<b>Select your Shift (one at a time) and then press the proceed button. <br>
                    Selected Shifts will be booked for the date &emsp;&emsp;:<u>' . $bookdate . ' </u></b>
<br>
                <table  border="0" cellspacing="40" cellpadding="50" height = "20%"><br><br><br>
								<tr  height= "50px"  class="btn-group-justified">';
    for ($i = 0; $i <= 13; $i++) {
        if (isset($result[$i])) {
            echo '<td style="color: black; font-size:22px;"  align="center" class="success">';
echo '<strong><input type="radio" name="shift" value="' . $result[$i] . '" required></strong>' . $result[$i];
echo '</td>';
        } else {
            echo '<td style="color: red; font-size:20px; align="center" class="warning" >';

            echo '<strong><input type="radio" name="shift" disabled></strong>' . $allshifts[$i];

            echo '</td>';
        }
        if ($i === 6) {
            echo '</tr><tr height="50px" class="btn-group-justified">';
        }
        
    }
    echo '</tr></table>
				  <input type = "hidden" name = "bookdate" value = "' . $bookdate . '"> <br><br>
				  <input type = "submit" style="color: black; font-size:22px;"  align="center" class="btn-success" value = "Proceed " name = "proceed">
				  </form>
				  <br>
				<div style="position: relative; font-size:20px; float: right; top:-40px;" >
        			<b> Index: </b><br>
        			<button type="button" class="btn btn-success" style="color: black; font-size:22px;"  align="center">Available
       				<input type="radio" id="radio1" hidden disabled></button>
       				<button type="button" class="btn btn-warning" style="color: black; font-size:22px;"  align="center">Reserved
        			<input type="radio" id="radio2" hidden disabled> </button>               
     			</div>
				<br>
				</div>';

                
    include "footer.php";

    ?>

</body>

</html>
