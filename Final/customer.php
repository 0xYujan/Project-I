<?php
session_start();
 $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
require 'config.php';
date_default_timezone_set('Asia/Kathmandu');

if (isset($_POST['vsubmit'])) {

    $details = "select id, fname from register where email='" . $_SESSION['email'] . "'";
    $test = $connect->query($details);
    $details = $test->fetch_assoc();
    $user = $details['fname'];
    $userid = $details['id'];

    $vno = $_POST['vno'];
    $id = $_POST['bookingid'];

    // Use a prepared statement to prevent SQL injection
    $check = $connect->prepare("SELECT vno FROM payment");
    $check->execute();
    $check->bind_result($existingVno);
    $flag = 0;

    // Check if the voucher number already exists in the payment table
    while ($check->fetch()) {
        if ($vno == $existingVno) {
            echo '<script language="javascript">
                alert("Voucher not valid/already used!");
                window.location.replace("customer.php");
                </script>';
            $flag = 1;
            break; // No need to continue checking once a match is found
        }
    }

    // Process the uploaded image
    $name = 'vouch' . $id . '.jpg';
    $location = 'uploads/';

    if (isset($_FILES['vimg']['tmp_name']) && $flag == 0) {
        $tmp_name = $_FILES['vimg']['tmp_name'];
        $size = $_FILES['vimg']['size'];

        // Use move_uploaded_file to move the uploaded file to the desired location
        if (move_uploaded_file($tmp_name, $location . $name)) {
            $confirm1 = "UPDATE booking SET confirm_key = 10 WHERE id = $id";

            $confirm = "INSERT INTO payment (booking_id, user_id, vno, vimgloc, time) 
                        VALUES ('$id', '$userid', '$vno', '$location$name', NOW())";
            $connect->query($confirm1);
            $connect->query($confirm);

            echo '<script language="javascript">
                alert("Voucher Submitted Successfully!\nWaiting For Admin Approval");
                window.location.replace("customer.php");
                </script>';

            // Send email notification
            $to = "yujanr4@gmail.com";
            $subject = "New Voucher Submission";
            $message = "A new voucher has been submitted for booking ID $id.\nPlease review and take necessary actions.\n";
            $headers = "From: yujanr4@gmail.com";

            mail($to, $subject, $message, $headers);
        }
    }

}


if (isset($_POST['login'])) {
  $inputEmail = $_POST['email'];
  $inputPassword = $_POST['pwd'];

  // Assuming you have a database connection named $connect
  $detailsQuery = "SELECT gmail, password FROM admin";
  $result = $connect->query($detailsQuery);

  // Check if there are any rows returned
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $validEmail = $row['gmail'];
          $validPassword = $row['password'];

          if ($inputEmail === $validEmail && $inputPassword === $validPassword) {
              $_SESSION['admin'] = 1;
              header("location: admin.php");
              exit();
          }
      }
    }
  }

