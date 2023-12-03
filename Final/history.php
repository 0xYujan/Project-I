<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/CSS">
		th,td{
			padding:5px; 
		}
	</style>
</head>
<body>
<?php
    session_start();
   
        if($_SESSION['admin'] == 1) {
            include("../Final/Assets/admin_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }

	date_default_timezone_set('Asia/Kathmandu');

?><br><br><br>
    <?php
    if($_SESSION['admin'] == 1 )
    {
        
        
        $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
    require 'config.php';
    
	echo '<div class = "container" style = "background-color: #eee;
    overflow:auto; 
    width:90%;
    margin: 50px;">

<h3><u>Booked History</u></h3><br>';
$test = "select * from booking where confirm_key =100";
$allbookings = $connect->query($test);
$i=0;
$testarr = array(); 


while($test = $allbookings->fetch_assoc())
{
echo '<div class ="row">
<table border = "1">
<tr><td> Booking ID   </td><td> : '.$test['id'].'</td></tr>
<tr><td> Booked Date  </td><td> : '.$test['bookday'].'</td></tr>
<tr><td> Shift        </td><td> : '.$test['shift'].'</td></tr>
</table>
</div>'; 
$i++;   
}
if($i==0)
{
echo '<h5 style="color:#777;">No record!</h5>';
} 
echo'</div>'; 
    
}else{
    header("Location: 404-page.php");
    exit(); 
    

}
$connect->close();?>

</body>
</html>