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

$que="select * from register";
$run= $connect->query($que);
$count =mysqli_num_rows($run);
echo '

<div class="container" style = "background-color: #eee;
            overflow:auto; 
            width:90%;
            margin: 50px; 
            >
<a name="manage"><h3>Manage Users</a></h3><br><br>
<div class = "row" width=90%>
<table align = "center" border="2" >
        <tr >
            <th>User_id</th>
            <th>First_name</th>
            <th>Last_name</th>
            
            <th>Email_id</th>
            <th>Contact_no.</th>
        </tr>
        
        
        <form name="edit" action="admin.php" name="delete" method="POST">';

while($row = $run->fetch_assoc())
{
    
    echo "
        
            <tr >
                <td>".$row['id']."</td>
                <td>".$row['fname']."</td>
                <td>".$row['lname']."</td>
                
                <td>".$row['email']."</td>
                <td>".$row['contact']."</td>
                
            </tr>";
}

echo	'</table><br>
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" style="background: skyblue; position:relative; left:6%; width:100px; color:#222;">Edit</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" >
<div class="modal-dialog" >

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style=" background-color: black; color:#eee;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Enter the user_id to be deleted</h4>
    </div>
    <div class="modal-body" style=" background-image: url(img/backgr.jpg);">
    <form name="delete" action="admin.php">
      <input type= "text" name="del_id" value="">
      <input type="submit" value="Delete" name="delete">
     </form>
    </div>
    <div class="modal-footer" style=" background-image: url(img/backgr.jpg);">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div> 
 </div>
</div>

<p><h4><b>&emsp; Total no. of users = '."$count".'</h4></b></p>
</div>
</div>'; 

}else{
    header("Location: 404-page.php");
    exit(); 
    
}
$connect->close();
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>