if(isset($_POST['btnSubmit']))
  {


    $fname=$_POST['fname'];
    $user=$fname;
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword']; 
    $test = "select email from register";
    $allUsers = $connect->query($test);
    $flag = 0;
    while($test = $allUsers->fetch_assoc())
    {
      if($test['email'] == $_POST['email']) $flag = 1;
    }
    if ($flag)
    {
      echo '<script language="javascript">;
           alert("Email Already exists!!");
          window.location.replace("signup.php");
          </script>';
          
    } 
      else{  
      $connect->query("INSERT INTO `register`(`id`, `fname`, `lname`, `email`, `contact`, `password`)
                VALUES (NULL,'$fname','$lname','$email','$contact','$password')");
      $id = "select id from register where email = '".$_POST['email']."' and password = '".$_POST['password']."' ;";
      //session_start();
      $_SESSION['email'] = $email;
      $_SESSION['pwd']   = $password;
      $_SESSION['user']  = $fname;
      echo '<script language="javascript">';
          echo 'alert("User Registered Successfully!")';
          echo '</script>'; 

    $to = $email; 
    $subject = 'Registration Confirmation';

    $emailBody = "Dear $fname,\n\n";
    $emailBody .= "Thank you for registering with our Futsal Club!\n";
    $emailBody .= "Your registration details:\n";
    $emailBody .= "Name: $fname $lname\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Contact: $contact\n";

    
    $mailed = mail($to, $subject, $emailBody, 'From: yujanr4@gmail.com');

      }
    $connect->close();
  
  }

  if(isset($_POST['login']))
  {

    $email = $_POST['email'];
    $pwd   = $_POST['pwd'];

    $test = "select email, password,fname from register";
    $allUsers = $connect->query($test);
    $flag = 0;
    while($test = $allUsers->fetch_assoc()) 
    {
      if($test['email'] == $email && $test['password'] == $pwd) 
      {
        $flag = 1;
        $user = $test['fname'];
      }
    }
    if($flag == 1)
      {
        
        $_SESSION['email']  = $email;
        $_SESSION['pwd']    = $pwd;
        $_SESSION['user']   = $user;
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password!!!")';
            echo '</script>';
            header("location: index.php");      
        }
  }

   if(isset($_POST['proceed']))
        {

          $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
          require 'config.php';
          if(isset($_SESSION['email']))
          {
            $email=$_SESSION['email'];
            $bookday=$_POST['bookdate'];
            $shift=$_POST['shift'];
            
            $t=time();
            $details = "select contact,fname from register where email='".$email."'";
            $test = $connect->query($details);
            $details=$test->fetch_assoc();
            $user=$details['fname'];
            $contact=$details['contact'];

            if($shift == "6 TO 7 AM")
              $hr = 6 * 3600;
            else if($shift == "7 TO 8 AM")
              $hr = 7 * 3600;
            else if($shift == "8 TO 9 AM")
              $hr = 8 * 3600;
            else if($shift == "9 TO 10 AM")
              $hr = 9 * 3600;
            else if($shift == "10 TO 11 AM")
              $hr = 10 * 3600;
            else if($shift == "11 TO 12 AM")
              $hr = 11 * 3600;
            else if($shift == "12 TO 1 PM")
              $hr = 12 * 3600;
            else if($shift == "1 TO 2 PM")
              $hr = 13 * 3600;
            else if($shift == "2 TO 3 PM")
              $hr = 14 * 3600;
            else if($shift == "3 TO 5 PM")
              $hr = 15 * 3600;
            else if($shift == "4 TO 5 PM")
              $hr = 16 * 3600;
            else if($shift == "5 TO 6 PM")
              $hr = 17 * 3600;
            else if($shift == "6 TO 7 PM")
              $hr = 18 * 3600;
            else if($shift == "7 TO 8 PM")
              $hr = 22 * 3600;
            $timestamp = strtotime($bookday);
            $timestamp += $hr;
            $timecheck = $timestamp - 7200;
            $rushtimecheck = $t + 600;
            $rushour = $timecheck + 7120; 
            $deadline = date("Y-m-d H:i:s", $timecheck);
            // $ctime = $t;
            
            

            if($timecheck > $t){
              $msg ='Booked Successfully!!\n Boooked Date & Time : '.date("Y/m/d @ H:i:s",$timestamp);
              echo '<SCRIPT language = "javascript">
                      alert("'.$msg.'");
                      window.location.replace("booking.php");
                      </SCRIPT>';

            $to = $_SESSION['email']; 
            $subject = 'Booking Confirmation';
        
            $emailBody = "Dear $user,\n\n";
            $emailBody .= "Thank you for booking with us!\n";
            $emailBody .= "Your booking details:\n";
            $emailBody .= "Shift: $shift\n";
            $emailBody .= "Booked Date: $bookday\n";
            $emailBody .= "Contact Number: $contact\n";
            $emailBody .= "Email Id: $email\n";
            $emailBody .= "Deadline: " . date("H:i:s", $timecheck) . "\n";
            

        
            // Send the email
            $mailed = mail($to, $subject, $emailBody, 'From: yujanr4@gmail.com'); 
              $connect->query(
                  "INSERT INTO `booking` (`id`, `user`, `bookday`,`ctime`, `shift`, `contact`, `email`, `timecheck`, `confirm_key`) 
                   VALUES                (NULL,'$user','$bookday', UNIX_TIMESTAMP() , '$shift','$contact', '$email', '$timecheck','1');");
              $connect->close();
              }
              else if($timestamp > $t && $rushour > $t){

                $msg ='Booked Successfully!!\n You need to Pay within 10 Minutes \n Boooked Date & Time : '.date("Y/m/d @ H:i:s",$timestamp);
                        echo '<SCRIPT language = "javascript">
                              alert("'.$msg.'");
                              window.location.replace("booking.php");
                              </SCRIPT>';
                              $to = $_SESSION['email']; 
            $subject = 'Booking Confirmation';
        
            $emailBody = "Dear $user,\n\n";
            $emailBody .= "Thank you for booking with us!\n You need to Pay within 10 Minutes else your booking will be deleted\n";
            $emailBody .= "Your booking details:\n";
            
            $emailBody .= "Booked Date: $bookday\n";
            $emailBody .= "Shift: $shift\n";
            $emailBody .= "Contact Number: $contact\n";
            $emailBody .= "Email Id: $email\n";

            $deadline = $t + 600;
            $emailBody .= "Deadline: " . date("H:i:s", $deadline) . "\n";
        
            $mailed = mail($to, $subject, $emailBody, 'From: yujanr4@gmail.com'); 
                      $connect->query(
                          "INSERT INTO `booking` (`id`, `user`, `bookday`, `ctime`, `shift`, `contact`, `email`, `timecheck`, `confirm_key`) 
                           VALUES                (NULL,'$user','$bookday', UNIX_TIMESTAMP(),'$shift','$contact', '$email', '$rushtimecheck','2');");
          
                    
                      $connect->close();
              }else{
            
            $msg ='Expired Time value selected!!\n\n Boooked Time : '.date("H:i:s",$timestamp).'\n Current Time : '.date("Y/m/d @ H:i:s",$t);
            echo '<SCRIPT language = "javascript">
                  alert(" Booking Failed !!!\n '.$msg.'");
                  window.location.replace("booking.php");
                  </SCRIPT>';
          }
          
          }
          else
          {
            echo '<div>
            <script language="javascript">
              alert("Booking Failed !!!\n You need to Login First");
              window.location.replace("login.php");
            </script>
          </div>';    
          }    
        }
      
  

 ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Home</title>

    <style type="text/CSS">
    th,td{
      padding:5px; 
    }

    
  </style>


</head>
    <body>

    <!-- Navigation -->
    <?php
    // session_start();
    include("../Final/Assets/in_user_nav.php");
    ?>  
  
  <br>
  <br>
  <br>

      <div class = "container" style = "background-color: #eee;
                                        overflow:auto; 
                                        width:95%;
                                        margin: 20px;">

        <div class="row">
          
          <div class = "col-md-6">
          <h3><u>Your Bookings List</u></h3>
    
            <div class="container">
            <?php
          	   $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
    		       require 'config.php';
               $details = "select id, fname from register where email='".$_SESSION['email']."'";
               $test = $connect->query($details);
               $details=$test->fetch_assoc();
               $user=$details['fname'];
               $userid=$details['id'];

          	   $test = "SELECT * FROM booking WHERE email = '" . $_SESSION['email'] . "' AND (confirm_key = 1 OR confirm_key = 2)";

			     $allbookings = $connect->query($test);
			     $i=0;
			     $testarr = array(); 


			     while($test = $allbookings->fetch_assoc())
			     {  
				      $testarr[$i]=$test['id'];
				
			
          	  echo '  <div  class="row" >
                      <form method = "post" action = "payment.php">
         	            <table border = "0" >
          	             <tr><td> Booking ID       </td><td>   : '.$test['id'].'</td></tr>
          	             <tr><td> Booked Date      </td><td>   : '.$test['bookday'].'</td></tr>
                         <tr><td> Shift            </td><td>   : '.$test['shift'].'</td></tr>
                         <tr><td> Amount           </td><td>   : Rs. 1200 </td></tr>
          	             <tr><td> Payment Deadline </td><td>   : '.date("Y/M/d (H:i:s)",$test['timecheck']).'</td></tr>
          	          </table>
          	          <input type = "hidden" name = "bookingid" value = '.$testarr[$i].'>
          	          <input type = "submit" name = "pay" style="background-color:rgba(161, 254, 107, 1); border:none; width:150px; font-size:19px;  color: black;" value = "Payment">
                      </form>
                      </div>';
              $i++;
      		}
          if($i==0)
          {
            echo '<h5 style="color:#777;">No record!</h5>';
          } 
          echo '</div>  <!-- 1st container-->
                </div>  <!-- 1st col-->


     <div class="col-md-6">

     <div class="container" style="width:100%; position:relative; left:-25%;">
      <h3> <u>Pending Approvals</u>&emsp; &emsp;  &emsp;  &emsp;
            <u>Voucher images</u></h3>
        <div class="row">';
        $test = "SELECT b.id, b.bookday, b.shift, p.vno, p.vimgloc
        FROM booking AS b
        LEFT JOIN payment AS p ON b.id = p.booking_id
        WHERE b.email = '" . $_SESSION['email'] . "' AND b.confirm_key = 10";

$allbookings = $connect->query($test);
$i = 0;
$testarr = array();
while ($test = $allbookings->fetch_assoc()) {
   $testarr[$i] = $test['id'];
   echo '
   <div class="col-md-6">
       <table border="0">
           <tr><td> Booking ID   </td><td> : ' . $test['id'] . '</td></tr>
           <tr><td> Booked Date  </td><td> : ' . $test['bookday'] . '</td></tr>
           <tr><td> Shift        </td><td> : ' . $test['shift'] . '</td></tr>
           <tr><td> Payment      </td><td> : Paid</td></tr>
           <tr><td> Voucher no.  </td><td> : ' . $test['vno'] . '</td></tr>
       </table>
   </div>
   <div class="col-md-6">
       <img src="' . $test['vimgloc'] . '" width="225" height="150">
       <br><br><br>
   </div>';
   $i++;
}
if ($i == 0) {
   echo ' &emsp; &emsp;<h5 style="color:#777;">No record!</h5>';
}
echo '<br></div> <!-- row --><br><br>';
        

    echo '</div>  <!-- 2nd container--> 
          </div>  <!-- 2nd col -->
          </div>  <!-- row--><br><br>
          </div>  <!-- main container-->

      <div class = "container" style = "background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey; 
                                        width:95%;
                                        margin: 20px;">
            <h3> <u>Approved Bookings</u>&emsp; &emsp; &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp; &emsp;  &emsp;  &emsp;   &emsp;  
            <u>Voucher images:</u></h3>
        <div class="row">';
        $test = "SELECT b.id, b.bookday, b.shift, p.vno, p.vimgloc
        FROM booking AS b
        LEFT JOIN payment AS p ON b.id = p.booking_id
        WHERE b.email = '" . $_SESSION['email'] . "' AND b.confirm_key = 11";
          $allbookings = $connect->query($test);
          $i=0;
          $testarr = array(); 
          while($test = $allbookings->fetch_assoc())
          {
            $testarr[$i]=$test['id'];
            echo '
            <div class ="col-md-6">
            <table border = "0">
            <tr><td> Booking ID   </td><td> : '.$test['id'].'</td></tr>
            <tr><td> Booked Date  </td><td> : '.$test['bookday'].'</td></tr>
            <tr><td> Shift        </td><td> : '.$test['shift'].'</td></tr>
            <tr><td> Payment      </td><td> : Paid</td></tr>
            <tr><td> Voucher no.  </td><td> : '.$test['vno'].'</td></tr>
            </table>
            </div>
            <div class ="col-md-6">
            <img src = '.$test['vimgloc'].' width="225" height="150">
            <br><br><br>

           
            </div>';
            $i++;

        }
        if($i==0)
        {
          echo '&emsp; &emsp;<h5 style="color:#777;">No record!</h5>';
        } 
        echo '<br></div> <!-- row --><br><br>
              </div> <!-- container -->
             

              <br><br>
              ';
?>

<div style="position: relative; top: 5%;">
  <?php
include"footer.php";
?>
</div>

<script>
  function refreshContent() {
    var newData = "New content fetched at: " + new Date();
    $("#contentToUpdate").html(newData);
  }
  setInterval(refreshContent, 5000);
</script>
</body>
</html>