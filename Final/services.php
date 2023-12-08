<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Home</title>

<style>
button.down {
    background-color: rgba(43, 43, 43, 1);
    color: rgba(161, 254, 107, 1);
    cursor: pointer;
    padding: 20px;
    width: 60%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}



.panel {
    padding: 0 18px;
    background-color: rgba(43, 43, 43, 1);
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    width: 60%;
}

.panel p {
    color:white;

}

    .panel{
        column-width: 60%;
    }
    img{
         height: 200px;
        width: 200px;
    }   
    p{
        font-size: 20px;
    }
</style>
</head>
<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
    date_default_timezone_set('Asia/Kathmandu');
?><br><br><br><br><br>

<div class="container">
<span style="color:#eee">
<h2>SERVICES</h2><br><br>
<p>The Mega Futsal Ground is popular because of their best services provided to their members and bookers. 
    <br>Following are the major services:<br> </span><br>
 </p>
<button class="down">1. SWIMMING POOL</button>
    <div class="panel panel-primary"><p class="text-info">The Mega Swimming Pool is providing extra recreational and refreshing services where people can enjoy before/after the match.</p>
        <p class="text-info">Price<code>Rs150</code>  per person.</p><img src="img/pool.jpeg">
    </div>
    
       <button class="down">2. SHOPPING</button>
<div class="panel panel-primary">
    <p class="text-info">Select the best product from our shop. Some of the products are as follows.</p><br>
    <img src="img/football/ball.jpeg">&nbsp;<img src="img/football/boot.jpg">&nbsp;<img src="img/football/gloves.jpeg"><br><br>
</div> 

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>

<button class="down">3. BIG PARKING</button>
<div class="panel panel-primary">
<p class="text-info">Parking system is Good in here and it is for <code>FREE</code>.</p>
    <img src="img/parking.jpg">
<br><br>
</div>

<button class="down">4. FREE WIFI</button>
<div class="panel panel-primary">
    <p class="text-info"> <code>FREE</code> WIFI for all who visit our futsal pitch.</p>
<img src="img/wifi.jpg">
    </div>
<button class="down">5. CAFE</button>
<div class="panel">
    <p class="text-info"> The Cafe with the best service is running since we established.</p>
    <img src="img/cafe.jpg">
    <br><br>
</div>
    </div>
<script>
var acc = document.getElementsByClassName("down");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
</body>
</html>
