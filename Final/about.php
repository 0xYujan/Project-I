<!DOCTYPE html>
<html>
    <head><title>About Futsal</title>
    	<script src="javascript/jvs.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Booking Page</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   
	<style >
    p{
        color:white;
        font-size:14px;
    
    }
    
    </style>>
    </head>
<body style=" background-image: url(img/backgr.jpg);">

<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
    date_default_timezone_set('Asia/Kathmandu');
?><br><br><br><br>
    
<h1 style="color:#ddd; margin: 2px; padding-top: 10px; padding-left: 10%;">What is Futsal?</h1>
<table text=justify style="position:relative; left: 10%; " width="80%"><tr >
<td style="font-size: 18px; color: #eee;"><br><p align="justify">Futsal is the fastest growing indoor sport in the world, and is the small sided football format that is officially recognised by both UEFA and FIFA. The nature of the game places a large emphasis on technical skill and ability in situations of high pressure, and is subsequently an excellent breeding ground for football competencies that can be translated into the 11-a-side format of the game.</p>
 
<p align="justify">Futsal is a modified form of soccer played with five players per side on a smaller, typically indoor, field.
        </p>
        <p align="justify">Futsal was the name chosen by FIFA, which is simply a combination of the Spanish words for <strong>&lsquo;hall&rsquo; (Sala)</strong> and <strong>&lsquo;football&rsquo; (Futbol)</strong>: hence &lsquo;Futsal&rsquo;.</p>
<p align="justify">Many of the top world class footballers played Futsal in their youth and credit it with supporting their footballing development; players of the calibre of <strong>Pele</strong>, <strong>Zico</strong>, <strong>Ronaldinho</strong>, <strong>Kaka</strong> and <strong>Lionel Messi</strong> to name but a few of the South American legends who all played and enjoyed Futsal. But Futsal has not just helped produce South American football stars. On the European stage <strong>Cristiano Ronaldo</strong>, <strong>Deco</strong>, <strong>Xavi</strong> and <strong>Fabregas</strong>, amongst many others, have played Futsal to develop their skills.</p>


<p align="justify"> Futsal, or Futsala, is a variant of association football played on a smaller field and mainly indoors. It can be considered a version of five-a-side football.
</p><p align="justify">
        Futsal is played between two teams of five players each, one of whom is the goalkeeper. Unlimited substitutions are permitted. Unlike some other forms of indoor football, the game is played on a hard court surface delimited by lines; walls or boards are not used. Futsal is also played with a smaller ball with less bounce than a regular football due to the surface of the field. The surface, ball and rules create an emphasis on improvisation, creativity, and technique as well as ball control and passing in small spaces.</p></td>
    <td valign=top><div style="float:right;position:relative; padding-top:100px; padding-left:40px;"><img src="img/futsal.jpg"></div></td></tr>
        </table>
        <div style="position:relative; left: 10%; width: 80%; font-size: 18px; color:#eee;" >
        <h2 style="color:#ddd; padding-top: 20px;">Basic Rules of Futsal</h2><br>

<p align="justify" >Futsal is a five-a-side game, normally played on a flat indoor pitch with hockey sized goals and a size four ball with a reduced bounce. It is played to touchlines and all players are free to enter the penalty area and play the ball over head height. Games are 20 minutes per half, played to a stopping clock (similar to basketball) with time-outs permitted.</p>
<p align="justify">There are a number of differences to our traditional version of small sided football, but the dominant elements are the absence of rebound boards and amendments in the laws that encourage and foster skilful, creative play above the physical contact that tends to be a feature of English five-a-side.</p><br>

<br>


<br>

<h2 style="color:#ddd;padding-top: 56px;">The Futsal Court&nbsp;</h2>
<br>
<p><img alt="Futsal Court Dimensions" src="img/futsal-court.png"  style="position:relative; left:0% ; padding-top: 10px;" class="img-responsive"></p>
</div>
  

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

</html>
<?php include"footer.php";?>