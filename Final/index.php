<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page after login</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

<?php
    session_start();
    if(isset($_SESSION['email'])){
        include("../Final/Assets/in_user_nav.php");
        }
     else {
        include("../Final/Assets/out_user_nav.php");
    }
?>
    
    <div class="containerr">
        <div class="slides-wrapper">
            <div class="slider">
                <img id="slide-1" src="../assets/1.png">
                <img id="slide-2" src="../assets/2.png">
                <img id="slide-3" src="../assets/3.png">
            </div>
        </div>
    </div>

    <div class="slider-nav">
        <a href="#slide-1"></a>
        <a href="#slide-2"></a>
        <a href="#slide-3"></a>
    </div><br><br><br>

    <div class="welcome">
        <h1>Welcome to Mega Futsal</h1>
        </div>
              <div class="court2">
                <img src="../Final/img/futsalA.jpeg">
                    <p>Mega Futsal is one of the fastest-growing futsal co. in Nepal and has been selected as the number one futsal for training and development by many players.This futsal recognizes that futsal is a stand-alone sport and an exciting game for players at all levels, but futsal is also an essential component of soccer development.</p>                 
    </div><br><br><br>

    <div class="location">
        <h1>Some of the World-class athletes says about the futsal</h1>

    </div>

    

    <div class="court-container">
        <div class="court-box">
            <div class="court">
                <div class="court-img">
                    <img id="court-1" src="../Final/img/pele.jpg">
                    <p>Futsal requires you to think and play fast. It makes everything easier when you later switch to football.</p>
                    <h1 class="court-name">PELÉ</h1>
                </div>
                <div class="court-img">
                    <img id="court-1" src="../Final/img/messi.jpg">
                    <p>As a little boy in Argentina, I played futsal on the streets and for my club. It was tremendous fun, and it really helped me become who I am today.</p>
                    <h1 class="court-name">MESSI</h1>
                </div>
                <div class="court-img">
                    <img id="court-1" src="../Final/img/rd.jpg">
                    <p>During my childhood in Portugal, all we played was futsal. The small playing area helped me improve my close control, and whenever I played futsal I felt free. If it wasn't for futsal, I wouldn't be the player I am today. </p>
                    <h1 class="court-name" >RONALDO</h1>
                </div>
             </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
    </body>
    
    </html> 
    <?php include("footer.php"); ?>