<?php
if (isset($_POST['btnsend'])) {
    $to = 'yujanr4@gmail.com';
    $subject = 'Futsal message';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $topic = $_POST['subject'];
    $number = $_POST['Contactnumber'];

    $messageBody = <<<EMAIL
Hi! my name is $name and my topic is $topic
From: $name
Email: $email
Phone no.: $number
Subject: $topic

$message
EMAIL;

    $header = "From: $name <$email>";

    if ($name == '' || $email == '' || $message == '') {
        $feedback = "Please fill all content";
    } else {
        $sent = mail($to, $subject, $messageBody, $header);
        if ($sent) {
            echo '<div>
            <script language="javascript">
              alert("Thank You!");
            </script>
          </div>';
        } else {
            echo '<div>
            <script language="javascript">
              alert("Error sending the message. Please try again.");
            </script>
          </div>';
        }
    }
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>


    <style>
  * {
    font-family: 'Oxygen', sans-serif;
  }

  form {
    width: 500px;
  }


  .input-box input {
    padding: 5px;
    width: 100%;
    height: 100%;
    color: #e4e4e4;
    background: transparent;
    border: 2px solid rgba(43, 43, 43, 1);
    border-radius: 4px;
    background-color: rgba(43, 43, 43, 1);
    font-size: 15px;
}

.input-box textarea {
    padding: 5px;
    color: #e4e4e4;
    background: transparent;
    border: 2px solid rgba(43, 43, 43, 1);
    border-radius: 4px;
    background-color: rgba(43, 43, 43, 1);
    font-size: 15px;
}


  .contact {
    color: #ddd;
    position: relative;
    padding-left: 10px;
  }

  td {
    width: 100%;
    text-align: left;
  }

  table {
    padding-right: 200px;
    margin: 20px;
    padding: 30px;
  }

  
  .form-box .input-box {
    position: relative;
    width: 340px;
    height: 45px;
    margin: 50px 0;
}

  .form_submit {
    padding: 8px 17px;
    cursor: pointer;
    color: #fff;
    width: 200px;
    height:50px;
    border: 3px;
    font-size:20px;
    background-color: #2ecc71;
    border-bottom: 2px solid #27ae60;
    margin-bottom: 5px;
    position: relative;
  }

  
.input-box input {
    padding: 5px;
    width: 400px;
    height: 40px;
    color: #e4e4e4;
    background: transparent;
    border: 2px solid rgba(43, 43, 43, 1);
    border-radius: 4px;
    background-color: rgba(43, 43, 43, 1);
    font-size: 15px;
}

.input-box label {
    position: absolute;
    top: -30%;
    left: 0;
    transform: translateY(-50%);
    font-size: 20px;
}

.form-box p{
  color: white;
  padding: 0 50px;
}

.line {
  top: 130px;
  height: 10px;
  width: 200px;
  background-color: rgba(161, 254, 107, 1);
  position: absolute;
}

.form-boxx {
  display: flex;
  
}
.form-boxx p{
  color: rgba(161, 254, 107, 1);
}

</style>

</head>

<body>
<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
   
?>
    <div id="container" style="position: relative; font-size:20px;">
        <div class="form-box">
            <br> <br> <br> <br><div class="form-boxx">
  <div class="line"></div> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
  <p>Get In Touch</p>
</div>
            <form name="contact" method="POST" action="">
                <table cellspacing=0 cellpadding=1 border="0" align=center>
                    <tr>
                        <td width="40%">
                            <div class="input-box">
                                <label for="subject"><p>Subject</label><br/>
                                <span class="subject_class"><input type="text" name="subject" value="" size="40" placeholder="Booking" required/></span>
                            </div>
<div class="input-box">
  <label for="name"><p>Your Name</label><br />
  <span><input type="text" name="name" value="" size="40"  placeholder="Full name" required/></span> 
</div>
<div class="input-box">
  <label for="email"><p>Your Email</label><br />
  <span><input type="email" name="email" value="" size="40"  placeholder="myname@example.com" required /></span> 
</div>
<div class="input-box">
  <label for="contact"><p>Your contact number</lable><br />
  <span><input type="tel" name="Contactnumber" value="" size="40" placeholder="Mobile or Phone"required/></span> </p><!--Input type="tel"--></b>
</div><br>
<td valign=top>
<div class="input-box" style="top:140px; margin-right: 200px;"><br><br>
  <label for="message" ><p>Your Message</label><br />
  <span><textarea name="message" cols="50" rows="15"  placeholder="Message"></textarea></span> 
</div><br><br><br><br><br><br><br><br>
<p><input type="submit" value="Send" class="form_submit" name="btnsend"/></p>
                        </td>
                    </tr>
    
    <tr><td colspan=2><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14128.173981847576!2d85.3622749!3d27.7159433!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bd0e441b9d1%3A0x81962eaa6a191e35!2sFutsal%20Arena%20Boudha!5e0!3m2!1sen!2snp!4v1700983464533!5m2!1sen!2snp" width="1150" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td></tr>
      </table>
            </form>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>